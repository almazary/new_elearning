<?php

/* install-step-1.html */
class __TwigTemplate_3f46c52f1ea72498d873afce8fa5756fe38945e6a5b42e974ee5c2476a32bfe4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Install - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
    <div class=\"module span8 offset2\">
            <div class=\"module-head\">
                <span class=\"pull-right\"><b>Step 1 : </b>Konfigurasi database</span>
                <h3>Install e-learning</h3>
            </div>

            <div class=\"module-body\">
                ";
        // line 16
        echo (isset($context["error"]) ? $context["error"] : null);
        echo "

                ";
        // line 18
        echo form_open("setup/index/1", array("class" => "form-horizontal row-fluid"));
        echo "
                    <div class=\"control-group\">
                        <label class=\"control-label\">Host <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"host\" class=\"span6\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, set_value("host", "localhost"), "html", null, true);
        echo "\">
                            <br>";
        // line 23
        echo form_error("host");
        echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">User <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"user\" class=\"span6\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, set_value("user"), "html", null, true);
        echo "\">
                            <br>";
        // line 30
        echo form_error("user");
        echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Password</label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"password\" class=\"span6\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, set_value("password"), "html", null, true);
        echo "\">
                            <br>";
        // line 37
        echo form_error("password");
        echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Nama database <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"db\" class=\"span6\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, set_value("db"), "html", null, true);
        echo "\">
                            <br>";
        // line 44
        echo form_error("db");
        echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Prefix</label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"prefix\" class=\"span6\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, set_value("prefix", "EL_"), "html", null, true);
        echo "\">
                            <br>";
        // line 51
        echo form_error("prefix");
        echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <div class=\"controls\">
                            <button type=\"submit\" class=\"btn btn-primary\">Atur</button>
                        </div>
                    </div>
                ";
        // line 59
        echo form_close();
        echo "

            </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "install-step-1.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 59,  120 => 51,  116 => 50,  107 => 44,  103 => 43,  94 => 37,  90 => 36,  81 => 30,  77 => 29,  68 => 23,  64 => 22,  57 => 18,  52 => 16,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
