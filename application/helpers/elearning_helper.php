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
        'comp_js'           => '',
        ''
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
    if (!empty($config)) {
        return $config[$field];
    }
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

/**
 * Method untuk panggil component tinymc
 *
 * @param  string $element_id
 * @return string
 */
function get_tinymce($element_id, $theme = 'advanced', $remove_plugins = array())
{
    $tiny_plugins = array('pdw','emotions','syntaxhl','wordcount','pagebreak','style','layer','table','save','advhr','advimage','advlink','insertdatetime','preview','searchreplace','contextmenu','paste','directionality','fullscreen','noneditable','visualchars','nonbreaking','xhtmlxtras','template','inlinepopups','autosave','print','media','youtubeIframe','syntaxhl','tiny_mce_wiris');
    if (!empty($remove_plugins)) {
        $copy_tiny_plugins = $tiny_plugins;
        $combine           = array_combine($tiny_plugins, $copy_tiny_plugins);
        foreach ($remove_plugins as $rm) {
            unset($combine[$rm]);
        }
        $tiny_plugins = array_values($combine);
    }

    $return = '<script type="text/javascript" src="'.base_url('assets/comp/tinymce/tiny_mce.js').'"></script>'.PHP_EOL;
    $return .= '<script type="text/javascript">
        tinyMCE.init({
            selector: "textarea#'.$element_id.'",
            theme : "'.$theme.'",
            plugins : "'.implode(',', $tiny_plugins).'",

            // Theme options
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,advhr,hr,|,link,unlink,|,sub,sup,charmap,tiny_mce_wiris_formulaEditor,|,code,|,pdw_toggle",
            theme_advanced_buttons2 : "forecolor,backcolor,|,undo,redo,|,search,replace,outdent,indent,ltr,rtl,blockquote,|,emotions,image,media,youtubeIframe,syntaxhl,|,print,preview,fullscreen",
            theme_advanced_buttons3 : "",
            theme_advanced_toolbar_location : "top",
            valid_children : "+body[style],+body[div],p[strong|a|#text]",
            valid_elements : "*[*]",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            pdw_toggle_on : 1,
            pdw_toggle_toolbars : "2,3",
            file_browser_callback : "openKCFinder",
            theme_advanced_resizing : false,
            content_css : "'.base_url('assets/comp/tinymce/com/content.css').'",
            convert_urls: false,
        });

        function openKCFinder(field_name, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: "'.base_url('assets/comp/kcfinder/browse.php?opener=tinymce&type=').'" + type,
                title: "KCFinder",
                width: 700,
                height: 500,
                resizable: "yes",
                inline: true,
                close_previous: "no",
                popup_css: false
            }, {
                window: win,
                input: field_name
            });
            return false;
        }
    </script>';
    return $return;
}

/**
 * Method untuk mendapatkan data session
 *
 * @param  string $field
 * @return string
 */
function get_sess_data($idx1, $idx2, $idx3)
{
    $CI =& get_instance();
    $CI->load->library('session');

    $sess_admin = $CI->session->userdata($idx1);

    //jika admin
    if (!empty($sess_admin)) {
        return $sess_admin[$idx2][$idx3];
    }
}

/**
 * Method untuk mendapatkan link gambar
 *
 * @param  string $img
 * @param  string $size
 * @return string
 *
 */
function get_url_image($img, $size = '')
{
    if (empty($size)) {
        return base_url('assets/images/'.$img);
    } else {
        $pisah = explode('.', $img);
        $ext = end($pisah);
        $nama_file = $pisah[0];

        return base_url('assets/images/'.$nama_file.'_'.$size.'.'.$ext);
    }
}

/**
 * Method untuk mendapatkan link foto siswa
 *
 * @param  string $img
 * @param  string $size
 * @param  string $jk
 * @return string url
 */
function get_url_image_siswa($img = '', $size = 'medium', $jk = 'Laki-laki') {
    if (is_null($img) OR empty($img)) {
        if ($jk == 'Laki-laki') {
            $img = 'default_siswa.png';
        } else {
            $img = 'default_siswi.png';
        }
        return get_url_image($img);
    } else {
        return get_url_image($img, $size);
    }
}

/**
 * Method untuk mendapatkan link foto pengajar
 *
 * @param  string $img
 * @param  string $size
 * @param  string $jk
 * @return string url
 */
function get_url_image_pengajar($img = '', $size = 'medium', $jk = 'Laki-laki') {
    if (is_null($img) OR empty($img)) {
        if ($jk == 'Laki-laki') {
            $img = 'default_pl.png';
        } else {
            $img = 'default_pp.png';
        }
        return get_url_image($img);
    } else {
        return get_url_image($img, $size);
    }
}

/**
 * Method untuk mendapatkan path image
 *
 * @param  string $img
 * @param  string $size medium|small, kalau aslinya di kosongkan
 * @return string paht
 */
function get_path_image($img = '', $size = '')
{
    if (empty($size)) {
        return './assets/images/'.$img;
    } else {
        $pisah = explode('.', $img);
        $ext = end($pisah);
        $nama_file = $pisah[0];

        return './assets/images/'.$nama_file.'_'.$size.'.'.$ext;
    }
}

function get_path_file($file = '')
{
    return './assets/files/'.$file;
}

function get_row_data($model, $func, $args = array(), $field_name = '')
{
    $CI =& get_instance();
    $CI->load->model($model);

    $retrieve = call_user_func_array(array($CI->$model, $func), $args);

    if (empty($field_name)) {
        return $retrieve;
    } else {
        return isset($retrieve[$field_name]) ? $retrieve[$field_name] : '';
    }
}

function get_flashdata($key) {
    $CI =& get_instance();
    $CI->load->library('session');

    return $CI->session->flashdata($key);
}

function get_indo_bulan($bln = '') {
    $data = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    if (empty($bln)) {
        return $data;
    } else {
        $bln = (int)$bln;
        return $data[$bln];
    }
}

function get_indo_hari($hari = '') {
    $data = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu');
    if (empty($hari)) {
        return $data;
    } else {
        $hari = (int)$hari;
        return $data[$hari];
    }
}

function tgl_indo($tgl = '') {
    if (!empty($tgl)) {
        $pisah = explode('-', $tgl);
        return $pisah[2].' '.get_indo_bulan($pisah[1]).' '.$pisah[0];
    }
}

function tgl_jam_indo($tgl_jam = '') {
    if (!empty($tgl_jam)) {
        $pisah = explode(' ', $tgl_jam);
        return tgl_indo($pisah[0]).' '.date('H:i', strtotime($tgl_jam));
    }
}

function get_post_data($key = '') {
    if (!empty($_POST)) {
        return $_POST[$key];
    }
}

function get_abjad($index) {
    $abjad = array(1 => 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    return $abjad[$index];
}

function pr($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function get_data_array($array, $index1, $index2) {
    return $array[$index1][$index2];
}

function enurl_redirect($current_url) {
    return str_replace(array("%2F","%5C"), array("%252F","%255C"), urlencode($current_url));
}

function deurl_redirect($url) {
    return urldecode(urldecode($url));
}