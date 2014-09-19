<?php

/* default/admin_pengajar/edit_profile.html */
class __TwigTemplate_b575872ad2c399d66d005db32f3dd1d35f9d102b555b1ca90373fcf5226ee94f extends Twig_Template
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
<strong>Edit Profil</strong>
";
        // line 3
        echo get_flashdata("edit");
        echo "

";
        // line 5
        echo form_open(((("admin/pengajar/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)));
        echo "
<input type=\"hidden\" name=\"pengajar_id\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null), "html", null, true);
        echo "\">
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"30%\">NIP</th>
            <td>
                <input type=\"text\" id=\"nip\" name=\"nip\" style=\"width:40%;\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, set_value("nip", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nip")), "html", null, true);
        echo "\">
                <br>";
        // line 13
        echo form_error("nip");
        echo "
            </td>
        <tr>
        <tr>
            <th>Nama <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"nama\" style=\"width:90%;\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama")), "html", null, true);
        echo "\">
                <br>";
        // line 20
        echo form_error("nama");
        echo "
            </td>
        <tr>
        <tr>
            <th>Jenis Kelamin <span class=\"text-error\">*</span></th>
            <td>
                <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Laki-laki\" ";
        // line 26
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "jenis_kelamin") == "Laki-laki")) ? (true) : (false))), "html", null, true);
        echo "> Laki-laki</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\" ";
        // line 27
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "jenis_kelamin") == "Perempuan")) ? (true) : (false))), "html", null, true);
        echo "> Perempuan</label>
                <br>";
        // line 28
        echo form_error("jenis_kelamin");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>
                <input type=\"text\" name=\"tempat_lahir\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, set_value("tempat_lahir", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tempat_lahir")), "html", null, true);
        echo "\">
                <br>";
        // line 35
        echo form_error("tempat_lahir");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                ";
        // line 41
        $context["tgl"] = (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"), "d")) : (""));
        // line 42
        echo "                ";
        $context["bln"] = (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"), "m")) : (""));
        // line 43
        echo "                ";
        $context["thn"] = (((!twig_test_empty($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "tgl_lahir"), "Y")) : (""));
        // line 44
        echo "                <select class=\"span2\" style=\"width: 20%;float:left;margin-right:5px;\" name=\"tgl_lahir\">
                    <option value=\"\">--Tgl--</option>
                    ";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 47
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
        // line 49
        echo "                </select>
                <select class=\"span2\" style=\"width: 35%;float:left;margin-right:5px;\" name=\"bln_lahir\">
                    <option value=\"\">--Bulan--</option>
                    ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 53
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
        // line 55
        echo "                </select>
                <input type=\"text\" name=\"thn_lahir\" style=\"width:15%;float:left;\" maxlength=\"4\" value=\"";
        // line 56
        echo twig_escape_filter($this->env, set_value("thn_lahir", (isset($context["thn"]) ? $context["thn"] : null)), "html", null, true);
        echo "\" placeholder=\"Tahun\">
                <br>";
        // line 57
        echo form_error("thn_lahir");
        echo "
            </td>
        <tr>
        <tr>
            <th>Alamat</th>
            <td>
                <textarea name=\"alamat\" style=\"width:90%;\">";
        // line 63
        echo twig_escape_filter($this->env, set_value("alamat", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "alamat")), "html", null, true);
        echo "</textarea>
                <br>";
        // line 64
        echo form_error("alamat");
        echo "
            </td>
        <tr>
        <tr>
            <th>Status <span class=\"text-error\">*</span></th>
            <td>
                ";
        // line 70
        if (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == 0)) {
            // line 71
            echo "                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"0\" ";
            echo twig_escape_filter($this->env, set_radio("status_id", "0", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == "0")) ? (true) : (false))), "html", null, true);
            echo "> Pending</label>
                ";
        }
        // line 73
        echo "                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"1\" ";
        echo twig_escape_filter($this->env, set_radio("status_id", "1", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == "1")) ? (true) : (false))), "html", null, true);
        echo "> Aktif</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"2\" ";
        // line 74
        echo twig_escape_filter($this->env, set_radio("status_id", "2", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "status_id") == "2")) ? (true) : (false))), "html", null, true);
        echo "> Blocking</label>
                <br>";
        // line 75
        echo form_error("status_id");
        echo "
            </td>
        <tr>
        <tr>
            <th>Opsi</th>
            <td>
                <label class=\"checkbox\"><input type=\"checkbox\" name=\"is_admin\" value=\"1\" ";
        // line 81
        echo twig_escape_filter($this->env, set_checkbox("is_admin", "1", ((($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "is_admin") == 1)) ? (true) : (false))), "html", null, true);
        echo "> Jadikan pengajar admin website</label>
                <br>";
        // line 82
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
        // line 92
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_pengajar/edit_profile.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 92,  207 => 82,  203 => 81,  194 => 75,  190 => 74,  185 => 73,  179 => 71,  177 => 70,  168 => 64,  164 => 63,  155 => 57,  151 => 56,  148 => 55,  135 => 53,  131 => 52,  126 => 49,  113 => 47,  109 => 46,  105 => 44,  102 => 43,  99 => 42,  97 => 41,  88 => 35,  84 => 34,  75 => 28,  71 => 27,  67 => 26,  58 => 20,  54 => 19,  45 => 13,  41 => 12,  32 => 6,  28 => 5,  23 => 3,  19 => 1,);
    }
}
