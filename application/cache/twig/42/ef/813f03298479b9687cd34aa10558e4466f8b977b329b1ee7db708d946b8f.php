<?php

/* admin_mapel_kelas/add.html */
class __TwigTemplate_42ef813f03298479b9687cd34aa10558e4466f8b977b329b1ee7db708d946b8f extends Twig_Template
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
        echo get_flashdata("mapel");
        echo "

        <div class=\"bs-callout bs-callout-info\">
        <p>
            Pilih matapelajaran yang ingin di masukkan pada <b>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama", array(), "array"), "html", null, true);
        echo "</b>
        </p>
        </div>
        <br>

        ";
        // line 18
        echo form_open(((((("admin/mapel_kelas/add/" . $this->getAttribute((isset($context["parent"]) ? $context["parent"] : null), "id", array(), "array")) . "/") . $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "id", array(), "array")) . "/") . enurl_redirect((isset($context["uri_back"]) ? $context["uri_back"] : null))));
        echo "
        <table class=\"table table-striped\">
        <tbody>
            ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapels"]) ? $context["mapels"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 22
            echo "            ";
            $context["checked"] = get_row_data("mapel_model", "retrieve_kelas", array(0 => null, 1 => $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "id", array(), "array"), 2 => $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")));
            // line 23
            echo "            <tr>
                <td>
                    ";
            // line 25
            if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") != 1)) {
                // line 26
                echo "                    <span class=\"badge badge-warning pull-right\">Matapelajaran Tidak Aktif</span>
                    ";
            }
            // line 28
            echo "                    <label><input type=\"checkbox\" name=\"mapel[]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" style=\"margin-top:-2px;margin-right:5px;\" ";
            echo ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") != 1)) ? ("disabled") : (""));
            echo " ";
            echo ((twig_test_empty((isset($context["checked"]) ? $context["checked"] : null))) ? ("") : ("checked"));
            echo "> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</label>
                    <small>";
            // line 29
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "info"), "html", null, true));
            echo "</small>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </tbody>
        </table>
        <br>
        <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
        <a href=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["uri_back"]) ? $context["uri_back"] : null), "html", null, true);
        echo "\" class=\"btn btn-default\">Kembali</a>
        ";
        // line 38
        echo form_close();
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_mapel_kelas/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 38,  106 => 37,  100 => 33,  90 => 29,  79 => 28,  75 => 26,  73 => 25,  69 => 23,  66 => 22,  62 => 21,  56 => 18,  48 => 13,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
