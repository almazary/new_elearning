<?php

/* cetak-info-login-siswa.html */
class __TwigTemplate_3bcf7b24ff21d0c283ce5a42e6306b78eb84e2e5c4807719cddffc8e8bece47b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'css' => array($this, 'block_css'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title>Cetak informasi login siswa</title>
    <link type=\"text/css\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link type=\"text/css\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap-responsive.min.css\" rel=\"stylesheet\">
    <link type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "images/icons/css/font-awesome.css\" rel=\"stylesheet\">
    ";
        // line 8
        $this->displayBlock('css', $context, $blocks);
        // line 9
        echo "    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
</head>
<body onload=\"window.print()\">
<div class=\"container\">
    <table width=\"100%\" cellpadding=\"5\">
        <tr>
        ";
        // line 15
        $context["col"] = 3;
        // line 16
        echo "        ";
        $context["l"] = 0;
        // line 17
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["siswas"]) ? $context["siswas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 18
            echo "            ";
            if (((isset($context["l"]) ? $context["l"] : null) >= (isset($context["col"]) ? $context["col"] : null))) {
                // line 19
                echo "                </tr><tr>
                ";
                // line 20
                $context["l"] = 0;
                // line 21
                echo "            ";
            }
            // line 22
            echo "            ";
            $context["l"] = ((isset($context["l"]) ? $context["l"] : null) + 1);
            // line 23
            echo "
            <td>
                <div style=\"border:1px solid gray;padding-bottom:5px;\">
                    <p><center><b>Informasi Login E-learning</b></center></p>
                    <table class=\"table table-condensed table-striped\" style=\"margin-bottom: 5px;\">
                        <tr>
                            <td style=\"width:70px;\">NIS</td>
                            <td>: ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nis"), "html", null, true);
            echo "</td>
                        </tr>
                        <tr>
                            <td valign=\"top\">Nama</td>
                            <td>: ";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nama"), "html", null, true);
            echo "</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td valign=\"top\">: ";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "login"), "username"), "html", null, true);
            echo "</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td valign=\"top\">: ";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "login"), "password"), "html", null, true);
            echo "</td>
                        </tr>
                    </table>
                    <center>";
            // line 45
            echo twig_escape_filter($this->env, base_url(), "html", null, true);
            echo "</center>
                </div>
            </td>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "        </tr>
    </table>
</div>
</body>
</html>";
    }

    // line 8
    public function block_css($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "cetak-info-login-siswa.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 8,  120 => 49,  110 => 45,  104 => 42,  97 => 38,  90 => 34,  83 => 30,  74 => 23,  71 => 22,  68 => 21,  66 => 20,  63 => 19,  60 => 18,  55 => 17,  52 => 16,  50 => 15,  40 => 9,  38 => 8,  34 => 7,  30 => 6,  26 => 5,  20 => 1,);
    }
}
