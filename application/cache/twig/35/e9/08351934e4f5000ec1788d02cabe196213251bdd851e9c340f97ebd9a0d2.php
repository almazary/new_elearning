<?php

/* admin_tugas/edit.html */
class __TwigTemplate_35e908351934e4f5000ec1788d02cabe196213251bdd851e9c340f97ebd9a0d2 extends Twig_Template
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

        <div class=\"bs-callout bs-callout-info bs-callout-noborder\">
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
        echo form_open_multipart(((((("admin/tugas/edit/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . enurl_redirect((isset($context["uri_back"]) ? $context["uri_back"] : null))), array("class" => "form-horizontal row-fluid"));
        echo "
        <div class=\"control-group\">
            <label class=\"control-label\">Judul Tugas <span class=\"text-error\">*</span></label>
            <div class=\"controls\">
                <input type=\"text\" name=\"judul\" class=\"span12\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, set_value("judul", $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul")), "html", null, true);
        echo "\">
                <br>";
        // line 47
        echo form_error("judul");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\">Durasi</label>
            <div class=\"controls\">
                <input type=\"text\" name=\"durasi\" value=\"";
        // line 53
        echo twig_escape_filter($this->env, set_value("durasi", $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "durasi")), "html", null, true);
        echo "\" class=\"span2\" placeholder=\"Dalam Menit\">
                <br><span class=\"text-muted\">Kusus untuk tipe soal <b>Pilihan Ganda</b> dan <b>Essay</b></span>
                <br>";
        // line 55
        echo form_error("durasi");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\">Info</label>
            <div class=\"controls\">
                <textarea name=\"info\" id=\"info\" style=\"height:150px;width:100%;\">";
        // line 61
        echo set_value("info", $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "info"));
        echo "</textarea>
                ";
        // line 62
        echo form_error("info");
        echo "
            </div>
        </div>
        <div class=\"control-group\">
            <div class=\"controls\">
                <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                ";
        // line 68
        echo anchor((isset($context["uri_back"]) ? $context["uri_back"] : null), "Kembali", array("class" => "btn"));
        echo "
            </div>
        </div>
        ";
        // line 71
        echo form_close();
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_tugas/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 71,  148 => 68,  139 => 62,  135 => 61,  126 => 55,  121 => 53,  112 => 47,  108 => 46,  101 => 42,  92 => 36,  81 => 30,  75 => 29,  71 => 28,  67 => 27,  61 => 26,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
