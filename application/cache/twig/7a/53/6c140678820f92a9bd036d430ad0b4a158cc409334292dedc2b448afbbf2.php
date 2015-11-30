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
        echo "Manajemen Soal Tugas - ";
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
        echo " / Manajemen Soal Tugas</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 28
        echo get_flashdata("tugas");
        echo "

        <div class=\"bs-callout bs-callout-info\">
            <div class=\"btn-group pull-right\" style=\"margin-top:-5px;\">
                ";
        // line 32
        echo anchor(((("tugas/edit/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon icon-edit\"></i> Edit Tugas", array("class" => "btn btn-default"));
        echo "
                ";
        // line 33
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "aktif") == 0)) {
            // line 34
            echo "                    ";
            echo anchor(((("tugas/terbitkan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-ok\"></i> Terbitkan", array("class" => "btn btn-success btn-small"));
            echo "
                ";
        } elseif (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "aktif") == 1)) {
            // line 36
            echo "                    ";
            echo anchor(((("tugas/tutup/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-minus\"></i> Tutup", array("class" => "btn btn-danger btn-small"));
            echo "
                ";
        }
        // line 38
        echo "            </div>
            <b><a class=\"as-link\" data-toggle=\"collapse\" data-target=\"#detail-tugas\"><i class=\"icon-info-sign\" style=\"line-height: 0px;\"></i> ";
        // line 39
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul")), "html", null, true);
        echo "</a></b>

            <div id=\"detail-tugas\" class=\"collapse\" style=\"margin-top: 5px;\">
                <table class=\"table\">
                    <tr>
                        <th style=\"border-top: none;\" width=\"15%\">Tipe</th>
                        <td style=\"border-top: none;\">";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_label"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th>Judul</th>
                        <td>";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th>Matapelajaran</th>
                        <td>";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "mapel"), "nama"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>
                            <ul class=\"unstyled inline\" style=\"margin-left: -5px;margin-bottom: 0px;\">
                                ";
        // line 59
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "tugas_kelas"));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 60
            echo "                                <li>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "</li>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>Info</th>
                        <td>";
        // line 67
        echo $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "info");
        echo "</td>
                    </tr>
                    <tr>
                        <th>Durasi</th>
                        <td>";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "durasi"), "html", null, true);
        echo " Menit</td>
                    </tr>
                </table>
            </div>

        </div>
        <br>

        <div class=\"btn-group\">
            <a href=\"javascript:void(0)\" class=\"btn btn-primary ";
        // line 80
        echo ((($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) ? ("btn-tambah-pertanyaan") : ("btn-tambah-pertanyaan-essay"));
        echo "\" title=\"Tambah Pertanyaan\">Tambah Pertanyaan</a>
            <a href=\"";
        // line 81
        echo twig_escape_filter($this->env, site_url(("tugas/copy_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\" class=\"btn-copy-pertanyaan btn btn-primary iframe-copy-pertanyaan\" title=\"Copy Pertanyaan\">Copy Pertanyaan</a>
        </div>
        <br><br>

        ";
        // line 85
        echo form_open(("tugas/manajemen_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")), array("id" => "form-tambah-pertanyaan"));
        echo "
            <div class=\"box-new-soal\"></div>
        ";
        // line 87
        echo form_close();
        echo "

        <table class=\"table\">
            <thead>
                <tr>
                    <th width=\"5%\">No</th>
                    <th>Pertanyaan ";
        // line 93
        echo ((($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) ? (" dan Pilihan") : (""));
        echo "</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 97
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 98
            echo "                <tr id=\"pertanyaan-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
                    <td><b>";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "urutan"), "html", null, true);
            echo ".</b></td>
                    <td>
                        <div class=\"pertanyaan\">
                            <div class=\"btn-group pull-right\" style=\"margin-left:10px;\">
                                ";
            // line 103
            if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
                // line 104
                echo "                                <a href=\"";
                echo twig_escape_filter($this->env, site_url(((("tugas/tambah_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
                echo "\" class=\"btn btn-small btn-default iframe-pilihan\" data-toggle=\"tooltip\" title=\"Tambah Pilihan\"><i class=\"icon-tasks\"></i></a>
                                ";
            }
            // line 106
            echo "                                <a href=\"";
            echo twig_escape_filter($this->env, site_url(((("tugas/edit_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
            echo "\" class=\"btn btn-small btn-default iframe-pertanyaan\" data-toggle=\"tooltip\" title=\"Edit Pertanyaan\"><i class=\"icon-edit\"></i></a>
                                <a onclick=\"return confirm('Anda yakin ingin menghapus?')\" href=\"";
            // line 107
            echo twig_escape_filter($this->env, site_url(((((("tugas/hapus_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
            echo "\" class=\"btn btn-small btn-default\" data-toggle=\"tooltip\" title=\"Hapus Pertanyaan\"><i class=\"icon-trash\"></i></a>
                            </div>

                            ";
            // line 110
            echo html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan"));
            echo "
                        </div>

                        ";
            // line 113
            if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
                // line 114
                echo "                        <div id=\"pilihan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                            <table class=\"table table-condensed table-striped\">
                                <tbody>
                                    ";
                // line 117
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                    // line 118
                    echo "                                    <tr ";
                    echo ((($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 1)) ? ("class=\"success\"") : (""));
                    echo ">
                                        <td width=\"3%\"><b>(";
                    // line 119
                    echo twig_escape_filter($this->env, get_abjad($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan")), "html", null, true);
                    echo ")</b></td>
                                        <td>
                                            <div class=\"btn-group pull-right\" style=\"margin-left:10px;\">
                                                ";
                    // line 122
                    if (($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 0)) {
                        // line 123
                        echo "                                                    <a href=\"";
                        echo twig_escape_filter($this->env, site_url(((((((("tugas/kunci_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
                        echo "\" class=\"btn btn-small btn-default\" data-toggle=\"tooltip\" title=\"Jadikan Kunci\"><i class=\"icon-ok\"></i></a>
                                                ";
                    }
                    // line 125
                    echo "                                                <a href=\"";
                    echo twig_escape_filter($this->env, site_url(((((("tugas/edit_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id"))), "html", null, true);
                    echo "\" class=\"btn btn-small btn-default iframe-pilihan\" data-toggle=\"tooltip\" title=\"Edit Pilihan\"><i class=\"icon-edit\"></i></a>
                                                <a onclick=\"return confirm('Anda yakin ingin menghapus?')\" href=\"";
                    // line 126
                    echo twig_escape_filter($this->env, site_url(((((((("tugas/hapus_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
                    echo "\" class=\"btn btn-small btn-default\" data-toggle=\"tooltip\" title=\"Hapus Pilihan\"><i class=\"icon-trash\"></i></a>
                                            </div>
                                            ";
                    // line 128
                    echo html_entity_decode($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten"));
                    echo "

                                            ";
                    // line 130
                    if (($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 1)) {
                        // line 131
                        echo "                                            <b class=\"text-warning\"><i class=\"icon-star\"></i> Kunci Jawaban</b>
                                            ";
                    }
                    // line 133
                    echo "                                        </td>
                                    </tr>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pil'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 136
                echo "                                </tbody>
                            </table>
                        </div>
                        ";
            }
            // line 140
            echo "
                    </td>
                </tr>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 145
        echo "            </tbody>
        </table>
        <br>
        ";
        // line 148
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
        return array (  326 => 148,  321 => 145,  311 => 140,  305 => 136,  297 => 133,  293 => 131,  291 => 130,  286 => 128,  281 => 126,  276 => 125,  270 => 123,  268 => 122,  262 => 119,  257 => 118,  253 => 117,  246 => 114,  244 => 113,  238 => 110,  232 => 107,  227 => 106,  221 => 104,  219 => 103,  212 => 99,  207 => 98,  203 => 97,  196 => 93,  187 => 87,  182 => 85,  175 => 81,  171 => 80,  159 => 71,  152 => 67,  145 => 62,  136 => 60,  132 => 59,  123 => 53,  116 => 49,  109 => 45,  100 => 39,  97 => 38,  91 => 36,  85 => 34,  83 => 33,  79 => 32,  72 => 28,  66 => 25,  62 => 23,  59 => 22,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
