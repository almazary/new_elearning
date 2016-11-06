<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class untuk resource Pengajar
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

class Pengajar extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        must_login();
    }

    function index($segment_3 = '', $segment_4 = '')
    {
        if (is_pengajar()) {
            redirect('pengajar/filter');
        }

        $status_id = $segment_3;
        if ($status_id == '' OR $status_id > 2) {
            $status_id = 1;
        }

        $page_no = (int)$segment_4;
        if (empty($page_no)) {
            $page_no = 1;
        }

        $base_url_module = 'pengajar/index/'.$status_id.'/';

        # ambil semua data pengajar
        $retrieve_all = $this->pengajar_model->retrieve_all(20, $page_no, $status_id);

        $data['status_id']  = $status_id;
        $data['pengajar']   = $retrieve_all['results'];
        $data['pagination'] = $this->pager->view($retrieve_all, $base_url_module);
        $data['count_pending'] = $this->pengajar_model->count('pending');

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

        if (isset($_POST['status_id']) AND !empty($_POST['status_id'])) {
            $post_status_id = $this->input->post('status_id', TRUE);
            $pengajar_ids   = $this->input->post('pengajar_id', TRUE);

            foreach ($pengajar_ids as $pengajar_id) {
                $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
                if (!empty($retrieve_pengajar)) {
                    # update pengajar
                    $this->pengajar_model->update(
                        $retrieve_pengajar['id'],
                        $retrieve_pengajar['nip'],
                        $retrieve_pengajar['nama'],
                        $retrieve_pengajar['jenis_kelamin'],
                        $retrieve_pengajar['tempat_lahir'],
                        $retrieve_pengajar['tgl_lahir'],
                        $retrieve_pengajar['alamat'],
                        $retrieve_pengajar['foto'],
                        $post_status_id
                    );

                    if ($retrieve_pengajar['status_id'] == 0 && $post_status_id == 1) {
                        @kirim_email_approve_pengajar($pengajar_id);
                    }
                }
            }

            redirect($base_url_module);
        }

        $this->twig->display('list-pengajar.html', $data);
    }

    function add($segment_3 = '')
    {
        # harus login sebagai admin
        if (!is_admin()) {
            redirect('welcome');
        }

        $status_id = $segment_3;
        if ($status_id == '' OR $status_id > 3) {
            redirect('pengajar/index/1');
        }

        $data['status_id'] = $status_id;

        $config['upload_path']   = get_path_image();
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = '0';
        $config['max_width']     = '0';
        $config['max_height']    = '0';
        $config['file_name']     = 'pengajar-'.url_title($this->input->post('nama', TRUE), '-', true);
        $this->upload->initialize($config);

        if (!empty($_FILES['userfile']['tmp_name']) AND !$this->upload->do_upload()) {
            $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
            $error_upload = true;
        } else {
            $data['error_upload'] = '';
            $error_upload = false;
        }

        if ($this->form_validation->run('pengajar/add') == TRUE AND !$error_upload) {
            $nip           = $this->input->post('nip', TRUE);
            $nama          = $this->input->post('nama', TRUE);
            $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
            $tempat_lahir  = $this->input->post('tempat_lahir', TRUE);
            $tgl_lahir     = $this->input->post('tgl_lahir', TRUE);
            $bln_lahir     = $this->input->post('bln_lahir', TRUE);
            $thn_lahir     = $this->input->post('thn_lahir', TRUE);
            $alamat        = $this->input->post('alamat', TRUE);
            $username      = $this->input->post('username', TRUE);
            $password      = $this->input->post('password2', TRUE);
            $is_admin      = $this->input->post('is_admin', TRUE);

            if (empty($thn_lahir)) {
                $tanggal_lahir = null;
            } else {
                $tanggal_lahir = $thn_lahir.'-'.$bln_lahir.'-'.$tgl_lahir;
            }

            if (!empty($_FILES['userfile']['tmp_name'])) {
                $upload_data = $this->upload->data();

                # create thumb small
                $this->create_img_thumb(
                    get_path_image($upload_data['file_name']),
                    '_small',
                    '50',
                    '50'
                );

                # create thumb medium
                $this->create_img_thumb(
                    get_path_image($upload_data['file_name']),
                    '_medium',
                    '150',
                    '150'
                );

                $foto = $upload_data['file_name'];
            } else {
                $foto = null;
            }

            # simpan data siswa
            $pengajar_id = $this->pengajar_model->create(
                $nip,
                $nama,
                $jenis_kelamin,
                $tempat_lahir,
                $tanggal_lahir,
                $alamat,
                $foto,
                1
            );

            # simpan data login
            $this->login_model->create(
                $username,
                $password,
                null,
                $pengajar_id,
                $is_admin
            );

            $this->session->set_flashdata('pengajar', get_alert('success', 'Data Pengajar berhasil disimpan.'));
            redirect('pengajar/index/1');

        } else {
            $upload_data = $this->upload->data();
            if (!empty($upload_data) AND is_file(get_path_image($upload_data['file_name']))) {
                unlink(get_path_image($upload_data['file_name']));
            }
        }

        $this->twig->display('tambah-pengajar.html', $data);
    }

    function edit_profile($segment_3 = '', $segment_4 = '')
    {
        # siswa tidak diijinkan
        if (is_siswa()) {
            exit('Akses ditolak');
        }

        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        # jika sebagai pengajar, hanya profilnya dia yang bisa diupdate
        if (is_pengajar() AND get_sess_data('user', 'id') != $retrieve_pengajar['id']) {
            exit('Akses ditolak');
        }

        $retrieve_login = $this->login_model->retrieve(null, null, null, null, $retrieve_pengajar['id']);
        $retrieve_pengajar['is_admin'] = $retrieve_login['is_admin'];

        $data['status_id']    = $status_id;
        $data['pengajar_id']  = $pengajar_id;
        $data['pengajar']     = $retrieve_pengajar;

        if ($this->form_validation->run('pengajar/edit_profile') == TRUE AND (!is_demo_app() OR !$retrieve_login['is_admin'])) {
            $nip           = $this->input->post('nip', TRUE);
            $nama          = $this->input->post('nama', TRUE);
            $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
            $tempat_lahir  = $this->input->post('tempat_lahir', TRUE);
            $tgl_lahir     = $this->input->post('tgl_lahir', TRUE);
            $bln_lahir     = $this->input->post('bln_lahir', TRUE);
            $thn_lahir     = $this->input->post('thn_lahir', TRUE);
            $alamat        = $this->input->post('alamat', TRUE);
            if (is_admin()) {
                $status   = $this->input->post('status_id', TRUE);
                $is_admin = $this->input->post('is_admin', TRUE);
            } else {
                $status   = $retrieve_pengajar['status_id'];
                $is_admin = $retrieve_login['is_admin'];
            }

            if (empty($thn_lahir)) {
                $tanggal_lahir = null;
            } else {
                $tanggal_lahir = $thn_lahir.'-'.$bln_lahir.'-'.$tgl_lahir;
            }

            # update pengajar
            $this->pengajar_model->update(
                $pengajar_id,
                $nip,
                $nama,
                $jenis_kelamin,
                $tempat_lahir,
                $tanggal_lahir,
                $alamat,
                $retrieve_pengajar['foto'],
                $status
            );

            # update login
            $this->login_model->update(
                $retrieve_login['id'],
                $retrieve_login['username'],
                null,
                $pengajar_id,
                $is_admin,
                null
            );

            if ($retrieve_pengajar['status_id'] == 0 && $status == 1) {
                kirim_email_approve_pengajar($pengajar_id);
            }

            $this->session->set_flashdata('edit', get_alert('success', 'Profil pengajar berhasil diperbaharui.'));
            redirect('pengajar/edit_profile/'.$status_id.'/'.$pengajar_id);
        }

        $this->twig->display('edit-pengajar-profile.html', $data);
    }

    /**
     * Meghapus foto pengajar
     * @since 1.8
     */
    function delete_foto($segment_3 = "", $segment_4 = "")
    {
        # siswa tidak diijinkan
        if (is_siswa()) {
            show_error('Akses ditolak');
        }

        $pengajar_id       = (int)$segment_3;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            show_error('Data Pengajar tidak ditemukan');
        }

        # jika sebagai pengajar, hanya profilnya dia yang bisa diupdate
        if (is_pengajar() AND get_sess_data('user', 'id') != $retrieve_pengajar['id']) {
            show_error('Akses ditolak');
        }

        if (is_file(get_path_image($retrieve_pengajar['foto']))) {
            unlink(get_path_image($retrieve_pengajar['foto']));
        }

        if (is_file(get_path_image($retrieve_pengajar['foto'], 'medium'))) {
            unlink(get_path_image($retrieve_pengajar['foto'], 'medium'));
        }

        if (is_file(get_path_image($retrieve_pengajar['foto'], 'small'))) {
            unlink(get_path_image($retrieve_pengajar['foto'], 'small'));
        }

        $this->pengajar_model->delete_foto($retrieve_pengajar['id']);

        $uri_back = $segment_4;
        if (!empty($uri_back)) {
            $uri_back = deurl_redirect($uri_back);
        } else {
            $uri_back = site_url('pengajar');
        }

        redirect($uri_back);
    }

    function edit_picture($segment_3 = '', $segment_4 = '')
    {
        # siswa tidak diijinkan
        if (is_siswa()) {
            exit('Akses ditolak');
        }

        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        # jika sebagai pengajar, hanya profilnya dia yang bisa diupdate
        if (is_pengajar() AND get_sess_data('user', 'id') != $retrieve_pengajar['id']) {
            exit('Akses ditolak');
        }

        $retrieve_login = $this->login_model->retrieve(null, null, null, null, $retrieve_pengajar['id']);
        $retrieve_pengajar['is_admin'] = $retrieve_login['is_admin'];

        $data['status_id']    = $status_id;
        $data['pengajar_id']  = $pengajar_id;
        $data['pengajar']     = $retrieve_pengajar;

        $config['upload_path']   = get_path_image();
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = '0';
        $config['max_width']     = '0';
        $config['max_height']    = '0';
        $config['file_name']     = 'pengajar-'.url_title($retrieve_pengajar['nama'], '-', true);
        $this->upload->initialize($config);

        if ($this->upload->do_upload() AND (!is_demo_app() OR !$retrieve_login['is_admin'])) {

            if (is_file(get_path_image($retrieve_pengajar['foto']))) {
                unlink(get_path_image($retrieve_pengajar['foto']));
            }

            if (is_file(get_path_image($retrieve_pengajar['foto'], 'medium'))) {
                unlink(get_path_image($retrieve_pengajar['foto'], 'medium'));
            }

            if (is_file(get_path_image($retrieve_pengajar['foto'], 'small'))) {
                unlink(get_path_image($retrieve_pengajar['foto'], 'small'));
            }

            $upload_data = $this->upload->data();

            # create thumb small
            $this->create_img_thumb(
                get_path_image($upload_data['file_name']),
                '_small',
                '50',
                '50'
            );

            # create thumb medium
            $this->create_img_thumb(
                get_path_image($upload_data['file_name']),
                '_medium',
                '150',
                '150'
            );

            # update pengajar
            $this->pengajar_model->update(
                $pengajar_id,
                $retrieve_pengajar['nip'],
                $retrieve_pengajar['nama'],
                $retrieve_pengajar['jenis_kelamin'],
                $retrieve_pengajar['tempat_lahir'],
                $retrieve_pengajar['tgl_lahir'],
                $retrieve_pengajar['alamat'],
                $upload_data['file_name'],
                $retrieve_pengajar['status_id']
            );

            $this->session->set_flashdata('edit', get_alert('success', 'Foto pengajar berhasil diperbaharui.'));
            redirect('pengajar/edit_picture/'.$status_id.'/'.$pengajar_id);
        } else {
            if (!empty($_FILES['userfile']['tmp_name'])) {
                $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
            }
        }

        $this->twig->display('edit-pengajar-picture.html', $data);
    }

    function edit_username($segment_3 = '', $segment_4 = '')
    {
        # siswa tidak diijinkan
        if (is_siswa()) {
            exit('Akses ditolak');
        }

        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        # jika sebagai pengajar, hanya profilnya dia yang bisa diupdate
        if (is_pengajar() AND get_sess_data('user', 'id') != $retrieve_pengajar['id']) {
            exit('Akses ditolak');
        }

        $data['status_id']    = $status_id;
        $data['pengajar_id']  = $pengajar_id;
        $data['login']        = $this->login_model->retrieve(null, null, null, null, $pengajar_id);

        if ($this->form_validation->run('pengajar/edit_username') == TRUE AND (!is_demo_app() OR !$data['login']['is_admin'])) {
            $login_id = $this->input->post('login_id', TRUE);
            $username = $this->input->post('username', TRUE);

            try {
                # update username
                $this->login_model->update(
                    $login_id,
                    $username,
                    null,
                    $pengajar_id,
                    $data['login']['is_admin'],
                    $data['login']['reset_kode']
                );
            } catch (Exception $e) {
                $this->session->set_flashdata('edit', get_alert('warning', $e->getMessage()));
                redirect('pengajar/edit_username/'.$status_id.'/'.$pengajar_id);
            }

            $this->session->set_flashdata('edit', get_alert('success', 'Username pengajar berhasil diperbaharui.'));
            redirect('pengajar/edit_username/'.$status_id.'/'.$pengajar_id);
        }

        $this->twig->display('edit-pengajar-username.html', $data);
    }

    function edit_password($segment_3 = '', $segment_4 = '')
    {
        # siswa tidak diijinkan
        if (is_siswa()) {
            exit('Akses ditolak');
        }

        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        # jika sebagai pengajar, hanya profilnya dia yang bisa diupdate
        if (is_pengajar() AND get_sess_data('user', 'id') != $retrieve_pengajar['id']) {
            exit('Akses ditolak');
        }

        $data['status_id']    = $status_id;
        $data['pengajar_id']  = $pengajar_id;

        $retrieve_login = $this->login_model->retrieve(null, null, null, null, $pengajar_id);
        $data['login']  = $retrieve_login;

        if ($this->form_validation->run('pengajar/edit_password') == TRUE AND (!is_demo_app() OR !$retrieve_login['is_admin'])) {
            $password = $this->input->post('password2', TRUE);

            # update password
            $this->login_model->update_password($retrieve_login['id'], $password);

            $this->session->set_flashdata('edit', get_alert('success', 'Password pengajar berhasil diperbaharui.'));
            redirect('pengajar/edit_password/'.$status_id.'/'.$pengajar_id);
        }

        $this->twig->display('edit-pengajar-password.html', $data);
    }

    function detail($segment_3 = '', $segment_4 = '')
    {
        if (is_admin()) {
            $status_id         = (int)$segment_3;
            $pengajar_id       = (int)$segment_4;
            $data['status_id'] = $status_id;
        } else {
            $pengajar_id = (int)$segment_3;
        }

        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            redirect('pengajar');
        }

        $retrieve_login = $this->login_model->retrieve(null, null, null, null, $retrieve_pengajar['id']);

        $data['pengajar']       = $retrieve_pengajar;
        $data['pengajar_login'] = $retrieve_login;

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

        $this->twig->display('detail-pengajar.html', $data);
    }

    function add_ampuan($segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
        # siswa tidak diijinkan
        if (is_siswa()) {
            exit('Akses ditolak');
        }

        $status_id    = (int)$segment_3;
        $pengajar_id  = (int)$segment_4;
        $hari_id      = (int)$segment_5;
        if ($hari_id < 1 OR $hari_id > 7) {
            exit('Hari tidak ditemukan');
        }

        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        # jika sebagai pengajar, hanya profilnya dia yang bisa diupdate
        if (is_pengajar() AND get_sess_data('user', 'id') != $retrieve_pengajar['id']) {
            exit('Akses ditolak');
        }

        $data['status_id']   = $status_id;
        $data['pengajar_id'] = $pengajar_id;
        $data['hari_id']     = $hari_id;
        $data['kelas']       = $this->kelas_model->retrieve_all_child();

        if ($this->form_validation->run('pengajar/ampuan') == TRUE) {
            $mapel_kelas_id = $this->input->post('mapel_kelas_id', TRUE);
            $jam_mulai      = $this->input->post('jam_mulai', TRUE);
            $jam_selesai    = $this->input->post('jam_selesai', TRUE);

            $this->pengajar_model->create_ma(
                $hari_id,
                $jam_mulai,
                $jam_selesai,
                $pengajar_id,
                $mapel_kelas_id
            );

            $this->session->set_flashdata('add', get_alert('success', 'Jadwal Matapelajaran berhasil disimpan.'));
            redirect('pengajar/add_ampuan/'.$status_id.'/'.$pengajar_id.'/'.$hari_id);
        }

        $this->twig->display('tambah-pengajar-ampuan.html', $data);
    }

    function edit_ampuan($segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
        # siswa tidak diijinkan
        if (is_siswa()) {
            exit('Akses ditolak');
        }

        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $ma_id             = (int)$segment_5;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        # jika sebagai pengajar, hanya profilnya dia yang bisa diupdate
        if (is_pengajar() AND get_sess_data('user', 'id') != $retrieve_pengajar['id']) {
            exit('Akses ditolak');
        }

        $retrieve_ma = $this->pengajar_model->retrieve_ma($ma_id);
        if (empty($retrieve_ma)) {
            exit('Mapel Ajar tidak ditemukan');
        }

        $retrieve_mk = $this->mapel_model->retrieve_kelas($retrieve_ma['mapel_kelas_id']);

        $data['status_id']    = $status_id;
        $data['pengajar_id']  = $pengajar_id;
        $data['ma']           = $retrieve_ma;
        $data['mk']           = $retrieve_mk;
        $data['kelas']        = $this->kelas_model->retrieve_all_child();

        if ($this->form_validation->run('pengajar/ampuan') == TRUE) {
            $mapel_kelas_id = $this->input->post('mapel_kelas_id', TRUE);
            $jam_mulai      = $this->input->post('jam_mulai', TRUE);
            $jam_selesai    = $this->input->post('jam_selesai', TRUE);
            $aktif          = $this->input->post('aktif');

            $this->pengajar_model->update_ma(
                $retrieve_ma['id'],
                $retrieve_ma['hari_id'],
                $jam_mulai,
                $jam_selesai,
                $pengajar_id,
                $mapel_kelas_id,
                $aktif
            );

            $this->session->set_flashdata('edit', get_alert('success', 'Jadwal Ajar berhasil diperbaharui.'));
            redirect('pengajar/edit_ampuan/'.$status_id.'/'.$pengajar_id.'/'.$retrieve_ma['id']);
        }

        $this->twig->display('edit-pengajar-ampuan.html', $data);
    }

    function filter($segment_3 = '')
    {
        $page_no = $segment_3;
        if (empty($page_no)) {
            $page_no = 1;
        }

        $session_filter = $this->session->userdata('filter_pengajar');

        if ($this->form_validation->run('pengajar/filter') == TRUE) {

            $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
            $thn_lahir     = (int)$this->input->post('thn_lahir', TRUE);
            $status_id     = $this->input->post('status_id', TRUE);

            $filter = array(
                'nip'           => $this->input->post('nip', TRUE),
                'nama'          => $this->input->post('nama', TRUE),
                'jenis_kelamin' => (empty($jenis_kelamin)) ? array() : $jenis_kelamin,
                'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
                'tgl_lahir'     => (int)$this->input->post('tgl_lahir', TRUE),
                'bln_lahir'     => (int)$this->input->post('bln_lahir', TRUE),
                'thn_lahir'     => (empty($thn_lahir)) ? '' : $thn_lahir,
                'alamat'        => $this->input->post('alamat', TRUE),
                'status_id'     => (empty($status_id)) ? array() : $status_id,
                'username'      => $this->input->post('username', TRUE),
                'is_admin'      => $this->input->post('is_admin', TRUE)
            );

            $this->session->set_userdata('filter_pengajar', $filter);

            redirect('pengajar/filter');

        } elseif (!empty($session_filter)) {

            $filter = $this->session->userdata('filter_pengajar');

        } else {

            $filter = array();

            $retrieve_all = array(
                'results'      => array(),
                'total_record' => 0,
                'total_respon' => 0,
                'current_page' => 1,
                'total_page'   => 0,
                'next_page'    => 0,
                'prev_page'    => 0
            );

        }

        if (empty($filter)) {
            $filter = array(
                'nip'           => '',
                'nama'          => '',
                'jenis_kelamin' => '',
                'tempat_lahir'  => '',
                'tgl_lahir'     => '',
                'bln_lahir'     => '',
                'thn_lahir'     => '',
                'alamat'        => '',
                'status_id'     => '',
                'username'      => '',
                'is_admin'      => ''
            );
        }

        if (empty($filter['status_id'])) {
            $filter['status_id'] = array(1, 2);
        }

        $data['filter'] = $filter;

        if (!empty($filter)) {
            $retrieve_all = $this->pengajar_model->retrieve_all_filter(
                $filter['nip'], $filter['nama'], $filter['jenis_kelamin'], $filter['tempat_lahir'], $filter['tgl_lahir'], $filter['bln_lahir'], $filter['thn_lahir'], $filter['alamat'], $filter['status_id'], $filter['username'], $filter['is_admin'], $page_no
            );
        }

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

        $data['pengajars']     = $retrieve_all['results'];
        $data['pagination']    = $this->pager->view($retrieve_all, 'pengajar/filter/');
        $data['count_pending'] = $this->pengajar_model->count('pending');

        $this->twig->display('filter-pengajar.html', $data);
    }

    function filter_action()
    {
        if ($this->form_validation->run('pengajar/filter') == TRUE) {
            $pengajar_ids = $this->input->post('pengajar_id', TRUE);
            $status_id    = (int)$this->input->post('status_id', TRUE);

            if (!empty($pengajar_ids) AND is_array($pengajar_ids)) {

                if (empty($status_id)) {
                    $this->session->set_flashdata('pengajar', get_alert('warning', 'Tidak ada aksi yang dipilih.'));
                    redirect('pengajar/filter');
                }

                foreach ($pengajar_ids as $pengajar_id) {
                    $p = $this->pengajar_model->retrieve($pengajar_id);
                    if (!empty($status_id)) {
                        //update status siswa
                        $this->pengajar_model->update(
                            $pengajar_id,
                            $p['nip'],
                            $p['nama'],
                            $p['jenis_kelamin'],
                            $p['tempat_lahir'],
                            $p['tgl_lahir'],
                            $p['alamat'],
                            $p['foto'],
                            $status_id
                        );
                    }
                }

                $label = '';
                if (!empty($status_id)) {
                    $label_status = array('Pending', 'Aktif', 'Blocking');
                    $label .= 'status = '.$label_status[$status_id];
                }

                $this->session->set_flashdata('pengajar', get_alert('success', 'Pengajar berhasil diperbaharui ('.$label.').'));
                redirect('pengajar/filter');

            } else {
                $this->session->set_flashdata('pengajar', get_alert('warning', 'Tidak ada pengajar yang dipilih.'));
                redirect('pengajar/filter');
            }

        } else {
            redirect('pengajar/filter');
        }
    }

    function jadwal()
    {
        if (!is_pengajar()) {
            redirect('pengajar');
        }

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

        $data['pengajar']       = $this->pengajar_model->retrieve(get_sess_data('user', 'id'));
        $data['pengajar_login'] = $this->login_model->retrieve(get_sess_data('login', 'id'));
        $data['status_id']      = get_sess_data('user', 'status_id');

        $this->twig->display('pp-jadwal-pengajar.html', $data);
    }
}
