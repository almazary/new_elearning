<?php

/* tambah-tugas.html */
class __TwigTemplate_c07efe96fd1e578c221050301ff0d9cd3391180bc53f4a1a8f6dcf55401a8771 extends Twig_Template
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
        echo "Tambah Tugas ";
        echo twig_escape_filter($this->env, (isset($context["type_label"]) ? $context["type_label"] : null), "html", null, true);
        echo " - ";
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
        echo " / Tambah Tugas ";
        echo twig_escape_filter($this->env, (isset($context["type_label"]) ? $context["type_label"] : null), "html", null, true);
        echo "</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("tugas");
        echo "

        ";
        // line 15
        echo form_open_multipart(("plugins/custom_tugas/add/" . (isset($context["type"]) ? $context["type"] : null)), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Judul <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"judul\" class=\"span12\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, set_value("judul"), "html", null, true);
        echo "\">
                    <br>";
        // line 20
        echo form_error("judul");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Matapelajaran <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <select name=\"mapel_id\">
                        <option value=\"\">--pilih--</option>
                        ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 29
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("mapel_id", $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "                    </select>
                    <br>";
        // line 32
        echo form_error("mapel_id");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Kelas <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                        ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 40
            echo "                        <li>
                            <label class=\"checkbox inline\">
                                <input type=\"checkbox\" name=\"kelas_id[]\" value=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_checkbox("kelas_id[]", $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id")), "html", null, true);
            echo "> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "
                            </label>
                        </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                    </ul>
                    ";
        // line 47
        echo form_error("kelas_id[]");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Info</label>
                <div class=\"controls\">
                    <textarea name=\"info\" id=\"info\" style=\"width:100%; height:300px;\">";
        // line 53
        echo set_value("info");
        echo "</textarea>
                    ";
        // line 54
        echo form_error("info");
        echo "
                </div>
            </div>
            ";
        // line 57
        if (((isset($context["type"]) ? $context["type"] : null) != 1)) {
            // line 58
            echo "            <div class=\"control-group\">
                <label class=\"control-label\">Maksimal jumlah soal</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"max_jml_soal\" class=\"span2\" value=\"";
            // line 61
            echo twig_escape_filter($this->env, set_value("max_jml_soal"), "html", null, true);
            echo "\">
                    <br><span class=\"text-warning\">*) jika maksimal jumlah soal diatur 10 dan soal diinputkan 20, maka hanya akan diambil 10 dari 20 soal</span>
                    <br>";
            // line 63
            echo form_error("max_jml_soal");
            echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Model urutan soal</label>
                <div class=\"controls\">
                    <label class=\"radio inline\"><input type=\"radio\" name=\"model_urutan_soal\" value=\"1\" ";
            // line 69
            echo twig_escape_filter($this->env, set_radio("model_urutan_soal", "1", true), "html", null, true);
            echo "> Acak</label>
                    <label class=\"radio inline\"><input type=\"radio\" name=\"model_urutan_soal\" value=\"2\" ";
            // line 70
            echo twig_escape_filter($this->env, set_radio("model_urutan_soal", "2"), "html", null, true);
            echo "> Berurutan</label>
                    <br>";
            // line 71
            echo form_error("model_urutan_soal");
            echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Tampil soal perhalaman</label>
                <div class=\"controls\">
                    <label class=\"radio inline\"><input type=\"radio\" name=\"tampil_soal_perhalaman\" value=\"0\" ";
            // line 77
            echo twig_escape_filter($this->env, set_radio("tampil_soal_perhalaman", "0", true), "html", null, true);
            echo "> Semua</label>
                    <label class=\"radio inline\"><input type=\"radio\" name=\"tampil_soal_perhalaman\" value=\"1\" ";
            // line 78
            echo twig_escape_filter($this->env, set_radio("tampil_soal_perhalaman", "1"), "html", null, true);
            echo "> 1</label>
                    <label class=\"radio inline\"><input type=\"radio\" name=\"tampil_soal_perhalaman\" value=\"5\" ";
            // line 79
            echo twig_escape_filter($this->env, set_radio("tampil_soal_perhalaman", "5"), "html", null, true);
            echo "> 5</label>
                    <label class=\"radio inline\"><input type=\"radio\" name=\"tampil_soal_perhalaman\" value=\"10\" ";
            // line 80
            echo twig_escape_filter($this->env, set_radio("tampil_soal_perhalaman", "10"), "html", null, true);
            echo "> 10</label>
                    <br>";
            // line 81
            echo form_error("tampil_soal_perhalaman");
            echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Durasi <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"durasi\" class=\"span2\" value=\"";
            // line 87
            echo twig_escape_filter($this->env, set_value("durasi"), "html", null, true);
            echo "\" placeholder=\"Dalam menit\">
                    <br>";
            // line 88
            echo form_error("durasi");
            echo "
                </div>
            </div>
            ";
        }
        // line 92
        echo "            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                    <a href=\"";
        // line 95
        echo twig_escape_filter($this->env, site_url("tugas"), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
                </div>
            </div>
        ";
        // line 98
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "tambah-tugas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 98,  236 => 95,  231 => 92,  224 => 88,  220 => 87,  211 => 81,  207 => 80,  203 => 79,  199 => 78,  195 => 77,  186 => 71,  182 => 70,  178 => 69,  169 => 63,  164 => 61,  159 => 58,  157 => 57,  151 => 54,  147 => 53,  138 => 47,  135 => 46,  121 => 42,  117 => 40,  113 => 39,  103 => 32,  100 => 31,  87 => 29,  83 => 28,  72 => 20,  68 => 19,  61 => 15,  56 => 13,  48 => 10,  44 => 8,  41 => 7,  32 => 4,  29 => 3,);
    }
}
