<?php

/* admin_pengajar/edit_ampuan.html */
class __TwigTemplate_11448cc9cd91fd3b02097b4a61546aae14851c0da1e1542a1a40ecb3f155b670 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-iframe.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
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
        echo "<strong>Edit Jadwal Ajar</strong>
";
        // line 5
        echo get_flashdata("edit");
        echo "

";
        // line 7
        echo form_open(((((("admin/pengajar/edit_ampuan/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)) . "/") . $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "id")));
        echo "
<input type=\"hidden\" name=\"pengajar_id\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null), "html", null, true);
        echo "\">
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"27%\">Kelas <span class=\"text-error\">*</span></th>
            <td>
                <select name=\"kelas_id\" style=\"width:auto;\" id=\"kelas_id\">
                    ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 16
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("kelas_id", $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), ((($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id") == $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "kelas_id"))) ? (true) : (false))), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "                </select>
                <br>";
        // line 19
        echo form_error("kelas_id");
        echo "
            </td>
        </tr>
        <tr>
            <th>Mapel <span class=\"text-error\">*</span></th>
            <td>
                <select name=\"mapel_kelas_id\" style=\"width:auto\" id=\"mapel_kelas_id\">
                    ";
        // line 26
        if ((!twig_test_empty(get_post_data("kelas_id")))) {
            // line 27
            echo "                        ";
            $context["select_option"] = get_post_data("mapel_kelas_id");
            // line 28
            echo "                        ";
            $context["post_kelas_id"] = get_post_data("kelas_id");
            // line 29
            echo "                        ";
            $context["mapel_kelas"] = get_row_data("mapel_model", "retrieve_all_kelas", array(0 => null, 1 => (isset($context["post_kelas_id"]) ? $context["post_kelas_id"] : null)));
            // line 30
            echo "                    ";
        } else {
            // line 31
            echo "                        ";
            $context["select_option"] = $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "mapel_kelas_id");
            // line 32
            echo "                        ";
            $context["mapel_kelas"] = get_row_data("mapel_model", "retrieve_all_kelas", array(0 => null, 1 => $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "kelas_id")));
            // line 33
            echo "                    ";
        }
        // line 34
        echo "
                    ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel_kelas"]) ? $context["mapel_kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["mak"]) {
            // line 36
            echo "                        ";
            $context["m"] = get_row_data("mapel_model", "retrieve", array(0 => $this->getAttribute((isset($context["mak"]) ? $context["mak"] : null), "mapel_id")));
            // line 37
            echo "                        ";
            if ((!twig_test_empty((isset($context["m"]) ? $context["m"] : null)))) {
                // line 38
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mak"]) ? $context["mak"] : null), "id"), "html", null, true);
                echo "\" ";
                echo ((((isset($context["select_option"]) ? $context["select_option"] : null) == $this->getAttribute((isset($context["mak"]) ? $context["mak"] : null), "id"))) ? ("selected") : (""));
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
                echo "</option>
                        ";
            }
            // line 40
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mak'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                </select>
                <br><span class=\"text-muted\">Pilih kelas terlebih dahulu</span>
                <br>";
        // line 43
        echo form_error("mapel_kelas_id");
        echo "
            </td>
        </tr>
        <tr>
            <th>Jam Mulai <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"jam_mulai\" style=\"width:19%\" placeholder=\"hh:mm\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, set_value("jam_mulai", twig_date_format_filter($this->env, $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "jam_mulai"), "H:i")), "html", null, true);
        echo "\">
                <span class=\"pull-right text-muted\">Contoh : 08:30</span>
                <br>";
        // line 51
        echo form_error("jam_mulai");
        echo "
            </td>
        </tr>
        <tr>
            <th>Jam Selesai <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"jam_selesai\" style=\"width:19%\" placeholder=\"hh:mm\" value=\"";
        // line 57
        echo twig_escape_filter($this->env, set_value("jam_selesai", twig_date_format_filter($this->env, $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "jam_selesai"), "H:i")), "html", null, true);
        echo "\">
                <span class=\"pull-right text-muted\">Contoh : 13:30</span>
                <br>";
        // line 59
        echo form_error("jam_selesai");
        echo "
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <label class=\"checkbox\"><input type=\"checkbox\" name=\"aktif\" value=\"1\" ";
        // line 65
        echo twig_escape_filter($this->env, set_checkbox("aktif", "1", ((($this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "aktif") == 1)) ? (true) : (false))), "html", null, true);
        echo "> Aktif</label>
                <br>";
        // line 66
        echo form_error("aktif");
        echo "
            </td>
        </tr>
        <tr>
            <td colspan=\"2\"><button type=\"submit\" class=\"btn btn-primary\">Simpan</button></td>
        </tr>
    </tbody>
</table>
";
        // line 74
        echo form_close();
        echo "
";
    }

    // line 77
    public function block_js($context, array $blocks = array())
    {
        // line 78
        $this->displayParentBlock("js", $context, $blocks);
        echo "
<script type=\"text/javascript\">
\$('#kelas_id').change(function(){
    \$.ajax({
        type : \"POST\",
        url  : \"";
        // line 83
        echo twig_escape_filter($this->env, site_url("admin/ajax_post/mapel_kelas"), "html", null, true);
        echo "\",
        data : \"kelas_id=\" + this.value,
        success : function(data){
            \$('#mapel_kelas_id').html(data);
        }
    });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "admin_pengajar/edit_ampuan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 83,  201 => 78,  198 => 77,  192 => 74,  181 => 66,  177 => 65,  168 => 59,  163 => 57,  154 => 51,  149 => 49,  140 => 43,  136 => 41,  130 => 40,  120 => 38,  117 => 37,  114 => 36,  110 => 35,  107 => 34,  104 => 33,  101 => 32,  98 => 31,  95 => 30,  92 => 29,  89 => 28,  86 => 27,  84 => 26,  74 => 19,  71 => 18,  58 => 16,  54 => 15,  44 => 8,  40 => 7,  35 => 5,  32 => 4,  29 => 3,);
    }
}
