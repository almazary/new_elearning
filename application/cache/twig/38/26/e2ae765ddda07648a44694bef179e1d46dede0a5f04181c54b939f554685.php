<?php

/* lupa-password.html */
class __TwigTemplate_3826e2ae765ddda07648a44694bef179e1d46dede0a5f04181c54b939f554685 extends Twig_Template
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
        echo "Lupa password - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
    <div class=\"module span4 offset4\">
        ";
        // line 10
        echo form_open("login/lupa_password", array("class" => "form-vertical"));
        echo "
            <div class=\"module-head\">
                <h3>Lupa password</h3>
            </div>
            <div class=\"module-body\">
               ";
        // line 15
        echo get_flashdata("lupa_password");
        echo "
                <div class=\"control-group\">
                    <div class=\"controls row-fluid\">
                        <input class=\"span12\" name=\"email\" type=\"text\" placeholder=\"Masukkan username (Email)\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, set_value("email"), "html", null, true);
        echo "\" autofocus>
                        ";
        // line 19
        echo form_error("email");
        echo "
                    </div>
                </div>
            </div>
            <div class=\"module-foot\">
                <div class=\"control-group\">
                    <div class=\"controls clearfix\">
                        <button type=\"submit\" class=\"btn btn-large btn-primary pull-right\">Kirim</button>
                    </div>
                </div>
            </div>
        ";
        // line 30
        echo (isset($context["form_close"]) ? $context["form_close"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "lupa-password.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 30,  64 => 19,  60 => 18,  54 => 15,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
