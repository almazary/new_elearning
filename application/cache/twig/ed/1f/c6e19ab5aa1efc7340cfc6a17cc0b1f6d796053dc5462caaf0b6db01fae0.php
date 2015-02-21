<?php

/* default/admin_akun/ch_profil.html */
class __TwigTemplate_ed1fc6e19ab5aa1efc7340cfc6a17cc0b1f6d796053dc5462caaf0b6db01fae0 extends Twig_Template
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
        echo form_open_multipart("admin/ch_profil", array("class" => "form-horizontal row-fluid"));
        echo "
    <div class=\"control-group\">
        <label class=\"control-label\">Username (Email) <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"username\" class=\"span5\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, set_value("username", $this->getAttribute((isset($context["login"]) ? $context["login"] : null), "username")), "html", null, true);
        echo "\">
            <br>";
        // line 7
        echo form_error("username");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"nama\" class=\"span5\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "nama")), "html", null, true);
        echo "\">
            <br>";
        // line 14
        echo form_error("nama");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Alamat <span class=\"text-error\">*</span></label>
        <div class=\"controls\">
            <input type=\"text\" name=\"alamat\" class=\"span9\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, set_value("alamat", $this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "alamat")), "html", null, true);
        echo "\">
            <br>";
        // line 21
        echo form_error("alamat");
        echo "
        </div>
    </div>
    <div class=\"control-group\">
        <label class=\"control-label\">Foto</label>
        <div class=\"controls\">
            <?php if (!is_null(\$pengajar['foto']) AND !empty(\$pengajar['foto'])): ?>
            ";
        // line 28
        if (($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "foto") != "")) {
            // line 29
            echo "                <img src=\"";
            echo twig_escape_filter($this->env, get_url_image($this->getAttribute((isset($context["pengajar"]) ? $context["pengajar"] : null), "foto"), "medium"), "html", null, true);
            echo "\"><br><br>
                Ganti Foto
            ";
        }
        // line 32
        echo "           <input type=\"file\" name=\"userfile\">
           <br>";
        // line 33
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
        // line 41
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_akun/ch_profil.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 41,  81 => 33,  78 => 32,  71 => 29,  69 => 28,  59 => 21,  55 => 20,  46 => 14,  42 => 13,  33 => 7,  29 => 6,  22 => 2,  19 => 1,);
    }
}
