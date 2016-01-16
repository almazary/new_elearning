<?php

/* edit-soal.html */
class __TwigTemplate_4d7837f01059b4fb15fc235980484dddd30affe1eb6af8f48eacb7facdadac5f extends Twig_Template
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
        echo "Edit soal - ";
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
        echo anchor("tugas", "Tugas");
        echo " / ";
        echo anchor((isset($context["uri_back"]) ? $context["uri_back"] : null), "Manajemen Soal Tugas");
        echo " / Edit Soal</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("bank");
        echo "

        ";
        // line 15
        echo form_open(((((("plugins/bank_soal/edit_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/") . $this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "id")) . "/") . enurl_redirect((isset($context["uri_back"]) ? $context["uri_back"] : null))), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Pertanyaan <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <textarea name=\"pertanyaan\" id=\"pertanyaan\" style=\"width: 100%; height:300px;\">";
        // line 19
        echo set_value("pertanyaan", call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null), "pertanyaan"))));
        echo "</textarea>
                    ";
        // line 20
        echo form_error("pertanyaan");
        echo "
                </div>
            </div>
            ";
        // line 23
        if ((!twig_test_empty((isset($context["pilihan"]) ? $context["pilihan"] : null)))) {
            // line 24
            echo "            <div class=\"control-group\">
                <label class=\"control-label\">Pilihan A</label>
                <div class=\"controls\">
                    <textarea name=\"pilihan_a\" id=\"pilihan_a\" style=\"width: 100%; height:200px;\">";
            // line 27
            echo set_value("pilihan_a", call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), 0, array(), "array"), "konten", array(), "array"))));
            echo "</textarea>
                    ";
            // line 28
            echo form_error("pilihan_a");
            echo "
                    <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"a\" ";
            // line 29
            echo ((($this->getAttribute($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), 0, array(), "array"), "kunci", array(), "array") == "1")) ? ("checked") : (""));
            echo "><b>Jadikan A kunci</b></label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Pilihan B</label>
                <div class=\"controls\">
                    <textarea name=\"pilihan_b\" id=\"pilihan_b\" style=\"width: 100%; height:200px;\">";
            // line 35
            echo set_value("pilihan_b", call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), 1, array(), "array"), "konten", array(), "array"))));
            echo "</textarea>
                    ";
            // line 36
            echo form_error("pilihan_b");
            echo "
                    <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"b\" ";
            // line 37
            echo ((($this->getAttribute($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), 1, array(), "array"), "kunci", array(), "array") == "1")) ? ("checked") : (""));
            echo "><b>Jadikan B kunci</b></label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Pilihan C</label>
                <div class=\"controls\">
                    <textarea name=\"pilihan_c\" id=\"pilihan_c\" style=\"width: 100%; height:200px;\">";
            // line 43
            echo set_value("pilihan_c", call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), 2, array(), "array"), "konten", array(), "array"))));
            echo "</textarea>
                    ";
            // line 44
            echo form_error("pilihan_c");
            echo "
                    <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"c\" ";
            // line 45
            echo ((($this->getAttribute($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), 2, array(), "array"), "kunci", array(), "array") == "1")) ? ("checked") : (""));
            echo "><b>Jadikan C kunci</b></label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Pilihan D</label>
                <div class=\"controls\">
                    <textarea name=\"pilihan_d\" id=\"pilihan_d\" style=\"width: 100%; height:200px;\">";
            // line 51
            echo set_value("pilihan_d", call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), 3, array(), "array"), "konten", array(), "array"))));
            echo "</textarea>
                    ";
            // line 52
            echo form_error("pilihan_d");
            echo "
                    <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"d\" ";
            // line 53
            echo ((($this->getAttribute($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), 3, array(), "array"), "kunci", array(), "array") == "1")) ? ("checked") : (""));
            echo "><b>Jadikan D kunci</b></label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Pilihan E</label>
                <div class=\"controls\">
                    <textarea name=\"pilihan_e\" id=\"pilihan_e\" style=\"width: 100%; height:200px;\">";
            // line 59
            echo set_value("pilihan_e", call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), 4, array(), "array"), "konten", array(), "array"))));
            echo "</textarea>
                    ";
            // line 60
            echo form_error("pilihan_e");
            echo "
                    <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"e\" ";
            // line 61
            echo ((($this->getAttribute($this->getAttribute((isset($context["pilihan"]) ? $context["pilihan"] : null), 4, array(), "array"), "kunci", array(), "array") == "1")) ? ("checked") : (""));
            echo "><b>Jadikan E kunci</b></label>
                </div>
            </div>
            ";
        }
        // line 65
        echo "            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                    <a href=\"";
        // line 68
        echo twig_escape_filter($this->env, (isset($context["uri_back"]) ? $context["uri_back"] : null), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
                </div>
            </div>
        ";
        // line 71
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "edit-soal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 71,  171 => 68,  166 => 65,  159 => 61,  155 => 60,  151 => 59,  142 => 53,  138 => 52,  134 => 51,  125 => 45,  121 => 44,  117 => 43,  108 => 37,  104 => 36,  100 => 35,  91 => 29,  87 => 28,  83 => 27,  78 => 24,  76 => 23,  70 => 20,  66 => 19,  59 => 15,  54 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
