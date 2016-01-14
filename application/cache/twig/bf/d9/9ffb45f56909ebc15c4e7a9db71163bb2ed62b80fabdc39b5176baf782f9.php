<?php

/* bank-soal.html */
class __TwigTemplate_bfd99ffb45f56909ebc15c4e7a9db71163bb2ed62b80fabdc39b5176baf782f9 extends Twig_Template
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
        echo "Tugas - ";
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
        echo " / Bank Soal</h3>
    </div>
    <div class=\"module-body\">
        <div class=\"btn-group\">
            <a href=\"javascript:void(0)\" class=\"btn btn-primary btn-tambah-pertanyaan disable-on-add-pertanyaan\">Tambah Soal Ganda</a>
            <a href=\"javascript:void(0)\" class=\"btn btn-primary btn-tambah-pertanyaan-essay disable-on-add-pertanyaan\">Tambah Soal Essay</a>
            ";
        // line 31
        echo anchor("plugins/bank_soal/copy_soal_tugas", "Copy Soal Tugas", array("class" => "btn btn-primary iframe-copy-soal-tugas disable-on-add-pertanyaan"));
        echo "
            ";
        // line 32
        echo anchor("plugins/bank_soal/import_excel", "Import Excel", array("class" => "btn btn-primary disable-on-add-pertanyaan"));
        echo "
        </div>
        <div class=\"bs-callout bs-callout-info\" style=\"padding-bottom: 0px;margin-top: 10px;\">
            <form method=\"post\" action=\"";
        // line 35
        echo twig_escape_filter($this->env, site_url("plugins/bank_soal/search"), "html", null, true);
        echo "\">
                <select name=\"mapel_id\" class=\"form-control\">
                    <option value=\"0\">Semua Matapelajaran</option>
                    ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 39
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" ";
            echo ((((isset($context["mapel_id"]) ? $context["mapel_id"] : null) == $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"))) ? ("selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                </select>
                <input type=\"text\" name=\"q\" placeholder=\"cari soal...\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, (isset($context["keyword"]) ? $context["keyword"] : null), "html", null, true);
        echo "\">
                <button type=\"submit\" class=\"btn btn-primary\" style=\"margin-top:-10px;\"><i class=\"icon-search\"></i></button>
            </form>
        </div>
        <br>
        ";
        // line 47
        echo get_flashdata("bank");
        echo "

        ";
        // line 49
        echo form_open("plugins/bank_soal/simpan", array("id" => "form-tambah-pertanyaan"));
        echo "
            <div class=\"box-new-soal\"></div>
        ";
        // line 51
        echo form_close();
        echo "

        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"5%\">ID</th>
                    <th>Pertanyaan</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 63
            echo "                <tr>
                    <td><b>";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "</b></td>
                    <td>
                        ";
            // line 66
            echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
            echo "

                        ";
            // line 68
            if ((!twig_test_empty($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci")))) {
                // line 69
                echo "                        <table class=\"table table-condensed\" style=\"margin-bottom: 10px;margin-top:10px;\">
                            <tr>
                                <td width=\"5%\"><b>A</b></td>
                                <td>
                                    ";
                // line 73
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_a")));
                echo "
                                    ";
                // line 74
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "a")) {
                    // line 75
                    echo "                                    <div style=\"display:block;\"><span class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci jawaban</span></div>
                                    ";
                }
                // line 77
                echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>B</b></td>
                                <td>
                                    ";
                // line 82
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_b")));
                echo "
                                    ";
                // line 83
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "b")) {
                    // line 84
                    echo "                                    <div style=\"display:block;\"><span class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci jawaban</span></div>
                                    ";
                }
                // line 86
                echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>C</b></td>
                                <td>
                                    ";
                // line 91
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_c")));
                echo "
                                    ";
                // line 92
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "c")) {
                    // line 93
                    echo "                                    <div style=\"display:block;\"><span class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci jawaban</span></div>
                                    ";
                }
                // line 95
                echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>D</b></td>
                                <td>
                                    ";
                // line 100
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_d")));
                echo "
                                    ";
                // line 101
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "d")) {
                    // line 102
                    echo "                                    <div style=\"display:block;\"><span class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci jawaban</span></div>
                                    ";
                }
                // line 104
                echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>E</b></td>
                                <td>
                                    ";
                // line 109
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_e")));
                echo "
                                    ";
                // line 110
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "e")) {
                    // line 111
                    echo "                                    <div style=\"display:block;\"><span class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci jawaban</span></div>
                                    ";
                }
                // line 113
                echo "                                </td>
                            </tr>
                        </table>
                        ";
            }
            // line 117
            echo "                        <div style=\"display:block;\"><b>Pembuat: <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "user"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "user"), "nama"), "html", null, true);
            echo "</a></b>, <b>Matapelajaran: </b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "mapel"), "nama"), "html", null, true);
            echo "</div>
                    </td>
                    <td>
                        <div class=\"btn-group\">
                            <a href=\"";
            // line 121
            echo twig_escape_filter($this->env, site_url(((("plugins/bank_soal/edit/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
            echo "\" class=\"btn btn-small btn-primary\"><i class=\"icon icon-edit\"></i> Edit</a>
                            <a href=\"";
            // line 122
            echo twig_escape_filter($this->env, site_url(((("plugins/bank_soal/delete/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin ingin menghapus?')\" class=\"btn btn-small btn-default\"><i class=\"icon icon-trash\"></i> Hapus</a>
                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 127
        echo "            </tbody>
        </table>
        <br>
        ";
        // line 130
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "bank-soal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 130,  279 => 127,  268 => 122,  264 => 121,  252 => 117,  246 => 113,  242 => 111,  240 => 110,  236 => 109,  229 => 104,  225 => 102,  223 => 101,  219 => 100,  212 => 95,  208 => 93,  206 => 92,  202 => 91,  195 => 86,  191 => 84,  189 => 83,  185 => 82,  178 => 77,  174 => 75,  172 => 74,  168 => 73,  162 => 69,  160 => 68,  155 => 66,  150 => 64,  147 => 63,  143 => 62,  129 => 51,  124 => 49,  119 => 47,  111 => 42,  108 => 41,  95 => 39,  91 => 38,  85 => 35,  79 => 32,  75 => 31,  66 => 25,  62 => 23,  59 => 22,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
