<?php

/* list-mapel-kelas.html */
class __TwigTemplate_cf6634a8e24be1c5c6ee4744926a5595621a3bc376f543c98df50f0a975ab75b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Matapelajaran Kelas - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Matapelajaran Kelas</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("mapel");
        echo "

        ";
        // line 15
        if (is_demo_app()) {
            // line 16
            echo "            ";
            echo get_alert("warning", get_demo_msg());
            echo "
        ";
        }
        // line 18
        echo "
        <div class=\"row-fluid\">
            <div class=\"span6\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading as-link\" data-toggle=\"collapse\" data-target=\"#form-filter\">
                        <b><i class=\"icon-search\"></i> Filter Kelas</b>
                    </div>
                    <div id=\"form-filter\" class=\"collapse\">
                        <div class=\"panel-body\">
                            <form class=\"form-horizontal row-fluid\" method=\"post\" action=\"";
        // line 27
        echo twig_escape_filter($this->env, site_url("kelas/mapel_kelas/list"), "html", null, true);
        echo "\">
                                <table class=\"table table-form table-condensed\">
                                    <tr>
                                        <td class=\"pull-right\">Parent Kelas</td>
                                        <td>
                                            <select name=\"parent_kelas\" id=\"parent-kelas\">
                                                <option>--pilih--</option>
                                                ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["parent_kelas"]) ? $context["parent_kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["pk"]) {
            // line 35
            echo "                                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pk"]) ? $context["pk"] : null), "id"), "html", null, true);
            echo "\" ";
            echo ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "parent_id") == $this->getAttribute((isset($context["pk"]) ? $context["pk"] : null), "id"))) ? ("selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pk"]) ? $context["pk"] : null), "nama"), "html", null, true);
            echo "</option>
                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pk'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=\"pull-right\">Sub Kelas</td>
                                        <td>
                                            <select name=\"sub_kelas\" id=\"sub-kelas\">
                                                <option>--pilih--</option>
                                                ";
        // line 45
        if ((!twig_test_empty((isset($context["sub_kelas"]) ? $context["sub_kelas"] : null)))) {
            // line 46
            echo "                                                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sub_kelas"]) ? $context["sub_kelas"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["sk"]) {
                // line 47
                echo "                                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sk"]) ? $context["sk"] : null), "id"), "html", null, true);
                echo "\" ";
                echo ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "sub_id") == $this->getAttribute((isset($context["sk"]) ? $context["sk"] : null), "id"))) ? ("selected") : (""));
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sk"]) ? $context["sk"] : null), "nama"), "html", null, true);
                echo "</option>
                                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "                                                ";
        }
        // line 50
        echo "                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button class=\"btn btn-small btn-primary\" type=\"submit\">Submit</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"span6\">
                Atur matapelajaran yang ada pada masing - masing kelas
            </div>
        </div>

        ";
        // line 70
        echo (isset($context["mapel_kelas_hirarki"]) ? $context["mapel_kelas_hirarki"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-mapel-kelas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 70,  133 => 50,  130 => 49,  117 => 47,  112 => 46,  110 => 45,  100 => 37,  87 => 35,  83 => 34,  73 => 27,  62 => 18,  56 => 16,  54 => 15,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
