<?php

/* default/admin_mapel_kelas/add.html */
class __TwigTemplate_42ef813f03298479b9687cd34aa10558e4466f8b977b329b1ee7db708d946b8f extends Twig_Template
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
<p>
    Pilih matapelajaran yang ingin di masukkan pada <b>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama", array(), "array"), "html", null, true);
        echo "</b>
</p>
</div>
<br>

";
        // line 9
        echo form_open(((("admin/mapel_kelas/add/" . $this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "id", array(), "array")) . "/") . $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "id", array(), "array")));
        echo "
<table class=\"table table-striped\">
<tbody>
    ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapels"]) ? $context["mapels"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 13
            echo "    ";
            $context["checked"] = get_row_data("mapel_model", "retrieve_kelas", array(0 => null, 1 => $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "id", array(), "array"), 2 => $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")));
            // line 14
            echo "    <tr>
        <td>
            ";
            // line 16
            if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") != 1)) {
                // line 17
                echo "            <span class=\"badge pull-right\">Matapelajaran Tidak Aktif</span>
            ";
            }
            // line 19
            echo "            <label><input type=\"checkbox\" name=\"mapel[]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" style=\"margin-top:-2px;margin-right:5px;\" ";
            echo ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") != 1)) ? ("disabled") : (""));
            echo " ";
            echo ((twig_test_empty((isset($context["checked"]) ? $context["checked"] : null))) ? ("") : ("checked"));
            echo "> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</label>
        </td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "</tbody>
</table>
<br>
<button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
<a href=\"";
        // line 27
        echo twig_escape_filter($this->env, site_url(("admin/mapel_kelas/#parent-" . $this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "id", array(), "array"))), "html", null, true);
        echo "\" class=\"btn\">Kembali</a>
";
        // line 28
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_mapel_kelas/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 28,  78 => 27,  72 => 23,  55 => 19,  51 => 17,  49 => 16,  45 => 14,  42 => 13,  38 => 12,  32 => 9,  24 => 4,  19 => 1,);
    }
}
