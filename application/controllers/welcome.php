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
        }

        $this->twig->display('welcome.html', $data);
    }

    function pengaturan()
    {
        must_login();

        if (!is_admin()) {
            redirect('welcome');
        }

        $data['comp_js'] = get_tinymce('tinymce, textarea.tinymce');

        if ($this->form_validation->run('pengaturan') == true) {
            foreach ($_POST as $key => $val) {
                # cek ada tidak, kalo ada update
                $retrieve = $this->config_model->retrieve($key);
                if (!empty($retrieve)) {
                    $this->config_model->update($key, $retrieve['nama'], $val);
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

        $results = array(
            'siswa'    => $retrieve_all_siswa,
            'pengajar' => $retrieve_all_pengajar,
            'materi'   => $retrieve_all_materi,
            'tugas'    => $retrieve_all_tugas
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
            $data['comp_js']      = $html_js;
            $data['comp_css']     = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));
        }

        $this->twig->display('search-results.html', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
