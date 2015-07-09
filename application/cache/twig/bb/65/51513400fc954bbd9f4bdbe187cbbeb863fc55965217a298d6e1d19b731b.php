<?php

/* list-mapel.html */
class __TwigTemplate_bb6551513400fc954bbd9f4bdbe187cbbeb863fc55965217a298d6e1d19b731b extends Twig_Template
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
        echo "Manajemen Matapelajaran - ";
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
        <h3>Manajemen Matapelajaran</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("mapel");
        echo "

        <div class=\"row-fluid\">
            <div class=\"span2\">
                <a href=\"";
        // line 17
        echo twig_escape_filter($this->env, site_url("mapel/add"), "html", null, true);
        echo "\" class=\"btn btn-primary\">Tambah Mapel</a>
            </div>
            <div class=\"span10\">
                Atur matapelajaran yang ada di sekolah<br>
                <b>Note: </b> Matapelajaran tidak dapat dihapus namun dapat di ubah menjadi tidak aktif
            </div>
        </div>

        <br>
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"5%\">No</th>
                    <th>Matapelajaran</th>
                    <th>Aktif</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapels"]) ? $context["mapels"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 37
            echo "                <tr>
                    <td>";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
                    <td>
                        ";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo "
                        <br><small>";
            // line 41
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "info"), "html", null, true));
            echo "</small>
                    </td>
                    <td>
                        ";
            // line 44
            if (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "aktif") == 1)) {
                // line 45
                echo "                        <i class=\"icon-ok\"></i>
                        ";
            } else {
                // line 47
                echo "                        <i class=\"icon-minus\"></i>
                        ";
            }
            // line 49
            echo "                    </td>
                    <td>
                        <a class=\"btn btn-default\" href=\"";
            // line 51
            echo twig_escape_filter($this->env, site_url(((("mapel/edit/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
            echo "\"><i class=\"icon-edit\"></i> Edit</a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "            </tbody>
        </table>

        <br>
        ";
        // line 59
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-mapel.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 59,  124 => 55,  114 => 51,  110 => 49,  106 => 47,  102 => 45,  100 => 44,  94 => 41,  90 => 40,  85 => 38,  82 => 37,  78 => 36,  56 => 17,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
