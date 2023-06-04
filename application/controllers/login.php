<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class untuk resource login
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

                # cari last login
                $last_log = $this->login_model->retrieve_last_log($get_login['id']);
                if (!empty($last_log)) {
                    # cek last_activitynya, jika kurang dari 2 menit
                    $time_minus = strtotime("-2 minutes", time());
                    if ($last_log['last_activity'] > $time_minus) {
                        # ini berarti ada yang masih login, cek ip dan browsernya
                        $last_agent = json_decode($last_log['agent'], 1);
                        $current_ip = get_ip();
                        $current_browser =($this->agent->is_browser()) ? $this->agent->browser() . ' ' . $this->agent->version() : '';

                        if ($current_ip != $last_agent['ip'] OR $current_browser != $last_agent['browser']) {
                            # cari selisih
                            $selisih = lama_pengerjaan(date("Y-m-d H:i:s", $last_log['last_activity']), date("Y-m-d H:i:s", $time_minus), "%i menit %s detik");

                            # atur pesan
                            $error_msg = "Akun anda sedang digunakan untuk login dengan IP {$last_agent['ip']}.";
                            if ($current_ip == $last_agent['ip'] AND $current_browser != $last_agent['browser']) {
                                $error_msg .= "<br><br>Jika anda hanya ganti browser, mohon tunggu {$selisih} dari sekarang.";
                            }

                            $this->session->set_flashdata('login', get_alert('warning', $error_msg));
                            redirect('login');
                        }
                    }
                }

                # create log
                $log_id = $this->login_model->create_log($get_login['id']);
                $get_login['log_id'] = $log_id;

                $data_session[$user_type] = array(
                    'login' => $get_login,
                    'user'  => $user
                );

                # setup folder
                if ($user_type == 'admin') {
                    $data_session['path_userfiles'] = 'userfiles/';
                } else {
                    $data_session['path_userfiles'] = 'userfiles/uploads/' . $get_login['id'] . '/';
                }
                $data_session['last_time_activity']  = time();

                $_SESSION['login_' . APP_PREFIX] = $data_session;

                redirect('welcome');
            }
        }

        $data['sliders'] = $this->config_model->get_all_slider_img();

        if (!empty($data['sliders'])) {
            # panggil nivoslider
            $html_js = load_comp_js(array(
                base_url('assets/comp/nivoslider/jquery.nivo.slider.pack.js'),
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
        # update last activity
        $time_minus = strtotime("-2 minutes", time());
        $this->login_model->update_last_activity(get_sess_data('login', 'log_id'), $time_minus);

        $this->session->set_userdata('filter_pengajar', null);
        $this->session->set_userdata('filter_materi', null);
        $this->session->set_userdata('filter_tugas', null);
        $this->session->set_userdata('filter_siswa', null);
        $this->session->set_userdata('mengerjakan_tugas', null);
        $this->session->set_userdata('hide_countdown', null);
        $_SESSION['login_' . APP_PREFIX] = null;

        redirect('login/index');
    }

    function pp()
    {
        must_login();

        if (is_pengajar()) {
            # panggil colorbox
            $html_js = load_comp_js(array(
                base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
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

                $status_id = get_pengaturan('status-registrasi-siswa', 'value');
                $status_id = (int)$status_id;

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
                    $status_id
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

                # jika langsung aktif
                if ($status_id == 1) {
                    # kirim email aktifasi
                    @kirim_email_approve_siswa($siswa_id);

                    $pesan = "Registrasi sebagai siswa berhasil, silakan " . anchor('login/index', 'LOG IN') . " ke sistem.";
                } else {
                    # kirim email registrasi
                    @kirim_email('email-template-register-siswa', $username, array(
                        'nama'         => $nama,
                        'nama_sekolah' => get_pengaturan('nama-sekolah', 'value')
                    ));

                    $pesan = "Registrasi sebagai siswa berhasil, tunggu pengaktifan akun oleh admin.";
                }

                $this->session->set_flashdata('register', get_alert('success', $pesan));
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

                $status_id = get_pengaturan('status-registrasi-pengajar', 'value');
                $status_id = (int)$status_id;

                # simpan data pengajar
                $pengajar_id = $this->pengajar_model->create(
                    $nip,
                    $nama,
                    $jenis_kelamin,
                    $tempat_lahir,
                    $tanggal_lahir,
                    $alamat,
                    $foto,
                    $status_id
                );

                # simpan data login
                $this->login_model->create(
                    $username,
                    $password,
                    null,
                    $pengajar_id,
                    $is_admin
                );

                if ($status_id == 1) {
                    @kirim_email_approve_pengajar($pengajar_id);

                    $pesan = "Registrasi sebagai pengajar berhasil, silakan " . anchor('login/index', 'LOG IN') . " ke sistem.";
                } else {
                    # kirim email registrasi
                    @kirim_email('email-template-register-pengajar', $username, array(
                        'nama'         => $nama,
                        'nama_sekolah' => get_pengaturan('nama-sekolah', 'value')
                    ));

                    $pesan = "Registrasi sebagai pengajar berhasil, tunggu pengaktifan akun oleh admin.";
                }

                $this->session->set_flashdata('register', get_alert('success', $pesan));
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
            $email = $this->input->post('email', true);
            $cache_key = "lupa_password_{$email}";

            # jika sudah ada dalam cache gak perlu dikirim ulang
            if ($this->cache->get($cache_key)) {
                $this->session->set_flashdata('lupa_password', get_alert('success', 'Link reset sudah dikirim sebelumnya, silakan cek email Anda.'));
                return redirect('login/lupa_password');
            }

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

            # save cache
            $this->cache->save($cache_key, date('Y-m-d H:i:s'), 60 * 3);

            $this->session->set_flashdata('lupa_password', get_alert('success', 'Link reset password telah dikirimkan ke email anda.'));
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

            # delete cache
            $cache_key = "lupa_password_{$login['username']}";
            $this->cache->delete($cache_key);

            $this->session->set_flashdata('login', get_alert('success', 'Password berhasil diperbaharui, silahkan login menggunakan password baru anda.'));
            redirect('login');
        }

        $data['login'] = $login;
        $this->twig->display('reset-password.html', $data);
    }

    function login_log($segment_3 = "", $segment_4 = "")
    {
        must_login();

        $login_id = (int)$segment_3;
        if (empty($login_id)) {
            $login_id = get_sess_data('login', 'id');
            redirect('login/login_log/' . $login_id);
        }

        $login = $this->login_model->retrieve($login_id);
        if (empty($login)) {
            show_error("Login ID tidak ditemukan.");
        }

        if (!is_admin() AND $login['id'] != get_sess_data('login', 'id')) {
            redirect('login/login_log/' . get_sess_data('login', 'id'));
        }

        $page_no = (int)$segment_4;
        if (empty($page_no)) {
            $page_no = 1;
        }

        # ambil data login log
        $retrieve_all = $this->login_model->retrieve_all_log(20, $page_no, $login['id']);

        # format tgl
        foreach ($retrieve_all['results'] as $key => $val) {
            if (belum_sehari($val['lasttime'])) {
                $retrieve_all['results'][$key]['timeago'] = iso8601($val['lasttime']);
            }

            $retrieve_all['results'][$key]['lasttime'] = format_datetime($val['lasttime']);
        }

        $data['log'] = $retrieve_all['results'];
        $data['pagination'] = $this->pager->view($retrieve_all, 'login/login_log/' . $login['id'] . '/');

        $this->twig->display('list-login-log.html', $data);
    }

    /**
     * Method untuk cek sudah login atau belum
     * @return boolean
     * @since  1.8
     */
    function data_onload()
    {
        if (!is_ajax()) {
            die;
        }

        $return = array(
            'is_user_logged_in' => is_login() ? '1' : '0',
            'sedang_ujian' => $this->sedang_ujian() ? '1' : '0',
        );

        echo json_encode($return);
    }

    /**
     * Method untuk redirect karna session telah expired
     * @since  1.8
     */
    function sess_expired()
    {
        $this->session->set_flashdata('login', get_alert('warning', "Session login anda telah habis, silakan login kembali."));
        $this->logout();
    }
}
