<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class untuk resource Materi
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

class Materi extends MY_Controller
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
        if (!empty($val['siswa_id'])) {
            $siswa = $this->siswa_model->retrieve($val['siswa_id']);
            $val['pembuat'] = $siswa;
            if (is_admin()) {
                $val['pembuat']['link_profil'] = site_url('siswa/detail/'.$siswa['status_id'].'/'.$siswa['id']);
            } else {
                $val['pembuat']['link_profil'] = site_url('siswa/detail/'.$siswa['id']);
            }
        }

        # cari materi kelas
        $materi_kelas = $this->materi_model->retrieve_all_kelas($val['id']);
        foreach ($materi_kelas as $mk) {
            $kelas = $this->kelas_model->retrieve($mk['kelas_id']);
            $val['materi_kelas'][] = $kelas;
        }

        # cari matapelajarannya
        $val['mapel'] = $this->mapel_model->retrieve($val['mapel_id']);

        # hitung jumlah komentar
        $val['jml_komentar'] = $this->komentar_model->count_by('materi', $val['id']);

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
                'publish'     => is_siswa() ? array(1) : $this->input->post('publish', true),
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
                'type'        => array(),
                'publish'     => is_siswa() ? array(1) : array(),
            );
        }
        $data['filter'] = $filter;

        # jika sebagai pengajar tampilkan materi miliknya saja
        if (is_pengajar()) {
            $filter['pengajar_id'] = get_sess_data('user', 'id');
        }

        # kalo siswa tampilkan yang kelasnya saja
        if (is_siswa()) {
            $kelas_aktif = $this->siswa_kelas_aktif;
            $retrieve_kelas = $this->kelas_model->retrieve($kelas_aktif['kelas_id']);

            # ambil parentnya
            $filter['kelas_id'] = array($retrieve_kelas['parent_id']);
        }

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
            $filter['publish'],
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
        # versi 1.2 siswa tidak bisa tambah materi
        if (is_siswa()) {
            redirect('materi');
        }

        $type = (string)strtolower($segment_3);
        if (!in_array($type, array('file', 'tertulis'))) {
            redirect('materi');
        }

        $data['type']    = $type;
        $data['mapel']   = $this->mapel_model->retrieve_all_mapel();
        $data['kelas']   = $this->kelas_model->retrieve_all(null, array('aktif' => 1));
        $data['comp_js'] = get_texteditor();

        $success = false;
        if ($type == 'tertulis') {
            if ($this->form_validation->run('materi/add/tertulis') == TRUE) {
                $mapel_id = $this->input->post('mapel_id', TRUE);
                $judul    = $this->input->post('judul', TRUE);
                $konten   = $this->input->post('konten');
                $status   = $this->input->post('status', TRUE);

                $publish = 1;
                if (!empty($status) && in_array($status, array('preview', 'draft'))) {
                    $publish = 0;
                }

                $get_preview_id = $this->uri->segment(4);
                if (!empty($get_preview_id)) {
                    $get_materi = $this->materi_model->retrieve($get_preview_id);
                    if (empty($get_materi) OR $get_materi['publish'] == 1) {
                        show_404();
                    }
                    # update
                    $this->materi_model->update(
                        $get_materi['id'],
                        $get_materi['pengajar_id'],
                        $get_materi['siswa_id'],
                        $mapel_id,
                        $judul,
                        $konten,
                        null,
                        $publish
                    );
                    $materi_id = $get_materi['id'];
                } else {
                    $materi_id = $this->materi_model->create(
                        (is_pengajar() OR is_admin()) ? get_sess_data('user', 'id') : null,
                        is_siswa() ? get_sess_data('user', 'id') : null,
                        $mapel_id,
                        $judul,
                        $konten,
                        null,
                        $publish
                    );
                }

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
                $status      = $this->input->post('status', TRUE);

                $publish = 1;
                if (!empty($status) && in_array($status, array('draft'))) {
                    $publish = 0;
                }

                $materi_id = $this->materi_model->create(
                    (is_pengajar() OR is_admin()) ? get_sess_data('user', 'id') : null,
                    is_siswa() ? get_sess_data('user', 'id') : null,
                    $mapel_id,
                    $judul,
                    null,
                    $file,
                    $publish
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
            $arr_post_kelas = array();
            $kelas_id = $this->input->post('kelas_id', TRUE);
            foreach ($kelas_id as $materi_kelas_id) {
                # cek sudah ada belum
                $sudah_ada = $this->materi_model->retrieve_kelas(null, $materi_id, $materi_kelas_id);
                if (empty($sudah_ada)) {
                    $this->materi_model->create_kelas($materi_id, $materi_kelas_id);
                }

                $arr_post_kelas[] = $materi_kelas_id;
            }

            /**
             * Hapus kelas yang tidak ada dipost
             */
            $retrieve_all_kelas = $this->materi_model->retrieve_all_kelas($materi_id);
            foreach ($retrieve_all_kelas as $val) {
                if (!in_array($val['kelas_id'], $arr_post_kelas)) {
                    $this->materi_model->delete_kelas($val['id']);
                }
            }

            if (isset($status) && $status == 'preview') {
                $data['preview_id'] = $materi_id;
            } else {
                $add_info = "dan diterbitkan.";
                if (isset($status) && $status == 'draft') {
                    $add_info = "sebagai konsep.";
                }

                $this->session->set_flashdata('materi', get_alert('success', 'Materi berhasil disimpan ' . $add_info));
                if (!empty($materi_id)) {
                    redirect('materi/edit/'.$type.'/'.$materi_id);
                } else {
                    redirect('materi');
                }
            }
        }

        $this->twig->display('tambah-materi.html', $data);
    }

    function edit($segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
        # versi 1.2 siswa tidak bisa tambah,edit,hapus materi
        if (is_siswa()) {
            redirect('materi');
        }

        $type      = (string)strtolower($segment_3);
        $materi_id = (int)$segment_4;
        $uri_back  = (string)$segment_5;

        if (empty($uri_back)) {
            $uri_back = site_url('materi');
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

        # cek kepemilikan
        if (is_pengajar() AND $materi['pengajar_id'] != get_sess_data('user', 'id')) {
            redirect($uri_back);
        }

        if (is_siswa() AND $materi['siswa_id'] != get_sess_data('user', 'id')) {
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
        $data['comp_js']      = get_texteditor();
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
                $konten   = $this->input->post('konten');
                $publish  = $this->input->post('publish', TRUE);

                $this->materi_model->update(
                    $materi['id'],
                    $materi['pengajar_id'],
                    $materi['siswa_id'],
                    $mapel_id,
                    $judul,
                    $konten,
                    null,
                    $publish
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
                $publish  = $this->input->post('publish', TRUE);

                $this->materi_model->update(
                    $materi['id'],
                    $materi['pengajar_id'],
                    $materi['siswa_id'],
                    $mapel_id,
                    $judul,
                    null,
                    $update_file,
                    $publish
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
        # versi 1.2 siswa tidak bisa tambah,edit,hapus materi
        if (is_siswa()) {
            redirect('materi');
        }

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

        # cek kepemilikan
        if (is_pengajar() AND $materi['pengajar_id'] != get_sess_data('user', 'id')) {
            redirect($uri_back);
        }

        if (is_siswa() AND $materi['siswa_id'] != get_sess_data('user', 'id')) {
            redirect($uri_back);
        }

        # jika file
        if (!empty($materi['file']) AND is_file(get_path_file($materi['file']))) {
            unlink(get_path_file($materi['file']));
        }

        # hapus komentar pada materi ini
        $this->komentar_model->delete_by_materi($materi['id']);

        $this->materi_model->delete($materi['id']);

        $this->session->set_flashdata('materi', get_alert('warning', 'Materi berhasil dihapus.'));
        redirect($uri_back);
    }

    function detail($segment_3 = '', $segment_4 = '', $segment_5 = '')
    {
        $materi_id = (int)$segment_3;

        if (empty($materi_id)) {
            show_404();
        }

        $materi = $this->materi_model->retrieve($materi_id);
        if (empty($materi)) {
            show_404();
        }

        if (is_siswa() && empty($materi['publish'])) {
            show_404();
        } else {
            # cek sesuai kelas aktif tidak

        }

        /**
         * jika pengajar cek kepemilikan untuk yang konsep
         */
        if (is_pengajar() && $materi['publish'] == '0' && $materi['pengajar_id'] != get_sess_data('user', 'id')) {
            show_404();
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

        $data['materi'] = $materi;

        switch ($segment_4) {
            case 'laporkan':
                $komentar = $this->komentar_model->retrieve((int)$segment_5);
                if (empty($komentar) OR $komentar['tampil'] == 0 OR $komentar['materi_id'] != $materi['id']) {
                    show_error('Komentar tidak ditemukan');
                }
                $data['komentar'] = $komentar;

                $this->form_validation->set_rules('alasan', 'Alasan', 'required|trim|xss_clean');
                if (!empty($_POST['alasan']) AND $_POST['alasan'] == 'tulis') {
                    $this->form_validation->set_rules('alasan_lain', 'Tulis alasan', 'required|trim|xss_clean');
                }

                if ($this->form_validation->run() == true) {
                    $alasan = $this->input->post('alasan', true);
                    if ($alasan == 'tulis') {
                        $alasan = $this->input->post('alasan_lain', true);
                    }

                    $unix_id  = uniqid() . time();
                    $field_id = 'laporkan-komentar';
                    $retrieve_field = retrieve_field($field_id);
                    if (empty($retrieve_field)) {
                        create_field($field_id, 'Laporkan Komentar', json_encode(array(
                            $unix_id => array(
                                'materi_id'   => $materi['id'],
                                'komentar_id' => $komentar['id'],
                                'alasan'      => $alasan,
                                'login_id'    => get_sess_data('login', 'id'),
                                'tgl_lapor'   => date('Y-m-d H:i:s')
                            )
                        )));
                    } else {
                        $value_field = json_decode($retrieve_field['value'], 1);

                        # cek sudah ada belum datanya
                        $exist = false;
                        foreach ($value_field as $val) {
                            if ($val['materi_id'] == $materi['id'] AND $val['login_id'] == get_sess_data('login', 'id') AND $val['komentar_id'] == $komentar['id']) {
                                $exist = true;
                            }
                        }

                        if (!$exist) {
                            $value_field[$unix_id] = array(
                                'materi_id'   => $materi['id'],
                                'komentar_id' => $komentar['id'],
                                'alasan'      => $alasan,
                                'login_id'    => get_sess_data('login', 'id'),
                                'tgl_lapor'   => date('Y-m-d H:i:s')
                            );

                            update_field($field_id, 'Laporkan Komentar', json_encode($value_field));
                        }
                    }

                    $this->session->set_flashdata('laporkan', get_alert('success', 'Laporan berhasil dikirim.'));
                    redirect('materi/detail/' . $materi['id'] . '/laporkan/' . $komentar['id']);
                }

                $this->twig->display('laporkan-komentar.html', $data);
            break;

            default:
            case 'download':
                # jika request download
                if ($segment_4 == 'download' AND !empty($materi['file'])) {
                    $target_file = get_path_file($materi['file']);
                    if (!is_file($target_file)) {
                        show_error("Maaf file tidak ditemukan.");
                    }

                    $data_file = file_get_contents($target_file); // Read the file's contents
                    $name_file = $materi['file'];

                    $this->materi_model->plus_views($materi['id']);

                    force_download($name_file, $data_file);
                }

                # post komentar
                $this->form_validation->set_rules('komentar', 'Komentar', 'required');
                if ($this->form_validation->run() == true) {
                    $komentar_id = $this->komentar_model->create(
                        get_sess_data('login', 'id'),
                        $materi['id'],
                        $tampil = 1,
                        $this->input->post('komentar', true)
                    );

                    redirect('materi/detail/' . $materi['id'] . '/#komentar-' . $komentar_id);
                }

                $data['materi']['download_link'] = site_url('materi/detail/'.$materi['id'].'/download');

                # ambil komentar
                $retrieve_all_komentar = $this->komentar_model->retrieve_all(20, (int)$segment_4, null, $materi['id'], 1);

                # format komentar
                foreach ($retrieve_all_komentar['results'] as $key => $val) {
                    $retrieve_all_komentar['results'][$key] = $this->format_komentar($val);
                }

                $data['materi']['komentar']            = $retrieve_all_komentar['results'];
                $data['materi']['jml_komentar']        = $retrieve_all_komentar['total_record'];
                $data['materi']['komentar_pagination'] = $this->pager->view($retrieve_all_komentar, 'materi/detail/' . $materi['id'] . '/');

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
                $arr_materi_kelas_id = array();
                $materi_kelas        = $this->materi_model->retrieve_all_kelas($materi['id']);
                foreach ($materi_kelas as $mk) {
                    $arr_materi_kelas_id[]            = $mk['kelas_id'];
                    $kelas                            = $this->kelas_model->retrieve($mk['kelas_id']);
                    $data['materi']['materi_kelas'][] = $kelas;
                }

                /**
                 * Jika siswa cek dengan kelas aktif
                 */
                if (is_siswa()) {
                    $kelas_aktif = $this->siswa_kelas_aktif;
                    $retrieve_kelas = $this->kelas_model->retrieve($kelas_aktif['kelas_id']);

                    $kelas_valid = false;
                    foreach ($arr_materi_kelas_id as $mk_id) {
                        if ($mk_id == $retrieve_kelas['parent_id']) {
                            $kelas_valid = true;
                            break;
                        }
                    }

                    if ($kelas_valid == false) {
                        $this->session->set_flashdata('materi', get_alert('warning', 'Materi tidak tersedia untuk kelas Anda.'));
                        redirect('materi');
                    }
                }

                # cari pembuatnya
                if (!empty($materi['pengajar_id'])) {
                    $pengajar = $this->pengajar_model->retrieve($materi['pengajar_id']);
                    $data['materi']['pembuat'] = array(
                        'nama'      => $pengajar['nama'],
                        'link_foto' => get_url_image_pengajar($pengajar['foto'], 'medium', $pengajar['jenis_kelamin'])
                    );
                    if (is_admin()) {
                        $data['materi']['pembuat']['link_profil'] = site_url('pengajar/detail/'.$pengajar['status_id'].'/'.$pengajar['id']);
                    } else {
                        $data['materi']['pembuat']['link_profil'] = site_url('pengajar/detail/'.$pengajar['id']);
                    }
                }

                if (!empty($materi['siswa_id'])) {
                    $siswa = $this->siswa_model->retrieve($materi['siswa_id']);
                    $data['materi']['pembuat'] = array(
                        'nama'        => $siswa['nama'],
                        'link_foto'   => get_url_image_siswa($siswa['foto'], 'medium', $siswa['jenis_kelamin'])
                    );

                    if (is_admin()) {
                        $data['materi']['pembuat']['link_profil'] = site_url('siswa/detail/'.$siswa['status_id'].'/'.$siswa['id']);
                    } else {
                        $data['materi']['pembuat']['link_profil'] = site_url('siswa/detail/'.$siswa['id']);
                    }
                }

                # cari materi terkait
                $retrieve_terkait_mapel = $this->materi_model->retrieve_all(
                    $no_of_records = 10,
                    $page_no       = 1,
                    $pengajar_id   = array(),
                    $siswa_id      = array(),
                    $mapel_id      = array($materi['mapel_id']),
                    $judul         = null,
                    $konten        = null,
                    $tgl_posting   = null,
                    $publish       = 1,
                    $kelas_id      = array(),
                    $type          = array(),
                    $pagination    = false
                );

                $data_terkait = array();
                foreach ($retrieve_terkait_mapel as $row) {
                    if (empty($data_terkait[$row['id']]) AND $row['id'] != $materi['id'] AND count($data_terkait) <= 20) {
                        $data_terkait[$row['id']] = $row;
                    }
                }

                $retrieve_terkait_kelas = $this->materi_model->retrieve_all(
                    $no_of_records = 10,
                    $page_no       = 1,
                    $pengajar_id   = array(),
                    $siswa_id      = array(),
                    $mapel_id      = array(),
                    $judul         = null,
                    $konten        = null,
                    $tgl_posting   = null,
                    $publish       = 1,
                    $kelas_id      = $arr_materi_kelas_id,
                    $type          = array(),
                    $pagination    = false
                );

                foreach ($retrieve_terkait_kelas as $row) {
                    if (empty($data_terkait[$row['id']]) AND $row['id'] != $materi['id'] AND count($data_terkait) <= 20) {
                        $data_terkait[$row['id']] = $row;
                    }
                }

                $data['terkait'] = $data_terkait;

                # setup texteditor
                $html_js = get_texteditor();

                # setup colorbox
                $html_js .= load_comp_js(array(
                    base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                ));

                $data['comp_js']  = $html_js;
                $data['comp_css'] = load_comp_css(array(
                    base_url('assets/comp/colorbox/colorbox.css')
                ));

                $this->twig->display('detail-materi.html', $data);
            break;
        }
    }

    function komentar($segment_3 = '', $segment_4 = '')
    {
        # panggil datatables
        $data['comp_js'] = load_comp_js(array(
            base_url('assets/comp/datatables/jquery.dataTables.js'),
            base_url('assets/comp/datatables/datatable-bootstrap2.js'),
        ));

        $data['comp_css'] = load_comp_css(array(
            base_url('assets/comp/datatables/datatable-bootstrap2.css'),
        ));

        switch ($segment_3) {
            case 'laporan':
                if (!is_admin()) {
                    redirect('materi/komentar');
                }

                $field_id       = 'laporkan-komentar';
                $retrieve_field = retrieve_field($field_id);
                if (isset($retrieve_field['value'])) {
                    $field_value = json_decode($retrieve_field['value'], 1);
                } else {
                    $field_value = array();
                }

                # aksi
                $get_act = (!empty($_GET['act'])) ? $_GET['act'] : '';
                if (!empty($get_act) AND in_array($get_act, array(1, 2))) {
                    $id = (string)$_GET['id'];
                    if (empty($id)) {
                        redirect('materi/komentar/laporan');
                    }

                    # hapus komentar dan laporan
                    if (!empty($field_value[$id])) {
                        $laporan = $field_value[$id];

                        if ($get_act == 1) {
                            # hapus komentar
                            $this->komentar_model->delete($laporan['komentar_id']);
                        }

                        # hapus laporan
                        unset($field_value[$id]);
                        update_field($field_id, 'Laporan Komentar', json_encode($field_value));

                        $this->session->set_flashdata('komentar', get_alert('success', 'Komentar ' . (($get_act == 1) ? 'dan laporan ' : '') . 'berhasil dihapus.'));
                        redirect('materi/komentar/laporan');
                    } else {
                        redirect('materi/komentar/laporan');
                    }
                }

                # update view_admin
                $cp_field_value = $field_value;
                foreach ($cp_field_value as $id => $val) {
                    $cp_field_value[$id]['view_admin'] = 1;
                }
                update_field($field_id, 'Laporan Komentar', json_encode($cp_field_value));

                # format data
                $data['jml_laporan_baru'] = 0;
                $results = array();
                foreach ($field_value as $id => $val) {
                    $val['id'] = $id;

                    # cari materi
                    $materi = $this->materi_model->retrieve($val['materi_id']);
                    if (empty($materi)) {
                        # hapus laporan
                        unset($field_value[$id]);
                        update_field($field_id, 'Laporan Komentar', json_encode($field_value));
                        continue;
                    }
                    $val['materi'] = $materi;

                    $login = $this->get_user_data($val['login_id']);
                    $val['login'] = $login;

                    $komentar = $this->komentar_model->retrieve($val['komentar_id']);
                    if (empty($komentar)) {
                        # hapus laporan
                        unset($field_value[$id]);
                        update_field($field_id, 'Laporan Komentar', json_encode($field_value));
                        continue;
                    }
                    $val['komentar'] = $komentar;
                    $val['komentar']['login'] = $this->get_user_data($komentar['login_id']);

                    $results[] = $val;

                    if (empty($val['view_admin'])) {
                        $data['jml_laporan_baru'] = $data['jml_laporan_baru'] + 1;
                    }
                }
                $results = array_reverse($results);

                $data['laporan'] = $results;

                $this->twig->display('list-komentar-laporan.html', $data);
            break;

            case 'delete':
                if (!is_admin()) {
                    redirect('materi/komentar');
                }

                $komentar = $this->komentar_model->retrieve((int)$segment_4);
                if (empty($komentar)) {
                    show_error('Komentar tidak ditemukan');
                }

                # hapus komentar
                $this->komentar_model->delete($komentar['id']);

                $this->session->set_flashdata('komentar', get_alert('success', 'Komentar berhasil dihapus.'));
                redirect('materi/komentar');
            break;

            default:
                $login_id = null;
                if (!is_admin()) {
                    $login_id = get_sess_data('login', 'id');
                }

                $retrieve_all = $this->komentar_model->retrieve_all(
                    $no_of_records = "all",
                    $page_no       = 1,
                    $login_id,
                    $materi_id     = null,
                    $tampil        = 1
                );
                foreach ($retrieve_all as $key => $val) {
                    $val['materi']      = $this->materi_model->retrieve($val['materi_id']);
                    $retrieve_all[$key] = $this->format_komentar($val);
                }

                $data['komentar'] = $retrieve_all;

                if (is_admin()) {
                    $data['jml_laporan_baru'] = $this->materi_model->count('unread-laporan');
                }

                $this->twig->display('list-komentar.html', $data);
            break;
        }
    }
}
