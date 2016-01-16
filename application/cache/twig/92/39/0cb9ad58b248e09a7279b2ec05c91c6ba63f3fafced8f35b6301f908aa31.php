<?php

/* ujian-online.html */
class __TwigTemplate_92390cb9ad58b248e09a7279b2ec05c91c6ba63f3fafced8f35b6301f908aa31 extends Twig_Template
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
        font-size: 20px;
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
        width: 280px;
    }
    .affix {
        position: fixed;
        margin-top: -60px;
    }
    hr.hr1 {
        margin-top: 5px;
    }
    .no-list {
        padding-left: 0px;
        list-style: outside none none;
        margin-top: 20px;
    }
    .no-list li {
        width: 12.5%;
        font-size: 12px;
    }
    .no-list li {
        float: left;
        width: 25%;
        padding: 10px;
        font-size: 15px;
        line-height: 1.4;
        text-align: center;
        border: 1px solid #FFF;
        background-color: #F9F9F9;
    }
    .no-list li.success {
        background-color: green;
        color: white;
        font-weight: bold;
    }
    .no-list li.success > a {
        color: white;
    }
    .no-list li.ragu {
        background-color: #f89406;
        color: white;
        font-weight: bold;
    }
    .no-list li.ragu > a {
        color: white;
    }
    .nomor-navigasi {
        width: 180px;
    }
