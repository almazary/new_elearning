<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    private $session_data;

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('config_model', 'kelas_model', 'login_model', 'mapel_model', 'materi_model', 'pengajar_model', 'siswa_model', 'tugas_model'));

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

    function ajax_post($act = '')
    {
        if (!empty($act)) {
            switch ($act) {
                case 'hirarki_kelas':
                    
                    $o = 1;
                    foreach ((array)$_POST['list'] as $id => $parent_id){
                        if (!is_numeric($parent_id)) {
                            $parent_id = null;
                        }
                        $retrieve = $this->kelas_model->retrieve($id);

                        //update
                        $this->kelas_model->update($id, $retrieve['nama'], $parent_id, $o, $retrieve['aktif']);

                        $o++;
                    }

                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    function mapel($act = 'list', $segment_3 = '')
    {
        $this->most_login();

        $data = array(
            'web_title'     => 'Manajemen Matapelajaran | Administrator',
            'menu_file'     => path_theme('admin_menu.php'),
            'content_file'  => path_theme('admin_manajemen_mapel.php'),
            'uri_segment_1' => $this->uri->segment(1),
            'uri_segment_2' => $this->uri->segment(2),
        );

        switch ($act) {
            case 'detail':
                $id = (int)$segment_3;

                //ambil satu
                $retrieve = $this->mapel_model->retrieve($id);
                if (empty($retrieve)) {
                    redirect('admin/mapel');
                }

                $data['module_title']     = anchor('admin/mapel', 'Manajemen Matapelajaran').' / Detail';
                $data['sub_content_file'] = path_theme('admin_detail_mapel.php');
                $data['mapel']            = $retrieve;

                break;

            case 'add':
                $data['module_title']     = anchor('admin/mapel', 'Manajemen Matapelajaran').' / Tambah';
                $data['sub_content_file'] = path_theme('admin_add_mapel.php');
                $data['comp_js']          = get_tinymce('info');

                if ($this->form_validation->run() == TRUE) {
                    //buat mapel
                    $nama = $this->input->post('nama', TRUE);
                    $info = $this->input->post('info', TRUE);
                    $this->mapel_model->create($nama, $info);

                    $this->session->set_flashdata('mapel', get_alert('success', 'Matapelajaran baru berhasil di simpan'));
                    redirect('admin/mapel');
                }

                break;
            
            default:
            case 'list':
                $data['module_title']     = 'Manajemen Matapelajaran';
                $data['sub_content_file'] = path_theme('admin_list_mapel.php');

                $page_no = (int)$segment_3;

                if (empty($page_no)) {
                    $page_no = 1;
                }

                //ambil semua data mepel
                $retrieve_all = $this->mapel_model->retrieve_all(10, $page_no);

                $data['mapels']     = $retrieve_all['results'];
                $data['pagination'] = $this->pager->view($retrieve_all, 'admin/mapel/list/');

                break;
        }

        $data = array_merge(default_parser_item(), $data);
        $this->parser->parse(get_active_theme().'/main_private', $data);
    }

    function kelas($act = 'list', $id = '')
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
            case 'edit':
                
                $id = (int)$id;

                $kelas = $this->kelas_model->retrieve($id);
                if (empty($kelas)) {
                    redirect('admin/kelas');
                }

                $data['sub_content_file'] = path_theme('admin_edit_kelas.php');
                $data['kelas'] = $kelas;

                if ($this->form_validation->run('admin/kelas/edit') == TRUE) {
                    $nama  = $this->input->post('nama', TRUE);
                    $aktif = $this->input->post('status', TRUE);
                    if (empty($aktif)) {
                        $aktif = 0;
                    }

                    //update kelas
                    $this->kelas_model->update($id, $nama, $kelas['parent_id'], $kelas['urutan'], $aktif);

                    $this->session->set_flashdata('kelas', get_alert('success', $kelas['nama'].' berhasil di perbaharui'));
                    redirect('admin/kelas');
                }

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
                    <a href="'.site_url('admin/kelas/edit/'.$m['id']).'" title="Edit"><i class="icon icon-edit"></i>Edit</a>
                </span>';
                if ($m['aktif'] == 1) {
                    $str_kelas .= '<b>'.$m['nama'].'</b>';
                } else {
                    $str_kelas .= '<b class="text-muted">'.$m['nama'].'</b>';
                }
            $str_kelas .= '</div>';
            
                $this->kelas_hirarki($str_kelas, $m['id'], $order);
            $str_kelas .= '</li>';
        }
        
        if(count($kelas) > 0){
            $str_kelas .= '</ol>';
        }
    }
}