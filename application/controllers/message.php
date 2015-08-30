<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->db->table_exists('messages')) {
            $this->msg_model->create_table();
        }

        must_login();
    }

    private function format_msg($retrieve)
    {
        # jika inbox yang dicari pengirimnya
        if ($retrieve['type_id'] == 1) {
            $get_user = $retrieve['sender_receiver_id'];
        } elseif ($retrieve['type_id'] == 2) {
            $get_user = $retrieve['owner_id'];
        }

        # cari sender/receiver
        $login = $this->login_model->retrieve($get_user);
        if (!empty($login['siswa_id'])) {
            $user = $this->siswa_model->retrieve($login['siswa_id']);
            if (is_admin()) {
                $user['link_profil'] = site_url('siswa/detail/' . $user['status_id'] . '/' . $user['id']);
            } else {
                $user['link_profil'] = site_url('siswa/detail/' . $user['id']);
            }
            $user['link_image'] = get_url_image_siswa($user['foto'], 'medium', $user['jenis_kelamin']);

        } elseif (!empty($login['pengajar_id'])) {
            $user = $this->pengajar_model->retrieve($login['pengajar_id']);
            if (is_admin()) {
                $user['link_profil'] = site_url('pengajar/detail/' . $user['status_id'] . '/' . $user['id']);
            } else {
                $user['link_profil'] = site_url('pengajar/detail/' . $user['id']);
            }
            $user['link_image'] = get_url_image_pengajar($user['foto'], 'medium', $user['jenis_kelamin']);
        }

        $retrieve['profil'] = $user;
        $retrieve['login']  = $login;

        # format tanggal, jika hari ini
        if (date('Y-m-d') == date('Y-m-d', strtotime($retrieve['date']))) {
            $retrieve['date'] = date('H:i', strtotime($retrieve['date']));
        }
        # kemarin
        elseif (date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d')))) == date('Y-m-d', strtotime($retrieve['date']))) {
            $retrieve['date'] = date('H:i', strtotime($retrieve['date'])) . ' kemarin';
        }
        # lusa
        elseif (date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))) == date('Y-m-d', strtotime($retrieve['date']))) {
            $retrieve['date'] = date('H:i', strtotime($retrieve['date'])) . ' lusa';
        }
        else {
            $retrieve['date'] = tgl_jam_indo($retrieve['date']);
        }

        return $retrieve;
    }

    function index($segment_3 = '', $segment_4 = '')
    {
        if (!empty($_GET['q'])) {
            redirect('message/index/' . $_GET['q']);
        }

        $query   = (string)$segment_3;
        if ($query == 'no-query') {
            $query = '';
        }

        $page_no = (int)$segment_4;
        if (empty($page_no)) {
            $page_no = 1;
        }

        # ambil semua inbox
        $retrieve_all = $this->msg_model->retrieve_all(10, $page_no, get_sess_data('login', 'id'), (!empty($query) ? array('content' => $query) : array()));
        $results_data = array();
        foreach ($retrieve_all['results'] as $key => $val) {
            $results_data[$key] = $this->format_msg($val);
        }

        $data['inbox']      = $results_data;
        $data['pagination'] = $this->pager->view($retrieve_all, 'message/index/' . (empty($query) ? 'no-query' : $query) . '/');

        $data['keyword'] = $query;
        $this->twig->display('list-inbox.html', $data);
    }

    function create($receiver_id = '')
    {
        $receiver_id = (int)$receiver_id;
        if (!empty($receiver_id) && $receiver_id == get_sess_data('login', 'id')) {
            $this->session->set_flashdata('msg', get_alert('warning', 'Anda tidak dapat mengirim pesan ke diri sendiri.'));
            redirect('message/create');
        }

        $login = array();
        if (!empty($receiver_id)) {
            $login = $this->login_model->retrieve($receiver_id);
            if (empty($login)) {
                $this->session->set_flashdata('msg', get_alert('warning', 'Penerima tidak ditemukan.'));
                redirect('message/create');
            }

            if (!empty($login['siswa_id'])) {
                $login['profil'] = $this->siswa_model->retrieve($login['siswa_id']);
            } elseif (!empty($login['pengajar_id'])) {
                $login['profil'] = $this->pengajar_model->retrieve($login['pengajar_id']);
            }
        }

        if ($this->form_validation->run('message/create') == true) {
            $get_email = get_email_from_string($this->input->post('penerima', true));
            $content   = $this->input->post('content', true);

            $login = $this->login_model->retrieve(null, $get_email);

            # kirim email
            $outbox_id = $this->msg_model->send(get_sess_data('login', 'id'), $login['id'], $content);

            $this->session->set_flashdata('msg', get_alert('success', 'Pesan berhasil dikirimkan.'));
            redirect('message/detail/' . $outbox_id . '#msg-' . $outbox_id);
        }

        $data['login']   = $login;

        $html_js = get_tinymce('content');
        $html_js .= load_comp_js(array(
            base_url('assets/comp/autocomplete/jquery.autocomplete.min.js'),
            base_url('assets/comp/autocomplete/script.js')
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/autocomplete/autocomplete.css')));

        $this->twig->display('tulis-pesan.html', $data);
    }

    function detail($segment_3 = '')
    {
        $msg_id   = (int)$segment_3;
        $retrieve = $this->msg_model->retrieve(get_sess_data('login', 'id'), $msg_id);

        if (empty($retrieve['retrieve'])) {
            $this->session->set_flashdata('msg', get_alert('success', 'Pesan tidak ditemukan.'));
            redirect('message');
        }

        # format data
        $retrieve['retrieve'] = $this->format_msg($retrieve['retrieve']);
        foreach ($retrieve['old_related_msg'] as $key => &$val) {
            $retrieve['old_related_msg'][$key] = $this->format_msg($val);
        }
        foreach ($retrieve['new_related_msg'] as $key => &$val) {
            $retrieve['new_related_msg'][$key] = $this->format_msg($val);
        }

        // pr($retrieve);die;

        $data['r']               = $retrieve['retrieve'];
        $data['old_related_msg'] = $retrieve['old_related_msg'];
        $data['new_related_msg'] = $retrieve['new_related_msg'];

        if ($data['r']['sender_receiver_id'] != get_sess_data('login', 'id')) {
            $login_receiver = $this->login_model->retrieve($data['r']['sender_receiver_id']);
            if (!empty($login_receiver['siswa_id'])) {
                $user_receiver = $this->siswa_model->retrieve($login_receiver['siswa_id']);
            } elseif (!empty($login_receiver['pengajar_id'])) {
                $user_receiver = $this->pengajar_model->retrieve($login_receiver['pengajar_id']);
            }

            $data['receiver_name'] = $user_receiver['nama'] . " <$login_receiver[username]>";
        } else {
            $data['receiver_name'] = $data['r']['profil']['nama'] . " <$data[r][login][username]>";
        }

        $html_js = get_tinymce('content');
        $html_js .= load_comp_js(array(
            base_url('assets/comp/autocomplete/jquery.autocomplete.min.js'),
            base_url('assets/comp/autocomplete/script.js'),
            base_url('assets/comp/jquery/get-new-msg.js')
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/autocomplete/autocomplete.css')));

        # update read
        $this->msg_model->update_read($msg_id);

        foreach ($data['old_related_msg'] as $old_msg) {
            $this->msg_model->update_read($old_msg['id']);
        }

        foreach ($data['new_related_msg'] as $new_msg) {
            $this->msg_model->update_read($new_msg['id']);
        }

        if (!empty($_GET['confirm']) AND $_GET['confirm'] == 1) {
            $data['confirm_del_all'] = true;
        }

        $this->twig->display('detail-pesan.html', $data);
    }

    function del_all($segment_3 = '')
    {
        $msg_id   = (int)$segment_3;
        $retrieve = $this->msg_model->retrieve(get_sess_data('login', 'id'), $msg_id, true, true);

        if (empty($retrieve['retrieve'])) {
            $this->session->set_flashdata('msg', get_alert('success', 'Pesan tidak ditemukan.'));
            redirect('message');
        }

        $this->msg_model->delete($msg_id);

        foreach ($retrieve['old_related_msg'] as $m) {
            $this->msg_model->delete($m['id']);
        }

        foreach ($retrieve['new_related_msg'] as $m) {
            $this->msg_model->delete($m['id']);
        }

        $this->session->set_flashdata('msg', get_alert('success', 'Percakapan berhasil dihapus.'));

        redirect('message');
    }

    function del($segment_3 = '', $segment_4 = '')
    {
        $msg_id   = (int)$segment_3;
        $retrieve = $this->msg_model->retrieve(get_sess_data('login', 'id'), $msg_id);

        if (empty($retrieve['retrieve'])) {
            $this->session->set_flashdata('msg', get_alert('success', 'Pesan tidak ditemukan.'));
            redirect('message');
        }

        $this->msg_model->delete($msg_id);

        $this->session->set_flashdata('msg', get_alert('success', 'Pesan berhasil dihapus.'));

        $segment_4 = (int)$segment_4;
        if (!empty($segment_4)) {
            $retrieve = $this->msg_model->retrieve(get_sess_data('login', 'id'), $segment_4);

            if (empty($retrieve['retrieve'])) {
                redirect('message');
            } else {
                redirect('message/detail/' . $segment_4);
            }
        }

        redirect('message');
    }

    function to($segment_3 = '', $segment_4 = '')
    {
        $tujuan = (string)$segment_3;
        if (!in_array($tujuan, array('siswa', 'pengajar'))) {
            exit('Tujuan tidak ditemukan.');
        }

        $id = (int)$segment_4;
        if (empty($id)) {
            exit('Tujuan tidak ditemukan.');
        }

        if ($tujuan == 'siswa') {
            $user = $this->siswa_model->retrieve($id);
            if (empty($user)) {
                exit('Tujuan tidak ditemukan.');
            }

            if (is_siswa() && get_sess_data('user', 'id') == $user['id']) {
                exit('Anda tidak dapat mengirim pesan ke diri sendiri.');
            }

            $login = $this->login_model->retrieve(null, null, null, $user['id']);
        }

        if ($tujuan == 'pengajar') {
            $user = $this->pengajar_model->retrieve($id);
            if (empty($user)) {
                exit('Tujuan tidak ditemukan.');
            }

            if ((is_pengajar() || is_admin()) && get_sess_data('user', 'id') == $user['id']) {
                exit('Anda tidak dapat mengirim pesan ke diri sendiri.');
            }

            $login = $this->login_model->retrieve(null, null, null, null, $user['id']);
        }

        # cari masih ada percakapan tidak
        $this->db->where('owner_id', get_sess_data('login', 'id'));
        $this->db->where_in('sender_receiver_id', array(get_sess_data('login', 'id'), $login['id']));
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get('messages');
        $result = $result->row_array();
        if (!empty($result)) {
            redirect('message/detail/' . $result['id'] . '#msg-' . $result['id']);
        }

        redirect('message/create/' . $login['id']);
    }
}
