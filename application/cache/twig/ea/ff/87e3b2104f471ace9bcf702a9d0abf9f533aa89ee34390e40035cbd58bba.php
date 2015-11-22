<?php

/* edit-mapel.html */
class __TwigTemplate_eaff87e3b2104f471ace9bcf702a9d0abf9f533aa89ee34390e40035cbd58bba extends Twig_Template
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
        echo "Manajemen Matapelajaran - ";
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
        echo anchor((isset($context["uri_back"]) ? $context["uri_back"] : null), "Manajemen Matapelajaran");
        echo " / Edit</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("mapel");
        echo "

        ";
        // line 15
        if (is_demo_app()) {
            // line 16
            echo "            ";
            echo get_alert("warning", get_demo_msg());
            echo "
        ";
        }
        // line 18
        echo "
        ";
        // line 19
        echo form_open(((("mapel/edit/" . $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "id")) . "/") . enurl_redirect((isset($context["uri_back"]) ? $context["uri_back"] : null))), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama")), "html", null, true);
        echo "\">
                    <br>";
        // line 24
        echo form_error("nama");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Deskripsi</label>
                <div class=\"controls\">
                    <textarea name=\"info\" class=\"span12\" rows=\"5\">";
        // line 30
        echo set_value("info", $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "info"));
        echo "</textarea>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Status</label>
                <div class=\"controls\">
                    <label class=\"checkbox inline\">
                        <input type=\"checkbox\" value=\"1\" name=\"status\" ";
        // line 37
        echo twig_escape_filter($this->env, set_checkbox("status", "1", ((($this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "aktif") == 1)) ? (true) : (false))), "html", null, true);
        echo ">
                        Aktif
                    </label>
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"controls\">
                    ";
        // line 44
        if ((is_demo_app() == false)) {
            // line 45
            echo "                    <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                    ";
        }
        // line 47
        echo "                    <a href=\"";
        echo twig_escape_filter($this->env, (isset($context["uri_back"]) ? $context["uri_back"] : null), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
                </div>
            </div>
        ";
        // line 50
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "edit-mapel.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 50,  114 => 47,  110 => 45,  108 => 44,  98 => 37,  88 => 30,  79 => 24,  75 => 23,  68 => 19,  65 => 18,  59 => 16,  57 => 15,  52 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
