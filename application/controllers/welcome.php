<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller 
{
    function index()
    {
        must_login();

        $this->twig->display('welcome.html');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */