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
                    get_sess_data('admin', 'pengajar', 'id'),
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
                    get_sess_data('admin', 'pengajar', 'id'),
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
}