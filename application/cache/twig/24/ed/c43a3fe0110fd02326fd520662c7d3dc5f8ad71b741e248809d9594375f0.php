<?php

/* default/admin_kelas/edit.html */
class __TwigTemplate_24edc43a3fe0110fd02326fd520662c7d3dc5f8ad71b741e248809d9594375f0 extends Twig_Template
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
<div class=\"panel panel-info\">
    <div class=\"panel-heading\">
        Edit Kelas
    </div>
    <div class=\"panel-body\">
        ";
        // line 7
        echo form_open(("admin/kelas/edit/" . $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "id")), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Nama Kelas <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama\" class=\"span5\" placeholder=\"Nama Kelas\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama")), "html", null, true);
        echo "\">
                    ";
        // line 12
        echo form_error("nama");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Status</label>
                <div class=\"controls\">
                    <label class=\"checkbox inline\">
                        <input type=\"checkbox\" value=\"1\" name=\"status\" ";
        // line 19
        echo twig_escape_filter($this->env, set_checkbox("status", "1", ((($this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "aktif") == 1)) ? (true) : (false))), "html", null, true);
        echo ">
                        Aktif
                    </label>
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                    <a href=\"";
        // line 27
        echo twig_escape_filter($this->env, site_url("admin/kelas"), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
                </div>
            </div>
        ";
        // line 30
        echo form_close();
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "default/admin_kelas/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 30,  59 => 27,  48 => 19,  38 => 12,  34 => 11,  27 => 7,  19 => 1,);
    }
}
