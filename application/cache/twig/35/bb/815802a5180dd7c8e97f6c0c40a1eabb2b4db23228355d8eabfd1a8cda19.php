<?php

/* admin_mapel/edit.html */
class __TwigTemplate_35bb815802a5180dd7c8e97f6c0c40a1eabb2b4db23228355d8eabfd1a8cda19 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-private.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 6
        echo (isset($context["module_title"]) ? $context["module_title"] : null);
        echo "</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 9
        echo get_flashdata("mapel");
        echo "

        ";
        // line 11
        echo form_open(("admin/mapel/edit/" . $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "id")), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama")), "html", null, true);
        echo "\">
                    <br>";
        // line 16
        echo form_error("nama");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Deskripsi</label>
                <div class=\"controls\">
                    <textarea name=\"info\" id=\"info\" style=\"height:400px;\">";
        // line 22
        echo set_value("info", $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "info"));
        echo "</textarea>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Status</label>
                <div class=\"controls\">
                    <label class=\"checkbox inline\">
                        <input type=\"checkbox\" value=\"1\" name=\"status\" ";
        // line 29
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
        // line 37
        echo twig_escape_filter($this->env, site_url("admin/mapel"), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
                </div>
            </div>
        ";
        // line 40
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_mapel/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 40,  87 => 37,  76 => 29,  66 => 22,  57 => 16,  53 => 15,  46 => 11,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
