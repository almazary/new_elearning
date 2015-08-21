<?php

/* admin_pengajar/add.html */
class __TwigTemplate_59199a44acc5eead33ff6b428df893cb7125a1377363d2658f5a8de690e8261e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-private.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 6
        echo (isset($context["module_title"]) ? $context["module_title"] : null);
        echo "</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 9
        echo get_flashdata("pengajar");
        echo "

        ";
        // line 11
        echo form_open_multipart(("admin/pengajar/add/" . (isset($context["status_id"]) ? $context["status_id"] : null)), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">NIP</label>
                <div class=\"controls\">
                    <input type=\"text\" id=\"nip\" name=\"nip\" class=\"span4\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, set_value("nip"), "html", null, true);
        echo "\">
                    <br>";
        // line 16
        echo form_error("nip");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
        echo "\">
                    <br>";
        // line 23
        echo form_error("nama");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Jenis Kelamin <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Laki-laki\" ";
        // line 29
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki"), "html", null, true);
        echo "> Laki-laki</label>
                    <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\" ";
        // line 30
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan"), "html", null, true);
        echo "> Perempuan</label>
                    <br>";
        // line 31
        echo form_error("jenis_kelamin");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Tempat Lahir</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"tempat_lahir\" class=\"span5\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, set_value("tempat_lahir"), "html", null, true);
        echo "\">
                    <br>";
        // line 38
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
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 47
            echo "                            <option value=\"";
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
        // line 49
        echo "                    </select>
                    <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                        <option value=\"\">Bulan</option>
                        ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 53
            echo "                            <option value=\"";
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
        // line 55
        echo "                    </select>
                    <input type=\"text\" name=\"thn_lahir\" class=\"span2\" maxlength=\"4\" value=\"";
        // line 56
        echo twig_escape_filter($this->env, set_value("thn_lahir"), "html", null, true);
        echo "\" placeholder=\"Tahun\">
                    <br>";
        // line 57
        echo form_error("thn_lahir");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Alamat</label>
                <div class=\"controls\">
                    <textarea name=\"alamat\" class=\"span8\">";
        // line 63
        echo twig_escape_filter($this->env, set_value("alamat"), "html", null, true);
        echo "</textarea>
                    <br>";
        // line 64
        echo form_error("alamat");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Foto</label>
                <div class=\"controls\">
                    <input type=\"file\" name=\"userfile\">
                    ";
        // line 71
        echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Username <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" id=\"username\" name=\"username\" class=\"span5\" value=\"";
        // line 77
        echo twig_escape_filter($this->env, set_value("username"), "html", null, true);
        echo "\" placeholder=\"example@example.sch.id\">

                    <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"default_username\" id=\"default_username\" onclick=\"username_default()\" value=\"1\" ";
        // line 79
        echo twig_escape_filter($this->env, set_checkbox("default_username", "1"), "html", null, true);
        echo "> Gunakan default username</label>
                    <br>";
        // line 80
        echo form_error("username");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Password <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"password\" name=\"password\" class=\"span5\" value=\"";
        // line 86
        echo twig_escape_filter($this->env, set_value("password"), "html", null, true);
        echo "\">
                    <br>";
        // line 87
        echo form_error("password");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Ulangi Password <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"password\" name=\"password2\" class=\"span5\" value=\"";
        // line 93
        echo twig_escape_filter($this->env, set_value("password2"), "html", null, true);
        echo "\">
                    <br>";
        // line 94
        echo form_error("password2");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Opsi</label>
                <div class=\"controls\">
                    <label class=\"checkbox\"><input type=\"checkbox\" name=\"is_admin\" value=\"1\" ";
        // line 100
        echo twig_escape_filter($this->env, set_checkbox("is_admin", "1"), "html", null, true);
        echo "> Jadikan pengajar admin website</label>
                    <br>";
        // line 101
        echo form_error("is_admin");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                    <a href=\"";
        // line 107
        echo twig_escape_filter($this->env, site_url(("admin/pengajar/list/" . (isset($context["status_id"]) ? $context["status_id"] : null))), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
                </div>
            </div>
        ";
        // line 110
        echo form_close();
        echo "

    </div>
</div>
";
    }

    // line 116
    public function block_js($context, array $blocks = array())
    {
        // line 117
        $this->displayParentBlock("js", $context, $blocks);
        echo "
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
";
    }

    public function getTemplateName()
    {
        return "admin_pengajar/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  265 => 117,  262 => 116,  253 => 110,  247 => 107,  238 => 101,  234 => 100,  225 => 94,  221 => 93,  212 => 87,  208 => 86,  199 => 80,  195 => 79,  190 => 77,  181 => 71,  171 => 64,  167 => 63,  158 => 57,  154 => 56,  151 => 55,  138 => 53,  134 => 52,  129 => 49,  116 => 47,  112 => 46,  101 => 38,  97 => 37,  88 => 31,  84 => 30,  80 => 29,  71 => 23,  67 => 22,  58 => 16,  54 => 15,  47 => 11,  42 => 9,  36 => 6,  32 => 4,  29 => 3,);
    }
}
