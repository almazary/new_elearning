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
            <div class=\"row-fluid\">
                <div class=\"span11\">
                    <table class=\"table table-condensed table-striped\">
                        <thead>
                            <tr>
                                <th>Pengajar</th>
                                <th>Matapelajaran</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "link_profil"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama"), "html", null, true);
        echo "</a></td>
                                <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo "</td>
                                <td>";
        // line 28
        echo twig_escape_filter($this->env, get_indo_hari($this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "hari_id")), "html", null, true);
        echo "</td>
                                <td>";
        // line 29
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_mulai"), "H:i"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_selesai"), "H:i"), "html", null, true);
        echo "</td>
                                <td>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama"), "html", null, true);
        echo " <b>( ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "jumlah_siswa"), "html", null, true);
        echo " siswa)</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class=\"span1\">
                    <img src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "link_foto"), "html", null, true);
        echo "\" class=\"pull-right img-circle img-polaroid img-profile-top\">
                </div>
            </div>
        </div>

        <br>
        ";
        // line 42
        echo form_open_multipart(("admin/tugas/add/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")), array("class" => "form-horizontal row-fluid"));
        echo "
        <div class=\"control-group\">
            <label class=\"control-label\">Tipe Soal <span class=\"text-error\">*</span></label>
            <div class=\"controls\">
                <select name=\"type_id\" class=\"span2\">
                    <option value=\"\">--pilih--</option>
                    <option value=\"1\" ";
        // line 48
        echo twig_escape_filter($this->env, set_select("type_id", "1"), "html", null, true);
        echo ">Upload</option>
                    <option value=\"2\" ";
        // line 49
        echo twig_escape_filter($this->env, set_select("type_id", "2"), "html", null, true);
        echo ">Essay</option>
                    <option value=\"3\" ";
        // line 50
        echo twig_escape_filter($this->env, set_select("type_id", "3"), "html", null, true);
        echo ">Ganda</option>
                </select>
                <br>";
        // line 52
        echo form_error("type_id");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\">Judul Tugas <span class=\"text-error\">*</span></label>
            <div class=\"controls\">
                <input type=\"text\" name=\"judul\" class=\"span12\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, set_value("judul"), "html", null, true);
        echo "\">
                <br>";
        // line 59
        echo form_error("judul");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\">Durasi</label>
            <div class=\"controls\">
                <input type=\"text\" name=\"durasi\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, set_value("durasi"), "html", null, true);
        echo "\" class=\"span2\" placeholder=\"Dalam Menit\">
                <br><span class=\"text-muted\">Kusus untuk tipe soal <b>Pilihan Ganda</b> dan <b>Essay</b></span>
                <br>";
        // line 67
        echo form_error("durasi");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\">Info</label>
            <div class=\"controls\">
                <textarea name=\"info\" id=\"info\" style=\"height:150px;width:100%;\">";
        // line 73
        echo twig_escape_filter($this->env, set_value("info"), "html", null, true);
        echo "</textarea>
                ";
        // line 74
        echo form_error("info");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <div class=\"controls\">
                <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                <a href=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "link_profil"), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
            </div>
        </div>
        ";
        // line 83
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
        return array (  178 => 83,  172 => 80,  163 => 74,  159 => 73,  150 => 67,  145 => 65,  136 => 59,  132 => 58,  123 => 52,  118 => 50,  114 => 49,  110 => 48,  101 => 42,  92 => 36,  81 => 30,  75 => 29,  71 => 28,  67 => 27,  61 => 26,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
