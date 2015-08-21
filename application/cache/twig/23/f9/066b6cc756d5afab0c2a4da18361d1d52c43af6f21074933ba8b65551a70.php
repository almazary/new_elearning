<?php

/* admin_mapel/list.html */
class __TwigTemplate_23f9066b6cc756d5afab0c2a4da18361d1d52c43af6f21074933ba8b65551a70 extends Twig_Template
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
            <div class=\"span2\">
                <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, site_url("admin/mapel/add"), "html", null, true);
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
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapels"]) ? $context["mapels"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 33
            echo "                <tr>
                    <td>";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
                    <td>
                        ";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo "
                        <br><small>";
            // line 37
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "info"), "html", null, true));
            echo "</small>
                    </td>
                    <td>
                        ";
            // line 40
            if (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "aktif") == 1)) {
                // line 41
                echo "                        <i class=\"icon-ok\"></i>
                        ";
            } else {
                // line 43
                echo "                        <i class=\"icon-minus\"></i>
                        ";
            }
            // line 45
            echo "                    </td>
                    <td>
                        <a class=\"btn btn-default\" href=\"";
            // line 47
            echo twig_escape_filter($this->env, site_url(((("admin/mapel/edit/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")) . "/") . enurl_redirect(current_url()))), "html", null, true);
            echo "\"><i class=\"icon-edit\"></i> Edit</a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "            </tbody>
        </table>

        <br>
        ";
        // line 55
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_mapel/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 55,  116 => 51,  106 => 47,  102 => 45,  98 => 43,  94 => 41,  92 => 40,  86 => 37,  82 => 36,  77 => 34,  74 => 33,  70 => 32,  48 => 13,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
