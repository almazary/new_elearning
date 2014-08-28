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

    private function refresh_session_data($login = null, $pengajar = null)
    {
        $get_login = $this->login_model->retrieve($this->session_data['login']['id']);
        $get_pengajar = $this->pengajar_model->retrieve($this->session_data['pengajar']['id']);

        $set_session['admin'] = array(
            'login' => $get_login,
            'pengajar' => $get_pengajar
        );

        $this->session->set_userdata($set_session);
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

                $_SESSION['KCFINDER'] = array();
                $_SESSION['KCFINDER']['disabled'] = false;
                $_SESSION['KCFINDER']['uploadURL'] = base_url('assets/uploads/');
                $_SESSION['KCFINDER']['uploadDir'] = "";

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

        $this->session->sess_destroy();

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

    function siswa($act = 'list', $segment_3 = '1', $segment_4 = '', $segment_5 = '')
    {
        $this->most_login();

        $iframe = false;

        $data = array(
            'web_title'     => 'Data Siswa | Administrator',
            'menu_file'     => path_theme('admin_menu.php'),
            'content_file'  => path_theme('admin_siswa/index.php')
        );

        switch ($act) {
            case 'add':
                $status_id = (int)$segment_3;
                if ($status_id < 0 OR $status_id > 3) {
                    redirect('admin/siswa/list/1');
                }

                $data['module_title']     = anchor('admin/siswa/list/'.$status_id, 'Data Siswa').' / Tambah Siswa';
                $data['sub_content_file'] = path_theme('admin_siswa/add.php');
                $data['status_id']        = $status_id;
                $data['kelas']            = $this->kelas_model->retrieve_all_child();

                $config['upload_path']   = get_path_image();
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = '0';
                $config['max_width']     = '0';
                $config['max_height']    = '0';
                $config['file_name']     = 'siswa-'.url_title($this->input->post('nis', TRUE), '-', true);
                $this->load->library('upload', $config);

                if (!empty($_FILES['userfile']['tmp_name']) AND !$this->upload->do_upload()) {
                    $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
                    $error_upload = true;
                } else {
                    $data['error_upload'] = '';
                    $error_upload = false;
                }

                if ($this->form_validation->run('admin/siswa/add') == TRUE AND !$error_upload) {
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

                    if (!empty($_FILES['userfile']['tmp_name'])) {
                        $upload_data = $this->upload->data();

                        //create thumb small
                        $this->create_img_thumb(
                            get_path_image($upload_data['file_name']),
                            '_small',
                            '50',
                            '50'
                        );

                        //create thumb medium
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

                    //simpan data siswa
                    $siswa_id = $this->siswa_model->create(
                        $nis,
                        $nama,
                        $jenis_kelamin,
                        $tempat_lahir,
                        $thn_lahir.'-'.$bln_lahir.'-'.$tgl_lahir,
                        $agama,
                        $alamat,
                        $tahun_masuk,
                        $foto,
                        1
                    );

                    //simpan data login
                    $this->login_model->create(
                        $username,
                        $password,
                        $siswa_id,
                        null
                    );

                    //simpan kelas siswa
                    $this->kelas_model->create_siswa(
                        $kelas_id,
                        $siswa_id,
                        1
                    );

                    $this->session->set_flashdata('siswa', get_alert('success', 'Data siswa berhasil di simpan'));
                    redirect('admin/siswa/list/1');
                }

                break;

            case 'detail':
                $status_id = (int)$segment_3;

                $siswa_id = (int)$segment_4;
                $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
                if (empty($retrieve_siswa)) {
                    redirect('admin/siswa/list/1');
                }

                $retrieve_login = $this->login_model->retrieve(null, null, null, $retrieve_siswa['id']);
                $retrieve_all_kelas = $this->kelas_model->retrieve_all_siswa(10, 1, array('siswa_id' => $retrieve_siswa['id']));

                $data['module_title']     = anchor('admin/siswa/list/'.$status_id, 'Data Siswa').' / Detail Siswa';
                $data['sub_content_file'] = path_theme('admin_siswa/detail.php');
                $data['siswa']            = $retrieve_siswa;
                $data['siswa_login']      = $retrieve_login;
                $data['siswa_kelas']      = $retrieve_all_kelas;
                $data['status_id']        = $status_id;
                
                //panggil colorbox
                $html_js = load_comp_js(array(base_url('assets/comp/colorbox/jquery.colorbox-min.js')));
                $html_js .= '<script>
                    $(document).ready(function(){
                        $(".iframe").colorbox({iframe:true, width:"400", height:"180", fixed:true});
                    });
                </script>';
                $data['comp_js']      = $html_js;
                $data['comp_css']     = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));


                break;

            case 'moved_class':
                $status_id = (int)$segment_3;
                $siswa_id  = (int)$segment_4;
                $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
                if (empty($retrieve_siswa)) {
                    echo 'Data siswa tidak ditemukan';
                    exit();
                }

                $iframe = true;
                unset($data['content_file']);
                $data['content_file'] = path_theme('admin_siswa/moved_class.php');
                $data['kelas']        = $this->kelas_model->retrieve_all_child();
                $data['status_id']    = $status_id;
                $data['siswa_id']     = $siswa_id;

                if ($this->form_validation->run('admin/siswa/moved_class') == TRUE) {
                    $kelas_id = $this->input->post('kelas_id', TRUE);
                    $get_aktif = $this->kelas_model->retrieve_siswa(null, array(
                        'siswa_id' => $siswa_id,
                        'aktif'    => 1
                    ));
                    $this->kelas_model->update_siswa($get_aktif['id'], $get_aktif['kelas_id'], $get_aktif['siswa_id'], 0);
                        
                    $check = $this->kelas_model->retrieve_siswa(null, array(
                        'siswa_id' => $siswa_id,
                        'kelas_id' => $kelas_id
                    ));
                    if (empty($check)) {
                        $this->kelas_model->create_siswa($kelas_id, $siswa_id, 1);
                    } else {
                        $this->kelas_model->update_siswa($check['id'], $kelas_id, $siswa_id, 1);
                    }
                    echo '<script>
                        parent.jQuery.colorbox.close();
                        parent.window.location.href = "'.site_url('admin/siswa/detail/'.$status_id.'/'.$siswa_id).'"
                    </script>';
                }
                break;
            
            default:
            case 'list':
                $data['module_title']     = 'Data Siswa';
                $data['sub_content_file'] = path_theme('admin_siswa/list.php');

                $status_id = (int)$segment_3;
                if ($status_id < 0 OR $status_id > 3) {
                    $status_id = 1;
                }

                $page_no = (int)$segment_4;
                if (empty($page_no)) {
                    $page_no = 1;
                }

                //ambil semua data siswa
                $retrieve_all = $this->siswa_model->retrieve_all(50, $page_no, null, null, $status_id);

                $data['status_id']  = $status_id;
                $data['siswas']     = $retrieve_all['results'];
                $data['pagination'] = $this->pager->view($retrieve_all, 'admin/siswa/list/');
                break;
        }

        $data = array_merge(default_parser_item(), $data);
        if ($iframe) {
            $this->parser->parse(get_active_theme().'/main_iframe', $data);
        } else {
            $this->parser->parse(get_active_theme().'/main_private', $data);
        }
    }

    function adm($act = 'list', $segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
        $this->most_login();

        $data = array(
            'web_title'     => 'Data Admin | Administrator',
            'menu_file'     => path_theme('admin_menu.php'),
            'content_file'  => path_theme('admin_admin/index.php')
        );

        switch ($act) {
            case 'detail':
                $id = (int)$segment_3;
                $data['module_title'] = anchor('admin/adm/list', 'Data Administrator').' / Detail';
                $data['sub_content_file'] = path_theme('admin_admin/detail.php');

                //retrieve user login
                $retrieve_login = $this->login_model->retrieve($id);
                if (empty($retrieve_login)) {
                    redirect('admin/adm/list');
                }

                //retrieve pengajar
                $retrieve_pengajar = $this->pengajar_model->retrieve($retrieve_login['pengajar_id']);
                if (empty($retrieve_pengajar)) {
                    redirect('admin/adm/list');
                }
                
                $data['login']    = $retrieve_login;
                $data['pengajar'] = $retrieve_pengajar;

                break;

            case 'edit':
                $id = (int)$segment_3;
                $data['module_title'] = anchor('admin/adm/list', 'Data Administrator').' / Edit';
                $data['sub_content_file'] = path_theme('admin_admin/edit.php');

                //retrieve user login
                $retrieve_login = $this->login_model->retrieve($id);
                if (empty($retrieve_login)) {
                    redirect('admin/adm/list');
                }

                //retrieve pengajar
                $retrieve_pengajar = $this->pengajar_model->retrieve($retrieve_login['pengajar_id']);
                if (empty($retrieve_pengajar)) {
                    redirect('admin/adm/list');
                }
                
                $data['login']    = $retrieve_login;
                $data['pengajar'] = $retrieve_pengajar;

                $config['upload_path']   = get_path_image();
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = '0';
                $config['max_width']     = '0';
                $config['max_height']    = '0';
                $config['file_name']     = 'admin-'.url_title($this->input->post('nama', TRUE), '-', true);
                $this->load->library('upload', $config);

                if (!empty($_FILES['userfile']['tmp_name']) AND !$this->upload->do_upload()) {
                    $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
                    $error_upload = true;
                } else {
                    $data['error_upload'] = '';
                    $error_upload = false;
                }

                if ($this->form_validation->run('admin/ch_profil') == TRUE AND !$error_upload) {
                    $username = $this->input->post('username', TRUE);
                    $nama     = $this->input->post('nama', TRUE);
                    $alamat   = $this->input->post('alamat', TRUE);

                    //update username
                    $this->login_model->update(
                        $retrieve_login['id'],
                        $username,
                        null,
                        $retrieve_pengajar['id'],
                        1,
                        null
                    );

                    if (!empty($_FILES['userfile']['tmp_name'])) {

                        //hapus dulu file sebelumnya
                        $pisah = explode('.', $retrieve_pengajar['foto']);
                        if (is_file(get_path_image($retrieve_pengajar['foto']))) {
                            unlink(get_path_image($retrieve_pengajar['foto']));
                        }
                        if (is_file(get_path_image($pisah[0].'_small.'.$pisah[1]))) {
                            unlink(get_path_image($pisah[0].'_small.'.$pisah[1]));
                        }
                        if (is_file(get_path_image($pisah[0].'_medium.'.$pisah[1]))) {
                            unlink(get_path_image($pisah[0].'_medium.'.$pisah[1]));
                        }

                        $upload_data = $this->upload->data();

                        //create thumb small
                        $this->create_img_thumb(
                            get_path_image($upload_data['file_name']),
                            '_small',
                            '50',
                            '50'
                        );

                        //create thumb medium
                        $this->create_img_thumb(
                            get_path_image($upload_data['file_name']),
                            '_medium',
                            '150',
                            '150'
                        );

                        $foto = $upload_data['file_name'];

                    } else {
                        $foto = $retrieve_pengajar['foto'];
                    }

                    //update pengajar
                    $this->pengajar_model->update(
                        $retrieve_pengajar['id'],
                        $retrieve_pengajar['nip'],
                        $nama,
                        $alamat,
                        $foto,
                        $retrieve_pengajar['status_id']
                    );

                    if ($retrieve_login['id'] == $this->session_data['login']['id']) {
                        $this->refresh_session_data();
                    }

                    $this->session->set_flashdata('edit', get_alert('success', 'Data berhasil di perbaharui'));
                    redirect('admin/adm/edit/'.$id);
                }

                break;
            
            default:
            case 'list':
                $page_no = (int)$segment_3;

                $data['module_title'] = 'Data Administrator';
                $data['sub_content_file'] = path_theme('admin_admin/list.php');
                //ambil data admin
                $retrieve_all = $this->login_model->retrieve_all(10, $page_no, 1);
                $data['admins'] = $retrieve_all['results'];
                //pagination
                $data['pagination'] = $this->pager->view($retrieve_all, 'admin/adm/list/');
                break;
        }

        $data = array_merge(default_parser_item(), $data);
        $this->parser->parse(get_active_theme().'/main_private', $data);
    }

    function ch_profil()
    {
        $this->most_login();

        $data = array(
            'web_title'        => 'Ubah Profil | Administrator',
            'menu_file'        => path_theme('admin_menu.php'),
            'content_file'     => path_theme('admin_akun/index.php'),
            'sub_content_file' => path_theme('admin_akun/ch_profil.php'),
            'module_title'     => 'Profil',
            'login'            => $this->session_data['login'],
            'pengajar'         => $this->session_data['pengajar']
        );

        $config['upload_path']   = get_path_image();
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = '0';
        $config['max_width']     = '0';
        $config['max_height']    = '0';
        $config['file_name']     = 'admin-'.url_title($this->input->post('nama', TRUE), '-', true);
        $this->load->library('upload', $config);

        if (!empty($_FILES['userfile']['tmp_name']) AND !$this->upload->do_upload()) {
            $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
            $error_upload = true;
        } else {
            $data['error_upload'] = '';
            $error_upload = false;
        }

        if ($this->form_validation->run() == TRUE AND !$error_upload) {
            $username = $this->input->post('username', TRUE);
            $nama     = $this->input->post('nama', TRUE);
            $alamat   = $this->input->post('alamat', TRUE);

            //update username
            $this->login_model->update(
                $this->session_data['login']['id'],
                $username,
                null,
                $this->session_data['pengajar']['id'],
                1,
                null
            );

            if (!empty($_FILES['userfile']['tmp_name'])) {

                //hapus dulu file sebelumnya
                $pisah = explode('.', $this->session_data['pengajar']['foto']);
                if (is_file(get_path_image($this->session_data['pengajar']['foto']))) {
                    unlink(get_path_image($this->session_data['pengajar']['foto']));
                }
                if (is_file(get_path_image($pisah[0].'_small.'.$pisah[1]))) {
                    unlink(get_path_image($pisah[0].'_small.'.$pisah[1]));
                }
                if (is_file(get_path_image($pisah[0].'_medium.'.$pisah[1]))) {
                    unlink(get_path_image($pisah[0].'_medium.'.$pisah[1]));
                }

                $upload_data = $this->upload->data();

                //create thumb small
                $this->create_img_thumb(
                    get_path_image($upload_data['file_name']),
                    '_small',
                    '50',
                    '50'
                );

                //create thumb medium
                $this->create_img_thumb(
                    get_path_image($upload_data['file_name']),
                    '_medium',
                    '150',
                    '150'
                );

                $foto = $upload_data['file_name'];

            } else {
                $foto = $this->session_data['pengajar']['foto'];
            }

            //update pengajar
            $this->pengajar_model->update(
                $this->session_data['pengajar']['id'],
                $this->session_data['pengajar']['nip'],
                $nama,
                $alamat,
                $foto,
                $this->session_data['pengajar']['status_id']
            );

            $this->refresh_session_data();

            $this->session->set_flashdata('akun', get_alert('success', 'Profil berhasil di perbaharui'));
            redirect('admin/ch_profil');
        }

        $data = array_merge(default_parser_item(), $data);
        $this->parser->parse(get_active_theme().'/main_private', $data);
    }

    function check_update_username($username = '')
    {
        if (!empty($username)) {
            $this->db->where('id !=', $this->session_data['login']['id']);
            $this->db->where('username', $username);
            $result = $this->db->get('login');
            if (empty($result)) {
                return true;
            } else {
                $this->form_validation->set_message('check_username', 'Username sudah digunakan.');
                return false;
            }
        } else {
            $this->form_validation->set_message('check_username', 'Username di butuhkan.');
            return false;
        }
    }

    private function create_img_thumb($source_path = '', $marker = '_thumb', $width = '90', $height = '90')
    {
        $config['image_library']  = 'gd2';
        $config['source_image']   = $source_path;
        $config['create_thumb']   = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']          = $width;
        $config['height']         = $height;
        $config['thumb_marker']   = $marker;
        
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
        unset($config);
    }


    function ch_pass()
    {
        $this->most_login();

        $data = array(
            'web_title'        => 'Ubah Password | Administrator',
            'menu_file'        => path_theme('admin_menu.php'),
            'content_file'     => path_theme('admin_akun/index.php'),
            'sub_content_file' => path_theme('admin_akun/ch_pass.php'),
            'module_title'     => 'Ubah Password'
        );

        if ($this->form_validation->run() == TRUE) {
            $password = $this->input->post('password', TRUE);

            //update password
            $this->login_model->update_password($this->session_data['login']['id'], $password);

            $this->session->set_flashdata('akun', get_alert('success', 'Password berhasil di perbaharui'));
            redirect('admin/ch_pass');
        }

        $data = array_merge(default_parser_item(), $data);
        $this->parser->parse(get_active_theme().'/main_private', $data);
    }

    function mapel_kelas($act = 'list', $segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
        $this->most_login();

        $data = array(
            'web_title'     => 'Matapelajaran Kelas | Administrator',
            'menu_file'     => path_theme('admin_menu.php'),
            'content_file'  => path_theme('admin_mapel_kelas/index.php'),
            'uri_segment_1' => $this->uri->segment(1),
            'uri_segment_2' => $this->uri->segment(2),
        );

        switch ($act) {
            case 'remove':
                $parent_id      = (int)$segment_3;
                $kelas_id       = (int)$segment_4;
                $mapel_kelas_id = (int)$segment_5;

                //ambil parent
                $parent = $this->kelas_model->retrieve($parent_id);
                if (empty($parent)) {
                    redirect('admin/mapel_kelas');
                }

                $kelas = $this->kelas_model->retrieve($kelas_id);
                if (empty($kelas)) {
                    redirect('admin/mapel_kelas');
                }

                //hapus data 
                $this->mapel_model->delete_kelas($mapel_kelas_id);

                $this->session->set_flashdata('mapel', get_alert('warning', 'Matapelajaran kelas berhasil di hapus'));
                redirect('admin/mapel_kelas/#parent-'.$parent_id);

                break;

            case 'add':
                $parent_id = (int)$segment_3;
                $kelas_id  = (int)$segment_4;

                //ambil parent
                $parent = $this->kelas_model->retrieve($parent_id);
                if (empty($parent)) {
                    redirect('admin/mapel_kelas');
                }

                $kelas = $this->kelas_model->retrieve($kelas_id);
                if (empty($kelas)) {
                    redirect('admin/mapel_kelas');
                }

                $data['module_title']     = anchor('admin/mapel_kelas/#parent-'.$parent_id, 'Matapelajaran Kelas').' / Atur Matapelajaran';
                $data['sub_content_file'] = path_theme('admin_mapel_kelas/add.php');
                $data['kelas']            = $kelas;
                $data['parent']           = $parent;

                //ambil semua matapelajaran
                $retrieve_all   = $this->mapel_model->retrieve_all_mapel();
                $data['mapels'] = $retrieve_all;

                //ambil matapelajaran pada kelas ini
                $retrieve_all_kelas = $this->mapel_model->retrieve_all_kelas();
                $mapel_kelas_id = array();
                foreach ($retrieve_all_kelas as $v) {
                    $mapel_kelas_id[] = $v['mapel_id'];
                }

                if ($this->form_validation->run('admin/mapel_kelas/add') == TRUE) {

                    $mapel = $this->input->post('mapel', TRUE);

                    $mapel_post_id = array();
                    foreach ($mapel as $mapel_id) {
                        if (is_numeric($mapel_id) AND $mapel_id > 0) {
                            //cek dulu
                            $check = $this->mapel_model->retrieve_kelas(null, $kelas_id, $mapel_id);
                            if (empty($check)) {
                                $this->mapel_model->create_kelas($kelas_id, $mapel_id);
                            }
                            $mapel_post_id[] = $mapel_id;
                        }
                    }

                    //cari perbedaan
                    if (count($mapel_kelas_id) > count($mapel_post_id)) {
                        $diff_mapel_kelas = array_diff($mapel_kelas_id, $mapel_post_id);
                        foreach ($diff_mapel_kelas as $mapel_id) {
                            //ambil data
                            $retrieve = $this->mapel_model->retrieve_kelas(null, $kelas_id, $mapel_id);

                            //hapus
                            $this->mapel_model->delete_kelas($retrieve['id']);
                        }
                    }

                    $this->session->set_flashdata('mapel', get_alert('success', 'Matapelajaran kelas berhasil di atur'));
                    redirect('admin/mapel_kelas/add/'.$parent_id.'/'.$kelas_id);

                }

                break;
            
            default:
            case 'list':
                $data['module_title']        = 'Matapelajaran Kelas';
                $data['sub_content_file']    = path_theme('admin_mapel_kelas/list.php');
                $data['mapel_kelas_hirarki'] = $this->mapel_kelas_hirarki();
                break;
        }

        $data = array_merge(default_parser_item(), $data);
        $this->parser->parse(get_active_theme().'/main_private', $data);
    }

    private function mapel_kelas_hirarki(){
        $parent = $this->kelas_model->retrieve_all(null);

        $return = '';
        foreach ($parent as $p) {
            $return .= '<div class="parent-kelas" id="parent-'.$p['id'].'">'.$p['nama'].'</div>';
            
            $sub_kelas = $this->kelas_model->retrieve_all($p['id']);
            foreach ($sub_kelas as $s) {
                $return .= '<div class="panel panel-info" style="margin-left:25px;">
                <div class="panel-heading">
                    '.$s['nama'].'
                    <a href="'.site_url('admin/mapel_kelas/add/'.$p['id'].'/'.$s['id']).'" class="btn pull-right" style="margin-top:-5px;"><i class="icon-wrench"></i> Atur Matapelajaran</a>
                </div>
                    <div class="panel-body">';
                    $retrieve_all = $this->mapel_model->retrieve_all_kelas(null, $s['id']);
                    $return .= '<table class="table table-striped">
                    <tbody>';
                        foreach ($retrieve_all as $v):
                        $m = $this->mapel_model->retrieve($v['mapel_id']);  
                        $return .= '<tr>
                            <td>
                                '.$m['nama'].'
                                <div class="btn-group pull-right">
                                  <a class="btn" href="'.site_url('admin/mapel_kelas/remove/'.$p['id'].'/'.$s['id'].'/'.$v['id']).'" onclick="return confirm(\'Anda yakin ingin menghapus?\')"><i class="icon-trash"></i> Hapus</a>
                                </div>
                            </td>
                        </tr>';
                        endforeach;
                    $return .= '</tbody>
                    </table>';
                $return .= '</div>
                </div>';
            }

        }

        return $return;
    }

    function mapel($act = 'list', $segment_3 = '')
    {
        $this->most_login();

        $data = array(
            'web_title'     => 'Manajemen Matapelajaran | Administrator',
            'menu_file'     => path_theme('admin_menu.php'),
            'content_file'  => path_theme('admin_mapel/index.php'),
            'uri_segment_1' => $this->uri->segment(1),
            'uri_segment_2' => $this->uri->segment(2),
        );

        switch ($act) {
            case 'edit':
                $id = (int)$segment_3;

                //ambil satu
                $retrieve = $this->mapel_model->retrieve($id);
                if (empty($retrieve)) {
                    redirect('admin/mapel');
                }

                $data['module_title']     = anchor('admin/mapel', 'Manajemen Matapelajaran').' / Edit';
                $data['sub_content_file'] = path_theme('admin_mapel/edit.php');
                $data['mapel']            = $retrieve;
                $data['comp_js']          = get_tinymce('info');

                if ($this->form_validation->run('admin/mapel/edit') == TRUE) {

                    $nama = $this->input->post('nama', TRUE);
                    $info = $this->input->post('info', TRUE);
                    $aktif = $this->input->post('status', TRUE);
                    if (empty($aktif)) {
                        $aktif = 0;
                    }

                    $this->mapel_model->update($id, $nama, $info, $aktif);

                    $this->session->set_flashdata('mapel', get_alert('success', 'Matapelajaran berhasil di perbaharui'));
                    redirect('admin/mapel');
                }

                break;

            case 'detail':
                $id = (int)$segment_3;

                //ambil satu
                $retrieve = $this->mapel_model->retrieve($id);
                if (empty($retrieve)) {
                    redirect('admin/mapel');
                }

                $data['module_title']     = anchor('admin/mapel', 'Manajemen Matapelajaran').' / Detail';
                $data['sub_content_file'] = path_theme('admin_mapel/detail.php');
                $data['mapel']            = $retrieve;

                break;

            case 'add':
                $data['module_title']     = anchor('admin/mapel', 'Manajemen Matapelajaran').' / Tambah';
                $data['sub_content_file'] = path_theme('admin_mapel/add.php');
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
                $data['sub_content_file'] = path_theme('admin_mapel/list.php');

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
            'content_file'  => path_theme('admin_kelas/index.php'),
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

                $data['sub_content_file'] = path_theme('admin_kelas/edit.php');
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
                
                $data['sub_content_file'] = path_theme('admin_kelas/add.php');

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