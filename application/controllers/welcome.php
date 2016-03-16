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

        if (!is_demo_app()) {
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
        }

        $data['comp_js'] = get_tinymce('tinymce, textarea.tinymce');
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

    function donation()
    {
        $this->twig->display('donation.html');
    }

    function get_plugin()
    {
        must_login();

        if (!is_admin()) {
            redirect('welcome');
        }

        $plugin_url  = 'http://elearningplugin.dokumenary.net/index.php';
        $plugin_data = get_url_data($plugin_url);
        $result_body = json_decode($plugin_data, true);

        $data['plugins'] = $result_body;

        # panggil datatables
        $data['comp_js'] = load_comp_js(array(
            base_url('assets/comp/datatables/jquery.dataTables.js'),
            base_url('assets/comp/datatables/datatable-bootstrap2.js'),
            base_url('assets/comp/datatables/script.js'),
        ));

        $data['comp_css'] = load_comp_css(array(
            base_url('assets/comp/datatables/datatable-bootstrap2.css'),
        ));

        $this->twig->display('get-plugin.html', $data);
    }

    function backup_restore($act = "")
    {
        must_login();

        if (!is_admin()) {
            redirect('welcome');
        }

        $data = array();

        $field_id    = "last-backup-date";
        $last_backup = retrieve_field($field_id);
        if (!empty($last_backup)) {
            $data['last_backup_date'] = $last_backup['value'];
        }

        switch ($act) {
            case 'backup':
                # catat backup
                $date_backup = date('Y-m-d H:i:s');
                $last_backup = retrieve_field($field_id);
                if (empty($last_backup)) {
                    create_field($field_id, "Last backup database", $date_backup);
                } else {
                    update_field($field_id, "Last backup database", $date_backup);
                }

                $prefix = $this->db->dbprefix;

                # backup template
                $backup_template = file_get_contents(APPPATH . 'install/backup-table');
                $backup_template = str_replace('{$prefix}', $prefix, $backup_template);
                $backup_template = str_replace('{$versi}', get_pengaturan('versi', 'value'), $backup_template);
                $backup_template = str_replace('{$tgl_backup}', $date_backup, $backup_template);
                $backup_template = str_replace('{$site_url}', site_url(), $backup_template);

                # insert
                $table_list = array(
                    'bank_soal',
                    'field_tambahan',
                    'kelas',
                    'kelas_siswa',
                    'komentar',
                    'login',
                    'mapel',
                    'mapel_ajar',
                    'mapel_kelas',
                    'materi',
                    'materi_kelas',
                    'messages',
                    'nilai_tugas',
                    'pengajar',
                    'pengaturan',
                    'pengumuman',
                    'pilihan',
                    'siswa',
                    'tugas',
                    'tugas_kelas',
                    'tugas_pertanyaan',
                );

                foreach ($table_list as $table) {
                    # cek tabel ada atau g
                    if (!$this->db->table_exists($table)) {
                        $backup_template = str_replace('{$insert_' . $table . '}', "", $backup_template);
                        continue;
                    }

                    # cek isi table
                    $results = $this->db->get($table);
                    $results = $results->result_array();
                    if (empty($results)) {
                        $backup_template = str_replace('{$insert_' . $table . '}', "", $backup_template);
                        continue;
                    }

                    # cari list field
                    $fields = $this->db->list_fields($table);

                    $data_values = array();
                    foreach ($results as $row) {
                        $data_row = array();
                        foreach ($row as $key => $val) {
                            if (in_array($key, $fields)) {
                                $data_row[] = is_null($val) ? "NULL" : "'" . $this->db->escape_str($val) . "'";
                            }
                        }

                        $data_values[] = "(" . implode(", ", $data_row) . ")";
                    }

                    $sql_insert = "";

                    # limit 500 insert
                    $i  = 1;
                    $ii = 1;
                    $limit = 500;
                    foreach ($data_values as $value) {
                        if ($i == 1) {
                            $sql_insert .= "\n\n";
                            $sql_insert .= "INSERT INTO `{$prefix}{$table}` (`" . implode("`, `", $fields) . "`) VALUES \n";
                        }

                        $sql_insert .= $value;

                        if ($i == $limit OR $ii == count($data_values)) {
                            $i = 0;
                            $sql_insert .= "; \n";
                        } else {
                            $sql_insert .= ", \n";
                        }

                        $i++;
                        $ii++;
                    }

                    $backup_template = str_replace('{$insert_' . $table . '}', $sql_insert, $backup_template);
                }

                $file_name = "backup-elearning-" . date('Y-m-d-H-i') . ".sql";
                force_download($file_name, $backup_template);
            break;

            case 'restore':
                if (!empty($_FILES['userfile']['tmp_name'])) {
                    $split_name = explode('.', $_FILES['userfile']['name']);
                    $file_ext   = end($split_name);
                    if ($file_ext != 'sql') {
                        $data['restore_msg'] = "File harus bertipe .sql";
                    } else {
                        $this->db->trans_start();

                        $templine = "";
                        $lines    = file($_FILES['userfile']['tmp_name']);
                        foreach ($lines as $line) {
                            if ($line == "" OR substr($line, 0, 2) == "--" OR substr($line, 0, 1) == "#") {
                                continue;
                            }

                            $templine .= $line;

                            if (substr(trim($line), -1, 1) == ';') {
                                $this->db->query($templine);
                                $templine = '';
                            }
                        }

                        $this->db->trans_complete();

                        if ($this->db->trans_status() === FALSE) {
                            $data['restore_msg'] = "Restore error : " . $this->db->_error_message() . " " . $this->db->_error_number();
                        }

                        # redirect berhasil
                        $this->session->set_flashdata('backup_restore', get_alert('success', 'Restore data berhasil.'));
                        redirect('welcome/backup_restore');
                    }
                } else {
                    $data['restore_msg'] = "Tidak ada file yang diupload.";
                }
            break;
        }

        $this->twig->display('backup-restore.html', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
