<?php

/* default/main_private.html */
class __TwigTemplate_8c0db357c6454c51c6baca0d065b40146e5eb361ff2f0f3d82670320769b43b2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
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
        echo twig_escape_filter($this->env, (isset($context["web_title"]) ? $context["web_title"] : null), "html", null, true);
        echo "</title>
        <link type=\"text/css\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap-responsive.min.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "css/theme.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "images/icons/css/font-awesome.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
        ";
        // line 14
        echo (isset($context["comp_css"]) ? $context["comp_css"] : null);
        echo "
        <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
    </head>
    <body>
        <div class=\"navbar navbar-fixed-top\">
            <div class=\"navbar-inner\">
                <div class=\"container\">
                    <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".navbar-inverse-collapse\">
                        <i class=\"icon-reorder shaded\"></i>
                    </a>
                    <a class=\"brand\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["site_url"]) ? $context["site_url"] : null), "html", null, true);
        echo "/admin\">
                        <img src=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["logo_url_medium"]) ? $context["logo_url_medium"] : null), "html", null, true);
        echo "\"> ";
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
        echo "
                    </a>
                    <div class=\"nav-collapse collapse navbar-inverse-collapse\">
                        <form class=\"navbar-search pull-left input-append\" action=\"#\">
                        <input type=\"text\" class=\"span3\">
                        <button class=\"btn\" type=\"button\">
                            <i class=\"icon-search\"></i>
                        </button>
                        </form>
                        ";
        // line 34
        if (array_key_exists("top_menu", $context)) {
            // line 35
            echo "                            ";
            $template = $this->env->resolveTemplate((isset($context["top_menu"]) ? $context["top_menu"] : null));
            $template->display($context);
            // line 36
            echo "                        ";
        }
        // line 37
        echo "                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>

        <!-- /navbar -->
        <div class=\"wrapper\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"span3\">
                        ";
        // line 49
        $template = $this->env->resolveTemplate((isset($context["menu_file"]) ? $context["menu_file"] : null));
        $template->display($context);
        // line 50
        echo "                    </div>
                    <!--/.span3-->
                    <div class=\"span9\">
                        ";
        // line 53
        $template = $this->env->resolveTemplate((isset($context["content_file"]) ? $context["content_file"] : null));
        $template->display($context);
        // line 54
        echo "                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class=\"footer\">
            <div class=\"container\">
                <center>
                    <b class=\"copyright\">";
        // line 64
        echo (isset($context["copyright"]) ? $context["copyright"] : null);
        echo " </b> All rights reserved.<br>
                    ";
        // line 65
        echo (isset($context["version"]) ? $context["version"] : null);
        echo " | Page loaded in ";
        echo twig_escape_filter($this->env, (isset($context["elapsed_time"]) ? $context["elapsed_time"] : null), "html", null, true);
        echo " seconds.
                </center>
            </div>
        </div>
        <script src=\"";
        // line 69
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 70
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        ";
        // line 83
        echo "
        <script type=\"text/javascript\">
            \$(document).ready(function(){{
                \$(\".alert-success\").fadeTo(2000, 500).slideUp(500, function(){{
                    \$(\".alert-success\").alert('close');
                 }});
                \$(\".alert-warning\").fadeTo(2000, 500).slideUp(500, function(){{
                    \$(\".alert-warning\").alert('close');
                 }});
                \$(\"#popover\").popover();
             }});
        </script>
        ";
        echo "
        ";
        // line 84
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "default/main_private.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 84,  153 => 83,  149 => 70,  145 => 69,  136 => 65,  132 => 64,  120 => 54,  117 => 53,  112 => 50,  109 => 49,  95 => 37,  92 => 36,  88 => 35,  86 => 34,  72 => 25,  68 => 24,  56 => 15,  52 => 14,  48 => 13,  43 => 11,  39 => 10,  35 => 9,  31 => 8,  27 => 7,  19 => 1,);
    }
}
