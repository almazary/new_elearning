<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{
    function index()
    {
        if (is_login()) {
            redirect('welcome');
        }

        if ($this->form_validation->run('login') == TRUE) {
            $email    = $this->input->post('email', TRUE);
            $password = md5($this->input->post('password', TRUE));

            $get_login = $this->login_model->retrieve(null, $email, $password);

            if (empty($get_login)) {
                $this->session->set_flashdata('login', get_alert('warning', 'Maaf akun tidak ditemukan.'));
                redirect('login');
            } else {
                # cari user yang login
                if (!empty($get_login['pengajar_id'])) {
                    $user = $this->pengajar_model->retrieve($get_login['pengajar_id']);

                    $user_type = empty($get_login['is_admin']) ? 'pengajar' : 'admin';

                } elseif (!empty($get_login['siswa_id'])) {
                    $user = $this->siswa_model->retrieve($get_login['siswa_id']);

                    $user_type = 'siswa';
                }

                # cek jika user berstatus tidak aktif
                if ($user['status_id'] != 1) {
                    $this->session->set_flashdata('login', get_alert('warning', 'Maaf status anda tidak aktif.'));
                    redirect('login');
                }

                $data_session['login_' . APP_PREFIX][$user_type] = array(
                    'login' => $get_login,
                    'user'  => $user
                );

                $this->session->set_userdata($data_session);

                create_sess_kcfinder($get_login['id']);

                redirect('welcome');
            }
        }

        $data['sliders'] = $this->config_model->get_all_slider_img();

        if (!empty($data['sliders'])) {
            # panggil colorbox
            $html_js = load_comp_js(array(
                base_url('assets/comp/nivoslider/jquery.nivo.slider.pack.js'),
                base_url('assets/comp/nivoslider/setup.js'),
            ));
            $data['comp_js']  = $html_js;
            $data['comp_css'] = load_comp_css(array(
                base_url('assets/comp/nivoslider/nivo-slider.css'),
                base_url('assets/comp/nivoslider/themes/light/light.css'),
            ));
        }

        $this->twig->display('login.html', $data);
    }

    function logout()
    {
        $_SESSION['E-LEARNING'] = array();
        $this->session->set_userdata('login_' . APP_PREFIX, null);
        $this->session->set_userdata('filter_pengajar', null);
        $this->session->set_userdata('filter_materi', null);
        $this->session->set_userdata('filter_tugas', null);
        $this->session->set_userdata('filter_siswa', null);
        $this->session->set_userdata('mengerjakan_tugas', null);

        redirect('login/index');
    }

    function pp()
    {
        must_login();

        if (is_pengajar()) {
            # panggil colorbox
            $html_js = load_comp_js(array(
                base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                base_url('assets/comp/colorbox/act-pengajar.js')
            ));
            $data['comp_js']  = $html_js;
            $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

            $data['pengajar']       = $this->pengajar_model->retrieve(get_sess_data('user', 'id'));
            $data['pengajar_login'] = $this->login_model->retrieve(get_sess_data('login', 'id'));
            $data['status_id']      = get_sess_data('user', 'status_id');

            $this->twig->display('pp-pengajar.html', $data);
        }

        if (is_siswa()) {
            $retrieve_siswa     = $this->siswa_model->retrieve(get_sess_data('user', 'id'));
            $retrieve_login     = $this->login_model->retrieve(get_sess_data('login', 'id'));
            $retrieve_all_kelas = $this->kelas_model->retrieve_all_siswa(10, 1, array('siswa_id' => $retrieve_siswa['id']));

            $data['siswa']       = $retrieve_siswa;
            $data['siswa_login'] = $retrieve_login;
            $data['siswa_kelas'] = $retrieve_all_kelas;
            $data['status_id']   = get_sess_data('user', 'status_id');

            # panggil colorbox
            $html_js = load_comp_js(array(
                base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                base_url('assets/comp/colorbox/act-siswa.js')
            ));
            $data['comp_js']  = $html_js;
            $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

            $data['show'] = !empty($_GET['show']) ? $_GET['show'] : '';

            $this->twig->display('pp-siswa.html', $data);
        }
    }

    function register($sebagai = 'siswa')
    {
        if (is_login()) {
            redirect('welcome');
        }

        # cek fitur
        $registrasi_siswa    = get_pengaturan('registrasi-siswa', 'value');
        $registrasi_pengajar = get_pengaturan('registrasi-pengajar', 'value');
        if (empty($registrasi_siswa) && empty($registrasi_pengajar)) {
            redirect('login');
        }

        $sebagai = empty($sebagai) ? 'siswa' : $sebagai;
        $allow_register = array('siswa', 'pengajar');
        if (!in_array($sebagai, $allow_register)) {
            redirect('login/register');
        }

        if (empty($registrasi_siswa) && $sebagai == 'siswa') {
            redirect('login/register/pengajar');
        }

        if (empty($registrasi_pengajar) && $sebagai == 'pengajar') {
            redirect('login/register/siswa');
        }

        $data = array();
        if ($sebagai == 'siswa') {
            if ($this->form_validation->run('register/siswa') == true) {
                $nis           = $this->input->post('nis', TRUE);
                $nama          = $this->input->post('nama', TRUE);
                $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
                $tahun_masuk   = $this->input->post('tahun_masuk', TRUE);
                $kelas_id      = $this->input->post('kelas_id', TRUE);
                $tempat_lahir  = $this->input->post('tempat_lahir', TRUE);
                $tgl_lahir     = $this->input->post('tgl_lahir', TRUE);
                $bln_lahir     = $this->input->post('bln_lahir', TRUE);
                $thn_lahir     = $this->input->post('thn_lahir', TRUE);
                $agama         = $this->input->post('agama', TRUE);
                $alamat        = $this->input->post('alamat', TRUE);
                $username      = $this->input->post('username', TRUE);
                $password      = $this->input->post('password2', TRUE);

                if (empty($thn_lahir)) {
                    $tanggal_lahir = null;
                } else {
                    $tanggal_lahir = $thn_lahir.'-'.$bln_lahir.'-'.$tgl_lahir;
                }

                $foto = null;

                # simpan data siswa
                $siswa_id = $this->siswa_model->create(
                    $nis,
                    $nama,
                    $jenis_kelamin,
                    $tempat_lahir,
                    $tanggal_lahir,
                    $agama,
                    $alamat,
                    $tahun_masuk,
                    $foto,
                    0
                );

                # simpan data login
                $this->login_model->create(
                    $username,
                    $password,
                    $siswa_id,
                    null
                );

                # simpan kelas siswa
                $this->kelas_model->create_siswa(
                    $kelas_id,
                    $siswa_id,
                    1
                );

                # kirim email registrasi
                @kirim_email('email-template-register-siswa', $username, array(
                    'nama'         => $nama,
                    'nama_sekolah' => get_pengaturan('nama-sekolah', 'value')
                ));

                $this->session->set_flashdata('register', get_alert('success', 'Terimakasih telah melakukan registrasi sebagai siswa, tunggu pengaktifan akun oleh admin.'));
                redirect('login/register/siswa');
            }

            $data['kelas'] = $this->kelas_model->retrieve_all_child();
        }

        # jika pengajar
        elseif ($sebagai == 'pengajar') {
            if ($this->form_validation->run('register/pengajar') == true) {
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
                $is_admin      = 0;
                $foto          = null;

                if (empty($thn_lahir)) {
                    $tanggal_lahir = null;
                } else {
                    $tanggal_lahir = $thn_lahir.'-'.$bln_lahir.'-'.$tgl_lahir;
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
                    0
                );

                # simpan data login
                $this->login_model->create(
                    $username,
                    $password,
                    null,
                    $pengajar_id,
                    $is_admin
                );

                # kirim email registrasi
                @kirim_email('email-template-register-pengajar', $username, array(
                    'nama'         => $nama,
                    'nama_sekolah' => get_pengaturan('nama-sekolah', 'value')
                ));

                $this->session->set_flashdata('register', get_alert('success', 'Terimakasih telah melakukan registrasi sebagai pengajar, tunggu pengaktifan akun oleh admin.'));
                redirect('login/register/pengajar');
            }
        }


        $data['sebagai'] = $sebagai;

        $this->twig->display('register.html', $data);
    }

    function lupa_password()
    {
        if (is_login()) {
            redirect('welcome');
        }

        $data = array();
        if ($this->form_validation->run('lupa_password') == true) {
            # retrieve
            $retrieve = $this->login_model->retrieve(
                $id          = null,
                $username    = $this->input->post('email', true)
            );

            $reset_kode = md5(time());

            # set reset kode
            $this->login_model->update(
                $id          = $retrieve['id'],
                $username    = $retrieve['username'],
                $siswa_id    = $retrieve['siswa_id'],
                $pengajar_id = $retrieve['pengajar_id'],
                $is_admin    = $retrieve['is_admin'],
                $reset_kode  = $reset_kode
            );

            # kirim email disini
            @kirim_email('email-template-link-reset', $retrieve['username'], array(
                'link_reset' => site_url('login/reset_password/' . $reset_kode)
            ));

            $this->session->set_flashdata('lupa_password', get_alert('success', 'Link reset password telah dikirimkan keemail anda.'));
            redirect('login/lupa_password');
        }

        $this->twig->display('lupa-password.html', $data);
    }

    function reset_password($kode = '')
    {
        if (empty($kode)) {
            redirect('welcome/lupa_password');
        }

        $login = $this->login_model->retrieve(
            $id          = null,
            $username    = null,
            $password    = null,
            $siswa_id    = null,
            $pengajar_id = null,
            $is_admin    = null,
            $reset_kode  = $kode
        );

        if (empty($login)) {
            $this->session->set_flashdata('lupa_password', get_alert('warning', 'Reset kode tidak benar.'));
            redirect('login/lupa_password');
        }

        if ($this->form_validation->run('reset_password') == true) {
            # update password
            $this->login_model->update_password(
                $login['id'],
                $this->input->post('password', true)
            );

            # update reset kode
            $this->login_model->update(
                $id          = $login['id'],
                $username    = $login['username'],
                $siswa_id    = $login['siswa_id'],
                $pengajar_id = $login['pengajar_id'],
                $is_admin    = $login['is_admin'],
                $reset_kode  = null
            );

            $this->session->set_flashdata('login', get_alert('success', 'Password berhasil diperbaharui, silahkan login menggunakan password baru anda.'));
            redirect('login');
        }

        $data['login'] = $login;
        $this->twig->display('reset-password.html', $data);
    }
}
