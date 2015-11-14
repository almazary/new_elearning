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
    <body onload=\"inIframe()\">

        <div id=\"body-content\">
            ";
        // line 18
        $this->displayBlock('content', $context, $blocks);
        // line 19
        echo "        </div>

        <script type=\"text/javascript\">
            var site_url = \"";
        // line 22
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
            var base_url = \"";
        // line 23
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\";
        </script>
        <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/script.js\" type=\"text/javascript\"></script>
        <script type=\"text/javascript\">
            function inIframe ()
            {
                var is_iframe = true;
                try {
                    is_iframe = window.self !== window.top;
                } catch (e) {
                    is_iframe = true;
                }

                if (!is_iframe) {
                    \$(\"#body-content\").html('redirect...');
                    window.location.replace(\"";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["url_referrer"]) ? $context["url_referrer"] : null), "html", null, true);
        echo "\")
                }
            }
        </script>
        ";
        // line 45
        $this->displayBlock('js', $context, $blocks);
        // line 46
        echo "
        ";
        // line 47
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
    }

    // line 11
    public function block_css($context, array $blocks = array())
    {
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
    }

    // line 45
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
        return array (  145 => 45,  140 => 18,  135 => 11,  129 => 6,  121 => 47,  118 => 46,  109 => 41,  93 => 28,  89 => 27,  85 => 26,  81 => 25,  76 => 23,  72 => 22,  67 => 19,  57 => 13,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  30 => 6,  23 => 1,  238 => 96,  229 => 89,  222 => 85,  218 => 84,  209 => 78,  205 => 77,  200 => 76,  194 => 74,  192 => 73,  187 => 70,  185 => 69,  179 => 66,  175 => 65,  166 => 59,  162 => 58,  159 => 57,  146 => 55,  142 => 54,  137 => 51,  124 => 49,  120 => 48,  116 => 45,  113 => 45,  110 => 44,  108 => 43,  99 => 37,  95 => 36,  86 => 30,  82 => 29,  78 => 28,  69 => 22,  65 => 18,  56 => 15,  52 => 12,  43 => 8,  39 => 7,  34 => 7,  31 => 4,  28 => 3,);
    }
}
