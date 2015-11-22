<?php

/* laporkan-komentar.html */
class __TwigTemplate_a6fb9e099557ff2888af408b3d56eb271e09d9d40394fc59564ba8d488d23000 extends Twig_Template
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
        echo "<h4>Alasan laporan</h4>
";
        // line 5
        echo get_flashdata("laporkan");
        echo "

<p>Mengapa anda melaporkan komentar tersebut?</p>

";
        // line 9
        echo form_open(((("materi/detail/" . $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "id")) . "/laporkan/") . $this->getAttribute((isset($context["komentar"]) ? $context["komentar"] : null), "id")));
        echo "
";
        // line 10
        echo form_error("alasan");
        echo "
<label class=\"radio\">
  <input type=\"radio\" ";
        // line 12
        echo twig_escape_filter($this->env, set_radio("alasan", "SARA"), "html", null, true);
        echo " class=\"hide-lain\" name=\"alasan\" value=\"SARA\"> SARA
</label>
<label class=\"radio\">
  <input type=\"radio\" ";
        // line 15
        echo twig_escape_filter($this->env, set_radio("alasan", "Pornografi"), "html", null, true);
        echo " class=\"hide-lain\" name=\"alasan\" value=\"Pornografi\"> Pornografi
</label>
<label class=\"radio\">
  <input type=\"radio\" ";
        // line 18
        echo twig_escape_filter($this->env, set_radio("alasan", "Profokasi/Intimidasi"), "html", null, true);
        echo " class=\"hide-lain\" name=\"alasan\" value=\"Profokasi/Intimidasi\"> Profokasi/Intimidasi
</label>
<label class=\"radio\">
  <input type=\"radio\" ";
        // line 21
        echo twig_escape_filter($this->env, set_radio("alasan", "tulis"), "html", null, true);
        echo " class=\"show-lain\" name=\"alasan\" value=\"tulis\"> Tulis alasan
</label>
<div class=\"form-lain ";
        // line 23
        echo (((twig_test_empty(get_post_data("alasan")) || (get_post_data("alasan") != "tulis"))) ? ("hide") : (""));
        echo "\">
    <textarea class=\"span12\" name=\"alasan_lain\" placeholder=\"Tulis alasan anda\">";
        // line 24
        echo twig_escape_filter($this->env, set_value("alasan_lain"), "html", null, true);
        echo "</textarea>
    ";
        // line 25
        echo form_error("alasan_lain");
        echo "
</div>
<p><button type=\"submit\" class=\"btn btn-primary\">Submit</button></p>
";
        // line 28
        echo form_close();
        echo "
";
    }

    // line 31
    public function block_js($context, array $blocks = array())
    {
        // line 32
        echo "<script type=\"text/javascript\">
\$(\".hide-lain\").on('click', function() {
    \$(\".form-lain\").hide();
});
\$(\".show-lain\").on('click', function() {
    \$(\".form-lain\").show();
});
</script>
";
    }

    public function getTemplateName()
    {
        return "laporkan-komentar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 32,  94 => 31,  88 => 28,  82 => 25,  78 => 24,  74 => 23,  69 => 21,  63 => 18,  57 => 15,  51 => 12,  46 => 10,  42 => 9,  35 => 5,  32 => 4,  29 => 3,);
    }
}
