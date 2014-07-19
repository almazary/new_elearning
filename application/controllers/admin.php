<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    private $session_data;

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('login_model', 'pengajar_model', 'kelas_model'));

        $this->form_validation->set_error_delimiters('<span class="text-error"><i class="icon-info-sign"></i> ', '</span>');

        $this->session_data = $this->session->userdata('admin');
    }

    private function most_login()
    {
        if (empty($this->session_data)) {
            redirect('admin/login');
        }
    }

    function index()
    {
        $this->most_login();

        $data = array(
            'web_title'     => 'Dashboard | Administrator',
            'menu_file'     => path_theme('admin_menu.php'),
            'content_file'  => path_theme('admin_dashboard.php'),
            'uri_segment_1' => $this->uri->segment(1),
            'uri_segment_2' => $this->uri->segment(2)
        );

        $data = array_merge(default_parser_item(), $data);
        $this->parser->parse(get_active_theme().'/main_private', $data);
    }

    function login()
    {
        if ($this->form_validation->run() == TRUE) {

            $email    = $this->input->post('email', TRUE);
            $password = md5($this->input->post('password', TRUE));

            $get_login = $this->login_model->retrieve(null, $email, $password, null, null, 1);

            if (empty($get_login)) {
                $this->session->set_flashdata('login', get_alert('warning', 'Akun tidak ditemukan'));
                redirect('admin/login');
            } else {
                //create session admin
                $get_pengajar = $this->pengajar_model->retrieve($get_login['pengajar_id']);

                //unset password admin
                unset($get_login['password']);

                $set_session['admin'] = array(
                    'login' => $get_login,
                    'pengajar' => $get_pengajar
                );

                $this->session->set_userdata($set_session);

                redirect('admin');
            }

        } else {

            $data = array(
                'web_title'    => 'Login | Administrator',
                'content_file' => path_theme('admin_login.php'),
                'form_open'    => form_open('admin/login', array('autocomplete' => 'off', 'class' => 'form-vertical')),
                'form_close'   => form_close()
            );

            $data = array_merge(default_parser_item(), $data);
            $this->parser->parse(get_active_theme().'/main_public', $data);

        }
    } 

    function logout()
    {
        $set_session['admin'] = '';

        $this->session->set_userdata($set_session);

        redirect('admin/login');
    }

    function kelas($act = 'list')
    {
        $this->most_login();

        $data = array(
            'web_title'     => 'Manajemen Kelas | Administrator',
            'menu_file'     => path_theme('admin_menu.php'),
            'uri_segment_1' => $this->uri->segment(1),
            'uri_segment_2' => $this->uri->segment(2),
            'content_file'  => path_theme('admin_manajemen_kelas.php'),
            'module_title'  => 'Manajemen Kelas',
            'comp_css'      => load_comp_css(array(base_url('assets/comp/nestedSortable/nestedSortable.css'))),
            'comp_js'       => load_comp_js(array(base_url('assets/comp/nestedSortable/jquery.mjs.nestedSortable.js')))
        );

        switch ($act) {
            case 'add':
                
                $data['module_title']     = anchor('admin/kelas', 'Daftar Kelas').' / Tambah Kelas';
                $data['sub_content_file'] = path_theme('admin_add_kelas.php');
                break;
            
            default:
            case 'list':
                
                $data['sub_content_file'] = path_theme('admin_add_kelas.php');

                if ($this->form_validation->run() == TRUE) {

                    //insert kelas
                    $nama = $this->input->post('nama', TRUE);
                    $this->kelas_model->create($nama);

                    $this->session->set_flashdata('kelas', get_alert('success', 'Kelas berhasil di tambah'));
                    redirect('admin/kelas');
            
                }

                break;
        }

        $str_kelas = '';
        $this->kelas_hirarki($str_kelas);
        $data['kelas_hirarki'] = $str_kelas;

        $data = array_merge(default_parser_item(), $data);
        $this->parser->parse(get_active_theme().'/main_private', $data);
    }

    private function kelas_hirarki(&$str_kelas = "", $parent_id = null, $order = 0){
        $kelas = $this->kelas_model->retrieve_all($parent_id);
        if(count($kelas) > 0){
            if(is_null($parent_id)){
                $str_kelas .= '<ol class="sortable">';
            }else{
                $str_kelas .= '<ol>';
            }
        }
        
        foreach ($kelas as $m){
            $order++;
            $str_kelas .= '<li id="list_'.$m['id'].'">
            <div>
                <span class="disclose"><span>
                </span></span>
                <span class="pull-right">
                    <a href="" title="Edit"><i class="icon icon-edit"></i>Edit</a>
                </span>
                <b>'.$m['nama'].'</b> 
            </div>';
            
                $this->kelas_hirarki($str_kelas, $m['id'], $order);
            $str_kelas .= '</li>';
        }
        
        if(count($kelas) > 0){
            $str_kelas .= '</ol>';
        }
    }
}