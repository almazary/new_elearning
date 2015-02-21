<?php

/* default/admin_akun/ch_pass.html */
class __TwigTemplate_e40730113961a5372f2d17a042db47cb454184d85a07ebfb2f6b7879d56ec678 extends Twig_Template
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
        echo "
";
        // line 2
        echo form_open("admin/ch_pass", array("class" => "form-horizontal row-fluid"));
        echo "
    <div class=\"control-group\">
        <label class=\"control-label\">Password Baru <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"password\" name=\"password\" class=\"span5\">
            <br>";
        // line 7
        echo form_error("password");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Confirm Password <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"password\" name=\"password2\" class=\"span5\">
            <br>";
        // line 14
        echo form_error("password2");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <div class=\"controls\">
            <button type=\"submit\" class=\"btn btn-primary\">Update</button>
        </div>
    </div>
";
        // line 22
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_akun/ch_pass.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 22,  40 => 14,  30 => 7,  22 => 2,  19 => 1,);
    }
}
