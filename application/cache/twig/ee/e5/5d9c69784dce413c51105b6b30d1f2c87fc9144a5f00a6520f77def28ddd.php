<?php

/* detail-pengajar.html */
class __TwigTemplate_eee55d9c69784dce413c51105b6b30d1f2c87fc9144a5f00a6520f77def28ddd extends Twig_Template
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
        echo "Detail Pengajar - ";
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
        <h3>";
        // line 10
        echo anchor(("pengajar/index/" . (isset($context["status_id"]) ? $context["status_id"] : null)), "Data Pengajar");
        echo " / Detail Pengajar</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("pengajar");
        echo "

        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <strong>Profil pengajar</strong>
                <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
                    ";
        // line 19
        echo anchor(((("pengajar/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")), "Edit Profil", array("class" => "iframe-4 btn btn-small btn-primary", "title" => "Edit Profil Pengajar"));
        echo "
                    ";
        // line 20
        echo anchor(((("pengajar/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")), "Edit Foto", array("class" => "iframe-5 btn btn-small btn-primary", "title" => "Edit Foto Pengajar"));
        echo "
                </div>
            </div>
            <div class=\"panel-body\">
                <table class=\"table\">
                    <tr>
                        <th bgcolor=\"#FBFBFB\" width=\"25%\">NIP</th>
                        <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nip"), "html", null, true);
        echo "</td>
                        <td rowspan=\"5\" width=\"15%\">
                            <img style=\"width:113px;\" class=\"img-polaroid\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, get_url_image_pengajar($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "foto"), "medium", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "jenis_kelamin")), "html", null, true);
        echo "\">
                        </td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Nama</th>
                        <td>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Jenis Kelamin</th>
                        <td>";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "jenis_kelamin"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Tempat Lahir</th>
                        <td>";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tempat_lahir"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Tanggal Lahir</th>
                        <td>";
        // line 46
        echo twig_escape_filter($this->env, (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (tgl_indo($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"))) : ("")), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Alamat</th>
                        <td colspan=\"2\">";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "alamat"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Status</th>
                        <td colspan=\"2\">
                            ";
        // line 55
        if (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == 0)) {
            // line 56
            echo "                                Pending
                            ";
        } elseif (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == 1)) {
            // line 58
            echo "                                Aktif
                            ";
        } elseif (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == 2)) {
            // line 60
            echo "                                Blocking
                            ";
        }
        // line 62
        echo "                        </td>
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
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama"), "html", null, true);
        echo "</b>.
                                <br><b>Note:</b> Jadwal tidak dapat di hapus, namun dapat di ubah menjadi tidak aktif.
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
        // line 90
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(get_indo_hari());
        foreach ($context['_seq'] as $context["hari_id"] => $context["h"]) {
            // line 91
            echo "                                <tr>
                                    <th width=\"15%\">";
            // line 92
            echo twig_escape_filter($this->env, (isset($context["h"]) ? $context["h"] : null), "html", null, true);
            echo "</th>
                                    <td>
                                        ";
            // line 94
            echo anchor(((((("pengajar/add_ampuan/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")) . "/") . (isset($context["hari_id"]) ? $context["hari_id"] : null)), "Tambah", array("class" => "iframe btn btn-small btn-primary", "title" => ("Tambah jadwal hari " . (isset($context["h"]) ? $context["h"] : null))));
            echo "
                                        ";
            // line 95
            $context["retrieve_all_ma"] = get_row_data("pengajar_model", "retrieve_all_ma", array(0 => (isset($context["hari_id"]) ? $context["hari_id"] : null), 1 => $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id"), 2 => null));
            // line 96
            echo "                                        ";
            if ((!twig_test_empty((isset($context["retrieve_all_ma"]) ? $context["retrieve_all_ma"] : null)))) {
                // line 97
                echo "                                        <table style=\"margin-top:10px;\" class=\"table table-condensed\">
                                            ";
                // line 98
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["retrieve_all_ma"]) ? $context["retrieve_all_ma"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["ma"]) {
                    // line 99
                    echo "                                                ";
                    $context["mk"] = get_row_data("mapel_model", "retrieve_kelas", array(0 => $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "mapel_kelas_id")));
                    // line 100
                    echo "                                                ";
                    $context["k"] = get_row_data("kelas_model", "retrieve", array(0 => $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "kelas_id")));
                    // line 101
                    echo "                                                ";
                    $context["m"] = get_row_data("mapel_model", "retrieve", array(0 => $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "mapel_id")));
                    // line 102
                    echo "                                                <tr ";
                    echo ((($this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "aktif") == 0)) ? ("class=\"error text-muted\"") : ("class=\"info text-info\""));
                    echo ">
                                                    <td width=\"15%\">";
                    // line 103
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "jam_mulai"), "H:i"), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "jam_selesai"), "H:i"), "html", null, true);
                    echo "</td>
                                                    <td>";
                    // line 104
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
                    echo "</td>
                                                    <td width=\"20%\">";
                    // line 105
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
                    echo "</td>
                                                    <td width=\"17%\">
                                                        ";
                    // line 107
                    echo anchor(((((("pengajar/edit_ampuan/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")) . "/") . $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "id")), "<i class=\"icon-edit\"></i> Edit", array("title" => "Edit Jadwal Ajar", "class" => "iframe-6"));
                    echo " 
                                                        ";
                    // line 108
                    echo anchor(("tugas/add/" . $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "id")), "<i class=\"icon-tasks\"></i> Tugas");
                    echo "
                                                    </td>
                                                </tr>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ma'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 112
                echo "                                        </table>
                                        ";
            }
            // line 114
            echo "                                    </td>
                                </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['hari_id'], $context['h'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 117
        echo "                            </tbody>
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
        // line 129
        echo anchor(((("pengajar/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")), "Edit Username", array("class" => "iframe-2 btn btn-small btn-primary", "title" => "Edit Username pengajar"));
        echo "
                            ";
        // line 130
        echo anchor(((("pengajar/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "id")), "Edit Password", array("class" => "iframe-3 btn btn-small btn-primary", "title" => "Edit Password pengajar"));
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
        // line 139
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

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "detail-pengajar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 139,  272 => 130,  268 => 129,  254 => 117,  246 => 114,  242 => 112,  232 => 108,  228 => 107,  223 => 105,  219 => 104,  213 => 103,  208 => 102,  205 => 101,  202 => 100,  199 => 99,  195 => 98,  192 => 97,  189 => 96,  187 => 95,  183 => 94,  178 => 92,  175 => 91,  171 => 90,  155 => 77,  138 => 62,  134 => 60,  130 => 58,  126 => 56,  124 => 55,  116 => 50,  109 => 46,  102 => 42,  95 => 38,  88 => 34,  80 => 29,  75 => 27,  65 => 20,  61 => 19,  52 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
