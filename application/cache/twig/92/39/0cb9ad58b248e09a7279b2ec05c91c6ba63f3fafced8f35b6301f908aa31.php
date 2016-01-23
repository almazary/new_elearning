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
    hr.hr1 {
        margin-top: 5px;
    }
    .no-list {
        padding-left: 0px;
        list-style: outside none none;
        margin-top: 20px;
        margin-right: 12px;
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
        background-color: #e2e7ec;
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
    .nomor-navigasi.affix {
        margin-top: 5px;
    }
    .clock.affix {
        margin-top: -50px;
        margin-left: 60px;
    }
</style>
";
    }

    // line 97
    public function block_content($context, array $blocks = array())
    {
        // line 98
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <div class=\"row-fluid\">
            <div class=\"span6\">
                <h1 class=\"title\">";
        // line 102
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo "</h1>
            </div>
            <div class=\"span6\">
                <ul class=\"unstyled inline pull-right user-info\">
                    <li><b>";
        // line 106
        echo twig_escape_filter($this->env, nama_panggilan(get_sess_data("user", "nama")), "html", null, true);
        echo "</b></li>
                    <li><img src=\"";
        // line 107
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
        // line 115
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") != 1)) {
            // line 116
            echo "                    <div class=\"span8\">
                        <b>Informasi : </b><br>
                        ";
            // line 118
            echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "info")));
            echo "
                    </div>
                    <div class=\"span4\">
                        <div class=\"pull-right clock\" data-spy=\"affix\" data-offset-top=\"60\" data-offset-bottom=\"200\">
                            <div class=\"iosl-theme-wrapper countdown\">
                                <div class=\"iosl-theme\">
                                    <ul>
                                        <li><p><span><em><b class=\"hours\">00</b><i class=\"hoursSlider\"><u>00</u><u>00</u></i></em></span></p></li>
                                        <li><p><span><em><b class=\"minutes\">00</b><i class=\"minutesSlider\"><u>00</u><u>00</u></i></em></span></p></li>
                                        <li><p><span><em><b class=\"seconds\">00</b><i class=\"secondsSlider\"><u>00</u><u>00</u></i></em></span></p></li>
                                    </ul>
                                    <div class=\"jC-clear\"></div>
                                    <p class=\"jCtext\">
                                        <span><em class=\"textSeconds\">SECONDS</em></span>
                                        <span><em class=\"textMinutes\">MINUTES</em></span>
                                        <span><em class=\"textHours\">HOURS</em></span>
                                    </p>
                                    <div class=\"jC-clear\"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
        } else {
            // line 141
            echo "                    <div class=\"span6\">
                        <b>Informasi : </b><br>
                        ";
            // line 143
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
            // line 153
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
            // line 161
            echo get_flashdata("upload");
            echo "
                                </div>
                            </div>
                            ";
            // line 164
            echo form_close();
            echo "
                        </div>
                    </div>
                    ";
        }
        // line 168
        echo "                </div>

                ";
        // line 170
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) {
            // line 171
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
            // line 181
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
            foreach ($context['_seq'] as $context["no"] => $context["p"]) {
                // line 182
                echo "                                    <tr id=\"pertanyaan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                        <td><b>";
                // line 183
                echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
                echo ".</b></td>
                                        <td>
                                            <div class=\"pertanyaan\">
                                                ";
                // line 186
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
                echo "
                                            </div>

                                            <div id=\"pilihan-";
                // line 189
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                                <table class=\"table table-condensed table-striped\">
                                                    <tbody>
                                                        ";
                // line 192
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                    if ((!twig_test_empty($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten")))) {
                        // line 193
                        echo "                                                        <tr>
                                                            <td style=\"width:30px;\"><label class=\"label-radio\"><input ";
                        // line 194
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
                        // line 196
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
                // line 200
                echo "
                                                        ";
                // line 201
                if ((!twig_test_empty($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), array(), "array")))) {
                    // line 202
                    echo "                                                        <tr id=\"ragu-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                    echo "\" class=\"warning\">
                                                            <td colspan=\"2\">
                                                                <label class=\"checkbox\">
                                                                    <input type=\"checkbox\" name=\"ragu\" onclick=\"update_ragu(this.checked, ";
                    // line 205
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
                // line 210
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
            // line 218
            echo "                                </tbody>
                            </table>

                            ";
            // line 221
            echo (isset($context["pagination"]) ? $context["pagination"] : null);
            echo "

                            <div class=\"well well-sm\">
                                <a class=\"btn btn-large btn-primary pull-right\" href=\"";
            // line 224
            echo twig_escape_filter($this->env, site_url(((("tugas/finish/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin ingin mengahiri pengerjaan tugas ini?')\">Selesai</a>
                                <p class=\"p-info\">Mohon periksa kembali jawaban anda sebelum menekan tombol <b>selesai</b>.</p>
                                <br>
                            </div>
                        </div>
                        <div class=\"span2\">
                            <div class=\"nomor-navigasi\" data-spy=\"affix\" data-offset-top=\"10\">
                                <ul class=\"no-list\">
                                    ";
            // line 232
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan_id"));
            foreach ($context['_seq'] as $context["no"] => $context["p_id"]) {
                // line 233
                echo "                                        ";
                $context["no_class"] = "";
                // line 234
                echo "                                        ";
                if (((!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ragu"))) && in_array((isset($context["p_id"]) ? $context["p_id"] : null), $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ragu")))) {
                    // line 235
                    echo "                                            ";
                    $context["no_class"] = "ragu";
                    // line 236
                    echo "                                        ";
                } elseif ((!twig_test_empty($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), (isset($context["p_id"]) ? $context["p_id"] : null), array(), "array")))) {
                    // line 237
                    echo "                                            ";
                    $context["no_class"] = "success";
                    // line 238
                    echo "                                        ";
                }
                // line 239
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
            // line 241
            echo "                                </ul>
                            </div>
                        </div>
                    </div>

                ";
        }
        // line 247
        echo "

                ";
        // line 249
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 2)) {
            // line 250
            echo "                    ";
            echo form_open(((("tugas/submit_essay/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id")));
            echo "
                    <input type=\"hidden\" id=\"str_id\" value=\"";
            // line 251
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
            // line 260
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
            foreach ($context['_seq'] as $context["no"] => $context["p"]) {
                // line 261
                echo "                            <tr id=\"pertanyaan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                <td><b>";
                // line 262
                echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
                echo ".</b></td>
                                <td>
                                    <div class=\"pertanyaan\">
                                        ";
                // line 265
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
                echo "
                                    </div>

                                    <textarea name=\"jawaban[";
                // line 268
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
            // line 274
            echo "                        </tbody>
                    </table>

                    ";
            // line 277
            echo (isset($context["pagination"]) ? $context["pagination"] : null);
            echo "

                    <div id=\"info-ajax-href\"></div>

                    <div class=\"well well-sm\">
                        <button type=\"submit\" class=\"btn btn-large btn-primary pull-right\" onclick=\"return confirm('Anda yakin ingin mengahiri pengerjaan tugas ini?')\">Selesai</button>
                        <p class=\"p-info\">Mohon periksa kembali jawaban anda sebelum menekan tombol <b>selesai</b>.</p>
                        <br>
                    </div>
                    ";
            // line 286
            echo form_close();
            echo "

                ";
        }
        // line 289
        echo "
            </div>
        </div>
    </div>
</div>
";
        // line 294
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") != 1)) {
            // line 295
            echo "<input type=\"hidden\" id=\"tugas_id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"sisa_menit\" value=\"";
            // line 296
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "sisa_menit"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"finish_url\" value=\"";
            // line 297
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
        return array (  525 => 297,  521 => 296,  516 => 295,  514 => 294,  507 => 289,  501 => 286,  489 => 277,  484 => 274,  468 => 268,  462 => 265,  456 => 262,  451 => 261,  447 => 260,  435 => 251,  430 => 250,  428 => 249,  424 => 247,  416 => 241,  401 => 239,  398 => 238,  395 => 237,  392 => 236,  389 => 235,  386 => 234,  383 => 233,  379 => 232,  368 => 224,  362 => 221,  357 => 218,  344 => 210,  332 => 205,  325 => 202,  323 => 201,  320 => 200,  309 => 196,  292 => 194,  289 => 193,  284 => 192,  278 => 189,  272 => 186,  266 => 183,  261 => 182,  257 => 181,  245 => 171,  243 => 170,  239 => 168,  232 => 164,  226 => 161,  215 => 153,  202 => 143,  198 => 141,  172 => 118,  168 => 116,  166 => 115,  155 => 107,  151 => 106,  144 => 102,  138 => 98,  135 => 97,  44 => 8,  41 => 7,  33 => 4,  30 => 3,);
    }
}
