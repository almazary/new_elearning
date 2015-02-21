<?php

/* default/admin_siswa/edit_profile.html */
class __TwigTemplate_989732219dfed1fd50555f6036e4f9e600c420546d0786c0f29cd094d78a5728 extends Twig_Template
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
        echo form_open(((("admin/siswa/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["siswa_id"]) ? $context["siswa_id"] : null)));
        echo "
<input type=\"hidden\" name=\"siswa_id\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["siswa_id"]) ? $context["siswa_id"] : null), "html", null, true);
        echo "\">
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"30%\">NIS <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" id=\"nis\" name=\"nis\" style=\"width:40%;\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, set_value("nis", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nis")), "html", null, true);
        echo "\">
                <br>";
        // line 13
        echo form_error("nis");
        echo "
            </td>
        <tr>
        <tr>
            <th>Nama <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"nama\" style=\"width:90%;\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nama")), "html", null, true);
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
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin") == "Laki-laki")) ? (true) : (false))), "html", null, true);
        echo "> Laki-laki</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\" ";
        // line 27
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin") == "Perempuan")) ? (true) : (false))), "html", null, true);
        echo "> Perempuan</label>
                <br>";
        // line 28
        echo form_error("jenis_kelamin");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tahun Masuk <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"tahun_masuk\" maxlength=\"4\" style=\"width:15%;\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, set_value("tahun_masuk", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tahun_masuk")), "html", null, true);
        echo "\">
                <br>";
        // line 35
        echo form_error("tahun_masuk");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>
                <input type=\"text\" name=\"tempat_lahir\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, set_value("tempat_lahir", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tempat_lahir")), "html", null, true);
        echo "\">
                <br>";
        // line 42
        echo form_error("tempat_lahir");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                ";
        // line 48
        $context["tgl"] = (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"), "d")) : (""));
        // line 49
        echo "                ";
        $context["bln"] = (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"), "m")) : (""));
        // line 50
        echo "                ";
        $context["thn"] = (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"), "Y")) : (""));
        // line 51
        echo "                <select class=\"span2\" style=\"width: 20%;float:left;margin-right:5px;\" name=\"tgl_lahir\">
                    <option value=\"\">--Tgl--</option>
                    ";
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 54
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
        // line 56
        echo "                </select>
                <select class=\"span2\" style=\"width: 35%;float:left;margin-right:5px;\" name=\"bln_lahir\">
                    <option value=\"\">--Bulan--</option>
                    ";
        // line 59
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 60
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
        // line 62
        echo "                </select>
                <input type=\"text\" name=\"thn_lahir\" style=\"width:15%;float:left;\" maxlength=\"4\" value=\"";
        // line 63
        echo twig_escape_filter($this->env, set_value("thn_lahir", (isset($context["thn"]) ? $context["thn"] : null)), "html", null, true);
        echo "\" placeholder=\"Tahun\">
                <br>";
        // line 64
        echo form_error("thn_lahir");
        echo "
            </td>
        <tr>
        <tr>
            <th>Agama</th>
            <td>
                <select name=\"agama\" style=\"width:30%;\">
                    <option value=\"\">--pilih--</option>
                    <option value=\"ISLAM\" ";
        // line 72
        echo twig_escape_filter($this->env, set_select("agama", "ISLAM", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "ISLAM")) ? (true) : (false))), "html", null, true);
        echo ">ISLAM</option>
                    <option value=\"KRISTEN\" ";
        // line 73
        echo twig_escape_filter($this->env, set_select("agama", "KRISTEN", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "KRISTEN")) ? (true) : (false))), "html", null, true);
        echo ">KRISTEN</option>
                    <option value=\"KATOLIK\" ";
        // line 74
        echo twig_escape_filter($this->env, set_select("agama", "KATOLIK", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "KATOLIK")) ? (true) : (false))), "html", null, true);
        echo ">KATOLIK</option>
                    <option value=\"HINDU\" ";
        // line 75
        echo twig_escape_filter($this->env, set_select("agama", "HINDU", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "HINDU")) ? (true) : (false))), "html", null, true);
        echo ">HINDU</option>
                    <option value=\"BUDHA\" ";
        // line 76
        echo twig_escape_filter($this->env, set_select("agama", "BUDHA", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "BUDHA")) ? (true) : (false))), "html", null, true);
        echo ">BUDHA</option>
                </select>
                <br>";
        // line 78
        echo form_error("agama");
        echo "
            </td>
        <tr>
        <tr>
            <th>Alamat</th>
            <td>
                <textarea name=\"alamat\" style=\"width:90%;\">";
        // line 84
        echo twig_escape_filter($this->env, set_value("alamat", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "alamat")), "html", null, true);
        echo "</textarea>
                <br>";
        // line 85
        echo form_error("alamat");
        echo "
            </td>
        <tr>
        ";
        // line 88
        if (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") != 3)) {
            // line 89
            echo "        <tr>
            <th>Status <span class=\"text-error\">*</span></th>
            <td>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"0\" ";
            // line 92
            echo twig_escape_filter($this->env, set_radio("status_id", "0", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "0")) ? (true) : (false))), "html", null, true);
            echo "> Pending</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"1\" ";
            // line 93
            echo twig_escape_filter($this->env, set_radio("status_id", "1", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "1")) ? (true) : (false))), "html", null, true);
            echo "> Aktif</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"2\" ";
            // line 94
            echo twig_escape_filter($this->env, set_radio("status_id", "2", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "2")) ? (true) : (false))), "html", null, true);
            echo "> Blocking</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"3\" ";
            // line 95
            echo twig_escape_filter($this->env, set_radio("status_id", "3", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "3")) ? (true) : (false))), "html", null, true);
            echo "> Alumni</label>
                <br>";
            // line 96
            echo form_error("status_id");
            echo "
            </td>
        <tr>
        ";
        } else {
            // line 100
            echo "            <input type=\"hidden\" name=\"status_id\" value=\"3\">
        ";
        }
        // line 102
        echo "        <tr>
            <td colspan=\"2\">
                <button type=\"submit\" class=\"btn btn-primary\">Update</button>
            </td>
        </tr>
    </tbody>
</table>
";
        // line 109
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_siswa/edit_profile.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  262 => 109,  253 => 102,  249 => 100,  242 => 96,  238 => 95,  234 => 94,  230 => 93,  226 => 92,  221 => 89,  219 => 88,  213 => 85,  209 => 84,  200 => 78,  195 => 76,  191 => 75,  187 => 74,  183 => 73,  179 => 72,  168 => 64,  164 => 63,  161 => 62,  148 => 60,  144 => 59,  139 => 56,  126 => 54,  122 => 53,  118 => 51,  115 => 50,  112 => 49,  110 => 48,  101 => 42,  97 => 41,  88 => 35,  84 => 34,  75 => 28,  71 => 27,  67 => 26,  58 => 20,  54 => 19,  45 => 13,  41 => 12,  32 => 6,  28 => 5,  23 => 3,  19 => 1,);
    }
}
