<?php

/* edit-pengajar-password.html */
class __TwigTemplate_0bb41092063b9d79540d19fd24585aacee440a58b83e9a82cfae85231652a8ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-iframe.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-iframe.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<h4>Edit Password</h4>
";
        // line 5
        echo get_flashdata("edit");
        echo "

";
        // line 7
        if ((is_demo_app() && ($this->getAttribute((isset($context["login"]) ? $context["login"] : null), "is_admin") == true))) {
            // line 8
            echo "    ";
            echo get_alert("warning", get_demo_msg());
            echo "
";
        }
        // line 10
        echo "
";
        // line 11
        echo form_open(((("pengajar/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["pengajar_id"]) ? $context["pengajar_id"] : null)));
        echo "
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"35%\">Password Baru <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"password\" name=\"password\">
                <br>";
        // line 18
        echo form_error("password");
        echo "
            </td>
        <tr>
        <tr>
            <th>Ulangi Password <span class=\"text-error\">*</span></th>
            <td>
                <input type=\"password\" name=\"password2\">
                <br>";
        // line 25
        echo form_error("password2");
        echo "
            </td>
        <tr>
        ";
        // line 28
        if (((is_demo_app() == false) || ($this->getAttribute((isset($context["login"]) ? $context["login"] : null), "is_admin") == false))) {
            // line 29
            echo "        <tr>
            <td colspan=\"2\">
                <button type=\"submit\" class=\"btn btn-primary\">Update</button>
            </td>
        </tr>
        ";
        }
        // line 35
        echo "    </tbody>
</table>
";
        // line 37
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "edit-pengajar-password.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 37,  86 => 35,  78 => 29,  76 => 28,  70 => 25,  60 => 18,  50 => 11,  47 => 10,  41 => 8,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
