<?php

/* default/admin_mapel/edit.html */
class __TwigTemplate_35bb815802a5180dd7c8e97f6c0c40a1eabb2b4db23228355d8eabfd1a8cda19 extends Twig_Template
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
        echo form_open(("admin/mapel/edit/" . $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "id")), array("class" => "form-horizontal row-fluid"));
        echo "
    <div class=\"control-group\">
        <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama")), "html", null, true);
        echo "\">
            <br>";
        // line 7
        echo form_error("nama");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Deskripsi</label>
        <div class=\"controls\">
            <textarea name=\"info\" id=\"info\" style=\"height:400px;\">";
        // line 13
        echo set_value("info", $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "info"));
        echo "</textarea>
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Status</label>
        <div class=\"controls\">
            <label class=\"checkbox inline\">
                <input type=\"checkbox\" value=\"1\" name=\"status\" ";
        // line 20
        echo twig_escape_filter($this->env, set_checkbox("status", "1", ((($this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "aktif") == 1)) ? (true) : (false))), "html", null, true);
        echo ">
                Aktif
            </label>
        </div>
    </div>
    <div class=\"control-group\">
        <div class=\"controls\">
            <button type=\"submit\" class=\"btn btn-primary\">Update</button>
            <a href=\"";
        // line 28
        echo twig_escape_filter($this->env, site_url("admin/mapel"), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
        </div>
    </div>
";
        // line 31
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_mapel/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 31,  63 => 28,  52 => 20,  42 => 13,  33 => 7,  29 => 6,  22 => 2,  19 => 1,);
    }
}
