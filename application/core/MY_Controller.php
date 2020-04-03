<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Controller yang extend dari ci_controller
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

class MY_Controller extends CI_Controller
{
    public $siswa_kelas_aktif = array();
    public $update_link;
    public $portal_update_link;
    public $bug_tracker_link;
    public $default_timezone = "Asia/Jakarta";
    public $current_version;

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set($this->default_timezone);

        $this->update_link        = 'http://www.dokumenary.net/category/new-elearning/feed/';
        $this->portal_update_link = 'http://www.dokumenary.net/category/new-elearning/';
        $this->bug_tracker_link   = 'http://www.dokumenary.net/category/bug-tracker-new-elearning/';

        # load helper
        $this->load->helper(array('url', 'form', 'text', 'elearning', 'security', 'file', 'number', 'date', 'download', 'plugins'));

        $error_install = "Install aplikasi e-learning by Almazari (www.dokumenary.net): " . anchor('setup', "&rarr; Halaman Install");
        try {
            check_db_connection();
        } catch (Exception $e) {
            echo $error_install;die;
        }

        $this->load->database();

        # load library
        $this->load->library(array('session', 'form_validation', 'pager', 'parser', 'image_lib', 'upload', 'twig', 'user_agent', 'email', 'menu'));

        # load saja semua model
        $this->load->model(array('config_model', 'kelas_model', 'login_model', 'mapel_model', 'materi_model', 'pengajar_model', 'siswa_model', 'tugas_model', 'msg_model', 'pengumuman_model', 'komentar_model'));

        # delimiters form validation
        $this->form_validation->set_error_delimiters('<span class="text-error"><i class="icon-info-sign"></i> ', '</span>');

        # cek apakah sudah berhasil install
        if (check_success_install() == false) {
            echo $error_install;die;
        }

        # jika bukan ajax
        if (!is_ajax()) {
            // $this->output->enable_profiler(TRUE);

            # jika login sebagai siswa
            if (is_siswa()) {
                # jika kelas aktifnya kosong, sebaiknya di die jasa
                $kelas_aktif = $this->kelas_model->retrieve_siswa(null, array(
                    'siswa_id' => get_sess_data('user', 'id'),
                    'aktif'    => 1
                ));
                if (empty($kelas_aktif)) {
                    exit('Kelas aktif anda tidak ditemukan, segera hubungi admin e-learning.');
                }

                $this->siswa_kelas_aktif = $kelas_aktif;

                # cek sedang ujian tidak
                $this->cek_mode_ujian();
            }
        }

        # cek versi
        $versi_install = '2.0';
        $versi = get_pengaturan('versi', 'value');

        $this->current_version = $versi;

        if ($versi < $versi_install) {
            $this->config_model->update('versi', 'Versi', $versi_install);

            # panggil perubahan tabel
            $this->table_change();

            $this->current_version = $versi_install;
        }

        # autoload function plugin
        autoload_function_plugin();

