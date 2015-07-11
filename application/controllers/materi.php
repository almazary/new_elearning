<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        # jika belum login die
        if (!is_login()) {
            exit('Maaf anda harus login.');
        }
    }

    private function formatData($val)
    {
        # cari pembuatnya
        if (!empty($val['pengajar_id'])) {
            $pengajar = $this->pengajar_model->retrieve($val['pengajar_id']);
            $val['pembuat'] = $pengajar;
            $val['pembuat']['link_profil'] = site_url('pengajar/detail/'.$pengajar['status_id'].'/'.$pengajar['id']);
        }
        if (!empty($val['siswa_id'])) {
            $siswa = $this->siswa_model->retrieve($val['siswa_id']);
            $val['pembuat'] = $siswa;
            $val['pembuat']['link_profil'] = site_url('siswa/detail/'.$siswa['status_id'].'/'.$siswa['id']);
        }

        # cari materi kelas
        $materi_kelas = $this->materi_model->retrieve_all_kelas($val['id']);
        foreach ($materi_kelas as $mk) {
            $kelas = $this->kelas_model->retrieve($mk['kelas_id']);
            $val['materi_kelas'][] = $kelas;
        }

        # cari matapelajarannya
        $val['mapel'] = $this->mapel_model->retrieve($val['mapel_id']);

        return $val;
    }

    function index($segment_3 = '')
    {
        if (!empty($_GET['clear_filter']) AND $_GET['clear_filter'] == 'true') {
            $this->session->set_userdata('filter_materi', null);
        }

        $page_no = (int)$segment_3;
        if (empty($page_no)) {
            $page_no = 1;
        }

        # jika ada post filter
        if ($this->form_validation->run('materi/filter') == true) {
            $pembuat = $this->input->post('pembuat', TRUE);

            # cari id pengajar dan siswa
            $pengajar_id = array();
            $siswa_id    = array();
            if (!empty($pembuat)) {
                foreach ($this->pengajar_model->retrieve_all_by_name($pembuat) as $val) {
                    $pengajar_id[] = $val['id'];
                }

                foreach ($this->siswa_model->retrieve_all_by_name($pembuat) as $val) {
                    $siswa_id[] = $val['id'];
                }
            
                if (empty($pengajar_id) AND empty($siswa_id)) {
                    $pengajar_id[] = 0;
                    $siswa_id[]    = 0;
                }
            }

            $filter = array(
                'judul'       => $this->input->post('judul', true),
                'konten'      => $this->input->post('konten', true),
                'pengajar_id' => $pengajar_id,
                'siswa_id'    => $siswa_id,
                'pembuat'     => $pembuat,
                'mapel_id'    => $this->input->post('mapel_id', true),
                'kelas_id'    => $this->input->post('kelas_id', true),
                'type'        => $this->input->post('type', true),
            );

            $this->session->set_userdata('filter_materi', $filter);
        }

        $filter = $this->session->userdata('filter_materi');
        if (empty($filter)) {
            $filter = array(
                'judul'       => '',
                'konten'      => '',
                'pengajar_id' => array(),
                'siswa_id'    => array(),
                'pembuat'     => '',
                'mapel_id'    => array(),
                'kelas_id'    => array(),
                'type'        => array()
            );
        }
        $data['filter'] = $filter;

        # ambil semua data materi
        $retrieve_all_materi = $this->materi_model->retrieve_all(
            20, 
            $page_no,
            $filter['pengajar_id'],
            $filter['siswa_id'],
            $filter['mapel_id'],
            $filter['judul'],
            $filter['konten'],
            $tgl_posting = null,
            $publish = 1,
            $filter['kelas_id'],
            $filter['type']
        );

        # format array data
        $results = array();
        foreach ($retrieve_all_materi['results'] as $key => $val) {
            $results[$key] = $this->formatData($val);
        }

        $data['materi']      = $results;
        $data['pagination']  = $this->pager->view($retrieve_all_materi, 'materi/index/');
        $data['kelas']       = $this->kelas_model->retrieve_all(null, array('aktif' => 1));
        $data['mapel']       = $this->mapel_model->retrieve_all_mapel();

        $this->twig->display('list-materi.html', $data);
    }

    function add($segment_3 = '')
    {
        $type = (string)strtolower($segment_3);
        if (!in_array($type, array('file', 'tertulis'))) {
            redirect('materi');
        }

        $data['type']    = $type;
        $data['mapel']   = $this->mapel_model->retrieve_all_mapel();
        $data['kelas']   = $this->kelas_model->retrieve_all(null, array('aktif' => 1));
        $data['comp_js'] = get_tinymce('konten');

        $success = false;
        if ($type == 'tertulis') {
            if ($this->form_validation->run('materi/add/tertulis') == TRUE) {
                $mapel_id = $this->input->post('mapel_id', TRUE);
                $judul    = $this->input->post('judul', TRUE);
                $konten   = $this->input->post('konten', TRUE);

                $materi_id = $this->materi_model->create(
                    get_sess_data('user', 'id'),
                    null,
                    $mapel_id,
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
            $config['file_name']     = url_title($this->input->post('judul', TRUE).'_'.time(), '_', TRUE);
            $this->upload->initialize($config);

            if ($this->form_validation->run('materi/add/file') == TRUE AND $this->upload->do_upload()) {
                $mapel_id    = $this->input->post('mapel_id', TRUE);
                $judul       = $this->input->post('judul', TRUE);
                $upload_data = $this->upload->data();
                $file        = $upload_data['file_name'];

                $materi_id = $this->materi_model->create(
                    get_sess_data('user', 'id'),
                    null,
                    $mapel_id,
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
            # simpan kelas materi
            $kelas_id = $this->input->post('kelas_id', TRUE);
            foreach ($kelas_id as $materi_kelas_id) {
                $this->materi_model->create_kelas($materi_id, $materi_kelas_id);
            }

            $this->session->set_flashdata('materi', get_alert('success', 'Materi berhasil disimpan.'));
            if (!empty($materi_id)) {
                redirect('materi/edit/'.$type.'/'.$materi_id);
            } else {
                redirect('materi');
            }
        }

        $this->twig->display('tambah-materi.html', $data);
    }

    function edit($segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
        $type      = (string)strtolower($segment_3);
        $materi_id = (int)$segment_4;
        $uri_back  = (string)$segment_5;

        if (empty($uri_back)) {
            $uri_back = redirect('materi');
        } else {
            $uri_back = deurl_redirect($uri_back);
        }
        $data['uri_back'] = $uri_back;

        if (!in_array($type, array('file', 'tertulis'))) {
            redirect($uri_back);
        }

        $materi = $this->materi_model->retrieve($materi_id);
        if (empty($materi)) {
            redirect($uri_back);
        }

        # hanya ambil kelas_idnya
        $materi_kelas    = $this->materi_model->retrieve_all_kelas($materi['id']);
        $materi_kelas_id = array();
        foreach ($materi_kelas as $r) {
            $materi_kelas_id[] = $r['kelas_id'];
        }

        $data['type']         = $type;
        $data['materi']       = $materi;
        $data['mapel']        = $this->mapel_model->retrieve_all_mapel();
        $data['kelas']        = $this->kelas_model->retrieve_all(null, array('aktif' => 1));
        $data['materi_kelas'] = $materi_kelas_id;
        $data['comp_js']      = get_tinymce('konten');
        if ($type == 'file') {
            $data['file_info'] = get_file_info(get_path_file($materi['file']));
            $data['file_info']['mime'] = get_mime_by_extension(get_path_file($materi['file']));
        }

        # post action
        $success = false;
        if ($type == 'tertulis') {
            if ($this->form_validation->run('materi/edit/tertulis') == TRUE) {
                $mapel_id = $this->input->post('mapel_id', TRUE);
                $judul    = $this->input->post('judul', TRUE);
                $konten   = $this->input->post('konten', TRUE);

                $this->materi_model->update(
                    $materi['id'],
                    $materi['pengajar_id'],
                    null,
                    $mapel_id,
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
                $config['file_name']     = url_title($this->input->post('judul', TRUE).'_'.time(), '_', TRUE);
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

            if ($this->form_validation->run('materi/edit/file') == TRUE AND $upload_success == TRUE) {
                $mapel_id = $this->input->post('mapel_id', TRUE);
                $judul    = $this->input->post('judul', TRUE);

                $this->materi_model->update(
                    $materi['id'],
                    $materi['pengajar_id'],
                    null,
                    $mapel_id,
                    $judul,
                    null,
                    $update_file,
                    1
                );

                if ($is_new_file) {
                    # hapus file sebelumnya
                    if (is_file(get_path_file($materi['file']))) {
                        unlink(get_path_file($materi['file']));
                    }
                }

                $success = true;
            } else {
                if ($is_new_file == TRUE AND is_file(get_path_file($update_file))) {
                    unlink(get_path_file($update_file));
                }
            }
        }

        if ($success) {
            # cari kelas materi mana yang harus ditambah / dihapus
            $kelas_id      = $this->input->post('kelas_id', TRUE);
            $kelas_post_id = array();
            foreach ($kelas_id as $post_kelas_id) {
                $post_kelas_id = (int)$post_kelas_id;
                if (!empty($post_kelas_id)) {
                    $check = $this->materi_model->retrieve_kelas(null, $materi['id'], $post_kelas_id);
                    if (empty($check)) {
                        # tambahkan
                        $this->materi_model->create_kelas($materi['id'], $post_kelas_id);
                    }
                    $kelas_post_id[] = $post_kelas_id;
                }
            }

            if (count($materi_kelas_id) > count($kelas_post_id)) {
                $diff_kelas = array_diff($materi_kelas_id, $kelas_post_id);
                foreach ($diff_kelas as $diff_kelas_id) {
                    $retrieve = $this->materi_model->retrieve_kelas(null, $materi['id'], $diff_kelas_id);
                    # hapus
                    if (!empty($retrieve)) {
                        $this->materi_model->delete_kelas($retrieve['id']);
                    }
                }
            }

            $this->session->set_flashdata('materi', get_alert('success', 'Materi berhasil diperbaharui.'));
            redirect($uri_back);
        }

        $this->twig->display('edit-materi.html', $data);
    }

    function delete($segment_3 = '', $segment_4 = '')
    {
        $materi_id = (int)$segment_3;
        $uri_back  = (string)$segment_4;

        if (empty($uri_back)) {
            $uri_back = site_url('materi');
        } else {
            $uri_back = deurl_redirect($uri_back);
        }

        $materi = $this->materi_model->retrieve($materi_id);
        if (empty($materi)) {
            redirect($uri_back);
        }

        # jika file
        if (!empty($materi['file']) AND is_file(get_path_file($materi['file']))) {
            unlink(get_path_file($materi['file']));
        }

        $this->materi_model->delete($materi['id']);

        $this->session->set_flashdata('materi', get_alert('warning', 'Materi berhasil dihapus.'));
        redirect($uri_back);
    }

    function detail($segment_3 = '', $segment_4 = '')
    {
        $materi_id = (int)$segment_3;

        if (empty($materi_id)) {
            $data['error'] = "Materi tidak ditemukan.";
        }

        $materi = $this->materi_model->retrieve($materi_id);
        if (empty($materi) OR empty($materi['publish'])) {
            $data['error'] = "Materi tidak ditemukan.";
        }

        # tambah views jika materi terfulis
        if (empty($materi['file'])) {
            $plus_views = false;

            # buat session kalo sudah baca materi yan ini
            $session_read = $this->session->userdata('read_materi');
            if (empty($session_read)) {
                $this->session->set_userdata(array('read_materi' => array($materi['id'])));
                $plus_views = true;
            } else {
                if (!in_array($materi['id'], $session_read)) {
                    $plus_views = true;
                }
            }

            if ($plus_views) {
                $this->materi_model->plus_views($materi['id']);
            }
        }

        switch ($segment_4) {
            default:
            case 'download':
                # jika request download
                if ($segment_4 == 'download' AND !empty($materi['file'])) {
                    $data_file = file_get_contents(get_path_file($materi['file'])); // Read the file's contents
                    $name_file = $materi['file'];

                    $this->materi_model->plus_views($materi['id']);

                    force_download($name_file, $data_file); 
                }

                if (!isset($data['error'])) {

                    $data['materi'] = $materi;
                    $data['materi']['download_link'] = site_url('materi/detail/'.$materi['id'].'/download');

                    # cari tipenya
                    if (empty($materi['file'])) {
                        $type = 'tertulis';
                    } else {
                        $type = 'file';
                        $data['materi']['file_info']         = get_file_info(get_path_file($materi['file']));
                        $data['materi']['file_info']['mime'] = get_mime_by_extension(get_path_file($materi['file']));
                    }

                    $data['type'] = $type;
                    $data['materi']['mapel'] = $this->mapel_model->retrieve($materi['mapel_id']);
                    
                    # cari materi kelas
                    $materi_kelas = $this->materi_model->retrieve_all_kelas($materi['id']);
                    foreach ($materi_kelas as $mk) {
                        $kelas = $this->kelas_model->retrieve($mk['kelas_id']);
                        $data['materi']['materi_kelas'][] = $kelas;
                    }
                    
                    # cari pembuatnya
                    if (!empty($materi['pengajar_id'])) {
                        $pengajar = $this->pengajar_model->retrieve($materi['pengajar_id']);
                        $data['materi']['pembuat'] = array(
                            'nama'         => $pengajar['nama'],
                            'link_profil'  => site_url('pengajar/detail/'.$pengajar['status_id'].'/'.$pengajar['id']),
                            'link_foto'    => get_url_image_pengajar($pengajar['foto'], 'medium', $pengajar['jenis_kelamin'])
                        );
                    }

                    if (!empty($materi['siswa_id'])) {
                        $siswa = $this->siswa_model->retrieve($materi['siswa_id']);
                        $data['materi']['pembuat'] = array(
                            'nama'        => $siswa['nama'],
                            'link_profil' => site_url('siswa/'.$siswa['status_id'].'/'.$siswa['id']),
                            'link_foto'   => get_url_image_siswa($siswa['foto'], 'medium', $siswa['jenis_kelamin'])
                        );
                    }

                } else {
                    $data['materi'] = array();
                }
            break;
        }

        $this->twig->display('detail-materi.html', $data);
    }
}