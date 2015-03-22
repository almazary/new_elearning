<?php

/* admin_tugas/tambah_soal.html */
class __TwigTemplate_46c167e3da52a21d786d44ebdda9bc4b8be632a0657be050a51a749fbff17e51 extends Twig_Template
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
        echo form_open(((("admin/tugas/add_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")));
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
                            <ul class=\"unstyled inline\">
                                ";
        // line 60
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["retrieve_all_pertanyaan"]) ? $context["retrieve_all_pertanyaan"] : null), "results"));
        foreach ($context['_seq'] as $context["s_key"] => $context["s"]) {
            // line 61
            echo "                                <li>
                                    ";
            // line 62
            if ((!twig_test_empty($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "kunci_index")))) {
                // line 63
                echo "                                        ";
                $context["kunci_index"] = get_abjad($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "kunci_index"));
                // line 64
                echo "                                    ";
            } else {
                // line 65
                echo "                                        ";
                $context["kunci_index"] = "";
                // line 66
                echo "                                    ";
            }
            // line 67
            echo "                                    ";
            echo anchor(((((("admin/tugas/edit_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id")), (((isset($context["s_key"]) ? $context["s_key"] : null) . ". ") . (isset($context["kunci_index"]) ? $context["kunci_index"] : null)), array("class" => "badge badge-info", "data-toggle" => "tooltip", "title" => word_limiter(strip_tags($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "pertanyaan")), 50)));
            echo "
                                </li>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['s_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "                            </ul>
                            <b>Jumlah Soal Tersimpan : ";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["retrieve_all_pertanyaan"]) ? $context["retrieve_all_pertanyaan"] : null), "total_record"), "html", null, true);
        echo "</b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Pertanyaan Soal Ke ";
        // line 76
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["retrieve_all_pertanyaan"]) ? $context["retrieve_all_pertanyaan"] : null), "total_record") + 1), "html", null, true);
        echo " <span class=\"text-error\">*</span> ";
        echo form_error("pertanyaan");
        echo "</h3>
                            <textarea id=\"question\" name=\"pertanyaan\" style=\"width:100%;height:200px;\">";
        // line 77
        echo set_value("pertanyaan");
        echo "</textarea>
                        </td>
                    </tr>
                    ";
        // line 80
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
            // line 81
            echo "                    <tr>
                        <td>
                            <div class=\"pull-right controls\">
                                <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"pilihan_1\" ";
            // line 84
            echo twig_escape_filter($this->env, set_radio("kunci", "pilihan_1", (((get_post_data("kunci") == "")) ? (true) : (""))), "html", null, true);
            echo "> <b class=\"text-warning\">Jadikan Kunci</b></label>
                            </div>
                            <h3>Pilihan A</h3>
                            <textarea class=\"tiny_options\" name=\"pilihan_1\" style=\"width:100%;height:200px;\">";
            // line 87
            echo set_value("pilihan_1");
            echo "</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class=\"pull-right controls\">
                                <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"pilihan_2\" ";
            // line 93
            echo twig_escape_filter($this->env, set_radio("kunci", "pilihan_2"), "html", null, true);
            echo "> <b class=\"text-warning\">Jadikan Kunci</b></label>
                            </div>
                            <h3>Pilihan B</h3>
                            <textarea class=\"tiny_options\" name=\"pilihan_2\" style=\"width:100%;height:200px;\">";
            // line 96
            echo set_value("pilihan_2");
            echo "</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class=\"pull-right controls\">
                                <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"pilihan_3\" ";
            // line 102
            echo twig_escape_filter($this->env, set_radio("kunci", "pilihan_3"), "html", null, true);
            echo "> <b class=\"text-warning\">Jadikan Kunci</b></label>
                            </div>
                            <h3>Pilihan C</h3>
                            <textarea class=\"tiny_options\" name=\"pilihan_3\" style=\"width:100%;height:200px;\">";
            // line 105
            echo set_value("pilihan_3");
            echo "</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class=\"pull-right controls\">
                                <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"pilihan_4\" ";
            // line 111
            echo twig_escape_filter($this->env, set_radio("kunci", "pilihan_4"), "html", null, true);
            echo "> <b class=\"text-warning\">Jadikan Kunci</b></label>
                            </div>
                            <h3>Pilihan D</h3>
                            <textarea class=\"tiny_options\" name=\"pilihan_4\" style=\"width:100%;height:200px;\">";
            // line 114
            echo set_value("pilihan_4");
            echo "</textarea>
                        </td>
                    </tr>
                    ";
        }
        // line 118
        echo "                    <tr>
                        <td>
                            <button class=\"btn btn-primary\" type=\"submit\">Simpan</button>
                            <a class=\"btn btn-default\" href=\"";
        // line 121
        echo twig_escape_filter($this->env, site_url(((("admin/tugas/soal/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\">Batal</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            ";
        // line 126
        echo form_close();
        echo "
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_tugas/tambah_soal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  274 => 126,  266 => 121,  261 => 118,  254 => 114,  248 => 111,  239 => 105,  233 => 102,  224 => 96,  218 => 93,  209 => 87,  203 => 84,  198 => 81,  196 => 80,  190 => 77,  184 => 76,  176 => 71,  173 => 70,  163 => 67,  160 => 66,  157 => 65,  154 => 64,  151 => 63,  149 => 62,  146 => 61,  142 => 60,  124 => 47,  118 => 46,  114 => 45,  110 => 44,  104 => 43,  88 => 30,  84 => 29,  79 => 27,  76 => 26,  70 => 24,  64 => 22,  62 => 21,  58 => 20,  47 => 12,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
