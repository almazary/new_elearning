<?php

/* edit-pertanyaan.html */
class __TwigTemplate_9ed671d49f7a78df3c2ae25b319519e77a446f8d21fcf0672fd1a09ecb88bc5d extends Twig_Template
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
        echo "<div class=\"btn-group pull-right\">
    <a class=\"btn btn-primary btn-small\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, site_url(("tugas/tambah_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id"))), "html", null, true);
        echo "\">Tambah Pertanyaan</a>
    <a class=\"btn btn-primary btn-small\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, site_url(((("tugas/tambah_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id"))), "html", null, true);
        echo "\">Tambah Pilihan</a>
</div>

<h4>Edit Pertanyaan ke ";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["no_pertanyaan"]) ? $context["no_pertanyaan"] : null), "html", null, true);
        echo "</h4>
";
        // line 10
        echo get_flashdata("tugas");
        echo "

";
        // line 12
        echo form_open(((("tugas/edit_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id")));
        echo "
<table class=\"table table-striped\" style=\"margin-top:20px;\">
    <tbody>
        <tr>
            <td>
                <textarea name=\"pertanyaan\" id=\"pertanyaan\" style=\"height:400px;width:100%;\">";
        // line 17
        echo set_value("pertanyaan", $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "pertanyaan"));
        echo "</textarea>
                ";
        // line 18
        echo form_error("pertanyaan");
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
        // line 28
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "edit-pertanyaan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 28,  65 => 18,  61 => 17,  53 => 12,  48 => 10,  44 => 9,  38 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
