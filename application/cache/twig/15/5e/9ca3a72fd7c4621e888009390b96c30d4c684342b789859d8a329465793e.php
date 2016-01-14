<?php

/* manajemen-tugas.html */
class __TwigTemplate_155e9ca3a72fd7c4621e888009390b96c30d4c684342b789859d8a329465793e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
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
        echo anchor(((("plugins/custom_tugas/edit/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon icon-edit\"></i> Edit Tugas", array("class" => "btn btn-default"));
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
                        <th style=\"border-top: none;\" width=\"30%\">Tipe</th>
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
        echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "info")));
        echo "</td>
                    </tr>
                    <tr>
                        <th>Maksimal jumlah soal</th>
                        <td>";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "max_jml_soal"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th>Model urutan soal</th>
                        <td>";
        // line 75
        echo ((($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "model_urutan_soal") == 1)) ? ("Acak") : ("Berurutan"));
        echo "</td>
                    </tr>
                    <tr>
                        <th>Tampil soal perhalaman</th>
                        <td>";
        // line 79
        echo twig_escape_filter($this->env, ((($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "tampil_soal_perhalaman") == 0)) ? ("Semua") : ($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "tampil_soal_perhalaman"))), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th>Durasi</th>
                        <td>";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "durasi"), "html", null, true);
        echo " Menit</td>
                    </tr>
                </table>
            </div>

        </div>
        <br>

        <a href=\"";
        // line 91
        echo twig_escape_filter($this->env, site_url("plugins/bank_soal"), "html", null, true);
        echo "\" class=\"btn btn-success pull-right\" title=\"Import Excel\">Kelola Bank Soal</a>
        <div class=\"btn-group\">
            <a href=\"javascript:void(0)\" class=\"btn btn-primary disable-on-add-pertanyaan ";
        // line 93
        echo ((($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) ? ("btn-tambah-pertanyaan") : ("btn-tambah-pertanyaan-essay"));
        echo "\" title=\"Tambah Pertanyaan\">Tambah Pertanyaan</a>
            <a href=\"";
        // line 94
        echo twig_escape_filter($this->env, site_url(("tugas/copy_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\" class=\"disable-on-add-pertanyaan btn btn-primary iframe-copy-pertanyaan\" title=\"Copy Pertanyaan\">Copy Soal Tugas</a>
            <a href=\"";
        // line 95
        echo twig_escape_filter($this->env, site_url(("plugins/bank_soal/copy_soal_bank/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\" class=\"disable-on-add-pertanyaan btn btn-primary iframe-bank-soal iframe-copy-pertanyaan\" title=\"Bank Soal\">Copy Bank Soal</a>
            <a href=\"";
        // line 96
        echo twig_escape_filter($this->env, site_url(("plugins/bank_soal/import_excel_soal_tugas/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\" class=\"disable-on-add-pertanyaan btn btn-primary\" title=\"Import Excel\">Import Excel</a>
        </div>
        <br><br>

        ";
        // line 100
        echo form_open(("plugins/bank_soal/add_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")), array("id" => "form-tambah-pertanyaan"));
        echo "
            <div class=\"box-new-soal\"></div>
        ";
        // line 102
        echo form_close();
        echo "

        <table class=\"table\">
            <thead>
                <tr>
                    <th width=\"5%\">No</th>
                    <th>Pertanyaan ";
        // line 108
        echo ((($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) ? (" dan Pilihan") : (""));
        echo "</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 112
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 113
            echo "                <tr id=\"pertanyaan-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
                    <td><b>";
            // line 114
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "urutan"), "html", null, true);
            echo ".</b></td>
                    <td>
                        <div class=\"pertanyaan\">
                            <div class=\"btn-group pull-right\" style=\"margin-left:10px;\">
                                <a href=\"";
            // line 118
            echo twig_escape_filter($this->env, site_url(((((("plugins/bank_soal/edit_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
            echo "\" class=\"btn btn-small btn-default\"><i class=\"icon-edit\"></i> Edit</a>
                                <a onclick=\"return confirm('Anda yakin ingin menghapus?')\" href=\"";
            // line 119
            echo twig_escape_filter($this->env, site_url(((((("tugas/hapus_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
            echo "\" class=\"btn btn-small btn-default\"><i class=\"icon-trash\"></i> Hapus</a>
                            </div>

                            ";
            // line 122
            echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
            echo "
                        </div>

                        ";
            // line 125
            if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
                // line 126
                echo "                        <br>
                        <div id=\"pilihan-";
                // line 127
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                            <table class=\"table table-condensed\">
                                <tbody>
                                    ";
                // line 130
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                    if ((!twig_test_empty($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten")))) {
                        // line 131
                        echo "                                    <tr ";
                        echo ((($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 1)) ? ("style=\"background-color: #fbfbfb;margin-left: 10px;\"") : (""));
                        echo ">
                                        <td width=\"3%\"><b>(";
                        // line 132
                        echo twig_escape_filter($this->env, get_abjad($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan")), "html", null, true);
                        echo ")</b></td>
                                        <td>
                                            ";
                        // line 134
                        if (($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 1)) {
                            // line 135
                            echo "                                            <span class=\"text-success pull-right\"><i class=\"icon-ok\"></i> Kunci Jawaban</span>
                                            ";
                        }
                        // line 137
                        echo "                                            ";
                        echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten")));
                        echo "
                                        </td>
                                    </tr>
                                    ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pil'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 141
                echo "                                </tbody>
                            </table>
                        </div>
                        ";
            }
            // line 145
            echo "
                    </td>
                </tr>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        echo "            </tbody>
        </table>
        <br>
        ";
        // line 153
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    // line 159
    public function block_js($context, array $blocks = array())
    {
        // line 160
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, base_url("assets/comp/tinymce/tiny_mce.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 161
        echo twig_escape_filter($this->env, base_url_plugins("src/bank_soal/js/tinymce_pertanyaan.js"), "html", null, true);
        echo "\"></script>
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
        return array (  351 => 161,  346 => 160,  343 => 159,  334 => 153,  329 => 150,  319 => 145,  313 => 141,  301 => 137,  297 => 135,  295 => 134,  290 => 132,  285 => 131,  280 => 130,  274 => 127,  271 => 126,  269 => 125,  263 => 122,  257 => 119,  253 => 118,  246 => 114,  241 => 113,  237 => 112,  230 => 108,  221 => 102,  216 => 100,  209 => 96,  205 => 95,  201 => 94,  197 => 93,  192 => 91,  181 => 83,  174 => 79,  167 => 75,  160 => 71,  153 => 67,  146 => 62,  137 => 60,  133 => 59,  124 => 53,  117 => 49,  110 => 45,  101 => 39,  98 => 38,  92 => 36,  86 => 34,  84 => 33,  80 => 32,  73 => 28,  67 => 25,  63 => 23,  60 => 22,  44 => 8,  41 => 7,  34 => 4,  31 => 3,);
    }
}
