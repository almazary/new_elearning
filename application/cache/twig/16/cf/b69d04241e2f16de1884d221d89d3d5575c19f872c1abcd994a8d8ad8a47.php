<?php

/* default/admin_mapel_kelas/list.html */
class __TwigTemplate_16cfb69d04241e2f16de1884d221d89d3d5575c19f872c1abcd994a8d8ad8a47 extends Twig_Template
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
<div class=\"bs-callout bs-callout-info\">
<p><b>Matapelajaran Kelas</b> digunakan untuk mengatur matapelajaran yang ada pada masing - masing kelas</p>
</div>

<br>
";
        // line 7
        echo (isset($context["mapel_kelas_hirarki"]) ? $context["mapel_kelas_hirarki"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_mapel_kelas/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 7,  19 => 1,);
    }
}
