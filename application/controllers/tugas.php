<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class untuk resource tugas
 *
 * @package   e-Learning Dokumenary Net
 * @author    Almazari <almazary@gmail.com>
 * @copyright Copyright (c) 2013 - 2016, Dokumenary Net.
 * @since     1.0
 * @link      http://dokumenary.net
 *
 * INDEMNITY
 * You agree to indemnify and hold harmless the authors of the Software and
 * any contributors for any direct, indirect, incidental, or consequential
 * third-party claims, actions or suits, as well as any related expenses,
 * liabilities, damages, settlements or fees arising from your use or misuse
 * of the Software, or a violation of any terms of this license.
 *
 * DISCLAIMER OF WARRANTY
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR
 * IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE,
 * NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.
 *
 * LIMITATIONS OF LIABILITY
 * YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE
 * FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION
 * WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE
 * APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING
 * BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF
 * DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.
 */

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
        $data['comp_js'] = get_texteditor();

        if ($this->form_validation->run($form_validation) == TRUE) {
            $mapel_id = $this->input->post('mapel_id', TRUE);
            $judul    = $this->input->post('judul', TRUE);
            $info     = $this->input->post('info');
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
        $data['comp_js']     = get_texteditor();

        if ($this->form_validation->run($form_validation) == TRUE) {
            $mapel_id = $this->input->post('mapel_id', TRUE);
            $judul    = $this->input->post('judul', TRUE);
            $info     = $this->input->post('info');
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
        foreach ($retrieve_all_pertanyaan as $key => $val) {
            # dapatkan informasi pembuat pertanyaan dan pada tugas apa
            if (!isset($arr_tugas_id[$val['tugas_id']])) {
                $info_tugas = $this->tugas_model->retrieve($val['tugas_id']);
                $arr_tugas_id[$val['tugas_id']] = $this->tugas_model->retrieve($val['tugas_id']);
            } else {
                $info_tugas = $arr_tugas_id[$val['tugas_id']];
            }

            //Jika sebagai pengajar, tampilkan yang dia buat saja
            if (is_pengajar() AND $info_tugas['pengajar_id'] != get_sess_data('user', 'id')) {
                unset($retrieve_all_pertanyaan[$key]);
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
        $data['comp_js']       = get_texteditor();
        $data['no_pertanyaan'] = $this->tugas_model->count_pertanyaan($tugas['id']) + 1;

        if ($this->form_validation->run('tugas/pertanyaan') == TRUE) {
            $pertanyaan = $this->input->post('pertanyaan');

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
        $data['comp_js']       = get_texteditor();
        $data['no_pertanyaan'] = $pertanyaan['urutan'];

        if ($this->form_validation->run('tugas/pertanyaan') == TRUE) {
            $post_pertanyaan = $this->input->post('pertanyaan');

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
        $data['comp_js']       = get_texteditor();

        if ($this->form_validation->run('tugas/pilihan') == TRUE) {
            $post_pilihan = $this->input->post('pilihan', true);
            $post_konten  = $this->input->post('konten');

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
        $data['comp_js']    = get_texteditor();

        if ($this->form_validation->run('tugas/pilihan') == TRUE) {
            $post_pilihan = $this->input->post('pilihan', true);
            $post_konten  = $this->input->post('konten');

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
            show_error("Anda tidak login sebagai siswa.");
        }

        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas)) {
            show_error("Tugas tidak ditemukan.");
        }

        # cek aktif tidak dan tampil siswa tidak
        if (empty($tugas['aktif'])) {
            show_error("Tugas belum aktif.");
        }

        if (empty($tugas['tampil_siswa'])) {
            show_error("Tugas belum aktif.");
        }

        # dibuat variabel baru untuk php versi < 5.5
        $sudah_mengerjakan = sudah_ngerjakan($tugas['id'], get_sess_data('user', 'id'));

        # cek sudah mengerjakan belum
        if ($sudah_mengerjakan == true) {
            show_error("Anda sudah mengerjakan tugas ini.");
        }

        $field_id    = 'mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
        $field_name  = 'Mengerjakan Tugas';

        $mulai   = date('Y-m-d H:i:s');
        $durasi  = $tugas['durasi'];
        $selesai = date('Y-m-d H:i:s', strtotime("+$durasi minutes", strtotime($mulai)));

        $field_value = array(
            'mulai'      => $mulai,
            'selesai'    => $selesai,
            'uri_string' => uri_string()
        );

        # untuk keperluan check sedang ujian
        $field_value['valid_route'] = array(
            '/tugas/kerjakan',
            '/tugas/finish',
            '/tugas/submit_essay',
            '/tugas/submit_upload',
        );

        # simpan tugas dan unix_id nya
        $field_value['tugas']        = $tugas;
        $field_value['unix_id']      = md5($field_id) . rand(9, 999999);
        $field_value['ip']           = get_ip();
        $field_value['agent_string'] = $this->agent->agent_string();

        # cek sudah pernah mengerjakan belum, untuk keamanan.
        # karna bisa saja dibuka 2 kali dikomputer yang berbeda
        $check_field = retrieve_field($field_id);
        if (!empty($check_field)) {
            $check_field_value = json_decode($check_field['value'], 1);

            # cek upload tidak dan sudah selesai belum dari segi waktunya
            if ($tugas['type_id'] != 1 AND strtotime($mulai) >= strtotime($check_field_value['selesai'])) {
                redirect('tugas/finish/' . $tugas['id'] . '/' . $check_field_value['unix_id']);
            }
        }

        # jika masih kosong, berarti belum mengerjakan sama sekali
        else {
            $pertanyaan = array();
            if ($tugas['type_id'] != 1) {
                # ambil pertanyaan ditugas ini
                $pertanyaan    = $this->tugas_model->retrieve_all_pertanyaan('all', 1, $tugas['id'], 'random');
                $pertanyaan_id = array();
                foreach ($pertanyaan as $key => $val) {
                    $pertanyaan_id[$key] = $val['id'];
                }

                # jika pertanyaan masih kosong
                if (empty($pertanyaan_id)) {
                    show_error("Pertanyaan tugas masih kosong.");
                }

                $field_value['pertanyaan_id'] = $pertanyaan_id;
            } else {
                unset($field_value['selesai']);
            }

            # start transaksi
            $this->db->trans_start();
            # simpan
            create_field($field_id, $field_name, json_encode($field_value));

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                show_error("Proses simpan field gagal.");
            }
        }

        $check_field       = retrieve_field($field_id);
        $check_field_value = json_decode($check_field['value'], 1);

        # kondisi untuk versi tugas yang terlanjur dibuat di versi < 1.5
        if (!isset($check_field_value['pertanyaan_id']) AND isset($check_field_value['pertanyaan'])) {
            $check_field_value['pertanyaan_id'] = array();
            foreach ($check_field_value['pertanyaan'] as $key => $p) {
                $check_field_value[$key] = $p['id'];
            }

            # update
            unset($check_field_value['pertanyaan']);

            # start transaksi
            $this->db->trans_start();
            update_field($field_id, $check_field['nama'], json_encode($check_field_value));

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                show_error("Proses update field gagal.");
            }
        }

        # ini untuk mendapatkan data soal lengkapnya
        if (!empty($check_field_value['pertanyaan_id'])) {
            $soal = array();
            foreach ($check_field_value['pertanyaan_id'] as $key => $p_id) {
                $pertanyaan = $this->tugas_model->retrieve_pertanyaan($p_id);

                # jika pilihan ganda ambil pilihannya
                if ($check_field_value['tugas']['type_id'] == 3) {
                    $pertanyaan['pilihan'] = $this->tugas_model->retrieve_all_pilihan($pertanyaan['id']);
                }

                $soal[$key] = $pertanyaan;
            }
            $check_field_value['pertanyaan'] = $soal;
        }

        if ($tugas['type_id'] != 1) {
            # cari sisa waktu dalam menit
            $sisa_menit = (strtotime($check_field_value['selesai']) - strtotime($mulai));
            $check_field_value['sisa_menit'] = ceil($sisa_menit);
        }

        # save data
        $data['data'] = $check_field_value;
        $html_js      = '';
        $html_css     = '';

        if ($tugas['type_id'] != 1) {
            $html_js = load_comp_js(array(
                base_url('assets/comp/jcounter/js/jquery.jCounter-0.1.4.js'),
                base_url('assets/comp/jquery/ujian.js'),
            ));

            $html_css .= load_comp_css(array(
                base_url('assets/comp/jcounter/css/jquery.jCounter-iosl.css'),
            ));
        }

        if ($tugas['type_id'] == 2) {
            $html_js .= get_texteditor();
            $data['data']['str_id'] = implode(',', $check_field_value['pertanyaan_id']);
        }

        $data['comp_js']  = $html_js;
        $data['comp_css'] = $html_css;
        $this->twig->display('ujian-online.html', $data);
    }

    function finish($tugas_id = '', $unix_id = '')
    {
        if (!is_siswa()) {
            show_error("Anda tidak login sebagai siswa.");
        }

        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] == 1) {
            show_error("Tugas tidak ditemukan.");
        }

        if (empty($unix_id)) {
            show_error("Parameter Unix ID dibutuhkan.");
        }

        # dibuat variabel baru untuk php versi < 5.5
        $sudah_mengerjakan = sudah_ngerjakan($tugas['id'], get_sess_data('user', 'id'));

        # cek sudah mengerjakan belum
        if ($sudah_mengerjakan == true) {
            show_error("Anda sudah mengerjakan tugas ini.");
        }

        $field_id    = 'mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
        $check_field = retrieve_field($field_id);

        if (!empty($check_field)) {
            # bandingkan unix_id nya
            $check_field_value = json_decode($check_field['value'], 1);
            if ($unix_id != $check_field_value['unix_id']) {
                show_error("Anda tidak mengerjakan tugas ini.");
            }

            # jika pilihan ganda langsung di hitung benar salahnya
            if ($tugas['type_id'] == 3) {
                # kondisi untuk versi tugas yang terlanjur dibuat di versi < 1.5
                if (!isset($check_field_value['pertanyaan_id']) AND isset($check_field_value['pertanyaan'])) {
                    $check_field_value['pertanyaan_id'] = array();
                    foreach ($check_field_value['pertanyaan'] as $key => $p) {
                        $check_field_value[$key] = $p['id'];
                    }

                    unset($check_field_value['pertanyaan']);
                }

                $jml_soal = count($check_field_value['pertanyaan_id']);

                # cari kunci jawaban
                $data_kunci = array();
                foreach ($check_field_value['pertanyaan_id'] as $p_id) {
                    foreach ($this->tugas_model->retrieve_all_pilihan($p_id) as $pilihan) {
                        if ($pilihan['kunci'] == 1) {
                            $data_kunci[$p_id] = $pilihan['id'];
                        }
                    }
                }

                $jml_benar = 0;
                $jml_salah = 0;

                # cari jawabannya
                if (!empty($check_field_value['jawaban'])) {
                    foreach ($check_field_value['jawaban'] as $pertanyaan_id => $pilihan_id) {
                        # cek jawaban benar tidak
                        if (isset($data_kunci[$pertanyaan_id]) && $data_kunci[$pertanyaan_id] == $pilihan_id) {
                            $jml_benar++;
                        } else {
                            $jml_salah++;
                        }
                    }

                    $nilai = ($jml_benar / $jml_soal) * 100;
                } else {
                    $jml_benar = 0;
                    $jml_salah = 0;
                    $nilai     = 0;
                }

                # start transaksi
                $this->db->trans_start();

                # simpan nilai
                $this->tugas_model->create_nilai($nilai, $tugas['id'], get_sess_data('user', 'id'));

                # hapus field tambahan
                delete_field($field_id);

                # simpan history
                $new_field_id                     = 'history-mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
                $check_field_value['nilai']       = $nilai;
                $check_field_value['jml_benar']   = $jml_benar;
                $check_field_value['jml_salah']   = $jml_salah;

                $sekarang                          = date('Y-m-d H:i:s');
                $check_field_value['tgl_submit']   = $sekarang;
                $check_field_value['total_waktu']  = lama_pengerjaan($check_field_value['mulai'], $sekarang);
                $check_field_value['ip']           = get_ip();
                $check_field_value['agent_string'] = $this->agent->agent_string();

                create_field($new_field_id, 'History pengerjaan tugas', json_encode($check_field_value));

                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    show_error("Proses simpan jawaban gagal, mohon coba submit kembali.");
                }
            }

            # jika essay dan upload, biar dikoreksi dl
            else {
                # start transaksi
                $this->db->trans_start();

                # hapus field tambahan
                delete_field($field_id);

                # simpan history
                $new_field_id                      = 'history-mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
                $sekarang                          = date('Y-m-d H:i:s');
                $check_field_value['tgl_submit']   = $sekarang;
                $check_field_value['total_waktu']  = lama_pengerjaan($check_field_value['mulai'], $sekarang);
                $check_field_value['ip']           = get_ip();
                $check_field_value['agent_string'] = $this->agent->agent_string();

                create_field($new_field_id, 'History pengerjaan tugas', json_encode($check_field_value));

                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    show_error("Proses simpan jawaban gagal, mohon coba submit kembali.");
                }
            }

            $this->session->set_flashdata('tugas', get_alert('success', 'Anda telah berhasil mengerjakan tugas ini.'));

            $this->twig->display('redirect.html', array('redirect_to' => site_url('tugas')));
        }
        # ini belum mengerjakan
        else {
            show_error("Anda belum mengerjakan tugas ini.");
        }
    }

    function submit_essay($tugas_id = '', $unix_id = '')
    {
        if (!is_siswa()) {
            show_error("Anda tidak login sebagai siswa.");
        }

        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] != 2) {
            show_error("Tugas tidak ditemukan.");
        }

        if (empty($unix_id)) {
            show_error("Parameter Unix ID dibutuhkan.");
        }

        # dibuat variabel baru untuk php versi < 5.5
        $sudah_mengerjakan = sudah_ngerjakan($tugas['id'], get_sess_data('user', 'id'));

        # cek sudah mengerjakan belum
        if ($sudah_mengerjakan == true) {
            show_error("Anda sudah mengerjakan tugas ini.");
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

            # kondisi untuk versi tugas yang terlanjur dibuat di versi < 1.5
            if (!isset($check_field_value['pertanyaan_id']) AND isset($check_field_value['pertanyaan'])) {
                $check_field_value['pertanyaan_id'] = array();
                foreach ($check_field_value['pertanyaan'] as $key => $p) {
                    $check_field_value[$key] = $p['id'];
                }

                unset($check_field_value['pertanyaan']);
            }

            $post_jawaban = $this->input->post('jawaban');
            foreach ($post_jawaban as $pertanyaan_id => $jawaban) {
                # replace yang sudah terimpan atau yang belum disimpan
                $check_field_value['jawaban'][$pertanyaan_id] = $jawaban;
            }

            # start transaksi
            $this->db->trans_start();

            # hapus field tambahan
            delete_field($field_id);

            # simpan history
            $new_field_id                      = 'history-mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
            $sekarang                          = date('Y-m-d H:i:s');
            $check_field_value['tgl_submit']   = $sekarang;
            $check_field_value['total_waktu']  = lama_pengerjaan($check_field_value['mulai'], $sekarang);
            $check_field_value['ip']           = get_ip();
            $check_field_value['agent_string'] = $this->agent->agent_string();

            create_field($new_field_id, 'History pengerjaan tugas', json_encode($check_field_value));

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                show_error("Proses simpan jawaban gagal, mohon coba submit kembali.");
            }

            $this->session->set_flashdata('tugas', get_alert('success', 'Anda telah berhasil mengerjakan tugas ini.'));

            $this->twig->display('redirect.html', array('redirect_to' => site_url('tugas')));
        }
        # ini belum mengerjakan
        else {
            show_error("Anda belum mengerjakan tugas ini.");
        }
    }

    function submit_upload($tugas_id = '', $unix_id = '')
    {
        if (!is_siswa()) {
            show_error("Anda tidak login sebagai siswa.");
        }

        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas) OR $tugas['type_id'] != 1) {
            show_error("Tugas tidak ditemukan.");
        }

        if (empty($unix_id)) {
            show_error("Parameter Unix ID dibutuhkan.");
        }

        # dibuat variabel baru untuk php versi < 5.5
        $sudah_mengerjakan = sudah_ngerjakan($tugas['id'], get_sess_data('user', 'id'));

        # cek sudah mengerjakan belum
        if ($sudah_mengerjakan == true) {
            show_error("Anda sudah mengerjakan tugas ini.");
        }

        $field_id    = 'mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
        $check_field = retrieve_field($field_id);

        if (!empty($check_field)) {
            # bandingkan unix_id nya
            $check_field_value = json_decode($check_field['value'], 1);
            if ($unix_id != $check_field_value['unix_id']) {
                show_error("Anda tidak mengerjakan tugas ini.");
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

            # start transaksi
            $this->db->trans_start();

            # hapus field tambahan
            delete_field($field_id);

            # simpan history
            $new_field_id                      = 'history-mengerjakan-' . get_sess_data('user', 'id') . '-' . $tugas['id'];
            $sekarang                          = date('Y-m-d H:i:s');
            $check_field_value['tgl_submit']   = $sekarang;
            $check_field_value['ip']           = get_ip();
            $check_field_value['agent_string'] = $this->agent->agent_string();

            create_field($new_field_id, 'History pengerjaan tugas', json_encode($check_field_value));

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                show_error("Proses simpan jawaban gagal, mohon coba submit kembali.");
            }

            $this->session->set_flashdata('tugas', get_alert('success', 'Anda telah berhasil mengerjakan tugas ini.'));

            $this->twig->display('redirect.html', array('redirect_to' => site_url('tugas')));
        }
        # ini belum mengerjakan
        else {
            show_error("Anda belum mengerjakan tugas ini.");
        }
    }

    function nilai($tugas_id = '', $mode = '')
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

            # kelas
            $kelas_nilai = array();

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
                $nilai['history']['value'] = json_decode($history['value'], 1);

                # cari siswa
                $siswa = $this->siswa_model->retrieve($nilai['siswa_id']);

                # kelas siswa
                $kelas_siswa = $this->kelas_model->retrieve_siswa(null, array(
                    'siswa_id' => $nilai['siswa_id'],
                    'aktif'    => 1
                ));
                $kelas = $this->kelas_model->retrieve($kelas_siswa['kelas_id']);
                $siswa['kelas_aktif'] = $kelas;

                if (!isset($kelas_nilai[$kelas['id']])) {
                    $kelas_nilai[$kelas['id']] = $kelas;
                }

                $nilai['siswa'] = $siswa;

                # kalo ada filter tampil jawaban
                if (!empty($_POST['tampil_jawaban'])) {
                    # cari kunci
                    $list_kunci = array();
                    foreach ($nilai['history']['value']['pertanyaan_id'] as $h_pertanyaan_id) {
                        $row_kunci   = array();
                        $semua_kunci = $this->tugas_model->retrieve_all_pilihan($h_pertanyaan_id);
                        foreach ($semua_kunci as $h_pilihan) {
                            if ($h_pilihan['kunci'] == 1) {
                                $row_kunci = $h_pilihan;
                            }
                        }

                        $list_kunci[$h_pertanyaan_id] = $row_kunci;
                    }

                    $array_format_jawaban = array();

                    $no_tampil = 1;
                    foreach ($list_kunci as $h_pertanyaan_id => $h_pilihan) {
                        $label_key = "";
                        if (!empty($h_pilihan['urutan'])) {
                            $label_key = get_abjad($h_pilihan['urutan']);
                        }

                        $label_jawaban = "";
                        if (isset($nilai['history']['value']['jawaban'][$h_pertanyaan_id])) {
                            $pilihan_jawaban = $this->tugas_model->retrieve_pilihan($nilai['history']['value']['jawaban'][$h_pertanyaan_id], $h_pertanyaan_id);
                            $label_jawaban   = get_abjad($pilihan_jawaban['urutan']);
                        }

                        $array_format_jawaban[] = "{$no_tampil}. {$label_key}:{$label_jawaban}";
                        $no_tampil++;
                    }

                    $nilai['tampil_jawaban'] = implode(", ", $array_format_jawaban);
                }

                # kalo ada filter kelas
                if (!empty($_POST['kelas_id'])) {
                    if ($_POST['kelas_id'] == 'all' OR $kelas['id'] == $_POST['kelas_id']) {
                        $data_nilai[] = $nilai;
                    }
                } else {
                    $data_nilai[] = $nilai;
                }
            }

            if (!empty($_POST['tampil_jawaban'])) {
                $data['tampil_jawaban'] = 1;
            }

            $data['data_nilai']  = $data_nilai;
            $data['kelas_nilai'] = $kelas_nilai;

            if ($mode == 'print') {
                $this->twig->display('print-nilai.html', $data);
            } elseif ($mode == 'export_excel') {
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=nilai-" . url_title($data['tugas']['judul'], '-', true)  . ".xls");
                $this->twig->display('export-excel-nilai.html', $data);
            } else {
                # panggil datatables dan combobox
                $data['comp_js'] = load_comp_js(array(
                    base_url('assets/comp/datatables/jquery.dataTables.js'),
                    base_url('assets/comp/datatables/datatable-bootstrap2.js'),
                    base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                ));

                $data['comp_css'] = load_comp_css(array(
                    base_url('assets/comp/datatables/datatable-bootstrap2.css'),
                    base_url('assets/comp/colorbox/colorbox.css'),
                ));

                $this->twig->display('list-nilai.html', $data);
            }
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

    function koreksi($tugas_id = '', $mode = '')
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

        # kelas
        $kelas_nilai = array();

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

            # kondisi untuk versi tugas yang terlanjur dibuat di versi < 1.5
            if (!isset($history['pertanyaan_id']) AND isset($history['pertanyaan'])) {
                $history['pertanyaan_id'] = array();
                foreach ($history['pertanyaan'] as $key => $p) {
                    $history[$key] = $p['id'];
                }

                unset($history['pertanyaan']);
            }

            # cari siswa
            $siswa = $this->siswa_model->retrieve($siswa_id);
            if (empty($siswa)) continue;

            # kelas siswa
            $kelas_siswa = $this->kelas_model->retrieve_siswa(null, array(
                'siswa_id' => $siswa_id,
                'aktif'    => 1
            ));
            $kelas = $this->kelas_model->retrieve($kelas_siswa['kelas_id']);
            $siswa['kelas_aktif'] = $kelas;
            $siswa['history']     = $history;
            $siswa['history']['value'] = json_decode($history['value'], 1);

            if (!isset($kelas_nilai[$kelas['id']])) {
                $kelas_nilai[$kelas['id']] = $kelas;
            }

            # cari nilai
            $siswa['nilai'] = $this->tugas_model->retrieve_nilai(null, $tugas['id'], $siswa['id']);

            if (!empty($_POST['kelas_id'])) {
                if ($_POST['kelas_id'] == 'all' OR $kelas['id'] == $_POST['kelas_id']) {
                    $data_siswa[] = $siswa;
                }
            } else {
                $data_siswa[] = $siswa;
            }
        }
        $data['data_siswa']  = $data_siswa;
        $data['kelas_nilai'] = $kelas_nilai;

        if ($mode == 'print') {
            $this->twig->display('print-nilai.html', $data);
        } elseif ($mode == 'export_excel') {
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=nilai-" . url_title($data['tugas']['judul'], '-', true)  . ".xls");
            $this->twig->display('export-excel-nilai.html', $data);
        } else {
            # panggil datatables dan combobox
            $data['comp_js'] = load_comp_js(array(
                base_url('assets/comp/datatables/jquery.dataTables.js'),
                base_url('assets/comp/datatables/datatable-bootstrap2.js'),
                base_url('assets/comp/colorbox/jquery.colorbox-min.js')
            ));

            $data['comp_css'] = load_comp_css(array(
                base_url('assets/comp/datatables/datatable-bootstrap2.css'),
                base_url('assets/comp/colorbox/colorbox.css'),
            ));

            $this->twig->display('list-peserta.html', $data);
        }
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

        # kelas siswa
        $kelas_siswa = $this->kelas_model->retrieve_siswa(null, array(
            'siswa_id' => $siswa_id,
            'aktif'    => 1
        ));
        $kelas = $this->kelas_model->retrieve($kelas_siswa['kelas_id']);
        $siswa['kelas_aktif'] = $kelas;

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

        $history_value = json_decode($history['value'], 1);

        # ini utnuk mengantisipasi versi < 1.5
        if (!empty($history_value['pertanyaan_id'])) {
            $soal = array();
            foreach ($history_value['pertanyaan_id'] as $key => $p_id) {
                $pertanyaan = $this->tugas_model->retrieve_pertanyaan($p_id);

                # jika pilihan ganda ambil pilihannya
                if ($history_value['tugas']['type_id'] == 3) {
                    $pertanyaan['pilihan'] = $this->tugas_model->retrieve_all_pilihan($pertanyaan['id']);
                }

                $soal[$key] = $pertanyaan;
            }
            $history_value['pertanyaan'] = $soal;
        }

        $data['history'] = $history_value;

        if (!empty($_GET['mode'])) {
            $data['mode'] = $_GET['mode'];
        }

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
                $new_history          = $history_value;
                $new_history['nilai'] = $_POST['nilai'];
                unset($new_history['pertanyaan']);

                # start transaksi
                $this->db->trans_start();

                update_field($history_id, $history['nama'], json_encode($new_history));

                # simpan atau update nilai
                $check = $this->tugas_model->retrieve_nilai(null, $tugas['id'], $siswa['id']);
                if (empty($check)) {
                    $this->tugas_model->create_nilai($total_nilai, $tugas['id'], $siswa['id']);
                } else {
                    $this->tugas_model->update_nilai($check['id'], $total_nilai, $tugas['id'], $siswa['id']);
                }

                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    show_error("Proses simpan/update nilai gagal, mohon coba kembali.");
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
                $new_history          = $history_value;
                $new_history['nilai'] = $nilai;
                unset($new_history['pertanyaan']);

                # start transaksi
                $this->db->trans_start();

                update_field($history_id, $history['nama'], json_encode($new_history));

                # simpan atau update nilai
                $check = $this->tugas_model->retrieve_nilai(null, $tugas['id'], $siswa['id']);
                if (empty($check)) {
                    $this->tugas_model->create_nilai($nilai, $tugas['id'], $siswa['id']);
                } else {
                    $this->tugas_model->update_nilai($check['id'], $nilai, $tugas['id'], $siswa['id']);
                }

                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    show_error("Proses simpan/update nilai gagal, mohon coba kembali.");
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
                show_error("Tugas tidak ditemukan.");
            }

            $siswa = $this->siswa_model->retrieve($siswa_id);
            if (empty($siswa)) {
                show_error("Siswa tidak ditemukan.");
            }

            $result_reset = $this->reset_nilai_jawaban($siswa['id'], $tugas['id'], $tugas);
            if (!$result_reset) {
                show_error("Proses reset jawaban gagal, mohon coba kembali.");
            }

            $this->session->set_flashdata('tugas', get_alert('success', 'Siswa berhasil dianggap belum mengerjakan.'));
            if ($tugas['type_id'] == 3) {
                redirect('tugas/nilai/' . $tugas['id']);
            } else {
                redirect('tugas/koreksi/' . $tugas['id']);
            }
        }
        else {
            show_error("Akses ditolak.");
        }
    }

    function bulk_reset_jawaban($tugas_id)
    {
        # jika pengajar atau admin
        if (is_pengajar() OR is_admin()) {
            $tugas_id = (int)$tugas_id;
            $tugas    = $this->tugas_model->retrieve($tugas_id);
            if (empty($tugas)) {
                show_error("Tugas tidak ditemukan.");
            }

            $reset_tipe = $this->input->post("reset_tipe", true);
            $siswa_ids  = $this->input->post("siswa_id", true);
            $url_back   = $this->input->post("url_back", true);

            if ($reset_tipe == "terpilih") {
                if (empty($siswa_ids)) {
                    $this->session->set_flashdata('tugas', get_alert('warning', 'Pilih siswa yang ingin direset.'));
                    redirect($url_back);
                }

                foreach ($siswa_ids as $siswa_id) {
                    $siswa = $this->siswa_model->retrieve($siswa_id);
                    if (empty($siswa)) {
                        continue;
                    }

                    $this->reset_nilai_jawaban($siswa['id'], $tugas['id'], $tugas);
                }

                $this->session->set_flashdata('tugas', get_alert('success', 'Siswa berhasil dianggap belum mengerjakan.'));
                redirect($url_back);
            }
            elseif ($reset_tipe == "semua") {
                # ambil semua history
                $retrieve_all_history = $this->tugas_model->retrieve_all_history($tugas['id']);
                foreach ($retrieve_all_history as $history) {
                    $split_id = explode("-", $history['id']);
                    $siswa_id = $split_id[2];

                    $this->reset_nilai_jawaban($siswa_id, $tugas['id'], $tugas);
                }

                if (!empty($retrieve_all_history)) {
                    $this->session->set_flashdata('tugas', get_alert('success', 'Semua siswa berhasil dianggap belum mengerjakan.'));
                }

                redirect($url_back);
            }
            else {
                show_error("Tipe reset tidak ditemukan.");
            }
        }
        else {
            show_error("Akses ditolak.");
        }
    }

    function pantau($tugas_id = '', $aksi = 'list', $param1 = '')
    {
        $tugas_id = (int)$tugas_id;
        $tugas    = $this->tugas_model->retrieve($tugas_id);
        if (empty($tugas)) {
            redirect('tugas');
        }

        # jika tugas bertipe upload tidak dapat dipantau
        if ($tugas['type_id'] == 1) {
            show_error("Maaf tipe tugas tidak dapat dipantau.");
        }

        $data['tugas'] = $this->formatData($tugas);

        # jika pengajar atau admin
        if (is_pengajar() OR is_admin()) {

            switch ($aksi) {
                case 'reset':
                    $siswa_id = (int)$param1;

                    $field_id = 'mengerjakan-' . $siswa_id . '-' . $tugas['id'];
                    delete_field($field_id);

                    $this->session->set_flashdata('tugas', get_alert('success', 'Proses ujian siswa berhasil diulang.'));
                    redirect('tugas/pantau/' . $tugas['id']);
                break;

                case 'jawaban_sementara':
                    $siswa_id = (int)$param1;

                    $field_id = 'mengerjakan-' . $siswa_id . '-' . $tugas['id'];
                    $mengerjakan = retrieve_field($field_id);
                    if (empty($mengerjakan)) {
                        show_error("Data tidak ditemukan.");
                    }

                    $de_val = json_decode($mengerjakan['value'], 1);
                    if (empty($de_val['pertanyaan_id'])) {
                        show_error("Maaf jawaban tidak dapat ditampilkan, karena dikerjakan pada e-learning dibawah versi 1.6.");
                    }

                    $soal  = array();
                    $benar = 0;
                    $salah = 0;
                    $essay_kosong   = 0;
                    $essay_terjawab = 0;
                    foreach ($de_val['pertanyaan_id'] as $key => $p_id) {
                        $pertanyaan = $this->tugas_model->retrieve_pertanyaan($p_id);

                        # jika pilihan ganda ambil pilihannya
                        if ($de_val['tugas']['type_id'] == 3) {
                            $pertanyaan['pilihan'] = $this->tugas_model->retrieve_all_pilihan($pertanyaan['id']);

                            if (!empty($de_val['jawaban']) AND get_jawaban($de_val['jawaban'], $p_id) == get_kunci_pilihan($pertanyaan['pilihan'])) {
                                $benar++;
                            } elseif (!empty($de_val['jawaban'][$p_id])) {
                                $salah++;
                            }
                        }
                        # essay
                        elseif ($de_val['tugas']['type_id'] == 2) {
                            if (!isset($de_val['jawaban'][$p_id])) {
                                $essay_kosong++;
                            } else {
                                $jawaban_p_id = trim($de_val['jawaban'][$p_id]);
                                if (empty($jawaban_p_id)) {
                                    $essay_kosong++;
                                } else {
                                    $essay_terjawab++;
                                }
                            }
                        }

                        $soal[$key] = $pertanyaan;
                    }

                    if ($de_val['tugas']['type_id'] == 2) {
                        $de_val['jml_kosong']   = $essay_kosong;
                        $de_val['jml_terjawab'] = $essay_terjawab;
                    }

                    $de_val['jml_benar']  = $benar;
                    $de_val['jml_salah']  = $salah;
                    $de_val['pertanyaan'] = $soal;
                    $data = array_merge($data, $de_val);

                    $this->twig->display('pantau-jawaban-sementara.html', $data);
                break;

                case 'list':
                default:
                    # cari semua yang sedang ujian pada tugas ini
                    $retrieve_all = $this->tugas_model->retrieve_all_mengerjakan($tugas_id);
                    foreach ($retrieve_all as $key => $mengerjakan) {
                        $split_id = explode("-", $mengerjakan['id']);
                        $siswa_id = $split_id[1];

                        # cari siswa
                        $siswa = $this->siswa_model->retrieve($siswa_id);

                        # kelas siswa
                        $kelas_siswa = $this->kelas_model->retrieve_siswa(null, array(
                            'siswa_id' => $siswa_id,
                            'aktif'    => 1
                        ));
                        $kelas = $this->kelas_model->retrieve($kelas_siswa['kelas_id']);
                        $siswa['kelas_aktif'] = $kelas;

                        $retrieve_all[$key]['value'] = json_decode($mengerjakan['value'], 1);
                        $retrieve_all[$key]['value']['siswa'] = $siswa;

                        if ($retrieve_all[$key]['value']['tugas']['type_id'] != 1) {
                            # cari sisa waktu dalam menit
                            $mulai = date('Y-m-d H:i:s');
                            $sisa_menit = (strtotime($retrieve_all[$key]['value']['selesai']) - strtotime($mulai));
                            $retrieve_all[$key]['value']['sisa_menit'] = ceil($sisa_menit);

                            if (strtotime($retrieve_all[$key]['value']['selesai']) < strtotime($mulai)) {
                                $sisa_menit_string = "<span class='text-error'><i class='icon-info-sign'></i> Harusnya sudah selesai.</span><br><span class='text-info'>Peserta terindikasi berhenti saat ujian berlangsung.</span>";
                            } else {
                                $sisa_menit_string = lama_pengerjaan($mulai, $retrieve_all[$key]['value']['selesai']);
                            }

                            $retrieve_all[$key]['value']['sisa_menit_string'] = $sisa_menit_string;
                        }

                        # biar gampang, ditaruh diluar
                        $all_value = $retrieve_all[$key]['value'];
                        unset($mengerjakan['value']);
                        $retrieve_all[$key] = array_merge($mengerjakan, $all_value);
                    }

                    $data['retrieve_all'] = $retrieve_all;

                    # panggil datatables dan combobox
                    $data['comp_js'] = load_comp_js(array(
                        base_url('assets/comp/datatables/jquery.dataTables.js'),
                        base_url('assets/comp/datatables/datatable-bootstrap2.js'),
                        base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                    ));

                    $data['comp_css'] = load_comp_css(array(
                        base_url('assets/comp/datatables/datatable-bootstrap2.css'),
                        base_url('assets/comp/colorbox/colorbox.css'),
                    ));

                    $this->twig->display('pantau-ujian.html', $data);
                break;
            }
        }
        else {
            show_error("Akses ditolak.");
        }
    }
}
