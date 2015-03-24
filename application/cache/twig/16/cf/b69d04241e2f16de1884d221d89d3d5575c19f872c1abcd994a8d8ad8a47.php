<?php

/* admin_mapel_kelas/list.html */
class __TwigTemplate_16cfb69d04241e2f16de1884d221d89d3d5575c19f872c1abcd994a8d8ad8a47 extends Twig_Template
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
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 6
        echo (isset($context["module_title"]) ? $context["module_title"] : null);
        echo "</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 9
        echo get_flashdata("mapel");
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
        // line 19
        echo twig_escape_filter($this->env, site_url("admin/mapel_kelas/list"), "html", null, true);
        echo "\">
                            <table class=\"table table-form table-condensed\">
                                <tr>
                                    <td class=\"pull-right\">Parent Kelas</td>
                                    <td>
                                        <select name=\"parent_kelas\" id=\"parent-kelas\">
                                            <option>--pilih--</option>
                                            ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["parent_kelas"]) ? $context["parent_kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["pk"]) {
            // line 27
            echo "                                            <option value=\"";
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
        // line 29
        echo "                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=\"pull-right\">Sub Kelas</td>
                                    <td>
                                        <select name=\"sub_kelas\" id=\"sub-kelas\">
                                            <option>--pilih--</option>
                                            ";
        // line 37
        if ((!twig_test_empty((isset($context["sub_kelas"]) ? $context["sub_kelas"] : null)))) {
            // line 38
            echo "                                                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sub_kelas"]) ? $context["sub_kelas"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["sk"]) {
                // line 39
                echo "                                                <option value=\"";
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
            // line 41
            echo "                                            ";
        }
        // line 42
        echo "                                        </select>
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
        // line 62
        echo (isset($context["mapel_kelas_hirarki"]) ? $context["mapel_kelas_hirarki"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_mapel_kelas/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 62,  114 => 42,  111 => 41,  98 => 39,  93 => 38,  91 => 37,  81 => 29,  68 => 27,  64 => 26,  54 => 19,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
