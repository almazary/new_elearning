<?php

/* admin_materi/add.html */
class __TwigTemplate_519a9bfdc1483b29ae39fd977dea82ea8e47080a47fd44c0cbb7e2ec801e5099 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
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
        echo get_flashdata("materi");
        echo "

        <div class=\"bs-callout bs-callout-info\">
            <p><b>Matapelajaran :</b> ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo " <b>Kelas : </b>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama"), "html", null, true);
        echo "</p>
        </div>

        <br>
        ";
        // line 16
        echo form_open_multipart(((("admin/materi/add/" . (isset($context["type"]) ? $context["type"] : null)) . "/") . (isset($context["ref_param"]) ? $context["ref_param"] : null)), array("class" => "form-horizontal row-fluid"));
        echo "
            <input type=\"hidden\" name=\"type\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
        echo "\">
            <div class=\"control-group\">
                <label class=\"control-label\">Judul <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"judul\" class=\"span12\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, set_value("judul"), "html", null, true);
        echo "\">
                    <br>";
        // line 22
        echo form_error("judul");
        echo "
                </div>
            </div>
            ";
        // line 25
        if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
            // line 26
            echo "            <div class=\"control-group\">
                <label class=\"control-label\">Konten <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <textarea name=\"konten\" id=\"konten\" style=\"height:500px;width:100%;\">";
            // line 29
            echo twig_escape_filter($this->env, set_value("konten"), "html", null, true);
            echo "</textarea>
                    ";
            // line 30
            echo form_error("konten");
            echo "
                </div>
            </div>
            ";
        } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
            // line 34
            echo "            <div class=\"control-group\">
                <label class=\"control-label\">File <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"file\" name=\"userfile\">
                    <br>";
            // line 38
            echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
            echo "
                </div>
            </div>
            ";
        }
        // line 42
        echo "            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                    <a href=\"";
        // line 45
        echo twig_escape_filter($this->env, site_url(("admin/materi/detail/" . (isset($context["ref_param"]) ? $context["ref_param"] : null))), "html", null, true);
        echo "\" class=\"btn\">Kembali</a>
                </div>
            </div>
        ";
        // line 48
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_materi/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 48,  113 => 45,  108 => 42,  101 => 38,  95 => 34,  88 => 30,  84 => 29,  79 => 26,  77 => 25,  71 => 22,  67 => 21,  60 => 17,  56 => 16,  47 => 12,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
