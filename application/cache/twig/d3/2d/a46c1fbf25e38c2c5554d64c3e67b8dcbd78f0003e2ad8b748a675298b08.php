<?php

/* tambah-mapel-kelas.html */
class __TwigTemplate_d32da46c1fbf25e38c2c5554d64c3e67b8dcbd78f0003e2ad8b748a675298b08 extends Twig_Template
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
        echo "Matapelajaran Kelas - ";
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
        echo anchor((isset($context["uri_back"]) ? $context["uri_back"] : null), "Matapelajaran Kelas");
        echo " / Atur Matapelajaran</h3>
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
        <div class=\"bs-callout bs-callout-info\">
        <p>
            Pilih matapelajaran yang ingin di masukkan pada <b>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama", array(), "array"), "html", null, true);
        echo "</b>
        </p>
        </div>
        <br>

        ";
        // line 26
        echo form_open(((((("kelas/mapel_kelas/add/" . $this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "id", array(), "array")) . "/") . $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "id", array(), "array")) . "/") . enurl_redirect((isset($context["uri_back"]) ? $context["uri_back"] : null))));
        echo "
        <table class=\"table table-striped\">
        <tbody>
            ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapels"]) ? $context["mapels"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 30
            echo "            ";
            $context["checked"] = get_row_data("mapel_model", "retrieve_kelas", array(0 => null, 1 => $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "id", array(), "array"), 2 => $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")));
            // line 31
            echo "            <tr>
                <td>
                    <label><input type=\"checkbox\" name=\"mapel[]\" value=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" style=\"margin-top:-2px;margin-right:5px;\" ";
            echo ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") != 1)) ? ("disabled") : (""));
            echo " ";
            echo (((twig_test_empty((isset($context["checked"]) ? $context["checked"] : null)) || ($this->getAttribute((isset($context["checked"]) ? $context["checked"] : null), "aktif") == 0))) ? ("") : ("checked"));
            echo "> <b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</b></label>
                    <small>";
            // line 34
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "info"), "html", null, true));
            echo "</small>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "        </tbody>
        </table>
        <br>
        ";
        // line 41
        if ((is_demo_app() == false)) {
            // line 42
            echo "        <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
        ";
        }
        // line 44
        echo "        <a href=\"";
        echo twig_escape_filter($this->env, (isset($context["uri_back"]) ? $context["uri_back"] : null), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
        ";
        // line 45
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "tambah-mapel-kelas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 45,  126 => 44,  122 => 42,  120 => 41,  115 => 38,  105 => 34,  95 => 33,  91 => 31,  88 => 30,  84 => 29,  78 => 26,  70 => 21,  65 => 18,  59 => 16,  57 => 15,  52 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
