<?php
session_start();

/**
 *	Filemanager PHP connector
 *  Initial class, put your customizations here
 *
 *	@license	MIT License
 *	@author		Riaan Los <mail (at) riaanlos (dot) nl>
 *  @author		Simon Georget <simon (at) linea21 (dot) com>
 *  @author		Pavel Solomienko <https://github.com/servocoder/>
 *	@copyright	Authors
 */

// only for debug
// error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
// ini_set('display_errors', '1');

require_once('application/Fm.php');
require_once('application/FmHelper.php');

function auth()
{
    // IMPORTANT : by default Read and Write access is granted to everyone.
    // You can insert your own code over here to check if the user is authorized.
    // If you use a session variable, you've got to start the session first (session_start())
    # jika sudah login
    if (empty($_SESSION['login_e-learning'])) {
        return false;
    }

    return true;
}

$config = array();

// example to override the default config
//$config = array(
//    'upload' => array(
//        'policy' => 'DISALLOW_ALL',
//        'restrictions' => array(
//            'pdf',
//        ),
//    ),
//);

$fm = Fm::app()->getInstance($config);

$fix_path_file = str_replace("\\", "/", __FILE__);
$lokasi_file   = str_replace($_SERVER['DOCUMENT_ROOT'], "", $fix_path_file);
$split_lokasi  = explode("assets", $lokasi_file);
$dir_app       = $split_lokasi[0];

// use to setup files root folder
if (strpos($dir_app, "\\") !== false) {
    $dir_app = str_replace("\\", "/", $dir_app);
}

$path_user = $_SESSION['login_e-learning']['path_userfiles'];

// example to setup files root folder
$fm->setFileRoot($dir_app . $path_user, true);

// example to set list of allowed actions
// $fm->setAllowedActions(["select", "move"]);

$fm->handleRequest();
