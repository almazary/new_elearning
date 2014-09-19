<?php

/* default/admin_siswa/detail.html */
class __TwigTemplate_8149e4a583675965bab93b65c2332dbcf40163e8cca17fc1a43829041d412a4b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">
        <strong>Profil Siswa</strong>
        <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
            ";
        // line 5
        echo anchor(((("admin/siswa/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Profil", array("class" => "iframe-4 btn btn-small btn-primary", "title" => "Edit Profil Siswa"));
        echo "
            ";
        // line 6
        echo anchor(((("admin/siswa/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Foto", array("class" => "iframe-5 btn btn-small btn-primary", "title" => "Edit Foto Siswa"));
        echo "
        </div>
    </div>
    <div class=\"panel-body\">
        <table class=\"table\">
            <tr>
                <th bgcolor=\"#FBFBFB\" width=\"25%\">NIS</th>
                <td>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nis"), "html", null, true);
        echo "</td>
                <td rowspan=\"5\" width=\"15%\">
                    <img style=\"width:113px;\" class=\"img-polaroid\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "foto"), "medium", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin")), "html", null, true);
        echo "\">
                </td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Nama</th>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nama"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Jenis Kelamin</th>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Tahun Masuk</th>
                <td colspan=\"2\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tahun_masuk"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Tempat Lahir</th>
                <td>";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tempat_lahir"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Tanggal Lahir</th>
                <td>";
        // line 36
        echo twig_escape_filter($this->env, (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (tgl_indo($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"))) : ("")), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Agama</th>
                <td colspan=\"2\">";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Alamat</th>
                <td colspan=\"2\">";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "alamat"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Status</th>
                <td colspan=\"2\">
                    ";
        // line 49
        if (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 0)) {
            // line 50
            echo "                        Pending
                    ";
        } elseif (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 1)) {
            // line 52
            echo "                        Aktif
                    ";
        } elseif (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 2)) {
            // line 54
            echo "                        Blocking
                    ";
        } elseif (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 3)) {
            // line 56
            echo "                        Alumni
                    ";
        }
        // line 58
        echo "                </td>
            </tr>
        </table>
    </div>
</div>

<div class=\"row-fluid\">
    <div class=\"span6\">
        <div class=\"panel panel-default\" id=\"riwayat-kelas\">
            <div class=\"panel-heading\">
                <strong>Riwayat Kelas</strong>
                ";
        // line 69
        if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
            // line 70
            echo "                <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
                    ";
            // line 71
            echo anchor(((("admin/siswa/moved_class/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Pindah Kelas", array("class" => "iframe btn btn-small btn-primary", "title" => "Pindah siswa ke Kelas lain"));
            echo "
                </div>
                ";
        }
        // line 74
        echo "            </div>
            <div class=\"panel-body\">
                <table class=\"table table-striped\">
                <thead>
                    <tr>
                        <th width=\"5%\">No</th>
                        <th>Kelas</th>
                        ";
        // line 81
        if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
            // line 82
            echo "                            <th>Aktif</th>
                        ";
        }
        // line 84
        echo "                    </tr>
                </thead>
                <tbody>
                    ";
        // line 87
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["siswa_kelas"]) ? $context["siswa_kelas"] : null), "results"));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 88
            echo "                    <tr>
                        <td>";
            // line 89
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
                        <td>
                            ";
            // line 91
            echo twig_escape_filter($this->env, get_row_data("kelas_model", "retrieve", array(0 => $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "kelas_id")), "nama"), "html", null, true);
            echo "
                        </td>
                        ";
            // line 93
            if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
                // line 94
                echo "                        <td>
                            ";
                // line 95
                if (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "aktif") == 1)) {
                    // line 96
                    echo "                                <i class=\"icon icon-ok\"></i>
                            ";
                }
                // line 98
                echo "                        </td>
                        ";
            }
            // line 100
            echo "                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class=\"span6\">
        <div class=\"panel panel-default\" id=\"akun\">
            <div class=\"panel-heading\">
                <strong>Akun Login</strong>
                <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
                    ";
        // line 112
        echo anchor(((("admin/siswa/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Username", array("class" => "iframe-2 btn btn-small btn-primary", "title" => "Edit Username Siswa"));
        echo "
                    ";
        // line 113
        echo anchor(((("admin/siswa/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Password", array("class" => "iframe-3 btn btn-small btn-primary", "title" => "Edit Password Siswa"));
        echo "
                </div>
            </div>
            <div class=\"panel-body\">
                <table class=\"table\">
                    <tbody>
                        <tr>
                            <th width=\"30%\" bgcolor=\"#FBFBFB\">Username</th>
                            <td>
                                ";
        // line 122
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa_login"]) ? $context["siswa_login"] : null), "username"), "html", null, true);
        echo "
                            </td>
                        </tr>
                        <tr>
                            <th bgcolor=\"#FBFBFB\">Password</th>
                            <td>
                                *********
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "default/admin_siswa/detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 122,  219 => 113,  215 => 112,  203 => 102,  196 => 100,  192 => 98,  188 => 96,  186 => 95,  183 => 94,  181 => 93,  176 => 91,  171 => 89,  168 => 88,  164 => 87,  159 => 84,  155 => 82,  153 => 81,  144 => 74,  138 => 71,  135 => 70,  133 => 69,  120 => 58,  116 => 56,  112 => 54,  108 => 52,  104 => 50,  102 => 49,  94 => 44,  87 => 40,  80 => 36,  73 => 32,  66 => 28,  59 => 24,  52 => 20,  44 => 15,  39 => 13,  29 => 6,  25 => 5,  19 => 1,);
    }
}
