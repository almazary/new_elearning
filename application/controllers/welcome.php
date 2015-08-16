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
        }

        $this->twig->display('welcome.html', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
