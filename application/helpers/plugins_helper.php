<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# include plugin helper file
$path_plugin_helper = './plugins/helpers/helper.php';
if (is_file($path_plugin_helper)) {
    include $path_plugin_helper;
}