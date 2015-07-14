<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tugas extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        must_login();
    }

    private function formatData($val)
    {
        # cari pembuatnya
        if (!empty($val['pengajar_id'])) {
            $pengajar = $this->pengajar_model->retrieve($val['pengajar_id']);
            $val['pembuat'] = $pengajar;
            $val['pembuat']['link_profil'] = site_url('pengajar/detail/'.$pengajar['status_id'].'/'.$pengajar['id']);
        }

        # cari tugas kelas
        $tugas_kelas = $this->tugas_model->retrieve_all_kelas($val['id']);
        foreach ($tugas_kelas as $mk) {
            $kelas = $this->kelas_model->retrieve($mk['kelas_id']);
            $val['tugas_kelas'][] = $kelas;
        }

        # cari matapelajarannya
        $val['mapel'] = $this->mapel_model->retrieve($val['mapel_id']);

        # type label
        if ($val['type_id'] == 1) {
            $val['type_label'] = 'Upload';
        }
        if ($val['type_id'] == 2) {
            $val['type_label'] = 'Essay';
        }
        if ($val['type_id'] == 3) {
            $val['type_label'] = 'Ganda';
        }

        return $val;
    }

    function index($segment_3 = '')
    {
        if (!empty($_GET['clear_filter']) AND $_GET['clear_filter'] == 'true') {
            $this->session->set_userdata('filter_tugas', null);
        }

        $page_no = (int)$segment_3;
        if (empty($page_no)) {
            $page_no = 1;
        }

        # jika ada post filter
        if ($this->form_validation->run('tugas/filter') == true) {
            $pembuat = $this->input->post('pembuat', TRUE);

            # cari id pengajar dan siswa
            $pengajar_id = array();
            if (!empty($pembuat)) {
                foreach ($this->pengajar_model->retrieve_all_by_name($pembuat) as $val) {
                    $pengajar_id[] = $val['id'];
                }

                if (empty($pengajar_id)) {
                    $pengajar_id[] = 0;
                }
            }

            $filter = array(
                'judul'       => $this->input->post('judul', true),
                'info'        => $this->input->post('info', true),
                'pengajar_id' => $pengajar_id,
                'pembuat'     => $pembuat,
                'mapel_id'    => $this->input->post('mapel_id', true),
                'kelas_id'    => $this->input->post('kelas_id', true),
                'type'        => $this->input->post('type', true),
                'status'      => $this->input->post('status', true),
            );

            $this->session->set_userdata('filter_tugas', $filter);
        }

        $filter = $this->session->userdata('filter_tugas');
        if (empty($filter)) {
            $filter = array(
                'judul'       => '',
                'info'        => '',
                'pengajar_id' => array(),
                'pembuat'     => '',
                'mapel_id'    => array(),
                'kelas_id'    => array(),
                'type'        => array(),
                'status'      => array()
            );
        }
        $data['filter'] = $filter;

        # ambil semua data tugas
        $retrieve_all_tugas = $this->tugas_model->retrieve_all(
            20,
            $page_no,
            $filter['mapel_id'],
            $filter['pengajar_id'],
            $filter['type'],
            $filter['kelas_id'],
            $filter['judul'],
            $filter['info'],
            $filter['status']
        );

        # format array data
        $results = array();
        foreach ($retrieve_all_tugas['results'] as $key => $val) {
            $results[$key] = $this->formatData($val);
        }

        $data['tugas']      = $results;
        $data['pagination']  = $this->pager->view($retrieve_all_tugas, 'tugas/index/');
        $data['kelas']       = $this->kelas_model->retrieve_all_child();
        $data['mapel']       = $this->mapel_model->retrieve_all_mapel();

        $this->twig->display('list-tugas.html', $data);
    }

    function add($segment_3 = '')
    {
        $type = (string)strtolower($segment_3);
        if (!in_array($type, array(1, 2, 3))) {
            redirect('tugas');
        }

        # type label
        if ($type == 1) {
            $data['type_label'] = 'Upload';
            $form_validation    = 'tugas/add_upload';
        }
        if ($type == 2) {
            $data['type_label'] = 'Essay';
            $form_validation    = 'tugas/add_ganda_essay';
        }
        if ($type == 3) {
            $data['type_label'] = 'Ganda';
            $form_validation    = 'tugas/add_ganda_essay';
        }

        $data['type']    = $type;
        $data['mapel']   = $this->mapel_model->retrieve_all_mapel();
        $data['kelas']   = $this->kelas_model->retrieve_all_child();

        if ($this->form_validation->run($form_validation) == TRUE) {
            $mapel_id = $this->input->post('mapel_id', TRUE);
            $judul    = $this->input->post('judul', TRUE);
            $info     = $this->input->post('info', TRUE);
            $durasi   = null;
            if ($type != 1) {
                $durasi = $this->input->post('durasi', TRUE);
            }

            $tugas_id = $this->tugas_model->create(
                $mapel_id,
                get_sess_data('user', 'id'),
                $type,
                $judul,
                $durasi,
                $info
            );

            # simpan kelas tugas
            $kelas_id = $this->input->post('kelas_id', TRUE);
            foreach ($kelas_id as $tugas_kelas_id) {
                $this->tugas_model->create_kelas($tugas_id, $tugas_kelas_id);
            }

            if ($type != 1) {
                # redirect ke manajemen soal
                $this->session->set_flashdata('tugas', get_alert('success', 'Manajemen soal tugas.'));
                redirect('tugas/manajemen_soal/' . $tugas_id . '/' . enurl_redirect(site_url('tugas')));
            } else {
                $this->session->set_flashdata('tugas', get_alert('success', 'Tugas Upload berhasil disimpan.'));
                redirect('tugas');
            }
        }

        $this->twig->display('tambah-tugas.html', $data);
    }

    function edit($segment_3 = '', $segment_4 = '')
    {
        $tugas_id = (int)$segment_3;
        $uri_back = (string)$segment_4;

        if (empty($uri_back)) {
            $uri_back = site_url('tugas');
        } else {
            $uri_back = deurl_redirect($uri_back);
        }

        $data['uri_back'] = $uri_back;

        if (empty($tugas_id)) {
            redirect($uri_back);
        }

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas)) {
            redirect($uri_back);
        }

        # type label
        if ($tugas['type_id'] == 1) {
            $data['type_label'] = 'Upload';
            $form_validation    = 'tugas/add_upload';
        }
        if ($tugas['type_id'] == 2) {
            $data['type_label'] = 'Essay';
            $form_validation    = 'tugas/add_ganda_essay';
        }
        if ($tugas['type_id'] == 3) {
            $data['type_label'] = 'Ganda';
            $form_validation    = 'tugas/add_ganda_essay';
        }

        # hanya ambil kelas_idnya
        $tugas_kelas    = $this->tugas_model->retrieve_all_kelas($tugas['id']);
        $tugas_kelas_id = array();
        foreach ($tugas_kelas as $r) {
            $tugas_kelas_id[] = $r['kelas_id'];
        }

        $data['tugas']       = $tugas;
        $data['tugas_kelas'] = $tugas_kelas_id;
        $data['mapel']       = $this->mapel_model->retrieve_all_mapel();
        $data['kelas']       = $this->kelas_model->retrieve_all_child();

        if ($this->form_validation->run($form_validation) == TRUE) {
            $mapel_id = $this->input->post('mapel_id', TRUE);
            $judul    = $this->input->post('judul', TRUE);
            $info     = $this->input->post('info', TRUE);
            $durasi   = null;
            if ($tugas['type_id'] != 1) {
                $durasi = $this->input->post('durasi', TRUE);
            }

            $this->tugas_model->update(
                $tugas['id'],
                $mapel_id,
                $tugas['pengajar_id'],
                $tugas['type_id'],
                $judul,
                $durasi,
                $info,
                $tugas['aktif']
            );

            # cari kelas tugas mana yang harus ditambah / dihapus
            $kelas_id      = $this->input->post('kelas_id', TRUE);
            $kelas_post_id = array();
            foreach ($kelas_id as $post_kelas_id) {
                $post_kelas_id = (int)$post_kelas_id;
                if (!empty($post_kelas_id)) {
                    $check = $this->tugas_model->retrieve_kelas(null, $tugas['id'], $post_kelas_id);
                    if (empty($check)) {
                        # tambahkan
                        $this->tugas_model->create_kelas($tugas['id'], $post_kelas_id);
                    }
                    $kelas_post_id[] = $post_kelas_id;
                }
            }

            if (count($tugas_kelas_id) > count($kelas_post_id)) {
                $diff_kelas = array_diff($tugas_kelas_id, $kelas_post_id);
                foreach ($diff_kelas as $diff_kelas_id) {
                    $retrieve = $this->tugas_model->retrieve_kelas(null, $tugas['id'], $diff_kelas_id);
                    # hapus
                    if (!empty($retrieve)) {
                        $this->tugas_model->delete_kelas($retrieve['id']);
                    }
                }
            }

            $this->session->set_flashdata('tugas', get_alert('success', 'Tugas berhasil diperbaharui.'));
            redirect($uri_back);
        }

        $this->twig->display('edit-tugas.html', $data);
    }

    function manajemen_soal($segment_3 = '', $segment_4 = '')
    {
        $tugas_id = (int)$segment_3;
        $page_no  = (int)$segment_4;
        if (empty($page_no)) {
            $page_no = 1;
        }

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            redirect('tugas/index');
        }

        $data['tugas'] = $this->formatData($tugas);

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
            base_url('assets/comp/colorbox/act-manajamen-soal.js')
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

        $retrieve_all = $this->tugas_model->retrieve_all_pertanyaan(
            20,
            $page_no,
            $tugas['id'],
            'DESC'
        );

        # jika pilihan ganda
        if ($tugas['type_id'] == 3) {
            foreach ($retrieve_all['results'] as $key => $val) {
                $val['pilihan'] = $this->tugas_model->retrieve_all_pilihan($val['id']);
                $retrieve_all['results'][$key] = $val;
            }
        }

        $data['pertanyaan'] = $retrieve_all['results'];
        $data['pagination'] = $this->pager->view($retrieve_all, 'tugas/manajemen_soal/' . $tugas['id'] . '/');

        $this->twig->display('manajemen-tugas.html', $data);
    }

    function tambah_soal($segment_3 = '')
    {
        $tugas_id = (int)$segment_3;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            exit("Tugas tidak ditemukan");
        }

        $data['tugas']         = $tugas;
        $data['comp_js']       = get_tinymce('pertanyaan', 'advanced', array('autosave'));
        $data['no_pertanyaan'] = $this->tugas_model->count_pertanyaan($tugas['id']) + 1;

        if ($this->form_validation->run('tugas/pertanyaan') == TRUE) {
            $pertanyaan = $this->input->post('pertanyaan', true);

            $pertanyaan_id = $this->tugas_model->create_pertanyaan(
                $pertanyaan,
                $tugas['id'],
                $data['no_pertanyaan']
            );

            $this->session->set_flashdata('tugas', get_alert('success', 'Pertanyaan berhasil disimpan.'));
            redirect('tugas/edit_soal/' . $tugas['id'] . '/' . $pertanyaan_id);
        }

        $this->twig->display('tambah-pertanyaan.html', $data);
    }

    function edit_soal($segment_3 = '', $segment_4 = '')
    {
        $tugas_id      = (int)$segment_3;
        $pertanyaan_id = (int)$segment_4;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            exit("Tugas tidak ditemukan");
        }

        $pertanyaan = $this->tugas_model->retrieve_pertanyaan($pertanyaan_id);
        if (empty($pertanyaan)) {
            exit("Pertanyaan tidak ditemukan");
        }

        $data['pertanyaan']    = $pertanyaan;
        $data['tugas']         = $tugas;
        $data['comp_js']       = get_tinymce('pertanyaan', 'advanced', array('autosave'));
        $data['no_pertanyaan'] = $pertanyaan['urutan'];

        if ($this->form_validation->run('tugas/pertanyaan') == TRUE) {
            $post_pertanyaan = $this->input->post('pertanyaan', true);

            $this->tugas_model->update_pertanyaan(
                $pertanyaan['id'],
                $post_pertanyaan,
                $pertanyaan['urutan'],
                $tugas['id']
            );

            $this->session->set_flashdata('tugas', get_alert('success', 'Pertanyaan berhasil diperbaharui.'));
            redirect('tugas/edit_soal/' . $tugas['id'] . '/' . $pertanyaan['id']);
        }

        $this->twig->display('edit-pertanyaan.html', $data);
    }

    function hapus_soal($segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
        $tugas_id      = (int)$segment_3;
        $pertanyaan_id = (int)$segment_4;
        $uri_back      = (string)$segment_5;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            exit("Tugas tidak ditemukan");
        }

        $pertanyaan = $this->tugas_model->retrieve_pertanyaan($pertanyaan_id);
        if (empty($pertanyaan)) {
            exit("Pertanyaan tidak ditemukan");
        }

        if (empty($uri_back)) {
            $uri_back = site_url('tugas/manajemen_soal/' . $tugas['id']);
        } else {
            $uri_back = deurl_redirect($uri_back);
        }

        # hapus pertanyaan
        $this->tugas_model->delete_pertanyaan($pertanyaan['id']);

        $this->session->set_flashdata('tugas', get_alert('warning', 'Pertanyaan berhasil dihapus.'));
        redirect($uri_back);
    }

    function tambah_pilihan($segment_3 = '', $segment_4 = '')
    {
        $tugas_id      = (int)$segment_3;
        $pertanyaan_id = (int)$segment_4;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] != 3) {
            exit("Tugas tidak ditemukan");
        }

        $pertanyaan = $this->tugas_model->retrieve_pertanyaan($pertanyaan_id);
        if (empty($pertanyaan)) {
            exit("Pertanyaan tidak ditemukan");
        }

        $data['pertanyaan']    = $pertanyaan;
        $data['tugas']         = $tugas;
        $data['comp_js']       = get_tinymce('konten', 'advanced', array('autosave'));

        if ($this->form_validation->run('tugas/pilihan') == TRUE) {
            $post_pilihan = $this->input->post('pilihan', true);
            $post_konten  = $this->input->post('konten', true);

            $pilihan_id = $this->tugas_model->create_pilihan(
                $pertanyaan['id'],
                $post_konten,
                0,
                $post_pilihan
            );

            $this->session->set_flashdata('tugas', get_alert('success', 'Pilihan berhasil disimpan.'));
            redirect('tugas/edit_pilihan/' . $tugas['id'] . '/' . $pertanyaan['id'] . '/' . $pilihan_id);
        }

        $this->twig->display('tambah-pilihan.html', $data);
    }

    function edit_pilihan($segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
        $tugas_id      = (int)$segment_3;
        $pertanyaan_id = (int)$segment_4;
        $pilihan_id    = (int)$segment_5;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] != 3) {
            exit("Tugas tidak ditemukan");
        }

        $pertanyaan = $this->tugas_model->retrieve_pertanyaan($pertanyaan_id);
        if (empty($pertanyaan)) {
            exit("Pertanyaan tidak ditemukan");
        }

        $pilihan = $this->tugas_model->retrieve_pilihan($pilihan_id, $pertanyaan['id']);
        if (empty($pilihan)) {
            exit("Pilihan tidak ditemukan");
        }

        $data['pilihan']    = $pilihan;
        $data['pertanyaan'] = $pertanyaan;
        $data['tugas']      = $tugas;
        $data['comp_js']    = get_tinymce('konten', 'advanced', array('autosave'));

        if ($this->form_validation->run('tugas/pilihan') == TRUE) {
            $post_pilihan = $this->input->post('pilihan', true);
            $post_konten  = $this->input->post('konten', true);

            $this->tugas_model->update_pilihan(
                $pilihan['id'],
                $pertanyaan['id'],
                $post_konten,
                $pilihan['kunci'],
                $post_pilihan
            );

            $this->session->set_flashdata('tugas', get_alert('success', 'Pilihan berhasil diperbaharui.'));
            redirect('tugas/edit_pilihan/' . $tugas['id'] . '/' . $pertanyaan['id'] . '/' . $pilihan_id);
        }

        $this->twig->display('edit-pilihan.html', $data);
    }
}