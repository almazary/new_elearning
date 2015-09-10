<?php

/* list-pengumuman.html */
class __TwigTemplate_30429a3744f4ed7f9acb832a33a6df7779c86def5db86bc969edf839cbd4cbea extends Twig_Template
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
        echo "Pengumuman - ";
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
        <h3>Pengumuman</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("pengumuman");
        echo "

        ";
        // line 15
        if ((is_siswa() == false)) {
            // line 16
            echo "        <div class=\"btn-group pull-right\">
            ";
            // line 17
            echo anchor("pengumuman/add", "Buat Pengumuman", array("class" => "btn btn-primary"));
            echo "
        </div>
        ";
        }
        // line 20
        echo "        <form class=\"form-search\" method=\"get\" action=\"";
        echo twig_escape_filter($this->env, site_url((("pengumuman/index/" . (isset($context["page_no"]) ? $context["page_no"] : null)) . "/")), "html", null, true);
        echo "\">
            <div class=\"input-append\">
                <input type=\"text\" class=\"span3 search-query\" placeholder=\"cari pengumuman...\" name=\"q\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["keyword"]) ? $context["keyword"] : null), "html", null, true);
        echo "\">
                <button type=\"submit\" class=\"btn btn-primary\"><i class=\"icon-search\"></i></button>
            </div>
        </form>
        <br>

        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"5%\">ID</th>
                    <th>Judul</th>
                    <th width=\"17%\">Tgl. Tampil</th>
                    <th width=\"17%\">Tgl. Tutup</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pengumuman"]) ? $context["pengumuman"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 40
            echo "                <tr>
                    <td><b>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "</b></td>
                    <td><a href=\"";
            // line 42
            echo twig_escape_filter($this->env, site_url(("pengumuman/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
            echo "\"><b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "judul"), "html", null, true);
            echo "</b></a></td>
                    <td>";
            // line 43
            echo twig_escape_filter($this->env, tgl_indo($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "tgl_tampil")), "html", null, true);
            echo "</td>
                    <td>";
            // line 44
            echo twig_escape_filter($this->env, tgl_indo($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "tgl_tutup")), "html", null, true);
            echo "</td>
                    <td>
                        <div class=\"btn-group\">
                        ";
            // line 47
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "allow_action"));
            foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
                // line 48
                echo "                            ";
                if (((isset($context["a"]) ? $context["a"] : null) == "detail")) {
                    // line 49
                    echo "                            <a class=\"btn btn-default btn-small\" href=\"";
                    echo twig_escape_filter($this->env, site_url(("pengumuman/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
                    echo "\" data-toggle=\"tooltip\" title=\"Detail\"><i class=\"icon-zoom-in\"></i></a>
                            ";
                }
                // line 51
                echo "
                            ";
                // line 52
                if (((isset($context["a"]) ? $context["a"] : null) == "edit")) {
                    // line 53
                    echo "                            <a class=\"btn btn-default btn-small\" href=\"";
                    echo twig_escape_filter($this->env, site_url(("pengumuman/edit/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
                    echo "\" data-toggle=\"tooltip\" title=\"Edit\"><i class=\"icon-edit\"></i></a>
                            ";
                }
                // line 55
                echo "
                            ";
                // line 56
                if (((isset($context["a"]) ? $context["a"] : null) == "delete")) {
                    // line 57
                    echo "                            <a onclick=\"return confirm('Anda yakin ingin menghapus?')\" class=\"btn btn-default btn-small\" href=\"";
                    echo twig_escape_filter($this->env, site_url(("pengumuman/delete/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
                    echo "\" data-toggle=\"tooltip\" title=\"Edit\"><i class=\"icon-trash\"></i></a>
                            ";
                }
                // line 59
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "            </tbody>
        </table>
        <br>
        ";
        // line 67
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-pengumuman.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 67,  168 => 64,  159 => 60,  153 => 59,  147 => 57,  145 => 56,  142 => 55,  136 => 53,  134 => 52,  131 => 51,  125 => 49,  122 => 48,  118 => 47,  112 => 44,  108 => 43,  102 => 42,  98 => 41,  95 => 40,  91 => 39,  71 => 22,  65 => 20,  59 => 17,  56 => 16,  54 => 15,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
