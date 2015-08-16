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
        // line 19
        if (is_siswa()) {
            // line 20
            echo "    <div class=\"btn-box-row row-fluid\">
        <div class=\"span6\">
            <div class=\"widget-usage\" style=\"padding: 10px 15px;\">
                <b>Materi terbaru</b>
                <table class=\"table table-striped table-condensed\">
                    ";
            // line 25
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["materi_terbaru"]) ? $context["materi_terbaru"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 26
                echo "                    <tr>
                        <td>
                            <a href=\"";
                // line 28
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
            // line 32
            echo "                </table>
            </div>
        </div>
        <div class=\"span6\">
            <div class=\"widget-usage\" style=\"padding: 10px 15px;\">
                <b>Tugas terbaru</b>
                <table class=\"table table-striped table-condensed\">
                    ";
            // line 39
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tugas_terbaru"]) ? $context["tugas_terbaru"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 40
                echo "                    <tr>
                        <td>
                            <a href=\"";
                // line 42
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
            // line 46
            echo "                </table>
            </div>
        </div>
    </div>
    ";
        }
        // line 51
        echo "
    ";
        // line 52
        if (is_admin()) {
            // line 53
            echo "    <div class=\"btn-box-row row-fluid\">
        <a href=\"";
            // line 54
            echo twig_escape_filter($this->env, site_url("siswa/index/1"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-group\"></i><b>";
            // line 55
            echo twig_escape_filter($this->env, (isset($context["jml_siswa"]) ? $context["jml_siswa"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Siswa</p>
        </a>
        <a href=\"";
            // line 58
            echo twig_escape_filter($this->env, site_url("pengajar/index/1"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-user\"></i><b>";
            // line 59
            echo twig_escape_filter($this->env, (isset($context["jml_pengajar"]) ? $context["jml_pengajar"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pengajar</p>
        </a>
        <a href=\"";
            // line 62
            echo twig_escape_filter($this->env, site_url("siswa/index/0"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-group\"></i><b>";
            // line 63
            echo twig_escape_filter($this->env, (isset($context["jml_siswa_pending"]) ? $context["jml_siswa_pending"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pending siswa</p>
        </a>
        <a href=\"";
            // line 66
            echo twig_escape_filter($this->env, site_url("pengajar/index/0"), "html", null, true);
            echo "\" class=\"btn-box big span3\">
            <i class=\"icon-user\"></i><b>";
            // line 67
            echo twig_escape_filter($this->env, (isset($context["jml_pengajar_pending"]) ? $context["jml_pengajar_pending"] : null), "html", null, true);
            echo "</b>
            <p class=\"text-muted\">Pending pengajar</p>
        </a>
    </div>
    ";
        }
        // line 72
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
        return array (  181 => 72,  173 => 67,  169 => 66,  163 => 63,  159 => 62,  153 => 59,  149 => 58,  143 => 55,  139 => 54,  136 => 53,  134 => 52,  131 => 51,  124 => 46,  112 => 42,  108 => 40,  104 => 39,  95 => 32,  83 => 28,  79 => 26,  75 => 25,  68 => 20,  66 => 19,  60 => 15,  54 => 13,  52 => 12,  48 => 11,  43 => 9,  37 => 8,  31 => 4,  28 => 3,);
    }
}
