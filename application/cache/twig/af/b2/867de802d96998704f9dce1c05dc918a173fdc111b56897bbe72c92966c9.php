<?php

/* admin_tugas/add.html */
class __TwigTemplate_afb2867de802d96998704f9dce1c05dc918a173fdc111b56897bbe72c92966c9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 6
        echo (isset($context["module_title"]) ? $context["module_title"] : null);
        echo "</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 9
        echo get_flashdata("tugas");
        echo "

        <div class=\"bs-callout bs-callout-info\">
            <img src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "link_foto"), "html", null, true);
        echo "\" class=\"pull-right img-circle img-polaroid img-profile-top\">
            Pengajar : <b><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "link_profil"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama"), "html", null, true);
        echo "</a></b>
            <ul class=\"inline unstyle\" style=\"margin-left: -5px;margin-bottom: 0px;\">
                <li>Matapelajaran :</li>
                <li><b>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo "</b></li>
                <li>Hari : <b>";
        // line 17
        echo twig_escape_filter($this->env, get_indo_hari($this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "hari_id")), "html", null, true);
        echo "</b></li>
                <li>Jam : <b>";
        // line 18
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_mulai"), "H:i"), "html", null, true);
        echo "</b> - <b>";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_selesai"), "H:i"), "html", null, true);
        echo "</b></li>
                <li><b>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama"), "html", null, true);
        echo "</b> ( ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "jumlah_siswa"), "html", null, true);
        echo " siswa)</li>
            </ul>
        </div>

        <br>
        ";
        // line 24
        echo form_open_multipart(("admin/tugas/add/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")), array("class" => "form-horizontal row-fluid"));
        echo "
        <div class=\"control-group\">
            <label class=\"control-label\">Type Soal <span class=\"text-error\">*</span></label>
            <div class=\"controls\">
                <select name=\"type\" class=\"span2\">
                    <option value=\"\">--pilih--</option>
                    <option value=\"1\" ";
        // line 30
        echo twig_escape_filter($this->env, set_select("type", "1"), "html", null, true);
        echo ">Upload</option>
                    <option value=\"2\" ";
        // line 31
        echo twig_escape_filter($this->env, set_select("type", "2"), "html", null, true);
        echo ">Essay</option>
                    <option value=\"3\" ";
        // line 32
        echo twig_escape_filter($this->env, set_select("type", "3"), "html", null, true);
        echo ">Ganda</option>
                </select>
                <br>";
        // line 34
        echo form_error("type");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\">Judul Tugas <span class=\"text-error\">*</span></label>
            <div class=\"controls\">
                <input type=\"text\" name=\"judul\" class=\"span12\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, set_value("judul"), "html", null, true);
        echo "\">
                <br>";
        // line 41
        echo form_error("judul");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\">Durasi <span class=\"text-error\">*</span></label>
            <div class=\"controls\">
                <input type=\"text\" name=\"durasi\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, set_value("durasi"), "html", null, true);
        echo "\" class=\"span2\" placeholder=\"Dalam Menit\">
                ";
        // line 48
        echo form_error("info");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\">Info</label>
            <div class=\"controls\">
                <textarea name=\"info\" id=\"info\" style=\"height:150px;width:100%;\">";
        // line 54
        echo twig_escape_filter($this->env, set_value("info"), "html", null, true);
        echo "</textarea>
                ";
        // line 55
        echo form_error("info");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <div class=\"controls\">
                <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                <a href=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "link_profil"), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
            </div>
        </div>
        ";
        // line 64
        echo form_close();
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_tugas/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 64,  153 => 61,  144 => 55,  140 => 54,  131 => 48,  127 => 47,  118 => 41,  114 => 40,  105 => 34,  100 => 32,  96 => 31,  92 => 30,  83 => 24,  73 => 19,  67 => 18,  63 => 17,  59 => 16,  51 => 13,  47 => 12,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
