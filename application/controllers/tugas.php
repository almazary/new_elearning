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
            if (is_admin()) {
                $val['pembuat']['link_profil'] = site_url('pengajar/detail/'.$pengajar['status_id'].'/'.$pengajar['id']);
            } else {
                $val['pembuat']['link_profil'] = site_url('pengajar/detail/'.$pengajar['id']);
            }
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

            # cari id pengajar
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

        # jika pengajar, tampilkan tugas yang dia buat
        if (is_pengajar()) {
            $filter['pengajar_id'] = array(get_sess_data('user', 'id'));
        }

        # jika siswa, tampilkan tugas pada kelas aktifnya
        elseif (is_siswa()) {
            $kelas_aktif = $this->siswa_kelas_aktif;
            $filter['kelas_id'] = array($kelas_aktif['kelas_id']);
        }

        if (!empty($_GET['judul'])) {
            $filter['judul'] = (string)$_GET['judul'];
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
        $data['pagination'] = $this->pager->view($retrieve_all_tugas, 'tugas/index/');
        $data['kelas']      = $this->kelas_model->retrieve_all_child();
        $data['mapel']      = $this->mapel_model->retrieve_all_mapel();

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
            base_url('assets/comp/colorbox/act-tugas.js')
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

        $this->twig->display('list-tugas.html', $data);
    }

    function add($segment_3 = '')
    {
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Akses ditolak.'));
            redirect('tugas');
        }

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
        $data['comp_js'] = get_tinymce('info');

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
                redirect('tugas/manajemen_soal/' . $tugas_id);
            } else {
                $this->session->set_flashdata('tugas', get_alert('success', 'Tugas Upload berhasil disimpan.'));
                redirect('tugas');
            }
        }

        $this->twig->display('tambah-tugas.html', $data);
    }

    function edit($segment_3 = '', $segment_4 = '')
    {
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Akses ditolak.'));
            redirect('tugas');
        }

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

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
            redirect('tugas');
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
        $data['comp_js']     = get_tinymce('info');

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

    function terbitkan($segment_3 = '', $segment_4 = '')
    {
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Akses ditolak.'));
            redirect('tugas');
        }

        $tugas_id = (int)$segment_3;
        $uri_back = (string)$segment_4;

        if (empty($uri_back)) {
            $uri_back = site_url('tugas');
        } else {
            $uri_back = deurl_redirect($uri_back);
        }

        if (empty($tugas_id)) {
            redirect($uri_back);
        }

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas)) {
            redirect($uri_back);
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
            redirect('tugas');
        }

        # cek pertanyaan, sudah ada belum
        if ($tugas['type_id'] != 1) {
            $check_pertanyaan = $this->tugas_model->retrieve_all_pertanyaan('all', 1, $tugas['id']);
            if (empty($check_pertanyaan)) {
                $this->session->set_flashdata('tugas', get_alert('warning', 'Pertanyaan masih kosong.'));
                redirect($uri_back);
            }

            # jika pilihan ganda cek pilihannya sudah ada belum
            if ($tugas['type_id'] == 3) {
                $empty_pilihan = array();
                $empty_kunci   = array();
                foreach ($check_pertanyaan as $p) {
                    $pilihan = $this->tugas_model->retrieve_all_pilihan($p['id']);
                    if (empty($pilihan)) {
                        $empty_pilihan[] = $p['urutan'];
                    } else {
                        $ada_kunci = false;
                        # cek kuncinya sudah diatur belum
                        foreach ($pilihan as $pil) {
                            if ($pil['kunci'] == 1) {
                                $ada_kunci = true;
                            }
                        }

                        if (!$ada_kunci) {
                            $empty_kunci[] = $p['urutan'];
                        }
                    }
                }

                if (!empty($empty_pilihan)) {
                    $this->session->set_flashdata('tugas', get_alert('warning', 'Pertanyaan no ' . implode(', ', $empty_pilihan) . ' belum ada pilihan jawaban.'));
                    redirect($uri_back);
                } elseif (!empty($empty_kunci)) {
                    $this->session->set_flashdata('tugas', get_alert('warning', 'Pilihan pertanyaan no ' . implode(', ', $empty_kunci) . ' belum ada kunci jawaban.'));
                    redirect($uri_back);
                }
            }
        }

        # terbitkan tugas
        $this->tugas_model->terbitkan($tugas['id']);

        $this->session->set_flashdata('tugas', get_alert('success', 'Tugas berhasil diterbitkan.'));
        redirect($uri_back);
    }

    function tutup($segment_3 = '', $segment_4 = '')
    {
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Akses ditolak.'));
            redirect('tugas');
        }

        $tugas_id = (int)$segment_3;
        $uri_back = (string)$segment_4;

        if (empty($uri_back)) {
            $uri_back = site_url('tugas');
        } else {
            $uri_back = deurl_redirect($uri_back);
        }

        if (empty($tugas_id)) {
            redirect($uri_back);
        }

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas)) {
            redirect($uri_back);
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
            redirect('tugas');
        }

        # tutup tugas
        $this->tugas_model->tutup($tugas['id']);

        $this->session->set_flashdata('tugas', get_alert('success', 'Tugas berhasil ditutup.'));
        redirect($uri_back);
    }

    function manajemen_soal($segment_3 = '', $segment_4 = '')
    {
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Akses ditolak.'));
            redirect('tugas');
        }

        $tugas_id = (int)$segment_3;
        $page_no  = (int)$segment_4;
        if (empty($page_no)) {
            $page_no = 1;
        }

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            redirect('tugas/index');
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
            redirect('tugas');
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

    function copy_soal($segment_3 = '')
    {
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            exit("Akses ditolak.");
        }

        $tugas_id = (int)$segment_3;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            exit("Tugas tidak ditemukan");
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
            exit("Tugas tidak ditemukan");
        }

        # aksi untuk copy pertanyaan
        if (!empty($_GET['copy'])) {
            $pertanyaan_id = (int)$_GET['copy'];
            $pertanyaan    = $this->tugas_model->retrieve_pertanyaan($pertanyaan_id);
            if (empty($pertanyaan)) {
                $this->session->set_flashdata('copy', get_alert('warning', 'Pertanyaan tidak ditemukan.'));
                redirect('tugas/copy_soal/' . $tugas['id']);
            }

            $new_pertanyaan_id = $this->tugas_model->create_pertanyaan($pertanyaan['pertanyaan'], $tugas['id']);

            # cari pilihan
            $pilihan = $this->tugas_model->retrieve_all_pilihan($pertanyaan['id']);
            foreach ($pilihan as $p) {
                $this->tugas_model->create_pilihan(
                    $new_pertanyaan_id,
                    $p['konten'],
                    $p['kunci'],
                    $p['urutan']
                );
            }

            $this->session->set_flashdata('copy', get_alert('success', "Pertanyaan ID $pertanyaan_id berhasil dicopy."));
            redirect('tugas/copy_soal/' . $tugas['id']);
        }

        $data['tugas'] = $tugas;

        # variabel untuk nyimpen biar tidak boros query
        $arr_tugas_id    = array();
        $arr_pengajar_id = array();

        # ambil semua pertanyaan
        $retrieve_all_pertanyaan = $this->tugas_model->retrieve_all_pertanyaan('all', 1, null);
        foreach ($retrieve_all_pertanyaan as $key => &$val) {
            # dapatkan informasi pembuat pertanyaan dan pada tugas apa
            if (!isset($arr_tugas_id[$val['tugas_id']])) {
                $info_tugas = $this->tugas_model->retrieve($val['tugas_id']);
                $arr_tugas_id[$val['tugas_id']] = $this->tugas_model->retrieve($val['tugas_id']);
            } else {
                $info_tugas = $arr_tugas_id[$val['tugas_id']];
            }

            if (!isset($arr_pengajar_id[$info_tugas['pengajar_id']])) {
                $info_pembuat = $this->pengajar_model->retrieve($info_tugas['pengajar_id']);
            } else {
                $info_pembuat = $arr_pengajar_id[$info_tugas['pengajar_id']];
            }

            if (is_admin()) {
                $info_pembuat['link_profil'] = site_url('pengajar/detail/'.$info_pembuat['status_id'].'/'.$info_pembuat['id']);
            } else {
                $info_pembuat['link_profil'] = site_url('pengajar/detail/'.$info_pembuat['id']);
            }

            $val['info_tugas']   = $info_tugas;
            $val['info_pembuat'] = $info_pembuat;

            # cari pilihan
            $pilihan = $this->tugas_model->retrieve_all_pilihan($val['id']);
            if (!empty($pilihan)) {
                $val['pilihan'] = $pilihan;
            }

            $retrieve_all_pertanyaan[$key] = $val;
        }

        $data['pertanyaan'] = $retrieve_all_pertanyaan;

        # panggil datatables
        $data['comp_js'] = load_comp_js(array(
            base_url('assets/comp/datatables/jquery.dataTables.js'),
            base_url('assets/comp/datatables/datatable-bootstrap2.js'),
            base_url('assets/comp/datatables/script.js'),
        ));

        $data['comp_css'] = load_comp_css(array(
            base_url('assets/comp/datatables/datatable-bootstrap2.css'),
        ));

        $this->twig->display('copy-pertanyaan.html', $data);
    }

    function tambah_soal($segment_3 = '')
    {
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            exit("Akses ditolak.");
        }

        $tugas_id = (int)$segment_3;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            exit("Tugas tidak ditemukan");
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
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
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            exit("Akses ditolak.");
        }

        $tugas_id      = (int)$segment_3;
        $pertanyaan_id = (int)$segment_4;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            exit("Tugas tidak ditemukan");
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
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
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            exit("Akses ditolak.");
        }

        $tugas_id      = (int)$segment_3;
        $pertanyaan_id = (int)$segment_4;
        $uri_back      = (string)$segment_5;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            exit("Tugas tidak ditemukan");
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
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
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            exit("Akses ditolak.");
        }

        $tugas_id      = (int)$segment_3;
        $pertanyaan_id = (int)$segment_4;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] != 3) {
            exit("Tugas tidak ditemukan");
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
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
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            exit("Akses ditolak.");
        }

        $tugas_id      = (int)$segment_3;
        $pertanyaan_id = (int)$segment_4;
        $pilihan_id    = (int)$segment_5;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] != 3) {
            exit("Tugas tidak ditemukan");
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
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

    function kunci_pilihan($segment_3 = '', $segment_4 = '', $segment_5 = '', $segment_6 = '')
    {
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            exit("Akses ditolak.");
        }

        $tugas_id      = (int)$segment_3;
        $pertanyaan_id = (int)$segment_4;
        $pilihan_id    = (int)$segment_5;
        $uri_back      = (string)$segment_6;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] != 3) {
            exit("Tugas tidak ditemukan");
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
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

        if (empty($uri_back)) {
            $uri_back = site_url('tugas/manajemen_soal/' . $tugas['id']);
        } else {
            $uri_back = deurl_redirect($uri_back);
        }

        $this->tugas_model->create_kunci($pertanyaan['id'], $pilihan['id']);

        redirect($uri_back . '#pilihan-' . $pertanyaan['id']);
    }

    function hapus_pilihan($segment_3 = '', $segment_4 = '', $segment_5 = '', $segment_6 = '')
    {
        # harus admin atau pengajar
        if (!is_admin() AND !is_pengajar()) {
            exit("Akses ditolak.");
        }

        $tugas_id      = (int)$segment_3;
        $pertanyaan_id = (int)$segment_4;
        $pilihan_id    = (int)$segment_5;
        $uri_back      = (string)$segment_6;

        $tugas = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] != 3) {
            exit("Tugas tidak ditemukan");
        }

        # jika sebagai pengajar, cek kepemilikan
        if (is_pengajar() AND $tugas['pengajar_id'] != get_sess_data('user', 'id')) {
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

        if (empty($uri_back)) {
            $uri_back = site_url('tugas/manajemen_soal/' . $tugas['id']);
        } else {
            $uri_back = deurl_redirect($uri_back);
        }

        $this->tugas_model->delete_pilihan($pilihan['id']);

        redirect($uri_back . '#pilihan-' . $pertanyaan['id']);
    }

    function kerjakan($tugas_id = '')
    {
        if (!is_siswa()) {
            redirect('tugas');
        }

        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas)) {
            redirect('tugas');
        }

        # cek aktif tidak dan tampil siswa tidak
        if (empty($tugas['aktif'])) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Tugas belum aktif.'));
            redirect('tugas');
        }

        if (empty($tugas['tampil_siswa'])) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Tugas belum aktif.'));
            redirect('tugas');
        }

        # cek sudah mengerjakan belum
        if (sudah_ngerjakan($tugas['id'], get_sess_data('user', 'id'))) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Anda sudah mengerjakan tugas ini.'));
            redirect('tugas');
        }

        $field_id    = 'mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
        $field_name  = 'Mengerjakan Tugas';

        $mulai   = date('Y-m-d H:i:s');
        $selesai = date('Y-m-d H:i:s', strtotime("+ $tugas[durasi] minutes", strtotime($mulai)));

        $field_value = array(
            'mulai'   => $mulai,
            'selesai' => $selesai
        );

        # cek sudah pernah mengerjakan belum, untuk keamanan.
        # karna bisa saja dibuka 2 kali dikomputer yang berbeda
        $check_field = retrieve_field($field_id);
        if (!empty($check_field)) {
            $check_field_value = json_decode($check_field['value'], 1);

            # cek upload tidak dan sudah selesai belum dari segi waktunya
            if ($tugas['type_id'] != 1 AND strtotime(date('Y-m-d H:i:s')) >= strtotime($check_field_value['selesai'])) {
                redirect('tugas/finish/' . $tugas['id'] . '/' . $check_field_value['unix_id']);
            }
        }

        # jika masih kosong, berarti belum mengerjakan sama sekali
        else {
            $pertanyaan = array();
            if ($tugas['type_id'] != 1) {
                # ambil pertanyaan ditugas ini
                $pertanyaan = $this->tugas_model->retrieve_all_pertanyaan('all', 1, $tugas['id'], 'ASC');
                # jika pilihan ganda, ambil pilihannya
                if ($tugas['type_id'] == 3) {
                    foreach ($pertanyaan as $key => $val) {
                        $val['pilihan'] = $this->tugas_model->retrieve_all_pilihan($val['id']);
                        $pertanyaan[$key] = $val;
                    }
                }

                $field_value['pertanyaan'] = $pertanyaan;
                $field_value['tugas']      = $tugas;
                $field_value['unix_id']    = md5($field_id) . rand(9, 999999);
                create_field($field_id, $field_name, json_encode($field_value));

            } else {
                create_field($field_id, $field_name, json_encode(array(
                    'mulai'   => $mulai,
                    'tugas'   => $tugas,
                    'unix_id' => md5($field_id) . rand(9, 999999)
                )));
            }
        }

        $check_field       = retrieve_field($field_id);
        $check_field_value = json_decode($check_field['value'], 1);
        $data['data']      = $check_field_value;

        $html_js = '';

        if ($tugas['type_id'] != 1) {
            $html_js = load_comp_js(array(
                base_url('assets/comp/jquery.countdown/jquery.countdown.min.js'),
                base_url('assets/comp/jquery.countdown/script.js'),
            ));
        }

        if ($tugas['type_id'] == 2) {
            # cari id pertanyaan, untuk keperluan auto save
            $arr_pertanyaan_id = array();
            foreach ($check_field_value['pertanyaan'] as $p) {
                $arr_pertanyaan_id[] = $p['id'];
            }

            $html_js .= get_tinymce('jawaban, textarea#jawaban-' . implode(', textarea#jawaban-', $arr_pertanyaan_id), 'advanced', array('autosave'));
            $html_js .= load_comp_js(array(
                base_url('assets/comp/jquery/tinymce.autosave.js'),
            ));
            $data['data']['str_id'] = implode(',', $arr_pertanyaan_id);
        }

        $data['comp_js'] = $html_js;
        $this->twig->display('ujian-online.html', $data);
    }

    function finish($tugas_id = '', $unix_id = '')
    {
        if (!is_siswa()) {
            redirect('tugas');
        }

        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            redirect('tugas');
        }

        if (empty($unix_id)) {
            redirect('tugas');
        }

        # cek sudah mengerjakan belum
        if (sudah_ngerjakan($tugas['id'], get_sess_data('user', 'id'))) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Anda sudah mengerjakan tugas ini.'));
            redirect('tugas');
        }

        $field_id    = 'mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
        $check_field = retrieve_field($field_id);

        if (!empty($check_field)) {
            # bandingkan unix_id nya
            $check_field_value = json_decode($check_field['value'], 1);
            if ($unix_id != $check_field_value['unix_id']) {
                $this->session->set_flashdata('tugas', get_alert('warning', 'Anda tidak mengerjakan tugas ini.'));
                redirect('tugas');
            }

            # jika pilihan ganda langsung di hitung benar salahnya
            if ($tugas['type_id'] == 3) {
                $jml_soal = 0;

                # cari kunci jawaban
                $data_kunci = array();
                foreach ($check_field_value['pertanyaan'] as $pertanyaan) {
                    # cari kuncinya
                    foreach ($pertanyaan['pilihan'] as $pilihan) {
                        if ($pilihan['kunci'] == 1) {
                            $data_kunci[$pertanyaan['id']] = $pilihan['id'];
                        }
                    }
                    $jml_soal++;
                }

                $jml_benar = 0;
                $jml_salah = 0;

                # cari jawabannya
                foreach ($check_field_value['jawaban'] as $pertanyaan_id => $pilihan_id) {
                    # cek jawaban benar tidak
                    if (isset($data_kunci[$pertanyaan_id]) && $data_kunci[$pertanyaan_id] == $pilihan_id) {
                        $jml_benar++;
                    } else {
                        $jml_salah++;
                    }
                }

                $nilai = ($jml_benar / $jml_soal) * 100;

                # simpan nilai
                $this->tugas_model->create_nilai($nilai, $tugas['id'], get_sess_data('user', 'id'));

                # hapus field tambahan
                delete_field($field_id);

                # simpan history
                $new_field_id                     = 'history-mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
                $check_field_value['nilai']       = $nilai;
                $check_field_value['jml_benar']   = $jml_benar;
                $check_field_value['jml_salah']   = $jml_salah;

                $sekarang                         = date('Y-m-d H:i:s');
                $check_field_value['tgl_submit']  = $sekarang;
                $check_field_value['total_waktu'] = lama_pengerjaan($check_field_value['mulai'], $sekarang);

                create_field($new_field_id, 'History pengerjaan tugas', json_encode($check_field_value));
            }

            # jika essay dan upload, biar dikoreksi dl
            else {
                # hapus field tambahan
                delete_field($field_id);

                # simpan history
                $new_field_id                     = 'history-mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
                $sekarang                         = date('Y-m-d H:i:s');
                $check_field_value['tgl_submit']  = $sekarang;
                $check_field_value['total_waktu'] = lama_pengerjaan($check_field_value['mulai'], $sekarang);

                create_field($new_field_id, 'History pengerjaan tugas', json_encode($check_field_value));
            }

            $this->session->set_flashdata('tugas', get_alert('success', 'Anda telah berhasil mengerjakan tugas ini.'));
            redirect('tugas');
        }

        redirect('tugas');
    }

    function submit_essay($tugas_id = '', $unix_id = '')
    {
        if (!is_siswa()) {
            redirect('tugas');
        }

        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] != 2) {
            redirect('tugas');
        }

        if (empty($unix_id)) {
            redirect('tugas');
        }

        # cek sudah mengerjakan belum
        if (sudah_ngerjakan($tugas['id'], get_sess_data('user', 'id'))) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Anda sudah mengerjakan tugas ini.'));
            redirect('tugas');
        }

        $field_id    = 'mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
        $check_field = retrieve_field($field_id);

        if (!empty($check_field)) {
            # bandingkan unix_id nya
            $check_field_value = json_decode($check_field['value'], 1);
            if ($unix_id != $check_field_value['unix_id']) {
                $this->session->set_flashdata('tugas', get_alert('warning', 'Anda tidak mengerjakan tugas ini.'));
                redirect('tugas');
            }

            $post_jawaban = $this->input->post('jawaban');
            foreach ($post_jawaban as $pertanyaan_id => $jawaban) {
                # replace yang sudah terimpan atau yang belum disimpan
                $check_field_value['jawaban'][$pertanyaan_id] = $jawaban;
            }

            # hapus field tambahan
            delete_field($field_id);

            # simpan history
            $new_field_id                     = 'history-mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
            $sekarang                         = date('Y-m-d H:i:s');
            $check_field_value['tgl_submit']  = $sekarang;
            $check_field_value['total_waktu'] = lama_pengerjaan($check_field_value['mulai'], $sekarang);

            create_field($new_field_id, 'History pengerjaan tugas', json_encode($check_field_value));

            $this->session->set_flashdata('tugas', get_alert('success', 'Anda telah berhasil mengerjakan tugas ini.'));
            redirect('tugas');
        }

        redirect('tugas');
    }

    function submit_upload($tugas_id = '', $unix_id = '')
    {
        if (!is_siswa()) {
            redirect('tugas');
        }

        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] != 1) {
            redirect('tugas');
        }

        if (empty($unix_id)) {
            redirect('tugas');
        }

        # cek sudah mengerjakan belum
        if (sudah_ngerjakan($tugas['id'], get_sess_data('user', 'id'))) {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Anda sudah mengerjakan tugas ini.'));
            redirect('tugas');
        }

        $field_id    = 'mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
        $check_field = retrieve_field($field_id);

        if (!empty($check_field)) {
            # bandingkan unix_id nya
            $check_field_value = json_decode($check_field['value'], 1);
            if ($unix_id != $check_field_value['unix_id']) {
                $this->session->set_flashdata('tugas', get_alert('warning', 'Anda tidak mengerjakan tugas ini.'));
                redirect('tugas');
            }

            $config['upload_path']   = get_path_file();
            $config['allowed_types'] = 'doc|zip|rar|txt|docx|xls|xlsx|pdf|tar|gz|jpg|jpeg|JPG|JPEG|png|ppt|pptx';
            $config['max_size']      = '0';
            $config['max_width']     = '0';
            $config['max_height']    = '0';
            $config['file_name']     = $unix_id;
            $this->upload->initialize($config);

            if ($this->upload->do_upload()) {
                $upload_data = $this->upload->data();
                $check_field_value['file_name'] = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('upload', '<span class="text-error">' . $this->upload->display_errors() . '</span>');
                redirect('tugas/kerjakan/' . $tugas['id']);
            }

            # hapus field tambahan
            delete_field($field_id);

            # simpan history
            $new_field_id                    = 'history-mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
            $sekarang                        = date('Y-m-d H:i:s');
            $check_field_value['tgl_submit'] = $sekarang;

            create_field($new_field_id, 'History pengerjaan tugas', json_encode($check_field_value));

            $this->session->set_flashdata('tugas', get_alert('success', 'Anda telah berhasil mengerjakan tugas ini.'));
            redirect('tugas');
        }

        redirect('tugas');
    }

    function nilai($tugas_id = '')
    {
        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas)) {
            redirect('tugas');
        }

        $data['tugas'] = $this->formatData($tugas);

        # jika pengajar atau admin
        if (is_pengajar() OR is_admin()) {
            # ini harus ganda
            if ($tugas['type_id'] != 3) {
                redirect('tugas');
            }

            # ambil nilai
            $data_nilai     = array();
            $retrieve_nilai = $this->tugas_model->retrieve_all_nilai($tugas['id']);
            foreach ($retrieve_nilai as $nilai) {
                # cari history
                $history_id = 'history-mengerjakan-' . $nilai['siswa_id'] . '-' . $tugas['id'];
                $history    = retrieve_field($history_id);

                # jika history kosong, hapus nilai
                if (empty($history)) {
                    $this->tugas_model->delete_nilai($nilai['id']);
                    continue;
                }

                $nilai['history'] = $history;

                # cari siswa
                $siswa = $this->siswa_model->retrieve($nilai['siswa_id']);

                # kelas siswa
                $kelas_siswa = $this->kelas_model->retrieve_siswa(null, array(
                    'siswa_id' => $nilai['siswa_id'],
                    'aktif'    => 1
                ));
                $kelas = $this->kelas_model->retrieve($kelas_siswa['kelas_id']);
                $siswa['kelas_aktif'] = $kelas;

                $nilai['siswa'] = $siswa;

                $data_nilai[] = $nilai;
            }

            $data['data_nilai'] = $data_nilai;

            # panggil datatables dan combobox
            $data['comp_js'] = load_comp_js(array(
                base_url('assets/comp/datatables/jquery.dataTables.js'),
                base_url('assets/comp/datatables/datatable-bootstrap2.js'),
                base_url('assets/comp/datatables/script.js'),
                base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                base_url('assets/comp/colorbox/act-tugas.js'),
            ));

            $data['comp_css'] = load_comp_css(array(
                base_url('assets/comp/datatables/datatable-bootstrap2.css'),
                base_url('assets/comp/colorbox/colorbox.css'),
            ));

            $this->twig->display('list-nilai.html', $data);
        }

        if (is_siswa()) {
            $nilai         = $this->tugas_model->retrieve_nilai(null, $tugas['id'], get_sess_data('user', 'id'));
            $data['nilai'] = $nilai;

            # cari history
            $history_id = 'history-mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
            $history    = retrieve_field($history_id);

            if (empty($history)) {
                exit('Tugas belum dikerjakan');
            }

            $history_value   = json_decode($history['value'], 1);
            $data['history'] = $history_value;

            $this->twig->display('lihat-nilai.html', $data);
        }
    }

    function koreksi($tugas_id = '')
    {
        if (is_siswa()) {
            redirect('tugas');
        }

        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas)) {
            redirect('tugas');
        }

        # ini essay atau upload
        if ($tugas['type_id'] == 3) {
            redirect('tugas');
        }

        $data['tugas'] = $this->formatData($tugas);

        $data_siswa = array();

        # ambil history
        $retrieve_all_history = $this->tugas_model->retrieve_all_history($tugas_id);
        foreach ($retrieve_all_history as $history) {
            # cari siswa_id
            $split_id = explode('-' , $history['id']);
            $siswa_id = $split_id[2];

            # cari tugas_id
            $history_tugas_id = end($split_id);
            if ($history_tugas_id != $tugas['id']) {
                continue;
            }

            # cari siswa
            $siswa = $this->siswa_model->retrieve($siswa_id);

            # kelas siswa
            $kelas_siswa = $this->kelas_model->retrieve_siswa(null, array(
                'siswa_id' => $siswa_id,
                'aktif'    => 1
            ));
            $kelas = $this->kelas_model->retrieve($kelas_siswa['kelas_id']);
            $siswa['kelas_aktif'] = $kelas;
            $siswa['history']     = $history;

            # cari nilai
            $siswa['nilai'] = $this->tugas_model->retrieve_nilai(null, $tugas['id'], $siswa['id']);

            $data_siswa[] = $siswa;
        }
        $data['data_siswa'] = $data_siswa;
        // pr($data_siswa);die;

        # panggil datatables dan combobox
        $data['comp_js'] = load_comp_js(array(
            base_url('assets/comp/datatables/jquery.dataTables.js'),
            base_url('assets/comp/datatables/datatable-bootstrap2.js'),
            base_url('assets/comp/datatables/script.js'),
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
            base_url('assets/comp/colorbox/act-tugas.js'),
        ));

        $data['comp_css'] = load_comp_css(array(
            base_url('assets/comp/datatables/datatable-bootstrap2.css'),
            base_url('assets/comp/colorbox/colorbox.css'),
        ));

        $this->twig->display('list-peserta.html', $data);
    }

    function detail_jawaban($siswa_id = '', $tugas_id = '')
    {
        $siswa_id = (int)$siswa_id;
        $siswa    = $this->siswa_model->retrieve($siswa_id);
        if (empty($siswa)) {
            exit('Siswa tidak ditemukan');
        }

        # cek jika siswa, punya dia tidak
        if (is_siswa() AND $siswa['id'] != get_sess_data('user', 'id')) {
            exit('Akses ditolak');
        }

        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas)) {
            exit('Tugas tidak ditemukan');
        }

        $data['tugas'] = $this->formatData($tugas);
        $data['siswa'] = $siswa;

        # cari history
        $history_id = 'history-mengerjakan-' . $siswa['id'] . '-' . $tugas['id'];
        $history    = retrieve_field($history_id);

        if (empty($history)) {
            exit('Tugas belum dikerjakan');
        }

        $history_value   = json_decode($history['value'], 1);
        $data['history'] = $history_value;

        if ($tugas['type_id'] == 3) {
            $this->twig->display('detail-jawaban-ganda.html', $data);
        } elseif ($tugas['type_id'] == 2) {
            # jika ada post nilai
            if (!empty($_POST['nilai'])) {
                $total_nilai = 0;
                foreach ($_POST['nilai'] as $p_id => $p_nilai) {
                    $total_nilai = $total_nilai + $p_nilai;
                }

                # update history
                $history_value['nilai'] = $_POST['nilai'];
                update_field($history_id, $history['nama'], json_encode($history_value));

                # simpan atau update nilai
                $check = $this->tugas_model->retrieve_nilai(null, $tugas['id'], $siswa['id']);
                if (empty($check)) {
                    $this->tugas_model->create_nilai($total_nilai, $tugas['id'], $siswa['id']);
                } else {
                    $this->tugas_model->update_nilai($check['id'], $total_nilai, $tugas['id'], $siswa['id']);
                }

                redirect('tugas/detail_jawaban/' . $siswa['id'] . '/' . $tugas['id']);
            }

            # cek sudah koreksi belum, dengan cara cek nilainya sudah ada belum
            $nilai                   = $this->tugas_model->retrieve_nilai(null, $tugas['id'], $siswa['id']);
            $data['sudah_dikoreksi'] = !empty($nilai) ? true : false;
            $data['nilai']           = $nilai;

            $this->twig->display('detail-jawaban-essay.html', $data);
        } elseif ($tugas['type_id'] == 1) {
            if (!empty($_POST['nilai'])) {
                $nilai = $this->input->post('nilai', true);

                # update history
                $history_value['nilai'] = $nilai;
                update_field($history_id, $history['nama'], json_encode($history_value));

                # simpan atau update nilai
                $check = $this->tugas_model->retrieve_nilai(null, $tugas['id'], $siswa['id']);
                if (empty($check)) {
                    $this->tugas_model->create_nilai($nilai, $tugas['id'], $siswa['id']);
                } else {
                    $this->tugas_model->update_nilai($check['id'], $nilai, $tugas['id'], $siswa['id']);
                }

                redirect('tugas/detail_jawaban/' . $siswa['id'] . '/' . $tugas['id']);
            }

            # cek sudah koreksi belum, dengan cara cek nilainya sudah ada belum
            $nilai                   = $this->tugas_model->retrieve_nilai(null, $tugas['id'], $siswa['id']);
            $data['sudah_dikoreksi'] = !empty($nilai) ? true : false;
            $data['nilai']           = $nilai;

            $data['file_info']         = get_file_info(get_path_file($history_value['file_name']));
            # bug ci http://stackoverflow.com/questions/24095996/codeignter-get-file-info-returns-filename-as-false
            if (empty($data['file_info']['name'])) {
                $data['file_info']['name'] = $history_value['file_name'];
            }
            $data['file_info']['mime'] = get_mime_by_extension(get_path_file($history_value['file_name']));

            $this->twig->display('detail-jawaban-upload.html', $data);
        }
    }

    function reset_jawaban($tugas_id, $siswa_id)
    {
        # jika pengajar atau admin
        if (is_pengajar() OR is_admin()) {
            $tugas_id = (int)$tugas_id;
            $tugas    = $this->tugas_model->retrieve($tugas_id);
            if (empty($tugas)) {
                redirect('tugas');
            }

            $siswa = $this->siswa_model->retrieve($siswa_id);
            if (empty($siswa)) {
                redirect('tugas');
            }

            # hapus history
            $history_id = 'history-mengerjakan-' . $siswa['id'] . '-' . $tugas['id'];
            $history    = retrieve_field($history_id);
            $history_value = json_decode($history['value'], 1);
            delete_field($history_id);

            # hapus nilai
            $retrieve_nilai = $this->tugas_model->retrieve_nilai(null, $tugas['id'], $siswa['id']);
            $this->tugas_model->delete_nilai($retrieve_nilai['id']);

            $this->session->set_flashdata('tugas', get_alert('success', 'Siswa berhasil dianggap belum mengerjakan.'));

            if ($tugas['type_id'] == 3) {
                redirect('tugas/nilai/' . $tugas['id']);
            } else {
                # jika tugas upload, dihapus juga file uploadnya biar g menuh-menuhin space
                if ($tugas['type_id'] == 1 && is_file(get_path_file($history_value['file_name']))) {
                    @unlink(get_path_file($history_value['file_name']));
                }

                redirect('tugas/koreksi/' . $tugas['id']);
            }

        } else {
            $this->session->set_flashdata('tugas', get_alert('warning', 'Akses ditolak.'));
            redirect('tugas');
        }
    }
}
