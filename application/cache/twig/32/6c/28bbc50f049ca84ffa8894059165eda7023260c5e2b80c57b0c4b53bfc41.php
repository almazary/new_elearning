<?php

/* default/admin_siswa/index.html */
class __TwigTemplate_326c28bbc50f049ca84ffa8894059165eda7023260c5e2b80c57b0c4b53bfc41 extends Twig_Template
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
        echo "<div class=\"content\">
    <div class=\"module\">
        <div class=\"module-head\">
            <h3>";
        // line 4
        echo (isset($context["module_title"]) ? $context["module_title"] : null);
        echo "</h3>
        </div>
        <div class=\"module-body\">
            ";
        // line 7
        echo get_flashdata("siswa");
        echo "

            ";
        // line 9
        $template = $this->env->resolveTemplate((isset($context["sub_content_file"]) ? $context["sub_content_file"] : null));
        $template->display($context);
        // line 10
        echo "        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "default/admin_siswa/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 10,  30 => 7,  24 => 4,  73 => 22,  69 => 21,  66 => 20,  63 => 19,  56 => 15,  52 => 14,  48 => 13,  43 => 11,  39 => 10,  35 => 9,  31 => 8,  27 => 7,  19 => 1,);
    }
}
