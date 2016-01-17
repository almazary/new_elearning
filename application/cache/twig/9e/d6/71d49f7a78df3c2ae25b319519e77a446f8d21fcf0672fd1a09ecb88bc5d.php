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
    ";
        // line 6
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
            // line 7
            echo "    <a class=\"btn btn-primary btn-small\" href=\"";
            echo twig_escape_filter($this->env, site_url(((("tugas/tambah_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id"))), "html", null, true);
            echo "\">Tambah Pilihan</a>
    ";
        }
        // line 9
        echo "</div>

<h4>Edit Pertanyaan ke ";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["no_pertanyaan"]) ? $context["no_pertanyaan"] : null), "html", null, true);
        echo "</h4>
";
        // line 12
        echo get_flashdata("tugas");
        echo "

";
        // line 14
        echo form_open(((("tugas/edit_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id")));
        echo "
<table class=\"table table-striped\" style=\"margin-top:20px;\">
    <tbody>
        <tr>
            <td>
                <textarea name=\"pertanyaan\" id=\"pertanyaan\" style=\"height:400px;width:100%;\">";
        // line 19
        echo set_value("pertanyaan", call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "pertanyaan"))));
        echo "</textarea>
                ";
        // line 20
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
        // line 30
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
        return array (  84 => 30,  71 => 20,  67 => 19,  59 => 14,  54 => 12,  50 => 11,  46 => 9,  40 => 7,  38 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
