<?php

/* admin_tugas/manajemen_soal.html */
class __TwigTemplate_4133d2ce361a8c79dda424812990f21778e34f3ec79457ab76472682f9857abf extends Twig_Template
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

        <div class=\"bs-callout bs-callout-info bs-callout-noborder\">
            <div class=\"btn-group pull-right\">
                <a class=\"btn btn-default\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, site_url(((((("admin/tugas/edit/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
        echo "\"><i class=\"icon-edit\"></i> Edit Tugas</a>
                ";
        // line 14
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "aktif") == 0)) {
            // line 15
            echo "                    ";
            echo anchor(((("admin/tugas/tampilkan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-ok\"></i> Tampilkan</a>", array("class" => "btn btn-default", "data-toggle" => "tooltip", "title" => "Tampilkan agar siswa dapat <br>mengerjakan tugas"));
            echo "
                ";
        } else {
            // line 17
            echo "                    ";
            echo anchor(((("admin/tugas/sembunyikan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-ok\"></i> Sembunyikan</a>", array("class" => "btn btn-success", "data-toggle" => "tooltip", "title" => "Sembunyikan agar siswa sudah <br>tidak dapat mengerjakan tugas"));
            echo "
                ";
        }
        // line 19
        echo "            </div>
            <h2 class=\"title-info\" data-toggle=\"collapse\" data-target=\"#demo\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul"), "html", null, true);
        echo "</h2>
            <div id=\"demo\" class=\"collapse\">
            <label class=\"label label-warning\">Tipe : ";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type"), "html", null, true);
        echo "</label>
            <label class=\"label label-info\">Durasi : ";
        // line 23
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
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "link_profil"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama"), "html", null, true);
        echo "</a></td>
                        <td>";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo "</td>
                        <td>";
        // line 38
        echo twig_escape_filter($this->env, get_indo_hari($this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "hari_id")), "html", null, true);
        echo "</td>
                        <td>";
        // line 39
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_mulai"), "H:i"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_selesai"), "H:i"), "html", null, true);
        echo "</td>
                        <td>";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama"), "html", null, true);
        echo " <span class=\"badge badge-info\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "jumlah_siswa"), "html", null, true);
        echo " siswa</span></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>

        <br>
        <a href=\"";
        // line 48
        echo twig_escape_filter($this->env, site_url(((("admin/tugas/add_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\" class=\"btn btn-primary\">Tambah Soal</a>
        <br><br>

        ";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["retrieve_all_pertanyaan"]) ? $context["retrieve_all_pertanyaan"] : null), "results"));
        foreach ($context['_seq'] as $context["s_key"] => $context["s"]) {
            // line 52
            echo "            <div class=\"well well-small\" style=\"box-shadow: none;border-radius: 0px;\">
            <table class=\"table table-condensed table-soal\">
                <tbody>
                    <tr>
                        <td width=\"5%\" valign=\"top\"><span style=\"font-size:15px;font-size: bold;\">";
            // line 56
            echo twig_escape_filter($this->env, (isset($context["s_key"]) ? $context["s_key"] : null), "html", null, true);
            echo ".</span></td>
                        <td colspan=\"2\">
                            ";
            // line 58
            echo $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "pertanyaan");
            echo "
                        </td>
                        <td width=\"10%\">
                            <div class=\"btn-group pull-right\">
                                ";
            // line 62
            echo anchor(((((("admin/tugas/edit_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id")), "<i class=\"icon-edit\"></i>", array("class" => "btn", "data-toggle" => "tooltip", "title" => "Edit Soal"));
            echo "
                                ";
            // line 63
            echo anchor(((((("admin/tugas/delete_question/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id")), "<i class=\"icon-trash\"></i>", array("class" => "btn", "data-toggle" => "tooltip", "title" => "Hapus Soal", "onclick" => "return confirm('Anda yakin ingin menghapus soal?')"));
            echo "
                            </div>
                        </td>
                    </tr>
                    ";
            // line 67
            if ((!twig_test_empty($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "pilihan")))) {
                // line 68
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["p_key"] => $context["p"]) {
                    // line 69
                    echo "                        <tr>
                            <td></td>
                            <td width=\"3%\"><b class=\"";
                    // line 71
                    echo ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == 1)) ? ("badge badge-success") : ("badge"));
                    echo "\">";
                    echo twig_escape_filter($this->env, get_abjad((isset($context["p_key"]) ? $context["p_key"] : null)), "html", null, true);
                    echo ".</b></td>
                            <td>";
                    // line 72
                    echo $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "konten");
                    echo "</td>
                            <td></td>
                        </tr>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['p_key'], $context['p'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 76
                echo "                    ";
            }
            // line 77
            echo "                </tbody>
            </table>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['s_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "
        <br>
        ";
        // line 83
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_tugas/manajemen_soal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 83,  205 => 81,  196 => 77,  193 => 76,  183 => 72,  177 => 71,  173 => 69,  168 => 68,  166 => 67,  159 => 63,  155 => 62,  148 => 58,  143 => 56,  137 => 52,  133 => 51,  127 => 48,  114 => 40,  108 => 39,  104 => 38,  100 => 37,  94 => 36,  78 => 23,  74 => 22,  69 => 20,  66 => 19,  60 => 17,  54 => 15,  52 => 14,  48 => 13,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
