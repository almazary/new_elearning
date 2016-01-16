<?php

/* import-excel-bank.html */
class __TwigTemplate_cf0f0608d6c281a567288b78fd2009b1f3a69392f5a2f60071370b44355648d6 extends Twig_Template
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
        echo "Import bank soal - ";
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
        echo anchor("plugins/bank_soal", "Bank Soal");
        echo " / Import Excel</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("bank");
        echo "

        <p>
            <b>Contoh format excel untuk soal pilihan ganda:</b><br>
            <img src=\"";
        // line 17
        echo twig_escape_filter($this->env, base_url_plugins("src/bank_soal/img/import-excel.PNG"), "html", null, true);
        echo "\" class=\"img img-polaroid\">
        </p>
        <p>
            <b>Contoh format excel untuk soal essay:</b><br>
            <img src=\"";
        // line 21
        echo twig_escape_filter($this->env, base_url_plugins("src/bank_soal/img/import-excel-essay.PNG"), "html", null, true);
        echo "\" class=\"img img-polaroid\">
        </p>
        <br>

        ";
        // line 25
        echo form_open_multipart("plugins/bank_soal/import_excel", array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Matapelajaran <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <select name=\"mapel_id\">
                        <option value=\"\">--pilih--</option>
                        ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 32
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("mapel_id", $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "mapel_id") == $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"))) ? (true) : (""))), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "                    </select>
                    <br>";
        // line 35
        echo form_error("mapel_id");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">File (xls) <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"file\" name=\"userfile\">
                    <br>";
        // line 42
        echo (isset($context["upload_error"]) ? $context["upload_error"] : null);
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Import</button>
                    <a href=\"";
        // line 48
        echo twig_escape_filter($this->env, site_url("plugins/bank_soal"), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
                </div>
            </div>
        ";
        // line 51
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "import-excel-bank.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 51,  123 => 48,  114 => 42,  104 => 35,  101 => 34,  88 => 32,  84 => 31,  75 => 25,  68 => 21,  61 => 17,  54 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
