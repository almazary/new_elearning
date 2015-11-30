<?php

/* bank-soal.html */
class __TwigTemplate_f40338cd09d623bf5601318813bc20195eeb5d6de96617601b9e2e5175a5b7d6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
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
        echo "Tugas - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<style type=\"text/css\">
    .box-area-pertanyaan {
        padding: 15px;
        background-color: #F6F6F6;
        border-radius: 3px;
    }
    .box-pilihan {
        padding: 5px 15px;
        background-color: #fafafa;
        border-radius: 3px;
    }
</style>
";
    }

    // line 22
    public function block_content($context, array $blocks = array())
    {
        // line 23
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 25
        echo anchor("tugas", "Tugas");
        echo " / Bank Soal</h3>
    </div>
    <div class=\"module-body\">
        <form class=\"form-search pull-right\" method=\"get\" action=\"";
        // line 28
        echo twig_escape_filter($this->env, site_url((("tugas/bank_soal/" . (isset($context["page_no"]) ? $context["page_no"] : null)) . "/")), "html", null, true);
        echo "\">
            <div class=\"input-append\">
                <input type=\"text\" class=\"span3 search-query\" placeholder=\"cari soal...\" name=\"q\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["keyword"]) ? $context["keyword"] : null), "html", null, true);
        echo "\">
                <button type=\"submit\" class=\"btn btn-primary\"><i class=\"icon-search\"></i></button>
            </div>
        </form>

        <div class=\"btn-group\">
            <a href=\"javascript:void(0)\" class=\"btn btn-primary btn-tambah-pertanyaan\">Tambah Soal Ganda</a>
            <a href=\"javascript:void(0)\" class=\"btn btn-primary btn-tambah-pertanyaan-essay\">Tambah Soal Essay</a>
            ";
        // line 38
        echo anchor("tugas/add/1", "Ambil Soal Tugas", array("class" => "btn btn-primary btn-copy-pertanyaan"));
        echo "
        </div>

        ";
        // line 41
        echo get_flashdata("bank");
        echo "

        <br><br>
        ";
        // line 44
        echo form_open("tugas/bank_soal/simpan", array("id" => "form-tambah-pertanyaan"));
        echo "
            <div class=\"box-new-soal\"></div>
        ";
        // line 46
        echo form_close();
        echo "

        <table class=\"table\">
            <thead>
                <tr>
                    <th width=\"7%\">ID</th>
                    <th>Pertanyaan</th>
                    <th width=\"10%\"></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        ";
        // line 61
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "bank-soal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 61,  105 => 46,  100 => 44,  94 => 41,  88 => 38,  77 => 30,  72 => 28,  66 => 25,  62 => 23,  59 => 22,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
