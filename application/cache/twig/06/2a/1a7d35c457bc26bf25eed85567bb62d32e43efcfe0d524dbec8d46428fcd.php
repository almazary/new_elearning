<?php

/* default/admin_materi/list.html */
class __TwigTemplate_062a1a7d35c457bc26bf25eed85567bb62d32e43efcfe0d524dbec8d46428fcd extends Twig_Template
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
    <p>Pilih Kelas tujuan yang akan ditambah materi</p>
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
        return "default/admin_materi/list.html";
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
