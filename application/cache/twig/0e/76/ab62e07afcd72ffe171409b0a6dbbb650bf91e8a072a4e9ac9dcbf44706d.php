<?php

/* list-inbox.html */
class __TwigTemplate_0e76ab62e07afcd72ffe171409b0a6dbbb650bf91e8a072a4e9ac9dcbf44706d extends Twig_Template
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
        echo "Manajemen Kelas - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module message\">
    <div class=\"module-head\">
        <h3>Pesan</h3>
    </div>
    <div class=\"module-body\">
        <div class=\"module-option clearfix\">
            ";
        // line 14
        echo get_flashdata("msg");
        echo "

            <div class=\"pull-left\">
                <div class=\"btn-group\">
                    <button class=\"btn\">
                        Inbox</button>
                    <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">
                    <span class=\"caret\"></span>
                    </button>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"#\">Inbox (";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["count_unread"]) ? $context["count_unread"] : null), "html", null, true);
        echo ")</a></li>
                        <li><a href=\"#\">Outbox </a></li>
                    </ul>
                </div>
            </div>
            <div class=\"pull-right\">
                <a href=\"";
        // line 30
        echo twig_escape_filter($this->env, site_url("message/create/"), "html", null, true);
        echo "\" class=\"btn btn-primary\"><i class=\"icon-pencil\"></i> Tulis pesan</a>
            </div>
        </div>
        <div class=\"module-body table\">
            <table class=\"table table-message\">
                <tbody>
                    <tr class=\"heading\">
                        <td class=\"cell-check\">
                            <input type=\"checkbox\" class=\"inbox-checkbox\">
                        </td>
                        <td class=\"cell-author hidden-phone hidden-tablet\">
                            Pengirim
                        </td>
                        <td class=\"cell-title\">
                            Pesan
                        </td>
                        <td class=\"cell-time align-right\">
                            Tanggal
                        </td>
                    </tr>
                    ";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["inbox"]) ? $context["inbox"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 51
            echo "                    <tr class=\"";
            echo ((($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "opened") == 0)) ? ("unread") : (""));
            echo " clickable-row\" data-href=\"";
            echo twig_escape_filter($this->env, site_url(((("message/detail/" . $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id")) . "#msg-") . $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id"))), "html", null, true);
            echo "\">
                        <td class=\"cell-check\">
                            <input type=\"checkbox\" class=\"inbox-checkbox\">
                        </td>
                        <td class=\"cell-author hidden-phone hidden-tablet\">
                            <a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "sender"), "profil"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "sender"), "profil"), "nama"), "html", null, true);
            echo "</a>
                        </td>
                        <td class=\"cell-title\">
                            ";
            // line 59
            echo twig_escape_filter($this->env, ellipsize($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "content"), "32", ".5"), "html", null, true);
            echo "
                        </td>
                        <td class=\"cell-time align-right\">
                            ";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "date"), "html", null, true);
            echo "
                        </td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "
                </tbody>
            </table>
        </div>
        <div class=\"module-foot\">
            ";
        // line 71
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
        </div>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-inbox.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 71,  134 => 66,  124 => 62,  118 => 59,  110 => 56,  99 => 51,  95 => 50,  72 => 30,  63 => 24,  50 => 14,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
