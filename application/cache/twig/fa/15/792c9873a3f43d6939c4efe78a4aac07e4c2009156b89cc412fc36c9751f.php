<?php

/* admin_materi/read.html */
class __TwigTemplate_fa15792c9873a3f43d6939c4efe78a4aac07e4c2009156b89cc412fc36c9751f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-read.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-read.html";
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
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "kelas"), "nama"), "html", null, true);
            echo "</b> </li>
            <li>Diposting oleh <a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "pembuat"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "pembuat"), "nama"), "html", null, true);
            echo "</a></li>
            <li>";
            // line 13
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "tgl_posting")), "html", null, true);
            echo "</li>
        </ul>
        ";
        }
        // line 16
        echo "        
        <hr class=\"hr-top\">
        <div class=\"wrap-content\">
            <div class=\"content\">
                ";
        // line 20
        if ((!array_key_exists("error", $context))) {
            // line 21
            echo "                    ";
            if (((isset($context["type"]) ? $context["type"] : null) == "tertulis")) {
                // line 22
                echo "                        ";
                echo html_entity_decode($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "konten"));
                echo "
                    ";
            } elseif (((isset($context["type"]) ? $context["type"] : null) == "file")) {
                // line 24
                echo "                        <dl class=\"dl-horizontal\">
                            <dt>Name</dt>
                            <dd>";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "name"), "html", null, true);
                echo "</dd>
                            <dt>Size</dt>
                            <dd>";
                // line 28
                echo twig_escape_filter($this->env, byte_format($this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "size")), "html", null, true);
                echo "</dd>
                            <dt>Modified</dt>
                            <dd>";
                // line 30
                echo twig_escape_filter($this->env, tgl_jam_indo(mdate("%Y-%m-%d %H:%i:%s", $this->getAttribute((isset($context["materifile_info"]) ? $context["materifile_info"] : null), "date"))), "html", null, true);
                echo "</dd>
                            <dt>Mime</dt>
                            <dd>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["materi"]) ? $context["materi"] : null), "file_info"), "mime"), "html", null, true);
                echo "</dd>
                        </dl>
                    ";
            }
            // line 35
            echo "                ";
        } else {
            // line 36
            echo "                    <div class=\"alert alert-danger\">
                        <h3>";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</h3>
                    </div>
                ";
        }
        // line 40
        echo "            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_materi/read.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 40,  117 => 37,  114 => 36,  111 => 35,  105 => 32,  100 => 30,  95 => 28,  90 => 26,  86 => 24,  80 => 22,  77 => 21,  75 => 20,  69 => 16,  63 => 13,  57 => 12,  51 => 11,  48 => 10,  46 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,);
    }
}
