<?php

/* pengaturan.html */
class __TwigTemplate_8f9d7c6785edc4eca16ab1544d48104c49727a1d4b532f8759711570632a9508 extends Twig_Template
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
        echo "Pengaturan - ";
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
        <h3>Pengaturan</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("pengaturan");
        echo "

        ";
        // line 15
        if (is_demo_app()) {
            // line 16
            echo "            ";
            echo get_alert("warning", get_demo_msg());
            echo "
        ";
        }
        // line 18
        echo "
        ";
        // line 19
        echo form_open_multipart("welcome/pengaturan", array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Nama sekolah <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama-sekolah\" class=\"span8\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, set_value("nama-sekolah", get_pengaturan("nama-sekolah", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 24
        echo form_error("nama-sekolah");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Alamat sekolah <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"alamat\" class=\"span8\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, set_value("alamat", get_pengaturan("alamat", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 31
        echo form_error("alamat");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Telpon</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"telp\" class=\"span5\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, set_value("telp", get_pengaturan("telp", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 38
        echo form_error("telp");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Registrasi siswa</label>
                <div class=\"controls\">
                    <label class=\"radio inline\">
                        <input type=\"radio\" name=\"registrasi-siswa\" value=\"1\" ";
        // line 45
        echo twig_escape_filter($this->env, set_radio("registrasi-siswa", "1", (((get_pengaturan("registrasi-siswa", "value") == "1")) ? (true) : (""))), "html", null, true);
        echo "> Tampilkan
                    </label>
                    <label class=\"radio inline\">
                        <input type=\"radio\" name=\"registrasi-siswa\" value=\"0\" ";
        // line 48
        echo twig_escape_filter($this->env, set_radio("registrasi-siswa", "0", (((get_pengaturan("registrasi-siswa", "value") == "0")) ? (true) : (""))), "html", null, true);
        echo "> Sembunyikan
                    </label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Registrasi pengajar</label>
                <div class=\"controls\">
                    <label class=\"radio inline\">
                        <input type=\"radio\" name=\"registrasi-pengajar\" value=\"1\" ";
        // line 56
        echo twig_escape_filter($this->env, set_radio("registrasi-pengajar", "1", (((get_pengaturan("registrasi-pengajar", "value") == "1")) ? (true) : (""))), "html", null, true);
        echo "> Tampilkan
                    </label>
                    <label class=\"radio inline\">
                        <input type=\"radio\" name=\"registrasi-pengajar\" value=\"0\" ";
        // line 59
        echo twig_escape_filter($this->env, set_radio("registrasi-pengajar", "0", (((get_pengaturan("registrasi-pengajar", "value") == "0")) ? (true) : (""))), "html", null, true);
        echo "> Sembunyikan
                    </label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Info Registrasi</label>
                <div class=\"controls\">
                    <textarea name=\"info-registrasi\" class=\"tinymce\" style=\"width:100%; height:300px;\">";
        // line 66
        echo set_value("info-registrasi", get_pengaturan("info-registrasi", "value"));
        echo "</textarea>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Peraturan E-learning</label>
                <div class=\"controls\">
                    <textarea name=\"peraturan-elearning\" class=\"tinymce\" style=\"width:100%; height:300px;\">";
        // line 72
        echo set_value("peraturan-elearning", get_pengaturan("peraturan-elearning", "value"));
        echo "</textarea>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Email server</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"email-server\" class=\"span5\" value=\"";
        // line 78
        echo twig_escape_filter($this->env, set_value("email-server", get_pengaturan("email-server", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 79
        echo form_error("email-server");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">SMTP host</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"smtp-host\" class=\"span5\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, set_value("smtp-host", get_pengaturan("smtp-host", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 86
        echo form_error("smtp-host");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">SMTP username</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"smtp-username\" class=\"span5\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, set_value("smtp-username", get_pengaturan("smtp-username", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 93
        echo form_error("smtp-username");
        echo "
                </div>
            </div>
            ";
        // line 96
        if ((is_demo_app() == false)) {
            // line 97
            echo "            <div class=\"control-group\">
                <label class=\"control-label\">SMTP password</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"smtp-pass\" class=\"span5\" value=\"";
            // line 100
            echo twig_escape_filter($this->env, set_value("smtp-pass", get_pengaturan("smtp-pass", "value")), "html", null, true);
            echo "\">
                    <br>";
            // line 101
            echo form_error("smtp-pass");
            echo "
                </div>
            </div>
            ";
        }
        // line 105
        echo "            <div class=\"control-group\">
                <label class=\"control-label\">SMTP port</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"smtp-port\" class=\"span5\" value=\"";
        // line 108
        echo twig_escape_filter($this->env, set_value("smtp-port", get_pengaturan("smtp-port", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 109
        echo form_error("smtp-port");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Slider halaman login</label>
                <div class=\"controls\" style=\"background-color: #FBFBFB; padding: 10px;border-radius: 5px;\">
                    <table class=\"table table-condensed\">
                        <tr>
                            <td style=\"border-top: none;\">
                                <div class=\"row-fluid\">
                                    <div class=\"span2\" style=\"margin-bottom: 10px;\">
                                        Gambar 1
                                    </div>
                                    <div class=\"span10\">
                                        ";
        // line 123
        if (get_pengaturan("img-slide-1", "value")) {
            // line 124
            echo "                                        <a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan/?delete-img=1"), "html", null, true);
            echo "\" class=\"pull-right\" title=\"Hapus gambar\"><i class=\"icon-trash\"></i></a>
                                        <img src=\"";
            // line 125
            echo twig_escape_filter($this->env, get_url_image(get_pengaturan("img-slide-1", "value")), "html", null, true);
            echo "\" class=\"img-polaroid\" style=\"max-height: 150px;margin-bottom:10px;\">
                                        <br>Ganti gambar :
                                        ";
        }
        // line 128
        echo "                                        <input type=\"file\" name=\"img-slide-1\">
                                    </div>
                                </div>
                                <div class=\"row-fluid\" style=\"margin-bottom: 10px;margin-top: 10px;\">
                                    <div class=\"span2\">
                                        Info gambar 1
                                    </div>
                                    <div class=\"span10\">
                                        <textarea name=\"info-slide-1\" class=\"span12\" placeholder=\"text atau html\">";
        // line 136
        echo set_value("info-slide-1", get_pengaturan("info-slide-1", "value"));
        echo "</textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"border-top:1px dashed #fbfbfb;\">
                                <div class=\"row-fluid\">
                                    <div class=\"span2\" style=\"margin-bottom: 10px;\">
                                        Gambar 2
                                    </div>
                                    <div class=\"span10\">
                                        ";
        // line 148
        if (get_pengaturan("img-slide-2", "value")) {
            // line 149
            echo "                                        <a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan/?delete-img=2"), "html", null, true);
            echo "\" class=\"pull-right\" title=\"Hapus gambar\"><i class=\"icon-trash\"></i></a>
                                        <img src=\"";
            // line 150
            echo twig_escape_filter($this->env, get_url_image(get_pengaturan("img-slide-2", "value")), "html", null, true);
            echo "\" class=\"img-polaroid\" style=\"max-height: 150px;margin-bottom:10px;\">
                                        <br>Ganti gambar :
                                        ";
        }
        // line 153
        echo "                                        <input type=\"file\" name=\"img-slide-2\">
                                    </div>
                                </div>
                                <div class=\"row-fluid\" style=\"margin-bottom: 10px;margin-top: 10px;\">
                                    <div class=\"span2\">
                                        Info gambar 2
                                    </div>
                                    <div class=\"span10\">
                                        <textarea name=\"info-slide-2\" class=\"span12\" placeholder=\"text atau html\">";
        // line 161
        echo set_value("info-slide-2", get_pengaturan("info-slide-2", "value"));
        echo "</textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"border-top:1px dashed #fbfbfb;\">
                                <div class=\"row-fluid\">
                                    <div class=\"span2\" style=\"margin-bottom: 10px;\">
                                        Gambar 3
                                    </div>
                                    <div class=\"span10\">
                                        ";
        // line 173
        if (get_pengaturan("img-slide-3", "value")) {
            // line 174
            echo "                                        <a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan/?delete-img=3"), "html", null, true);
            echo "\" class=\"pull-right\" title=\"Hapus gambar\"><i class=\"icon-trash\"></i></a>
                                        <img src=\"";
            // line 175
            echo twig_escape_filter($this->env, get_url_image(get_pengaturan("img-slide-3", "value")), "html", null, true);
            echo "\" class=\"img-polaroid\" style=\"max-height: 150px;margin-bottom:10px;\">
                                        <br>Ganti gambar :
                                        ";
        }
        // line 178
        echo "                                        <input type=\"file\" name=\"img-slide-3\">
                                    </div>
                                </div>
                                <div class=\"row-fluid\" style=\"margin-bottom: 10px;margin-top: 10px;\">
                                    <div class=\"span2\">
                                        Info gambar 3
                                    </div>
                                    <div class=\"span10\">
                                        <textarea name=\"info-slide-3\" class=\"span12\" placeholder=\"text atau html\">";
        // line 186
        echo set_value("info-slide-3", get_pengaturan("info-slide-3", "value"));
        echo "</textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"border-top:1px dashed #fbfbfb;\">
                                <div class=\"row-fluid\">
                                    <div class=\"span2\" style=\"margin-bottom: 10px;\">
                                        Gambar 4
                                    </div>
                                    <div class=\"span10\">
                                        ";
        // line 198
        if (get_pengaturan("img-slide-4", "value")) {
            // line 199
            echo "                                        <a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan/?delete-img=4"), "html", null, true);
            echo "\" class=\"pull-right\" title=\"Hapus gambar\"><i class=\"icon-trash\"></i></a>
                                        <img src=\"";
            // line 200
            echo twig_escape_filter($this->env, get_url_image(get_pengaturan("img-slide-4", "value")), "html", null, true);
            echo "\" class=\"img-polaroid\" style=\"max-height: 150px;margin-bottom:10px;\">
                                        <br>Ganti gambar :
                                        ";
        }
        // line 203
        echo "                                        <input type=\"file\" name=\"img-slide-4\">
                                    </div>
                                </div>
                                <div class=\"row-fluid\" style=\"margin-bottom: 10px;margin-top: 10px;\">
                                    <div class=\"span2\">
                                        Info gambar 4
                                    </div>
                                    <div class=\"span10\">
                                        <textarea name=\"info-slide-4\" class=\"span12\" placeholder=\"text atau html\">";
        // line 211
        echo set_value("info-slide-4", get_pengaturan("info-slide-4", "value"));
        echo "</textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            ";
        // line 220
        if ((is_demo_app() == false)) {
            // line 221
            echo "            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                </div>
            </div>
            ";
        }
        // line 227
        echo "        ";
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "pengaturan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  402 => 227,  394 => 221,  392 => 220,  380 => 211,  370 => 203,  364 => 200,  359 => 199,  357 => 198,  342 => 186,  332 => 178,  326 => 175,  321 => 174,  319 => 173,  304 => 161,  294 => 153,  288 => 150,  283 => 149,  281 => 148,  266 => 136,  256 => 128,  250 => 125,  245 => 124,  243 => 123,  226 => 109,  222 => 108,  217 => 105,  210 => 101,  206 => 100,  201 => 97,  199 => 96,  193 => 93,  189 => 92,  180 => 86,  176 => 85,  167 => 79,  163 => 78,  154 => 72,  145 => 66,  135 => 59,  129 => 56,  118 => 48,  112 => 45,  102 => 38,  98 => 37,  89 => 31,  85 => 30,  76 => 24,  72 => 23,  65 => 19,  62 => 18,  56 => 16,  54 => 15,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