</style>
";
    }

    // line 93
    public function block_content($context, array $blocks = array())
    {
        // line 94
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <div class=\"row-fluid\">
            <div class=\"span6\">
                <h1 class=\"title\">";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo "</h1>
            </div>
            <div class=\"span6\">
                <ul class=\"unstyled inline pull-right user-info\">
                    <li><b>";
        // line 102
        echo twig_escape_filter($this->env, nama_panggilan(get_sess_data("user", "nama")), "html", null, true);
        echo "</b></li>
                    <li><img src=\"";
        // line 103
        echo twig_escape_filter($this->env, get_url_image_session(get_sess_data("user", "foto"), "medium", get_sess_data("user", "jenis_kelamin")), "html", null, true);
        echo "\" class=\"nav-avatar img-polaroid img-circle\" /></li>
                </ul>
            </div>
        </div>
        <hr class=\"hr-top\">
        <div class=\"wrap-content\">
            <div class=\"content\">
                <div class=\"row-fluid\">
                    ";
        // line 111
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") != 1)) {
            // line 112
            echo "                    <div class=\"span8\">
                        <b>Informasi : </b><br>
                        ";
            // line 114
            echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "info")));
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
            // line 123
            echo "                    <div class=\"span6\">
                        <b>Informasi : </b><br>
                        ";
            // line 125
            echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "info")));
            echo "
                        <br>
                        <small>
                        <b>Ekstensi file :</b><br>
                        doc, zip, rar, txt, docx, xls, xlsx, pdf, tar, gz, jpg, jpeg, JPG, JPEG, png, ppt, pptx
                        </small>
                    </div>
                    <div class=\"span6\">
                        <p><b>Upload file tugas anda : </b></p>
                        <div class=\"well well-sm\">
                            ";
            // line 135
            echo form_open_multipart(((("tugas/submit_upload/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id")));
            echo "
                            <input type=\"file\" name=\"userfile\">
                            <hr class=\"hr1\">
                            <div class=\"row-fluid\">
                                <div class=\"span3\">
                                    <button type=\"submit\" class=\"btn btn-primary\">Upload</button>
                                </div>
                                <div class=\"span9\">
                                    ";
            // line 143
            echo get_flashdata("upload");
            echo "
                                </div>
                            </div>
                            ";
            // line 146
            echo form_close();
            echo "
                        </div>
                    </div>
                    ";
        }
        // line 150
        echo "                </div>

                ";
        // line 152
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) {
            // line 153
            echo "                    <div class=\"row-fluid\">
                        <div class=\"span10\">
                            <table class=\"table datatable\">
                                <thead>
                                    <tr>
                                        <th style=\"width:40px;\">No</th>
                                        <th>Pertanyaan dan Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
            // line 163
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
            foreach ($context['_seq'] as $context["no"] => $context["p"]) {
                // line 164
                echo "                                    <tr id=\"pertanyaan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                        <td><b>";
                // line 165
                echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
                echo ".</b></td>
                                        <td>
                                            <div class=\"pertanyaan\">
                                                ";
                // line 168
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
                echo "
                                            </div>

                                            <div id=\"pilihan-";
                // line 171
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                                <table class=\"table table-condensed table-striped\">
                                                    <tbody>
                                                        ";
                // line 174
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                    if ((!twig_test_empty($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten")))) {
                        // line 175
                        echo "                                                        <tr>
                                                            <td style=\"width:30px;\"><label class=\"label-radio\"><input ";
                        // line 176
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
                        // line 178
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
                // line 182
                echo "
                                                        ";
                // line 183
                if ((!twig_test_empty($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), array(), "array")))) {
                    // line 184
                    echo "                                                        <tr id=\"ragu-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                    echo "\" class=\"warning\">
                                                            <td colspan=\"2\">
                                                                <label class=\"checkbox\">
                                                                    <input type=\"checkbox\" name=\"ragu\" onclick=\"update_ragu(this.checked, ";
                    // line 187
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                    echo ")\" ";
                    echo ((((!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ragu"))) && in_array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ragu")))) ? ("checked") : (""));
                    echo "> <b>Masih ragu-ragu</b>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        ";
                }
                // line 192
                echo "                                                    </tbody>
                                                </table>
                                            </div>

                                        </td>
                                    </tr>

                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['no'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 200
            echo "                                </tbody>
                            </table>

                            ";
            // line 203
            echo (isset($context["pagination"]) ? $context["pagination"] : null);
            echo "

                            <div class=\"well well-sm\">
                                <a class=\"btn btn-large btn-primary pull-right\" href=\"";
            // line 206
            echo twig_escape_filter($this->env, site_url(((("tugas/finish/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin ingin mengahiri pengerjaan tugas ini?')\">Selesai</a>
                                <p class=\"p-info\">Mohon periksa kembali jawaban anda sebelum menekan tombol <b>selesai</b>.</p>
                                <br>
                            </div>
                        </div>
                        <div class=\"span2\">
                            <div class=\"nomor-navigasi\" data-spy=\"affix\" data-offset-top=\"60\">
                                <ul class=\"no-list\">
                                    ";
            // line 214
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan_id"));
            foreach ($context['_seq'] as $context["no"] => $context["p_id"]) {
                // line 215
                echo "                                        ";
                $context["no_class"] = "";
                // line 216
                echo "                                        ";
                if (((!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ragu"))) && in_array((isset($context["p_id"]) ? $context["p_id"] : null), $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ragu")))) {
                    // line 217
                    echo "                                            ";
                    $context["no_class"] = "ragu";
                    // line 218
                    echo "                                        ";
                } elseif ((!twig_test_empty($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), (isset($context["p_id"]) ? $context["p_id"] : null), array(), "array")))) {
                    // line 219
                    echo "                                            ";
                    $context["no_class"] = "success";
                    // line 220
                    echo "                                        ";
                }
                // line 221
                echo "                                        <li id=\"no-pertanyaan-";
                echo twig_escape_filter($this->env, (isset($context["p_id"]) ? $context["p_id"] : null), "html", null, true);
                echo "\" class=\"";
                echo twig_escape_filter($this->env, (isset($context["no_class"]) ? $context["no_class"] : null), "html", null, true);
                echo "\"><a href=\"";
                echo twig_escape_filter($this->env, site_url(((((("plugins/custom_tugas/kerjakan/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["halaman"]) ? $context["halaman"] : null), (isset($context["p_id"]) ? $context["p_id"] : null), array(), "array")) . "#pertanyaan-") . (isset($context["p_id"]) ? $context["p_id"] : null))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
                echo "</a></li>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['no'], $context['p_id'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 223
            echo "                                </ul>
                            </div>
                        </div>
                    </div>

                ";
        }
        // line 229
        echo "

                ";
        // line 231
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 2)) {
            // line 232
            echo "                    ";
            echo form_open(((("tugas/submit_essay/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id")));
            echo "
                    <input type=\"hidden\" id=\"str_id\" value=\"";
            // line 233
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "str_id"), "html", null, true);
            echo "\">
                    <table class=\"table datatable\">
                        <thead>
                            <tr>
                                <th width=\"5%\">No</th>
                                <th>Pertanyaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 242
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
            foreach ($context['_seq'] as $context["no"] => $context["p"]) {
                // line 243
                echo "                            <tr id=\"pertanyaan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                <td><b>";
                // line 244
                echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
                echo ".</b></td>
                                <td>
                                    <div class=\"pertanyaan\">
                                        ";
                // line 247
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
                echo "
                                    </div>

                                    <textarea name=\"jawaban[";
                // line 250
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
            unset($context['_seq'], $context['_iterated'], $context['no'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 256
            echo "                        </tbody>
                    </table>

                    ";
            // line 259
            echo (isset($context["pagination"]) ? $context["pagination"] : null);
            echo "

                    <div id=\"info-ajax-href\"></div>

                    <div class=\"well well-sm\">
                        <button type=\"submit\" class=\"btn btn-large btn-primary pull-right\" onclick=\"return confirm('Anda yakin ingin mengahiri pengerjaan tugas ini?')\">Selesai</button>
                        <p class=\"p-info\">Mohon periksa kembali jawaban anda sebelum menekan tombol <b>selesai</b>.</p>
                        <br>
                    </div>
                    ";
            // line 268
            echo form_close();
            echo "

                ";
        }
        // line 271
        echo "
            </div>
        </div>
    </div>
</div>
";
        // line 276
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") != 1)) {
            // line 277
            echo "<input type=\"hidden\" id=\"tugas_id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"final_date\" value=\"";
            // line 278
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "selesai"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"finish_url\" value=\"";
            // line 279
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
        return array (  507 => 279,  503 => 278,  498 => 277,  496 => 276,  489 => 271,  483 => 268,  471 => 259,  466 => 256,  450 => 250,  444 => 247,  438 => 244,  433 => 243,  429 => 242,  417 => 233,  412 => 232,  410 => 231,  406 => 229,  398 => 223,  383 => 221,  380 => 220,  377 => 219,  374 => 218,  371 => 217,  368 => 216,  365 => 215,  361 => 214,  350 => 206,  344 => 203,  339 => 200,  326 => 192,  314 => 187,  307 => 184,  305 => 183,  302 => 182,  291 => 178,  274 => 176,  271 => 175,  266 => 174,  260 => 171,  254 => 168,  248 => 165,  243 => 164,  239 => 163,  227 => 153,  225 => 152,  221 => 150,  214 => 146,  208 => 143,  197 => 135,  184 => 125,  180 => 123,  168 => 114,  164 => 112,  162 => 111,  151 => 103,  147 => 102,  140 => 98,  134 => 94,  131 => 93,  44 => 8,  41 => 7,  33 => 4,  30 => 3,);
    }
}
