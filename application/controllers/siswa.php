<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        must_login();
    }

    function index($segment_3 = '', $segment_4 = '')
    {
        # harus login sebagai admin
        if (!is_admin()) {
            redirect('welcome');
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
                $kelas                         = $this->kelas_model->retrieve($kelas_siswa['kelas_id']);
                $val['kelas_aktif']            = $kelas;
            }

            $retrieve_all['results'][$key] = $val;
        }

        // pr($retrieve_all['results']);die;

        $data['status_id']  = $status_id;
        $data['siswas']     = $retrieve_all['results'];
        $data['pagination'] = $this->pager->view($retrieve_all, 'siswa/index/'.$status_id.'/');

        # panggil colorbox
        $html_js = load_comp_js(array(
            base_url('assets/comp/colorbox/jquery.colorbox-min.js'),
            base_url('assets/comp/colorbox/act-siswa.js')
        ));
        $data['comp_js']      = $html_js;
        $data['comp_css']     = load_comp_css(array(base_url('assets/comp/colorbox/colorbox.css')));

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
                }
            }
            redirect('siswa/index/'.$status_id);
        }

        $this->twig->display('list-siswa.html', $data);
    }

}