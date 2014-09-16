<?php

/* default/admin_mapel/list.html */
class __TwigTemplate_23f9066b6cc756d5afab0c2a4da18361d1d52c43af6f21074933ba8b65551a70 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<div class=\"row-fluid\">
<div class=\"span4\">
    <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, site_url("admin/mapel/add"), "html", null, true);
        echo "\" class=\"btn btn-primary\">Tambah Mapel</a>
</div>

<div class=\"span8\">

</div>

<br><br>
<p class=\"text-warning\"><b>NB: </b> Matapelajaran tidak dapat dihapus namun dapat di ubah menjadi tidak aktif.</p>

<table class=\"table table-striped\">
    <thead>
        <tr>
            <th width=\"8%\">No</th>
            <th>Matapelajaran</th>
            <th width=\"15%\"></th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapels"]) ? $context["mapels"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 24
            echo "        <tr>
            <td>";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
            <td>
                <span ";
            // line 27
            echo ((($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "aktif") != 1)) ? ("class=\"text-muted\"") : (""));
            echo ">
                ";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo "
                </span>
            </td>
            <td>
                <div class=\"btn-group\">
                  <a class=\"btn\" href=\"";
            // line 33
            echo twig_escape_filter($this->env, site_url(("admin/mapel/detail/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-zoom-in\"></i> Detail</a>
                  <a class=\"btn\" href=\"";
            // line 34
            echo twig_escape_filter($this->env, site_url(("admin/mapel/edit/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-edit\"></i> Edit</a>
                </div>
            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "    </tbody>
</table>

<br>
";
        // line 43
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "default/admin_mapel/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 43,  85 => 39,  74 => 34,  70 => 33,  62 => 28,  58 => 27,  53 => 25,  50 => 24,  46 => 23,  24 => 4,  19 => 1,);
    }
}
