<?php

/* default/admin_pengajar/edit_password.html */
class __TwigTemplate_b59a8f8aae05e87770e47527b91fff7fa81b95b49e437fa589034030f2868920 extends Twig_Template
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
        echo form_open(((("admin/pengajar/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)));
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
        return "default/admin_pengajar/edit_password.html";
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
