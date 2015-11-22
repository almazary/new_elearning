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
        <script type=\"text/javascript\" src=\"//cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML\"></script>
        ";
        // line 12
        $this->displayBlock('css', $context, $blocks);
        // line 13
        echo "        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
        ";
        // line 14
        echo (isset($context["comp_css"]) ? $context["comp_css"] : null);
        echo "
    </head>
    <body onload=\"inIframe()\">

        <div id=\"body-content\">
            ";
        // line 19
        $this->displayBlock('content', $context, $blocks);
        // line 20
        echo "        </div>

        <script type=\"text/javascript\">
            var site_url = \"";
        // line 23
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
            var base_url = \"";
        // line 24
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\";
        </script>
        <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 29
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
        // line 42
        echo twig_escape_filter($this->env, (isset($context["url_referrer"]) ? $context["url_referrer"] : null), "html", null, true);
        echo "\")
                }
            }
        </script>
        ";
        // line 46
        $this->displayBlock('js', $context, $blocks);
        // line 47
        echo "
        ";
        // line 48
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

    // line 12
    public function block_css($context, array $blocks = array())
    {
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
    }

    // line 46
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
        return array (  146 => 46,  141 => 19,  136 => 12,  130 => 6,  122 => 48,  119 => 47,  117 => 46,  110 => 42,  90 => 28,  86 => 27,  77 => 24,  73 => 23,  68 => 20,  66 => 19,  58 => 14,  53 => 13,  38 => 8,  34 => 7,  30 => 6,  23 => 1,  97 => 32,  94 => 29,  88 => 28,  82 => 26,  78 => 24,  74 => 23,  69 => 21,  63 => 18,  57 => 15,  51 => 12,  46 => 10,  42 => 9,  35 => 5,  32 => 4,  29 => 3,);
    }
}
