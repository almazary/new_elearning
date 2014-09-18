<?php

/* default/admin_pengajar/add.html */
class __TwigTemplate_59199a44acc5eead33ff6b428df893cb7125a1377363d2658f5a8de690e8261e extends Twig_Template
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
        echo form_open_multipart(("admin/pengajar/add/" . (isset($context["status_id"]) ? $context["status_id"] : null)), array("class" => "form-horizontal row-fluid"));
        echo "
    <div class=\"control-group\">
        <label class=\"control-label\">NIP</label>
        <div class=\"controls\">
            <input type=\"text\" id=\"nip\" name=\"nip\" class=\"span4\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, set_value("nip"), "html", null, true);
        echo "\">
            <br>";
        // line 7
        echo form_error("nip");
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
        <label class=\"control-label\">Tempat Lahir</label>
        <div class=\"controls\">
            <input type=\"text\" name=\"tempat_lahir\" class=\"span5\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, set_value("tempat_lahir"), "html", null, true);
        echo "\">
            <br>";
        // line 29
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
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 38
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
        // line 40
        echo "            </select>
            <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                <option value=\"\">Bulan</option>
                ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 44
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
        // line 46
        echo "            </select>
            <input type=\"text\" name=\"thn_lahir\" class=\"span2\" maxlength=\"4\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, set_value("thn_lahir"), "html", null, true);
        echo "\" placeholder=\"Tahun\">
            <br>";
        // line 48
        echo form_error("thn_lahir");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Alamat</label>
        <div class=\"controls\">
            <textarea name=\"alamat\" class=\"span8\">";
        // line 54
        echo twig_escape_filter($this->env, set_value("alamat"), "html", null, true);
        echo "</textarea>
            <br>";
        // line 55
        echo form_error("alamat");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Foto</label>
        <div class=\"controls\">
            <input type=\"file\" name=\"userfile\">
            ";
        // line 62
        echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Username <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" id=\"username\" name=\"username\" class=\"span5\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, set_value("username"), "html", null, true);
        echo "\" placeholder=\"example@example.sch.id\">

            <script type=\"text/javascript\">
            function username_default() {
                if (document.getElementById(\"default_username\").checked) {
                    var nis = \$(\"#nip\").val();
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
        // line 84
        echo twig_escape_filter($this->env, set_checkbox("default_username", "1"), "html", null, true);
        echo "> Gunakan default username</label>
            <br>";
        // line 85
        echo form_error("username");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Password <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"password\" name=\"password\" class=\"span5\" value=\"";
        // line 91
        echo twig_escape_filter($this->env, set_value("password"), "html", null, true);
        echo "\">
            <br>";
        // line 92
        echo form_error("password");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Ulangi Password <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"password\" name=\"password2\" class=\"span5\" value=\"";
        // line 98
        echo twig_escape_filter($this->env, set_value("password2"), "html", null, true);
        echo "\">
            <br>";
        // line 99
        echo form_error("password2");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Opsi</label>
        <div class=\"controls\">
            <label class=\"checkbox\"><input type=\"checkbox\" name=\"is_admin\" value=\"1\" ";
        // line 105
        echo twig_escape_filter($this->env, set_checkbox("is_admin", "1"), "html", null, true);
        echo "> Jadikan pengajar admin website</label>
            <br>";
        // line 106
        echo form_error("is_admin");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <div class=\"controls\">
            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
            <a href=\"";
        // line 112
        echo twig_escape_filter($this->env, site_url(("admin/pengajar/list/" . (isset($context["status_id"]) ? $context["status_id"] : null))), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
        </div>
    </div>
";
        // line 115
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_pengajar/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 115,  236 => 112,  227 => 106,  223 => 105,  214 => 99,  210 => 98,  201 => 92,  197 => 91,  188 => 85,  184 => 84,  165 => 68,  156 => 62,  146 => 55,  142 => 54,  133 => 48,  129 => 47,  126 => 46,  113 => 44,  109 => 43,  104 => 40,  91 => 38,  87 => 37,  76 => 29,  72 => 28,  63 => 22,  59 => 21,  55 => 20,  46 => 14,  42 => 13,  33 => 7,  29 => 6,  22 => 2,  19 => 1,);
    }
}
