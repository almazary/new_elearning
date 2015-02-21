<?php

/* admin_mapel/detail.html */
class __TwigTemplate_f3fab41ffaecfbb98ab5a27d1e5a8b56d1240edd5a06e90c7f8390fbd9e8be6c extends Twig_Template
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

        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <span class=\"pull-right\">
                    ";
        // line 14
        if (($this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "aktif") != 1)) {
            // line 15
            echo "                        <span class=\"badge\">Matapelajaran Tidak Aktif</span> |
                        <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, site_url(("admin/mapel/edit/" . $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-edit\"></i> Edit</a>
                    ";
        }
        // line 18
        echo "                </span>
                <strong>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo "</strong>
            </div>
            <div class=\"panel-body\">
                ";
        // line 22
        echo $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "info");
        echo "
            </div>
        </div>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_mapel/detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 22,  62 => 19,  59 => 18,  54 => 16,  51 => 15,  49 => 14,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
