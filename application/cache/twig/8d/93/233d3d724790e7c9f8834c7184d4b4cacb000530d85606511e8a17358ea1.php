<?php

/* default/admin_pengajar/add_ampuan.html */
class __TwigTemplate_8d93233d3d724790e7c9f8834c7184d4b4cacb000530d85606511e8a17358ea1 extends Twig_Template
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
<strong>Tambah Mapel Ampu</strong>
";
        // line 3
        echo get_flashdata("add");
        echo "

";
        // line 5
        echo form_open(((("admin/pengajar/add_ampuan/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)));
        echo "
<input type=\"hidden\" name=\"pengajar_id\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null), "html", null, true);
        echo "\">
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"27%\">Kelas <span class=\"text-error\">*</span></th>
            <td>
                <select name=\"kelas_id\" style=\"width:auto;\" id=\"kelas_id\">
                    <option value=\"\">Pilih Kelas</option>
                    ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 15
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
        // line 17
        echo "                </select>
            </td>
        </tr>
        <tr>
            <th>Mapel <span class=\"text-error\">*</span></th>
            <td>
                <div id=\"view-mapel\"></div>
            </td>
        </tr>
        <tr>
            <th>Hari <span class=\"text-error\">*</span></th>
            <td>
                ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(get_indo_hari());
        foreach ($context['_seq'] as $context["key"] => $context["hari"]) {
            // line 30
            echo "                <label><input type=\"checkbox\" name=\"hari_id[]\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
            echo "\" style=\"margin-top:-2px;\"> ";
            echo twig_escape_filter($this->env, (isset($context["hari"]) ? $context["hari"] : null), "html", null, true);
            echo "</label>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['hari'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "            </td>
        </tr>
        <tr>
            <th>Jam Mulai <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"jam_mulai\" style=\"width:19%\" placeholder=\"hh:mm\">
                <span class=\"pull-right text-muted\">Contoh : 08:30</span>
            </td>
        </tr>
        <tr>
            <th>Jam Selesai <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"jam_selesai\" style=\"width:19%\" placeholder=\"hh:mm\">
                <span class=\"pull-right text-muted\">Contoh : 13:30</span>
            </td>
        </tr>
    </tbody>
</table>
";
        // line 50
        echo form_close();
        echo "

<script type=\"text/javascript\">
\$('#kelas_id').change(function(){
    \$.ajax({
        type : \"POST\",
        url  : \"";
        // line 56
        echo twig_escape_filter($this->env, site_url("admin/ajax_post/mapel_kelas"), "html", null, true);
        echo "\",
        data : \"kelas_id=\" + this.value,
        success : function(data){
            \$('#view-mapel').html(data);
        }
    });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "default/admin_pengajar/add_ampuan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 56,  107 => 50,  87 => 32,  76 => 30,  72 => 29,  58 => 17,  47 => 15,  43 => 14,  32 => 6,  28 => 5,  23 => 3,  19 => 1,);
    }
}
