<?php

/* pp-siswa.html */
class __TwigTemplate_ddbe86978e31e34bdf8da20ae6e19aaf6c259042e87caf47a7fd947e0813f2b1 extends Twig_Template
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
        echo "Profilku - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"panel panel-default\">
    <div class=\"panel-heading\">
        <strong>Profil Publik</strong>
        <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
            ";
        // line 12
        echo anchor(((("siswa/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Profil", array("class" => "iframe-4 btn btn-small btn-primary", "title" => "Edit Profil Siswa"));
        echo "
            ";
        // line 13
        echo anchor(((("siswa/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Foto", array("class" => "iframe-5 btn btn-small btn-primary", "title" => "Edit Foto Siswa"));
        echo "
        </div>
    </div>
    <div class=\"panel-body\">
        <table class=\"table\">
            <tr>
                <th bgcolor=\"#FBFBFB\" width=\"25%\" style=\"border-top: 0px;\">NIS</th>
                <td style=\"border-top: 0px;\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nis"), "html", null, true);
        echo "</td>
                <td rowspan=\"5\" width=\"15%\" style=\"border-top: 0px;\">
                    <img style=\"width:113px;\" class=\"img-polaroid\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "foto"), "medium", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin")), "html", null, true);
        echo "\">
                </td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Nama</th>
                <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nama"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Jenis Kelamin</th>
                <td>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Tahun Masuk</th>
                <td colspan=\"2\">";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tahun_masuk"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Tempat Lahir</th>
                <td>";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tempat_lahir"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Tanggal Lahir</th>
                <td>";
        // line 43
        echo twig_escape_filter($this->env, (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (tgl_indo($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"))) : ("")), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Agama</th>
                <td colspan=\"2\">";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Alamat</th>
                <td colspan=\"2\">";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "alamat"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Status</th>
                <td colspan=\"2\">
                    ";
        // line 56
        if (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 0)) {
            // line 57
            echo "                        Pending
                    ";
        } elseif (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 1)) {
            // line 59
            echo "                        Aktif
                    ";
        } elseif (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 2)) {
            // line 61
            echo "                        Blocking
                    ";
        } elseif (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 3)) {
            // line 63
            echo "                        Alumni
                    ";
        }
        // line 65
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
            </div>
            <div class=\"panel-body\">
                <table class=\"table table-striped\">
                <thead>
                    <tr>
                        <th width=\"5%\">No</th>
                        <th>Kelas</th>
                        ";
        // line 83
        if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
            // line 84
            echo "                            <th>Aktif</th>
                        ";
        }
        // line 86
        echo "                    </tr>
                </thead>
                <tbody>
                    ";
        // line 89
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["siswa_kelas"]) ? $context["siswa_kelas"] : null), "results"));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 90
            echo "                    <tr>
                        <td>";
            // line 91
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
                        <td>
                            ";
            // line 93
            echo twig_escape_filter($this->env, get_row_data("kelas_model", "retrieve", array(0 => $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "kelas_id"), 1 => true), "nama"), "html", null, true);
            echo "
                        </td>
                        ";
            // line 95
            if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
                // line 96
                echo "                        <td>
                            ";
                // line 97
                if (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "aktif") == 1)) {
                    // line 98
                    echo "                                <i class=\"icon icon-ok\"></i>
                            ";
                }
                // line 100
                echo "                        </td>
                        ";
            }
            // line 102
            echo "                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
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
        // line 114
        echo anchor(((("siswa/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Username", array("class" => "iframe-2 btn btn-small btn-primary", "title" => "Edit Username Siswa"));
        echo "
                    ";
        // line 115
        echo anchor(((("siswa/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Password", array("class" => "iframe-3 btn btn-small btn-primary", "title" => "Edit Password Siswa"));
        echo "
                </div>
            </div>
            <div class=\"panel-body\">
                <table class=\"table\">
                    <tbody>
                        <tr>
                            <th width=\"30%\" bgcolor=\"#FBFBFB\" style=\"border-top: 0px;\">Username</th>
                            <td style=\"border-top: 0px;\">
                                ";
        // line 124
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
        return "pp-siswa.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 124,  229 => 115,  225 => 114,  213 => 104,  206 => 102,  202 => 100,  198 => 98,  196 => 97,  193 => 96,  191 => 95,  186 => 93,  181 => 91,  178 => 90,  174 => 89,  169 => 86,  165 => 84,  163 => 83,  143 => 65,  139 => 63,  135 => 61,  131 => 59,  127 => 57,  125 => 56,  117 => 51,  110 => 47,  103 => 43,  96 => 39,  89 => 35,  82 => 31,  75 => 27,  67 => 22,  62 => 20,  52 => 13,  48 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
