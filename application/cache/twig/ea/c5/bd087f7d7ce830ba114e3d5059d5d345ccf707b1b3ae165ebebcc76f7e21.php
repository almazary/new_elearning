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
            <div class=\"widget-usage\" style=\"padding: 10px 15px;\">
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
        </div>
    </div>
    <br>

    ";
        // line 20
        if (is_admin()) {
            // line 21
            echo "    <div class=\"btn-box-row row-fluid\">
        <a href=\"";
            // line 22
            echo twig_escape_filter($this->env, site_url("siswa/index/1"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-group\"></i><b>";
            // line 23
            echo twig_escape_filter($this->env, (isset($context["jml_siswa"]) ? $context["jml_siswa"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Siswa</p>
        </a>
        <a href=\"";
            // line 26
            echo twig_escape_filter($this->env, site_url("pengajar/index/1"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-user\"></i><b>";
            // line 27
            echo twig_escape_filter($this->env, (isset($context["jml_pengajar"]) ? $context["jml_pengajar"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pengajar</p>
        </a>
        <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, site_url("siswa/index/0"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-group\"></i><b>";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["jml_siswa_pending"]) ? $context["jml_siswa_pending"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pending siswa</p>
        </a>
        <a href=\"";
            // line 34
            echo twig_escape_filter($this->env, site_url("pengajar/index/0"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-user\"></i><b>";
            // line 35
            echo twig_escape_filter($this->env, (isset($context["jml_pengajar_pending"]) ? $context["jml_pengajar_pending"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pending pengajar</p>
        </a>
    </div>

    <div class=\"btn-box-row row-fluid\">
        <div class=\"span6\">
            <div class=\"well well-small\" style=\"box-shadow: none;background-color: #FFF;\">
                <b><i class=\"icon-bullhorn\"></i> Pengumuman</b>
                <table class=\"table table-striped table-condensed\">
                    ";
            // line 45
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pengumuman"]) ? $context["pengumuman"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 46
                echo "                    <tr>
                        <td>";
                // line 47
                echo anchor(("pengumuman/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "judul"));
                echo "</td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "                </table>
            </div>
        </div>
        <div class=\"span6\">
            <div class=\"well well-small\" style=\"box-shadow: none;background-color: #FFF;\">
                <div class=\"pull-right\">
                    <a class=\"muted\" href=\"";
            // line 56
            echo twig_escape_filter($this->env, (isset($context["portal_update_link"]) ? $context["portal_update_link"] : null), "html", null, true);
            echo "\" target=\"_tab\">Portal update</a> |
                    <a class=\"muted\" href=\"";
            // line 57
            echo twig_escape_filter($this->env, (isset($context["bug_tracker_link"]) ? $context["bug_tracker_link"] : null), "html", null, true);
            echo "\" target=\"_tab\">Bug tracker</a>
                </div>
                <b><i class=\"icon-bullhorn\"></i> Info Update</b>
                <table class=\"table table-striped table-condensed\" id=\"info-update\"></table>
                <input type=\"hidden\" id=\"info-update-link\" value=\"";
            // line 61
            echo twig_escape_filter($this->env, (isset($context["info_update_link"]) ? $context["info_update_link"] : null), "html", null, true);
            echo "\">
            </div>
        </div>
    </div>
    ";
        }
        // line 66
        echo "
    ";
        // line 67
        if (is_pengajar()) {
            // line 68
            echo "    <div class=\"btn-box-row row-fluid\">
        <div class=\"span6\">
            <div class=\"widget-usage\" style=\"padding: 10px 15px;\">
                <b><i class=\"icon-bullhorn\"></i> Pengumuman</b>
                <table class=\"table table-striped table-condensed\">
                    ";
            // line 73
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pengumuman"]) ? $context["pengumuman"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 74
                echo "                    <tr>
                        <td>";
                // line 75
                echo anchor(("pengumuman/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "judul"));
                echo "</td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            echo "                </table>
            </div>
        </div>
        <div class=\"span6\">
            <div class=\"widget-usage\" style=\"padding: 10px 15px;\">
                <b>Peraturan E-learning : </b><br>
                ";
            // line 84
            echo get_pengaturan("peraturan-elearning", "value");
            echo "
            </div>
        </div>
    </div>
    ";
        }
        // line 89
        echo "
    ";
        // line 90
        if (is_siswa()) {
            // line 91
            echo "    <div class=\"btn-box-row row-fluid\">
        <div class=\"span6\">

            <div class=\"widget-usage\" style=\"padding: 10px 15px; margin-bottom: 20px;\">
                <b>Tugas terbaru</b>
                <table class=\"table table-striped table-condensed\">
                    ";
            // line 97
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tugas_terbaru"]) ? $context["tugas_terbaru"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 98
                echo "                    <tr>
                        <td>
                            <a href=\"";
                // line 100
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
            // line 104
            echo "                </table>
            </div>

            <div class=\"widget-usage\" style=\"padding: 10px 15px; margin-bottom: 20px;\">
                <b>Materi terbaru</b>
                <table class=\"table table-striped table-condensed\">
                    ";
            // line 110
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["materi_terbaru"]) ? $context["materi_terbaru"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 111
                echo "                    <tr>
                        <td>
                            <a href=\"";
                // line 113
                echo twig_escape_filter($this->env, site_url(("materi/detail/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"))), "html", null, true);
                echo "\" target=\"_tab\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
                echo "</a>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 117
            echo "                </table>
            </div>

        </div>
        <div class=\"span6\">
            <div class=\"widget-usage\" style=\"padding: 10px 15px; margin-bottom: 20px;\">
                <b><i class=\"icon-bullhorn\"></i> Pengumuman</b>
                <table class=\"table table-striped table-condensed\">
                    ";
            // line 125
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pengumuman"]) ? $context["pengumuman"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 126
                echo "                    <tr>
                        <td>";
                // line 127
                echo anchor(("pengumuman/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "judul"));
                echo "</td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 130
            echo "                </table>
            </div>

            <div class=\"widget-usage\" style=\"padding: 10px 15px;\">
                <b>Peraturan E-learning : </b><br>
                ";
            // line 135
            echo get_pengaturan("peraturan-elearning", "value");
            echo "
            </div>
        </div>
    </div>
    ";
        }
        // line 140
        echo "
</div>
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
        return array (  308 => 140,  300 => 135,  293 => 130,  284 => 127,  281 => 126,  277 => 125,  267 => 117,  255 => 113,  251 => 111,  247 => 110,  239 => 104,  227 => 100,  223 => 98,  219 => 97,  211 => 91,  209 => 90,  206 => 89,  198 => 84,  190 => 78,  181 => 75,  178 => 74,  174 => 73,  167 => 68,  165 => 67,  162 => 66,  154 => 61,  147 => 57,  143 => 56,  135 => 50,  126 => 47,  123 => 46,  119 => 45,  106 => 35,  102 => 34,  96 => 31,  92 => 30,  86 => 27,  82 => 26,  76 => 23,  72 => 22,  69 => 21,  67 => 20,  60 => 15,  54 => 13,  52 => 12,  48 => 11,  43 => 9,  37 => 8,  31 => 4,  28 => 3,);
    }
}
