<?php

/* admin_siswa/moved_class.html */
class __TwigTemplate_98adad6e7855cab3c5a5618ed2474bc336a1e0215cedb86a3597f028d0e99cbc extends Twig_Template
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
        echo "<strong>Pilih Kelas Tujuan <span class=\"text-error\">*</span></strong>
";
        // line 5
        echo get_flashdata("class");
        echo "

";
        // line 7
        echo form_open(((("admin/siswa/moved_class/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["siswa_id"]) ? $context["siswa_id"] : null)), array("class" => "form-horizontal row-fluid"));
        echo "
<table class=\"table table-striped\">
    <tr>
        <td>
            <select class=\"span2\" name=\"kelas_id\">
                <option value=\"\">--pilih--</option>
                ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 14
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "            </select>
            <br>";
        // line 17
        echo form_error("kelas_id");
        echo "
        </td>
        <td>
            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
        </td>
    </tr>
</table>
";
        // line 24
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "admin_siswa/moved_class.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 24,  66 => 17,  63 => 16,  52 => 14,  48 => 13,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
