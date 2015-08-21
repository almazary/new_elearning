<?php

/* admin-login.html */
class __TwigTemplate_08d2bd3139e4af9d96e4abb0503ea5c236394afce66fbb1c3edc1ddf72c21b5b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-public.html");

        $this->blocks = array(
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"row\">
    <div class=\"module span4 offset4\">
        ";
        // line 6
        echo (isset($context["form_open"]) ? $context["form_open"] : null);
        echo "
            <div class=\"module-head\">
                <h3>";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["web_title"]) ? $context["web_title"] : null), "html", null, true);
        echo "</h3>
            </div>
            <div class=\"module-body\">
               ";
        // line 11
        echo get_flashdata("login");
        echo "
                <div class=\"control-group\">
                    <div class=\"controls row-fluid\">
                        <input class=\"span12\" name=\"email\" type=\"text\" placeholder=\"Username (Email)\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, set_value("email"), "html", null, true);
        echo "\">
                        ";
        // line 15
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
                    </div>
                </div>
            </div>
        ";
        // line 32
        echo (isset($context["form_close"]) ? $context["form_close"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin-login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 32,  56 => 15,  52 => 14,  46 => 11,  40 => 8,  35 => 6,  31 => 4,  28 => 3,);
    }
}
