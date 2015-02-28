<?php

/* admin_tugas/tambah_soal.html */
class __TwigTemplate_46c167e3da52a21d786d44ebdda9bc4b8be632a0657be050a51a749fbff17e51 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-iframe.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
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
        echo "<strong>Tambah Soal</strong>

";
        // line 6
        echo form_open(((("admin/siswa/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . (isset($context["siswa_id"]) ? $context["siswa_id"] : null)));
        echo "
<table class=\"table table-striped\">
    <tbody>
        <tr>
            <td>
                <textarea id=\"question\" name=\"pertanyaan\" style=\"width:100%;height:200px;\"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <button class=\"btn btn-primary\" type=\"submit\">Simpan</button>
                <button type=\"button\" class=\"btn btn-default close-colorbox\">Batal</button>
            </td>
        </tr>
    </tbody>
</table>
";
        // line 22
        echo form_close();
        echo "
";
    }

    // line 25
    public function block_js($context, array $blocks = array())
    {
        // line 26
        $this->displayParentBlock("js", $context, $blocks);
        echo "
<script type=\"text/javascript\">
    \$('.close-colorbox').click(function() {
        var conf = confirm('Anda yakin ingin membatalkan?');
        if (conf) {
            parent.jQuery.colorbox.close();
        }
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "admin_tugas/tambah_soal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 26,  61 => 25,  55 => 22,  36 => 6,  32 => 4,  29 => 3,);
    }
}
