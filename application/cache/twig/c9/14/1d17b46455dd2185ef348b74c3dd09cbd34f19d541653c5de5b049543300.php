<?php

/* layout-private.html */
class __TwigTemplate_c9141d17b46455dd2185ef348b74c3dd09cbd34f19d541653c5de5b049543300 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap-responsive.min.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "css/theme.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "images/icons/css/font-awesome.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, base_url("assets/comp/pace/flash.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, base_url("assets/comp/offline/offline-theme-chrome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <script type=\"text/javascript\" src=\"//cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML\"></script>
        ";
        // line 14
        $this->displayBlock('css', $context, $blocks);
        // line 15
        echo "        ";
        echo (isset($context["comp_css"]) ? $context["comp_css"] : null);
        echo "
        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
    </head>
    <body style=\"display: none;\">
        <div class=\"navbar navbar-fixed-top\">
            <div class=\"navbar-inner\">
                <div class=\"container\">
                    <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".navbar-inverse-collapse\">
                        <i class=\"icon-reorder shaded\"></i>
                    </a>
                    <a class=\"brand\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["site_url"]) ? $context["site_url"] : null), "html", null, true);
        echo "\">
                        <img src=\"";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["logo_url_medium"]) ? $context["logo_url_medium"] : null), "html", null, true);
        echo "\"> ";
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
        echo "
                    </a>
                    <div class=\"nav-collapse collapse navbar-inverse-collapse\">
                        <form class=\"navbar-search pull-left input-append\" method=\"get\" action=\"";
        // line 29
        echo twig_escape_filter($this->env, site_url("welcome/search"), "html", null, true);
        echo "\">
                            <input type=\"text\" class=\"span3\" name=\"q\">
                            <button class=\"btn\" type=\"submit\">
                                <i class=\"icon-search\"></i>
                            </button>
                        </form>
                        <ul class=\"nav pull-right\">
                            ";
        // line 36
        if (is_admin()) {
            // line 37
            echo "                            <li><a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/donation"), "html", null, true);
            echo "\">DONASI</a></li>
                            ";
        }
        // line 39
        echo "                            <li class=\"nav-user dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                ";
        // line 40
        echo twig_escape_filter($this->env, nama_panggilan(get_sess_data("user", "nama")), "html", null, true);
        echo "

                                <span class=\"pull-right\">
                                <img src=\"";
        // line 43
        echo twig_escape_filter($this->env, get_url_image_session(get_sess_data("user", "foto"), "medium", get_sess_data("user", "jenis_kelamin")), "html", null, true);
        echo "\" class=\"nav-avatar img-polaroid\" />
                                <b class=\"caret\"></b></a>
                                </span>
                                <ul class=\"dropdown-menu\">
                                    ";
        // line 47
        if (is_admin()) {
            // line 48
            echo "                                    <li>";
            echo anchor(((("pengajar/detail/" . get_sess_data("user", "status_id")) . "/") . get_sess_data("user", "id")), "Detail Profil", array("title" => "Detail Profil"));
            echo "</li>
                                    ";
        }
        // line 50
        echo "
                                    ";
        // line 51
        if (is_pengajar()) {
            // line 52
            echo "                                    <li>";
            echo anchor("login/pp", "Profil & Akun Login");
            echo "</li>
                                    ";
        }
        // line 54
        echo "
                                    ";
        // line 55
        if (is_siswa()) {
            // line 56
            echo "                                    <li>";
            echo anchor("login/pp", "Profil & Akun Login");
            echo "</li>
                                    ";
        }
        // line 58
        echo "
                                    <li><a href=\"";
        // line 59
        echo twig_escape_filter($this->env, site_url("login/logout"), "html", null, true);
        echo "\">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>

        <!-- /navbar -->
        <div class=\"wrapper\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"span3\">
                        <div class=\"sidebar\">
                            ";
        // line 76
        if (is_admin()) {
            // line 77
            echo "                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 78
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
                                <li><a href=\"";
            // line 79
            echo twig_escape_filter($this->env, site_url("pengumuman"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-bullhorn\"></i>Pengumuman</a></li>
                                <li><a href=\"";
            // line 80
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 84
            echo twig_escape_filter($this->env, site_url("siswa"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-group\"></i>Siswa </a></li>
                                <li><a href=\"";
            // line 85
            echo twig_escape_filter($this->env, site_url("pengajar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Pengajar </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 89
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
                                <li><a href=\"";
            // line 90
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
                                <li><a href=\"";
            // line 91
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 95
            echo twig_escape_filter($this->env, site_url("kelas/mapel_kelas"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-paste\"></i>Matapelajaran Kelas </a></li>
                                <li><a href=\"";
            // line 96
            echo twig_escape_filter($this->env, site_url("kelas"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Manajemen Kelas </a></li>
                                <li><a href=\"";
            // line 97
            echo twig_escape_filter($this->env, site_url("mapel"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Manajemen Matapelajaran </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 101
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-wrench\"></i>Pengaturan</a></li>
                                <li><a href=\"";
            // line 102
            echo twig_escape_filter($this->env, site_url("email"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-envelope\"></i>Email Template</a></li>
                            </ul>
                            ";
        }
        // line 105
        echo "
                            ";
        // line 106
        if (is_pengajar()) {
            // line 107
            echo "                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 108
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
                                <li><a href=\"";
            // line 109
            echo twig_escape_filter($this->env, site_url("pengumuman"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-bullhorn\"></i>Pengumuman</a></li>
                                <li><a href=\"";
            // line 110
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
                                <li><a href=\"";
            // line 111
            echo twig_escape_filter($this->env, site_url("login/pp"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Profilku</a></li>
                                <li><a href=\"";
            // line 112
            echo twig_escape_filter($this->env, site_url("pengajar/jadwal"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Jadwal Mengajar </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 116
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
                                <li><a href=\"";
            // line 117
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
                                <li><a href=\"";
            // line 118
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 122
            echo twig_escape_filter($this->env, site_url("pengajar/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Pengajar </a></li>
                                <li><a href=\"";
            // line 123
            echo twig_escape_filter($this->env, site_url("siswa/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Siswa </a></li>
                            </ul>
                            ";
        }
        // line 126
        echo "
                            ";
        // line 127
        if (is_siswa()) {
            // line 128
            echo "                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 129
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
                                <li><a href=\"";
            // line 130
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
                                <li><a href=\"";
            // line 131
            echo twig_escape_filter($this->env, site_url("login/pp"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Profilku</a></li>
                                <li><a href=\"";
            // line 132
            echo twig_escape_filter($this->env, site_url("siswa/jadwal_mapel"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Jadwal Matapelajaran</a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 136
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
                                <li><a href=\"";
            // line 137
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
                                <li><a href=\"";
            // line 138
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 142
            echo twig_escape_filter($this->env, site_url("pengajar/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Pengajar </a></li>
                                <li><a href=\"";
            // line 143
            echo twig_escape_filter($this->env, site_url("siswa/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Siswa </a></li>
                            </ul>
                            ";
        }
        // line 146
        echo "
                            <!--/.widget-nav-->
                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 149
        echo twig_escape_filter($this->env, site_url("login/logout"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-signout\"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class=\"span9\">
                        <div class=\"content\">
                            ";
        // line 157
        $this->displayBlock('content', $context, $blocks);
        // line 158
        echo "                        </div>
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class=\"footer\">
            <div class=\"container\">
                <center>
                    <b class=\"copyright\">";
        // line 169
        echo (isset($context["copyright"]) ? $context["copyright"] : null);
        echo " </b> All rights reserved.<br>
                    ";
        // line 170
        echo (isset($context["version"]) ? $context["version"] : null);
        echo " | Page loaded in ";
        echo twig_escape_filter($this->env, (isset($context["elapsed_time"]) ? $context["elapsed_time"] : null), "html", null, true);
        echo " seconds.
                </center>
            </div>
        </div>
        <script type=\"text/javascript\">
        var site_url = \"";
        // line 175
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
        var base_url = \"";
        // line 176
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\";
        </script>
        <script src=\"";
        // line 178
        echo twig_escape_filter($this->env, base_url("assets/comp/pace/pace.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 179
        echo twig_escape_filter($this->env, base_url("assets/comp/offline/offline.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 180
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 181
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 182
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        ";
        // line 183
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
        <script src=\"";
        // line 184
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/script.js\" type=\"text/javascript\"></script>
        ";
        // line 185
        $this->displayBlock('js', $context, $blocks);
        // line 186
        echo "        <script type=\"text/javascript\">
            \$( document ).ready(function() {
                \$(\"body\").show();
            });
        </script>
    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
    }

    // line 14
    public function block_css($context, array $blocks = array())
    {
    }

    // line 157
    public function block_content($context, array $blocks = array())
    {
    }

    // line 185
    public function block_js($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout-private.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  467 => 185,  462 => 157,  457 => 14,  451 => 6,  440 => 186,  438 => 185,  434 => 184,  430 => 183,  426 => 182,  422 => 181,  418 => 180,  414 => 179,  410 => 178,  405 => 176,  401 => 175,  391 => 170,  387 => 169,  374 => 158,  372 => 157,  361 => 149,  356 => 146,  350 => 143,  346 => 142,  339 => 138,  335 => 137,  331 => 136,  324 => 132,  320 => 131,  316 => 130,  312 => 129,  309 => 128,  307 => 127,  304 => 126,  298 => 123,  294 => 122,  287 => 118,  283 => 117,  279 => 116,  272 => 112,  268 => 111,  264 => 110,  260 => 109,  256 => 108,  253 => 107,  248 => 105,  242 => 102,  238 => 101,  231 => 97,  216 => 91,  212 => 90,  208 => 89,  201 => 85,  197 => 84,  186 => 79,  182 => 78,  179 => 77,  177 => 76,  157 => 59,  148 => 56,  146 => 55,  137 => 52,  132 => 50,  124 => 47,  117 => 43,  111 => 40,  108 => 39,  100 => 36,  90 => 29,  78 => 25,  66 => 16,  61 => 15,  59 => 14,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  23 => 1,  308 => 140,  300 => 135,  293 => 130,  284 => 127,  281 => 126,  277 => 125,  267 => 117,  255 => 113,  251 => 106,  247 => 110,  239 => 104,  227 => 96,  223 => 95,  219 => 97,  211 => 91,  209 => 90,  206 => 89,  198 => 84,  190 => 80,  181 => 75,  178 => 74,  174 => 73,  167 => 68,  165 => 67,  162 => 66,  154 => 58,  147 => 57,  143 => 54,  135 => 51,  126 => 48,  123 => 46,  119 => 45,  106 => 35,  102 => 37,  96 => 31,  92 => 30,  86 => 27,  82 => 26,  76 => 23,  72 => 22,  69 => 21,  67 => 20,  60 => 15,  54 => 12,  52 => 12,  48 => 11,  43 => 9,  37 => 8,  31 => 4,  28 => 3,);
    }
}
