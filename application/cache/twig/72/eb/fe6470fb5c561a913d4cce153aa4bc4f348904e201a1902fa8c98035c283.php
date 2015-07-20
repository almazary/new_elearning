<?php

/* list-kelas.html */
class __TwigTemplate_72ebfe6470fb5c561a913d4cce153aa4bc4f348904e201a1902fa8c98035c283 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Manajemen Kelas - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Manajemen Kelas</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("kelas");
        echo "

        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                Tambah Kelas
            </div>
            <div class=\"panel-body\">
                ";
        // line 20
        echo form_open("kelas", array("class" => "form-horizontal row-fluid"));
        echo "
                    <div class=\"control-group\">
                        <label class=\"control-label\">Nama Kelas <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"nama\" class=\"span5\" placeholder=\"Nama Kelas\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
        echo "\">
                            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                            ";
        // line 26
        echo form_error("nama");
        echo "
                        </div>
                    </div>
                ";
        // line 29
        echo form_close();
        echo "
            </div>
        </div>

        <p><b>Note:</b> Kelas tidak dapat di hapus namun dapat di ubah menjadi tidak aktif</p>

        ";
        // line 35
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
        return "list-kelas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 35,  77 => 29,  71 => 26,  66 => 24,  59 => 20,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
