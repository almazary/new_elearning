<?php

/* detail-materi.html */
class __TwigTemplate_29e7abeb6ab234c92e133b9be5c71e9d4a095ced90650a15dacb2b1805b19de7 extends Twig_Template
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
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul"), "html", null, true);
        echo " - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <h1 class=\"title\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "judul"), "html", null, true);
        echo "</h1>
        ";
        // line 11
        if ((!array_key_exists("error", $context))) {
            // line 12
            echo "        <ul class=\"unstyled inline ul-top\">
            <li><b class=\"title-info\">";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "mapel"), "nama"), "html", null, true);
            echo "</b>,</li>
            ";
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "materi_kelas"));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 15
                echo "                <li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "nama"), "html", null, true);
                echo ",</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "            <li>Diposting oleh <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "pembuat"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "pembuat"), "nama"), "html", null, true);
            echo "</a></li>
            <li>";
            // line 18
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "tgl_posting")), "html", null, true);
            echo ",</li>
            <li>";
            // line 19
            echo ((((isset($context["type"]) ? $context["type"] : null) == "tertulis")) ? ("Dibaca") : ("Diunduh"));
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "views"), "html", null, true);
            echo " Kali</li>
        </ul>
        ";
        }
        // line 22
        echo "        
        <hr class=\"hr-top\">
        <div class=\"wrap-content\">
            <div class=\"content\">
                ";
        // line 26
        if ((!array_key_exists("error", $context))) {
            // line 27
            echo "                    ";
            if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
                // line 28
                echo "                        ";
                echo html_entity_decode($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "konten"));
                echo "
                    ";
            } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
                // line 30
                echo "                        <dl class=\"dl-horizontal\">
                            <dt>Name</dt>
                            <dd>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "name"), "html", null, true);
                echo "</dd>
                            <dt>Size</dt>
                            <dd>";
                // line 34
                echo twig_escape_filter($this->env, byte_format($this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "size")), "html", null, true);
                echo "</dd>
                            <dt>Modified</dt>
                            <dd>";
                // line 36
                echo twig_escape_filter($this->env, tgl_jam_indo(mdate("%Y-%m-%d %H:%i:%s", $this->getAttribute((isset($context["materifile_info"]) ? $context["materifile_info"] : null), "date"))), "html", null, true);
                echo "</dd>
                            <dt>Mime</dt>
                            <dd>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "mime"), "html", null, true);
                echo "</dd>
                            <dt></dt>
                            <dd><br><a href=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "download_link"), "html", null, true);
                echo "\" class=\"btn btn-warning\"><i class=\"icon-download\"></i> Download File</a></dd>
                        </dl>
                    ";
            }
            // line 43
            echo "                ";
        } else {
            // line 44
            echo "                    <div class=\"alert alert-danger\">
                        <h3>";
            // line 45
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</h3>
                    </div>
                ";
        }
        // line 48
        echo "            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "detail-materi.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 48,  145 => 45,  142 => 44,  139 => 43,  133 => 40,  128 => 38,  123 => 36,  118 => 34,  113 => 32,  109 => 30,  103 => 28,  100 => 27,  98 => 26,  92 => 22,  84 => 19,  80 => 18,  73 => 17,  64 => 15,  60 => 14,  56 => 13,  53 => 12,  51 => 11,  47 => 10,  43 => 8,  40 => 7,  32 => 4,  29 => 3,);
    }
}
