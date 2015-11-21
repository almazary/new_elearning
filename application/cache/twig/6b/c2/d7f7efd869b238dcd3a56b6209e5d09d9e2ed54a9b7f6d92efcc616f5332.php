<?php

/* edit-pengajar-profile.html */
class __TwigTemplate_6bc2d7f7efd869b238dcd3a56b6209e5d09d9e2ed54a9b7f6d92efcc616f5332 extends Twig_Template
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
        echo "<h4>Edit Profil</h4>
";
        // line 5
        echo get_flashdata("edit");
        echo "

";
        // line 7
        if ((is_demo_app() && ($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "is_admin") == true))) {
            // line 8
            echo "    ";
            echo get_alert("warning", get_demo_msg());
            echo "
";
        }
        // line 10
        echo "
";
        // line 11
        echo form_open(((("pengajar/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)));
        echo "
<input type=\"hidden\" name=\"pengajar_id\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null), "html", null, true);
        echo "\">
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"30%\">NIP</th>
            <td>
                <input type=\"text\" id=\"nip\" name=\"nip\" style=\"width:40%;\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, set_value("nip", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nip")), "html", null, true);
        echo "\">
                <br>";
        // line 19
        echo form_error("nip");
        echo "
            </td>
        <tr>
        <tr>
            <th>Nama <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"nama\" style=\"width:90%;\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama")), "html", null, true);
        echo "\">
                <br>";
        // line 26
        echo form_error("nama");
        echo "
            </td>
        <tr>
        <tr>
            <th>Jenis Kelamin <span class=\"text-error\">*</span></th>
            <td>
                <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Laki-laki\" ";
        // line 32
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "jenis_kelamin") == "Laki-laki")) ? (true) : (false))), "html", null, true);
        echo "> Laki-laki</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\" ";
        // line 33
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "jenis_kelamin") == "Perempuan")) ? (true) : (false))), "html", null, true);
        echo "> Perempuan</label>
                <br>";
        // line 34
        echo form_error("jenis_kelamin");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>
                <input type=\"text\" name=\"tempat_lahir\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, set_value("tempat_lahir", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tempat_lahir")), "html", null, true);
        echo "\">
                <br>";
        // line 41
        echo form_error("tempat_lahir");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                ";
        // line 47
        $context["tgl"] = (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"), "d")) : (""));
        // line 48
        echo "                ";
        $context["bln"] = (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"), "m")) : (""));
        // line 49
        echo "                ";
        $context["thn"] = (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"), "Y")) : (""));
        // line 50
        echo "                <select class=\"span2\" style=\"width: 20%;float:left;margin-right:5px;\" name=\"tgl_lahir\">
                    <option value=\"\">--Tgl--</option>
                    ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 53
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("tgl_lahir", (isset($context["i"]) ? $context["i"] : null), ((((isset($context["i"]) ? $context["i"] : null) == (isset($context["tgl"]) ? $context["tgl"] : null))) ? (true) : (false))), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "                </select>
                <select class=\"span2\" style=\"width: 35%;float:left;margin-right:5px;\" name=\"bln_lahir\">
                    <option value=\"\">--Bulan--</option>
                    ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 59
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("bln_lahir", (isset($context["i"]) ? $context["i"] : null), ((((isset($context["i"]) ? $context["i"] : null) == (isset($context["bln"]) ? $context["bln"] : null))) ? (true) : (false))), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, get_indo_bulan((isset($context["i"]) ? $context["i"] : null)), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                </select>
                <input type=\"text\" name=\"thn_lahir\" style=\"width:15%;float:left;\" maxlength=\"4\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, set_value("thn_lahir", (isset($context["thn"]) ? $context["thn"] : null)), "html", null, true);
        echo "\" placeholder=\"Tahun\">
                <br>";
        // line 63
        echo form_error("thn_lahir");
        echo "
            </td>
        <tr>
        <tr>
            <th>Alamat</th>
            <td>
                <input type=\"text\" name=\"alamat\" style=\"width:90%;\" value=\"";
        // line 69
        echo twig_escape_filter($this->env, set_value("alamat", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "alamat")), "html", null, true);
        echo "\">
                <br>";
        // line 70
        echo form_error("alamat");
        echo "
            </td>
        <tr>
        ";
        // line 73
        if (is_admin()) {
            // line 74
            echo "        <tr>
            <th>Status <span class=\"text-error\">*</span></th>
            <td>
                ";
            // line 77
            if (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == 0)) {
                // line 78
                echo "                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"0\" ";
                echo twig_escape_filter($this->env, set_radio("status_id", "0", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == "0")) ? (true) : (false))), "html", null, true);
                echo "> Pending</label>
                ";
            }
            // line 80
            echo "                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"1\" ";
            echo twig_escape_filter($this->env, set_radio("status_id", "1", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == "1")) ? (true) : (false))), "html", null, true);
            echo "> Aktif</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"2\" ";
            // line 81
            echo twig_escape_filter($this->env, set_radio("status_id", "2", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == "2")) ? (true) : (false))), "html", null, true);
            echo "> Blocking</label>
                <br>";
            // line 82
            echo form_error("status_id");
            echo "
            </td>
        <tr>
        <tr>
            <th>Opsi</th>
            <td>
                <label class=\"checkbox text-warning\"><input type=\"checkbox\" name=\"is_admin\" value=\"1\" ";
            // line 88
            echo twig_escape_filter($this->env, set_checkbox("is_admin", "1", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "is_admin") == 1)) ? (true) : (false))), "html", null, true);
            echo "> Jadikan pengajar admin website</label>
                <br>";
            // line 89
            echo form_error("is_admin");
            echo "
            </td>
        <tr>
        ";
        }
        // line 93
        echo "
        ";
        // line 94
        if (((is_demo_app() == false) || ($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "is_admin") == false))) {
            // line 95
            echo "        <tr>
            <td colspan=\"2\">
                <button type=\"submit\" class=\"btn btn-primary\">Update</button>
            </td>
        </tr>
        ";
        }
        // line 101
        echo "    </tbody>
</table>
";
        // line 103
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "edit-pengajar-profile.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 103,  253 => 101,  245 => 95,  243 => 94,  240 => 93,  233 => 89,  229 => 88,  220 => 82,  216 => 81,  211 => 80,  205 => 78,  203 => 77,  198 => 74,  196 => 73,  190 => 70,  186 => 69,  177 => 63,  173 => 62,  170 => 61,  157 => 59,  153 => 58,  148 => 55,  135 => 53,  131 => 52,  127 => 50,  124 => 49,  121 => 48,  119 => 47,  110 => 41,  106 => 40,  97 => 34,  93 => 33,  89 => 32,  80 => 26,  76 => 25,  67 => 19,  63 => 18,  54 => 12,  50 => 11,  47 => 10,  41 => 8,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
