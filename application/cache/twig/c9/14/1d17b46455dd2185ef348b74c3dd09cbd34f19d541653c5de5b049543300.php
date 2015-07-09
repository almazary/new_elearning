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
        <link type=\"text/css\" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        ";
        // line 12
        $this->displayBlock('css', $context, $blocks);
        // line 13
        echo "        ";
        echo (isset($context["comp_css"]) ? $context["comp_css"] : null);
        echo "
        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 14
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
        // line 23
        echo twig_escape_filter($this->env, (isset($context["site_url"]) ? $context["site_url"] : null), "html", null, true);
        echo "\">
                        <img src=\"";
        // line 24
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
        // line 35
        echo twig_escape_filter($this->env, get_sess_data("user", "nama"), "html", null, true);
        echo "
                                    <img src=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "images/user.png\" class=\"nav-avatar\" />
                                <b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"";
        // line 39
        echo twig_escape_filter($this->env, site_url("ch_profil"), "html", null, true);
        echo "\">Profil</a></li>
                                    <li><a href=\"";
        // line 40
        echo twig_escape_filter($this->env, site_url("ch_pass"), "html", null, true);
        echo "\">Ubah Password</a></li>
                                    <li><a href=\"";
        // line 41
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
        // line 71
        echo twig_escape_filter($this->env, site_url("tugas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Tugas </a></li>
                                <li><a href=\"";
        // line 72
        echo twig_escape_filter($this->env, site_url("materi"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i> Materi </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 76
        echo twig_escape_filter($this->env, site_url("siswa"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Siswa </a></li>
                                <li><a href=\"";
        // line 77
        echo twig_escape_filter($this->env, site_url("pengajar"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i> Pengajar </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 81
        echo twig_escape_filter($this->env, site_url("kelas/mapel_kelas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-paste\"></i>Matapelajaran Kelas </a></li>
                                <li><a href=\"";
        // line 82
        echo twig_escape_filter($this->env, site_url("kelas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Manajemen Kelas </a></li>
                                <li><a href=\"";
        // line 83
        echo twig_escape_filter($this->env, site_url("mapel"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i>Manajemen Matapelajaran </a></li>
                            </ul>

                            <!--/.widget-nav-->
                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 88
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
        // line 96
        $this->displayBlock('content', $context, $blocks);
        // line 97
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
        // line 108
        echo (isset($context["copyright"]) ? $context["copyright"] : null);
        echo " </b> All rights reserved.<br>
                    ";
        // line 109
        echo (isset($context["version"]) ? $context["version"] : null);
        echo " | Page loaded in ";
        echo twig_escape_filter($this->env, (isset($context["elapsed_time"]) ? $context["elapsed_time"] : null), "html", null, true);
        echo " seconds.
                </center>
            </div>
        </div>
        <script type=\"text/javascript\">
        var site_url = \"";
        // line 114
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
        var base_url = \"";
        // line 115
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\";
        </script>
        <script src=\"";
        // line 117
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 118
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 119
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        ";
        // line 120
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
        <script src=\"";
        // line 121
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/script.js\" type=\"text/javascript\"></script>
        ";
        // line 122
        $this->displayBlock('js', $context, $blocks);
        // line 123
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
    }

    // line 12
    public function block_css($context, array $blocks = array())
    {
    }

    // line 96
    public function block_content($context, array $blocks = array())
    {
    }

    // line 122
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
        return array (  272 => 122,  267 => 96,  262 => 12,  256 => 6,  250 => 123,  248 => 122,  244 => 121,  240 => 120,  236 => 119,  232 => 118,  228 => 117,  223 => 115,  219 => 114,  209 => 109,  205 => 108,  192 => 97,  190 => 96,  179 => 88,  171 => 83,  167 => 82,  163 => 81,  156 => 77,  152 => 76,  145 => 72,  141 => 71,  108 => 41,  104 => 40,  100 => 39,  94 => 36,  90 => 35,  74 => 24,  70 => 23,  58 => 14,  53 => 13,  51 => 12,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  23 => 1,);
    }
}
