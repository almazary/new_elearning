<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plugins extends MY_Controller
{
    private $plugin_folder = './plugins/';

    function __construct()
    {
        parent::__construct();
    }

    function _remap($pluginname = '', $params = array())
    {
        if (empty($pluginname) OR !is_dir($this->plugin_folder . 'src/' . $pluginname)) {
            show_error("Plugin not found");
        } else {
            # cek file controller
            if (!is_file($this->plugin_folder . 'src/' . $pluginname . '/func_controller.php')) {
                show_error('File func_controller.php not exist.');
            }

            include $this->plugin_folder . 'src/' . $pluginname . '/func_controller.php';

            # jika kosong ambil index
            if (empty($params[0])) {
                $params[0] = 'index';
            }

            # check function exist
            if (!function_exists($params[0])) {
                show_404();
            }

            # cek jika ada function construct, selalu panggil fungsi itu duluan
            # biasanya untuk keperluan cek session pengguna plugin
            if (function_exists('construct')) {
                construct();
            }

            $copy_param = $params;
            unset($copy_param[0]);
            # redinex
            $copy_param = array_values($copy_param);

            call_user_func_array($params[0], $copy_param);
        }
    }
}