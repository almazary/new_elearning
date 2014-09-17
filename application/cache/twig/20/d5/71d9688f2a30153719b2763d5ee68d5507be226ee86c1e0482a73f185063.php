<?php

/* default/admin_siswa/add.html */
class __TwigTemplate_20d571d9688f2a30153719b2763d5ee68d5507be226ee86c1e0482a73f185063 extends Twig_Template
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
";
        // line 2
        echo form_open_multipart(("admin/siswa/add/" . (isset($context["status_id"]) ? $context["status_id"] : null)), array("class" => "form-horizontal row-fluid"));
        echo "
    <div class=\"control-group\">
        <label class=\"control-label\">NIS <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" id=\"nis\" name=\"nis\" class=\"span4\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, set_value("nis"), "html", null, true);
        echo "\">
            <br>";
        // line 7
        echo form_error("nis");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
        echo "\">
            <br>";
        // line 14
        echo form_error("nama");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Jenis Kelamin <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Laki-laki\" ";
        // line 20
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki"), "html", null, true);
        echo "> Laki-laki</label>
            <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\" ";
        // line 21
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan"), "html", null, true);
        echo "> Perempuan</label>
            <br>";
        // line 22
        echo form_error("jenis_kelamin");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Tahun Masuk <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"tahun_masuk\" class=\"span2\" maxlength=\"4\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, set_value("tahun_masuk"), "html", null, true);
        echo "\">
            <br>";
        // line 29
        echo form_error("tahun_masuk");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Kelas <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <select class=\"span3\" name=\"kelas_id\">
                ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 37
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
        // line 39
        echo "            </select>
            <br>";
        // line 40
        echo form_error("kelas_id");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Tempat Lahir</label>
        <div class=\"controls\">
            <input type=\"text\" name=\"tempat_lahir\" class=\"span5\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, set_value("tempat_lahir"), "html", null, true);
        echo "\">
            <br>";
        // line 47
        echo form_error("tempat_lahir");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Tanggal Lahir</label>
        <div class=\"controls\">
            <select class=\"span2\" style=\"width: 10%;\" name=\"tgl_lahir\">
                <option value=\"\">Tgl</option>
                ";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 56
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("tgl_lahir", (isset($context["i"]) ? $context["i"] : null)), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "            </select>
            <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                <option value=\"\">Bulan</option>
                ";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 62
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("bln_lahir", (isset($context["i"]) ? $context["i"] : null)), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, get_indo_bulan((isset($context["i"]) ? $context["i"] : null)), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "            </select>
            <input type=\"text\" name=\"thn_lahir\" class=\"span2\" maxlength=\"4\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, set_value("thn_lahir"), "html", null, true);
        echo "\" placeholder=\"Tahun\">
            <br>";
        // line 66
        echo form_error("thn_lahir");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Agama</label>
        <div class=\"controls\">
            <select name=\"agama\" class=\"span2\">
                <option value=\"\">--pilih--</option>
                <option value=\"ISLAM\" ";
        // line 74
        echo twig_escape_filter($this->env, set_select("agama", "ISLAM"), "html", null, true);
        echo ">ISLAM</option>
                <option value=\"KRISTEN\" ";
        // line 75
        echo twig_escape_filter($this->env, set_select("agama", "KRISTEN"), "html", null, true);
        echo ">KRISTEN</option>
                <option value=\"KATOLIK\" ";
        // line 76
        echo twig_escape_filter($this->env, set_select("agama", "KATOLIK"), "html", null, true);
        echo ">KATOLIK</option>
                <option value=\"HINDU\" ";
        // line 77
        echo twig_escape_filter($this->env, set_select("agama", "HINDU"), "html", null, true);
        echo ">HINDU</option>
                <option value=\"BUDHA\" ";
        // line 78
        echo twig_escape_filter($this->env, set_select("agama", "BUDHA"), "html", null, true);
        echo ">BUDHA</option>
            </select>
            <br>";
        // line 80
        echo form_error("agama");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Alamat</label>
        <div class=\"controls\">
            <textarea name=\"alamat\" class=\"span8\">";
        // line 86
        echo twig_escape_filter($this->env, set_value("alamat"), "html", null, true);
        echo "</textarea>
            <br>";
        // line 87
        echo form_error("alamat");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Foto</label>
        <div class=\"controls\">
            <input type=\"file\" name=\"userfile\">
            ";
        // line 94
        echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Username <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" id=\"username\" name=\"username\" class=\"span5\" value=\"";
        // line 100
        echo twig_escape_filter($this->env, set_value("username"), "html", null, true);
        echo "\" placeholder=\"example@example.sch.id\">

            <script type=\"text/javascript\">
            function username_default() {
                if (document.getElementById(\"default_username\").checked) {
                    var nis = \$(\"#nis\").val();
                    if (nis == '') {
                        nis = new Date().getTime();
                    }
                    \$(\"#username\").val(nis + '@example.sch.id');
                } else {
                    \$(\"#username\").val('');
                }
            }
            </script>

            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"default_username\" id=\"default_username\" onclick=\"username_default()\" value=\"1\" ";
        // line 116
        echo twig_escape_filter($this->env, set_checkbox("default_username", "1"), "html", null, true);
        echo "> Gunakan default username</label>
            <br>";
        // line 117
        echo form_error("username");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Password <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"password\" name=\"password\" class=\"span5\" value=\"";
        // line 123
        echo twig_escape_filter($this->env, set_value("password"), "html", null, true);
        echo "\">
            <br>";
        // line 124
        echo form_error("password");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Ulangi Password <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"password\" name=\"password2\" class=\"span5\" value=\"";
        // line 130
        echo twig_escape_filter($this->env, set_value("password2"), "html", null, true);
        echo "\">
            <br>";
        // line 131
        echo form_error("password2");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <div class=\"controls\">
            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
            <a href=\"";
        // line 137
        echo twig_escape_filter($this->env, site_url(("admin/siswa/list/" . (isset($context["status_id"]) ? $context["status_id"] : null))), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
        </div>
    </div>
";
        // line 140
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_siswa/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  304 => 140,  298 => 137,  289 => 131,  285 => 130,  276 => 124,  272 => 123,  263 => 117,  259 => 116,  240 => 100,  231 => 94,  221 => 87,  217 => 86,  208 => 80,  203 => 78,  199 => 77,  195 => 76,  191 => 75,  187 => 74,  176 => 66,  172 => 65,  169 => 64,  156 => 62,  152 => 61,  147 => 58,  134 => 56,  130 => 55,  119 => 47,  115 => 46,  106 => 40,  103 => 39,  90 => 37,  86 => 36,  76 => 29,  72 => 28,  63 => 22,  59 => 21,  55 => 20,  46 => 14,  42 => 13,  33 => 7,  29 => 6,  22 => 2,  19 => 1,);
    }
}
