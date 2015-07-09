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
        echo form_open(((("pengajar/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)));
        echo "
<input type=\"hidden\" name=\"pengajar_id\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null), "html", null, true);
        echo "\">
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"30%\">NIP</th>
            <td>
                <input type=\"text\" id=\"nip\" name=\"nip\" style=\"width:40%;\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, set_value("nip", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nip")), "html", null, true);
        echo "\">
                <br>";
        // line 15
        echo form_error("nip");
        echo "
            </td>
        <tr>
        <tr>
            <th>Nama <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"nama\" style=\"width:90%;\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama")), "html", null, true);
        echo "\">
                <br>";
        // line 22
        echo form_error("nama");
        echo "
            </td>
        <tr>
        <tr>
            <th>Jenis Kelamin <span class=\"text-error\">*</span></th>
            <td>
                <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Laki-laki\" ";
        // line 28
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "jenis_kelamin") == "Laki-laki")) ? (true) : (false))), "html", null, true);
        echo "> Laki-laki</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\" ";
        // line 29
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "jenis_kelamin") == "Perempuan")) ? (true) : (false))), "html", null, true);
        echo "> Perempuan</label>
                <br>";
        // line 30
        echo form_error("jenis_kelamin");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>
                <input type=\"text\" name=\"tempat_lahir\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, set_value("tempat_lahir", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tempat_lahir")), "html", null, true);
        echo "\">
                <br>";
        // line 37
        echo form_error("tempat_lahir");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                ";
        // line 43
        $context["tgl"] = (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"), "d")) : (""));
        // line 44
        echo "                ";
        $context["bln"] = (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"), "m")) : (""));
        // line 45
        echo "                ";
        $context["thn"] = (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"), "Y")) : (""));
        // line 46
        echo "                <select class=\"span2\" style=\"width: 20%;float:left;margin-right:5px;\" name=\"tgl_lahir\">
                    <option value=\"\">--Tgl--</option>
                    ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 49
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
        // line 51
        echo "                </select>
                <select class=\"span2\" style=\"width: 35%;float:left;margin-right:5px;\" name=\"bln_lahir\">
                    <option value=\"\">--Bulan--</option>
                    ";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 55
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
        // line 57
        echo "                </select>
                <input type=\"text\" name=\"thn_lahir\" style=\"width:15%;float:left;\" maxlength=\"4\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, set_value("thn_lahir", (isset($context["thn"]) ? $context["thn"] : null)), "html", null, true);
        echo "\" placeholder=\"Tahun\">
                <br>";
        // line 59
        echo form_error("thn_lahir");
        echo "
            </td>
        <tr>
        <tr>
            <th>Alamat</th>
            <td>
                <input type=\"text\" name=\"alamat\" style=\"width:90%;\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, set_value("alamat", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "alamat")), "html", null, true);
        echo "\">
                <br>";
        // line 66
        echo form_error("alamat");
        echo "
            </td>
        <tr>
        <tr>
            <th>Status <span class=\"text-error\">*</span></th>
            <td>
                ";
        // line 72
        if (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == 0)) {
            // line 73
            echo "                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"0\" ";
            echo twig_escape_filter($this->env, set_radio("status_id", "0", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == "0")) ? (true) : (false))), "html", null, true);
            echo "> Pending</label>
                ";
        }
        // line 75
        echo "                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"1\" ";
        echo twig_escape_filter($this->env, set_radio("status_id", "1", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == "1")) ? (true) : (false))), "html", null, true);
        echo "> Aktif</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"2\" ";
        // line 76
        echo twig_escape_filter($this->env, set_radio("status_id", "2", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == "2")) ? (true) : (false))), "html", null, true);
        echo "> Blocking</label>
                <br>";
        // line 77
        echo form_error("status_id");
        echo "
            </td>
        <tr>
        <tr>
            <th>Opsi</th>
            <td>
                <label class=\"checkbox text-warning\"><input type=\"checkbox\" name=\"is_admin\" value=\"1\" ";
        // line 83
        echo twig_escape_filter($this->env, set_checkbox("is_admin", "1", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "is_admin") == 1)) ? (true) : (false))), "html", null, true);
        echo "> Jadikan pengajar admin website</label>
                <br>";
        // line 84
        echo form_error("is_admin");
        echo "
            </td>
        <tr>
        <tr>
            <td colspan=\"2\">
                <button type=\"submit\" class=\"btn btn-primary\">Update</button>
            </td>
        </tr>
    </tbody>
</table>
";
        // line 94
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
        return array (  231 => 94,  218 => 84,  214 => 83,  205 => 77,  201 => 76,  196 => 75,  190 => 73,  188 => 72,  179 => 66,  175 => 65,  166 => 59,  162 => 58,  159 => 57,  146 => 55,  142 => 54,  137 => 51,  124 => 49,  120 => 48,  116 => 46,  113 => 45,  110 => 44,  108 => 43,  99 => 37,  95 => 36,  86 => 30,  82 => 29,  78 => 28,  69 => 22,  65 => 21,  56 => 15,  52 => 14,  43 => 8,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
