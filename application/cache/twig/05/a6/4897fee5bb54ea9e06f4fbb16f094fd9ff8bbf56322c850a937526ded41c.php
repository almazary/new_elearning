<?php

/* ujian-online.html */
class __TwigTemplate_05a64897fee5bb54ea9e06f4fbb16f094fd9ff8bbf56322c850a937526ded41c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-detail-materi.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-detail-materi.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo " - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<style type=\"text/css\">
    #clock {
        font-size: 25px;
        margin-top: 5px;
        font-weight: bold;
        text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.2);
    }
    .clock-info {
        font-weight: normal;
    }
    img.nav-avatar {
        width: 30px;
        height: 30px;
    }
    ul.user-info {
        margin-top: 10px;
        margin-bottom: 0px;
    }
    input.radio{
        margin-top: -3px;
    }
    .label-radio {
        font-weight: bold;
    }
    .well {
        border:2px dashed red;
    }
    .p-info {
        font-size: 18px;
    }
    .box-clock {
        background: rgb(245, 239, 230);
        border:1px dashed red;
        padding: 5px 10px 10px;
        border-radius: 5px;
    }
    .affix {
        position: fixed;
        margin-top: -60px;
    }
</style>
";
    }

    // line 51
    public function block_content($context, array $blocks = array())
    {
        // line 52
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <div class=\"row-fluid\">
            <div class=\"span9\">
                <h1 class=\"title\">";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo "</h1>
            </div>
            <div class=\"span3\">
                <ul class=\"unstyled inline pull-right user-info\">
                    <li><b>";
        // line 60
        echo twig_escape_filter($this->env, nama_panggilan(get_sess_data("user", "nama")), "html", null, true);
        echo "</b></li>
                    <li><img src=\"";
        // line 61
        echo twig_escape_filter($this->env, get_url_image_pengajar(get_sess_data("user", "foto"), "medium", get_sess_data("user", "jenis_kelamin")), "html", null, true);
        echo "\" class=\"nav-avatar img-polaroid img-circle\" /></li>
                </ul>
            </div>
        </div>
        <hr class=\"hr-top\">
        <div class=\"wrap-content\">
            <div class=\"content\">
                <div class=\"row-fluid\">
                    ";
        // line 69
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") != 1)) {
            // line 70
            echo "                    <div class=\"span8\">
                        <b>Informasi : </b><br>
                        ";
            // line 72
            echo $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "info");
            echo "
                    </div>
                    <div class=\"span4\">
                        <div class=\"box-clock\" data-spy=\"affix\" data-offset-top=\"60\" data-offset-bottom=\"200\">
                            <b>Siswa waktu : </b><br>
                            <div id=\"clock\"></div>
                        </div>
                    </div>
                    ";
        } else {
            // line 81
            echo "                    <div class=\"span12\">
                        <b>Informasi : </b><br>
                        ";
            // line 83
            echo $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "info");
            echo "
                    </div>
                    ";
        }
        // line 86
        echo "                </div>

                ";
        // line 88
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) {
            // line 89
            echo "                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th width=\"5%\">No</th>
                                <th>Pertanyaan ";
            // line 93
            echo ((($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) ? (" dan Pilihan") : (""));
            echo "</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 97
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 98
                echo "                            <tr id=\"pertanyaan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                <td><b>";
                // line 99
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "urutan"), "html", null, true);
                echo ".</b></td>
                                <td>
                                    <div class=\"pertanyaan\">
                                        ";
                // line 102
                echo html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan"));
                echo "
                                    </div>

                                    <div id=\"pilihan-";
                // line 105
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                        <table class=\"table table-condensed table-striped\">
                                            <tbody>
                                                ";
                // line 108
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                    // line 109
                    echo "                                                <tr>
                                                    <td width=\"5%\"><label class=\"label-radio\"><input ";
                    // line 110
                    echo ((is_pilih($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id"))) ? ("checked") : (""));
                    echo " type=\"radio\" name=\"pilihan-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan"), "html", null, true);
                    echo "\" onclick=\"update_ganda(";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id"), "html", null, true);
                    echo ")\" class=\"radio\"> ";
                    echo twig_escape_filter($this->env, get_abjad($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan")), "html", null, true);
                    echo "</label></td>
                                                    <td>
                                                        ";
                    // line 112
                    echo html_entity_decode($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten"));
                    echo "
                                                    </td>
                                                </tr>
                                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pil'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 116
                echo "                                            </tbody>
                                        </table>
                                    </div>

                                </td>
                            </tr>

                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 124
            echo "                        </tbody>
                    </table>

                    <div class=\"well well-sm\">
                        <a class=\"btn btn-large btn-primary pull-right\" href=\"";
            // line 128
            echo twig_escape_filter($this->env, site_url(((("tugas/finish/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin ingin mengahiri pengerjaan tugas ini?')\">Selesai</a>
                        <p class=\"p-info\">Mohon periksa kembali jawaban anda sebelum menekan tombol <b>selesai</b>.</p>
                        <br>
                    </div>

                ";
        }
        // line 134
        echo "

                ";
        // line 136
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 2)) {
            // line 137
            echo "                    ";
            echo form_open(((("tugas/submit_essay/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id")));
            echo "
                    <input type=\"hidden\" id=\"str_id\" value=\"";
            // line 138
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "str_id"), "html", null, true);
            echo "\">
                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th width=\"5%\">No</th>
                                <th>Pertanyaan ";
            // line 143
            echo ((($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) ? (" dan Pilihan") : (""));
            echo "</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 147
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 148
                echo "                            <tr id=\"pertanyaan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                <td><b>";
                // line 149
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "urutan"), "html", null, true);
                echo ".</b></td>
                                <td>
                                    <div class=\"pertanyaan\">
                                        ";
                // line 152
                echo html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan"));
                echo "
                                    </div>

                                    <textarea name=\"jawaban[";
                // line 155
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "]\" id=\"jawaban-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\" style=\"width:100%; height:300px;\">";
                echo get_jawaban($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"));
                echo "</textarea>

                                </td>
                            </tr>

                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 161
            echo "                        </tbody>
                    </table>

                    <div class=\"well well-sm\">
                        <button type=\"submit\" class=\"btn btn-large btn-primary pull-right\" onclick=\"return confirm('Anda yakin ingin mengahiri pengerjaan tugas ini?')\">Selesai</button>
                        <p class=\"p-info\">Mohon periksa kembali jawaban anda sebelum menekan tombol <b>selesai</b>.</p>
                        <br>
                    </div>
                    ";
            // line 169
            echo form_close();
            echo "

                ";
        }
        // line 172
        echo "
                ";
        // line 173
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 1)) {
            // line 174
            echo "                <div class=\"well well-sm\">
                    <div class=\"row-fluid\">
                        <div class=\"span4\">
                            <h4>Upload file tugas anda</h4>
                        </div>
                        <div class=\"span8\">
                            ";
            // line 180
            echo form_open_multipart(((("tugas/submit_upload/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id")));
            echo "
                            <input type=\"file\" name=\"userfile\">
                            <hr>
                            <button type=\"submit\" class=\"btn btn-primary\">Upload</button>
                            ";
            // line 184
            echo form_close();
            echo "
                        </div>
                    </div>
                </div>
                ";
        }
        // line 189
        echo "
            </div>
        </div>
    </div>
</div>
";
        // line 194
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") != 1)) {
            // line 195
            echo "<input type=\"hidden\" id=\"tugas_id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"final_date\" value=\"";
            // line 196
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "selesai"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"finish_url\" value=\"";
            // line 197
            echo twig_escape_filter($this->env, site_url(((("tugas/finish/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id"))), "html", null, true);
            echo "\">
";
        }
    }

    public function getTemplateName()
    {
        return "ujian-online.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  381 => 197,  377 => 196,  372 => 195,  370 => 194,  363 => 189,  355 => 184,  348 => 180,  340 => 174,  338 => 173,  335 => 172,  329 => 169,  319 => 161,  303 => 155,  297 => 152,  291 => 149,  286 => 148,  282 => 147,  275 => 143,  267 => 138,  262 => 137,  260 => 136,  256 => 134,  247 => 128,  241 => 124,  228 => 116,  218 => 112,  201 => 110,  198 => 109,  194 => 108,  188 => 105,  182 => 102,  176 => 99,  171 => 98,  167 => 97,  160 => 93,  154 => 89,  152 => 88,  148 => 86,  142 => 83,  138 => 81,  126 => 72,  122 => 70,  120 => 69,  109 => 61,  105 => 60,  98 => 56,  92 => 52,  89 => 51,  44 => 8,  41 => 7,  33 => 4,  30 => 3,);
    }
}
