<?php

/* admin_pengajar/add_ampuan.html */
class __TwigTemplate_8d93233d3d724790e7c9f8834c7184d4b4cacb000530d85606511e8a17358ea1 extends Twig_Template
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
        echo "<strong>Tambah Jadwal Mengajar Hari ";
        echo twig_escape_filter($this->env, get_indo_hari((isset($context["hari_id"]) ? $context["hari_id"] : null)), "html", null, true);
        echo "</strong>
";
        // line 5
        echo get_flashdata("add");
        echo "

";
        // line 7
        echo form_open(((((("admin/pengajar/add_ampuan/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)) . "/") . (isset($context["hari_id"]) ? $context["hari_id"] : null)));
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
                    <option value=\"\">Pilih Kelas</option>
                    ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 17
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("kelas_id", $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id")), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "                </select>
                <br>";
        // line 20
        echo form_error("kelas_id");
        echo "
            </td>
        </tr>
        <tr>
            <th>Mapel <span class=\"text-error\">*</span></th>
            <td>
                <select name=\"mapel_kelas_id\" style=\"width:auto\" id=\"mapel_kelas_id\">
                    <option value=\"\">Pilih Matapelajaran</option>
                    ";
        // line 28
        if ((!twig_test_empty(get_post_data("kelas_id")))) {
            // line 29
            echo "                        ";
            $context["post_kelas_id"] = get_post_data("kelas_id");
            // line 30
            echo "                        ";
            $context["mapel_kelas"] = get_row_data("mapel_model", "retrieve_all_kelas", array(0 => null, 1 => (isset($context["post_kelas_id"]) ? $context["post_kelas_id"] : null)));
            // line 31
            echo "                        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["mapel_kelas"]) ? $context["mapel_kelas"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 32
                echo "                            ";
                $context["m"] = get_row_data("mapel_model", "retrieve", array(0 => $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "mapel_id")));
                // line 33
                echo "                            ";
                if ((!twig_test_empty((isset($context["m"]) ? $context["m"] : null)))) {
                    // line 34
                    echo "                            <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "id"), "html", null, true);
                    echo "\" ";
                    echo (((get_post_data("mapel_kelas_id") == $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "id"))) ? ("selected") : (""));
                    echo ">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
                    echo "</option>
                            ";
                }
                // line 36
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "                    ";
        }
        // line 38
        echo "                </select>
                <br><span class=\"text-muted\">Pilih kelas terlebih dahulu</span>
                <br>";
        // line 40
        echo form_error("mapel_kelas_id");
        echo "
            </td>
        </tr>
        <tr>
            <th>Jam Mulai <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"jam_mulai\" style=\"width:19%\" placeholder=\"hh:mm\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, set_value("jam_mulai"), "html", null, true);
        echo "\">
                <span class=\"pull-right text-muted\">Contoh : 08:30</span>
                <br>";
        // line 48
        echo form_error("jam_mulai");
        echo "
            </td>
        </tr>
        <tr>
            <th>Jam Selesai <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"jam_selesai\" style=\"width:19%\" placeholder=\"hh:mm\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, set_value("jam_selesai"), "html", null, true);
        echo "\">
                <span class=\"pull-right text-muted\">Contoh : 13:30</span>
                <br>";
        // line 56
        echo form_error("jam_selesai");
        echo "
            </td>
        </tr>
        <tr>
            <td colspan=\"2\"><button type=\"submit\" class=\"btn btn-primary\">Simpan</button></td>
        </tr>
    </tbody>
</table>
";
        // line 64
        echo form_close();
        echo "
";
    }

    // line 67
    public function block_js($context, array $blocks = array())
    {
        // line 68
        $this->displayParentBlock("js", $context, $blocks);
        echo "
<script type=\"text/javascript\">
\$('#kelas_id').change(function(){
    \$.ajax({
        type : \"POST\",
        url  : \"";
        // line 73
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
        return "admin_pengajar/add_ampuan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 73,  178 => 68,  175 => 67,  169 => 64,  158 => 56,  153 => 54,  144 => 48,  139 => 46,  130 => 40,  126 => 38,  123 => 37,  117 => 36,  107 => 34,  104 => 33,  101 => 32,  96 => 31,  93 => 30,  90 => 29,  88 => 28,  77 => 20,  74 => 19,  61 => 17,  57 => 16,  46 => 8,  42 => 7,  37 => 5,  32 => 4,  29 => 3,);
    }
}
