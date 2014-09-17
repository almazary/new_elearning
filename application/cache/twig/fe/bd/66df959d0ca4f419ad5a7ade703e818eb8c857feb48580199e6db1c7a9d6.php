<?php

/* default/admin_siswa/edit_password.html */
class __TwigTemplate_febd66df959d0ca4f419ad5a7ade703e818eb8c857feb48580199e6db1c7a9d6 extends Twig_Template
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
<strong>Edit Password</strong>
";
        // line 3
        echo get_flashdata("edit");
        echo "

";
        // line 5
        echo form_open(((("admin/siswa/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["siswa_id"]) ? $context["siswa_id"] : null)));
        echo "
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"35%\">Password Baru <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"password\" name=\"password\">
                <br>";
        // line 12
        echo form_error("password");
        echo "
            </td>
        <tr>
        <tr>
            <th>Ulangi Password <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"password\" name=\"password2\">
                <br>";
        // line 19
        echo form_error("password2");
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
        // line 29
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_siswa/edit_password.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 29,  48 => 19,  38 => 12,  28 => 5,  23 => 3,  19 => 1,);
    }
}
