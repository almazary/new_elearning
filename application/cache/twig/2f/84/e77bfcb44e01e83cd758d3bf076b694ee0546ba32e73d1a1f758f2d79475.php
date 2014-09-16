<?php

/* default/admin_mapel/add.html */
class __TwigTemplate_2f84e77bfcb44e01e83cd758d3bf076b694ee0546ba32e73d1a1f758f2d79475 extends Twig_Template
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
        // line 3
        echo form_open("admin/mapel/add", array("class" => "form-horizontal row-fluid"));
        echo "
    <div class=\"control-group\">
        <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
        echo "\">
            <br>";
        // line 8
        echo form_error("nama");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Deskripsi</label>
        <div class=\"controls\">
            <textarea name=\"info\" id=\"info\" style=\"height:400px;\">";
        // line 14
        echo set_value("info");
        echo "</textarea>
        </div>
    </div>
    <div class=\"control-group\">
        <div class=\"controls\">
            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
            <a href=\"";
        // line 20
        echo twig_escape_filter($this->env, site_url("admin/mapel"), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
        </div>
    </div>
";
        // line 23
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_mapel/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 23,  52 => 20,  43 => 14,  34 => 8,  30 => 7,  23 => 3,  19 => 1,);
    }
}
