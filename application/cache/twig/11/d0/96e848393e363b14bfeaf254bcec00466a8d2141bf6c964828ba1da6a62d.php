<?php

/* list-komentar.html */
class __TwigTemplate_11d096e848393e363b14bfeaf254bcec00466a8d2141bf6c964828ba1da6a62d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
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
        echo "Komentar Materi - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<style type=\"text/css\">
    .komentar img {
        height: auto;
        max-width: 100%;
        width: auto;
    }
    table {
        table-layout: fixed;
    }
</style>
";
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
        // line 21
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Komentar Materi</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 26
        echo get_flashdata("komentar");
        echo "

        <table class=\"table table-striped datatable\">
            <thead>
                <tr>
                    <th width=\"5%\">ID</th>
                    <th>Komentar</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["komentar"]) ? $context["komentar"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 37
            echo "                <tr>
                    <td>
                        <b>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "</b>
                        <br>
                        <a href=\"\"><i class=\"icon icon-trash\"></i></a>
                    </td>
                    <td>
                        <div class=\"media\">
                            <div class=\"pull-right\">
                                <img src=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "link_image"), "html", null, true);
            echo "\" style=\"height:25px;width:25px;\" class=\"img-circle img-polaroid\">
                            </div>
                            <div class=\"media-body\">
                                <p><a href=\"";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "link_profil"), "html", null, true);
            echo "\"><b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "login"), "nama"), "html", null, true);
            echo "</b></a>, <small>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "tgl_posting"), "d F Y"), "html", null, true);
            echo "</small> | <b><a href=\"";
            echo twig_escape_filter($this->env, site_url(("materi/detail/" . $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "materi"), "id"))), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "materi"), "judul"), "html", null, true);
            echo "</a></b></p>
                                ";
            // line 50
            echo call_user_func_array($this->env->getFilter('raw_youtube')->getCallable(), array($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "konten")));
            echo "
                            </div>
                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "            </tbody>
        </table>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-komentar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 56,  116 => 50,  104 => 49,  98 => 46,  88 => 39,  84 => 37,  80 => 36,  67 => 26,  60 => 21,  57 => 20,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
