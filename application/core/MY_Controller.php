<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        # load saja semua model
        $this->load->model(array('config_model', 'kelas_model', 'login_model', 'mapel_model', 'materi_model', 'pengajar_model', 'siswa_model', 'tugas_model'));

        # delimiters form validation
        $this->form_validation->set_error_delimiters('<span class="text-error"><i class="icon-info-sign"></i> ', '</span>');

        if (is_login()) {
            # cek session kcfindernya ada atau tidak
            if (empty($_SESSION['E-LEARNING']['KCFINDER'])) {
                create_sess_kcfinder(get_sess_data('login', 'id'));
            }
        }

        $this->output->enable_profiler(TRUE);
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
}
