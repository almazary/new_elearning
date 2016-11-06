<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class untuk resource Plugins
 *
 * @package   e-Learning Dokumenary Net
 * @author    Almazari <almazary@gmail.com>
 * @copyright Copyright (c) 2013 - 2016, Dokumenary Net.
 * @since     1.0
 * @link      http://dokumenary.net
 *
 * INDEMNITY
 * You agree to indemnify and hold harmless the authors of the Software and
 * any contributors for any direct, indirect, incidental, or consequential
 * third-party claims, actions or suits, as well as any related expenses,
 * liabilities, damages, settlements or fees arising from your use or misuse
 * of the Software, or a violation of any terms of this license.
 *
 * DISCLAIMER OF WARRANTY
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR
 * IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE,
 * NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.
 *
 * LIMITATIONS OF LIABILITY
 * YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE
 * FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION
 * WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE
 * APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING
 * BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF
 * DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.
 */

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
