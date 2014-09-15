<?php

/* default/admin_login.html */
class __TwigTemplate_c0be9a28ce64ecee50d6b8eccb518441e0ed775439c6bce142b09b7e896bab8a extends Twig_Template
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
        echo "<div class=\"row\">
    <div class=\"module span4 offset4\">
        ";
        // line 3
        echo (isset($context["form_open"]) ? $context["form_open"] : null);
        echo "
            <div class=\"module-head\">
                <h3>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["web_title"]) ? $context["web_title"] : null), "html", null, true);
        echo "</h3>
            </div>
            <div class=\"module-body\">
               ";
        // line 8
        echo get_flashdata("login");
        echo "
                <div class=\"control-group\">
                    <div class=\"controls row-fluid\">
                        <input class=\"span12\" name=\"email\" type=\"text\" placeholder=\"Username (Email)\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, set_value("email"), "html", null, true);
        echo "\">
                        ";
        // line 12
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
        // line 29
        echo (isset($context["form_close"]) ? $context["form_close"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "default/admin_login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 29,  44 => 12,  40 => 11,  34 => 8,  28 => 5,  23 => 3,  19 => 1,);
    }
}
