<?php

/* admin_materi/add.html */
class __TwigTemplate_519a9bfdc1483b29ae39fd977dea82ea8e47080a47fd44c0cbb7e2ec801e5099 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 6
        echo (isset($context["module_title"]) ? $context["module_title"] : null);
        echo "</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 9
        echo get_flashdata("materi");
        echo "

        ";
        // line 11
        echo form_open_multipart(("admin/materi/add/" . (isset($context["type"]) ? $context["type"] : null)), array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Judul <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"judul\" class=\"span12\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, set_value("judul"), "html", null, true);
        echo "\">
                    <br>";
        // line 16
        echo form_error("judul");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Matapelajaran <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <select name=\"mapel_id\">
                        <option value=\"\">--pilih--</option>
                        ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 25
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_select("mapel_id", $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "                    </select>
                    <br>";
        // line 28
        echo form_error("mapel_id");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Kelas <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                        ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 36
            echo "                        <li>
                            <label class=\"checkbox inline\">
                                <input type=\"checkbox\" name=\"kelas_id[]\" value=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_checkbox("kelas_id[]", $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id")), "html", null, true);
            echo "> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "
                            </label>
                        </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                    </ul>
                    ";
        // line 43
        echo form_error("kelas_id[]");
        echo "
                </div>
            </div>
            ";
        // line 46
        if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
            // line 47
            echo "            <div class=\"control-group\">
                <label class=\"control-label\">Konten <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <textarea name=\"konten\" id=\"konten\" style=\"height:500px;width:100%;\">";
            // line 50
            echo twig_escape_filter($this->env, set_value("konten"), "html", null, true);
            echo "</textarea>
                    ";
            // line 51
            echo form_error("konten");
            echo "
                </div>
            </div>
            ";
        } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
            // line 55
            echo "            <div class=\"control-group\">
                <label class=\"control-label\">File <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"file\" name=\"userfile\">
                    <br>";
            // line 59
            echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
            echo "
                </div>
            </div>
            ";
        }
        // line 63
        echo "            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                    <a href=\"";
        // line 66
        echo twig_escape_filter($this->env, site_url("admin/materi"), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
                </div>
            </div>
        ";
        // line 69
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_materi/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 69,  165 => 66,  160 => 63,  153 => 59,  147 => 55,  140 => 51,  136 => 50,  131 => 47,  129 => 46,  123 => 43,  120 => 42,  106 => 38,  102 => 36,  98 => 35,  88 => 28,  85 => 27,  72 => 25,  68 => 24,  57 => 16,  53 => 15,  46 => 11,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
