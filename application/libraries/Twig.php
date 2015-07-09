<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twig
{
    private $CI;
    private $_twig;
    private $_template_dir;
    private $_cache_dir;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config->load('twig');
        ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . APPPATH . 'libraries/Twig');
        require_once (string)'Autoloader.php';

        log_message('debug', "Twig Autoloader Loaded");

        Twig_Autoloader::register();

        $this->_template_dir = $this->CI->config->item('template_dir').'/'.get_active_theme();
        $this->_cache_dir = $this->CI->config->item('cache_dir');

        $loader = new Twig_Loader_Filesystem($this->_template_dir);

        $this->_twig = new Twig_Environment($loader, array(
                'cache' => $this->_cache_dir,
                'debug' => true,
            )
        );

        foreach(get_defined_functions() as $functions) {
            foreach($functions as $function) {
                $this->_twig->addFunction($function, new Twig_Function_Function($function));
            }
        }

    }

    public function add_function($name)
    {
        $this->_twig->addFunction($name, new Twig_Function_Function($name));
    }

    public function render($template, $data = array())
    {
        $template = $this->_twig->loadTemplate($template);
        return $template->render($data);
    }

    public function display($template, $data = array())
    {
        # merge array data dengan default data
        $data = default_parser_item($data);

        $template = $this->_twig->loadTemplate($template);
        $this->CI->output->set_output($template->render($data));
    }
}
