<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Method untuk deklarasi array default yang akan di parser dan di berikan ke view
 * 
 * @param  array  $add_item
 * @return array
 */
function default_parser_item($add_item = array())
{
    $return = array(
        'base_url'          => base_url(),
        'site_url'          => site_url(),
        'favicon_url'       => base_url('assets/images/favicon.ico'),
        'copyright_setup'   => 'Copyright &copy; 2014 Almazari - <a href="http://www.dokumenary.net">dokumenary.net</a>',
        'copyright'         => 'Copyright &copy; 2014 '.get_site_config('site_name').' by Almazari - <a href="http://www.dokumenary.net">dokumenary.net</a>',
        'version'           => '<a href="https://github.com/almazary/new_elearning">@dev version</a>',
        'current_url'       => current_url(),
        'logo_url_small'    => get_logo_url(),
        'logo_url_medium'   => get_logo_url('medium'),
        'logo_url_large'    => get_logo_url('large'),
        'base_url_theme'    => base_url_theme().'/',
        'site_name_default' => 'E-Learning System',
        'site_name'         => 'E-Learning '.get_site_config('site_name'),
        'comp_css'          => '',
        'comp_js'           => ''
    );
    if (!empty($add_item) AND is_array($add_item)) {
        $return = array_merge($return, $add_item);
    }
    return $return;
}

/**
 * Method untuk load css komponent tambahan
 * 
 * @param  array  $target_href
 * @return string
 */
function load_comp_css($target_href = array())
{
    $return = '';
    foreach ($target_href as $value) {
        $return .= '<link type="text/css" href="'.$value.'" rel="stylesheet">'.PHP_EOL;
    }
    return $return;
}

/**
 * Method untuk load js komponent tambahan
 * 
 * @param  array  $target_src
 * @return string
 */
function load_comp_js($target_src = array())
{
    $return = '';
    foreach ($target_src as $value) {
        $return .= '<script src="'.$value.'" type="text/javascript"></script>'.PHP_EOL;
    }
    return $return;
}

/**
 * Method untuk mendapatkan data site config
 * 
 * @param  string $field
 * @return string data
 */
function get_site_config($field)
{
    $CI =& get_instance();
    $CI->load->model('config_model');
    $config = $CI->config_model->retrieve();
    return $config[$field];
}

/**
 * Method untuk mendapatkan path ke arah template aktif
 * 
 * @param  string $add_link
 * @return string link
 */
function path_theme($add_link = '')
{
    return APPPATH.'views/'.get_active_theme().'/'.$add_link;
}

/**
 * Method untuk mendapatkan link base url ke template yang sedang aktif
 * 
 * @param  string $add_link string tambahan untuk link
 * @return string link template
 */
function base_url_theme($add_link = '')
{
    $active_theme = get_active_theme();
    return base_url('assets/themes/'.$active_theme.'/'.$add_link);
}

/**
 * Method untuk mendapatkan link logo elearning
 * 
 * @param  string $size pilihan small|medium|large
 * @return string link image
 */
function get_logo_url($size = 'small') {
    return base_url('assets/images/logo-'.strtolower($size).'.png');
}

/**
 * Method untuk mendapatkan nama template yang aktif
 * 
 * @return string nama template
 */
function get_active_theme()
{
    return 'default';
}

/**
 * Method untuk mendapatkan css alert
 * 
 * @param  string $notif
 * @param  string $msg
 * @return string 
 */
function get_alert($notif = 'success', $msg = '')
{
    return '<div class="alert alert-'.$notif.'"><button type="button" class="close" data-dismiss="alert">×</button> '.$msg.'</div>';
}