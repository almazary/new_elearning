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
                            <div class=\"bs-callout bs-callout-info bs-callout-noborder\">
                                <div class=\"btn-group pull-right\">
                                    <a class=\"btn btn-default\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, site_url(((((("admin/tugas/edit/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
        echo "\"><i class=\"icon-edit\"></i> Edit Tugas</a>
                                    ";
        // line 21
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "aktif") == 0)) {
            // line 22
            echo "                                        ";
            echo anchor(((("admin/tugas/tampilkan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-ok\"></i> Tampilkan</a>", array("class" => "btn btn-default", "data-toggle" => "tooltip", "title" => "Tampilkan agar siswa dapat <br>mengerjakan tugas"));
            echo "
                                    ";
        } else {
            // line 24
            echo "                                        ";
            echo anchor(((("admin/tugas/sembunyikan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-ok\"></i> Sembunyikan</a>", array("class" => "btn btn-success", "data-toggle" => "tooltip", "title" => "Sembunyikan agar siswa sudah <br>tidak dapat mengerjakan tugas"));
            echo "
                                    ";
        }
        // line 26
        echo "                                </div>
                                <h2 class=\"title-info\" data-toggle=\"collapse\" data-target=\"#demo\">";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul"), "html", null, true);
        echo "</h2>
                                <div id=\"demo\" class=\"collapse\">
                                <label class=\"label label-warning\">Tipe : ";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type"), "html", null, true);
        echo "</label>
                                <label class=\"label label-info\">Durasi : ";
        // line 30
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
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "link_profil"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama"), "html", null, true);
        echo "</a></td>
                                            <td>";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo "</td>
                                            <td>";
        // line 45
        echo twig_escape_filter($this->env, get_indo_hari($this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "hari_id")), "html", null, true);
        echo "</td>
                                            <td>";
        // line 46
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_mulai"), "H:i"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_selesai"), "H:i"), "html", null, true);
        echo "</td>
                                            <td>";
        // line 47
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
                            <div class=\"row-fluid\">
                                <div class=\"span10\">
                                    <ul class=\"unstyled inline\">
                                        ";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["retrieve_all_pertanyaan"]) ? $context["retrieve_all_pertanyaan"] : null), "results"));
        foreach ($context['_seq'] as $context["s_key"] => $context["s"]) {
            // line 63
            echo "                                        <li>
                                            ";
            // line 64
            if ((!twig_test_empty($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "kunci_index")))) {
                // line 65
                echo "                                                ";
                $context["kunci_index"] = get_abjad($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "kunci_index"));
                // line 66
                echo "                                            ";
            } else {
                // line 67
                echo "                                                ";
                $context["kunci_index"] = "";
                // line 68
                echo "                                            ";
            }
            // line 69
            echo "                                            ";
            echo anchor(((((("admin/tugas/edit_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id")), (((isset($context["s_key"]) ? $context["s_key"] : null) . ". ") . (isset($context["kunci_index"]) ? $context["kunci_index"] : null)), array("class" => "label label-info", "data-toggle" => "tooltip", "title" => word_limiter(strip_tags($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "pertanyaan")), 50)));
            echo "
                                        </li>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['s_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "                                    </ul>
                                    <b>Jumlah Soal Tersimpan : ";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["retrieve_all_pertanyaan"]) ? $context["retrieve_all_pertanyaan"] : null), "total_record"), "html", null, true);
        echo "</b>
                                </div>
                                <div class=\"span2\">
                                    ";
        // line 76
        echo anchor(((("admin/tugas/add_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")), "Tambah Soal", array("class" => "btn btn-primary"));
        echo "
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class=\"btn-group pull-right\">
                                <button class=\"btn btn-primary\" type=\"submit\">Update Soal</button>
                                ";
        // line 85
        echo anchor(((((("admin/tugas/delete_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id")), "Hapus Soal", array("class" => "btn btn-danger", "onclick" => "return confirm('Anda yakin ingin manghapus soal ini?')"));
        echo "
                            </div>
                            <h3>Edit Pertanyaan <span class=\"text-error\">*</span> ";
        // line 87
        echo form_error("pertanyaan");
        echo "</h3>
                            <textarea id=\"question\" name=\"pertanyaan\" style=\"width:100%;height:200px;\">";
        // line 88
        echo set_value("pertanyaan", $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "pertanyaan"));
        echo "</textarea>
                        </td>
                    </tr>
                    ";
        // line 91
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
            // line 92
            echo "
                    ";
            // line 93
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 4));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 94
                echo "                    <tr>
                        <td>
                            <input type=\"hidden\" name=\"pilihan_";
                // line 96
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "_id\" value=\"";
                echo twig_escape_filter($this->env, get_data_array((isset($context["pilihan"]) ? $context["pilihan"] : null), (isset($context["i"]) ? $context["i"] : null), "id"), "html", null, true);
                echo "\">
                            <div class=\"pull-right controls\">
                                <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"pilihan_";
                // line 98
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\" ";
                echo twig_escape_filter($this->env, set_radio("kunci", ("pilihan_" . (isset($context["i"]) ? $context["i"] : null)), (((get_data_array((isset($context["pilihan"]) ? $context["pilihan"] : null), (isset($context["i"]) ? $context["i"] : null), "kunci") == 1)) ? (true) : (""))), "html", null, true);
                echo "> <b class=\"text-warning\">Jadikan Kunci</b></label>
                            </div>
                            <h3>Edit Pilihan ";
                // line 100
                echo twig_escape_filter($this->env, get_abjad((isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo "</h3>
                            <textarea class=\"tiny_options\" name=\"pilihan_";
                // line 101
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
            // line 105
            echo "                    
                    ";
        }
        // line 107
        echo "                    <tr>
                        <td>
                            <button class=\"btn btn-primary\" type=\"submit\">Update Soal</button>
                            <a class=\"btn btn-default\" href=\"";
        // line 110
        echo twig_escape_filter($this->env, site_url(((("admin/tugas/soal/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\">Kembali</a>
                        
                            ";
        // line 112
        echo anchor(((((("admin/tugas/delete_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id")), "Hapus Soal", array("class" => "btn btn-danger pull-right", "onclick" => "return confirm('Anda yakin ingin manghapus soal ini?')"));
        echo "
                        </td>
                    </tr>
                </tbody>
            </table>
            ";
        // line 117
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
        return array (  276 => 117,  268 => 112,  263 => 110,  258 => 107,  254 => 105,  242 => 101,  238 => 100,  231 => 98,  224 => 96,  220 => 94,  216 => 93,  213 => 92,  211 => 91,  205 => 88,  201 => 87,  196 => 85,  184 => 76,  178 => 73,  175 => 72,  165 => 69,  162 => 68,  159 => 67,  156 => 66,  153 => 65,  151 => 64,  148 => 63,  144 => 62,  124 => 47,  118 => 46,  114 => 45,  110 => 44,  104 => 43,  88 => 30,  84 => 29,  79 => 27,  76 => 26,  70 => 24,  64 => 22,  62 => 21,  58 => 20,  47 => 12,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
