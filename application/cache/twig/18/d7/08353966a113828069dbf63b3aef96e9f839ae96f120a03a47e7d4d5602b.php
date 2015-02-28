<?php

/* layout-iframe.html */
class __TwigTemplate_18d708353966a113828069dbf63b3aef96e9f839ae96f120a03a47e7d4d5602b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 8
        $this->displayBlock('css', $context, $blocks);
        // line 14
        echo "        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
        ";
        // line 15
        echo (isset($context["comp_css"]) ? $context["comp_css"] : null);
        echo "
    </head>
    <body>

        ";
        // line 19
        $this->displayBlock('content', $context, $blocks);
        // line 20
        echo "
        ";
        // line 21
        $this->displayBlock('js', $context, $blocks);
        // line 27
        echo "
        ";
        // line 28
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
    </body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["web_title"]) ? $context["web_title"] : null), "html", null, true);
    }

    // line 8
    public function block_css($context, array $blocks = array())
    {
        // line 9
        echo "        <link type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap-responsive.min.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "css/theme.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "images/icons/css/font-awesome.css\" rel=\"stylesheet\">
        ";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
    }

    // line 21
    public function block_js($context, array $blocks = array())
    {
        // line 22
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/script.js\" type=\"text/javascript\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "layout-iframe.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 25,  112 => 24,  108 => 23,  103 => 22,  100 => 21,  95 => 19,  89 => 12,  85 => 11,  81 => 10,  76 => 9,  73 => 8,  67 => 7,  59 => 28,  56 => 27,  54 => 21,  51 => 20,  49 => 19,  42 => 15,  37 => 14,  35 => 8,  31 => 7,  23 => 1,);
    }
}
