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
</style>
";
    }

    // line 89
    public function block_content($context, array $blocks = array())
    {
        // line 90
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <div class=\"row-fluid\">
            <div class=\"span6\">
                <h1 class=\"title\">";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo "</h1>
            </div>
            <div class=\"span6\">
                <ul class=\"unstyled inline pull-right user-info\">
                    <li><b>";
        // line 98
        echo twig_escape_filter($this->env, nama_panggilan(get_sess_data("user", "nama")), "html", null, true);
        echo "</b></li>
                    <li><img src=\"";
        // line 99
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
        // line 107
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") != 1)) {
            // line 108
            echo "                    <div class=\"span8\">
                        <b>Informasi : </b><br>
                        ";
            // line 110
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
            // line 119
            echo "                    <div class=\"span6\">
                        <b>Informasi : </b><br>
                        ";
            // line 121
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
            // line 131
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
            // line 139
            echo get_flashdata("upload");
            echo "
                                </div>
                            </div>
                            ";
            // line 142
            echo form_close();
            echo "
                        </div>
                    </div>
                    ";
        }
        // line 146
        echo "                </div>

                ";
        // line 148
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) {
            // line 149
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
            // line 159
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
            foreach ($context['_seq'] as $context["no"] => $context["p"]) {
                // line 160
                echo "                                    <tr id=\"pertanyaan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                        <td><b>";
                // line 161
                echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
                echo ".</b></td>
                                        <td>
                                            <div class=\"pertanyaan\">
                                                ";
                // line 164
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
                echo "
                                            </div>

                                            <div id=\"pilihan-";
                // line 167
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                                <table class=\"table table-condensed table-striped\">
                                                    <tbody>
                                                        ";
                // line 170
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                    if ((!twig_test_empty($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten")))) {
                        // line 171
                        echo "                                                        <tr>
                                                            <td style=\"width:30px;\"><label class=\"label-radio\"><input ";
                        // line 172
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
                        // line 174
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
                // line 178
                echo "
                                                        ";
                // line 179
                if ((!twig_test_empty($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), array(), "array")))) {
                    // line 180
                    echo "                                                        <tr id=\"ragu-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                    echo "\" class=\"warning\">
                                                            <td colspan=\"2\">
                                                                <label class=\"checkbox\">
                                                                    <input type=\"checkbox\" name=\"ragu\" onclick=\"update_ragu(this.checked, ";
                    // line 183
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
                // line 188
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
            // line 196
            echo "                                </tbody>
                            </table>

                            ";
            // line 199
            echo (isset($context["pagination"]) ? $context["pagination"] : null);
            echo "

                            <div class=\"well well-sm\">
                                <a class=\"btn btn-large btn-primary pull-right\" href=\"";
            // line 202
            echo twig_escape_filter($this->env, site_url(((("tugas/finish/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin ingin mengahiri pengerjaan tugas ini?')\">Selesai</a>
                                <p class=\"p-info\">Mohon periksa kembali jawaban anda sebelum menekan tombol <b>selesai</b>.</p>
                                <br>
                            </div>
                        </div>
                        <div class=\"span2\">
                            <ul class=\"no-list\">
                                ";
            // line 209
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan_id"));
            foreach ($context['_seq'] as $context["no"] => $context["p_id"]) {
                // line 210
                echo "                                    ";
                $context["no_class"] = "";
                // line 211
                echo "                                    ";
                if (((!twig_test_empty($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ragu"))) && in_array((isset($context["p_id"]) ? $context["p_id"] : null), $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ragu")))) {
                    // line 212
                    echo "                                        ";
                    $context["no_class"] = "ragu";
                    // line 213
                    echo "                                    ";
                } elseif ((!twig_test_empty($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), (isset($context["p_id"]) ? $context["p_id"] : null), array(), "array")))) {
                    // line 214
                    echo "                                        ";
                    $context["no_class"] = "success";
                    // line 215
                    echo "                                    ";
                }
                // line 216
                echo "                                    <li id=\"no-pertanyaan-";
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
            // line 218
            echo "                            </ul>
                        </div>
                    </div>

                ";
        }
        // line 223
        echo "

                ";
        // line 225
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 2)) {
            // line 226
            echo "                    ";
            echo form_open(((("tugas/submit_essay/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id")));
            echo "
                    <input type=\"hidden\" id=\"str_id\" value=\"";
            // line 227
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
            // line 236
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
            foreach ($context['_seq'] as $context["no"] => $context["p"]) {
                // line 237
                echo "                            <tr id=\"pertanyaan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                <td><b>";
                // line 238
                echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
                echo ".</b></td>
                                <td>
                                    <div class=\"pertanyaan\">
                                        ";
                // line 241
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
                echo "
                                    </div>

                                    <textarea name=\"jawaban[";
                // line 244
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
            // line 250
            echo "                        </tbody>
                    </table>

                    ";
            // line 253
            echo (isset($context["pagination"]) ? $context["pagination"] : null);
            echo "

                    <div id=\"info-ajax-href\"></div>

                    <div class=\"well well-sm\">
                        <button type=\"submit\" class=\"btn btn-large btn-primary pull-right\" onclick=\"return confirm('Anda yakin ingin mengahiri pengerjaan tugas ini?')\">Selesai</button>
                        <p class=\"p-info\">Mohon periksa kembali jawaban anda sebelum menekan tombol <b>selesai</b>.</p>
                        <br>
                    </div>
                    ";
            // line 262
            echo form_close();
            echo "

                ";
        }
        // line 265
        echo "
            </div>
        </div>
    </div>
</div>
";
        // line 270
        if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") != 1)) {
            // line 271
            echo "<input type=\"hidden\" id=\"tugas_id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"final_date\" value=\"";
            // line 272
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "selesai"), "html", null, true);
            echo "\">
<input type=\"hidden\" id=\"finish_url\" value=\"";
            // line 273
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
        return array (  501 => 273,  497 => 272,  492 => 271,  490 => 270,  483 => 265,  477 => 262,  465 => 253,  460 => 250,  444 => 244,  438 => 241,  432 => 238,  427 => 237,  423 => 236,  411 => 227,  406 => 226,  404 => 225,  400 => 223,  393 => 218,  378 => 216,  375 => 215,  372 => 214,  369 => 213,  366 => 212,  363 => 211,  360 => 210,  356 => 209,  346 => 202,  340 => 199,  335 => 196,  322 => 188,  310 => 183,  303 => 180,  301 => 179,  298 => 178,  287 => 174,  270 => 172,  267 => 171,  262 => 170,  256 => 167,  250 => 164,  244 => 161,  239 => 160,  235 => 159,  223 => 149,  221 => 148,  217 => 146,  210 => 142,  204 => 139,  193 => 131,  180 => 121,  176 => 119,  164 => 110,  160 => 108,  158 => 107,  147 => 99,  143 => 98,  136 => 94,  130 => 90,  127 => 89,  44 => 8,  41 => 7,  33 => 4,  30 => 3,);
    }
}
