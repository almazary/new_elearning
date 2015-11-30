<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update extends CI_Controller
{
    var $CI;
    var $DATA_UPDATE;
    var $CURRENT_VERSION;

    function __construct()
    {
        parent::__construct();

        $this->CI =& get_instance();

        $this->CI->load->database();

        $this->CI->load->library('session');

        # cek admin bukan, kalo bukan die
        $sess_data = $this->CI->session->userdata('login_' . APP_PREFIX);

        if (empty($sess_data['admin'])) {
            show_error('Akses ditolak');
        }

        # cek ada update tidak
        $this->CI->db->where('id', 'versi');
        $result = $this->CI->db->get('pengaturan');
        $result = $result->row_array();
        $versi  = $result['value'];
        $this->CURRENT_VERSION = $result['value'];

        $api_update = 'http://api.dokumenary.net/check.php?old_version=' . $versi;

        $get_update = file_get_contents('http://localhost/api_update/check.php?old_version=1.4');

        $result_update = json_decode($get_update, 1);

        if (empty($result_update)) {
            show_error('Tidak ada update yang tersedia.');
        }

        if (!empty($result_update['msg'])) {
            show_error($result_update['msg']);
        }

        $this->DATA_UPDATE = $result_update;
    }

    function index()
    {

    }
}