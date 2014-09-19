<?php

/* default/admin_pengajar/detail.html */
class __TwigTemplate_1662e280cca736ccfe28821e0f401b5cbd44ca24ee31ae02da93ecc66192d091 extends Twig_Template
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
        <strong>Profil pengajar</strong>
        <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
            ";
        // line 5
        echo anchor(((("admin/pengajar/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")), "Edit Profil", array("class" => "iframe-4 btn btn-small btn-primary", "title" => "Edit Profil Pengajar"));
        echo "
            ";
        // line 6
        echo anchor(((("admin/pengajar/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")), "Edit Foto", array("class" => "iframe-5 btn btn-small btn-primary", "title" => "Edit Foto Pengajar"));
        echo "
        </div>
    </div>
    <div class=\"panel-body\">
        <table class=\"table\">
            <tr>
                <th bgcolor=\"#FBFBFB\" width=\"25%\">NIP</th>
                <td>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nip"), "html", null, true);
        echo "</td>
                <td rowspan=\"5\" width=\"15%\">
                    <img style=\"width:113px;\" class=\"img-polaroid\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, get_url_image_pengajar($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "foto"), "medium", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "jenis_kelamin")), "html", null, true);
        echo "\">
                </td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Nama</th>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Jenis Kelamin</th>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "jenis_kelamin"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Tempat Lahir</th>
                <td>";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tempat_lahir"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Tanggal Lahir</th>
                <td>";
        // line 32
        echo twig_escape_filter($this->env, (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (tgl_indo($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"))) : ("")), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Alamat</th>
                <td colspan=\"2\">";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "alamat"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th bgcolor=\"#FBFBFB\">Status</th>
                <td colspan=\"2\">
                    ";
        // line 41
        if (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == 0)) {
            // line 42
            echo "                        Pending
                    ";
        } elseif (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == 1)) {
            // line 44
            echo "                        Aktif
                    ";
        } elseif (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == 2)) {
            // line 46
            echo "                        Blocking
                    ";
        }
        // line 48
        echo "                </td>
            </tr>
        </table>
    </div>
</div>

<div class=\"row-fluid\">
    <div class=\"span7\">
        <div class=\"panel panel-default\" id=\"riwayat-kelas\">
            <div class=\"panel-heading\">
                <strong>Mapel Ajar</strong>
                <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
                    ";
        // line 60
        echo anchor(((("admin/pengajar/add_ampuan/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")), "Tambah", array("class" => "iframe btn btn-small btn-primary", "title" => "Tambah Matapelajaran Ajar"));
        echo "
                </div>
            </div>
            <div class=\"panel-body\">

            </div>
        </div>
    </div>
    <div class=\"span5\">
        <div class=\"panel panel-default\" id=\"akun\">
            <div class=\"panel-heading\">
                <strong>Akun Login</strong>
                <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
                    ";
        // line 73
        echo anchor(((("admin/pengajar/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")), "Edit Username", array("class" => "iframe-2 btn btn-small btn-primary", "title" => "Edit Username pengajar"));
        echo "
                    ";
        // line 74
        echo anchor(((("admin/pengajar/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")), "Edit Password", array("class" => "iframe-3 btn btn-small btn-primary", "title" => "Edit Password pengajar"));
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
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar_login"]) ? $context["pengajar_login"] : null), "username"), "html", null, true);
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
        return "default/admin_pengajar/detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 83,  136 => 74,  132 => 73,  116 => 60,  102 => 48,  98 => 46,  94 => 44,  90 => 42,  88 => 41,  80 => 36,  73 => 32,  66 => 28,  59 => 24,  52 => 20,  44 => 15,  39 => 13,  29 => 6,  25 => 5,  19 => 1,);
    }
}
