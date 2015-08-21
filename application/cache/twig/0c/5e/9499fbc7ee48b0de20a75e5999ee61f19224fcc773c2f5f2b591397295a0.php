<?php

/* install-step-2.html */
class __TwigTemplate_0c5e9499fbc7ee48b0de20a75e5999ee61f19224fcc773c2f5f2b591397295a0 extends Twig_Template
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
                <span class=\"pull-right\"><b>Step 2 : </b>Informasi sekolah</span>
                <h3>Install e-learning</h3>
            </div>

            <div class=\"module-body\">
                ";
        // line 16
        echo (isset($context["error"]) ? $context["error"] : null);
        echo "

                ";
        // line 18
        echo form_open("setup/index/2", array("class" => "form-horizontal row-fluid"));
        echo "
                    <div class=\"control-group\">
                        <label class=\"control-label\">Jenjang <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <select name=\"jenjang\">
                                <option value=\"SMP\" ";
        // line 23
        echo twig_escape_filter($this->env, set_select("jenjang", "SMP"), "html", null, true);
        echo ">SMP/Sederajat</option>
                                <option value=\"SMA\" ";
        // line 24
        echo twig_escape_filter($this->env, set_select("jenjang", "SMA"), "html", null, true);
        echo ">SMA/Sederajat</option>
                            </select>
                            <br>";
        // line 26
        echo form_error("host");
        echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Nama sekolah <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"nama-sekolah\" class=\"span8\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, set_value("nama-sekolah"), "html", null, true);
        echo "\">
                            <br>";
        // line 33
        echo form_error("nama-sekolah");
        echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Alamat <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"alamat\" class=\"span10\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, set_value("alamat"), "html", null, true);
        echo "\">
                            <br>";
        // line 40
        echo form_error("alamat");
        echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Telpon</label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"telp\" class=\"span6\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, set_value("telp"), "html", null, true);
        echo "\">
                            <br>";
        // line 47
        echo form_error("telp");
        echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <div class=\"controls\">
                            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                        </div>
                    </div>
                ";
        // line 55
        echo form_close();
        echo "

            </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "install-step-2.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 55,  113 => 47,  109 => 46,  100 => 40,  96 => 39,  87 => 33,  83 => 32,  74 => 26,  69 => 24,  65 => 23,  57 => 18,  52 => 16,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
