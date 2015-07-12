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
        ";
        // line 11
        $this->displayBlock('css', $context, $blocks);
        // line 12
        echo "        ";
        echo (isset($context["comp_css"]) ? $context["comp_css"] : null);
        echo "
        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
    </head>
    <body>
        <div class=\"navbar navbar-fixed-top\">
            <div class=\"navbar-inner\">
                <div class=\"container\">
                    <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".navbar-inverse-collapse\">
                        <i class=\"icon-reorder shaded\"></i>
                    </a>
                    <a class=\"brand\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["site_url"]) ? $context["site_url"] : null), "html", null, true);
        echo "\">
                        <img src=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["logo_url_medium"]) ? $context["logo_url_medium"] : null), "html", null, true);
        echo "\"> ";
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
        echo "
                    </a>
                    <div class=\"nav-collapse collapse navbar-inverse-collapse\">
                        <form class=\"navbar-search pull-left input-append\" action=\"#\">
                        <input type=\"text\" class=\"span3\">
                        <button class=\"btn\" type=\"button\">
                            <i class=\"icon-search\"></i>
                        </button>
                        </form>
                        <ul class=\"nav pull-right\">
                            <li class=\"nav-user dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                ";
        // line 34
        echo twig_escape_filter($this->env, nama_panggilan(get_sess_data("user", "nama")), "html", null, true);
        echo "

                                ";
        // line 36
        if (is_admin()) {
            // line 37
            echo "                                <img src=\"";
            echo twig_escape_filter($this->env, get_url_image_pengajar(get_sess_data("user", "foto"), "medium", get_sess_data("user", "jenis_kelamin")), "html", null, true);
            echo "\" class=\"nav-avatar img-polaroid\" />
                                ";
        }
        // line 39
        echo "
                                <b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    ";
        // line 42
        if (is_admin()) {
            // line 43
            echo "                                    <li>";
            echo anchor(((("pengajar/detail/" . get_sess_data("user", "status_id")) . "/") . get_sess_data("user", "id")), "Detail Profil", array("title" => "Detail Profil"));
            echo "</li>
                                    ";
        }
        // line 45
        echo "                                    <li><a href=\"";
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
                            <ul class=\"widget widget-menu unstyled\">
                                <li class=\"active\"><a href=\"index.html\"><i class=\"menu-icon icon-dashboard\"></i>Dashboard
                                </a></li>
                                <li><a href=\"activity.html\"><i class=\"menu-icon icon-bullhorn\"></i>News Feed </a>
                                </li>
                                <li><a href=\"message.html\"><i class=\"menu-icon icon-inbox\"></i>Inbox <b class=\"label green pull-right\">
                                    11</b> </a></li>
                                <li><a href=\"task.html\"><i class=\"menu-icon icon-inbox\"></i>Outbox <b class=\"label orange pull-right\">
                                    19</b> </a></li>
                            </ul>
                            <!--/.widget-nav-->

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 75
        echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Tugas </a></li>
                                <li><a href=\"";
        // line 76
        echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i> Materi </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 80
        echo twig_escape_filter($this->env, site_url("siswa"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Siswa </a></li>
                                <li><a href=\"";
        // line 81
        echo twig_escape_filter($this->env, site_url("pengajar"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i> Pengajar </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 85
        echo twig_escape_filter($this->env, site_url("kelas/mapel_kelas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-paste\"></i>Matapelajaran Kelas </a></li>
                                <li><a href=\"";
        // line 86
        echo twig_escape_filter($this->env, site_url("kelas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Manajemen Kelas </a></li>
                                <li><a href=\"";
        // line 87
        echo twig_escape_filter($this->env, site_url("mapel"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i>Manajemen Matapelajaran </a></li>
                            </ul>

                            <!--/.widget-nav-->
                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 92
        echo twig_escape_filter($this->env, site_url("logout"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-signout\"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class=\"span9\">
                        <div class=\"content\">
                            ";
        // line 100
        $this->displayBlock('content', $context, $blocks);
        // line 101
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
        // line 112
        echo (isset($context["copyright"]) ? $context["copyright"] : null);
        echo " </b> All rights reserved.<br>
                    ";
        // line 113
        echo (isset($context["version"]) ? $context["version"] : null);
        echo " | Page loaded in ";
        echo twig_escape_filter($this->env, (isset($context["elapsed_time"]) ? $context["elapsed_time"] : null), "html", null, true);
        echo " seconds.
                </center>
            </div>
        </div>
        <script type=\"text/javascript\">
        var site_url = \"";
        // line 118
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
        var base_url = \"";
        // line 119
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\";
        </script>
        <script src=\"";
        // line 121
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 122
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 123
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        ";
        // line 124
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
        <script src=\"";
        // line 125
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/script.js\" type=\"text/javascript\"></script>
        ";
        // line 126
        $this->displayBlock('js', $context, $blocks);
        // line 127
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
    }

    // line 11
    public function block_css($context, array $blocks = array())
    {
    }

    // line 100
    public function block_content($context, array $blocks = array())
    {
    }

    // line 126
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
        return array (  280 => 126,  270 => 11,  264 => 6,  258 => 127,  256 => 126,  252 => 125,  248 => 124,  244 => 123,  240 => 122,  236 => 121,  231 => 119,  227 => 118,  217 => 113,  213 => 112,  200 => 101,  198 => 100,  187 => 92,  179 => 87,  175 => 86,  171 => 85,  164 => 81,  160 => 80,  149 => 75,  115 => 45,  109 => 43,  107 => 42,  102 => 39,  96 => 37,  94 => 36,  73 => 23,  69 => 22,  57 => 13,  52 => 12,  50 => 11,  46 => 10,  38 => 8,  34 => 7,  30 => 6,  23 => 1,  331 => 160,  326 => 157,  315 => 152,  312 => 151,  309 => 150,  303 => 148,  297 => 146,  295 => 145,  290 => 144,  288 => 143,  283 => 140,  279 => 138,  275 => 100,  271 => 134,  269 => 133,  259 => 130,  255 => 128,  246 => 126,  242 => 125,  237 => 123,  233 => 122,  228 => 120,  225 => 119,  221 => 118,  191 => 91,  182 => 85,  173 => 79,  161 => 70,  153 => 76,  145 => 60,  134 => 51,  120 => 47,  116 => 45,  112 => 44,  103 => 37,  89 => 34,  85 => 31,  81 => 30,  72 => 24,  64 => 19,  60 => 18,  56 => 17,  49 => 13,  42 => 9,  39 => 7,  32 => 4,  29 => 3,);
    }
}
