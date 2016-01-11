<?php

/* detail-materi.html */
class __TwigTemplate_29e7abeb6ab234c92e133b9be5c71e9d4a095ced90650a15dacb2b1805b19de7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-detail-materi.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-detail-materi.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul"), "html", null, true);
        echo " - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <h1 class=\"title\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul"), "html", null, true);
        echo "</h1>
        ";
        // line 11
        if ((!array_key_exists("error", $context))) {
            // line 12
            echo "        <ul class=\"unstyled inline ul-top\">
            <li><b>";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "mapel"), "nama"), "html", null, true);
            echo "</b>,</li>
            ";
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "materi_kelas"));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 15
                echo "                <li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "nama"), "html", null, true);
                echo ",</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "            <li>Diposting oleh <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "pembuat"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "pembuat"), "nama"), "html", null, true);
            echo "</a></li>
            <li>";
            // line 18
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "tgl_posting")), "html", null, true);
            echo ",</li>
            <li>";
            // line 19
            echo ((((isset($context["type"]) ? $context["type"] : null) == "tertulis")) ? ("Dibaca") : ("Diunduh"));
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "views"), "html", null, true);
            echo " Kali</li>
            <li>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "jml_komentar"), "html", null, true);
            echo " Komentar</li>
        </ul>
        ";
        }
        // line 23
        echo "
        <hr class=\"hr-top\">
        <div class=\"wrap-content\">
            <div class=\"content\">
                ";
        // line 27
        if ((!array_key_exists("error", $context))) {
            // line 28
            echo "                    ";
            if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
                // line 29
                echo "                        ";
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "konten")));
                echo "
                    ";
            } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
                // line 31
                echo "                        <dl class=\"dl-horizontal\">
                            <dt>Name</dt>
                            <dd>";
                // line 33
                echo twig_escape_filter($this->env, ((twig_test_empty($this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "name"))) ? ("noname") : ($this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "name"))), "html", null, true);
                echo "</dd>
                            <dt>Size</dt>
                            <dd>";
                // line 35
                echo twig_escape_filter($this->env, byte_format($this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "size")), "html", null, true);
                echo "</dd>
                            <dt>Modified</dt>
                            <dd>";
                // line 37
                echo twig_escape_filter($this->env, tgl_jam_indo(mdate("%Y-%m-%d %H:%i:%s", $this->getAttribute((isset($context["materifile_info"]) ? $context["materifile_info"] : null), "date"))), "html", null, true);
                echo "</dd>
                            <dt>Mime</dt>
                            <dd>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "mime"), "html", null, true);
                echo "</dd>
                            <dt></dt>
                            <dd><br><a href=\"";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "download_link"), "html", null, true);
                echo "\" class=\"btn btn-warning\"><i class=\"icon-download\"></i> Download File</a></dd>
                        </dl>
                    ";
            }
            // line 44
            echo "
                    <br>
                    <div class=\"row-fluid\">
                        <div class=\"span8\">
                            <h4>
                                <i class=\"fa fa-pencil\"></i> Tulis komentar
                                <div class=\"pull-right\" style=\"font-size: 14px;\">";
            // line 50
            echo form_error("komentar");
            echo "</div>
                            </h4>
                            <div class=\"bg-form-komentar\" id=\"form-komentar\">
                                <form method=\"post\" action=\"";
            // line 53
            echo twig_escape_filter($this->env, site_url(("materi/detail/" . $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "id"))), "html", null, true);
            echo "\">
                                    <p><textarea class=\"span12\" id=\"komentar\" name=\"komentar\">";
            // line 54
            echo set_value("komentar");
            echo "</textarea></p>
                                    <p>
                                        <button class=\"btn btn-primary pull-right\">Post komentar</button>
                                        <img src=\"";
            // line 57
            echo twig_escape_filter($this->env, get_url_image_session(get_sess_data("user", "foto"), "medium", get_sess_data("user", "jenis_kelamin")), "html", null, true);
            echo "\" style=\"height:30px;width:30px; margin-right:5px;\" class=\"img-circle img-polaroid\">
                                        ";
            // line 58
            echo twig_escape_filter($this->env, get_sess_data("user", "nama"), "html", null, true);
            echo "
                                    </p>
                                    <div class=\"clear\"></div>
                                </form>
                            </div>
                            <br>

                            ";
            // line 65
            if (($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "jml_komentar") > 0)) {
                // line 66
                echo "                                <h4><i class=\"fa fa-comments\"></i> ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "jml_komentar"), "html", null, true);
                echo " Komentar</h4>

                                ";
                // line 68
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "komentar"));
                foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                    // line 69
                    echo "                                <div class=\"komentar\" id=\"komentar-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
                    echo "\">
                                    <img src=\"";
                    // line 70
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "link_image"), "html", null, true);
                    echo "\" style=\"height:25px;width:25px; margin-left:5px;\" class=\"img-circle img-polaroid pull-right\">
                                    <p><a href=\"";
                    // line 71
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "link_profil"), "html", null, true);
                    echo "\"><b>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "nama"), "html", null, true);
                    echo "</b></a>, <small>";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "tgl_posting"), "d F Y"), "html", null, true);
                    echo "</small>, <small><a href=\"";
                    echo twig_escape_filter($this->env, site_url(((("materi/detail/" . $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "id")) . "/laporkan/") . $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"))), "html", null, true);
                    echo "\" class=\"text-muted iframe-laporkan\"><i class=\"fa fa-bug\"></i> laporkan</a></small></p>
                                    ";
                    // line 72
                    echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "konten")));
                    echo "
                                </div>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 75
                echo "
                                <div style=\"font-size:12px;\">
                                ";
                // line 77
                echo $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "komentar_pagination");
                echo "
                                </div>
                            ";
            }
            // line 80
            echo "                        </div>
                        <div class=\"span4\">
                            <h4><i class=\"fa fa-file\"></i> Materi lainnya</h4>
                            <ul class=\"unstyled ul-materi\">
                                ";
            // line 84
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["terkait"]) ? $context["terkait"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 85
                echo "                                <li>
                                    <div class=\"materi\">
                                        <a href=\"";
                // line 87
                echo twig_escape_filter($this->env, site_url(("materi/detail/" . $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"))), "html", null, true);
                echo "\"><i class=\"fa ";
                echo ((twig_test_empty($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "file"))) ? ("fa-file-text") : ("fa-file"));
                echo " img-circle img-polaroid ";
                echo (((strlen($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "judul")) > 33)) ? ("pull-left") : (""));
                echo "\" style=\"padding:10px; margin-right:10px;\"></i>";
                echo $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "judul");
                echo "</a>
                                    </div>
                                </li>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            echo "
                                ";
            // line 92
            if (twig_test_empty((isset($context["terkait"]) ? $context["terkait"] : null))) {
                // line 93
                echo "                                <div class=\"alert alert-info\">Tidak ada materi terkait</div>
                                ";
            }
            // line 95
            echo "                            </ul>
                        </div>
                    </div>

                ";
        } else {
            // line 100
            echo "                    <div class=\"alert alert-danger\">
                        <h3>";
            // line 101
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</h3>
                    </div>
                ";
        }
        // line 104
        echo "            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "detail-materi.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  286 => 104,  280 => 101,  277 => 100,  270 => 95,  266 => 93,  264 => 92,  261 => 91,  245 => 87,  241 => 85,  237 => 84,  231 => 80,  225 => 77,  221 => 75,  212 => 72,  202 => 71,  198 => 70,  193 => 69,  189 => 68,  183 => 66,  181 => 65,  171 => 58,  167 => 57,  161 => 54,  157 => 53,  151 => 50,  143 => 44,  137 => 41,  132 => 39,  127 => 37,  122 => 35,  117 => 33,  113 => 31,  107 => 29,  104 => 28,  102 => 27,  96 => 23,  90 => 20,  84 => 19,  80 => 18,  73 => 17,  64 => 15,  60 => 14,  56 => 13,  53 => 12,  51 => 11,  47 => 10,  43 => 8,  40 => 7,  32 => 4,  29 => 3,);
    }
}
