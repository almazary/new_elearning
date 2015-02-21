<?php

/* default/admin_materi/add.html */
class __TwigTemplate_519a9bfdc1483b29ae39fd977dea82ea8e47080a47fd44c0cbb7e2ec801e5099 extends Twig_Template
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
        echo "<div class=\"bs-callout bs-callout-info\">
    <p><b>Matapelajaran :</b> ";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo " <b>Kelas : </b>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama"), "html", null, true);
        echo "</p>
</div>

<br>

<script type=\"text/javascript\">
    function redirect_to(form_type) {
        location.href = \"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["site_url"]) ? $context["site_url"] : null), "html", null, true);
        echo "/admin/materi/add/\" + form_type + \"/";
        echo twig_escape_filter($this->env, (isset($context["ref_param"]) ? $context["ref_param"] : null), "html", null, true);
        echo "\";
    }
</script>

";
        // line 13
        echo form_open_multipart(((("admin/materi/add/" . (isset($context["type"]) ? $context["type"] : null)) . "/") . (isset($context["ref_param"]) ? $context["ref_param"] : null)), array("class" => "form-horizontal row-fluid"));
        echo "
    <div class=\"control-group\">
        <label class=\"control-label\">Type <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <select name=\"type\" class=\"span2\">
                <option value=\"tertulis\" onclick=\"redirect_to('tertulis')\" ";
        // line 18
        echo twig_escape_filter($this->env, set_select("type", "tertulis", ((((isset($context["type"]) ? $context["type"] : null) == "tertulis")) ? (true) : (false))), "html", null, true);
        echo ">Tertulis</option>
                <option value=\"file\" onclick=\"redirect_to('file')\" ";
        // line 19
        echo twig_escape_filter($this->env, set_select("type", "file", ((((isset($context["type"]) ? $context["type"] : null) == "file")) ? (true) : (false))), "html", null, true);
        echo ">File</option>
            </select>
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Judul <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"judul\" class=\"span8\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, set_value("judul"), "html", null, true);
        echo "\">
            <br>";
        // line 27
        echo form_error("judul");
        echo "
        </div>
    </div>
    ";
        // line 30
        if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
            // line 31
            echo "    <div class=\"control-group\">
        <label class=\"control-label\">Konten <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <textarea name=\"konten\" id=\"konten\" style=\"height:500px;\">";
            // line 34
            echo twig_escape_filter($this->env, set_value("konten"), "html", null, true);
            echo "</textarea>
            ";
            // line 35
            echo form_error("konten");
            echo "
        </div>
    </div>
    ";
        } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
            // line 39
            echo "    <div class=\"control-group\">
        <label class=\"control-label\">File <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"file\" name=\"userfile\">
            <br>";
            // line 43
            echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
            echo "
        </div>
    </div>
    ";
        }
        // line 47
        echo "    <div class=\"control-group\">
        <div class=\"controls\">
            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
            <a href=\"";
        // line 50
        echo twig_escape_filter($this->env, site_url(("admin/materi/detail/" . (isset($context["ref_param"]) ? $context["ref_param"] : null))), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
        </div>
    </div>
";
        // line 53
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_materi/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 53,  111 => 50,  106 => 47,  99 => 43,  93 => 39,  86 => 35,  82 => 34,  77 => 31,  75 => 30,  69 => 27,  65 => 26,  55 => 19,  51 => 18,  43 => 13,  34 => 9,  22 => 2,  19 => 1,);
    }
}
