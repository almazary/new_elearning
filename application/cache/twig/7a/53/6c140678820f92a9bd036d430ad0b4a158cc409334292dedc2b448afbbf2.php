<?php

/* manajemen-tugas.html */
class __TwigTemplate_7a536c140678820f92a9bd036d430ad0b4a158cc409334292dedc2b448afbbf2 extends Twig_Template
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
        echo "Manajemen Soal Tugas - ";
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
        echo " / Manajemen Soal Tugas</h3>
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
        echo $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "info");
        echo "</td>
                    </tr>
                    <tr>
                        <th>Durasi</th>
                        <td>";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "durasi"), "html", null, true);
        echo " Menit</td>
                    </tr>
                </table>
            </div>

        </div>
        <br>

        <div class=\"btn-group\">
            <a href=\"";
        // line 65
        echo twig_escape_filter($this->env, site_url(("tugas/tambah_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\" class=\"btn btn-primary iframe-pertanyaan\" title=\"Tambah Pertanyaan\">Tambah Pertanyaan</a>
        </div>
        <br><br>

        <table class=\"table\">
            <thead>
                <tr>
                    <th width=\"5%\">No</th>
                    <th>Pertanyaan ";
        // line 73
        echo ((($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) ? (" dan Pilihan") : (""));
        echo "</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 77
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 78
            echo "                <tr id=\"pertanyaan-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
                    <td><b>";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "urutan"), "html", null, true);
            echo ".</b></td>
                    <td>
                        <div class=\"pertanyaan\">
                            <div class=\"btn-group pull-right\" style=\"margin-left:10px;\">
                                ";
            // line 83
            if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
                // line 84
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, site_url(((("tugas/tambah_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
                echo "\" class=\"btn btn-small btn-default iframe-pilihan\" data-toggle=\"tooltip\" title=\"Tambah Pilihan\"><i class=\"icon-tasks\"></i></a>
                                ";
            }
            // line 86
            echo "                                <a href=\"";
            echo twig_escape_filter($this->env, site_url(((("tugas/edit_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
            echo "\" class=\"btn btn-small btn-default iframe-pertanyaan\" data-toggle=\"tooltip\" title=\"Edit Pertanyaan\"><i class=\"icon-edit\"></i></a>
                                <a onclick=\"return confirm('Anda yakin ingin menghapus?')\" href=\"";
            // line 87
            echo twig_escape_filter($this->env, site_url(((((("tugas/hapus_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
            echo "\" class=\"btn btn-small btn-default\" data-toggle=\"tooltip\" title=\"Hapus Pertanyaan\"><i class=\"icon-trash\"></i></a>
                            </div>

                            ";
            // line 90
            echo html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan"));
            echo "
                        </div>

                        ";
            // line 93
            if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
                // line 94
                echo "                        <div id=\"pilihan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                            <table class=\"table table-condensed table-striped\">
                                <tbody>
                                    ";
                // line 97
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                    // line 98
                    echo "                                    <tr ";
                    echo ((($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 1)) ? ("class=\"success\"") : (""));
                    echo ">
                                        <td width=\"3%\"><b>(";
                    // line 99
                    echo twig_escape_filter($this->env, get_abjad($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan")), "html", null, true);
                    echo ")</b></td>
                                        <td>
                                            <div class=\"btn-group pull-right\" style=\"margin-left:10px;\">
                                                ";
                    // line 102
                    if (($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 0)) {
                        // line 103
                        echo "                                                    <a href=\"";
                        echo twig_escape_filter($this->env, site_url(((((((("tugas/kunci_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
                        echo "\" class=\"btn btn-small btn-default\" data-toggle=\"tooltip\" title=\"Jadikan Kunci\"><i class=\"icon-ok\"></i></a>
                                                ";
                    }
                    // line 105
                    echo "                                                <a href=\"";
                    echo twig_escape_filter($this->env, site_url(((((("tugas/edit_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id"))), "html", null, true);
                    echo "\" class=\"btn btn-small btn-default iframe-pilihan\" data-toggle=\"tooltip\" title=\"Edit Pilihan\"><i class=\"icon-edit\"></i></a>
                                                <a onclick=\"return confirm('Anda yakin ingin menghapus?')\" href=\"";
                    // line 106
                    echo twig_escape_filter($this->env, site_url(((((((("tugas/hapus_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
                    echo "\" class=\"btn btn-small btn-default\" data-toggle=\"tooltip\" title=\"Hapus Pilihan\"><i class=\"icon-trash\"></i></a>
                                            </div>
                                            ";
                    // line 108
                    echo html_entity_decode($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten"));
                    echo "

                                            ";
                    // line 110
                    if (($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 1)) {
                        // line 111
                        echo "                                            <b class=\"text-warning\"><i class=\"icon-star\"></i> Kunci Jawaban</b>
                                            ";
                    }
                    // line 113
                    echo "                                        </td>
                                    </tr>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pil'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 116
                echo "                                </tbody>
                            </table>
                        </div>
                        ";
            }
            // line 120
            echo "
                    </td>
                </tr>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 125
        echo "            </tbody>
        </table>
        <br>
        ";
        // line 128
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "manajemen-tugas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  292 => 128,  287 => 125,  277 => 120,  271 => 116,  263 => 113,  259 => 111,  257 => 110,  252 => 108,  247 => 106,  242 => 105,  236 => 103,  234 => 102,  228 => 99,  223 => 98,  219 => 97,  212 => 94,  210 => 93,  204 => 90,  198 => 87,  193 => 86,  187 => 84,  185 => 83,  178 => 79,  173 => 78,  169 => 77,  162 => 73,  151 => 65,  139 => 56,  132 => 52,  125 => 47,  116 => 45,  112 => 44,  103 => 38,  96 => 34,  89 => 30,  80 => 24,  77 => 23,  71 => 21,  65 => 19,  63 => 18,  59 => 17,  52 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
