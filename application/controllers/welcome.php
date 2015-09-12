<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    function index()
    {
        must_login();

        $data = array();
        if (is_siswa()) {
            $retrieve_all_materi = $this->materi_model->retrieve_all(
                10,
                1,
                null,
                null,
                null,
                null,
                null,
                null,
                1
            );
            $data['materi_terbaru'] = $retrieve_all_materi['results'];

            # ambil semua data tugas
            $retrieve_all_tugas = $this->tugas_model->retrieve_all(
                10,
                1,
                null,
                null,
                null,
                null,
                null,
                null
            );

            $data['tugas_terbaru'] = $retrieve_all_tugas['results'];

            $where_pengumuman = array(
                'tgl_tampil <=' => date('Y-m-d'),
                'tgl_tutup >='  => date('Y-m-d'),
                'tampil_siswa'  => 1
            );
        }

        if (is_pengajar()) {
            $where_pengumuman = array(
                'tgl_tampil <='   => date('Y-m-d'),
                'tgl_tutup >='    => date('Y-m-d'),
                'tampil_pengajar' => 1
            );
        }

        if (is_admin()) {
            $data['jml_siswa']            = $this->siswa_model->count('total');
            $data['jml_siswa_pending']    = $this->siswa_model->count('pending');
            $data['jml_pengajar']         = $this->pengajar_model->count('total');
            $data['jml_pengajar_pending'] = $this->pengajar_model->count('pending');

            $data['info_update_link']   = $this->update_link;
            $data['portal_update_link'] = $this->portal_update_link;
            $data['bug_tracker_link']   = $this->bug_tracker_link;

            $html_js = load_comp_js(array(
                base_url('assets/comp/jquery/info-update.js'),
            ));
            $data['comp_js'] = $html_js;

            $where_pengumuman = array(
                'tgl_tampil <='   => date('Y-m-d'),
                'tgl_tutup >='    => date('Y-m-d')
            );
        }

        # ambil pengumuman yang sudah tampil
        $data['pengumuman'] = $this->pengumuman_model->retrieve_all(10, 1, $where_pengumuman, false);

        $this->twig->display('welcome.html', $data);
    }

    function pengaturan()
    {
        must_login();

        if (!is_admin()) {
            redirect('welcome');
        }

        # bagian hapus gambar
        if (!empty($_GET['delete-img'])) {
            $img_id = (int)$_GET['delete-img'];
            if ($img_id > 0 AND $img_id <= 4) {
                $key      = 'img-slide-' . $img_id;
                $retrieve = $this->config_model->retrieve($key);
                if (!empty($retrieve) AND !empty($retrieve['value'])) {

                    # hapus file
                    if (is_file(get_path_image($retrieve['value']))) {
                        unlink(get_path_image($retrieve['value']));
                    }

                    $this->config_model->update($key, $key, '');

                }
            }

            redirect('welcome/pengaturan');
        }

        $data['comp_js'] = get_tinymce('tinymce, textarea.tinymce');

        if ($this->form_validation->run('pengaturan') == true) {

            foreach ($_POST as $key => $val) {
                # cek ada tidak, kalo ada update
                $retrieve = $this->config_model->retrieve($key);
                if (!empty($retrieve)) {
                    $this->config_model->update($key, $retrieve['nama'], $val);
                } else {
                    $this->config_model->create($key, $key, $val);
                }
            }

            # untuk upload gambar
            foreach ($_FILES as $key => $val) {
                if (!empty($val['tmp_name'])) {
                    $config = array();
                    $config['upload_path']   = get_path_image();
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size']      = '0';
                    $config['max_width']     = '0';
                    $config['max_height']    = '0';
                    $config['file_name']     = $key;
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload($key)) {
                        # hapus file sebelumnya
                        $old_file = get_pengaturan($key, 'value');
                        if (is_file(get_path_image($old_file))) {
                            unlink(get_path_image($old_file));
                        }

                        $upload_data = $this->upload->data();

                        $retrieve = $this->config_model->retrieve($key);
                        if (!empty($retrieve)) {
                            $this->config_model->update($key, $key, $upload_data['file_name']);
                        } else {
                            $this->config_model->create($key, $key, $upload_data['file_name']);
                        }
                    }
                }
            }

            $this->session->set_flashdata('pengaturan', get_alert('success', 'Pengaturan berhasil diperbaharui.'));
            redirect('welcome/pengaturan');
        }

        $this->twig->display('pengaturan.html', $data);
    }

    function search()
    {
        must_login();

        if (empty($_GET['q'])) {
            redirect('welcome');
        }

        $q = (string)$_GET['q'];
        $q = urldecode($q);

        if (is_siswa()) {
            $kelas_aktif = $this->siswa_kelas_aktif;
        }

        # cari siswa
        $retrieve_all_siswa = $this->siswa_model->retrieve_all_filter(
            $nis           = '',
            $nama          = $q,
            $jenis_kelamin = array(),
            $tahun_masuk   = '',
            $tempat_lahir  = '',
            $tgl_lahir     = '',
            $bln_lahir     = '',
            $thn_lahir     = '',
            $alamat        = '',
            $agama         = array(),
            $kelas_id      = array(),
            $status_id     = is_admin() ? array() : array(1, 2, 3),
            $username      = '',
            $page_no       = 1,
            $pagination    = false
        );

        foreach ($retrieve_all_siswa as $key => &$val) {
            $kelas_siswa = $this->kelas_model->retrieve_siswa(null, array(
                'siswa_id' => $val['id'],
                'aktif'    => 1
            ));

            # kelas aktif
            if (!empty($kelas_siswa) AND $val['status_id'] != 3) {
                $kelas              = $this->kelas_model->retrieve($kelas_siswa['kelas_id']);
                $val['kelas_aktif'] = $kelas;
            }

            $retrieve_all_siswa[$key] = $val;
        }

        # cari pengajar
        $retrieve_all_pengajar = $this->pengajar_model->retrieve_all_filter(
            $nip           = '',
            $nama          = $q,
            $jenis_kelamin = array(),
            $tempat_lahir  = '',
            $tgl_lahir     = '',
            $bln_lahir     = '',
            $thn_lahir     = '',
            $alamat        = '',
            $status_id     = is_admin() ? array() : array(1, 2),
            $username      = '',
            $is_admin      = '',
            $page_no       = 1,
            $pagination    = false
        );

        # cari materi
        $retrieve_all_materi = $this->materi_model->retrieve_all(
            $no_of_records = 10,
            $page_no       = 1,
            $pengajar_id   = array(),
            $siswa_id      = array(),
            $mapel_id      = array(),
            $judul         = $q,
            $konten        = null,
            $tgl_posting   = null,
            $publish       = null,
            $kelas_id      = array(),
            $type          = array(),
            $pagination    = false
        );

        # cari tugas
        $retrieve_all_tugas = $this->tugas_model->retrieve_all(
            $no_of_records = 10,
            $page_no       = 1,
            $mapel_id      = array(),
            $pengajar_id   = is_pengajar() ? array(get_sess_data('user', 'id')) : array(),
            $type_id       = array(),
            $kelas_id      = is_siswa() ? array($kelas_aktif['kelas_id']) : array(),
            $judul         = $q,
            $info          = null,
            $aktif         = array(),
            $pagination    = false
        );

        # cari pesan
        $retrieve_all_pesan = $this->msg_model->retrieve_all(10, $page_no, get_sess_data('login', 'id'), array('content' => $q), false);
        foreach ($retrieve_all_pesan as $key => &$val) {
            $retrieve_all_pesan[$key] = $this->format_msg($val);
        }

        # cari pengumuman
        if (is_siswa()) {
            $where_pengumuman = array(
                'tgl_tampil <=' => date('Y-m-d'),
                'tgl_tutup >='  => date('Y-m-d'),
                'tampil_siswa'  => 1
            );
        } elseif (is_pengajar()) {
            $where_pengumuman = array(
                'tgl_tampil <='   => date('Y-m-d'),
                'tgl_tutup >='    => date('Y-m-d'),
                'tampil_pengajar' => 1
            );
        } elseif (is_admin()) {
            $where_pengumuman = array();
        }
        $where_pengumuman = array_merge($where_pengumuman, array(
            'judul' => $q, 'konten' => $q
        ));

        $retrieve_all_pengumuman = $this->pengumuman_model->retrieve_all(10, 1, $where_pengumuman, false);
        foreach ($retrieve_all_pengumuman as $key => &$val) {
            $val['pengajar'] = $this->pengajar_model->retrieve($val['pengajar_id']);

            # allow action
            if (is_siswa()) {
                $allow_action = array('detail');
            } elseif (is_admin()) {
                $allow_action = array('detail', 'edit', 'delete');
            } elseif (is_pengajar()) {
                # kalo dia yang buat
                if ($val['pengajar_id'] == get_sess_data('user', 'id')) {
                    $allow_action = array('detail', 'edit', 'delete');
                } else {
                    $allow_action = array('detail');
                }
            }

            $val['allow_action'] = $allow_action;

            $retrieve_all_pengumuman[$key] = $val;
        }

        $results = array(
            'siswa'      => $retrieve_all_siswa,
            'pengajar'   => $retrieve_all_pengajar,
            'materi'     => $retrieve_all_materi,
            'tugas'      => $retrieve_all_tugas,
            'pesan'      => $retrieve_all_pesan,
            'pengumuman' => $retrieve_all_pengumuman
        );

        $data['results'] = $results;
        $data['keyword'] = $q;

        if (is_admin()) {
            # panggil colorbox
            $html_js = load_comp_js(array(
                base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
                base_url('assets/comp/colorbox/act-siswa.js'),
                base_url('assets/comp/colorbox/act-pengajar.js')
            ));
            $data['comp_js']  = $html_js;
            $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));
        }

        $this->twig->display('search-results.html', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
