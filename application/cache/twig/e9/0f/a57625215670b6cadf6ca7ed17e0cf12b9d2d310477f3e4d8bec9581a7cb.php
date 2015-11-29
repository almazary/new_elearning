<?php

/* layout-public.html */
class __TwigTemplate_e90fa57625215670b6cadf6ca7ed17e0cf12b9d2d310477f3e4d8bec9581a7cb extends Twig_Template
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
    <link type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, base_url("assets/comp/pace/flash.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, base_url("assets/comp/offline/offline-theme-chrome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <script type=\"text/javascript\" src=\"//cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML\"></script>
    ";
        // line 14
        $this->displayBlock('css', $context, $blocks);
        // line 15
        echo "    ";
        echo (isset($context["comp_css"]) ? $context["comp_css"] : null);
        echo "
    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
</head>
<body style=\"display: none;\">

    <div class=\"navbar navbar-fixed-top\">
        <div class=\"navbar-inner\">
            <div class=\"container\">
                <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".navbar-inverse-collapse\">
                    <i class=\"icon-reorder shaded\"></i>
                </a>

                <a class=\"brand\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["logo_url_medium"]) ? $context["logo_url_medium"] : null), "html", null, true);
        echo "\"> ";
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
        echo "
                </a>

                <div class=\"nav-collapse collapse navbar-inverse-collapse\">
                    <ul class=\"nav pull-right\">
                        ";
        // line 33
        if (((get_pengaturan("registrasi-siswa", "value") == 1) || (get_pengaturan("registrasi-pengajar", "value") == 1))) {
            // line 34
            echo "                        <li><a href=\"";
            echo twig_escape_filter($this->env, site_url("login/register"), "html", null, true);
            echo "\">Register</a></li>
                        ";
        }
        // line 36
        echo "                    </ul>
                </div>
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->

    <div class=\"wrapper\">
        <div class=\"container\">

            ";
        // line 45
        $this->displayBlock('content', $context, $blocks);
        // line 46
        echo "
        </div>
    </div><!--/.wrapper-->

    <div class=\"footer\">
        <div class=\"container\">
            <center>
                <b class=\"copyright\">";
        // line 53
        echo (isset($context["copyright"]) ? $context["copyright"] : null);
        echo " </b> All rights reserved.<br>
                ";
        // line 54
        echo (isset($context["version"]) ? $context["version"] : null);
        echo " | Page loaded in ";
        echo twig_escape_filter($this->env, (isset($context["elapsed_time"]) ? $context["elapsed_time"] : null), "html", null, true);
        echo " seconds.
            </center>
        </div>
    </div>
    <script src=\"";
        // line 58
        echo twig_escape_filter($this->env, base_url("assets/comp/pace/pace.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 59
        echo twig_escape_filter($this->env, base_url("assets/comp/offline/offline.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 60
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 61
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
    ";
        // line 63
        $this->displayBlock('js', $context, $blocks);
        // line 64
        echo "    ";
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
    <script type=\"text/javascript\">
        \$( document ).ready(function() {
            \$(\"body\").show();
        });
    </script>
</body>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
    }

    // line 14
    public function block_css($context, array $blocks = array())
    {
    }

    // line 45
    public function block_content($context, array $blocks = array())
    {
    }

    // line 63
    public function block_js($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout-public.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 63,  183 => 45,  178 => 14,  172 => 6,  159 => 64,  157 => 63,  153 => 62,  149 => 61,  145 => 60,  141 => 59,  137 => 58,  128 => 54,  124 => 53,  115 => 46,  113 => 45,  102 => 36,  96 => 34,  94 => 33,  84 => 28,  80 => 27,  66 => 16,  61 => 15,  59 => 14,  54 => 12,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  23 => 1,);
    }
}
