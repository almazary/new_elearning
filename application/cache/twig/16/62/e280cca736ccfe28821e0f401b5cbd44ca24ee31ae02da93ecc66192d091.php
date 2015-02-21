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
    <div class=\"span12\">
        <div class=\"panel panel-default\" id=\"riwayat-kelas\">
            <div class=\"panel-heading\">
                <strong>Jadwal Matapelajaran Ajar</strong>
            </div>
            <div class=\"panel-body\">
                <div class=\"bs-callout bs-callout-info\">
                    <p>
                        Atur matapelajaran dan jadwal mengajar <b>";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama"), "html", null, true);
        echo "</b>.
                        <br><b>NB:</b> Jadwal tidak dapat di hapus, namun dapat di ubah menjadi tidak aktif.
                    </p>
                </div>
                <br>
                <table class=\"table\">
                    <thead>
                        <tr bgcolor=\"#fbfbfb\">
                            <th>HARI</th>
                            <th>MATAPELAJARAN DAN JAM</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 76
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(get_indo_hari());
        foreach ($context['_seq'] as $context["hari_id"] => $context["h"]) {
            // line 77
            echo "                        <tr>
                            <th width=\"15%\">";
            // line 78
            echo twig_escape_filter($this->env, (isset($context["h"]) ? $context["h"] : null), "html", null, true);
            echo "</th>
                            <td>
                                ";
            // line 80
            echo anchor(((((("admin/pengajar/add_ampuan/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")) . "/") . (isset($context["hari_id"]) ? $context["hari_id"] : null)), "Tambah", array("class" => "iframe btn btn-small btn-primary", "title" => ("Tambah jadwal hari " . (isset($context["h"]) ? $context["h"] : null))));
            echo "
                                ";
            // line 81
            $context["retrieve_all_ma"] = get_row_data("pengajar_model", "retrieve_all_ma", array(0 => (isset($context["hari_id"]) ? $context["hari_id"] : null), 1 => $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id"), 2 => null));
            // line 82
            echo "                                ";
            if ((!twig_test_empty((isset($context["retrieve_all_ma"]) ? $context["retrieve_all_ma"] : null)))) {
                // line 83
                echo "                                <table style=\"margin-top:10px;\" class=\"table table-condensed\">
                                    ";
                // line 84
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["retrieve_all_ma"]) ? $context["retrieve_all_ma"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["ma"]) {
                    // line 85
                    echo "                                        ";
                    $context["mk"] = get_row_data("mapel_model", "retrieve_kelas", array(0 => $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "mapel_kelas_id")));
                    // line 86
                    echo "                                        ";
                    $context["k"] = get_row_data("kelas_model", "retrieve", array(0 => $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "kelas_id")));
                    // line 87
                    echo "                                        ";
                    $context["m"] = get_row_data("mapel_model", "retrieve", array(0 => $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "mapel_id")));
                    // line 88
                    echo "                                        <tr ";
                    echo ((($this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "aktif") == 0)) ? ("class=\"error text-muted\"") : ("class=\"info text-info\""));
                    echo ">
                                            <td width=\"15%\">";
                    // line 89
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "jam_mulai"), "H:i"), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "jam_selesai"), "H:i"), "html", null, true);
                    echo "</td>
                                            <td>";
                    // line 90
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
                    echo "</td>
                                            <td width=\"20%\">";
                    // line 91
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
                    echo "</td>
                                            <td width=\"17%\">
                                                ";
                    // line 93
                    echo anchor(((((("admin/pengajar/edit_ampuan/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "id")), "<i class=\"icon-edit\"></i> Edit", array("title" => "Edit Jadwal Ajar", "class" => "iframe-6"));
                    echo " 
                                                ";
                    // line 94
                    echo anchor(("admin/tugas/add/" . $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "id")), "<i class=\"icon-tasks\"></i> Tugas");
                    echo "
                                            </td>
                                        </tr>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ma'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 98
                echo "                                </table>
                                ";
            }
            // line 100
            echo "                            </td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['hari_id'], $context['h'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class=\"row-fluid\">
    <div class=\"span5\">
        <div class=\"panel panel-default\" id=\"akun\">
            <div class=\"panel-heading\">
                <strong>Akun Login</strong>
                <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
                    ";
        // line 115
        echo anchor(((("admin/pengajar/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")), "Edit Username", array("class" => "iframe-2 btn btn-small btn-primary", "title" => "Edit Username pengajar"));
        echo "
                    ";
        // line 116
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
        // line 125
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
        return array (  248 => 125,  236 => 116,  232 => 115,  218 => 103,  210 => 100,  206 => 98,  196 => 94,  192 => 93,  187 => 91,  183 => 90,  177 => 89,  172 => 88,  169 => 87,  166 => 86,  163 => 85,  159 => 84,  156 => 83,  153 => 82,  151 => 81,  147 => 80,  142 => 78,  139 => 77,  135 => 76,  119 => 63,  102 => 48,  98 => 46,  94 => 44,  90 => 42,  88 => 41,  80 => 36,  73 => 32,  66 => 28,  59 => 24,  52 => 20,  44 => 15,  39 => 13,  29 => 6,  25 => 5,  19 => 1,);
    }
}
