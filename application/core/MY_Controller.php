<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $siswa_kelas_aktif = array();
    public $update_link;
    public $portal_update_link;
    public $bug_tracker_link;

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        # load helper
        $this->load->helper(array('url', 'form', 'text', 'elearning', 'security', 'file', 'number', 'date', 'download'));

        try {
            $success = install_success();
            if (!$success) {
                redirect('setup');
            }
        } catch (Exception $e) {
            redirect('setup');
        }

        $this->load->database();

        # load library
        $this->load->library(array('session', 'form_validation', 'pager', 'parser', 'image_lib', 'upload', 'twig', 'user_agent', 'email'));

        # load saja semua model
        $this->load->model(array('config_model', 'kelas_model', 'login_model', 'mapel_model', 'materi_model', 'pengajar_model', 'siswa_model', 'tugas_model', 'msg_model', 'pengumuman_model'));

        # delimiters form validation
        $this->form_validation->set_error_delimiters('<span class="text-error"><i class="icon-info-sign"></i> ', '</span>');

        if (is_login()) {
            # cek session kcfindernya ada atau tidak
            if (empty($_SESSION['E-LEARNING']['KCFINDER'])) {
                create_sess_kcfinder(get_sess_data('login', 'id'));
            }
        }

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
        }

        $this->update_link        = 'http://www.dokumenary.net/category/new-elearning/feed/';
        $this->portal_update_link = 'http://www.dokumenary.net/category/new-elearning/';
        $this->bug_tracker_link   = 'http://www.dokumenary.net/category/bug-tracker-new-elearning/';

        // $this->output->enable_profiler(TRUE);
    }

    function update_nis($nis = '') {
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

    function update_nip($nip = '') {
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

    function check_username_exist($username) {
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

    function check_penerima_pesan($username = '') {
        $get_email = get_email_from_string($username);

        if (empty($get_email)) {
            $this->form_validation->set_message('check_penerima_pesan', 'Username tidak ditemukan.');
            return false;
        } else {
            # cek ada tidak
            if (!$this->check_username_exist($get_email)) {
                $this->form_validation->set_message('check_penerima_pesan', 'Username tidak ditemukan.');
                return false;
            }

            # cek sama dengan yang login tidak
            if ($get_email == get_sess_data('login', 'username')) {
                $this->form_validation->set_message('check_penerima_pesan', 'Anda tidak dapat mengirim pesan ke diri sendiri.');
                return false;
            }
            return true;
        }
    }

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
    }

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

    function format_msg($retrieve)
    {
        # jika inbox yang dicari pengirimnya
        if ($retrieve['type_id'] == 1) {
            $get_user = $retrieve['sender_receiver_id'];
        } elseif ($retrieve['type_id'] == 2) {
            $get_user = $retrieve['owner_id'];
        }

        # cari sender/receiver
        $login = $this->login_model->retrieve($get_user);
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

        $retrieve['profil'] = $user;
        $retrieve['login']  = $login;

        # format tanggal, jika hari ini
        if (date('Y-m-d') == date('Y-m-d', strtotime($retrieve['date']))) {
            $retrieve['date'] = date('H:i', strtotime($retrieve['date']));
        }
        # kemarin
        elseif (date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d')))) == date('Y-m-d', strtotime($retrieve['date']))) {
            $retrieve['date'] = date('H:i', strtotime($retrieve['date'])) . ' kemarin';
        }
        # lusa
        elseif (date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))) == date('Y-m-d', strtotime($retrieve['date']))) {
            $retrieve['date'] = date('H:i', strtotime($retrieve['date'])) . ' lusa';
        }
        else {
            $retrieve['date'] = tgl_jam_indo($retrieve['date']);
        }

        return $retrieve;
    }
}
