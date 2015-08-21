<?php

/* edit-siswa-picture.html */
class __TwigTemplate_10626ed63946b300d9de9de4a1494458ae3c4365d2f2f1a29743fdc6386c86fd extends Twig_Template
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
        echo "<h4>Edit Foto</h4>
";
        // line 5
        echo get_flashdata("edit");
        echo "

";
        // line 7
        echo form_open_multipart(((("siswa/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["siswa_id"]) ? $context["siswa_id"] : null)));
        echo "
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <td>
                <img class=\"img-polaroid\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "foto"), "medium", $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "jenis_kelamin")), "html", null, true);
        echo "\">
            </td>
            <td>
                <input type=\"file\" name=\"userfile\" class=\"btn btn-small\" style=\"max-width:190px;\">
                ";
        // line 16
        echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
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
        // line 26
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "edit-siswa-picture.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 26,  54 => 16,  47 => 12,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
