<?php

/* edit-pengajar-ampuan.html */
class __TwigTemplate_d72da450b02fdc3882294948acce402de451f015b93b462a9db30a5bcac438dd extends Twig_Template
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
        echo "<h4>Edit Jadwal Ajar</h4>
";
        // line 5
        echo get_flashdata("edit");
        echo "

";
        // line 7
        echo form_open(((((("pengajar/edit_ampuan/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)) . "/") . $this->getAttribute((isset($context["ma"]) ? $context["ma"] : null), "id")));
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

    public function getTemplateName()
    {
        return "edit-pengajar-ampuan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 74,  180 => 66,  176 => 65,  167 => 59,  162 => 57,  153 => 51,  148 => 49,  139 => 43,  135 => 41,  129 => 40,  119 => 38,  116 => 37,  113 => 36,  109 => 35,  106 => 34,  103 => 33,  100 => 32,  97 => 31,  94 => 30,  91 => 29,  88 => 28,  85 => 27,  83 => 26,  73 => 19,  70 => 18,  57 => 16,  53 => 15,  43 => 8,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
