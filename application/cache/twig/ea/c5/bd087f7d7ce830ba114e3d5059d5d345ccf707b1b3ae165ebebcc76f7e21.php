<?php

/* welcome.html */
class __TwigTemplate_eac5bd087f7d7ce830ba114e3d5059d5d345ccf707b1b3ae165ebebcc76f7e21 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"btn-controls\">
    <div class=\"btn-box-row row-fluid\">
        <div class=\"span12\">
            <div class=\"widget-usage\" style=\"padding: 10px 15px;margin-bottom: 20px;\">
                <small class=\"pull-right\">";
        // line 8
        echo twig_escape_filter($this->env, tgl_indo(date("Y-m-d")), "html", null, true);
        echo ", IP ";
        echo twig_escape_filter($this->env, get_ip(), "html", null, true);
        echo "</small>
                Selamat datang di <b>E-learning ";
        // line 9
        echo twig_escape_filter($this->env, get_pengaturan("nama-sekolah", "value"), "html", null, true);
        echo "</b>
                <br>
                <i class=\"icon icon-map-marker\"></i> ";
        // line 11
        echo twig_escape_filter($this->env, get_pengaturan("alamat", "value"), "html", null, true);
        echo "
                ";
        // line 12
        if ((!twig_test_empty(get_pengaturan("telp", "value")))) {
            // line 13
            echo "                <i class=\"icon icon-phone\"></i> ";
            echo twig_escape_filter($this->env, get_pengaturan("telp", "value"), "html", null, true);
            echo "
                ";
        }
        // line 15
        echo "            </div>

            ";
        // line 17
        if (((is_admin() == false) && (!twig_test_empty(get_pengaturan("peraturan-elearning", "value"))))) {
            // line 18
            echo "            <div class=\"widget-usage\" style=\"padding: 10px 15px;\">
                <b>Peraturan E-learning : </b><br>
                ";
            // line 20
            echo get_pengaturan("peraturan-elearning", "value");
            echo "
            </div>
            ";
        }
        // line 23
        echo "        </div>
    </div>
    <br>
    ";
        // line 26
        if (is_siswa()) {
            // line 27
            echo "    <div class=\"btn-box-row row-fluid\">
        <div class=\"span6\">
            <div class=\"widget-usage\" style=\"padding: 10px 15px;\">
                <b>Materi terbaru</b>
                <table class=\"table table-striped table-condensed\">
                    ";
            // line 32
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["materi_terbaru"]) ? $context["materi_terbaru"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 33
                echo "                    <tr>
                        <td>
                            <a href=\"";
                // line 35
                echo twig_escape_filter($this->env, site_url(("materi/detail/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"))), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
                echo "</a>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "                </table>
            </div>
        </div>
        <div class=\"span6\">
            <div class=\"widget-usage\" style=\"padding: 10px 15px;\">
                <b>Tugas terbaru</b>
                <table class=\"table table-striped table-condensed\">
                    ";
            // line 46
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tugas_terbaru"]) ? $context["tugas_terbaru"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 47
                echo "                    <tr>
                        <td>
                            <a href=\"";
                // line 49
                echo twig_escape_filter($this->env, site_url(("tugas?judul=" . urlencode($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul")))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
                echo "</a>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "                </table>
            </div>
        </div>
    </div>
    ";
        }
        // line 58
        echo "
    ";
        // line 59
        if (is_admin()) {
            // line 60
            echo "    <div class=\"btn-box-row row-fluid\" style=\"margin-top:-20px;\">
        <a href=\"";
            // line 61
            echo twig_escape_filter($this->env, site_url("siswa/index/1"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-group\"></i><b>";
            // line 62
            echo twig_escape_filter($this->env, (isset($context["jml_siswa"]) ? $context["jml_siswa"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Siswa</p>
        </a>
        <a href=\"";
            // line 65
            echo twig_escape_filter($this->env, site_url("pengajar/index/1"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-user\"></i><b>";
            // line 66
            echo twig_escape_filter($this->env, (isset($context["jml_pengajar"]) ? $context["jml_pengajar"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pengajar</p>
        </a>
        <a href=\"";
            // line 69
            echo twig_escape_filter($this->env, site_url("siswa/index/0"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-group\"></i><b>";
            // line 70
            echo twig_escape_filter($this->env, (isset($context["jml_siswa_pending"]) ? $context["jml_siswa_pending"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pending siswa</p>
        </a>
        <a href=\"";
            // line 73
            echo twig_escape_filter($this->env, site_url("pengajar/index/0"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-user\"></i><b>";
            // line 74
            echo twig_escape_filter($this->env, (isset($context["jml_pengajar_pending"]) ? $context["jml_pengajar_pending"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pending pengajar</p>
        </a>
    </div>

    <div class=\"well well-small\" style=\"box-shadow: none;background-color: #FFF;\">
        <div class=\"pull-right\">
            <a class=\"muted\" href=\"";
            // line 81
            echo twig_escape_filter($this->env, (isset($context["portal_update_link"]) ? $context["portal_update_link"] : null), "html", null, true);
            echo "\" target=\"_blank\">Portal update</a> |
            <a class=\"muted\" href=\"";
            // line 82
            echo twig_escape_filter($this->env, (isset($context["bug_tracker_link"]) ? $context["bug_tracker_link"] : null), "html", null, true);
            echo "\" target=\"_blank\">Bug tracker</a>
        </div>
        <b><i class=\"icon-bullhorn\"></i> Info Update</b>
        <table class=\"table table-striped table-condensed\" id=\"info-update\"></table>
        <input type=\"hidden\" id=\"info-update-link\" value=\"";
            // line 86
            echo twig_escape_filter($this->env, (isset($context["info_update_link"]) ? $context["info_update_link"] : null), "html", null, true);
            echo "\">
    </div>
    ";
        }
        // line 89
        echo "</div>
<!--/#btn-controls-->
";
    }

    public function getTemplateName()
    {
        return "welcome.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 89,  209 => 86,  202 => 82,  198 => 81,  188 => 74,  184 => 73,  178 => 70,  174 => 69,  168 => 66,  164 => 65,  158 => 62,  154 => 61,  151 => 60,  149 => 59,  146 => 58,  139 => 53,  127 => 49,  123 => 47,  119 => 46,  110 => 39,  98 => 35,  94 => 33,  90 => 32,  83 => 27,  81 => 26,  76 => 23,  70 => 20,  66 => 18,  64 => 17,  60 => 15,  54 => 13,  52 => 12,  48 => 11,  43 => 9,  37 => 8,  31 => 4,  28 => 3,);
    }
}
