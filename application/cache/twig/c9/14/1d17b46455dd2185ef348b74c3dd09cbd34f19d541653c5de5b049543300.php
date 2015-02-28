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
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 8
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
    <body>
        <div class=\"navbar navbar-fixed-top\">
            <div class=\"navbar-inner\">
                <div class=\"container\">
                    <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".navbar-inverse-collapse\">
                        <i class=\"icon-reorder shaded\"></i>
                    </a>
                    <a class=\"brand\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["site_url"]) ? $context["site_url"] : null), "html", null, true);
        echo "/admin\">
                        <img src=\"";
        // line 26
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
        // line 37
        echo twig_escape_filter($this->env, get_sess_data("admin", "pengajar", "nama"), "html", null, true);
        echo "
                                    <img src=\"";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "images/user.png\" class=\"nav-avatar\" />
                                <b class=\"caret\"></b></a>
                                <ul class=\"dropdown-menu\">
                                    <li><a href=\"";
        // line 41
        echo twig_escape_filter($this->env, site_url("admin/ch_profil"), "html", null, true);
        echo "\">Profil</a></li>
                                    <li><a href=\"";
        // line 42
        echo twig_escape_filter($this->env, site_url("admin/ch_pass"), "html", null, true);
        echo "\">Ubah Password</a></li>
                                    <li><a href=\"";
        // line 43
        echo twig_escape_filter($this->env, site_url("admin/logout"), "html", null, true);
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
        // line 73
        echo twig_escape_filter($this->env, site_url("admin/tugas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Tugas </a></li>
                                <li><a href=\"";
        // line 74
        echo twig_escape_filter($this->env, site_url("admin/materi"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i> Materi </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 78
        echo twig_escape_filter($this->env, site_url("admin/siswa"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Siswa </a></li>
                                <li><a href=\"";
        // line 79
        echo twig_escape_filter($this->env, site_url("admin/pengajar"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i> Pengajar </a></li>
                            </ul>

                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 83
        echo twig_escape_filter($this->env, site_url("admin/mapel_kelas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-paste\"></i>Matapelajaran Kelas </a></li>
                                <li><a href=\"";
        // line 84
        echo twig_escape_filter($this->env, site_url("admin/kelas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Manajemen Kelas </a></li>
                                <li><a href=\"";
        // line 85
        echo twig_escape_filter($this->env, site_url("admin/mapel"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i>Manajemen Matapelajaran </a></li>
                            </ul>

                            <!--/.widget-nav-->
                            <ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"";
        // line 90
        echo twig_escape_filter($this->env, site_url("admin/logout"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-signout\"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class=\"span9\">
                        <div class=\"content\">
                            ";
        // line 98
        $this->displayBlock('content', $context, $blocks);
        // line 99
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
        // line 110
        echo (isset($context["copyright"]) ? $context["copyright"] : null);
        echo " </b> All rights reserved.<br>
                    ";
        // line 111
        echo (isset($context["version"]) ? $context["version"] : null);
        echo " | Page loaded in ";
        echo twig_escape_filter($this->env, (isset($context["elapsed_time"]) ? $context["elapsed_time"] : null), "html", null, true);
        echo " seconds.
                </center>
            </div>
        </div>
        ";
        // line 115
        $this->displayBlock('js', $context, $blocks);
        // line 126
        echo "    </body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["web_title"]) ? $context["web_title"] : null), "html", null, true);
    }

    // line 8
    public function block_css($context, array $blocks = array())
    {
        // line 9
        echo "        <link type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap-responsive.min.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "css/theme.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "images/icons/css/font-awesome.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        ";
    }

    // line 98
    public function block_content($context, array $blocks = array())
    {
    }

    // line 115
    public function block_js($context, array $blocks = array())
    {
        // line 116
        echo "        <script type=\"text/javascript\">
        var site_url = \"";
        // line 117
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
        var base_url = \"";
        // line 118
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\";
        </script>
        <script src=\"";
        // line 120
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 121
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 122
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        ";
        // line 123
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
        <script src=\"";
        // line 124
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/script.js\" type=\"text/javascript\"></script>
        ";
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
        return array (  275 => 124,  271 => 123,  267 => 122,  263 => 121,  259 => 120,  254 => 118,  250 => 117,  247 => 116,  244 => 115,  239 => 98,  232 => 12,  228 => 11,  224 => 10,  219 => 9,  216 => 8,  210 => 7,  204 => 126,  202 => 115,  193 => 111,  189 => 110,  176 => 99,  174 => 98,  163 => 90,  155 => 85,  151 => 84,  147 => 83,  140 => 79,  136 => 78,  129 => 74,  125 => 73,  92 => 43,  88 => 42,  84 => 41,  78 => 38,  74 => 37,  58 => 26,  54 => 25,  42 => 16,  37 => 15,  35 => 8,  31 => 7,  23 => 1,);
    }
}
