<?php

/* admin_tugas/manajemen_soal.html */
class __TwigTemplate_4133d2ce361a8c79dda424812990f21778e34f3ec79457ab76472682f9857abf extends Twig_Template
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
            <h2>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul"), "html", null, true);
        echo "</h2>
            <div class=\"btn-group pull-right\">
                <a class=\"btn btn-default\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, site_url(((("admin/tugas/edit/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\"><i class=\"icon-edit\"></i> Edit Tugas</a>
                <a class=\"btn btn-default\"><i class=\"icon-ok\"></i> Terbitkan Tugas</a>
            </div>
            <label class=\"label label-warning\">Tipe : ";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type"), "html", null, true);
        echo "</label>
            <label class=\"label label-info\">Durasi : ";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "durasi"), "html", null, true);
        echo " Menit</label>
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
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "link_profil"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama"), "html", null, true);
        echo "</a></td>
                        <td>";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo "</td>
                        <td>";
        // line 34
        echo twig_escape_filter($this->env, get_indo_hari($this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "hari_id")), "html", null, true);
        echo "</td>
                        <td>";
        // line 35
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_mulai"), "H:i"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "jam_selesai"), "H:i"), "html", null, true);
        echo "</td>
                        <td>";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama"), "html", null, true);
        echo " <span class=\"badge badge-info\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "jumlah_siswa"), "html", null, true);
        echo " siswa</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_tugas/manajemen_soal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 36,  96 => 35,  92 => 34,  88 => 33,  82 => 32,  66 => 19,  62 => 18,  56 => 15,  51 => 13,  47 => 12,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
