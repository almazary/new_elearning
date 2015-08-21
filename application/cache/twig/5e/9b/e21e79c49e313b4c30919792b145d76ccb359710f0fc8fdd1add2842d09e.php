<?php

/* admin_kelas/add.html */
class __TwigTemplate_5e9be21e79c49e313b4c30919792b145d76ccb359710f0fc8fdd1add2842d09e extends Twig_Template
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
        echo get_flashdata("kelas");
        echo "

        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                Tambah Kelas
            </div>
            <div class=\"panel-body\">
                ";
        // line 16
        echo form_open("admin/kelas", array("class" => "form-horizontal row-fluid"));
        echo "
                    <div class=\"control-group\">
                        <label class=\"control-label\">Nama Kelas <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"nama\" class=\"span5\" placeholder=\"Nama Kelas\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
        echo "\">
                            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                            ";
        // line 22
        echo form_error("nama");
        echo "
                        </div>
                    </div>
                ";
        // line 25
        echo form_close();
        echo "
            </div>
        </div>

        <p><b>Note:</b> Kelas tidak dapat di hapus namun dapat di ubah menjadi tidak aktif</p>

        ";
        // line 31
        echo (isset($context["kelas_hirarki"]) ? $context["kelas_hirarki"] : null);
        echo "

        <br>
        <div id=\"response_update\"></div>
        <button class=\"btn btn-primary\" id=\"update-hirarki\">Update Hirarki</button>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_kelas/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 31,  69 => 25,  63 => 22,  58 => 20,  51 => 16,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
