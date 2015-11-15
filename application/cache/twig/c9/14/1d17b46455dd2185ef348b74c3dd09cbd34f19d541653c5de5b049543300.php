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
                            <li class=\"nav-user dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                ";
        // line 37
        echo twig_escape_filter($this->env, nama_panggilan(get_sess_data("user", "nama")), "html", null, true);
        echo "

                                <img src=\"";
        // line 39
        echo twig_escape_filter($this->env, get_url_image_session(get_sess_data("user", "foto"), "medium", get_sess_data("user", "jenis_kelamin")), "html", null, true);
        echo "\" class=\"nav-avatar img-polaroid\" />

                                <b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    ";
        // line 43
        if (is_admin()) {
            // line 44
            echo "                                    <li>";
            echo anchor(((("pengajar/detail/" . get_sess_data("user", "status_id")) . "/") . get_sess_data("user", "id")), "Detail Profil", array("title" => "Detail Profil"));
            echo "</li>
                                    ";
        }
        // line 46
        echo "
                                    ";
        // line 47
        if (is_pengajar()) {
            // line 48
            echo "                                    <li>";
            echo anchor("login/pp", "Profil & Akun Login");
            echo "</li>
                                    ";
        }
        // line 50
        echo "
                                    ";
        // line 51
        if (is_siswa()) {
            // line 52
            echo "                                    <li>";
            echo anchor("login/pp", "Profil & Akun Login");
            echo "</li>
                                    ";
        }
        // line 54
        echo "
                                    <li><a href=\"";
        // line 55
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
        // line 72
        if (is_admin()) {
            // line 73
            echo "                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 74
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
                                <li><a href=\"";
            // line 75
            echo twig_escape_filter($this->env, site_url("pengumuman"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-bullhorn\"></i>Pengumuman</a></li>
                                <li><a href=\"";
            // line 76
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 80
            echo twig_escape_filter($this->env, site_url("siswa"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-group\"></i>Siswa </a></li>
                                <li><a href=\"";
            // line 81
            echo twig_escape_filter($this->env, site_url("pengajar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Pengajar </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 85
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
                                <li><a href=\"";
            // line 86
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
                                <li><a href=\"";
            // line 87
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 91
            echo twig_escape_filter($this->env, site_url("kelas/mapel_kelas"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-paste\"></i>Matapelajaran Kelas </a></li>
                                <li><a href=\"";
            // line 92
            echo twig_escape_filter($this->env, site_url("kelas"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Manajemen Kelas </a></li>
                                <li><a href=\"";
            // line 93
            echo twig_escape_filter($this->env, site_url("mapel"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Manajemen Matapelajaran </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 97
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-wrench\"></i>Pengaturan</a></li>
                                <li><a href=\"";
            // line 98
            echo twig_escape_filter($this->env, site_url("email"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-envelope\"></i>Email Template</a></li>
                            </ul>
                            ";
        }
        // line 101
        echo "
                            ";
        // line 102
        if (is_pengajar()) {
            // line 103
            echo "                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 104
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
                                <li><a href=\"";
            // line 105
            echo twig_escape_filter($this->env, site_url("pengumuman"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-bullhorn\"></i>Pengumuman</a></li>
                                <li><a href=\"";
            // line 106
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
                                <li><a href=\"";
            // line 107
            echo twig_escape_filter($this->env, site_url("login/pp"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Profilku</a></li>
                                <li><a href=\"";
            // line 108
            echo twig_escape_filter($this->env, site_url("pengajar/jadwal"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Jadwal Mengajar </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 112
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
                                <li><a href=\"";
            // line 113
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
                                <li><a href=\"";
            // line 114
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 118
            echo twig_escape_filter($this->env, site_url("pengajar/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Pengajar </a></li>
                                <li><a href=\"";
            // line 119
            echo twig_escape_filter($this->env, site_url("siswa/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Siswa </a></li>
                            </ul>
                            ";
        }
        // line 122
        echo "
                            ";
        // line 123
        if (is_siswa()) {
            // line 124
            echo "                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 125
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
                                <li><a href=\"";
            // line 126
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
                                <li><a href=\"";
            // line 127
            echo twig_escape_filter($this->env, site_url("login/pp"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Profilku</a></li>
                                <li><a href=\"";
            // line 128
            echo twig_escape_filter($this->env, site_url("siswa/jadwal_mapel"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Jadwal Matapelajaran</a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 132
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
                                <li><a href=\"";
            // line 133
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
                                <li><a href=\"";
            // line 134
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
            // line 138
            echo twig_escape_filter($this->env, site_url("pengajar/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Pengajar </a></li>
                                <li><a href=\"";
            // line 139
            echo twig_escape_filter($this->env, site_url("siswa/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Siswa </a></li>
                            </ul>
                            ";
        }
        // line 142
        echo "
                            <!--/.widget-nav-->
                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 145
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
        // line 153
        $this->displayBlock('content', $context, $blocks);
        // line 154
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
        // line 165
        echo (isset($context["copyright"]) ? $context["copyright"] : null);
        echo " </b> All rights reserved.<br>
                    ";
        // line 166
        echo (isset($context["version"]) ? $context["version"] : null);
        echo " | Page loaded in ";
        echo twig_escape_filter($this->env, (isset($context["elapsed_time"]) ? $context["elapsed_time"] : null), "html", null, true);
        echo " seconds.
                </center>
            </div>
        </div>
        <script type=\"text/javascript\">
        var site_url = \"";
        // line 171
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
        var base_url = \"";
        // line 172
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\";
        </script>
        <script src=\"";
        // line 174
        echo twig_escape_filter($this->env, base_url("assets/comp/pace/pace.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 175
        echo twig_escape_filter($this->env, base_url("assets/comp/offline/offline.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 176
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 177
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 178
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        ";
        // line 179
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
        <script src=\"";
        // line 180
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/script.js\" type=\"text/javascript\"></script>
        ";
        // line 181
        $this->displayBlock('js', $context, $blocks);
        // line 182
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

    // line 153
    public function block_content($context, array $blocks = array())
    {
    }

    // line 181
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
        return array (  456 => 181,  451 => 153,  446 => 14,  440 => 6,  429 => 182,  427 => 181,  423 => 180,  419 => 179,  415 => 178,  411 => 177,  407 => 176,  403 => 175,  399 => 174,  394 => 172,  390 => 171,  380 => 166,  376 => 165,  363 => 154,  361 => 153,  350 => 145,  345 => 142,  339 => 139,  335 => 138,  328 => 134,  324 => 133,  320 => 132,  313 => 128,  309 => 127,  305 => 126,  301 => 125,  298 => 124,  296 => 123,  293 => 122,  287 => 119,  283 => 118,  276 => 114,  272 => 113,  268 => 112,  261 => 108,  257 => 107,  253 => 106,  249 => 105,  245 => 104,  242 => 103,  240 => 102,  237 => 101,  231 => 98,  227 => 97,  220 => 93,  216 => 92,  212 => 91,  205 => 87,  201 => 86,  197 => 85,  190 => 81,  186 => 80,  179 => 76,  175 => 75,  171 => 74,  168 => 73,  166 => 72,  146 => 55,  143 => 54,  137 => 52,  135 => 51,  132 => 50,  126 => 48,  124 => 47,  121 => 46,  115 => 44,  113 => 43,  106 => 39,  101 => 37,  90 => 29,  82 => 26,  78 => 25,  66 => 16,  61 => 15,  59 => 14,  54 => 12,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  23 => 1,);
    }
}
