<?php

/* list-peserta.html */
class __TwigTemplate_b739346f71a3a9f2ef8c0bb4486ee13a79e132b8959f74c20243fca7c26b1d3b extends Twig_Template
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
        echo "Koreksi - ";
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
        echo " / Koreksi</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("tugas");
        echo "

        <div class=\"bs-callout bs-callout-info\">
            <div class=\"btn-group pull-right\" style=\"margin-top:-5px;\">
                ";
        // line 17
        echo anchor(((("tugas/edit/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon icon-edit\"></i> Edit Tugas", array("class" => "btn btn-default"));
        echo "
                ";
        // line 18
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "aktif") == 0)) {
            // line 19
            echo "                    ";
            echo anchor(((("tugas/terbitkan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-ok\"></i> Terbitkan", array("class" => "btn btn-success btn-small"));
            echo "
                ";
        } elseif (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "aktif") == 1)) {
            // line 21
            echo "                    ";
            echo anchor(((("tugas/tutup/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-minus\"></i> Tutup", array("class" => "btn btn-danger btn-small"));
            echo "
                ";
        }
        // line 23
        echo "            </div>
            <b><a class=\"as-link\" data-toggle=\"collapse\" data-target=\"#detail-tugas\"><i class=\"icon-info-sign\" style=\"line-height: 0px;\"></i> ";
        // line 24
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul")), "html", null, true);
        echo "</a></b>

            <div id=\"detail-tugas\" class=\"collapse\" style=\"margin-top: 5px;\">
                <table class=\"table\">
                    <tr>
                        <th style=\"border-top: none;\" width=\"15%\">Tipe</th>
                        <td style=\"border-top: none;\">";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_label"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th>Judul</th>
                        <td>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th>Matapelajaran</th>
                        <td>";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "mapel"), "nama"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>
                            <ul class=\"unstyled inline\" style=\"margin-left: -5px;margin-bottom: 0px;\">
                                ";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "tugas_kelas"));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 45
            echo "                                <li>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "</li>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>Info</th>
                        <td>";
        // line 52
        echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "info")));
        echo "</td>
                    </tr>
                    ";
        // line 54
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") != 1)) {
            // line 55
            echo "                    <tr>
                        <th>Durasi</th>
                        <td>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "durasi"), "html", null, true);
            echo " Menit</td>
                    </tr>
                    ";
        }
        // line 60
        echo "                </table>
            </div>

        </div>
        <br>

        <div class=\"btn-group\">
            <a data-original-title=\"Print Query\" href=\"#\" class=\"btn btn-primary\" data-toggle=\"popover\" data-html=\"true\" data-placement=\"top\" data-content=\"<form method='post' target='_blank' action='";
        // line 67
        echo twig_escape_filter($this->env, site_url((("tugas/koreksi/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/print")), "html", null, true);
        echo "'><select name='kelas_id'><option value='all'>--Semua Kelas--</option>";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas_nilai"]) ? $context["kelas_nilai"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            echo " <option value='";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "</option> ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</select><button class='btn btn-primary btn-sm'>Print</button</form>\">Print</a>
            <a data-original-title=\"Export Query\" href=\"#\" class=\"btn btn-primary\" data-toggle=\"popover\" data-html=\"true\" data-placement=\"bottom\" data-content=\"<form method='post' target='_blank' action='";
        // line 68
        echo twig_escape_filter($this->env, site_url((("tugas/koreksi/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/export_excel")), "html", null, true);
        echo "'><select name='kelas_id'><option value='all'>--Semua Kelas--</option>";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas_nilai"]) ? $context["kelas_nilai"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            echo " <option value='";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "</option> ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</select><button class='btn btn-primary btn-sm'>Export Excel</button</form>\">Export Excel</a>
        </div>

        <br><br>
        <table class=\"table table-striped datatable\">
            <thead>
                <tr>
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>Nilai</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 82
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data_siswa"]) ? $context["data_siswa"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 83
            echo "                <tr>
                    <td>
                        <img style=\"height:20px;width:20px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
            // line 85
            echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "foto"), "medium", $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "jenis_kelamin")), "html", null, true);
            echo "\">
                        <a href=\"";
            // line 86
            echo twig_escape_filter($this->env, site_url(("siswa/detail/" . $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id"))), "html", null, true);
            echo "\"><b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nama"), "html", null, true);
            echo " ";
            echo (((!twig_test_empty($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nis")))) ? ((("<span class=\"text-muted\">(" . $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nis")) . ")</span>")) : (""));
            echo "</b></a>
                    </td>
                    <td>";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "kelas_aktif"), "nama"), "html", null, true);
            echo " <span class=\"text-muted\">(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "kelas_aktif"), "id"), "html", null, true);
            echo ")</span></td>
                    <td>";
            // line 89
            echo twig_escape_filter($this->env, round($this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nilai"), "nilai"), 2), "html", null, true);
            echo "</td>
                    <td>
                        <div class=\"btn-group\">
                            ";
            // line 92
            if (twig_test_empty($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nilai"))) {
                // line 93
                echo "                                ";
                echo anchor(((("tugas/detail_jawaban/" . $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")), "Koreksi", array("class" => "btn btn-small btn-primary iframe-koreksi-jawaban"));
                echo "
                            ";
            } else {
                // line 95
                echo "                                ";
                echo anchor(((("tugas/detail_jawaban/" . $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")), "Detail", array("class" => "btn btn-small btn-primary iframe-koreksi-jawaban"));
                echo "
                            ";
            }
            // line 97
            echo "                            <a href=\"";
            echo twig_escape_filter($this->env, site_url(((("tugas/reset_jawaban/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "id"))), "html", null, true);
            echo "\" class=\"btn btn-small btn-default\" onclick=\"return confirm('Anda yakin ingin menganggap siswa belum mengerjakan?')\" data-toggle=\"tooltip\" title=\"Reset jawaban siswa, <br>anggap siswa menjadi belum mengerjakan.\">Reset</a>
                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "            </tbody>
        </table>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-peserta.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  264 => 102,  252 => 97,  246 => 95,  240 => 93,  238 => 92,  232 => 89,  226 => 88,  217 => 86,  213 => 85,  209 => 83,  205 => 82,  175 => 68,  158 => 67,  149 => 60,  143 => 57,  139 => 55,  137 => 54,  132 => 52,  125 => 47,  116 => 45,  112 => 44,  103 => 38,  96 => 34,  89 => 30,  80 => 24,  77 => 23,  71 => 21,  65 => 19,  63 => 18,  59 => 17,  52 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
