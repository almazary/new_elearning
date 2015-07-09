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

            $get_login = $this->login_model->retrieve(null, $email, $password, null, null, 1);

            if (empty($get_login)) {
                $this->session->set_flashdata('login', get_alert('warning', 'Maaf akun tidak ditemukan.'));
                redirect('admin/login');
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
                    redirect('admin/login');
                }

                $data_session['login_' . APP_PREFIX][$user_type] = array(
                    'login' => $get_login,
                    'user'  => $user
                );

                $this->session->set_userdata($data_session);

                $_SESSION['E-LEARNING']['KCFINDER']              = array();
                $_SESSION['E-LEARNING']['KCFINDER']['disabled']  = false;
                $_SESSION['E-LEARNING']['KCFINDER']['uploadURL'] = base_url('assets/uploads/');
                $_SESSION['E-LEARNING']['KCFINDER']['uploadDir'] = "";

                redirect('welcome');
            }
        }

        $this->twig->display('login.html');
    }

    function logout()
    {
        unset($_SESSION['E-LEARNING']);
        $this->session->set_userdata('login_' . APP_PREFIX, null);

        redirect('login');
    }
}