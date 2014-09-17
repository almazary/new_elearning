<?php

/* default/admin_siswa/edit_picture.html */
class __TwigTemplate_4381b152230ff7410259c1004a6d30103d2918d87a6ef4a79ce1068876671027 extends Twig_Template
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
<strong>Edit Foto <span class=\"text-error\">*</span></strong>
";
        // line 3
        echo get_flashdata("edit");
        echo "

";
        // line 5
        echo form_open_multipart(((("admin/siswa/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["siswa_id"]) ? $context["siswa_id"] : null)));
        echo "
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <td>
                <img class=\"img-polaroid\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "foto"), "medium", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin")), "html", null, true);
        echo "\">
            </td>
            <td>
                <input type=\"file\" name=\"userfile\" class=\"btn btn-small\" style=\"max-width:190px;\">
                ";
        // line 14
        echo twig_escape_filter($this->env, (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? (("<br><br>" . (isset($context["error_upload"]) ? $context["error_upload"] : null))) : ("")), "html", null, true);
        echo "
            </td>
        <tr>
        <tr>
            <td colspan=\"2\">
                <button type=\"submit\" class=\"btn btn-primary\">Update</button>
            </td>
        </tr>
    </tbody>
</table>
";
        // line 24
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_siswa/edit_picture.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 24,  43 => 14,  36 => 10,  28 => 5,  23 => 3,  19 => 1,);
    }
}
