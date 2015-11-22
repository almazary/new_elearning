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
            <div class=\"span2\">
                <a href=\"";
        // line 21
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
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapels"]) ? $context["mapels"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 41
            echo "                <tr>
                    <td>";
            // line 42
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
                    <td>
                        ";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo "
                        <br><small>";
            // line 45
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "info"), "html", null, true));
            echo "</small>
                    </td>
                    <td>
                        ";
            // line 48
            if (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "aktif") == 1)) {
                // line 49
                echo "                        <i class=\"icon-ok\"></i>
                        ";
            } else {
                // line 51
                echo "                        <i class=\"icon-minus\"></i>
                        ";
            }
            // line 53
            echo "                    </td>
                    <td>
                        <a class=\"btn btn-default\" href=\"";
            // line 55
            echo twig_escape_filter($this->env, site_url(((("mapel/edit/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
            echo "\"><i class=\"icon-edit\"></i> Edit</a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "            </tbody>
        </table>

        <br>
        ";
        // line 63
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
        return array (  141 => 63,  135 => 59,  125 => 55,  121 => 53,  117 => 51,  113 => 49,  111 => 48,  105 => 45,  101 => 44,  96 => 42,  93 => 41,  89 => 40,  67 => 21,  62 => 18,  56 => 16,  54 => 15,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
