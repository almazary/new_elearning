<?php

/* admin_materi/detail.html */
class __TwigTemplate_1346a11eb48e96b832e9ede5c2e8148879922051982e674bbb95494e8d976640 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-detail-materi.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-detail-materi.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul"), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <h1 class=\"title\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul"), "html", null, true);
        echo "</h1>
        ";
        // line 9
        if ((!array_key_exists("error", $context))) {
            // line 10
            echo "        <ul class=\"unstyled inline ul-top\">
            <li><b class=\"title-info\">";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "mapel"), "nama"), "html", null, true);
            echo "</b> </li>
            ";
            // line 12
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "materi_kelas"));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 13
                echo "                <li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "nama"), "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "            <li>Diposting oleh <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "pembuat"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "pembuat"), "nama"), "html", null, true);
            echo "</a></li>
            <li>";
            // line 16
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "tgl_posting")), "html", null, true);
            echo "</li>
        </ul>
        ";
        }
        // line 19
        echo "        
        <hr class=\"hr-top\">
        <div class=\"wrap-content\">
            <div class=\"content\">
                ";
        // line 23
        if ((!array_key_exists("error", $context))) {
            // line 24
            echo "                    ";
            if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
                // line 25
                echo "                        ";
                echo html_entity_decode($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "konten"));
                echo "
                    ";
            } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
                // line 27
                echo "                        <dl class=\"dl-horizontal\">
                            <dt>Name</dt>
                            <dd>";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "name"), "html", null, true);
                echo "</dd>
                            <dt>Size</dt>
                            <dd>";
                // line 31
                echo twig_escape_filter($this->env, byte_format($this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "size")), "html", null, true);
                echo "</dd>
                            <dt>Modified</dt>
                            <dd>";
                // line 33
                echo twig_escape_filter($this->env, tgl_jam_indo(mdate("%Y-%m-%d %H:%i:%s", $this->getAttribute((isset($context["materifile_info"]) ? $context["materifile_info"] : null), "date"))), "html", null, true);
                echo "</dd>
                            <dt>Mime</dt>
                            <dd>";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "mime"), "html", null, true);
                echo "</dd>
                            <dt></dt>
                            <dd><br><a href=\"";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "download_link"), "html", null, true);
                echo "\" class=\"btn btn-warning\"><i class=\"icon-download\"></i> Download File</a></dd>
                        </dl>
                    ";
            }
            // line 40
            echo "                ";
        } else {
            // line 41
            echo "                    <div class=\"alert alert-danger\">
                        <h3>";
            // line 42
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</h3>
                    </div>
                ";
        }
        // line 45
        echo "            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_materi/detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 45,  134 => 42,  131 => 41,  128 => 40,  122 => 37,  117 => 35,  112 => 33,  107 => 31,  102 => 29,  98 => 27,  92 => 25,  89 => 24,  87 => 23,  81 => 19,  75 => 16,  68 => 15,  59 => 13,  55 => 12,  51 => 11,  48 => 10,  46 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,);
    }
}
