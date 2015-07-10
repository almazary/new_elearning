<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengajar extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        must_login();
    }

    function index($segment_3 = '', $segment_4 = '')
    {
        # harus login sebagai admin
        if (!is_admin()) {
            redirect('welcome');
        }

        $status_id = $segment_3;
        if ($status_id == '' OR $status_id > 2) {
            $status_id = 1;
        }

        $page_no = (int)$segment_4;
        if (empty($page_no)) {
            $page_no = 1;
        }

        # ambil semua data pengajar
        $retrieve_all = $this->pengajar_model->retrieve_all(20, $page_no, $status_id);

        $data['status_id']  = $status_id;
        $data['pengajar']   = $retrieve_all['results'];
        $data['pagination'] = $this->pager->view($retrieve_all, 'pengajar/index/'.$status_id.'/');

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
            base_url('assets/comp/colorbox/act-pengajar.js')
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
                }
            }

            redirect('pengajar/index/'.$status_id);
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
        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        $retrieve_login = $this->login_model->retrieve(null, null, null, null, $retrieve_pengajar['id']);
        $retrieve_pengajar['is_admin'] = $retrieve_login['is_admin'];

        $data['status_id']    = $status_id;
        $data['pengajar_id']  = $pengajar_id;
        $data['pengajar']     = $retrieve_pengajar;

        if ($this->form_validation->run('pengajar/edit_profile') == TRUE) {
            $nip           = $this->input->post('nip', TRUE);
            $nama          = $this->input->post('nama', TRUE);
            $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
            $tempat_lahir  = $this->input->post('tempat_lahir', TRUE);
            $tgl_lahir     = $this->input->post('tgl_lahir', TRUE);
            $bln_lahir     = $this->input->post('bln_lahir', TRUE);
            $thn_lahir     = $this->input->post('thn_lahir', TRUE);
            $alamat        = $this->input->post('alamat', TRUE);
            $status        = $this->input->post('status_id', TRUE);
            $is_admin      = $this->input->post('is_admin', TRUE);

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

            $this->session->set_flashdata('edit', get_alert('success', 'Profil pengajar berhasil diperbaharui.'));
            redirect('pengajar/edit_profile/'.$status_id.'/'.$pengajar_id);
        }

        $this->twig->display('edit-pengajar-profile.html', $data);
    }

    function edit_picture($segment_3 = '', $segment_4 = '')
    {
        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

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

        if ($this->upload->do_upload()) {

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
        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        $data['status_id']    = $status_id;
        $data['pengajar_id']  = $pengajar_id;
        $data['login']        = $this->login_model->retrieve(null, null, null, null, $pengajar_id);

        if ($this->form_validation->run('pengajar/edit_username') == TRUE) {
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
        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        $data['status_id']    = $status_id;
        $data['pengajar_id']  = $pengajar_id;

        $retrieve_login = $this->login_model->retrieve(null, null, null, null, $pengajar_id);

        if ($this->form_validation->run('pengajar/edit_password') == TRUE) {
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
        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        $retrieve_login = $this->login_model->retrieve(null, null, null, null, $retrieve_pengajar['id']);

        $data['pengajar']       = $retrieve_pengajar;
        $data['pengajar_login'] = $retrieve_login;
        $data['status_id']      = $status_id;

        //panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
            base_url('assets/comp/colorbox/act-pengajar.js')
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

        $this->twig->display('detail-pengajar.html', $data);
    }

    function add_ampuan($segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
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

        $data['comp_js'] = load_comp_js(array(
            base_url('assets/comp/jquery/ajax.js')
        ));

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
        $status_id         = (int)$segment_3;
        $pengajar_id       = (int)$segment_4;
        $ma_id             = (int)$segment_5;
        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
        if (empty($retrieve_pengajar)) {
            exit('Data Pengajar tidak ditemukan');
        }

        $retrieve_ma = $this->pengajar_model->retrieve_ma($ma_id);
        if (empty($retrieve_ma)) {
            exit('Mapel Ajar tidak ditemukan');
        }

        $retrieve_mk = $this->mapel_model->retrieve_kelas($retrieve_ma['mapel_kelas_id']);

        $data['comp_js'] = load_comp_js(array(
            base_url('assets/comp/jquery/ajax.js')
        ));

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
}
