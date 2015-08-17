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
        echo "> Sembuyikan
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
        echo "> Sembuyikan
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
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                </div>
            </div>
        ";
        // line 76
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
        return array (  154 => 76,  143 => 68,  134 => 62,  124 => 55,  118 => 52,  107 => 44,  101 => 41,  91 => 34,  87 => 33,  78 => 27,  74 => 26,  65 => 20,  61 => 19,  54 => 15,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
