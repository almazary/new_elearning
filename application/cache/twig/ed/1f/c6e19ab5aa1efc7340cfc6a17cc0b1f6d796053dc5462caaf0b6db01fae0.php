<?php

/* admin_akun/ch_profil.html */
class __TwigTemplate_ed1fc6e19ab5aa1efc7340cfc6a17cc0b1f6d796053dc5462caaf0b6db01fae0 extends Twig_Template
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
        echo get_flashdata("akun");
        echo "

        ";
        // line 11
        echo form_open_multipart("admin/ch_profil", array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Username (Email) <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"username\" class=\"span5\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, set_value("username", $this->getAttribute((isset($context["login"]) ? $context["login"] : null), "username")), "html", null, true);
        echo "\">
                    <br>";
        // line 16
        echo form_error("username");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama\" class=\"span5\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama")), "html", null, true);
        echo "\">
                    <br>";
        // line 23
        echo form_error("nama");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Alamat <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"alamat\" class=\"span9\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, set_value("alamat", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "alamat")), "html", null, true);
        echo "\">
                    <br>";
        // line 30
        echo form_error("alamat");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Foto</label>
                <div class=\"controls\">
                    <?php if (!is_null(\$pengajar['foto']) AND !empty(\$pengajar['foto'])): ?>
                    ";
        // line 37
        if (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "foto") != "")) {
            // line 38
            echo "                        <img src=\"";
            echo twig_escape_filter($this->env, get_url_image($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "foto"), "medium"), "html", null, true);
            echo "\"><br><br>
                        Ganti Foto
                    ";
        }
        // line 41
        echo "                   <input type=\"file\" name=\"userfile\">
                   <br>";
        // line 42
        echo (isset($context["error_upload"]) ? $context["error_upload"] : null);
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                </div>
            </div>
        ";
        // line 50
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_akun/ch_profil.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 50,  105 => 42,  102 => 41,  95 => 38,  93 => 37,  83 => 30,  79 => 29,  70 => 23,  66 => 22,  57 => 16,  53 => 15,  46 => 11,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
