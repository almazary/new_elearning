<?php

/* default/main_iframe.html */
class __TwigTemplate_70e2cf9969e13890c2ebe8c24dce35fcc686f9057a9e852840dfd977e9dc0f5a extends Twig_Template
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

        ";
        // line 19
        $template = $this->env->resolveTemplate((isset($context["content_file"]) ? $context["content_file"] : null));
        $template->display($context);
        // line 20
        echo "
        <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        ";
        // line 34
        echo "
        <script type=\"text/javascript\">
            \$(document).ready(function(){{
                \$(\".alert-success\").fadeTo(2000, 500).slideUp(500, function(){{
                    \$(\".alert-success\").alert('close');
                 }});
                \$(\".alert-warning\").fadeTo(2000, 500).slideUp(500, function(){{
                    \$(\".alert-warning\").alert('close');
                 }});
             }});
        </script>
        ";
        echo "
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "default/main_iframe.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 34,  73 => 22,  69 => 21,  66 => 20,  63 => 19,  56 => 15,  52 => 14,  48 => 13,  43 => 11,  39 => 10,  35 => 9,  31 => 8,  27 => 7,  19 => 1,);
    }
}
