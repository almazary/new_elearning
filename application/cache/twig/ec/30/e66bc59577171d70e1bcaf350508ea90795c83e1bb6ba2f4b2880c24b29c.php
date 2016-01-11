<?php

/* edit-bank.html */
class __TwigTemplate_ec30e66bc59577171d70e1bcaf350508ea90795c83e1bb6ba2f4b2880c24b29c extends Twig_Template
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
        echo "Edit bank soal - ";
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
        echo anchor((isset($context["uri_back"]) ? $context["uri_back"] : null), "Bank Soal");
        echo " / Edit</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("bank");
        echo "

        ";
        // line 15
        echo form_open(((("plugins/bank_soal/edit/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")) . "/") . enurl_redirect((isset($context["uri_back"]) ? $context["uri_back"] : null))), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Matapelajaran <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <select name=\"mapel_id\">
                        <option value=\"\">--pilih--</option>
                        ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 22
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("mapel_id", $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "mapel_id") == $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"))) ? (true) : (""))), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "                    </select>
                    <br>";
        // line 25
        echo form_error("mapel_id");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Pertanyaan <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <textarea name=\"pertanyaan\" id=\"pertanyaan\" style=\"width: 100%; height:300px;\">";
        // line 31
        echo set_value("pertanyaan", html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
        echo "</textarea>
                    ";
        // line 32
        echo form_error("pertanyaan");
        echo "
                </div>
            </div>
            ";
        // line 35
        if ((!twig_test_empty($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci")))) {
            // line 36
            echo "            <div class=\"control-group\">
                <label class=\"control-label\">Pilihan A</label>
                <div class=\"controls\">
                    <textarea name=\"pilihan_a\" id=\"pilihan_a\" style=\"width: 100%; height:200px;\">";
            // line 39
            echo set_value("pilihan_a", html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_a")));
            echo "</textarea>
                    ";
            // line 40
            echo form_error("pilihan_a");
            echo "
                    <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"a\" ";
            // line 41
            echo ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "a")) ? ("checked") : (""));
            echo "><b>Jadikan A kunci</b></label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Pilihan B</label>
                <div class=\"controls\">
                    <textarea name=\"pilihan_b\" id=\"pilihan_b\" style=\"width: 100%; height:200px;\">";
            // line 47
            echo set_value("pilihan_b", html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_b")));
            echo "</textarea>
                    ";
            // line 48
            echo form_error("pilihan_b");
            echo "
                    <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"b\" ";
            // line 49
            echo ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "b")) ? ("checked") : (""));
            echo "><b>Jadikan B kunci</b></label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Pilihan C</label>
                <div class=\"controls\">
                    <textarea name=\"pilihan_c\" id=\"pilihan_c\" style=\"width: 100%; height:200px;\">";
            // line 55
            echo set_value("pilihan_c", html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_c")));
            echo "</textarea>
                    ";
            // line 56
            echo form_error("pilihan_c");
            echo "
                    <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"c\" ";
            // line 57
            echo ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "c")) ? ("checked") : (""));
            echo "><b>Jadikan C kunci</b></label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Pilihan D</label>
                <div class=\"controls\">
                    <textarea name=\"pilihan_d\" id=\"pilihan_d\" style=\"width: 100%; height:200px;\">";
            // line 63
            echo set_value("pilihan_d", html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_d")));
            echo "</textarea>
                    ";
            // line 64
            echo form_error("pilihan_d");
            echo "
                    <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"d\" ";
            // line 65
            echo ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "d")) ? ("checked") : (""));
            echo "><b>Jadikan D kunci</b></label>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Pilihan E</label>
                <div class=\"controls\">
                    <textarea name=\"pilihan_e\" id=\"pilihan_e\" style=\"width: 100%; height:200px;\">";
            // line 71
            echo set_value("pilihan_e", html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_e")));
            echo "</textarea>
                    ";
            // line 72
            echo form_error("pilihan_e");
            echo "
                    <label class=\"radio inline\"><input type=\"radio\" name=\"kunci\" value=\"e\" ";
            // line 73
            echo ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "e")) ? ("checked") : (""));
            echo "><b>Jadikan E kunci</b></label>
                </div>
            </div>
            ";
        }
        // line 77
        echo "            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                    <a href=\"";
        // line 80
        echo twig_escape_filter($this->env, (isset($context["uri_back"]) ? $context["uri_back"] : null), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
                </div>
            </div>
        ";
        // line 83
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "edit-bank.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 83,  202 => 80,  197 => 77,  190 => 73,  186 => 72,  182 => 71,  173 => 65,  169 => 64,  165 => 63,  156 => 57,  152 => 56,  148 => 55,  139 => 49,  135 => 48,  131 => 47,  122 => 41,  118 => 40,  114 => 39,  109 => 36,  107 => 35,  101 => 32,  97 => 31,  88 => 25,  85 => 24,  72 => 22,  68 => 21,  59 => 15,  54 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
