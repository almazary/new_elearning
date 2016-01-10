<?php

/* import-ecxel-siswa.html */
class __TwigTemplate_f4441ed3de9018f250eea29aa4d1b223b5fa1214c3d9f221d006372f29acb648 extends Twig_Template
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
        echo "Import Excel Siswa - ";
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
        echo anchor("siswa", "Data Siswa");
        echo " / Import Excel</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("siswa");
        echo "

        <b>Contoh format data excel :</b>
        <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, base_url_plugins("src/import_export_siswa/img/contoh-inport-excel-siswa.PNG"), "html", null, true);
        echo "\" class=\"img img-polaroid\">
        <p>Data siswa mulai terbaca mulai baris kedua, baris pertama digunakan untuk judul.</p>
        Format field :
        <ul>
            <li><b>Jenis kelamin</b> : L (laki-laki) dan P (Perempuan)</li>
            <li><b>Tgl Lahir</b> : Tanggal/Bulan/Tahun</li>
            <li><b>Agama</b> : Islam, Kristen, Katolik, Hindu, Budha</li>
        </ul>

        ";
        // line 25
        echo form_open_multipart("plugins/import_export_siswa/import_excel", array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Kelas <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <select name=\"kelas_id\">
                        <option value=\"\">--pilih--</option>
                        ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 32
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("kelas_id", $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id")), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "                    </select>
                    <br>";
        // line 35
        echo form_error("kelas_id");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Domain username <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" id=\"default_username\" name=\"default_username\" class=\"span4\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, set_value("default_username", "sekolah.sch.id"), "html", null, true);
        echo "\">
                    <div>Berfungsi untuk membuat username untuk siswa berdasarkan NIS, misalkan NIS siswa 123 dan domain username adalah sekolah.sch.id, maka username untuk siswa tersebut adalah 123@sekolah.sch.id</div>
                    ";
        // line 43
        echo form_error("default_username");
        echo "
                    ";
        // line 44
        echo (isset($context["error_domain"]) ? $context["error_domain"] : null);
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Default password</label>
                <div class=\"controls\">
                    <p style=\"margin-top: 5px;\">Jika kosong, password akan diambil dari NIS siswa</p>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">File Excel (xls) <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"file\" name=\"userfile\">
                    ";
        // line 57
        echo (isset($context["error_upload"]) ? $context["error_upload"] : null);
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Import</button>
                    <a class=\"btn btn-default\" href=\"";
        // line 63
        echo twig_escape_filter($this->env, site_url("siswa"), "html", null, true);
        echo "\">Kembali</a>
                </div>
            </div>
        ";
        // line 66
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "import-ecxel-siswa.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 66,  142 => 63,  133 => 57,  117 => 44,  113 => 43,  108 => 41,  99 => 35,  96 => 34,  83 => 32,  79 => 31,  70 => 25,  58 => 16,  52 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
