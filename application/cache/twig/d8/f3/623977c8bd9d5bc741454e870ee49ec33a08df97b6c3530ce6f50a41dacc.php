<?php

/* default/admin_pengajar/index.html */
class __TwigTemplate_d8f3623977c8bd9d5bc741454e870ee49ec33a08df97b6c3530ce6f50a41dacc extends Twig_Template
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
        echo get_flashdata("pengajar");
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
        return "default/admin_pengajar/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 10,  35 => 9,  30 => 7,  24 => 4,  19 => 1,);
    }
}
