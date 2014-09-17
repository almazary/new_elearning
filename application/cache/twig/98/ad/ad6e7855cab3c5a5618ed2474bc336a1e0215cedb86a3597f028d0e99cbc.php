<?php

/* default/admin_siswa/moved_class.html */
class __TwigTemplate_98adad6e7855cab3c5a5618ed2474bc336a1e0215cedb86a3597f028d0e99cbc extends Twig_Template
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
<strong>Pilih Kelas Tujuan <span class=\"text-error\">*</span></strong>
";
        // line 3
        echo get_flashdata("class");
        echo "

";
        // line 5
        echo form_open(((("admin/siswa/moved_class/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["siswa_id"]) ? $context["siswa_id"] : null)), array("class" => "form-horizontal row-fluid"));
        echo "
<table class=\"table table-striped\">
    <tr>
        <td>
            <select class=\"span2\" name=\"kelas_id\">
                <option value=\"\">--pilih--</option>
                ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 12
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
        // line 14
        echo "            </select>
            <br>";
        // line 15
        echo form_error("kelas_id");
        echo "
        </td>
        <td>
            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
        </td>
    </tr>
</table>
";
        // line 22
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_siswa/moved_class.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 22,  55 => 15,  52 => 14,  41 => 12,  37 => 11,  28 => 5,  23 => 3,  19 => 1,);
    }
}
