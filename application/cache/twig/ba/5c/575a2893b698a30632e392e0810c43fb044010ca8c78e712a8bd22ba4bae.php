<?php

/* layout-detail-materi.html */
class __TwigTemplate_ba5c575a2893b698a30632e392e0810c43fb044010ca8c78e712a8bd22ba4bae extends Twig_Template
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
        echo "css/read.css\" rel=\"stylesheet\">
        ";
        // line 10
        $this->displayBlock('css', $context, $blocks);
        // line 11
        echo "        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
        ";
        // line 12
        echo (isset($context["comp_css"]) ? $context["comp_css"] : null);
        echo "
    </head>
    <body>

        ";
        // line 16
        $this->displayBlock('content', $context, $blocks);
        // line 17
        echo "
        <script type=\"text/javascript\">
        var site_url = \"";
        // line 19
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
        var base_url = \"";
        // line 20
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\";
        </script>
        <script src=\"";
        // line 22
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
        ";
        // line 25
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
        ";
        // line 26
        $this->displayBlock('js', $context, $blocks);
        // line 27
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
    }

    // line 10
    public function block_css($context, array $blocks = array())
    {
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
    }

    // line 26
    public function block_js($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout-detail-materi.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 26,  110 => 16,  105 => 10,  99 => 6,  93 => 27,  91 => 26,  87 => 25,  83 => 24,  79 => 23,  75 => 22,  70 => 20,  66 => 19,  62 => 17,  60 => 16,  53 => 12,  48 => 11,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  23 => 1,  387 => 205,  383 => 204,  378 => 203,  376 => 202,  369 => 197,  363 => 194,  353 => 186,  337 => 180,  331 => 177,  325 => 174,  320 => 173,  316 => 172,  309 => 168,  301 => 163,  296 => 162,  294 => 161,  290 => 159,  281 => 153,  275 => 149,  262 => 141,  252 => 137,  235 => 135,  232 => 134,  228 => 133,  222 => 130,  216 => 127,  210 => 124,  205 => 123,  201 => 122,  194 => 118,  188 => 114,  186 => 113,  182 => 111,  175 => 107,  169 => 104,  158 => 96,  145 => 86,  141 => 84,  129 => 75,  125 => 73,  123 => 72,  112 => 64,  108 => 63,  101 => 59,  95 => 55,  92 => 54,  44 => 8,  41 => 7,  33 => 4,  30 => 6,);
    }
}
