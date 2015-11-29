<?php

/* login.html */
class __TwigTemplate_c75ceef9aa7bfae7e5cc9b05d66f92e31f6a48ce6d3a2309af6693d720333a94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-public.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-public.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Login - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
    ";
        // line 9
        if ((!twig_test_empty((isset($context["sliders"]) ? $context["sliders"] : null)))) {
            // line 10
            echo "    <div class=\"span5 offset1\">
        <div class=\"slider-wrapper theme-light\">
            <div id=\"slider-login\" class=\"nivoSlider\">
                ";
            // line 13
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sliders"]) ? $context["sliders"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 14
                echo "                <img src=\"";
                echo twig_escape_filter($this->env, get_url_image($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "value")), "html", null, true);
                echo "\" data-thumb=\"";
                echo twig_escape_filter($this->env, get_url_image($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "value")), "html", null, true);
                echo "\" title=\"#html";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id"), "html", null, true);
                echo "\">
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "            </div>
            ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sliders"]) ? $context["sliders"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 18
                echo "            <div id=\"html";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id"), "html", null, true);
                echo "\" class=\"nivo-html-caption\">
                ";
                // line 19
                echo $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "title");
                echo "
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "        </div>
    </div>
    ";
        }
        // line 25
        echo "
    <div class=\"module span4 ";
        // line 26
        echo ((twig_test_empty((isset($context["sliders"]) ? $context["sliders"] : null))) ? ("offset4") : (""));
        echo "\">
        ";
        // line 27
        echo form_open("login", array("autocomplete" => "off", "class" => "form-vertical"));
        echo "
            <div class=\"module-head\">
                <h3>Login E-learning</h3>
            </div>
            <div class=\"module-body\">
               ";
        // line 32
        echo get_flashdata("login");
        echo "
                <div class=\"control-group\">
                    <div class=\"controls row-fluid\">
                        <input class=\"span12\" name=\"email\" type=\"text\" placeholder=\"Username (Email)\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, set_value("email"), "html", null, true);
        echo "\" autofocus>
                        ";
        // line 36
        echo form_error("email");
        echo "
                    </div>
                </div>
                <div class=\"control-group\">
                    <div class=\"controls row-fluid\">
                        <input class=\"span12\" name=\"password\" type=\"password\" placeholder=\"Password\">
                    </div>
                </div>
            </div>
            <div class=\"module-foot\">
                <div class=\"control-group\">
                    <div class=\"controls clearfix\">
                        <button type=\"submit\" class=\"btn btn-large btn-primary pull-right\">Login</button>
                        <a href=\"";
        // line 49
        echo twig_escape_filter($this->env, site_url("login/lupa_password"), "html", null, true);
        echo "\">Lupa password?</a>
                    </div>
                </div>
            </div>
        ";
        // line 53
        echo form_close();
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 53,  136 => 49,  120 => 36,  116 => 35,  110 => 32,  102 => 27,  98 => 26,  95 => 25,  90 => 22,  81 => 19,  76 => 18,  72 => 17,  69 => 16,  56 => 14,  52 => 13,  47 => 10,  45 => 9,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
