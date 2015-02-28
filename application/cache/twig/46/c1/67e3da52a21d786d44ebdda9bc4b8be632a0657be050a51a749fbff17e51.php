<?php

/* admin_tugas/tambah_soal.html */
class __TwigTemplate_46c167e3da52a21d786d44ebdda9bc4b8be632a0657be050a51a749fbff17e51 extends Twig_Template
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
            <div class=\"btn-group pull-right\">
                <a class=\"btn btn-default\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, site_url(((("admin/tugas/edit/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\"><i class=\"icon-edit\"></i> Edit Tugas</a>
                <a class=\"btn btn-default\"><i class=\"icon-ok\"></i> Terbitkan Tugas</a>
            </div>
            <h2 style=\"line-height: 25px;margin-bottom: 15px;text-decoration: underline;\" data-toggle=\"collapse\" data-target=\"#demo\">";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul"), "html", null, true);
        echo "</h2>
            <div id=\"demo\" class=\"collapse\">
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

        <h3 style=\"margin-bottom: 0px;\">Tambah Soal</h3>

        <div class=\"well well-small\" style=\"box-shadow: none;\">
            ";
        // line 46
        echo form_open(((("admin/siswa/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["siswa_id"]) ? $context["siswa_id"] : null)));
        echo "
            <table class=\"table\">
                <tbody>
                    <tr>
                        <td colspan=\"2\" style=\"border-top: none;\">
                            <textarea id=\"question\" name=\"pertanyaan\" style=\"width:100%;height:200px;\"></textarea>
                            <br>

                            ";
        // line 54
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
            // line 55
            echo "                            <div class=\"option-form\"></div>
                            <a class=\"add-option\" href=\"javascript:void(0)\"><i class=\"icon-plus\"></i> Tamah Pilihan</a>
                            ";
        }
        // line 58
        echo "
                        </td>
                    </tr>
                    <tr>
                        <td colspan=\"2\">
                            <button class=\"btn btn-primary\" type=\"submit\">Simpan</button>
                            <a class=\"btn btn-default\" href=\"";
        // line 64
        echo twig_escape_filter($this->env, site_url(((("admin/tugas/soal/" . $this->getAttribute((isset($context["mapel_ajar"]) ? $context["mapel_ajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\">Batal</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            ";
        // line 69
        echo form_close();
        echo "
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_tugas/tambah_soal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 69,  140 => 64,  132 => 58,  127 => 55,  125 => 54,  114 => 46,  99 => 36,  93 => 35,  89 => 34,  85 => 33,  79 => 32,  63 => 19,  59 => 18,  54 => 16,  48 => 13,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
