<?php

/* detail-jawaban-ganda.html */
class __TwigTemplate_5e63717e47f71e2fed73b42dfafbc7c4b6dca9a2b679b6e87b7127ae9a6b3492 extends Twig_Template
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
            <th>Jml kosong</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>";
        // line 36
        echo twig_escape_filter($this->env, count($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "pertanyaan")), "html", null, true);
        echo "</td>
            <td>";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jml_benar"), "html", null, true);
        echo "</td>
            <td>";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jml_salah"), "html", null, true);
        echo "</td>
            <td>";
        // line 39
        echo twig_escape_filter($this->env, (((count($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "pertanyaan")) != ($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jml_benar") + $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jml_salah")))) ? ((count($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "pertanyaan")) - ($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jml_benar") + $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jml_salah")))) : (0)), "html", null, true);
        echo "</td>
            <td><b>";
        // line 40
        echo twig_escape_filter($this->env, round($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "nilai"), 2), "html", null, true);
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
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "pertanyaan"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 54
            echo "        <tr id=\"pertanyaan-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
            <td style=\"width:30px;\">
                <b>";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "urutan"), "html", null, true);
            echo ".</b>
                <br>
                ";
            // line 58
            if ((get_jawaban($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) == get_kunci_pilihan($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan")))) {
                // line 59
                echo "                <span class=\"text-error\"><i class=\"icon icon-ok\"></i></span>
                ";
            } else {
                // line 61
                echo "                <span class=\"text-error\"><i class=\"icon icon-remove\"></i></span>
                ";
            }
            // line 63
            echo "            </td>
            <td>
                <div class=\"pertanyaan\">
                    ";
            // line 66
            echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
            echo "
                </div>

                <div id=\"pilihan-";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
                    <table class=\"table table-condensed table-striped\">
                        <tbody>
                            ";
            // line 72
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
            foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                // line 73
                echo "                            <tr>
                                <td style=\"width:15px;\"><b>";
                // line 74
                echo twig_escape_filter($this->env, get_abjad($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan")), "html", null, true);
                echo "</b></td>
                                <td>
                                    ";
                // line 76
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten")));
                echo "

                                    <ul class=\"unstyled inline\" style=\"margin-bottom: 0px;margin-left: -5px;\">
                                        ";
                // line 79
                if (($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 1)) {
                    // line 80
                    echo "                                            <li><small class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci Jawaban</small></li>
                                        ";
                }
                // line 82
                echo "                                        ";
                if ((is_pilih($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id")) == true)) {
                    // line 83
                    echo "                                            <li><small class=\"text-success\"><i class=\"icon-hand-up\"></i> Jawaban Siswa</small></li>
                                        ";
                }
                // line 85
                echo "                                    </ul>
                                </td>
                            </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pil'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
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
        // line 97
        echo "    </tbody>
</table>

";
    }

    public function getTemplateName()
    {
        return "detail-jawaban-ganda.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 97,  188 => 89,  179 => 85,  175 => 83,  172 => 82,  168 => 80,  166 => 79,  160 => 76,  155 => 74,  152 => 73,  148 => 72,  142 => 69,  136 => 66,  131 => 63,  127 => 61,  123 => 59,  121 => 58,  116 => 56,  110 => 54,  106 => 53,  90 => 40,  86 => 39,  82 => 38,  78 => 37,  74 => 36,  53 => 18,  49 => 17,  45 => 16,  31 => 4,  28 => 3,);
    }
}
