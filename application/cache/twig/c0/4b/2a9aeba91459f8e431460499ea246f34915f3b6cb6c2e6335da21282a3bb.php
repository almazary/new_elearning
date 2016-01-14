<?php

/* get-plugin.html */
class __TwigTemplate_c04b2a9aeba91459f8e431460499ea246f34915f3b6cb6c2e6335da21282a3bb extends Twig_Template
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
        <h3>Plugins</h3>
    </div>
    <div class=\"module-body\">
        <table class=\"table datatable\">
        <thead>
            <tr>
                <th>Plugin Info</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["plugins"]) ? $context["plugins"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["p"]) {
            // line 18
            echo "        <tr>
            <td>
                <div class=\"media\">
                    <a class=\"pull-left\" href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "link_detail"), "html", null, true);
            echo "\" target=\"_blank\">
                        <img src=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "icon"), "html", null, true);
            echo "\" style=\"width: 64px; height: 64px;\" alt=\"icon\" class=\"media-object\">
                    </a>
                    <div class=\"media-body\">
                        <h4 class=\"media-heading\">";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "nama"), "html", null, true);
            echo "</h4>
                        ";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "deskripsi"), "html", null, true);
            echo "
                        <p>
                        <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">

                            ";
            // line 30
            if (plugin_installed($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "dir_name"))) {
                // line 31
                echo "                            <li><span class=\"text-success\"><i class=\"icon icon-ok\"></i> Plugin terpasang</span></li>
                            ";
            }
            // line 33
            echo "                            <li>Pembuat: <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "author_link"), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "author"), "html", null, true);
            echo "</a></li>
                        </ul>
                        </p>
                    </div>
                </div>
            </td>
            <td>
                <p><b>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "labelharga"), "html", null, true);
            echo "</b></p>
                <div class=\"btn-group\">
                    <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "link_detail"), "html", null, true);
            echo "\" class=\"btn btn-primary\" target=\"_blank\"><i class=\"icon icon-zoom-in\"></i> Detail Plugin</a>
                </div>
            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "        </tbody>
        </table>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "get-plugin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 47,  100 => 42,  95 => 40,  82 => 33,  78 => 31,  76 => 30,  69 => 26,  65 => 25,  59 => 22,  55 => 21,  50 => 18,  46 => 17,  31 => 4,  28 => 3,);
    }
}
