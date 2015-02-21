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

";
        // line 7
        echo form_open_multipart(((((("admin/materi/edit/" . (isset($context["type"]) ? $context["type"] : null)) . "/") . (isset($context["ref_param"]) ? $context["ref_param"] : null)) . "/") . $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "id")), array("class" => "form-horizontal row-fluid"));
        echo "
    <div class=\"control-group\">
        <label class=\"control-label\">Judul <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"judul\" class=\"span8\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, set_value("judul", $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul")), "html", null, true);
        echo "\">
            <br>";
        // line 12
        echo form_error("judul");
        echo "
        </div>
    </div>
    ";
        // line 15
        if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
            // line 16
            echo "    <div class=\"control-group\">
        <label class=\"control-label\">Konten <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <textarea name=\"konten\" id=\"konten\" style=\"height:500px;\">";
            // line 19
            echo set_value("konten", $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "konten"));
            echo "</textarea>
            ";
            // line 20
            echo form_error("konten");
            echo "
        </div>
    </div>
    ";
        } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
            // line 24
            echo "    <div class=\"control-group\">
        <label class=\"control-label\">Info File</label>
        <div class=\"controls\">
            <table class=\"table table-condensed table-striped\">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td><a href=\"";
            // line 31
            echo twig_escape_filter($this->env, base_url(("assets/files/" . $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "name"))), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "name"), "html", null, true);
            echo "</a></td>
                    </tr>
                    <tr>
                        <th>Server Path</th>
                        <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "server_path"), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td>";
            // line 39
            echo twig_escape_filter($this->env, byte_format($this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "size")), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>Modified</th>
                        <td>";
            // line 43
            echo twig_escape_filter($this->env, mdate("%d %F %Y %H:%i", $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "date")), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <th>Mime</th>
                        <td>";
            // line 47
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
            // line 57
            echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
            echo "
        </div>
    </div>
    ";
        }
        // line 61
        echo "    <div class=\"control-group\">
        <div class=\"controls\">
            <button type=\"submit\" class=\"btn btn-primary\">Update</button>
            <a href=\"";
        // line 64
        echo twig_escape_filter($this->env, site_url(("admin/materi/detail/" . (isset($context["ref_param"]) ? $context["ref_param"] : null))), "html", null, true);
        echo "\" class=\"btn\">Kembali</a>
        </div>
    </div>
";
        // line 67
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
        return array (  137 => 67,  131 => 64,  126 => 61,  119 => 57,  106 => 47,  99 => 43,  92 => 39,  85 => 35,  76 => 31,  67 => 24,  60 => 20,  56 => 19,  51 => 16,  49 => 15,  43 => 12,  39 => 11,  32 => 7,  22 => 2,  19 => 1,);
    }
}
