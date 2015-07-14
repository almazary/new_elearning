<?php

/* edit-pilihan.html */
class __TwigTemplate_2f99b5b88c70e18ef19a4e4caac080df53ad820fd47c662b026ae71509b6d458 extends Twig_Template
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
        echo twig_escape_filter($this->env, site_url(((("tugas/tambah_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id"))), "html", null, true);
        echo "\">Tambah Pilihan</a>
</div>

<h4>Edit Pilihan</h4>
";
        // line 9
        echo get_flashdata("tugas");
        echo "

";
        // line 11
        echo form_open(((((("tugas/edit_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id")) . "/") . $this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), "id")));
        echo "
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"15%\">Pilihan <span class=\"text-error\">*</span></th>
            <td>
                <select name=\"pilihan\" style=\"width:auto;\">
                    <option value=\"\">--Pilih--</option>
                    <option value=\"1\" ";
        // line 19
        echo twig_escape_filter($this->env, set_select("pilihan", "1", ((($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), "urutan") == 1)) ? (true) : (false))), "html", null, true);
        echo ">A</option>
                    <option value=\"2\" ";
        // line 20
        echo twig_escape_filter($this->env, set_select("pilihan", "2", ((($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), "urutan") == 2)) ? (true) : (false))), "html", null, true);
        echo ">B</option>
                    <option value=\"3\" ";
        // line 21
        echo twig_escape_filter($this->env, set_select("pilihan", "3", ((($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), "urutan") == 3)) ? (true) : (false))), "html", null, true);
        echo ">C</option>
                    <option value=\"4\" ";
        // line 22
        echo twig_escape_filter($this->env, set_select("pilihan", "4", ((($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), "urutan") == 4)) ? (true) : (false))), "html", null, true);
        echo ">D</option>
                    <option value=\"5\" ";
        // line 23
        echo twig_escape_filter($this->env, set_select("pilihan", "5", ((($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), "urutan") == 5)) ? (true) : (false))), "html", null, true);
        echo ">E</option>
                </select>
                ";
        // line 25
        echo form_error("pilihan");
        echo "
            </td>
        </tr>
        <tr>
            <td colspan=\"2\">
                <textarea name=\"konten\" id=\"konten\" style=\"height:350px;width:100%;\">";
        // line 30
        echo set_value("konten", $this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), "konten"));
        echo "</textarea>
                ";
        // line 31
        echo form_error("konten");
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
        // line 41
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "edit-pilihan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 41,  90 => 31,  86 => 30,  78 => 25,  73 => 23,  69 => 22,  65 => 21,  61 => 20,  57 => 19,  46 => 11,  41 => 9,  34 => 5,  31 => 4,  28 => 3,);
    }
}
