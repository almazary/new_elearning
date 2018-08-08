<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class untuk resource Pesan
 *
 * @package   e-Learning Dokumenary Net
 * @author    Almazari <almazary@gmail.com>
 * @copyright Copyright (c) 2013 - 2016, Dokumenary Net.
 * @since     1.0
 * @link      http://dokumenary.net
 *
 * INDEMNITY
 * You agree to indemnify and hold harmless the authors of the Software and
 * any contributors for any direct, indirect, incidental, or consequential
 * third-party claims, actions or suits, as well as any related expenses,
 * liabilities, damages, settlements or fees arising from your use or misuse
 * of the Software, or a violation of any terms of this license.
 *
 * DISCLAIMER OF WARRANTY
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR
 * IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE,
 * NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.
 *
 * LIMITATIONS OF LIABILITY
 * YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE
 * FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION
 * WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE
 * APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING
 * BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF
 * DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.
 */

class Message extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->db->table_exists('messages')) {
            $this->msg_model->create_table();
        }

        # cek versi, kalo masih 1.0 update ke 1.1
        $versi = get_pengaturan('versi', 'value');
        if ($versi == '1.0') {
            $this->config_model->update('versi', 'Versi', '1.1');
        }

        must_login();

        $this->db->query("SET sql_mode = ''");
    }

    function index($segment_3 = '', $segment_4 = '')
    {
        if (!empty($_GET['q'])) {
            redirect('message/index/' . $_GET['q']);
        }

        $query = (string)$segment_3;
        if ($query == 'no-query') {
            $query = '';
        } else {
            $query = urldecode($query);
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
            $content   = $this->input->post('content');

            $l = 0;
            foreach ($get_email as $email) {
                $login_penerima = $this->login_model->retrieve(null, $email);

                # kalo kediri sendiri di skrip
                if ($login_penerima['id'] == get_sess_data('login', 'id')) {
                    continue;
                }

                # kirim email
                $outbox_id = $this->msg_model->send(get_sess_data('login', 'id'), $login_penerima['id'], $content);
                $l++;
            }

            $this->session->set_flashdata('msg', get_alert('success', 'Pesan berhasil dikirimkan.'));
            if ($l == 1) {
                redirect('message/detail/' . $outbox_id . '#msg-' . $outbox_id);
            } else {
                redirect('message');
            }
        }

        $data['login']   = $login;

        $html_js = get_texteditor();
        $html_js .= load_comp_js(array(
            base_url('assets/comp/tags/bootstrap-tagsinput.js'),
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/tags/bootstrap-tagsinput.css')));

        $data['all_users'] = '"' . implode('","', $this->login_model->retrieve_all_users()) . '"';

        $this->twig->display('tulis-pesan.html', $data);
    }

    function detail($segment_3 = '')
    {
        $msg_id   = (int)$segment_3;
        $retrieve = $this->msg_model->retrieve(get_sess_data('login', 'id'), $msg_id);

        # Kalo tidak ditemukan bisa jadi owner_id nya tidak sesuai session
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

        # ini harusnya kondisinya selalu terpenuhi
        if ($data['r']['sender_receiver_id'] != get_sess_data('login', 'id')) {
            $login_receiver = $this->login_model->retrieve($data['r']['sender_receiver_id']);
            if (!empty($login_receiver['siswa_id'])) {
                $user_receiver = $this->siswa_model->retrieve($login_receiver['siswa_id']);
            } elseif (!empty($login_receiver['pengajar_id'])) {
                $user_receiver = $this->pengajar_model->retrieve($login_receiver['pengajar_id']);
            }

            $login_username = $login_receiver['username'];
            $data['receiver_name'] = $user_receiver['nama'] . " [$login_username]";
        } else {
            $this->session->set_flashdata('msg', get_alert('warning', 'Maaf, terdapat kesalahan pada record.'));
            redirect('message');
        }

        $html_js         = get_texteditor();
        $data['comp_js'] = $html_js;

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
