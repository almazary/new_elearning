<?php

/* detail-jawaban-essay.html */
class __TwigTemplate_06bccedf36bd1100ccf99f848ee2c22ec98acfea18e577f67d3717521f224a3f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-iframe.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-iframe.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        if (((isset($context["sudah_dikoreksi"]) ? $context["sudah_dikoreksi"] : null) == false)) {
            // line 5
            echo "    <h4>Koreksi Jawaban</h4>
";
        } else {
            // line 7
            echo "    <h4>Detail Jawaban</h4>
";
        }
        // line 9
        echo "
<table class=\"table table-condensed table-striped\">
    <thead>
        <tr>
            <th>Tgl Mengerjakan</th>
            <th>Tgl Selesai</th>
            <th>Lama Pengerjaan</th>
            ";
        // line 16
        if (((isset($context["sudah_dikoreksi"]) ? $context["sudah_dikoreksi"] : null) == true)) {
            // line 17
            echo "            <th>Nilai</th>
            ";
        }
        // line 19
        echo "        </tr>
    </thead>
    <tbody>
        <tr>
            <td>";
        // line 23
        echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "mulai")), "html", null, true);
        echo "</td>
            <td>";
        // line 24
        echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "tgl_submit")), "html", null, true);
        echo "</td>
            <td>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "total_waktu"), "html", null, true);
        echo "</td>
            ";
        // line 26
        if (((isset($context["sudah_dikoreksi"]) ? $context["sudah_dikoreksi"] : null) == true)) {
            // line 27
            echo "            <th>";
            echo twig_escape_filter($this->env, round($this->getAttribute((isset($context["nilai"]) ? $context["nilai"] : null), "nilai"), 2), "html", null, true);
            echo "</th>
            ";
        }
        // line 29
        echo "        </tr>
    </tbody>
</table>
<br>

";
        // line 34
        echo form_open(((("tugas/detail_jawaban/" . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")));
        echo "
<table class=\"table table-condensed\">
    <thead>
        <tr>
            <th colspan=\"2\">List Jawaban</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "pertanyaan"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 43
            echo "        <tr id=\"pertanyaan-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
            <td style=\"width:30px;\">
                <b>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "urutan"), "html", null, true);
            echo ".</b>
            </td>
            <td>
                <div class=\"pertanyaan\">
                    ";
            // line 49
            echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
            echo "
                </div>

                <b>Jawaban :</b>
                ";
            // line 53
            echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array(get_jawaban($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))));
            echo "

                <b>Nilai :</b>
                <br>
                <input type=\"text\" name=\"nilai[";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "]\" style=\"width:50px;\" value=\"";
            echo twig_escape_filter($this->env, get_jawaban($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "nilai"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")), "html", null, true);
            echo "\">
            </td>
        </tr>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "    </tbody>
</table>
<hr>
";
        // line 65
        if (((isset($context["sudah_dikoreksi"]) ? $context["sudah_dikoreksi"] : null) == false)) {
            // line 66
            echo "<button class=\"btn btn-primary\" type=\"submit\">Simpan Nilai</button>
";
        } else {
            // line 68
            echo "<button class=\"btn btn-primary\" type=\"submit\">Update Nilai</button>
";
        }
        // line 70
        echo "</form>

";
    }

    public function getTemplateName()
    {
        return "detail-jawaban-essay.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 70,  155 => 68,  151 => 66,  149 => 65,  144 => 62,  131 => 57,  124 => 53,  117 => 49,  110 => 45,  104 => 43,  100 => 42,  89 => 34,  82 => 29,  76 => 27,  74 => 26,  70 => 25,  66 => 24,  62 => 23,  56 => 19,  52 => 17,  50 => 16,  41 => 9,  37 => 7,  33 => 5,  31 => 4,  28 => 3,);
    }
}
