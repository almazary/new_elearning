<?php

/* edit-siswa-profile.html */
class __TwigTemplate_4aade59ffe57decd71c29e06ca6de4479ab93890eb0ba70229a8d23d8d945e6c extends Twig_Template
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
        echo form_open(((("siswa/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["siswa_id"]) ? $context["siswa_id"] : null)));
        echo "
<input type=\"hidden\" name=\"siswa_id\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["siswa_id"]) ? $context["siswa_id"] : null), "html", null, true);
        echo "\">
<table class=\"table table-striped\">
    <tbody>
        ";
        // line 11
        if (is_admin()) {
            // line 12
            echo "        <tr>
            <th width=\"30%\">NIS <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" id=\"nis\" name=\"nis\" style=\"width:40%;\" value=\"";
            // line 15
            echo twig_escape_filter($this->env, set_value("nis", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nis")), "html", null, true);
            echo "\">
                <br>";
            // line 16
            echo form_error("nis");
            echo "
            </td>
        <tr>
        ";
        } else {
            // line 20
            echo "        <input type=\"hidden\" name=\"nis\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nis"), "html", null, true);
            echo "\">
        ";
        }
        // line 22
        echo "        <tr>
            <th>Nama <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"nama\" style=\"width:90%;\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nama")), "html", null, true);
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
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin") == "Laki-laki")) ? (true) : (false))), "html", null, true);
        echo "> Laki-laki</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\" ";
        // line 33
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin") == "Perempuan")) ? (true) : (false))), "html", null, true);
        echo "> Perempuan</label>
                <br>";
        // line 34
        echo form_error("jenis_kelamin");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tahun Masuk <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"tahun_masuk\" maxlength=\"4\" style=\"width:15%;\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, set_value("tahun_masuk", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tahun_masuk")), "html", null, true);
        echo "\">
                <br>";
        // line 41
        echo form_error("tahun_masuk");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>
                <input type=\"text\" name=\"tempat_lahir\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, set_value("tempat_lahir", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tempat_lahir")), "html", null, true);
        echo "\">
                <br>";
        // line 48
        echo form_error("tempat_lahir");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                ";
        // line 54
        $context["tgl"] = (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"), "d")) : (""));
        // line 55
        echo "                ";
        $context["bln"] = (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"), "m")) : (""));
        // line 56
        echo "                ";
        $context["thn"] = (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"), "Y")) : (""));
        // line 57
        echo "                <select class=\"span2\" style=\"width: 20%;float:left;margin-right:5px;\" name=\"tgl_lahir\">
                    <option value=\"\">--Tgl--</option>
                    ";
        // line 59
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 60
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
        // line 62
        echo "                </select>
                <select class=\"span2\" style=\"width: 35%;float:left;margin-right:5px;\" name=\"bln_lahir\">
                    <option value=\"\">--Bulan--</option>
                    ";
        // line 65
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 66
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
        // line 68
        echo "                </select>
                <input type=\"text\" name=\"thn_lahir\" style=\"width:15%;float:left;\" maxlength=\"4\" value=\"";
        // line 69
        echo twig_escape_filter($this->env, set_value("thn_lahir", (isset($context["thn"]) ? $context["thn"] : null)), "html", null, true);
        echo "\" placeholder=\"Tahun\">
                <br>";
        // line 70
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
        // line 78
        echo twig_escape_filter($this->env, set_select("agama", "ISLAM", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "ISLAM")) ? (true) : (false))), "html", null, true);
        echo ">ISLAM</option>
                    <option value=\"KRISTEN\" ";
        // line 79
        echo twig_escape_filter($this->env, set_select("agama", "KRISTEN", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "KRISTEN")) ? (true) : (false))), "html", null, true);
        echo ">KRISTEN</option>
                    <option value=\"KATOLIK\" ";
        // line 80
        echo twig_escape_filter($this->env, set_select("agama", "KATOLIK", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "KATOLIK")) ? (true) : (false))), "html", null, true);
        echo ">KATOLIK</option>
                    <option value=\"HINDU\" ";
        // line 81
        echo twig_escape_filter($this->env, set_select("agama", "HINDU", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "HINDU")) ? (true) : (false))), "html", null, true);
        echo ">HINDU</option>
                    <option value=\"BUDHA\" ";
        // line 82
        echo twig_escape_filter($this->env, set_select("agama", "BUDHA", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "BUDHA")) ? (true) : (false))), "html", null, true);
        echo ">BUDHA</option>
                </select>
                <br>";
        // line 84
        echo form_error("agama");
        echo "
            </td>
        <tr>
        <tr>
            <th>Alamat</th>
            <td>
                <input type=\"text\" name=\"alamat\" style=\"width:90%;\" value=\"";
        // line 90
        echo twig_escape_filter($this->env, set_value("alamat", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "alamat")), "html", null, true);
        echo "\">
                <br>";
        // line 91
        echo form_error("alamat");
        echo "
            </td>
        <tr>
        ";
        // line 94
        if ((is_admin() && ($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") != 3))) {
            // line 95
            echo "        <tr>
            <th>Status <span class=\"text-error\">*</span></th>
            <td>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"0\" ";
            // line 98
            echo twig_escape_filter($this->env, set_radio("status_id", "0", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "0")) ? (true) : (false))), "html", null, true);
            echo "> Pending</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"1\" ";
            // line 99
            echo twig_escape_filter($this->env, set_radio("status_id", "1", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "1")) ? (true) : (false))), "html", null, true);
            echo "> Aktif</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"2\" ";
            // line 100
            echo twig_escape_filter($this->env, set_radio("status_id", "2", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "2")) ? (true) : (false))), "html", null, true);
            echo "> Blocking</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"3\" ";
            // line 101
            echo twig_escape_filter($this->env, set_radio("status_id", "3", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "3")) ? (true) : (false))), "html", null, true);
            echo "> Alumni</label>
                <br>";
            // line 102
            echo form_error("status_id");
            echo "
            </td>
        <tr>
        ";
        } else {
            // line 106
            echo "            <input type=\"hidden\" name=\"status_id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id"), "html", null, true);
            echo "\">
        ";
        }
        // line 108
        echo "        <tr>
            <td colspan=\"2\">
                <button type=\"submit\" class=\"btn btn-primary\">Update</button>
            </td>
        </tr>
    </tbody>
</table>
";
        // line 115
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "edit-siswa-profile.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  288 => 115,  279 => 108,  273 => 106,  266 => 102,  262 => 101,  258 => 100,  254 => 99,  250 => 98,  245 => 95,  243 => 94,  237 => 91,  233 => 90,  224 => 84,  219 => 82,  215 => 81,  211 => 80,  207 => 79,  203 => 78,  192 => 70,  188 => 69,  185 => 68,  172 => 66,  168 => 65,  163 => 62,  150 => 60,  146 => 59,  142 => 57,  139 => 56,  136 => 55,  134 => 54,  125 => 48,  121 => 47,  112 => 41,  108 => 40,  99 => 34,  95 => 33,  91 => 32,  82 => 26,  78 => 25,  73 => 22,  67 => 20,  60 => 16,  56 => 15,  51 => 12,  49 => 11,  43 => 8,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
