<?php

/* default/admin_mapel/detail.html */
class __TwigTemplate_f3fab41ffaecfbb98ab5a27d1e5a8b56d1240edd5a06e90c7f8390fbd9e8be6c extends Twig_Template
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
<div class=\"panel panel-default\">
    <div class=\"panel-heading\">
        <span class=\"pull-right\">
            ";
        // line 5
        if (($this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "aktif") != 1)) {
            // line 6
            echo "                <span class=\"badge\">Matapelajaran Tidak Aktif</span> |
                <a href=\"";
            // line 7
            echo twig_escape_filter($this->env, site_url(("admin/mapel/edit/" . $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-edit\"></i> Edit</a>
            ";
        }
        // line 9
        echo "        </span>
        <strong>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo "</strong>
    </div>
    <div class=\"panel-body\">
        ";
        // line 13
        echo $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "info");
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "default/admin_mapel/detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 13,  38 => 10,  35 => 9,  30 => 7,  27 => 6,  25 => 5,  19 => 1,);
    }
}
