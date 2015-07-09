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

        <div class=\"bs-callout bs-callout-info\">
        <p>
            Pilih matapelajaran yang ingin di masukkan pada <b>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama", array(), "array"), "html", null, true);
        echo "</b>
        </p>
        </div>
        <br>

        ";
        // line 22
        echo form_open(((((("kelas/mapel_kelas/add/" . $this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "id", array(), "array")) . "/") . $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "id", array(), "array")) . "/") . enurl_redirect((isset($context["uri_back"]) ? $context["uri_back"] : null))));
        echo "
        <table class=\"table table-striped\">
        <tbody>
            ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapels"]) ? $context["mapels"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 26
            echo "            ";
            $context["checked"] = get_row_data("mapel_model", "retrieve_kelas", array(0 => null, 1 => $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "id", array(), "array"), 2 => $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")));
            // line 27
            echo "            <tr>
                <td>
                    ";
            // line 29
            if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") != 1)) {
                // line 30
                echo "                    <span class=\"badge badge-warning pull-right\">Matapelajaran Tidak Aktif</span>
                    ";
            }
            // line 32
            echo "                    <label><input type=\"checkbox\" name=\"mapel[]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" style=\"margin-top:-2px;margin-right:5px;\" ";
            echo ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") != 1)) ? ("disabled") : (""));
            echo " ";
            echo (((twig_test_empty((isset($context["checked"]) ? $context["checked"] : null)) || ($this->getAttribute((isset($context["checked"]) ? $context["checked"] : null), "aktif") == 0))) ? ("") : ("checked"));
            echo "> <b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</b></label>
                    <small>";
            // line 33
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "info"), "html", null, true));
            echo "</small>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "        </tbody>
        </table>
        <br>
        <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
        <a href=\"";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["uri_back"]) ? $context["uri_back"] : null), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
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
        return "tambah-mapel-kelas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 42,  117 => 41,  111 => 37,  101 => 33,  90 => 32,  86 => 30,  84 => 29,  80 => 27,  77 => 26,  73 => 25,  67 => 22,  59 => 17,  52 => 13,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
