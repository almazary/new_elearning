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

        $data['web_title'] = 'Dashboard | Administrator';

        $data = array_merge(default_parser_item(), $data);
        $this->twig->display('admin-dashboard.html', $data);
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
                'form_open'    => form_open('admin/login', array('autocomplete' => 'off', 'class' => 'form-vertical')),
                'form_close'   => form_close()
            );

            $data = array_merge(default_parser_item(), $data);
            $this->twig->display('admin-login.html', $data);

        }
    }

    function logout()
    {
        $this->session->set_userdata('admin', null);
        $this->session->set_userdata('filter_siswa', null);
        $this->session->set_userdata('filter_pengajar', null);
        unset($_SESSION['KCFINDER']);
        redirect('admin/login');
    }

    function ajax_post($act = '')
    {
        $this->most_login();

        if (!empty($act)) {
            switch ($act) {
                case 'hirarki_kelas':

                    $o = 1;
                    foreach ((array)$_POST['list'] as $id => $parent_id){
                        if (!is_numeric($parent_id)) {
                            $parent_id = null;
                        }
                        $retrieve = $this->kelas_model->retrieve($id, true);

                        //update
                        $this->kelas_model->update($id, $retrieve['nama'], $parent_id, $o, $retrieve['aktif']);

                        $o++;
                    }

                    break;

                case 'mapel_kelas':
                    $kelas_id = $this->input->post('kelas_id', TRUE);
                    echo '<option value="">Pilih Matapelajaran</option>';
                    $retrieve_all = $this->mapel_model->retrieve_all_kelas(null, $kelas_id);
                    foreach ($retrieve_all as $v) {
                        $m = $this->mapel_model->retrieve($v['mapel_id']);
                        if (empty($m)) {
                            continue;
                        }
                        echo '<option value="'.$v['id'].'">'.$m['nama'].'</option>';
                    }
                    break;
            }
        }
    }

    function tugas($act = 'list', $segment_4 = '', $segment_5 = '', $segment_6 = '', $segment_7 = '')
    {
        $this->most_login();

        $data = array(
            'web_title'     => 'Tugas | Administrator',
            'content_file'  => path_theme('admin_tugas/index.html')
        );

        switch ($act) {
            case 'add':
                
                break;
            
            default:
            case 'list':
                $data['module_title'] = 'Tugas';
                $data['sub_content_file'] = path_theme('admin_tugas/list.html');
                
                # tugas type
                $type_id = (int)$segment_4;
                $type_id = empty($type_id) ? null : $type_id;

                if (!is_null($type_id)) {
                    $type_id =  ($type_id > 3) ? null : $type_id;
                }

                $type_url = is_null($type_id) ? '0' : $type_id;

                $page_no = $segment_5;
                $page_no = empty($page_no) ? 1 : $page_no;

                # ambil semua tugas
                $retrieve_all = $this->tugas_model->retrieve_all(50, $page_no, null, $type_id);

                $data['type_id']    = $type_url;
                $data['tugas']      = $retrieve_all['results'];
                $data['pagination'] = $this->pager->view($retrieve_all, 'admin/tugas/list/'.$type_url.'/');
                break;
        }

        $this->view($data, false);
    }

    function materi($act = 'list', $segment_4 = '', $segment_5 = '', $segment_6 = '', $segment_7 = '', $segment_8 = '')
    {
        $this->most_login();

        $data = array(
            'web_title'     => 'Materi | Administrator',
            'content_file'  => path_theme('admin_materi/index.html')
        );

        switch ($act) {
            case 'detail':
                $parent_id      = (int)$segment_4;
                $subkelas_id    = (int)$segment_5;
                $mapel_kelas_id = (int)$segment_6;

                $parent_kelas = $this->kelas_model->retrieve($parent_id);
                if (empty($parent_kelas)) {
                    redirect('admin/materi');
                }

                $sub_kelas = $this->kelas_model->retrieve($subkelas_id);
                if (empty($sub_kelas)) {
                    redirect('admin/materi');
                }

                $mapel_kelas = $this->mapel_model->retrieve_kelas($mapel_kelas_id);
                if (empty($mapel_kelas)) {
                    redirect('admin/materi');
                }

                $mapel = $this->mapel_model->retrieve($mapel_kelas['mapel_id']);
                if (empty($mapel)) {
                    $this->session->set_flashdata('materi', get_alert('warning', 'Matapelajaran tidak ditemukan, mungkin tidak aktif'));
                    redirect('admin/materi');
                }

                $data['module_title']     = anchor('admin/materi/#subkelas-'.$subkelas_id, 'Materi').' / List Materi';
                $data['sub_content_file'] = path_theme('admin_materi/detail.html');
                $data['kelas']            = $sub_kelas;
                $data['mapel']            = $mapel;
                $data['ref_param']        = $parent_id.'/'.$subkelas_id.'/'.$mapel_kelas_id;

                $page_no = (int)$segment_7;
                $page_no = (empty($page_no)) ? 1 : $page_no;

                $retrieve_all       = $this->materi_model->retrieve_all(20, $page_no, null, null, $mapel_kelas_id, null, null, null, 1);
                $data['materis']    = $retrieve_all['results'];
                $data['pagination'] = $this->pager->view($retrieve_all, 'admin/materi/detail/'.$data['ref_param'].'/');
                break;

            case 'delete':
                $parent_id      = (int)$segment_4;
                $subkelas_id    = (int)$segment_5;
                $mapel_kelas_id = (int)$segment_6;
                $materi_id      = (int)$segment_7;

                $parent_kelas = $this->kelas_model->retrieve($parent_id);
                if (empty($parent_kelas)) {
                    redirect('admin/materi');
                }

                $sub_kelas = $this->kelas_model->retrieve($subkelas_id);
                if (empty($sub_kelas)) {
                    redirect('admin/materi');
                }

                $mapel_kelas = $this->mapel_model->retrieve_kelas($mapel_kelas_id);
                if (empty($mapel_kelas)) {
                    redirect('admin/materi');
                }

                $mapel = $this->mapel_model->retrieve($mapel_kelas['mapel_id']);
                if (empty($mapel)) {
                    $this->session->set_flashdata('materi', get_alert('warning', 'Matapelajaran tidak ditemukan, mungkin tidak aktif'));
                    redirect('admin/materi');
                }

                $data['ref_param'] = $parent_id.'/'.$subkelas_id.'/'.$mapel_kelas_id;

                $materi = $this->materi_model->retrieve($materi_id);
                if (empty($materi)) {
                    redirect('admin/materi/detail/'.$data['ref_param']);
                }

                # jika file
                if (!empty($materi['file']) AND is_file(get_path_file($materi['file']))) {
                    unlink(get_path_file($materi['file']));
                }

                $this->materi_model->delete($materi['id']);

                $this->session->set_flashdata('materi', get_alert('success', 'Materi berhasil dihapus'));
                redirect('admin/materi/detail/'.$data['ref_param']);
                break;

            case 'edit':
                $type           = (string)strtolower($segment_4);
                $parent_id      = (int)$segment_5;
                $subkelas_id    = (int)$segment_6;
                $mapel_kelas_id = (int)$segment_7;
                $materi_id      = (int)$segment_8;

                $parent_kelas = $this->kelas_model->retrieve($parent_id);
                if (empty($parent_kelas)) {
                    redirect('admin/materi');
                }

                $sub_kelas = $this->kelas_model->retrieve($subkelas_id);
                if (empty($sub_kelas)) {
                    redirect('admin/materi');
                }

                $mapel_kelas = $this->mapel_model->retrieve_kelas($mapel_kelas_id);
                if (empty($mapel_kelas)) {
                    redirect('admin/materi');
                }

                $mapel = $this->mapel_model->retrieve($mapel_kelas['mapel_id']);
                if (empty($mapel)) {
                    $this->session->set_flashdata('materi', get_alert('warning', 'Matapelajaran tidak ditemukan, mungkin tidak aktif'));
                    redirect('admin/materi');
                }

                $data['ref_param'] = $parent_id.'/'.$subkelas_id.'/'.$mapel_kelas_id;

                if (!in_array($type, array('file', 'tertulis'))) {
                    redirect('admin/materi/detail/'.$data['ref_param']);
                }

                $materi = $this->materi_model->retrieve($materi_id);
                if (empty($materi)) {
                    redirect('admin/materi/detail/'.$data['ref_param']);
                }

                $data['module_title']     = anchor('admin/materi/#subkelas-'.$subkelas_id, 'Materi').' / '.anchor('admin/materi/detail/'.$data['ref_param'], 'List Materi').' / Edit Materi';
                $data['sub_content_file'] = path_theme('admin_materi/edit.html');
                $data['type']             = $type;
                $data['kelas']            = $sub_kelas;
                $data['mapel']            = $mapel;
                $data['materi']           = $materi;
                $data['comp_js']          = get_tinymce('konten');
                if ($type == 'file') {
                    $data['file_info'] = get_file_info(get_path_file($materi['file']));
                    $data['file_info']['mime'] = get_mime_by_extension(get_path_file($materi['file']));
                }

                # post action
                $success = false;
                if ($type == 'tertulis') {
                    if ($this->form_validation->run('admin/materi/edit/tertulis') == TRUE) {
                        $judul  = $this->input->post('judul', TRUE);
                        $konten = $this->input->post('konten', TRUE);

                        $this->materi_model->update(
                            $materi['id'],
                            get_sess_data('admin', 'pengajar', 'id'),
                            null,
                            $mapel_kelas_id,
                            $judul,
                            $konten,
                            null,
                            1
                        );

                        $success = true;
                    }
                } elseif ($type == 'file') {
                    $upload_success = false;
                    $is_new_file    = false;
                    # jika tidak ada yang diupload, file tetap sama
                    if (empty($_FILES['userfile']['tmp_name'])) {
                        $update_file    = $materi['file'];
                        $upload_success = true;
                    } else {
                        $config['upload_path']   = get_path_file();
                        $config['allowed_types'] = 'doc|zip|rar|txt|docx|xls|xlsx|pdf|tar|gz|jpg|jpeg|JPG|JPEG|png|ppt|pptx';
                        $config['max_size']      = '0';
                        $config['max_width']     = '0';
                        $config['max_height']    = '0';
                        $config['file_name']     = url_title($this->input->post('judul', TRUE).'_'.$mapel['nama'].'_'.$sub_kelas['nama'].'_'.time(), '_', TRUE);
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload()) {
                            $upload_data    = $this->upload->data();
                            $update_file    = $upload_data['file_name'];
                            $upload_success = true;
                            $is_new_file    = true;
                        } else {
                            $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
                        }
                    }

                    if ($this->form_validation->run('admin/materi/edit/file') == TRUE AND $upload_success == TRUE) {
                        $judul = $this->input->post('judul', TRUE);
                        $this->materi_model->update(
                            $materi['id'],
                            get_sess_data('admin', 'pengajar', 'id'),
                            null,
                            $mapel_kelas_id,
                            $judul,
                            null,
                            $update_file,
                            1
                        );

                        # hapus file sebelumnya
                        if (is_file(get_path_file($materi['file']))) {
                            unlink(get_path_file($materi['file']));
                        }

                        $success = true;
                    } else {
                        if ($is_new_file == TRUE AND is_file(get_path_file($update_file))) {
                            unlink(get_path_file($update_file));
                        }
                    }
                }

                if ($success) {
                    $this->session->set_flashdata('materi', get_alert('success', 'Materi berhasil diperbaharui'));
                    redirect('admin/materi/edit/'.$type.'/'.$data['ref_param'].'/'.$materi['id']);
                }
                break;

            case 'add':
                $type           = (string)strtolower($segment_4);
                $parent_id      = (int)$segment_5;
                $subkelas_id    = (int)$segment_6;
                $mapel_kelas_id = (int)$segment_7;

                $parent_kelas = $this->kelas_model->retrieve($parent_id);
                if (empty($parent_kelas)) {
                    redirect('admin/materi');
                }

                $sub_kelas = $this->kelas_model->retrieve($subkelas_id);
                if (empty($sub_kelas)) {
                    redirect('admin/materi');
                }

                $mapel_kelas = $this->mapel_model->retrieve_kelas($mapel_kelas_id);
                if (empty($mapel_kelas)) {
                    redirect('admin/materi');
                }

                $mapel = $this->mapel_model->retrieve($mapel_kelas['mapel_id']);
                if (empty($mapel)) {
                    $this->session->set_flashdata('materi', get_alert('warning', 'Matapelajaran tidak ditemukan, mungkin tidak aktif'));
                    redirect('admin/materi');
                }

                $data['ref_param'] = $parent_id.'/'.$subkelas_id.'/'.$mapel_kelas_id;

                if (!in_array($type, array('file', 'tertulis'))) {
                    redirect('admin/materi/detail/'.$data['ref_param']);
                }

                $data['module_title']     = anchor('admin/materi/#subkelas-'.$subkelas_id, 'Materi').' / '.anchor('admin/materi/detail/'.$data['ref_param'], 'List Materi').' / Tambah Materi';
                $data['sub_content_file'] = path_theme('admin_materi/add.html');
                $data['type']             = $type;
                $data['kelas']            = $sub_kelas;
                $data['mapel']            = $mapel;
                $data['comp_js']          = get_tinymce('konten');

                $success = false;
                if ($type == 'tertulis') {
                    if ($this->form_validation->run('admin/materi/add/tertulis') == TRUE) {
                        $type   = $this->input->post('type', TRUE);
                        $judul  = $this->input->post('judul', TRUE);
                        $konten = $this->input->post('konten', TRUE);

                        $this->materi_model->create(
                            get_sess_data('admin', 'pengajar', 'id'),
                            null,
                            $mapel_kelas_id,
                            $judul,
                            $konten,
                            null,
                            1
                        );

                        $success = true;
                    }
                } elseif ($type == 'file') {
                    $config['upload_path']   = get_path_file();
                    $config['allowed_types'] = 'doc|zip|rar|txt|docx|xls|xlsx|pdf|tar|gz|jpg|jpeg|JPG|JPEG|png|ppt|pptx';
                    $config['max_size']      = '0';
                    $config['max_width']     = '0';
                    $config['max_height']    = '0';
                    $config['file_name']     = url_title($this->input->post('judul', TRUE).'_'.$mapel['nama'].'_'.$sub_kelas['nama'], '_', TRUE);
                    $this->upload->initialize($config);

                    if ($this->form_validation->run('admin/materi/add/file') == TRUE AND $this->upload->do_upload()) {
                        $type        = $this->input->post('type', TRUE);
                        $judul       = $this->input->post('judul', TRUE);
                        $upload_data = $this->upload->data();
                        $file        = $upload_data['file_name'];

                        $this->materi_model->create(
                            get_sess_data('admin', 'pengajar', 'id'),
                            null,
                            $mapel_kelas_id,
                            $judul,
                            null,
                            $file,
                            1
                        );

                        $success = true;
                    } else {
                        $upload_data = $this->upload->data();
                        if (!empty($upload_data) AND is_file(get_path_file($upload_data['file_name']))) {
                            unlink(get_path_file($upload_data['file_name']));
                        }
                        $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
                    }
                }

                if ($success) {
                    $this->session->set_flashdata('materi', get_alert('success', 'Materi berhasil ditambah'));
                    redirect('admin/materi/detail/'.$data['ref_param']);
                }
                break;

            default:
            case 'list':
                $data['module_title']     = 'Materi';
                $data['sub_content_file'] = path_theme('admin_materi/list.html');
                $data['mapel_kelas_hirarki'] = $this->mapel_kelas_hirarki('materi');
                break;
        }

        $this->view($data, false);
    }

    function pengajar($act = 'list', $segment_4 = '1', $segment_5 = '', $segment_6 = '')
    {
        $this->most_login();

        $data['web_title'] = 'Data Pengajar | Administrator';

        switch ($act) {
            case 'add':
                $content_file = 'admin_pengajar/add.html';
                $status_id    = (int)$segment_4;
                if ($status_id < 0 OR $status_id > 3) {
                    redirect('admin/pengajar/list/1');
                }

                $data['module_title'] = anchor('admin/pengajar/list/'.$status_id, 'Data Pengajar').' / Tambah Pengajar';
                $data['status_id']    = $status_id;

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

                if ($this->form_validation->run('admin/pengajar/add') == TRUE AND !$error_upload) {
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

                    //simpan data login
                    $this->login_model->create(
                        $username,
                        $password,
                        null,
                        $pengajar_id,
                        $is_admin
                    );

                    $this->session->set_flashdata('pengajar', get_alert('success', 'Data Pengajar berhasil di simpan'));
                    redirect('admin/pengajar/list/1');

                } else {
                    $upload_data = $this->upload->data();
                    if (!empty($upload_data) AND is_file(get_path_image($upload_data['file_name']))) {
                        unlink(get_path_image($upload_data['file_name']));
                    }
                }
                break;

            case 'detail':
                $content_file      = 'admin_pengajar/detail.html';
                $status_id         = (int)$segment_4;
                $pengajar_id       = (int)$segment_5;
                $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
                if (empty($retrieve_pengajar)) {
                    echo 'Data Pengajar tidak ditemukan';
                    exit();
                }

                $retrieve_login = $this->login_model->retrieve(null, null, null, null, $retrieve_pengajar['id']);

                $data['module_title']     = anchor('admin/pengajar/list/'.$status_id, 'Data Pengajar').' / Detail Pengajar';
                $data['pengajar']         = $retrieve_pengajar;
                $data['pengajar_login']   = $retrieve_login;
                $data['status_id']        = $status_id;

                //panggil colorbox
                $html_js = load_comp_js(array(
                    base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                    base_url('assets/comp/colorbox/act-pengajar.js')
                ));
                $data['comp_js']      = $html_js;
                $data['comp_css']     = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));
                break;

            case 'add_ampuan':
                $content_file = 'admin_pengajar/add_ampuan.html';
                $status_id    = (int)$segment_4;
                $pengajar_id  = (int)$segment_5;
                $hari_id      = (int)$segment_6;
                if ($hari_id < 1 OR $hari_id > 7) {
                    echo 'Hari tidak ditemukan';
                    exit();
                }
                $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
                if (empty($retrieve_pengajar)) {
                    echo 'Data Pengajar tidak ditemukan';
                    exit();
                }

                $data['status_id']    = $status_id;
                $data['pengajar_id']  = $pengajar_id;
                $data['hari_id']      = $hari_id;
                $data['kelas']        = $this->kelas_model->retrieve_all_child();

                if ($this->form_validation->run('admin/pengajar/ampuan') == TRUE) {
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

                    $this->session->set_flashdata('add', get_alert('success', 'Jadwal Matapelajaran berhasil di tambah'));
                    redirect('admin/pengajar/add_ampuan/'.$status_id.'/'.$pengajar_id.'/'.$hari_id);
                }
                break;

            case 'edit_ampuan':
                $content_file      = 'admin_pengajar/edit_ampuan.html';
                $status_id         = (int)$segment_4;
                $pengajar_id       = (int)$segment_5;
                $ma_id             = (int)$segment_6;
                $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
                if (empty($retrieve_pengajar)) {
                    echo 'Data Pengajar tidak ditemukan';
                    exit();
                }

                $retrieve_ma = $this->pengajar_model->retrieve_ma($ma_id);
                if (empty($retrieve_ma)) {
                    echo 'Mapel Ajar tidak ditemukan';
                    exit();
                }

                $retrieve_mk = $this->mapel_model->retrieve_kelas($retrieve_ma['mapel_kelas_id']);

                $data['status_id']    = $status_id;
                $data['pengajar_id']  = $pengajar_id;
                $data['ma']           = $retrieve_ma;
                $data['mk']           = $retrieve_mk;
                $data['kelas']        = $this->kelas_model->retrieve_all_child();

                if ($this->form_validation->run('admin/pengajar/ampuan') == TRUE) {
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

                    $this->session->set_flashdata('edit', get_alert('success', 'Jadwal Ajar berhasil di perbaharui'));
                    redirect('admin/pengajar/edit_ampuan/'.$status_id.'/'.$pengajar_id.'/'.$retrieve_ma['id']);
                }
                break;

            case 'edit_profile':
                $content_file      = 'admin_pengajar/edit_profile.html';
                $status_id         = (int)$segment_4;
                $pengajar_id       = (int)$segment_5;
                $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
                if (empty($retrieve_pengajar)) {
                    echo 'Data Pengajar tidak ditemukan';
                    exit();
                }

                $retrieve_login = $this->login_model->retrieve(null, null, null, null, $retrieve_pengajar['id']);
                $retrieve_pengajar['is_admin'] = $retrieve_login['is_admin'];

                $data['status_id']    = $status_id;
                $data['pengajar_id']  = $pengajar_id;
                $data['pengajar']     = $retrieve_pengajar;

                if ($this->form_validation->run('admin/pengajar/edit_profile') == TRUE) {
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

                    //update siswa
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

                    //update login
                    $this->login_model->update(
                        $retrieve_login['id'],
                        $retrieve_login['username'],
                        null,
                        $pengajar_id,
                        $is_admin,
                        null
                    );

                    $this->session->set_flashdata('edit', get_alert('success', 'Profil pengajar berhasil di perbaharui'));
                    redirect('admin/pengajar/edit_profile/'.$status_id.'/'.$pengajar_id);
                }
                break;

            case 'edit_picture':
                $content_file      = 'admin_pengajar/edit_picture.html';
                $status_id         = (int)$segment_4;
                $pengajar_id       = (int)$segment_5;
                $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
                if (empty($retrieve_pengajar)) {
                    echo 'Data Pengajar tidak ditemukan';
                    exit();
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

                    //update pengajar
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

                    $this->session->set_flashdata('edit', get_alert('success', 'Foto pengajar berhasil di perbaharui'));
                    redirect('admin/pengajar/edit_picture/'.$status_id.'/'.$pengajar_id);
                } else {
                    if (!empty($_FILES['userfile']['tmp_name'])) {
                        $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
                    }
                }
                break;

            case 'edit_username':
                $content_file      = 'admin_pengajar/edit_username.html';
                $status_id         = (int)$segment_4;
                $pengajar_id       = (int)$segment_5;
                $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
                if (empty($retrieve_pengajar)) {
                    echo 'Data Pengajar tidak ditemukan';
                    exit();
                }

                $data['status_id']    = $status_id;
                $data['pengajar_id']  = $pengajar_id;
                $data['login']        = $this->login_model->retrieve(null, null, null, null, $pengajar_id);

                if ($this->form_validation->run('admin/pengajar/edit_username') == TRUE) {
                    $login_id = $this->input->post('login_id', TRUE);
                    $username = $this->input->post('username', TRUE);

                    //update username
                    $this->login_model->update(
                        $login_id,
                        $username,
                        null,
                        $pengajar_id,
                        $data['login']['is_admin'],
                        $data['login']['reset_kode']
                    );

                    $this->session->set_flashdata('edit', get_alert('success', 'Username pengajar berhasil di perbaharui'));
                    redirect('admin/pengajar/edit_username/'.$status_id.'/'.$pengajar_id);
                }
                break;

            case 'edit_password':
                $content_file      = 'admin_pengajar/edit_password.html';
                $status_id         = (int)$segment_4;
                $pengajar_id       = (int)$segment_5;
                $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
                if (empty($retrieve_pengajar)) {
                    echo 'Data Pengajar tidak ditemukan';
                    exit();
                }

                $data['status_id']    = $status_id;
                $data['pengajar_id']  = $pengajar_id;

                $retrieve_login = $this->login_model->retrieve(null, null, null, null, $pengajar_id);

                if ($this->form_validation->run('admin/pengajar/edit_password') == TRUE) {
                    $password = $this->input->post('password2', TRUE);
                    //update password
                    $this->login_model->update_password($retrieve_login['id'], $password);

                    $this->session->set_flashdata('edit', get_alert('success', 'Password pengajar berhasil di perbaharui'));
                    redirect('admin/pengajar/edit_password/'.$status_id.'/'.$pengajar_id);
                }
                break;

            case 'filter':
                $content_file         = 'admin_pengajar/filter.html';
                $data['module_title'] = 'Data Pengajar';

                $page_no = $segment_4;
                if (empty($page_no)) {
                    $page_no = 1;
                }

                if ($this->form_validation->run('admin/pengajar/filter') == TRUE) {

                    $filter = array(
                        'nip'           => $this->input->post('nip', TRUE),
                        'nama'          => $this->input->post('nama', TRUE),
                        'jenis_kelamin' => (empty($this->input->post('jenis_kelamin', TRUE))) ? array() : $this->input->post('jenis_kelamin', TRUE),
                        'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
                        'tgl_lahir'     => (int)$this->input->post('tgl_lahir', TRUE),
                        'bln_lahir'     => (int)$this->input->post('bln_lahir', TRUE),
                        'thn_lahir'     => (empty((int)$this->input->post('thn_lahir', TRUE))) ? '' : (int)$this->input->post('thn_lahir', TRUE),
                        'alamat'        => $this->input->post('alamat', TRUE),
                        'status_id'     => (empty($this->input->post('status_id', TRUE))) ? array() : $this->input->post('status_id', TRUE),
                        'username'      => $this->input->post('username', TRUE),
                        'is_admin'      => $this->input->post('is_admin', TRUE)
                    );

                    $this->session->set_userdata('filter_pengajar', $filter);

                    redirect('admin/pengajar/filter');

                } elseif (!empty($this->session->userdata('filter_pengajar'))) {

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

                $data['filter'] = $filter;

                if (!empty($filter)) {
                    $retrieve_all = $this->pengajar_model->retrieve_all_filter(
                        $filter['nip'], $filter['nama'], $filter['jenis_kelamin'], $filter['tempat_lahir'], $filter['tgl_lahir'], $filter['bln_lahir'], $filter['thn_lahir'], $filter['alamat'], $filter['status_id'], $filter['username'], $filter['is_admin'], $page_no
                    );
                }

                //panggil colorbox
                $html_js = load_comp_js(array(
                    base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                    base_url('assets/comp/colorbox/act-siswa.js')
                ));
                $data['comp_js']      = $html_js;
                $data['comp_css']     = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

                $data['pengajars']  = $retrieve_all['results'];
                $data['pagination'] = $this->pager->view($retrieve_all, 'admin/pengajar/filter/');

                break;

            case 'filter_action':
                if ($this->form_validation->run('admin/pengajar/filter') == TRUE) {
                    $pengajar_ids = $this->input->post('pengajar_id', TRUE);
                    $status_id = (int)$this->input->post('status_id', TRUE);

                    if (!empty($pengajar_ids) AND is_array($pengajar_ids)) {

                        if (empty($status_id)) {
                            $this->session->set_flashdata('pengajar', get_alert('warning', 'Tidak ada aksi yang dipilih'));
                            redirect('admin/pengajar/filter');
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

                        $this->session->set_flashdata('pengajar', get_alert('success', 'Pengajar berhasil di perbaharui ('.$label.')'));
                        redirect('admin/pengajar/filter');

                    } else {
                        $this->session->set_flashdata('pengajar', get_alert('warning', 'Tidak ada pengajar yang dipilih'));
                        redirect('admin/pengajar/filter');
                    }

                } else {
                    redirect('admin/pengajar/filter');
                }
                break;

            default:
            case 'list':
                $content_file         = 'admin_pengajar/list.html';
                $data['module_title'] = 'Data Pengajar';

                $status_id = (int)$segment_4;
                if ($status_id < 0 OR $status_id > 2) {
                    $status_id = 1;
                }

                $page_no = (int)$segment_5;
                if (empty($page_no)) {
                    $page_no = 1;
                }

                //ambil semua data pengajar
                $retrieve_all = $this->pengajar_model->retrieve_all(50, $page_no, $status_id);

                $data['status_id'] = $status_id;
                $data['pengajar']  = $retrieve_all['results'];
                $data['pagination'] = $this->pager->view($retrieve_all, 'admin/pengajar/list/'.$status_id.'/');

                //panggil colorbox
                $html_js = load_comp_js(array(
                    base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                    base_url('assets/comp/colorbox/act-pengajar.js')
                ));
                $data['comp_js']      = $html_js;
                $data['comp_css']     = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

                if (isset($_POST['status_id']) AND !empty($_POST['status_id'])) {
                    $post_status_id = $this->input->post('status_id', TRUE);
                    $pengajar_ids   = $this->input->post('pengajar_id', TRUE);
                    foreach ($pengajar_ids as $pengajar_id) {
                        $retrieve_pengajar = $this->pengajar_model->retrieve($pengajar_id);
                        if (!empty($retrieve_pengajar)) {
                            //update pengajar
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
                    redirect('admin/pengajar/list/'.$status_id);
                }
                break;
        }

        $data = array_merge(default_parser_item(), $data);
        $this->twig->display($content_file, $data);
    }

    function siswa($act = 'list', $segment_3 = '1', $segment_4 = '', $segment_5 = '')
    {
        $this->most_login();

        $iframe = false;

        $data = array(
            'web_title'     => 'Data Siswa | Administrator',
            'content_file'  => path_theme('admin_siswa/index.html')
        );

        switch ($act) {
            case 'add':
                $status_id = (int)$segment_3;
                if ($status_id < 0 OR $status_id > 3) {
                    redirect('admin/siswa/list/1');
                }

                $data['module_title']     = anchor('admin/siswa/list/'.$status_id, 'Data Siswa').' / Tambah Siswa';
                $data['sub_content_file'] = path_theme('admin_siswa/add.html');
                $data['status_id']        = $status_id;
                $data['kelas']            = $this->kelas_model->retrieve_all_child();

                $config['upload_path']   = get_path_image();
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = '0';
                $config['max_width']     = '0';
                $config['max_height']    = '0';
                $config['file_name']     = 'siswa-'.url_title($this->input->post('nama', TRUE), '-', true).'-'.url_title($this->input->post('nis', TRUE), '-', true);
                $this->upload->initialize($config);

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

                    if (empty($thn_lahir)) {
                        $tanggal_lahir = null;
                    } else {
                        $tanggal_lahir = $thn_lahir.'-'.$bln_lahir.'-'.$tgl_lahir;
                    }

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
                        $tanggal_lahir,
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

                } else {
                    $upload_data = $this->upload->data();
                    if (!empty($upload_data) AND is_file(get_path_image($upload_data['file_name']))) {
                        unlink(get_path_image($upload_data['file_name']));
                    }
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
                $data['sub_content_file'] = path_theme('admin_siswa/detail.html');
                $data['siswa']            = $retrieve_siswa;
                $data['siswa_login']      = $retrieve_login;
                $data['siswa_kelas']      = $retrieve_all_kelas;
                $data['status_id']        = $status_id;

                //panggil colorbox
                $html_js = load_comp_js(array(
                    base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                    base_url('assets/comp/colorbox/act-siswa.js')
                ));
                $data['comp_js']      = $html_js;
                $data['comp_css']     = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));
                break;

            case 'edit_picture':
                $status_id = (int)$segment_3;
                $siswa_id  = (int)$segment_4;
                $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
                if (empty($retrieve_siswa)) {
                    echo 'Data siswa tidak ditemukan';
                    exit();
                }

                $iframe = true;
                unset($data['content_file']);
                $data['content_file'] = path_theme('admin_siswa/edit_picture.html');
                $data['status_id']    = $status_id;
                $data['siswa_id']     = $siswa_id;
                $data['siswa']        = $retrieve_siswa;

                $config['upload_path']   = get_path_image();
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = '0';
                $config['max_width']     = '0';
                $config['max_height']    = '0';
                $config['file_name']     = 'siswa-'.url_title($retrieve_siswa['nama'], '-', true).'-'.url_title($retrieve_siswa['nis'], '-', true);
                $this->upload->initialize($config);

                if ($this->upload->do_upload()) {

                    if (is_file(get_path_image($retrieve_siswa['foto']))) {
                        unlink(get_path_image($retrieve_siswa['foto']));
                    }

                    if (is_file(get_path_image($retrieve_siswa['foto'], 'medium'))) {
                        unlink(get_path_image($retrieve_siswa['foto'], 'medium'));
                    }

                    if (is_file(get_path_image($retrieve_siswa['foto'], 'small'))) {
                        unlink(get_path_image($retrieve_siswa['foto'], 'small'));
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

                    //update siswa
                    $this->siswa_model->update(
                        $siswa_id,
                        $retrieve_siswa['nis'],
                        $retrieve_siswa['nama'],
                        $retrieve_siswa['jenis_kelamin'],
                        $retrieve_siswa['tempat_lahir'],
                        $retrieve_siswa['tgl_lahir'],
                        $retrieve_siswa['agama'],
                        $retrieve_siswa['alamat'],
                        $retrieve_siswa['tahun_masuk'],
                        $upload_data['file_name'],
                        $retrieve_siswa['status_id']
                    );

                    $this->session->set_flashdata('edit', get_alert('success', 'Foto siswa berhasil di perbaharui'));
                    redirect('admin/siswa/edit_picture/'.$status_id.'/'.$siswa_id);
                } else {
                    if (!empty($_FILES['userfile']['tmp_name'])) {
                        $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
                    }
                }
                break;

            case 'edit_profile':
                $status_id = (int)$segment_3;
                $siswa_id  = (int)$segment_4;
                $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
                if (empty($retrieve_siswa)) {
                    echo 'Data siswa tidak ditemukan';
                    exit();
                }

                $iframe = true;
                unset($data['content_file']);
                $data['content_file'] = path_theme('admin_siswa/edit_profile.html');
                $data['status_id']    = $status_id;
                $data['siswa_id']     = $siswa_id;
                $data['siswa']        = $retrieve_siswa;

                if ($this->form_validation->run('admin/siswa/edit_profile') == TRUE) {
                    $nis           = $this->input->post('nis', TRUE);
                    $nama          = $this->input->post('nama', TRUE);
                    $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
                    $tahun_masuk   = $this->input->post('tahun_masuk', TRUE);
                    $tempat_lahir  = $this->input->post('tempat_lahir', TRUE);
                    $tgl_lahir     = $this->input->post('tgl_lahir', TRUE);
                    $bln_lahir     = $this->input->post('bln_lahir', TRUE);
                    $thn_lahir     = $this->input->post('thn_lahir', TRUE);
                    $agama         = $this->input->post('agama', TRUE);
                    $alamat        = $this->input->post('alamat', TRUE);
                    $status        = $this->input->post('status_id', TRUE);

                    if (empty($thn_lahir)) {
                        $tanggal_lahir = null;
                    } else {
                        $tanggal_lahir = $thn_lahir.'-'.$bln_lahir.'-'.$tgl_lahir;
                    }

                    //update siswa
                    $this->siswa_model->update(
                        $siswa_id,
                        $nis,
                        $nama,
                        $jenis_kelamin,
                        $tempat_lahir,
                        $tanggal_lahir,
                        $agama,
                        $alamat,
                        $tahun_masuk,
                        $retrieve_siswa['foto'],
                        $status
                    );

                    $this->session->set_flashdata('edit', get_alert('success', 'Profil siswa berhasil di perbaharui'));
                    redirect('admin/siswa/edit_profile/'.$status_id.'/'.$siswa_id);
                }
                break;

            case 'edit_password':
                $status_id = (int)$segment_3;
                $siswa_id  = (int)$segment_4;
                $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
                if (empty($retrieve_siswa)) {
                    echo 'Data siswa tidak ditemukan';
                    exit();
                }

                $iframe = true;
                unset($data['content_file']);
                $data['content_file'] = path_theme('admin_siswa/edit_password.html');
                $data['status_id']    = $status_id;
                $data['siswa_id']     = $siswa_id;

                $retrieve_login = $this->login_model->retrieve(null, null, null, $siswa_id);

                if ($this->form_validation->run('admin/siswa/edit_password') == TRUE) {
                    $password = $this->input->post('password2', TRUE);
                    //update password
                    $this->login_model->update_password($retrieve_login['id'], $password);

                    $this->session->set_flashdata('edit', get_alert('success', 'Password siswa berhasil di perbaharui'));
                    redirect('admin/siswa/edit_password/'.$status_id.'/'.$siswa_id);
                }
                break;

            case 'edit_username':
                $status_id = (int)$segment_3;
                $siswa_id  = (int)$segment_4;
                $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
                if (empty($retrieve_siswa)) {
                    echo 'Data siswa tidak ditemukan';
                    exit();
                }

                $iframe = true;
                unset($data['content_file']);
                $data['content_file'] = path_theme('admin_siswa/edit_username.html');
                $data['login']        = $this->login_model->retrieve(null, null, null, $siswa_id);
                $data['status_id']    = $status_id;
                $data['siswa_id']     = $siswa_id;

                if ($this->form_validation->run('admin/siswa/edit_username') == TRUE) {
                    $login_id = $this->input->post('login_id', TRUE);
                    $username = $this->input->post('username', TRUE);

                    //update username
                    $this->login_model->update(
                        $login_id,
                        $username,
                        $siswa_id,
                        null,
                        $data['login']['is_admin'],
                        $data['login']['reset_kode']
                    );

                    $this->session->set_flashdata('edit', get_alert('success', 'Username siswa berhasil di perbaharui'));
                    redirect('admin/siswa/edit_username/'.$status_id.'/'.$siswa_id);
                }
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
                $data['content_file'] = path_theme('admin_siswa/moved_class.html');
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

                    $this->session->set_flashdata('class', get_alert('success', 'Kelas siswa berhasil di perbaharui'));
                    redirect('admin/siswa/moved_class/'.$status_id.'/'.$siswa_id);
                }
                break;

            case 'filter':
                $data['module_title']     = 'Data Siswa';
                $data['sub_content_file'] = path_theme('admin_siswa/filter.html');
                $data['kelas_all']            = $this->kelas_model->retrieve_all_child(true);
                $data['kelas']      = $this->kelas_model->retrieve_all_child();

                $page_no = $segment_3;
                if (empty($page_no)) {
                    $page_no = 1;
                }

                if ($this->form_validation->run('admin/siswa/filter') == TRUE) {

                    $filter = array(
                        'nis'           => $this->input->post('nis', TRUE),
                        'nama'          => $this->input->post('nama', TRUE),
                        'jenis_kelamin' => (empty($this->input->post('jenis_kelamin', TRUE))) ? array() : $this->input->post('jenis_kelamin', TRUE),
                        'tahun_masuk'   => $this->input->post('tahun_masuk', TRUE),
                        'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
                        'tgl_lahir'     => (int)$this->input->post('tgl_lahir', TRUE),
                        'bln_lahir'     => (int)$this->input->post('bln_lahir', TRUE),
                        'thn_lahir'     => (empty((int)$this->input->post('thn_lahir', TRUE))) ? '' : (int)$this->input->post('thn_lahir', TRUE),
                        'agama'         => (empty($this->input->post('agama', TRUE))) ? array() : $this->input->post('agama', TRUE),
                        'alamat'        => $this->input->post('alamat', TRUE),
                        'status_id'     => (empty($this->input->post('status_id', TRUE))) ? array() : $this->input->post('status_id', TRUE),
                        'kelas_id'      => (empty($this->input->post('kelas_id', TRUE))) ? array() : $this->input->post('kelas_id', TRUE),
                        'username'      => $this->input->post('username', TRUE)
                    );

                    $this->session->set_userdata('filter_siswa', $filter);

                    redirect('admin/siswa/filter');

                } elseif (!empty($this->session->userdata('filter_siswa'))) {

                    $filter = $this->session->userdata('filter_siswa');

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

                $data['filter'] = $filter;

                if (!empty($filter)) {
                    $retrieve_all = $this->siswa_model->retrieve_all_filter(
                        $filter['nis'], $filter['nama'], $filter['jenis_kelamin'], $filter['tahun_masuk'], $filter['tempat_lahir'], $filter['tgl_lahir'], $filter['bln_lahir'], $filter['thn_lahir'], $filter['alamat'], $filter['agama'], $filter['kelas_id'], $filter['status_id'], $filter['username'], $page_no
                    );
                }

                //panggil colorbox
                $html_js = load_comp_js(array(
                    base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                    base_url('assets/comp/colorbox/act-siswa.js')
                ));
                $data['comp_js']      = $html_js;
                $data['comp_css']     = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

                $data['siswas']     = $retrieve_all['results'];
                $data['pagination'] = $this->pager->view($retrieve_all, 'admin/siswa/filter/');

                break;

            case 'filter_action':
                if ($this->form_validation->run('admin/siswa/filter') == TRUE) {
                    $siswa_ids = $this->input->post('siswa_id', TRUE);
                    $status_id = (int)$this->input->post('status_id', TRUE);
                    $kelas_id  = (int)$this->input->post('kelas_id', TRUE);

                    if (!empty($siswa_ids) AND is_array($siswa_ids)) {

                        if (empty($status_id) AND empty($kelas_id)) {
                            $this->session->set_flashdata('siswa', get_alert('warning', 'Tidak ada aksi yang dipilih'));
                            redirect('admin/siswa/filter');
                        }

                        foreach ($siswa_ids as $siswa_id) {
                            $s = $this->siswa_model->retrieve($siswa_id);
                            if (!empty($status_id)) {
                                //update status siswa
                                $this->siswa_model->update(
                                    $siswa_id,
                                    $s['nis'],
                                    $s['nama'],
                                    $s['jenis_kelamin'],
                                    $s['tempat_lahir'],
                                    $s['tgl_lahir'],
                                    $s['agama'],
                                    $s['alamat'],
                                    $s['tahun_masuk'],
                                    $s['foto'],
                                    $status_id
                                );
                            }

                            if (!empty($kelas_id)) {
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
                            }
                        }

                        $label = '';
                        if (!empty($status_id)) {
                            $label_status = array('Pending', 'Aktif', 'Blocking', 'Alumni');
                            $label .= 'status = '.$label_status[$status_id];
                        }
                        if (!empty($kelas_id)) {
                            $kelas = $this->kelas_model->retrieve($kelas_id);
                            if (!empty($label)) {
                                $label .= ' & ';
                            }
                            $label .= 'kelas = '.$kelas['nama'];
                        }

                        $this->session->set_flashdata('siswa', get_alert('success', 'Siswa berhasil di perbaharui ('.$label.')'));
                        redirect('admin/siswa/filter');

                    } else {
                        $this->session->set_flashdata('siswa', get_alert('warning', 'Tidak ada siswa yang dipilih'));
                        redirect('admin/siswa/filter');
                    }

                } else {
                    redirect('admin/siswa/filter');
                }
                break;

            default:
            case 'list':
                $data['module_title']     = 'Data Siswa';
                $data['sub_content_file'] = path_theme('admin_siswa/list.html');

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
                $data['pagination'] = $this->pager->view($retrieve_all, 'admin/siswa/list/'.$status_id.'/');

                //panggil colorbox
                $html_js = load_comp_js(array(
                    base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                    base_url('assets/comp/colorbox/act-siswa.js')
                ));
                $data['comp_js']      = $html_js;
                $data['comp_css']     = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

                if (isset($_POST['status_id']) AND !empty($_POST['status_id'])) {
                    $post_status_id = $this->input->post('status_id', TRUE);
                    $siswa_ids      = $this->input->post('siswa_id', TRUE);
                    foreach ($siswa_ids as $siswa_id) {
                        $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
                        if (!empty($retrieve_siswa)) {
                            //update siswa
                            $this->siswa_model->update(
                                $retrieve_siswa['id'],
                                $retrieve_siswa['nis'],
                                $retrieve_siswa['nama'],
                                $retrieve_siswa['jenis_kelamin'],
                                $retrieve_siswa['tempat_lahir'],
                                $retrieve_siswa['tgl_lahir'],
                                $retrieve_siswa['agama'],
                                $retrieve_siswa['alamat'],
                                $retrieve_siswa['tahun_masuk'],
                                $retrieve_siswa['foto'],
                                $post_status_id
                            );
                        }
                    }
                    redirect('admin/siswa/list/'.$status_id);
                }

                break;
        }

        $this->view($data, ($iframe) ? true : false);
    }

    function ch_profil()
    {
        $this->most_login();

        $data = array(
            'web_title'        => 'Ubah Profil | Administrator',
            'content_file'     => path_theme('admin_akun/index.html'),
            'sub_content_file' => path_theme('admin_akun/ch_profil.html'),
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

        $this->view($data);
    }

    function update_username($username = '')
    {
        if (!empty($username)) {
            if ($this->uri->segment(2) == 'ch_profil') {
                $entity_id = $this->session_data['login']['id'];
            }

            if ($this->uri->segment(2) == 'siswa') {
                $entity_id = $this->input->post('login_id', TRUE);
            }

            if ($this->uri->segment(2) == 'pengajar') {
                $entity_id = $this->input->post('login_id', TRUE);
            }

            $this->db->where('id !=', $entity_id);
            $this->db->where('username', $username);
            $result = $this->db->get('login');
            if ($result->num_rows() == 0) {
                return true;
            } else {
                $this->form_validation->set_message('update_username', 'Username sudah digunakan.');
                return false;
            }
        } else {
            $this->form_validation->set_message('update_username', 'Username di butuhkan.');
            return false;
        }
    }

    function update_nis($nis = '') {
        if (!empty($nis)) {
            $this->db->where('id !=', $this->input->post('siswa_id', TRUE));
            $this->db->where('nis', $nis);
            $result = $this->db->get('siswa');
            if ($result->num_rows() == 0) {
                return true;
            } else {
                $this->form_validation->set_message('update_nis', 'NIS sudah digunakan.');
                return false;
            }
        } else {
            $this->form_validation->set_message('update_nis', 'NIS di butuhkan.');
            return false;
        }
    }

    function update_nip($nip = '') {
        if (!empty($nip)) {
            $this->db->where('id !=', $this->input->post('pengajar_id', TRUE));
            $this->db->where('nip', $nip);
            $result = $this->db->get('pengajar');
            if ($result->num_rows() == 0) {
                return true;
            } else {
                $this->form_validation->set_message('update_nip', 'NIP sudah digunakan.');
                return false;
            }
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
            'content_file'     => path_theme('admin_akun/index.html'),
            'sub_content_file' => path_theme('admin_akun/ch_pass.html'),
            'module_title'     => 'Ubah Password'
        );

        if ($this->form_validation->run() == TRUE) {
            $password = $this->input->post('password', TRUE);

            //update password
            $this->login_model->update_password($this->session_data['login']['id'], $password);

            $this->session->set_flashdata('akun', get_alert('success', 'Password berhasil di perbaharui'));
            redirect('admin/ch_pass');
        }

        $this->view($data);
    }

    function mapel_kelas($act = 'list', $segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
        $this->most_login();

        $data['web_title'] = 'Matapelajaran Kelas | Administrator';

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

                $content_file         = 'admin_mapel_kelas/add.html';
                $data['module_title'] = anchor('admin/mapel_kelas/#parent-'.$parent_id, 'Matapelajaran Kelas').' / Atur Matapelajaran';
                $data['kelas']        = $kelas;
                $data['parent']       = $parent;

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

                            if (!empty($retrieve)) {
                                //hapus
                                $this->mapel_model->delete_kelas($retrieve['id']);
                            }
                        }
                    }

                    $this->session->set_flashdata('mapel', get_alert('success', 'Matapelajaran kelas berhasil di atur'));
                    redirect('admin/mapel_kelas/add/'.$parent_id.'/'.$kelas_id);

                }
                break;

            default:
            case 'list':
                $content_file                = 'admin_mapel_kelas/list.html';
                $data['module_title']        = 'Matapelajaran Kelas';
                $data['mapel_kelas_hirarki'] = $this->mapel_kelas_hirarki();
                break;
        }

        $data = array_merge(default_parser_item(), $data);
        $this->twig->display($content_file, $data);
    }

    private function mapel_kelas_hirarki($view = ''){
        $parent = $this->kelas_model->retrieve_all(null);

        $return = '';
        foreach ($parent as $p) {
            $return .= '<div class="parent-kelas" id="parent-'.$p['id'].'">'.$p['nama'].'</div>';

            $sub_kelas = $this->kelas_model->retrieve_all($p['id']);
            foreach ($sub_kelas as $s) {
                $return .= '<div class="panel panel-default" style="margin-left:25px;margin-bottom:5px;">';

                switch ($view) {
                    case 'materi':
                        $return .= '<div class="panel-heading" id="subkelas-'.$s['id'].'">
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#collapse'.$s['id'].'">'.$s['nama'].'</a> &nbsp;&nbsp;'.(($s['aktif'] == 0) ? '<span class="label label-warning">Kelas tidak aktif</span>' : '').'
                        </div>';
                        if ($s['aktif'] == 1) {
                            $return .= '<div id="collapse'.$s['id'].'" class="collapse">';
                            $return .= '<div class="panel-body">';
                            $retrieve_all = $this->mapel_model->retrieve_all_kelas(null, $s['id']);
                            $return .= '<table class="table table-striped">
                            <tbody>';
                                foreach ($retrieve_all as $v):
                                $m = $this->mapel_model->retrieve($v['mapel_id']);
                                if (empty($m)) {
                                    continue;
                                }
                                $return .= '<tr>
                                    <td>
                                        '.$m['nama'].'
                                        <div class="btn-group pull-right">
                                          <a class="btn" href="'.site_url('admin/materi/detail/'.$p['id'].'/'.$s['id'].'/'.$v['id']).'"><i class="icon-zoom-in"></i> Materi ('.$this->materi_model->count_materi($v['id']).')</a>
                                        </div>
                                    </td>
                                </tr>';
                                endforeach;
                            $return .= '</tbody>
                            </table>';
                            $return .= '</div>';
                            $return .= '</div>';
                        }
                        break;

                    default:
                        $return .= '<div class="panel-heading">
                            '.$s['nama'].'&nbsp;&nbsp;'.(($s['aktif'] == 0) ? '<span class="label label-warning">Kelas tidak aktif</span>' : '').'
                            '.(($s['aktif'] == 1) ? '<a href="'.site_url('admin/mapel_kelas/add/'.$p['id'].'/'.$s['id']).'" class="btn pull-right" style="margin-top:-5px;"><i class="icon-wrench"></i> Atur Matapelajaran</a>' : '').'
                        </div>';
                        if ($s['aktif'] == 1) {
                            $return .= '<div class="panel-body">';
                            $retrieve_all = $this->mapel_model->retrieve_all_kelas(null, $s['id']);
                            $return .= '<table class="table table-striped">
                            <tbody>';
                                foreach ($retrieve_all as $v):
                                $m = $this->mapel_model->retrieve($v['mapel_id']);
                                if (empty($m)) {
                                    continue;
                                }
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
                            $return .= '</div>';
                        }
                        break;
                }

                $return .= '</div>';
            }

        }

        return $return;
    }

    function mapel($act = 'list', $segment_3 = '')
    {
        $this->most_login();

        $data['web_title'] = 'Manajemen Matapelajaran | Administrator';

        switch ($act) {
            case 'edit':
                $content_file = 'admin_mapel/edit.html';
                $id = (int)$segment_3;

                //ambil satu
                $retrieve = $this->mapel_model->retrieve($id);
                if (empty($retrieve)) {
                    redirect('admin/mapel');
                }

                $data['module_title'] = anchor('admin/mapel', 'Manajemen Matapelajaran').' / Edit';
                $data['mapel']        = $retrieve;
                $data['comp_js']      = get_tinymce('info');

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
                $content_file = 'admin_mapel/detail.html';
                $id = (int)$segment_3;

                //ambil satu
                $retrieve = $this->mapel_model->retrieve($id);
                if (empty($retrieve)) {
                    redirect('admin/mapel');
                }

                $data['module_title'] = anchor('admin/mapel', 'Manajemen Matapelajaran').' / Detail';
                $data['mapel']        = $retrieve;
                break;

            case 'add':
                $content_file         = 'admin_mapel/add.html';
                $data['module_title'] = anchor('admin/mapel', 'Manajemen Matapelajaran').' / Tambah';
                $data['comp_js']      = get_tinymce('info');

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
                $content_file         = 'admin_mapel/list.html';
                $data['module_title'] = 'Manajemen Matapelajaran';

                $page_no = (int)$segment_3;
                $page_no = empty($page_no) ? 1 : $page_no;

                //ambil semua data mepel
                $retrieve_all = $this->mapel_model->retrieve_all(10, $page_no);

                $data['mapels']     = $retrieve_all['results'];
                $data['pagination'] = $this->pager->view($retrieve_all, 'admin/mapel/list/');
                break;
        }

        $data = array_merge(default_parser_item(), $data);
        $this->twig->display($content_file, $data);
    }

    function kelas($act = 'list', $id = '')
    {
        $this->most_login();

        $data = array(
            'web_title'     => 'Manajemen Kelas | Administrator',
            'module_title'  => 'Manajemen Kelas',
            'comp_css'      => load_comp_css(array(base_url('assets/comp/nestedSortable/nestedSortable.css'))),
            'comp_js'       => load_comp_js(array(base_url('assets/comp/nestedSortable/jquery.mjs.nestedSortable.js')))
        );

        switch ($act) {
            case 'edit':
                $content_file = 'admin_kelas/edit.html';
                $id = (int)$id;

                $kelas = $this->kelas_model->retrieve($id, true);
                if (empty($kelas)) {
                    redirect('admin/kelas');
                }

                $data['kelas'] = $kelas;
                if ($this->form_validation->run('admin/kelas/edit') == TRUE) {
                    $nama  = $this->input->post('nama', TRUE);
                    if (empty($kelas['parent_id'])) {
                        $aktif = 1;
                    } else {
                        $aktif = $this->input->post('status', TRUE);
                        if (empty($aktif)) {
                            $aktif = 0;
                        }
                    }

                    //update kelas
                    $this->kelas_model->update($id, $nama, $kelas['parent_id'], $kelas['urutan'], $aktif);

                    $this->session->set_flashdata('kelas', get_alert('success', $kelas['nama'].' berhasil di perbaharui'));
                    redirect('admin/kelas');
                }
                break;

            default:
            case 'list':
                $content_file = 'admin_kelas/add.html';
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
        $this->twig->display($content_file, $data);
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
