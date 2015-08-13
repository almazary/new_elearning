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
        echo "            <div class=\"container\">
<h4>Detail Jawaban</h4>

<div class=\"rowd\">
    <div class=\"span7\">
        <table class=\"table table-condensed table-striped\">
            <thead>
                <tr>
                    <th>Jml benar</th>
                    <th>Jml salah</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jml_benar"), "html", null, true);
        echo "</td>
                    <td>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "jml_salah"), "html", null, true);
        echo "</td>
                    <td>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["history"]) ? $context["history"] : null), "nilai"), "html", null, true);
        echo "</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class=\"span5\">
        asdfasdf
    </div>
</div>
<br>

<table class=\"table table-condensed\">
    <thead>
        <tr>
            <th colspan=\"2\">Pertanyaan</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "pertanyaan"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 40
            echo "        <tr id=\"pertanyaan-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
            <td><b>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "urutan"), "html", null, true);
            echo ".</b></td>
            <td>
                <div class=\"pertanyaan\">
                    ";
            // line 44
            echo html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan"));
            echo "
                </div>

                <div id=\"pilihan-";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
                    <table class=\"table table-condensed table-striped\">
                        <tbody>
                            ";
            // line 50
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
            foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                // line 51
                echo "                            <tr>
                                <td style=\"width:30px;\"><label class=\"label-radio\"><input ";
                // line 52
                echo ((is_pilih($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id"))) ? ("checked") : (""));
                echo " type=\"radio\" name=\"pilihan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan"), "html", null, true);
                echo "\" onclick=\"update_ganda(";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id"), "html", null, true);
                echo ")\" class=\"radio\"> ";
                echo twig_escape_filter($this->env, get_abjad($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan")), "html", null, true);
                echo "</label></td>
                                <td>
                                    ";
                // line 54
                echo html_entity_decode($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten"));
                echo "
                                </td>
                            </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pil'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
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
        // line 66
        echo "    </tbody>
</table>
</div>

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
        return array (  151 => 66,  138 => 58,  128 => 54,  111 => 52,  108 => 51,  104 => 50,  98 => 47,  92 => 44,  86 => 41,  81 => 40,  77 => 39,  56 => 21,  52 => 20,  48 => 19,  31 => 4,  28 => 3,);
    }
}
