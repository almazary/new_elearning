<?php

/* detail-jawaban.html */
class __TwigTemplate_08fe09289607fc4016f2257a454c27c2ce8f83349d940c7b607df38d7cfa1169 extends Twig_Template
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
        echo "<h4>Detail Jawaban</h4>

<table class=\"table table-condensed table-striped\">
    <thead>
        <tr>
            <th>Tgl Mengerjakan</th>
            <th>Tgl Selesai</th>
            <th>Lama Pengerjaan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>";
        // line 16
        echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "mulai")), "html", null, true);
        echo "</td>
            <td>";
        // line 17
        echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "tgl_submit")), "html", null, true);
        echo "</td>
            <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "total_waktu"), "html", null, true);
        echo "</td>
        </tr>
    </tbody>
</table>
<br>

<table class=\"table table-condensed table-striped\">
    <thead>
        <tr>
            <th>Jml soal</th>
            <th>Jml benar</th>
            <th>Jml salah</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>";
        // line 35
        echo twig_escape_filter($this->env, count($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "pertanyaan")), "html", null, true);
        echo "</td>
            <td>";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jml_benar"), "html", null, true);
        echo "</td>
            <td>";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jml_salah"), "html", null, true);
        echo "</td>
            <td><b>";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "nilai"), "html", null, true);
        echo "</b></td>
        </tr>
    </tbody>
</table>
<br>

<table class=\"table table-condensed\">
    <thead>
        <tr>
            <th colspan=\"2\">List Jawaban</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "pertanyaan"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 52
            echo "        <tr id=\"pertanyaan-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
            <td style=\"width:30px;\">
                <b>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "urutan"), "html", null, true);
            echo ".</b>
                <br>
                ";
            // line 56
            if ((get_jawaban($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) == get_kunci_pilihan($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan")))) {
                // line 57
                echo "                <span class=\"text-error\"><i class=\"icon icon-ok\"></i></span>
                ";
            } else {
                // line 59
                echo "                <span class=\"text-error\"><i class=\"icon icon-remove\"></i></span>
                ";
            }
            // line 61
            echo "            </td>
            <td>
                <div class=\"pertanyaan\">
                    ";
            // line 64
            echo html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan"));
            echo "
                </div>

                <div id=\"pilihan-";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
                    <table class=\"table table-condensed table-striped\">
                        <tbody>
                            ";
            // line 70
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
            foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                // line 71
                echo "                            <tr>
                                <td style=\"width:15px;\"><b>";
                // line 72
                echo twig_escape_filter($this->env, get_abjad($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan")), "html", null, true);
                echo "</b></td>
                                <td>
                                    ";
                // line 74
                echo html_entity_decode($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten"));
                echo "

                                    <ul class=\"unstyled inline\" style=\"margin-bottom: 0px;margin-left: -5px;\">
                                        ";
                // line 77
                if (($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 1)) {
                    // line 78
                    echo "                                            <li><small class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci Jawaban</small></li>
                                        ";
                }
                // line 80
                echo "                                        ";
                if ((is_pilih($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id")) == true)) {
                    // line 81
                    echo "                                            <li><small class=\"text-success\"><i class=\"icon-hand-up\"></i> Jawaban Siswa</small></li>
                                        ";
                }
                // line 83
                echo "                                    </ul>
                                </td>
                            </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pil'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "                        </tbody>
                    </table>
                </div>

            </td>
        </tr>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "    </tbody>
</table>

";
    }

    public function getTemplateName()
    {
        return "detail-jawaban.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 95,  183 => 87,  174 => 83,  170 => 81,  167 => 80,  163 => 78,  161 => 77,  155 => 74,  150 => 72,  147 => 71,  143 => 70,  137 => 67,  131 => 64,  126 => 61,  122 => 59,  118 => 57,  116 => 56,  111 => 54,  105 => 52,  101 => 51,  85 => 38,  81 => 37,  77 => 36,  73 => 35,  53 => 18,  49 => 17,  45 => 16,  31 => 4,  28 => 3,);
    }
}
