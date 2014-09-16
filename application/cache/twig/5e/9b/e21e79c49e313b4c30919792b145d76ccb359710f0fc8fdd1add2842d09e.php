<?php

/* default/admin_kelas/add.html */
class __TwigTemplate_5e9be21e79c49e313b4c30919792b145d76ccb359710f0fc8fdd1add2842d09e extends Twig_Template
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

<div class=\"panel panel-default\">
    <div class=\"panel-heading\">
        Tambah Kelas
    </div>
    <div class=\"panel-body\">
        ";
        // line 8
        echo form_open("admin/kelas", array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Nama Kelas <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama\" class=\"span5\" placeholder=\"Nama Kelas\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
        echo "\">
                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                    ";
        // line 14
        echo form_error("nama");
        echo "
                </div>
            </div>
        ";
        // line 17
        echo form_close();
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "default/admin_kelas/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 17,  40 => 14,  35 => 12,  28 => 8,  78 => 45,  44 => 14,  39 => 11,  36 => 10,  31 => 8,  25 => 5,  19 => 1,);
    }
}
