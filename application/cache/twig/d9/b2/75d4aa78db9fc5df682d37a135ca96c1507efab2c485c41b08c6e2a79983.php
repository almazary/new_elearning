<?php

/* reset-password.html */
class __TwigTemplate_d9b275d4aa78db9fc5df682d37a135ca96c1507efab2c485c41b08c6e2a79983 extends Twig_Template
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
        echo "Reset password - ";
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
        echo form_open(("login/reset_password/" . $this->getAttribute((isset($context["login"]) ? $context["login"] : null), "reset_kode")), array("class" => "form-vertical"));
        echo "
            <div class=\"module-head\">
                <h3>Reset password</h3>
            </div>
            <div class=\"module-body\">
               ";
        // line 15
        echo get_flashdata("reset_password");
        echo "
                <b>Username : </b>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["login"]) ? $context["login"] : null), "username"), "html", null, true);
        echo "
                <br><br>
                <div class=\"control-group\">
                    <div class=\"controls row-fluid\">
                        <input class=\"span12\" name=\"password\" type=\"password\" placeholder=\"Masukkan password baru\" autofocus>
                        ";
        // line 21
        echo form_error("password");
        echo "
                    </div>
                </div>
                <div class=\"control-group\">
                    <div class=\"controls row-fluid\">
                        <input class=\"span12\" name=\"password2\" type=\"password\" placeholder=\"Ketik ulang password\">
                        ";
        // line 27
        echo form_error("password2");
        echo "
                    </div>
                </div>
            </div>
            <div class=\"module-foot\">
                <div class=\"control-group\">
                    <div class=\"controls clearfix\">
                        <button type=\"submit\" class=\"btn btn-large btn-primary pull-right\">Reset</button>
                    </div>
                </div>
            </div>
        ";
        // line 38
        echo (isset($context["form_close"]) ? $context["form_close"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "reset-password.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 38,  75 => 27,  66 => 21,  58 => 16,  54 => 15,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
