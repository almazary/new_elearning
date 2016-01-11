<?php

/* import-excel-soal-tugas.html */
class __TwigTemplate_6c1e2380feb80b4b3192fca116b17294977aa2d1dfd5084ef3a9c1f56b013c63 extends Twig_Template
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
        echo "Import soal - ";
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
        <h3>";
        // line 10
        echo anchor("tugas", "Tugas");
        echo " / ";
        echo anchor(("tugas/manajemen_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")), "Manajemen Soal Tugas");
        echo " / Import Excel</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("bank");
        echo "

        ";
        // line 15
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
            // line 16
            echo "        <p>
            <b>Contoh format excel untuk soal pilihan ganda:</b><br>
            <img src=\"";
            // line 18
            echo twig_escape_filter($this->env, base_url_plugins("src/bank_soal/img/import-excel.PNG"), "html", null, true);
            echo "\" class=\"img img-polaroid\">
        </p>
        ";
        } elseif (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 2)) {
            // line 21
            echo "        <p>
            <b>Contoh format excel untuk soal essay:</b><br>
            <img src=\"";
            // line 23
            echo twig_escape_filter($this->env, base_url_plugins("src/bank_soal/img/import-excel-essay.PNG"), "html", null, true);
            echo "\" class=\"img img-polaroid\">
        </p>
        ";
        }
        // line 26
        echo "        <br>

        ";
        // line 28
        echo form_open_multipart(("plugins/bank_soal/import_excel_soal_tugas/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">File (xls) <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"file\" name=\"userfile\">
                    <br>";
        // line 33
        echo (isset($context["upload_error"]) ? $context["upload_error"] : null);
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Import</button>
                    <a href=\"";
        // line 39
        echo twig_escape_filter($this->env, site_url(("tugas/manajemen_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
                </div>
            </div>
        ";
        // line 42
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "import-excel-soal-tugas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 42,  102 => 39,  93 => 33,  85 => 28,  81 => 26,  75 => 23,  71 => 21,  65 => 18,  61 => 16,  59 => 15,  54 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
