<?php

/* login.html */
class __TwigTemplate_c75ceef9aa7bfae7e5cc9b05d66f92e31f6a48ce6d3a2309af6693d720333a94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-public.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-public.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Login - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
    <div class=\"module span4 offset4\">
        ";
        // line 10
        echo form_open("login", array("autocomplete" => "off", "class" => "form-vertical"));
        echo "
            <div class=\"module-head\">
                <h3>Login E-learning</h3>
            </div>
            <div class=\"module-body\">
               ";
        // line 15
        echo get_flashdata("login");
        echo "
                <div class=\"control-group\">
                    <div class=\"controls row-fluid\">
                        <input class=\"span12\" name=\"email\" type=\"text\" placeholder=\"Username (Email)\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, set_value("email"), "html", null, true);
        echo "\" autofocus>
                        ";
        // line 19
        echo form_error("email");
        echo "
                    </div>
                </div>
                <div class=\"control-group\">
                    <div class=\"controls row-fluid\">
                        <input class=\"span12\" name=\"password\" type=\"password\" placeholder=\"Password\">
                    </div>
                </div>
            </div>
            <div class=\"module-foot\">
                <div class=\"control-group\">
                    <div class=\"controls clearfix\">
                        <button type=\"submit\" class=\"btn btn-large btn-primary pull-right\">Login</button>
                        <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, site_url("login/lupa_password"), "html", null, true);
        echo "\">Lupa password?</a>
                    </div>
                </div>
            </div>
        ";
        // line 36
        echo (isset($context["form_close"]) ? $context["form_close"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 36,  80 => 32,  64 => 19,  60 => 18,  54 => 15,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