        # since 1.8.2 update field last_activity login log, pastikan dibawah table_change
        if (is_login()) {
            $this->login_model->update_last_activity(get_sess_data('login', 'log_id'));
        }
    }

    /**
     * Semua perubahan tabel pada versi yang baru ditaruh di fungsi ini
     * @return boolean
     */
    function table_change()
    {
        $this->load->dbforge();

        # ubah type field `value` pada tabel field_tambahan menjadi longtext
        $fields = $this->db->field_data('field_tambahan');
        foreach ($fields as $field) {
            if ($field->name == 'value' && $field->type == 'text') {
                $this->dbforge->modify_column('field_tambahan', array(
                    '`value`' => array(
                        'type' => 'LONGTEXT'
                    )
                ));
            }
        }

        # penambahan fitur login log
        $this->login_model->alter_table();

        # since 1.8.2 tambah field last_activity
        $ada_field = false;
        $fields = $this->db->field_data('login_log');
        foreach ($fields as $field) {
            if ($field->name == 'last_activity') {
                $ada_field = true;
                break;
            }
        }
        # jika tidak ada
        if (!$ada_field) {
            $this->dbforge->add_column('login_log', array(
                'last_activity' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'null' => TRUE,
                ),
            ));
        }

        # 2.0 optimasi index table
        $this->config_model->update_index_default_table();

        return true;
    }

    /**
     * Validasi saat update nis, sudah digunakan atau belum
     *
     * @param  string $nis
     * @return boolean
     */
    function update_nis($nis = '')
    {
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

    /**
     * Validasi update nip, cek sudah digunakan atau belum
     *
     * @param  string $nip
     * @return boolean
     */
    function update_nip($nip = '')
    {
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

    /**
     * Method untuk ngecek username sudah digunakan atau belum
     *
     * @param  string $username
     * @return boolean
     */
    function check_username_exist($username)
    {
        $this->db->where('username', $username);
        $result = $this->db->get('login');
        $result = $result->num_rows();
        if (empty($result)) {
            $this->form_validation->set_message('check_username_exist', 'Username tidak ditemukan.');
            return false;
        } else {
            return true;
        }
    }

    /**
     * Method untuk ngecek username penerima pesan, valid tidak.
     *
     * @param  string $username
     * @return boolean
     */
    function check_penerima_pesan($username = '')
    {
        $get_email = get_email_from_string($username);

        if (empty($get_email)) {
            $this->form_validation->set_message('check_penerima_pesan', 'Username tidak ditemukan.');
            return false;
        } else {

            foreach ($get_email as $email) {
                # cek ada tidak
                if (!$this->check_username_exist($email)) {
                    $this->form_validation->set_message('check_penerima_pesan', "Username $email tidak ditemukan.");
                    return false;
                }

                # cek sama dengan yang login tidak
                if ($email == get_sess_data('login', 'username')) {
                    $this->form_validation->set_message('check_penerima_pesan', 'Anda tidak dapat mengirim pesan ke diri sendiri.');
                    return false;
                }
            }

            return true;
        }
    }

    /**
     * Method untuk ngecek valid atau tidak tgl tampil pengumuman
     *
     * @param  string $tgl_tampil
     * @return boolean
     */
    function check_tgl_tampil($tgl_tampil = '')
    {
        $valid = true;
        if (empty($tgl_tampil)) {
            $valid = false;
        } else {
            $split = explode(" s/d ", $tgl_tampil);
            if (empty($split[1])) {
                $valid = false;
            }

            if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $split[0])) {
                $valid = false;
            }

            if (!empty($split[1]) AND !preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $split[1])) {
                $valid = false;
            }
        }

        if (!$valid) {
            $this->form_validation->set_message('check_tgl_tampil', 'Tgl. Tampil tidak valid.');
            return false;
        }

        return true;
    }

    /**
     * Method untuk resize image, menggunakan library ci
     *
     * @param  string $source_path
     * @param  string $marker
     * @param  string $width
     * @param  string $height
     * @return boolean
     */
    function create_img_thumb($source_path = '', $marker = '_thumb', $width = '90', $height = '90')
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

        return true;
    }

    /**
     * Method untuk mendapatkan jawal matapelajaran untuk siswa
     *
     * @param  integer $siswa_id
     * @return array
     */
    function get_jadwal_mapel_siswa($siswa_id)
    {
        $siswa = $this->siswa_model->retrieve($siswa_id);
        if (empty($siswa)) {
            return array();
        }

        # cari kelas aktif
        $kelas_aktif = $this->siswa_kelas_aktif;

        # cek kelas, aktif tidak
        $kelas = $this->kelas_model->retrieve($kelas_aktif['kelas_id']);
        if (empty($kelas['aktif'])) {
            return array();
        }

        $jadwal = array();
        foreach (get_indo_hari() as $hari_key => $hari_nama) {
            $jadwal[$hari_key] = array();
            $jadwal[$hari_key]['nama_hari'] = $hari_nama;

            # cari mapel_ajar yang hari dan kelasnya ini
            $mapel_ajar = $this->pengajar_model->retrieve_all_ma($hari_key, null, null, 1, $kelas['id']);
            foreach ($mapel_ajar as $ma) {
                $mapel_kelas = $this->mapel_model->retrieve_kelas($ma['mapel_kelas_id']);
                if (empty($mapel_kelas)) {
                    continue;
                }

                $mapel = $this->mapel_model->retrieve($mapel_kelas['mapel_id']);
                if (empty($mapel['aktif'])) {
                    continue;
                }

                $ma['pengajar'] = $this->pengajar_model->retrieve($ma['pengajar_id']);
                $ma['pengajar']['link_profil'] = site_url('pengajar/detail/' . $ma['pengajar_id']);
                $ma['mapel'] = $mapel;

                $jadwal[$hari_key]['jadwal'][] = $ma;
            }
        }

        return $jadwal;
    }

    /**
     * Method untuk mendapatkan data yang sedang login berdasarkan login_id
     *
     * @param  integer $login_id
     * @return array
     */
    function get_user_data($login_id)
    {
        # cari sender/receiver
        $login = $this->login_model->retrieve($login_id);
        if (!empty($login['siswa_id'])) {
            $user = $this->siswa_model->retrieve($login['siswa_id']);
            if (is_admin()) {
                $user['link_profil'] = site_url('siswa/detail/' . $user['status_id'] . '/' . $user['id']);
            } else {
                $user['link_profil'] = site_url('siswa/detail/' . $user['id']);
            }
            $user['link_image'] = get_url_image_siswa($user['foto'], 'medium', $user['jenis_kelamin']);

        } elseif (!empty($login['pengajar_id'])) {
            $user = $this->pengajar_model->retrieve($login['pengajar_id']);
            if (is_admin()) {
                $user['link_profil'] = site_url('pengajar/detail/' . $user['status_id'] . '/' . $user['id']);
            } else {
                $user['link_profil'] = site_url('pengajar/detail/' . $user['id']);
            }
            $user['link_image'] = get_url_image_pengajar($user['foto'], 'medium', $user['jenis_kelamin']);
        }

        return $user;
    }

    /**
     * Method untuk memformat data pesan
     *
     * @param  array $retrieve
     * @return array
     */
    function format_msg($retrieve)
    {
        # jika inbox yang dicari pengirimnya
        if ($retrieve['type_id'] == 1) {
            $get_user = $retrieve['sender_receiver_id'];
        } elseif ($retrieve['type_id'] == 2) {
            $get_user = $retrieve['owner_id'];

            # cari profil penerima
            $retrieve['receiver'] = $this->get_user_data($retrieve['sender_receiver_id']);
        }

        $retrieve['profil']   = $this->get_user_data($get_user);
        $retrieve['login']    = $this->login_model->retrieve($get_user);
        $retrieve['raw_date'] = $retrieve['date'];

        if (belum_sehari($retrieve['date'])) {
            $retrieve['timeago'] = iso8601($retrieve['date']);
        }

        $retrieve['date'] = format_datetime($retrieve['date']);
        return $retrieve;
    }

    /**
     * Method untuk memformat data komentar
     *
     * @param  array $retrieve
     * @return array
     */
    function format_komentar($retrieve)
    {
        $retrieve['login'] = $this->get_user_data($retrieve['login_id']);
        return $retrieve;
    }

    /**
     * Method untuk ngecek apakah siswa sedang ujian atau tidak
     * @return boolean
     */
    function sedang_ujian()
    {
        # cek login siswa
        if (!is_siswa()) {
            return false;
        }

        $field_id = 'mengerjakan-' . get_sess_data('user', 'id') . '-';
        $table    = 'field_tambahan';

        # cek tabel
        $this->db->like('id', $field_id, 'after');
        $result     = $this->db->get($table);
        $data_field = $result->row_array();
        if (!empty($data_field)) {
            return true;
        }
    }

    /**
     * Jika sedang ujian, dan mengakses halaman selain yang divalidkan, maka akan diredirect ke halaman ujian
     */
    function cek_mode_ujian()
    {
        $sedang_ujian = $this->sedang_ujian();
        # jika sedang ujian dan bukan request ajax
        if ($sedang_ujian == true AND !is_ajax()) {
            $field_id = 'mengerjakan-' . get_sess_data('user', 'id') . '-';
            $table    = 'field_tambahan';

            # cek tabel
            $this->db->like('id', $field_id, 'after');
            $result     = $this->db->get($table);
            $data_field = $result->row_array();
            if (empty($data_field)) {
                return true;
            }

            $decode_value = json_decode($data_field['value'], 1);
            
            /**
             * cek dulu tugasnya masih ada atau tidak
             */
            if (!empty($decode_value['tugas'])) {
                $tugas = $this->tugas_model->retrieve($decode_value['tugas']['id']);
                if (empty($tugas)) {
                    /**
                     * hapus saja
                     */
                    $this->db->delete($table, array('id' => $data_field['id']));
                    return true;
                }
            }

            if (isset($decode_value['valid_route']) AND isset($decode_value['uri_string'])) {
                # cek valid route
                $valid_route = false;
                foreach ($decode_value['valid_route'] as $route) {
                    $route = rtrim($route, '/');
                    if (strpos(current_url(), $route) !== false) {
                        $valid_route = true;
                        break;
                    }
                }

                if ($valid_route == false) {
                    redirect($decode_value['uri_string'], true);
                }
            }
            else {
                return true;
            }
        }
    }

    /**
     * Method untuk reset jawaban ujian siswa
     *
     * @param  integer $siswa_id
     * @param  integer $tugas_id
     * @param  array   $db_tugas  data tugas
     * @return integer
     */
    function reset_nilai_jawaban($siswa_id, $tugas_id, $db_tugas = array())
    {
        # ambil data tugas
        if (empty($db_tugas)) {
            $tugas = $this->tugas_model->retrieve($tugas_id);
            if (empty($tugas)) {
                return false;
            }
        } else {
            $tugas = $db_tugas;
        }

        # start transaksi
        $this->db->trans_start();

        # hapus history
        $history_id    = 'history-mengerjakan-' . $siswa_id . '-' . $tugas['id'];
        $history       = retrieve_field($history_id);
        $history_value = json_decode($history['value'], 1);
        delete_field($history_id);

        # hapus field mengerjakan
        $mengerjakan_field_id = 'mengerjakan-' . $siswa_id . '-' . $tugas['id'];
        delete_field($mengerjakan_field_id);

        # hapus nilai
        $retrieve_nilai = $this->tugas_model->retrieve_nilai(null, $tugas['id'], $siswa_id);
        if (!empty($retrieve_nilai['id'])) {
            $this->tugas_model->delete_nilai($retrieve_nilai['id']);
        }

        $this->db->trans_complete();

        $sukses = true;
        if ($this->db->trans_status() === FALSE) {
            $sukses = false;
        }

        if ($sukses) {
            # jika tugas upload, dihapus juga file uploadnya biar g menuh-menuhin space
            if ($tugas['type_id'] == 1 && is_file(get_path_file($history_value['file_name']))) {
                @unlink(get_path_file($history_value['file_name']));
            }
        }

        return $sukses;
    }

    /**
     * Method untuk mengambil informasi yang urgent dari dokumenary.net
     *
     * @param boolean $skip_check_time
     * @since 2.0
     */
    function check_urgent_info($skip_check_time = false)
    {
        $field_id = "check-urgent-info";
        $check_urgent = retrieve_field($field_id);

        if ($skip_check_time) {
            $ok_check = true;
        } else {
            $ok_check  = false;
            if (empty($check_urgent)) {
                $ok_check = true;
            } else {
                $cek_val = json_decode($check_urgent['value'], 1);
                # bikin 30 menit sekali saja checknya
                $date_plus = strtotime("+30 minute", strtotime($cek_val['last_check']));
                if ($date_plus < strtotime(date('Y-m-d H:i:s'))) {
                    $ok_check = true;
                }
            }
        }

        if ($ok_check) {
            $url_urgent_info = "http://elearningupdates.dokumenary.net/urgent_info.php";
            $result_html = get_url_data($url_urgent_info);

            $update_value = json_encode(array(
                'info'       => $result_html,
                'last_check' => date('Y-m-d H:i:s'),
            ));

            if (empty($check_urgent)) {
                create_field($field_id, "Check Urgent Info", $update_value);
            } else {
                update_field($field_id, "Check Urgent Info", $update_value);
            }
        }

        if (isset($result_html)) {
            return $result_html;
        } elseif (!empty($cek_val['info'])) {
            return $cek_val['info'];
        }

        return "";
    }
}
