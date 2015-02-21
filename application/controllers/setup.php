<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('login_model', 'pengajar_model', 'config_model'));

        //ambil salah satu admin
        $admin = $this->login_model->retrieve(null, null, null, null, null, 1);
        if (!empty($admin)) {
            redirect('welcome', 'refresh');
        }

        $this->form_validation->set_error_delimiters('<span class="text-error"><i class="icon-info-sign"></i> ', '</span>');
    }

    function index()
    {
        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'web_title'  => 'Setup E-Learning System',
                'form_open'  => form_open('setup', array('autocomplete' => 'off', 'class' => 'form-vertical')),
                'form_close' => form_close(),
                'info'       => 'Selamat datang di <b>Learning Content Management System (LMS)</b>. 
                                <br>Lengkapi bebarapa informasi pada form di bawah untuk memulai menggunakan LMS ini:'
            );

            $data = array_merge(default_parser_item(), $data);
            $this->parser->parse('setup', $data);

        } else {

            $nama_sekolah = $this->input->post('nama', TRUE);
            $alamat       = $this->input->post('alamat', TRUE);
            $email        = $this->input->post('email', TRUE);
            $password     = $this->input->post('password', TRUE);

            //insert config
            $this->config_model->create_update($nama_sekolah, $alamat);

            //insert pengajar sebagai admin
            $pengajar_id = $this->pengajar_model->create(
                $nip           = null,
                $nama          = 'Administrator',
                $jenis_kelamin = 'Laki-laki',
                $tempat_lahir  = '',
                $tgl_lahir     = null,
                $alamat        = '',
                $foto          = null,
                $status_id     = 1
            );

            //insert login
            $this->login_model->create(
                $email,
                $password,
                null,
                $pengajar_id,
                1
            );

            //redirect ke admin
            redirect('admin/login');
        }
    }
}