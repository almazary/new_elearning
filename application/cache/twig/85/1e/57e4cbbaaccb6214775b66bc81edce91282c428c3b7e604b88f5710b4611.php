<?php

/* lihat-nilai.html */
class __TwigTemplate_851e57e4cbbaaccb6214775b66bc81edce91282c428c3b7e604b88f5710b4611 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-iframe.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-iframe.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<h4>Nilai Tugas</h4>
";
        // line 5
        echo get_flashdata("edit");
        echo "

<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"35%\">Nilai</th>
            <td>";
        // line 11
        echo twig_escape_filter($this->env, round($this->getAttribute((isset($context["nilai"]) ? $context["nilai"] : null), "nilai"), 2), "html", null, true);
        echo "</td>
        <tr>
        <tr>
            <th width=\"35%\">Tgl Mengerjakan</th>
            <td>";
        // line 15
        echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "mulai")), "html", null, true);
        echo "</td>
        <tr>
    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "lihat-nilai.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 15,  43 => 11,  34 => 5,  31 => 4,  28 => 3,);
    }
}
