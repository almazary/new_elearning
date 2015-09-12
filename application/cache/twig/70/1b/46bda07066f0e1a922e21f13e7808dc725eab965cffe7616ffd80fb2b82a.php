<?php

/* detail-siswa.html */
class __TwigTemplate_701b46bda07066f0e1a922e21f13e7808dc725eab965cffe7616ffd80fb2b82a extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nama"), "html", null, true);
        echo " - ";
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
        ";
        // line 10
        if (is_admin()) {
            // line 11
            echo "        <h3>";
            echo anchor(("siswa/index/" . (isset($context["status_id"]) ? $context["status_id"] : null)), "Data Siswa");
            echo " / Detail Siswa</h3>
        ";
        } else {
            // line 13
            echo "        <h3>";
            echo anchor("siswa/filter", "Filter Siswa");
            echo " / Detail Siswa</h3>
        ";
        }
        // line 15
        echo "    </div>
    <div class=\"module-body\">
        ";
        // line 17
        echo get_flashdata("siswa");
        echo "

        ";
        // line 19
        if (($this->getAttribute((isset($context["siswa_login"]) ? $context["siswa_login"] : null), "id") != get_sess_data("login", "id"))) {
            // line 20
            echo "        <div class=\"row-fluid\">
            <div class=\"span4\">
                <div class=\"btn-group\">
                    <a class=\"btn btn-default btn-sm\" href=\"";
            // line 23
            echo twig_escape_filter($this->env, site_url(("message/to/siswa/" . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-comments\"></i> Kirim Pesan</a>
                </div>
            </div>
        </div>
        <br>
        ";
        }
        // line 29
        echo "
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <strong>Profil Siswa</strong>
                ";
        // line 33
        if (is_admin()) {
            // line 34
            echo "                <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
                    ";
            // line 35
            echo anchor(((("siswa/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Profil", array("class" => "iframe-4 btn btn-small btn-primary", "title" => "Edit Profil Siswa"));
            echo "
                    ";
            // line 36
            echo anchor(((("siswa/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Foto", array("class" => "iframe-5 btn btn-small btn-primary", "title" => "Edit Foto Siswa"));
            echo "
                </div>
                ";
        }
        // line 39
        echo "            </div>
            <div class=\"panel-body\">
                <table class=\"table\">
                    <tr>
                        <th bgcolor=\"#FBFBFB\" width=\"25%\" style=\"border-top: 0px;\">NIS</th>
                        <td style=\"border-top: 0px;\">";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nis"), "html", null, true);
        echo "</td>
                        <td rowspan=\"5\" width=\"15%\" style=\"border-top: 0px;\">
                            <img style=\"width:113px;\" class=\"img-polaroid\" src=\"";
        // line 46
        echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "foto"), "medium", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin")), "html", null, true);
        echo "\">
                        </td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Nama</th>
                        <td>";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nama"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Jenis Kelamin</th>
                        <td>";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Tahun Masuk</th>
                        <td colspan=\"2\">";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tahun_masuk"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Tempat Lahir</th>
                        <td>";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tempat_lahir"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Tanggal Lahir</th>
                        <td>";
        // line 67
        echo twig_escape_filter($this->env, (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (tgl_indo($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"))) : ("")), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Agama</th>
                        <td colspan=\"2\">";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Alamat</th>
                        <td colspan=\"2\">";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "alamat"), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <th bgcolor=\"#FBFBFB\">Status</th>
                        <td colspan=\"2\">
                            ";
        // line 80
        if (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 0)) {
            // line 81
            echo "                                Pending
                            ";
        } elseif (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 1)) {
            // line 83
            echo "                                Aktif
                            ";
        } elseif (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 2)) {
            // line 85
            echo "                                Blocking
                            ";
        } elseif (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == 3)) {
            // line 87
            echo "                                Alumni
                            ";
        }
        // line 89
        echo "                        </td>
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
        // line 100
        if ((is_admin() && ((isset($context["status_id"]) ? $context["status_id"] : null) != 3))) {
            // line 101
            echo "                        <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
                            ";
            // line 102
            echo anchor(((("siswa/moved_class/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Pindah Kelas", array("class" => "iframe btn btn-small btn-primary", "title" => "Pindah siswa ke Kelas lain"));
            echo "
                        </div>
                        ";
        }
        // line 105
        echo "                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table table-striped\">
                        <thead>
                            <tr>
                                <th width=\"5%\">No</th>
                                <th>Kelas</th>
                                ";
        // line 112
        if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
            // line 113
            echo "                                    <th>Aktif</th>
                                ";
        }
        // line 115
        echo "                            </tr>
                        </thead>
                        <tbody>
                            ";
        // line 118
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["siswa_kelas"]) ? $context["siswa_kelas"] : null), "results"));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 119
            echo "                            <tr>
                                <td>";
            // line 120
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
                                <td>
                                    ";
            // line 122
            echo twig_escape_filter($this->env, get_row_data("kelas_model", "retrieve", array(0 => $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "kelas_id"), 1 => true), "nama"), "html", null, true);
            echo "
                                </td>
                                ";
            // line 124
            if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
                // line 125
                echo "                                <td>
                                    ";
                // line 126
                if (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "aktif") == 1)) {
                    // line 127
                    echo "                                        <i class=\"icon icon-ok\"></i>
                                    ";
                }
                // line 129
                echo "                                </td>
                                ";
            }
            // line 131
            echo "                            </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        echo "                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            ";
        // line 138
        if (is_admin()) {
            // line 139
            echo "            <div class=\"span6\">
                <div class=\"panel panel-default\" id=\"akun\">
                    <div class=\"panel-heading\">
                        <strong>Akun Login</strong>
                        <div class=\"btn-group pull-right\" style=\"margin-top:-4px;\">
                            ";
            // line 144
            echo anchor(((("siswa/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")), "Edit Username", array("class" => "iframe-2 btn btn-small btn-primary", "title" => "Edit Username Siswa"));
            echo "
                            ";
            // line 145
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
            // line 154
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
            ";
        }
        // line 169
        echo "        </div>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "detail-siswa.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  328 => 169,  310 => 154,  298 => 145,  294 => 144,  287 => 139,  285 => 138,  278 => 133,  271 => 131,  267 => 129,  263 => 127,  261 => 126,  258 => 125,  256 => 124,  251 => 122,  246 => 120,  243 => 119,  239 => 118,  234 => 115,  230 => 113,  228 => 112,  219 => 105,  213 => 102,  210 => 101,  208 => 100,  195 => 89,  191 => 87,  187 => 85,  183 => 83,  179 => 81,  177 => 80,  169 => 75,  162 => 71,  155 => 67,  148 => 63,  141 => 59,  134 => 55,  127 => 51,  119 => 46,  114 => 44,  107 => 39,  101 => 36,  97 => 35,  94 => 34,  92 => 33,  86 => 29,  77 => 23,  72 => 20,  70 => 19,  65 => 17,  61 => 15,  55 => 13,  49 => 11,  47 => 10,  43 => 8,  40 => 7,  32 => 4,  29 => 3,);
    }
}
