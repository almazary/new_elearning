<?php

/* tambah-pilihan.html */
class __TwigTemplate_95d282972ec53421770eeb6d07ea795e66c00ee0fdf6d0e4929025a3c5717d25 extends Twig_Template
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
        echo "<h4>Tambah Pilihan</h4>
";
        // line 5
        echo get_flashdata("tugas");
        echo "

";
        // line 7
        echo form_open(((("tugas/tambah_pilihan/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id")));
        echo "
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <th width=\"15%\">Pilihan <span class=\"text-error\">*</span></th>
            <td>
                <select name=\"pilihan\" style=\"width:auto;\">
                    <option value=\"\">--Pilih--</option>
                    <option value=\"1\" ";
        // line 15
        echo twig_escape_filter($this->env, set_select("pilihan", "1"), "html", null, true);
        echo ">A</option>
                    <option value=\"2\" ";
        // line 16
        echo twig_escape_filter($this->env, set_select("pilihan", "2"), "html", null, true);
        echo ">B</option>
                    <option value=\"3\" ";
        // line 17
        echo twig_escape_filter($this->env, set_select("pilihan", "3"), "html", null, true);
        echo ">C</option>
                    <option value=\"4\" ";
        // line 18
        echo twig_escape_filter($this->env, set_select("pilihan", "4"), "html", null, true);
        echo ">D</option>
                    <option value=\"5\" ";
        // line 19
        echo twig_escape_filter($this->env, set_select("pilihan", "5"), "html", null, true);
        echo ">E</option>
                </select>
                ";
        // line 21
        echo form_error("pilihan");
        echo "
            </td>
        </tr>
        <tr>
            <td colspan=\"2\">
                <textarea name=\"konten\" id=\"konten\" style=\"height:350px;width:100%;\">";
        // line 26
        echo set_value("konten");
        echo "</textarea>
                ";
        // line 27
        echo form_error("konten");
        echo "
            </td>
        <tr>
        <tr>
            <td colspan=\"2\">
                <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
            </td>
        </tr>
    </tbody>
</table>
";
        // line 37
        echo form_close();
        echo "
";
    }

    public function getTemplateName()
    {
        return "tambah-pilihan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 37,  83 => 27,  79 => 26,  71 => 21,  66 => 19,  62 => 18,  58 => 17,  54 => 16,  50 => 15,  39 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
