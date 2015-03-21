<?php

/* admin_tugas/edit_soal.html */
class __TwigTemplate_36d5f0ce35c95de7c64068c36a366b5a7160a91965e87c58dfa584e3e7f19e80 extends Twig_Template
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

        <div>
            ";
        // line 12
        echo form_open(((((("admin/tugas/edit_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id")));
        echo "
            <input type=\"hidden\" name=\"jumlah_pilihan\" value=\"4\">
            <table class=\"table table-bordered table-hover\">
                <thead>
                    <tr>
                        <th>
                            <div class=\"bs-callout bs-callout-info\">
                                <div class=\"btn-group pull-right\">
                                    <a class=\"btn btn-default\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, site_url(((("admin/tugas/edit/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\"><i class=\"icon-edit\"></i> Edit Tugas</a>
                                    <a class=\"btn btn-default\"><i class=\"icon-ok\"></i> Terbitkan Tugas</a>
                                </div>
                                <h2 class=\"title-info\" data-toggle=\"collapse\" data-target=\"#demo\">";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul"), "html", null, true);
        echo "</h2>
                                <div id=\"demo\" class=\"collapse\">
                                <label class=\"label label-warning\">Tipe : ";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type"), "html", null, true);
        echo "</label>
                                <label class=\"label label-info\">Durasi : ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "durasi"), "html", null, true);
        echo " Menit</label>
                                <table class=\"table table-condensed table-striped\">
                                    <thead>
                                        <tr>
                                            <th>Pengajar</th>
                                            <th>Matapelajaran</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "link_profil"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama"), "html", null, true);
        echo "</a></td>
                                            <td>";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo "</td>
                                            <td>";
        // line 41
        echo twig_escape_filter($this->env, get_indo_hari($this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "hari_id")), "html", null, true);
        echo "</td>
                                            <td>";
        // line 42
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_mulai"), "H:i"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_selesai"), "H:i"), "html", null, true);
        echo "</td>
                                            <td>";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama"), "html", null, true);
        echo " <span class=\"badge badge-info\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "jumlah_siswa"), "html", null, true);
        echo " siswa</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class=\"info\">
                        <td>
                            <ul class=\"unstyled inline\">
                                ";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["retrieve_all_pertanyaan"]) ? $context["retrieve_all_pertanyaan"] : null), "results"));
        foreach ($context['_seq'] as $context["s_key"] => $context["s"]) {
            // line 57
            echo "                                <li>
                                    ";
            // line 58
            echo anchor(((((("admin/tugas/edit_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id")), (((isset($context["s_key"]) ? $context["s_key"] : null) . ". ") . get_abjad($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "kunci_index"))), array("class" => "badge badge-info", "data-toggle" => "tooltip", "title" => strip_tags($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "pertanyaan"))));
            echo "
                                </li>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['s_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                            </ul>
                            <b>Jumlah Soal Tersimpan : ";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["retrieve_all_pertanyaan"]) ? $context["retrieve_all_pertanyaan"] : null), "total_record"), "html", null, true);
        echo "</b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ";
        // line 67
        echo anchor(((("admin/tugas/add_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")), "Tambah Soal", array("class" => "pull-right btn btn-primary"));
        echo "
                            <h3>Edit Pertanyaan <span class=\"text-error\">*</span> ";
        // line 68
        echo form_error("pertanyaan");
        echo "</h3>
                            <textarea id=\"question\" name=\"pertanyaan\" style=\"width:100%;height:200px;\">";
        // line 69
        echo set_value("pertanyaan", $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "pertanyaan"));
        echo "</textarea>
                        </td>
                    </tr>
                    ";
        // line 72
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
            // line 73
            echo "
                    ";
            // line 74
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 4));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 75
                echo "                    <tr>
                        <td>
                            <input type=\"hidden\" name=\"pilihan_";
                // line 77
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "_id\" value=\"";
                echo twig_escape_filter($this->env, get_data_array((isset($context["pilihan"]) ? $context["pilihan"] : null), (isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true);
                echo "\">
                            <div class=\"pull-right controls\">
                                <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"pilihan_";
                // line 79
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\" ";
                echo twig_escape_filter($this->env, set_radio("kunci", ("pilihan_" . (isset($context["i"]) ? $context["i"] : null)), (((get_data_array((isset($context["pilihan"]) ? $context["pilihan"] : null), (isset($context["i"]) ? $context["i"] : null), "kunci") == 1)) ? (true) : (""))), "html", null, true);
                echo "> <b class=\"text-warning\">Jadikan Kunci</b></label>
                            </div>
                            <h3>Edit Pilihan ";
                // line 81
                echo twig_escape_filter($this->env, get_abjad((isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo "</h3>
                            <textarea class=\"tiny_options\" name=\"pilihan_";
                // line 82
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\" style=\"width:100%;height:200px;\">";
                echo set_value(("pilihan_" . (isset($context["i"]) ? $context["i"] : null)), get_data_array((isset($context["pilihan"]) ? $context["pilihan"] : null), (isset($context["i"]) ? $context["i"] : null), "konten"));
                echo "</textarea>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 86
            echo "                    
                    ";
        }
        // line 88
        echo "                    <tr>
                        <td>
                            <button class=\"btn btn-primary\" type=\"submit\">Update</button>
                            <a class=\"btn btn-default\" href=\"";
        // line 91
        echo twig_escape_filter($this->env, site_url(((("admin/tugas/soal/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\">Kembali</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            ";
        // line 96
        echo form_close();
        echo "
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_tugas/edit_soal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 96,  220 => 91,  215 => 88,  211 => 86,  199 => 82,  195 => 81,  188 => 79,  181 => 77,  177 => 75,  173 => 74,  170 => 73,  168 => 72,  162 => 69,  158 => 68,  154 => 67,  146 => 62,  143 => 61,  134 => 58,  131 => 57,  127 => 56,  109 => 43,  103 => 42,  99 => 41,  95 => 40,  89 => 39,  73 => 26,  69 => 25,  64 => 23,  58 => 20,  47 => 12,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
