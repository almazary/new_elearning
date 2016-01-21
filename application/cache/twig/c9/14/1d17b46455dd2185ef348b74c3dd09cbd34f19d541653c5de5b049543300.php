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
        echo "\"> <span class=\"visible-phone brand-txt\">E-Learning App</span><span class=\"visible-desktop visible-tablet brand-txt\">";
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
        echo "</span>
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
        $this->env->loadTemplate("top-mobile-menu.html")->display($context);
        // line 37
        echo "
                            ";
        // line 38
        if (is_admin()) {
            // line 39
            echo "                            <li><a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/get_plugin"), "html", null, true);
            echo "\">PLUGINS</a></li>
                            <li><a href=\"";
            // line 40
            echo twig_escape_filter($this->env, site_url("welcome/donation"), "html", null, true);
            echo "\">DONASI</a></li>
                            ";
        }
        // line 42
        echo "                            <li class=\"nav-user dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                ";
        // line 43
        echo twig_escape_filter($this->env, nama_panggilan(get_sess_data("user", "nama")), "html", null, true);
        echo "

                                <span class=\"pull-right\">
                                <img src=\"";
        // line 46
        echo twig_escape_filter($this->env, get_url_image_session(get_sess_data("user", "foto"), "medium", get_sess_data("user", "jenis_kelamin")), "html", null, true);
        echo "\" class=\"nav-avatar img-polaroid\" />
                                <b class=\"caret\"></b></a>
                                </span>
                                <ul class=\"dropdown-menu\">
                                    ";
        // line 50
        if (is_admin()) {
            // line 51
            echo "                                    <li>";
            echo anchor(((("pengajar/detail/" . get_sess_data("user", "status_id")) . "/") . get_sess_data("user", "id")), "Detail Profil", array("title" => "Detail Profil"));
            echo "</li>
                                    ";
        }
        // line 53
        echo "
                                    ";
        // line 54
        if (is_pengajar()) {
            // line 55
            echo "                                    <li>";
            echo anchor("login/pp", "Profil & Akun Login");
            echo "</li>
                                    ";
        }
        // line 57
        echo "
                                    ";
        // line 58
        if (is_siswa()) {
            // line 59
            echo "                                    <li>";
            echo anchor("login/pp", "Profil & Akun Login");
            echo "</li>
                                    ";
        }
        // line 61
        echo "
                                    <li><a href=\"";
        // line 62
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
                    <div class=\"span3 visible-desktop\">
                        <div class=\"sidebar\">
                            ";
        // line 79
        $this->env->loadTemplate("sidebar-menu.html")->display($context);
        // line 80
        echo "                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class=\"span9 mobile-12\">
                        <div class=\"content\">
                            ";
        // line 86
        if ((pass_siswa_equal_nis() == true)) {
            // line 87
            echo "                                ";
            echo get_alert("warning", ("Dimohon untuk segera mengganti password anda untuk alasan keamanan. " . anchor("login/pp?show=edit-password", "Ganti Password")));
            echo "
                            ";
        }
        // line 89
        echo "
                            ";
        // line 90
        $this->displayBlock('content', $context, $blocks);
        // line 91
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
        // line 102
        echo (isset($context["copyright"]) ? $context["copyright"] : null);
        echo " </b> All rights reserved.<br>
                    ";
        // line 103
        echo (isset($context["version"]) ? $context["version"] : null);
        echo " | Page loaded in ";
        echo twig_escape_filter($this->env, (isset($context["elapsed_time"]) ? $context["elapsed_time"] : null), "html", null, true);
        echo " seconds.
                </center>
            </div>
        </div>
        <script type=\"text/javascript\">
        var site_url = \"";
        // line 108
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\";
        var base_url = \"";
        // line 109
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\";
        </script>
        <script data-pace-options='{ \"ajax\": false }' src=\"";
        // line 111
        echo twig_escape_filter($this->env, base_url("assets/comp/pace/pace.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 112
        echo twig_escape_filter($this->env, base_url("assets/comp/offline/offline.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 113
        echo twig_escape_filter($this->env, base_url("assets/comp/jquery/jstz.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 114
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-1.9.1.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 115
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/jquery-ui-1.10.1.custom.min.js\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 116
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        ";
        // line 117
        echo (isset($context["comp_js"]) ? $context["comp_js"] : null);
        echo "
        <script src=\"";
        // line 118
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "scripts/script.js\" type=\"text/javascript\"></script>
        ";
        // line 119
        $this->displayBlock('js', $context, $blocks);
        // line 120
        echo "        <script type=\"text/javascript\">
            \$( document ).ready(function() {
                var tz = jstz.determine();
                var timezone = tz.name();
                \$.post(site_url + \"/ajax/post_data/save-time-zone\", {tz: timezone});

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

    // line 90
    public function block_content($context, array $blocks = array())
    {
    }

    // line 119
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
        return array (  310 => 119,  305 => 90,  300 => 14,  294 => 6,  279 => 120,  277 => 119,  273 => 118,  269 => 117,  265 => 116,  261 => 115,  257 => 114,  253 => 113,  249 => 112,  245 => 111,  240 => 109,  236 => 108,  226 => 103,  222 => 102,  209 => 91,  207 => 90,  204 => 89,  198 => 87,  196 => 86,  188 => 80,  186 => 79,  166 => 62,  163 => 61,  157 => 59,  155 => 58,  152 => 57,  146 => 55,  144 => 54,  141 => 53,  135 => 51,  133 => 50,  126 => 46,  120 => 43,  117 => 42,  112 => 40,  107 => 39,  105 => 38,  102 => 37,  100 => 36,  90 => 29,  82 => 26,  78 => 25,  66 => 16,  61 => 15,  59 => 14,  54 => 12,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  23 => 1,);
    }
}
