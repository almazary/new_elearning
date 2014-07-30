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
    if (!empty($config)) {
        return $config[$field];
    }
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

/**
 * Method untuk panggil component tinymc
 * 
 * @param  string $element_id
 * @return string
 */
function get_tinymce($element_id)
{
    $return = '<script type="text/javascript" src="'.base_url('assets/comp/tinymce/tiny_mce.js').'"></script>'.PHP_EOL;
    $return .= '<script type="text/javascript">
        tinyMCE.init({  
            selector: "textarea#'.$element_id.'",
            theme : "advanced",
            skin : "o2k7",
            plugins : "youtubeIframe,emotions,syntaxhl,wordcount,pagebreak,style,layer,table,save,advhr,advimage,advlink,insertdatetime,preview,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave,print,media,youtubeIframe,syntaxhl",

            // Theme options
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,youtubeIframe,|,syntaxhl",
            theme_advanced_toolbar_location : "top",
            valid_children : "+body[style],+body[div],p[strong|a|#text]",
            valid_elements : "*[*]",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            file_browser_callback : "openKCFinder",
            theme_advanced_resizing : false,
            content_css : "'.base_url('assets/comp/tinymce/com/content.css').'",
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
function get_sess_data($field)
{
    $CI =& get_instance();
    $CI->load->library('session');

    $sess_admin = $CI->session->userdata('admin');

    //jika admin
    if (!empty($sess_admin)) {
        return $sess_admin[$field];
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