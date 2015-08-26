<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        must_login();
    }

    private function format_msg($retrieve)
    {
        # cari sender/receiver
        $login = $this->login_model->retrieve($retrieve['sender_receiver_id']);
        if (!empty($login['siswa_id'])) {
            $user = $this->siswa_model->retrieve($login['siswa_id']);
            if (is_admin()) {
                $user['link_profil'] = site_url('siswa/detail/' . $user['status_id'] . '/' . $user['id']);
            } else {
                $user['link_profil'] = site_url('siswa/detail/' . $user['id']);
            }
        } elseif (!empty($login['pengajar_id'])) {
            $user = $this->pengajar_model->retrieve($login['pengajar_id']);
            if (is_admin()) {
                $user['link_profil'] = site_url('pengajar/detail/' . $user['status_id'] . '/' . $user['id']);
            } else {
                $user['link_profil'] = site_url('pengajar/detail/' . $user['id']);
            }
        }

        # jika inbox
        if ($retrieve['type_id'] == 1) {
            $index = 'sender';
        }
        # jika outbox
        elseif ($retrieve['type_id'] == 2) {
            $index = 'receiver';
        }

        $retrieve[$index]['profil'] = $user;
        $retrieve[$index]['login']  = $login;

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

    function index($segment_3 = '')
    {
        $page_no = (int)$segment_3;
        if (empty($page_no)) {
            $page_no = 1;
        }

        # ambil semua inbox
        $retrieve_all = $this->msg_model->retrieve_all(15, $page_no, 1, get_sess_data('login', 'id'));
        $results_data = array();
        foreach ($retrieve_all['results'] as $key => $val) {
            $results_data[$key] = $this->format_msg($val);
        }

        $data['inbox']        = $results_data;
        $data['pagination']   = $this->pager->view($retrieve_all, 'message/index/');
        $data['count_unread'] = $this->msg_model->count(1, get_sess_data('login', 'id'), 'unread');

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
            $this->msg_model->send(get_sess_data('login', 'id'), $login['id'], $content);

            $this->session->set_flashdata('msg', get_alert('success', 'Pesan berhasil dikirimkan.'));
            redirect('message');
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

        // pr($retrieve);

        $data['r']               = $retrieve['retrieve'];
        $data['old_related_msg'] = $retrieve['old_related_msg'];
        $data['new_related_msg'] = $retrieve['new_related_msg'];

        $html_js = get_tinymce('content');
        $html_js .= load_comp_js(array(
            base_url('assets/comp/autocomplete/jquery.autocomplete.min.js'),
            base_url('assets/comp/autocomplete/script.js')
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/autocomplete/autocomplete.css')));

        $this->twig->display('detail-pesan.html', $data);
    }
}
