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
        <tr>
            <th width=\"30%\">NIS <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" id=\"nis\" name=\"nis\" style=\"width:40%;\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, set_value("nis", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nis")), "html", null, true);
        echo "\">
                <br>";
        // line 15
        echo form_error("nis");
        echo "
            </td>
        <tr>
        <tr>
            <th>Nama <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"nama\" style=\"width:90%;\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "nama")), "html", null, true);
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
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin") == "Laki-laki")) ? (true) : (false))), "html", null, true);
        echo "> Laki-laki</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\" ";
        // line 29
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin") == "Perempuan")) ? (true) : (false))), "html", null, true);
        echo "> Perempuan</label>
                <br>";
        // line 30
        echo form_error("jenis_kelamin");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tahun Masuk <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"text\" name=\"tahun_masuk\" maxlength=\"4\" style=\"width:15%;\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, set_value("tahun_masuk", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tahun_masuk")), "html", null, true);
        echo "\">
                <br>";
        // line 37
        echo form_error("tahun_masuk");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>
                <input type=\"text\" name=\"tempat_lahir\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, set_value("tempat_lahir", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tempat_lahir")), "html", null, true);
        echo "\">
                <br>";
        // line 44
        echo form_error("tempat_lahir");
        echo "
            </td>
        <tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                ";
        // line 50
        $context["tgl"] = (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"), "d")) : (""));
        // line 51
        echo "                ";
        $context["bln"] = (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"), "m")) : (""));
        // line 52
        echo "                ";
        $context["thn"] = (((!twig_test_empty($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir")))) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "tgl_lahir"), "Y")) : (""));
        // line 53
        echo "                <select class=\"span2\" style=\"width: 20%;float:left;margin-right:5px;\" name=\"tgl_lahir\">
                    <option value=\"\">--Tgl--</option>
                    ";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 56
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
        // line 58
        echo "                </select>
                <select class=\"span2\" style=\"width: 35%;float:left;margin-right:5px;\" name=\"bln_lahir\">
                    <option value=\"\">--Bulan--</option>
                    ";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 62
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
        // line 64
        echo "                </select>
                <input type=\"text\" name=\"thn_lahir\" style=\"width:15%;float:left;\" maxlength=\"4\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, set_value("thn_lahir", (isset($context["thn"]) ? $context["thn"] : null)), "html", null, true);
        echo "\" placeholder=\"Tahun\">
                <br>";
        // line 66
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
        // line 74
        echo twig_escape_filter($this->env, set_select("agama", "ISLAM", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "ISLAM")) ? (true) : (false))), "html", null, true);
        echo ">ISLAM</option>
                    <option value=\"KRISTEN\" ";
        // line 75
        echo twig_escape_filter($this->env, set_select("agama", "KRISTEN", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "KRISTEN")) ? (true) : (false))), "html", null, true);
        echo ">KRISTEN</option>
                    <option value=\"KATOLIK\" ";
        // line 76
        echo twig_escape_filter($this->env, set_select("agama", "KATOLIK", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "KATOLIK")) ? (true) : (false))), "html", null, true);
        echo ">KATOLIK</option>
                    <option value=\"HINDU\" ";
        // line 77
        echo twig_escape_filter($this->env, set_select("agama", "HINDU", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "HINDU")) ? (true) : (false))), "html", null, true);
        echo ">HINDU</option>
                    <option value=\"BUDHA\" ";
        // line 78
        echo twig_escape_filter($this->env, set_select("agama", "BUDHA", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "agama") == "BUDHA")) ? (true) : (false))), "html", null, true);
        echo ">BUDHA</option>
                </select>
                <br>";
        // line 80
        echo form_error("agama");
        echo "
            </td>
        <tr>
        <tr>
            <th>Alamat</th>
            <td>
                <input type=\"text\" name=\"alamat\" style=\"width:90%;\" value=\"";
        // line 86
        echo twig_escape_filter($this->env, set_value("alamat", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "alamat")), "html", null, true);
        echo "\">
                <br>";
        // line 87
        echo form_error("alamat");
        echo "
            </td>
        <tr>
        ";
        // line 90
        if (($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") != 3)) {
            // line 91
            echo "        <tr>
            <th>Status <span class=\"text-error\">*</span></th>
            <td>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"0\" ";
            // line 94
            echo twig_escape_filter($this->env, set_radio("status_id", "0", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "0")) ? (true) : (false))), "html", null, true);
            echo "> Pending</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"1\" ";
            // line 95
            echo twig_escape_filter($this->env, set_radio("status_id", "1", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "1")) ? (true) : (false))), "html", null, true);
            echo "> Aktif</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"2\" ";
            // line 96
            echo twig_escape_filter($this->env, set_radio("status_id", "2", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "2")) ? (true) : (false))), "html", null, true);
            echo "> Blocking</label>
                <label class=\"radio inline\"><input type=\"radio\" name=\"status_id\" value=\"3\" ";
            // line 97
            echo twig_escape_filter($this->env, set_radio("status_id", "3", ((($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "status_id") == "3")) ? (true) : (false))), "html", null, true);
            echo "> Alumni</label>
                <br>";
            // line 98
            echo form_error("status_id");
            echo "
            </td>
        <tr>
        ";
        } else {
            // line 102
            echo "            <input type=\"hidden\" name=\"status_id\" value=\"3\">
        ";
        }
        // line 104
        echo "        <tr>
            <td colspan=\"2\">
                <button type=\"submit\" class=\"btn btn-primary\">Update</button>
            </td>
        </tr>
    </tbody>
</table>
";
        // line 111
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
        return array (  273 => 111,  264 => 104,  260 => 102,  253 => 98,  249 => 97,  245 => 96,  241 => 95,  237 => 94,  232 => 91,  230 => 90,  224 => 87,  220 => 86,  211 => 80,  206 => 78,  202 => 77,  198 => 76,  194 => 75,  190 => 74,  179 => 66,  175 => 65,  172 => 64,  159 => 62,  155 => 61,  150 => 58,  137 => 56,  133 => 55,  129 => 53,  126 => 52,  123 => 51,  121 => 50,  112 => 44,  108 => 43,  99 => 37,  95 => 36,  86 => 30,  82 => 29,  78 => 28,  69 => 22,  65 => 21,  56 => 15,  52 => 14,  43 => 8,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
