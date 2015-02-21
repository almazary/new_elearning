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
<strong>Tambah Jadwal Mengajar Hari ";
        // line 2
        echo twig_escape_filter($this->env, get_indo_hari((isset($context["hari_id"]) ? $context["hari_id"] : null)), "html", null, true);
        echo "</strong>
";
        // line 3
        echo get_flashdata("add");
        echo "

";
        // line 5
        echo form_open(((((("admin/pengajar/add_ampuan/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)) . "/") . (isset($context["hari_id"]) ? $context["hari_id"] : null)));
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
        // line 17
        echo "                </select>
                <br>";
        // line 18
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
        // line 26
        if ((!twig_test_empty(get_post_data("kelas_id")))) {
            // line 27
            echo "                        ";
            $context["post_kelas_id"] = get_post_data("kelas_id");
            // line 28
            echo "                        ";
            $context["mapel_kelas"] = get_row_data("mapel_model", "retrieve_all_kelas", array(0 => null, 1 => (isset($context["post_kelas_id"]) ? $context["post_kelas_id"] : null)));
            // line 29
            echo "                        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["mapel_kelas"]) ? $context["mapel_kelas"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 30
                echo "                            ";
                $context["m"] = get_row_data("mapel_model", "retrieve", array(0 => $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "mapel_id")));
                // line 31
                echo "                            ";
                if ((!twig_test_empty((isset($context["m"]) ? $context["m"] : null)))) {
                    // line 32
                    echo "                            <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "id"), "html", null, true);
                    echo "\" ";
                    echo (((get_post_data("mapel_kelas_id") == $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "id"))) ? ("selected") : (""));
                    echo ">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
                    echo "</option>
                            ";
                }
                // line 34
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "                    ";
        }
        // line 36
        echo "                </select>
                <br><span class=\"text-muted\">Pilih kelas terlebih dahulu</span>
                <br>";
        // line 38
        echo form_error("mapel_kelas_id");
        echo "
            </td>
        </tr>
        <tr>
            <th>Jam Mulai <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"jam_mulai\" style=\"width:19%\" placeholder=\"hh:mm\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, set_value("jam_mulai"), "html", null, true);
        echo "\">
                <span class=\"pull-right text-muted\">Contoh : 08:30</span>
                <br>";
        // line 46
        echo form_error("jam_mulai");
        echo "
            </td>
        </tr>
        <tr>
            <th>Jam Selesai <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"jam_selesai\" style=\"width:19%\" placeholder=\"hh:mm\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, set_value("jam_selesai"), "html", null, true);
        echo "\">
                <span class=\"pull-right text-muted\">Contoh : 13:30</span>
                <br>";
        // line 54
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
        // line 62
        echo form_close();
        echo "

<script type=\"text/javascript\">
\$('#kelas_id').change(function(){
    \$.ajax({
        type : \"POST\",
        url  : \"";
        // line 68
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
        return "default/admin_pengajar/add_ampuan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 68,  158 => 62,  147 => 54,  142 => 52,  133 => 46,  128 => 44,  119 => 38,  115 => 36,  112 => 35,  106 => 34,  96 => 32,  93 => 31,  90 => 30,  85 => 29,  82 => 28,  79 => 27,  77 => 26,  66 => 18,  63 => 17,  50 => 15,  46 => 14,  35 => 6,  31 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
