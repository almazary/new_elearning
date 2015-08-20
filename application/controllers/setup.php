<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup extends CI_Controller
{
    private $db_error;
    private $prefix;

    function __construct()
    {
        parent::__construct();

        # load library
        $this->load->library(array('form_validation', 'twig', 'user_agent'));

        # load helper
        $this->load->helper(array('url', 'form', 'text', 'elearning', 'security', 'file', 'number', 'date'));

        # delimiters form validation
        $this->form_validation->set_error_delimiters('<span class="text-error"><i class="icon-info-sign"></i> ', '</span>');

        # cek pengaturan database
        include APPPATH . 'config/database.php';

        $link = @mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password']);
        if (!$link) {
            $this->db_error = get_alert('error', 'Failed to connect to the server: ' . mysqli_connect_error());
        }
        elseif (!@mysqli_select_db($link, $db['default']['database'])) {
            $this->db_error = get_alert('error', 'Failed to connect to the database: ' . mysqli_error($link));
        }

        if (empty($this->db_error)) {
            $this->load->database();
            $this->prefix = $db['default']['dbprefix'];
        }
    }

    function index($step = '')
    {
        switch ($step) {
            case '3':
                if (!empty($this->db_error)) {
                    redirect('setup/index/1');
                }

                $this->load->model('config_model');
                $check = $this->config_model->retrieve('nama-sekolah');
                if (empty($check)) {
                    redirect('setup/index/2');
                }

                $data['jenjang'] = get_pengaturan('jenjang', 'value');

                $this->twig->display('install-step-3.html', $data);
            break;

            case '2':
                if (!empty($this->db_error)) {
                    redirect('setup/index/1');
                }

                $this->load->model('config_model');
                $check = $this->config_model->retrieve('nama-sekolah');
                if (!empty($check)) {
                    redirect('setup/index/3');
                }

                if ($this->form_validation->run('setup/index/2') == true) {
                    foreach ($_POST as $key => $val) {
                        $this->config_model->create(
                            $key,
                            $key,
                            $val
                        );
                    }

                    redirect('setup/index/3');
                }

                $this->twig->display('install-step-2.html');
            break;

            case '1':
            default:
                if (empty($this->db_error)) {
                    # run query
                    $sql = file_get_contents(APPPATH . 'install/table-master');
                    $sql = str_replace('{$prefix}', $this->prefix, $sql);

                    $sqls = explode(';', $sql);
                    array_pop($sqls);

                    $this->db->trans_start();
                    foreach($sqls as $statement){
                        $statment = $statement . ";";
                        $this->db->query($statement);
                    }
                    $this->db->trans_complete();

                    redirect('setup/index/2');
                }

                $data['error'] = $this->db_error;
                $this->twig->display('install-step-1.html', $data);
            break;
        }
    }
}
