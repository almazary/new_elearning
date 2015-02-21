<?php

/* default/admin_materi/edit.html */
class __TwigTemplate_324b1b18401a044df1ab9419d6d343951abecd18dbe0e533d9d2926ae58c71be extends Twig_Template
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
        echo "/admin/materi/edit/\" + form_type + \"/";
        echo twig_escape_filter($this->env, (isset($context["ref_param"]) ? $context["ref_param"] : null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "id"), "html", null, true);
        echo "\";
    }
</script>

";
        // line 13
        echo form_open_multipart((((("admin/materi/edit/" . (isset($context["type"]) ? $context["type"] : null)) . "/") . (isset($context["ref_param"]) ? $context["ref_param"] : null)) . $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "id")), array("class" => "form-horizontal row-fluid"));
        echo "
    <div class=\"control-group\">
        <label class=\"control-label\">Judul <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"judul\" class=\"span8\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, set_value("judul", $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul")), "html", null, true);
        echo "\">
            <br>";
        // line 18
        echo form_error("judul");
        echo "
        </div>
    </div>
    ";
        // line 21
        if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
            // line 22
            echo "    <div class=\"control-group\">
        <label class=\"control-label\">Konten <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <textarea name=\"konten\" id=\"konten\" style=\"height:500px;\">";
            // line 25
            echo set_value("konten", $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "konten"));
            echo "</textarea>
            ";
            // line 26
            echo form_error("konten");
            echo "
        </div>
    </div>
    ";
        } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
            // line 30
            echo "    <div class=\"control-group\">
        <label class=\"control-label\">Info File</label>
        <div class=\"controls\">
            <table class=\"table table-condensed table-striped\">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td><a href=\"";
            // line 37
            echo twig_escape_filter($this->env, base_url(("assets/files/" . $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "name"))), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "name"), "html", null, true);
            echo "</a></td>
                    </tr>
                    <tr>
                        <th>Server Path</th>
                        <td>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "server_path"), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td>";
            // line 45
            echo twig_escape_filter($this->env, byte_format($this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "size")), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>Modified</th>
                        <td>";
            // line 49
            echo twig_escape_filter($this->env, mdate("%d %F %Y %H:%i", $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "date")), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>Mime</th>
                        <td>";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "mime"), "html", null, true);
            echo "</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Ganti File</label>
        <div class=\"controls\">
            <input type=\"file\" name=\"userfile\">
            <br>";
            // line 63
            echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
            echo "
        </div>
    </div>
    ";
        }
        // line 67
        echo "    <div class=\"control-group\">
        <div class=\"controls\">
            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
            <a href=\"";
        // line 70
        echo twig_escape_filter($this->env, site_url(("admin/materi/detail/" . (isset($context["ref_param"]) ? $context["ref_param"] : null))), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
        </div>
    </div>
";
        // line 73
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_materi/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 73,  144 => 70,  139 => 67,  132 => 63,  119 => 53,  112 => 49,  105 => 45,  98 => 41,  89 => 37,  80 => 30,  73 => 26,  69 => 25,  64 => 22,  62 => 21,  56 => 18,  52 => 17,  45 => 13,  34 => 9,  22 => 2,  19 => 1,);
    }
}
