<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class untuk resource siswa
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

class Siswa extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        must_login();
    }

    function index($segment_3 = '', $segment_4 = '')
    {
        if (is_pengajar() or is_siswa()) {
            redirect('siswa/filter');
        }

        $status_id = $segment_3;
        if ($status_id == '' OR $status_id > 3) {
            $status_id = 1;
        }

        $page_no = (int)$segment_4;
        if (empty($page_no)) {
            $page_no = 1;
        }

        # ambil semua data siswa
        $retrieve_all = $this->siswa_model->retrieve_all(20, $page_no, null, null, $status_id);

        # dapatkan data2 siswa
        foreach ($retrieve_all['results'] as $key => $val) {
            $kelas_siswa = $this->kelas_model->retrieve_siswa(null, array(
                'siswa_id' => $val['id'],
                'aktif'    => 1
            ));

            # kelas aktif
            if (!empty($kelas_siswa) AND $val['status_id'] != 3) {
                $kelas              = $this->kelas_model->retrieve($kelas_siswa['kelas_id']);
                $val['kelas_aktif'] = $kelas;
            }

            $retrieve_all['results'][$key] = $val;
        }

        $data['status_id']  = $status_id;
        $data['siswas']     = $retrieve_all['results'];
        $data['pagination'] = $this->pager->view($retrieve_all, 'siswa/index/'.$status_id.'/');
        $data['count_pending'] = $this->siswa_model->count('pending');

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

        if (isset($_POST['status_id']) AND !empty($_POST['status_id'])) {
            $post_status_id = $this->input->post('status_id', TRUE);
            $siswa_ids      = $this->input->post('siswa_id', TRUE);
            foreach ($siswa_ids as $siswa_id) {
                $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
                if (!empty($retrieve_siswa)) {
                    # update siswa
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

                    if ($retrieve_siswa['status_id'] == 0 && $post_status_id == 1) {
                        @kirim_email_approve_siswa($retrieve_siswa['id']);
                    }
                }
            }

            redirect('siswa/index/' . $post_status_id);
        }

        $this->twig->display('list-siswa.html', $data);
    }

    function add($segment_3 = '')
    {
        # harus login sebagai admin
        if (!is_admin()) {
            redirect('welcome');
        }

        $status_id = $segment_3;
        if ($status_id  == '' OR $status_id > 3) {
            redirect('siswa/index/1');
        }

        $data['status_id'] = $status_id;
        $data['kelas']     = $this->kelas_model->retrieve_all_child();

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

        if ($this->form_validation->run('siswa/add') == TRUE AND !$error_upload) {
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

                # create thumb small
                $this->create_img_thumb(
                    get_path_image($upload_data['file_name']),
                    '_small',
                    '50',
                    '50'
                );

                # create thumb medium
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

            # simpan data siswa
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

            # simpan data login
            $this->login_model->create(
                $username,
                $password,
                $siswa_id,
                null
            );

            # simpan kelas siswa
            $this->kelas_model->create_siswa(
                $kelas_id,
                $siswa_id,
                1
            );

            $this->session->set_flashdata('siswa', get_alert('success', 'Data siswa berhasil disimpan.'));
            redirect('siswa/index/1');

        } else {
            $upload_data = $this->upload->data();
            if (!empty($upload_data) AND is_file(get_path_image($upload_data['file_name']))) {
                unlink(get_path_image($upload_data['file_name']));
            }
        }

        $this->twig->display('tambah-siswa.html', $data);
    }

    function filter($segment_3 = '')
    {
        $data['kelas_all'] = $this->kelas_model->retrieve_all_child(true);
        $data['kelas']     = $this->kelas_model->retrieve_all_child();

        $page_no = $segment_3;
        if (empty($page_no)) {
            $page_no = 1;
        }

        $session_filter = $this->session->userdata('filter_siswa');

        if ($this->form_validation->run('siswa/filter') == TRUE) {

            $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
            $thn_lahir     = (int)$this->input->post('thn_lahir', TRUE);
            $agama         = $this->input->post('agama', TRUE);
            $status_id     = $this->input->post('status_id', TRUE);
            $kelas_id      = $this->input->post('kelas_id', TRUE);

            $filter = array(
                'nis'           => $this->input->post('nis', TRUE),
                'nama'          => $this->input->post('nama', TRUE),
                'jenis_kelamin' => (empty($jenis_kelamin)) ? array() : $jenis_kelamin,
                'tahun_masuk'   => $this->input->post('tahun_masuk', TRUE),
                'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
                'tgl_lahir'     => (int)$this->input->post('tgl_lahir', TRUE),
                'bln_lahir'     => (int)$this->input->post('bln_lahir', TRUE),
                'thn_lahir'     => (empty($thn_lahir)) ? '' : $thn_lahir,
                'agama'         => (empty($agama)) ? array() : $agama,
                'alamat'        => $this->input->post('alamat', TRUE),
                'status_id'     => (empty($status_id)) ? array() : $status_id,
                'kelas_id'      => (empty($kelas_id)) ? array() : $kelas_id,
                'username'      => $this->input->post('username', TRUE)
            );

            $this->session->set_userdata('filter_siswa', $filter);

            redirect('siswa/filter');

        } elseif (!empty($session_filter)) {

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

        if (empty($filter)) {
            $filter = array(
                'nis'           => '',
                'nama'          => '',
                'jenis_kelamin' => '',
                'tahun_masuk'   => '',
                'tempat_lahir'  => '',
                'tgl_lahir'     => '',
                'bln_lahir'     => '',
                'thn_lahir'     => '',
                'agama'         => '',
                'alamat'        => '',
                'status_id'     => '',
                'kelas_id'      => '',
                'username'      => ''
            );
        }

        if (empty($filter['status_id'])) {
            $filter['status_id'] = array(1, 2);
        }

        $data['filter'] = $filter;

        if (!empty($filter)) {
            $retrieve_all = $this->siswa_model->retrieve_all_filter(
                $filter['nis'], $filter['nama'], $filter['jenis_kelamin'], $filter['tahun_masuk'], $filter['tempat_lahir'], $filter['tgl_lahir'], $filter['bln_lahir'], $filter['thn_lahir'], $filter['alamat'], $filter['agama'], $filter['kelas_id'], $filter['status_id'], $filter['username'], $page_no
            );

            # dapatkan data2 siswa
            foreach ($retrieve_all['results'] as $key => $val) {
                $kelas_siswa = $this->kelas_model->retrieve_siswa(null, array(
                    'siswa_id' => $val['id'],
                    'aktif'    => 1
                ));

                # kelas aktif
                if (!empty($kelas_siswa) AND $val['status_id'] != 3) {
                    $kelas                         = $this->kelas_model->retrieve($kelas_siswa['kelas_id']);
                    $val['kelas_aktif']            = $kelas;
                }

                $retrieve_all['results'][$key] = $val;
            }
        }

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
        ));
        $data['comp_js']       = $html_js;
        $data['comp_css']      = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));
        $data['siswas']        = $retrieve_all['results'];
        $data['pagination']    = $this->pager->view($retrieve_all, 'siswa/filter/');
        $data['count_pending'] = $this->siswa_model->count('pending');

        $this->twig->display('filter-siswa.html', $data);
    }

    function filter_action()
    {
        if ($this->form_validation->run('siswa/filter') == TRUE) {
            $siswa_ids = $this->input->post('siswa_id', TRUE);
            $status_id = (int)$this->input->post('status_id', TRUE);
            $kelas_id  = (int)$this->input->post('kelas_id', TRUE);

            if (!empty($siswa_ids) AND is_array($siswa_ids)) {

                if (empty($status_id) AND empty($kelas_id)) {
                    $this->session->set_flashdata('siswa', get_alert('warning', 'Tidak ada aksi yang dipilih.'));
                    redirect('siswa/filter');
                }

                foreach ($siswa_ids as $siswa_id) {
                    $s = $this->siswa_model->retrieve($siswa_id);
                    if (!empty($status_id)) {
                        # update status siswa
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

                $this->session->set_flashdata('siswa', get_alert('success', 'Siswa berhasil diperbaharui ('.$label.').'));
                redirect('siswa/filter');

            } else {
                $this->session->set_flashdata('siswa', get_alert('warning', 'Tidak ada siswa yang dipilih.'));
                redirect('siswa/filter');
            }

        } else {
            redirect('siswa/filter');
        }
    }

    function edit_profile($segment_3 = '', $segment_4 = '')
    {
        if (is_pengajar()) {
            exit('Akses ditolak');
        }

        $status_id      = (int)$segment_3;
        $siswa_id       = (int)$segment_4;
        $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
        if (empty($retrieve_siswa)) {
            exit('Data siswa tidak ditemukan');
        }

        # jika sebagai siswa, hanya profilnya dia yang bisa diupdate
        if (is_siswa() AND get_sess_data('user', 'id') != $retrieve_siswa['id']) {
            exit('Akses ditolak');
        }

        $data['status_id'] = $status_id;
        $data['siswa_id']  = $siswa_id;
        $data['siswa']     = $retrieve_siswa;

        if ($this->form_validation->run('siswa/edit_profile') == TRUE) {
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

            # update siswa
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

            # jika sebelumnya berstatus pending, dan dibuah ke aktif kirimkan email approve
            if ($retrieve_siswa['status_id'] == 0 && $status == 1) {
                kirim_email_approve_siswa($retrieve_siswa['id']);
            }

            $this->session->set_flashdata('edit', get_alert('success', 'Profil siswa berhasil diperbaharui.'));
            redirect('siswa/edit_profile/'.$status_id.'/'.$siswa_id);
        }

        $this->twig->display('edit-siswa-profile.html', $data);
    }

    /**
     * Meghapus foto siswa
     * @since 1.8
     */
    function delete_foto($segment_3 = '', $segment_4 = '')
    {
        if (is_pengajar()) {
            show_error('Akses ditolak');
        }

        # cek pengaturan
        if (is_siswa() AND get_pengaturan('edit-foto-siswa', 'value') == '0') {
            show_error('Maaf fitur dinonaktifkan oleh administrator');
        }

        $siswa_id       = (int)$segment_3;
        $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
        if (empty($retrieve_siswa)) {
            show_error('Data siswa tidak ditemukan');
        }

        # jika sebagai siswa, hanya profilnya dia yang bisa diupdate
        if (is_siswa() AND get_sess_data('user', 'id') != $retrieve_siswa['id']) {
            show_error('Akses ditolak');
        }

        if (is_file(get_path_image($retrieve_siswa['foto']))) {
            unlink(get_path_image($retrieve_siswa['foto']));
        }

        if (is_file(get_path_image($retrieve_siswa['foto'], 'medium'))) {
            unlink(get_path_image($retrieve_siswa['foto'], 'medium'));
        }

        if (is_file(get_path_image($retrieve_siswa['foto'], 'small'))) {
            unlink(get_path_image($retrieve_siswa['foto'], 'small'));
        }

        $this->siswa_model->delete_foto($retrieve_siswa['id']);

        $uri_back = $segment_4;
        if (!empty($uri_back)) {
            $uri_back = deurl_redirect($uri_back);
        } else {
            $uri_back = site_url('siswa');
        }

        redirect($uri_back);
    }

    function edit_picture($segment_3 = '', $segment_4 = '')
    {
        if (is_pengajar()) {
            exit('Akses ditolak');
        }

        # cek pengaturan
        if (is_siswa() AND get_pengaturan('edit-foto-siswa', 'value') == '0') {
            exit('Maaf fitur dinonaktifkan oleh administrator');
        }

        $status_id      = (int)$segment_3;
        $siswa_id       = (int)$segment_4;
        $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
        if (empty($retrieve_siswa)) {
            exit('Data siswa tidak ditemukan');
        }

        # jika sebagai siswa, hanya profilnya dia yang bisa diupdate
        if (is_siswa() AND get_sess_data('user', 'id') != $retrieve_siswa['id']) {
            exit('Akses ditolak');
        }

        $data['status_id'] = $status_id;
        $data['siswa_id']  = $siswa_id;
        $data['siswa']     = $retrieve_siswa;

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

            # create thumb small
            $this->create_img_thumb(
                get_path_image($upload_data['file_name']),
                '_small',
                '50',
                '50'
            );

            # create thumb medium
            $this->create_img_thumb(
                get_path_image($upload_data['file_name']),
                '_medium',
                '150',
                '150'
            );

            # update siswa
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

            $this->session->set_flashdata('edit', get_alert('success', 'Foto siswa berhasil diperbaharui.'));
            redirect('siswa/edit_picture/'.$status_id.'/'.$siswa_id);
        } else {
            if (!empty($_FILES['userfile']['tmp_name'])) {
                $data['error_upload'] = '<span class="text-error">'.$this->upload->display_errors().'</span>';
            }
        }

        $this->twig->display('edit-siswa-picture.html', $data);
    }

    function moved_class($segment_3 = '', $segment_4 = '')
    {
        if (!is_admin()) {
            exit('Akses ditolak');
        }

        $status_id      = (int)$segment_3;
        $siswa_id       = (int)$segment_4;
        $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
        if (empty($retrieve_siswa)) {
            exit('Data siswa tidak ditemukan');
        }

        $data['kelas']     = $this->kelas_model->retrieve_all_child();
        $data['status_id'] = $status_id;
        $data['siswa_id']  = $siswa_id;

        $get_aktif = $this->kelas_model->retrieve_siswa(null, array(
            'siswa_id' => $siswa_id,
            'aktif'    => 1
        ));
        $data['get_aktif'] = $get_aktif;

        if ($this->form_validation->run('siswa/moved_class') == TRUE) {
            $kelas_id  = $this->input->post('kelas_id', TRUE);
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

            $this->session->set_flashdata('class', get_alert('success', 'Kelas siswa berhasil diperbaharui.'));
            redirect('siswa/moved_class/'.$status_id.'/'.$siswa_id);
        }

        $this->twig->display('edit-siswa-kelas.html', $data);
    }

    function edit_username($segment_3 = '', $segment_4 = '')
    {
        if (is_pengajar()) {
            exit('Akses ditolak');
        }

        # cek pengaturan
        if (is_siswa() AND get_pengaturan('edit-username-siswa', 'value') == '0') {
            exit('Maaf fitur dinonaktifkan oleh administrator');
        }

        $status_id      = (int)$segment_3;
        $siswa_id       = (int)$segment_4;
        $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
        if (empty($retrieve_siswa)) {
            exit('Data siswa tidak ditemukan');
        }

        # jika sebagai siswa, hanya profilnya dia yang bisa diupdate
        if (is_siswa() AND get_sess_data('user', 'id') != $retrieve_siswa['id']) {
            exit('Akses ditolak');
        }

        $data['login']     = $this->login_model->retrieve(null, null, null, $siswa_id);
        $data['status_id'] = $status_id;
        $data['siswa_id']  = $siswa_id;

        if ($this->form_validation->run('siswa/edit_username') == TRUE) {
            $login_id = $this->input->post('login_id', TRUE);
            $username = $this->input->post('username', TRUE);

            # update username
            $this->login_model->update(
                $login_id,
                $username,
                $siswa_id,
                null,
                $data['login']['is_admin'],
                $data['login']['reset_kode']
            );

            $this->session->set_flashdata('edit', get_alert('success', 'Username siswa berhasil diperbaharui.'));
            redirect('siswa/edit_username/'.$status_id.'/'.$siswa_id);
        }

        $this->twig->display('edit-siswa-username.html', $data);
    }

    function edit_password($segment_3 = '', $segment_4 = '')
    {
        if (is_pengajar()) {
            exit('Akses ditolak');
        }

        $status_id      = (int)$segment_3;
        $siswa_id       = (int)$segment_4;
        $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
        if (empty($retrieve_siswa)) {
            exit('Data siswa tidak ditemukan');
        }

        # jika sebagai siswa, hanya profilnya dia yang bisa diupdate
        if (is_siswa() AND get_sess_data('user', 'id') != $retrieve_siswa['id']) {
            exit('Akses ditolak');
        }

        $data['status_id'] = $status_id;
        $data['siswa_id']  = $siswa_id;

        $retrieve_login = $this->login_model->retrieve(null, null, null, $siswa_id);

        if ($this->form_validation->run('siswa/edit_password') == TRUE) {
            $password = $this->input->post('password2', TRUE);
            # update password
            $this->login_model->update_password($retrieve_login['id'], $password);

            $this->session->set_flashdata('edit', get_alert('success', 'Password siswa berhasil diperbaharui.'));
            redirect('siswa/edit_password/'.$status_id.'/'.$siswa_id);
        }

        $this->twig->display('edit-siswa-password.html', $data);
    }

    function detail($segment_3 = '', $segment_4 = '')
    {
        if (is_admin()) {
            $status_id = (int)$segment_3;
            $siswa_id  = (int)$segment_4;
        } else {
            $siswa_id  = (int)$segment_3;
            $status_id = 1;
        }

        $retrieve_siswa = $this->siswa_model->retrieve($siswa_id);
        if (empty($retrieve_siswa)) {
            redirect('siswa/index/1');
        }

        $retrieve_login     = $this->login_model->retrieve(null, null, null, $retrieve_siswa['id']);
        $retrieve_all_kelas = $this->kelas_model->retrieve_all_siswa(10, 1, array('siswa_id' => $retrieve_siswa['id']));

        $data['siswa']       = $retrieve_siswa;
        $data['siswa_login'] = $retrieve_login;
        $data['siswa_kelas'] = $retrieve_all_kelas;
        $data['status_id']   = $status_id;

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
        ));
        $data['comp_js']  = $html_js;
        $data['comp_css'] = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

        $this->twig->display('detail-siswa.html', $data);
    }

    function jadwal_mapel()
    {
        if (!is_siswa()) {
            redirect('siswa');
        }

        $data['list_jadwal'] = $this->get_jadwal_mapel_siswa(get_sess_data('user', 'id'));

        $this->twig->display('jadwal-mapel.html', $data);
    }
}
