<?php

/* edit-email-template.html */
class __TwigTemplate_925abd8af2e8b9ceb84d88bd17df9ffbf7b5c433f91f98b85bf76bfed39e2e59 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-private.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Edit Email Template - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 10
        echo anchor("email", "Email Template");
        echo " / Edit</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("email");
        echo "

        ";
        // line 15
        echo form_open(("email/edit/" . $this->getAttribute((isset($context["template"]) ? $context["template"] : null), "id")), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Nama</label>
                <div class=\"controls\">
                    <p style=\"margin-top:5px;\">";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["template"]) ? $context["template"] : null), "nama"), "html", null, true);
        echo "</p>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Subject</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"subject\" class=\"span12\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, set_value("subject", $this->getAttribute((isset($context["template"]) ? $context["template"] : null), "subject")), "html", null, true);
        echo "\">
                    <br>";
        // line 26
        echo form_error("subject");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Body</label>
                <div class=\"controls\">
                    <textarea name=\"body\" id=\"body\" style=\"height:300px;width:100%;\">";
        // line 32
        echo set_value("body", html_entity_decode($this->getAttribute((isset($context["template"]) ? $context["template"] : null), "body")));
        echo "</textarea>
                    ";
        // line 33
        echo form_error("body");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                    <a href=\"";
        // line 39
        echo twig_escape_filter($this->env, site_url("email"), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
                </div>
            </div>
        ";
        // line 42
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "edit-email-template.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 42,  99 => 39,  90 => 33,  86 => 32,  77 => 26,  73 => 25,  64 => 19,  57 => 15,  52 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
