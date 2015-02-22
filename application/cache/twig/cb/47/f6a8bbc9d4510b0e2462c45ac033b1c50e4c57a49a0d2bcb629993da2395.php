<?php

/* admin_tugas/list.html */
class __TwigTemplate_cb47f6a8bbc9d4510b0e2462c45ac033b1c50e4c57a49a0d2bcb629993da2395 extends Twig_Template
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
        echo get_flashdata("tugas");
        echo "

        <div class=\"row-fluid\">
            <div class=\"span8\">
                <button class=\"btn btn-primary\" id=\"popover\" data-html=\"true\" data-title=\"Cara Tambah Tugas\" data-content=\"Masuk ke detail profil <b>Pengajar</b>. Tugas dapat diatur pada <b>Matapelajaran</b> yang diajar.<br>
                <br>";
        // line 14
        echo twig_escape_filter($this->env, anchor("admin/pengajar/filter", "Cari Pengajar", array("class" => "btn btn-small btn-primary")), "html", null, true);
        echo "\" data-toggle=\"popover\">Tambah Tugas</button>
            </div>

            <div class=\"span4\">
                <div class=\"btn-group\">
                    ";
        // line 19
        echo anchor("admin/tugas/list/0", "Semua", array("class" => ((((isset($context["type_id"]) ? $context["type_id"] : null) == 0)) ? ("btn btn-info") : ("btn"))));
        echo "
                    ";
        // line 20
        echo anchor("admin/tugas/list/1", "Upload", array("class" => ((((isset($context["type_id"]) ? $context["type_id"] : null) == 1)) ? ("btn btn-info") : ("btn"))));
        echo "
                    ";
        // line 21
        echo anchor("admin/tugas/list/2", "Essay", array("class" => ((((isset($context["type_id"]) ? $context["type_id"] : null) == 2)) ? ("btn btn-info") : ("btn"))));
        echo "
                    ";
        // line 22
        echo anchor("admin/tugas/list/3", "Ganda", array("class" => ((((isset($context["type_id"]) ? $context["type_id"] : null) == 3)) ? ("btn btn-info") : ("btn"))));
        echo "
                </div>
            </div>
        </div>

        <br>
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"7%\">No</th>
                    <th>Kelas</th>
                    <th>Judul</th>
                    <th>Waktu</th>
                    <th width=\"22%\"></th>
                </tr>
            </thead>

        </table>

        <br>
        ";
        // line 42
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_tugas/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 42,  69 => 22,  65 => 21,  61 => 20,  57 => 19,  49 => 14,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
