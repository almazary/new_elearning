<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        # load library
        $this->load->library(array('form_validation', 'twig', 'user_agent'));

        # load helper
        $this->load->helper(array('url', 'form', 'text', 'elearning', 'security', 'file', 'number', 'date'));

        # delimiters form validation
        $this->form_validation->set_error_delimiters('<span class="text-error"><i class="icon-info-sign"></i> ', '</span>');
    }

    function index($step = '')
    {
        switch ($step) {
            case 'value':
                # code...
            break;

            case '1':
            default:
                $data['error'] = '';
                if ($this->form_validation->run('setup/index/1') == true) {
                    $host     = $this->input->post('host', true);
                    $user     = $this->input->post('user', true);
                    $password = $this->input->post('password', true);
                    $db       = $this->input->post('db', true);

                    $link = @mysqli_connect($host, $user, $password);
                    if (!$link) {
                        $data['error'] = get_alert('error', 'Failed to connect to the server: ' . mysqli_connect_error());
                    }
                    elseif (!@mysqli_select_db($link, $db)) {
                        $data['error'] = get_alert('error', 'Failed to connect to the database: ' . mysqli_error($link));
                    }

                    if (empty($data['error'])) {
                        # buat file database.php
                    }
                }

                $this->twig->display('install-step-1.html', $data);
            break;
        }
    }
}
