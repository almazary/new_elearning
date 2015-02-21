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

        <div class=\"bs-callout bs-callout-info\">
        <p><b>Matapelajaran Kelas</b> digunakan untuk mengatur matapelajaran yang ada pada masing - masing kelas</p>
        </div>

        <br>
        ";
        // line 16
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
        return array (  51 => 16,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
