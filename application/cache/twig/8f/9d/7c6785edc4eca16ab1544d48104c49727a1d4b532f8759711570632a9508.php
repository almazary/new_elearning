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
        echo form_open_multipart("welcome/pengaturan", array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Nama sekolah <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama-sekolah\" class=\"span8\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, set_value("nama-sekolah", get_pengaturan("nama-sekolah", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 20
        echo form_error("nama-sekolah");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Alamat sekolah <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"alamat\" class=\"span8\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, set_value("alamat", get_pengaturan("alamat", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 27
        echo form_error("alamat");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Telpon</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"telp\" class=\"span5\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, set_value("telp", get_pengaturan("telp", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 34
        echo form_error("telp");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Registrasi siswa</label>
                <div class=\"controls\">
                    <label class=\"radio inline\">
                        <input type=\"radio\" name=\"registrasi-siswa\" value=\"1\" ";
        // line 41
        echo twig_escape_filter($this->env, set_radio("registrasi-siswa", "1", (((get_pengaturan("registrasi-siswa", "value") == "1")) ? (true) : (""))), "html", null, true);
        echo "> Tampilkan
                    </label>
                    <label class=\"radio inline\">
                        <input type=\"radio\" name=\"registrasi-siswa\" value=\"0\" ";
        // line 44
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
        // line 52
        echo twig_escape_filter($this->env, set_radio("registrasi-pengajar", "1", (((get_pengaturan("registrasi-pengajar", "value") == "1")) ? (true) : (""))), "html", null, true);
        echo "> Tampilkan
                    </label>
                    <label class=\"radio inline\">
                        <input type=\"radio\" name=\"registrasi-pengajar\" value=\"0\" ";
        // line 55
        echo twig_escape_filter($this->env, set_radio("registrasi-pengajar", "0", (((get_pengaturan("registrasi-pengajar", "value") == "0")) ? (true) : (""))), "html", null, true);
        echo "> Sembunyikan
                    </label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Info Registrasi</label>
                <div class=\"controls\">
                    <textarea name=\"info-registrasi\" class=\"tinymce\" style=\"width:100%; height:300px;\">";
        // line 62
        echo set_value("info-registrasi", get_pengaturan("info-registrasi", "value"));
        echo "</textarea>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Peraturan E-learning</label>
                <div class=\"controls\">
                    <textarea name=\"peraturan-elearning\" class=\"tinymce\" style=\"width:100%; height:300px;\">";
        // line 68
        echo set_value("peraturan-elearning", get_pengaturan("peraturan-elearning", "value"));
        echo "</textarea>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Email server</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"email-server\" class=\"span5\" value=\"";
        // line 74
        echo twig_escape_filter($this->env, set_value("email-server", get_pengaturan("email-server", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 75
        echo form_error("email-server");
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
        // line 89
        if (get_pengaturan("img-slide-1", "value")) {
            // line 90
            echo "                                        <a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan/?delete-img=1"), "html", null, true);
            echo "\" class=\"pull-right\" title=\"Hapus gambar\"><i class=\"icon-trash\"></i></a>
                                        <img src=\"";
            // line 91
            echo twig_escape_filter($this->env, get_url_image(get_pengaturan("img-slide-1", "value")), "html", null, true);
            echo "\" class=\"img-polaroid\" style=\"max-height: 150px;margin-bottom:10px;\">
                                        <br>Ganti gambar :
                                        ";
        }
        // line 94
        echo "                                        <input type=\"file\" name=\"img-slide-1\">
                                    </div>
                                </div>
                                <div class=\"row-fluid\" style=\"margin-bottom: 10px;margin-top: 10px;\">
                                    <div class=\"span2\">
                                        Info gambar 1
                                    </div>
                                    <div class=\"span10\">
                                        <textarea name=\"info-slide-1\" class=\"span12\" placeholder=\"text atau html\">";
        // line 102
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
        // line 114
        if (get_pengaturan("img-slide-2", "value")) {
            // line 115
            echo "                                        <a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan/?delete-img=2"), "html", null, true);
            echo "\" class=\"pull-right\" title=\"Hapus gambar\"><i class=\"icon-trash\"></i></a>
                                        <img src=\"";
            // line 116
            echo twig_escape_filter($this->env, get_url_image(get_pengaturan("img-slide-2", "value")), "html", null, true);
            echo "\" class=\"img-polaroid\" style=\"max-height: 150px;margin-bottom:10px;\">
                                        <br>Ganti gambar :
                                        ";
        }
        // line 119
        echo "                                        <input type=\"file\" name=\"img-slide-2\">
                                    </div>
                                </div>
                                <div class=\"row-fluid\" style=\"margin-bottom: 10px;margin-top: 10px;\">
                                    <div class=\"span2\">
                                        Info gambar 2
                                    </div>
                                    <div class=\"span10\">
                                        <textarea name=\"info-slide-2\" class=\"span12\" placeholder=\"text atau html\">";
        // line 127
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
        // line 139
        if (get_pengaturan("img-slide-3", "value")) {
            // line 140
            echo "                                        <a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan/?delete-img=3"), "html", null, true);
            echo "\" class=\"pull-right\" title=\"Hapus gambar\"><i class=\"icon-trash\"></i></a>
                                        <img src=\"";
            // line 141
            echo twig_escape_filter($this->env, get_url_image(get_pengaturan("img-slide-3", "value")), "html", null, true);
            echo "\" class=\"img-polaroid\" style=\"max-height: 150px;margin-bottom:10px;\">
                                        <br>Ganti gambar :
                                        ";
        }
        // line 144
        echo "                                        <input type=\"file\" name=\"img-slide-3\">
                                    </div>
                                </div>
                                <div class=\"row-fluid\" style=\"margin-bottom: 10px;margin-top: 10px;\">
                                    <div class=\"span2\">
                                        Info gambar 3
                                    </div>
                                    <div class=\"span10\">
                                        <textarea name=\"info-slide-3\" class=\"span12\" placeholder=\"text atau html\">";
        // line 152
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
        // line 164
        if (get_pengaturan("img-slide-4", "value")) {
            // line 165
            echo "                                        <a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan/?delete-img=4"), "html", null, true);
            echo "\" class=\"pull-right\" title=\"Hapus gambar\"><i class=\"icon-trash\"></i></a>
                                        <img src=\"";
            // line 166
            echo twig_escape_filter($this->env, get_url_image(get_pengaturan("img-slide-4", "value")), "html", null, true);
            echo "\" class=\"img-polaroid\" style=\"max-height: 150px;margin-bottom:10px;\">
                                        <br>Ganti gambar :
                                        ";
        }
        // line 169
        echo "                                        <input type=\"file\" name=\"img-slide-4\">
                                    </div>
                                </div>
                                <div class=\"row-fluid\" style=\"margin-bottom: 10px;margin-top: 10px;\">
                                    <div class=\"span2\">
                                        Info gambar 4
                                    </div>
                                    <div class=\"span10\">
                                        <textarea name=\"info-slide-4\" class=\"span12\" placeholder=\"text atau html\">";
        // line 177
        echo set_value("info-slide-4", get_pengaturan("info-slide-4", "value"));
        echo "</textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                </div>
            </div>
        ";
        // line 191
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
        return array (  327 => 191,  310 => 177,  300 => 169,  294 => 166,  289 => 165,  287 => 164,  272 => 152,  262 => 144,  256 => 141,  251 => 140,  249 => 139,  234 => 127,  224 => 119,  218 => 116,  213 => 115,  211 => 114,  196 => 102,  186 => 94,  180 => 91,  175 => 90,  173 => 89,  156 => 75,  152 => 74,  143 => 68,  134 => 62,  124 => 55,  118 => 52,  107 => 44,  101 => 41,  91 => 34,  87 => 33,  78 => 27,  74 => 26,  65 => 20,  61 => 19,  54 => 15,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
