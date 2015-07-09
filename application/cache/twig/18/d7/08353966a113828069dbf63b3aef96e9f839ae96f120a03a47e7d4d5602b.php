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
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap-responsive.min.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "css/theme.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "images/icons/css/font-awesome.css\" rel=\"stylesheet\">
        ";
        // line 11
        $this->displayBlock('css', $context, $blocks);
        // line 12
        echo "        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
        ";
        // line 13
        echo (isset($context["comp_css"]) ? $context["comp_css"] : null);
        echo "
    </head>
    <body>

        ";
        // line 17
        $this->displayBlock('content', $context, $blocks);
        // line 18
        echo "
        <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/script.js\" type=\"text/javascript\"></script>
        ";
        // line 23
        $this->displayBlock('js', $context, $blocks);
        // line 24
        echo "
        ";
        // line 25
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["web_title"]) ? $context["web_title"] : null), "html", null, true);
    }

    // line 11
    public function block_css($context, array $blocks = array())
    {
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
    }

    // line 23
    public function block_js($context, array $blocks = array())
    {
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
        return array (  114 => 23,  109 => 17,  104 => 11,  98 => 6,  90 => 25,  87 => 24,  85 => 23,  81 => 22,  77 => 21,  73 => 20,  66 => 18,  64 => 17,  57 => 13,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  30 => 6,  23 => 1,  231 => 94,  218 => 84,  214 => 83,  205 => 77,  201 => 76,  196 => 75,  190 => 73,  188 => 72,  179 => 66,  175 => 65,  166 => 59,  162 => 58,  159 => 57,  146 => 55,  142 => 54,  137 => 51,  124 => 49,  120 => 48,  116 => 46,  113 => 45,  110 => 44,  108 => 43,  99 => 37,  95 => 36,  86 => 30,  82 => 29,  78 => 28,  69 => 19,  65 => 21,  56 => 15,  52 => 12,  43 => 8,  39 => 7,  34 => 7,  31 => 4,  28 => 3,);
    }
}
