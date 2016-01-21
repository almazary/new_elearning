<?php

/* list-link-terkait.html */
class __TwigTemplate_7894664a4fb5a138219e931317de341666d30b22d78e13921abf49852e320855 extends Twig_Template
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
        echo "Link Terkait - ";
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
        <h3>Link Terkait</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("link");
        echo "

        ";
        // line 15
        if (is_admin()) {
            // line 16
            echo "            ";
            if (((isset($context["mode"]) ? $context["mode"] : null) == "add")) {
                // line 17
                echo "            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    Tambah Link Terkait
                </div>
                <div class=\"panel-body\">
                    <form action=\"";
                // line 22
                echo twig_escape_filter($this->env, site_url("plugins/link_terkait/index"), "html", null, true);
                echo "\" method=\"post\" accept-charset=\"utf-8\" class=\"form-horizontal row-fluid\">
                        <div class=\"control-group\">
                            <label class=\"control-label\">Url <span class=\"text-error\">*</span></label>
                            <div class=\"controls\">
                                <input name=\"url\" class=\"span8\" value=\"";
                // line 26
                echo twig_escape_filter($this->env, set_value("url"), "html", null, true);
                echo "\" type=\"text\">
                                ";
                // line 27
                echo form_error("url");
                echo "
                            </div>
                        </div>
                        <div class=\"control-group\">
                            <label class=\"control-label\">Label</label>
                            <div class=\"controls\">
                                <input name=\"label\" class=\"span8\" value=\"";
                // line 33
                echo twig_escape_filter($this->env, set_value("label"), "html", null, true);
                echo "\" type=\"text\">
                            </div>
                        </div>
                        <div class=\"control-group\">
                            <div class=\"controls\">
                                <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            ";
            }
            // line 45
            echo "
            ";
            // line 46
            if (((isset($context["mode"]) ? $context["mode"] : null) == "edit")) {
                // line 47
                echo "            <div class=\"panel panel-info\">
                <div class=\"panel-heading\">
                    Edit Link Terkait
                </div>
                <div class=\"panel-body\">
                    <form action=\"";
                // line 52
                echo twig_escape_filter($this->env, site_url(("plugins/link_terkait/index/edit/" . (isset($context["key"]) ? $context["key"] : null))), "html", null, true);
                echo "\" method=\"post\" accept-charset=\"utf-8\" class=\"form-horizontal row-fluid\">
                        <div class=\"control-group\">
                            <label class=\"control-label\">Url <span class=\"text-error\">*</span></label>
                            <div class=\"controls\">
                                <input name=\"url\" class=\"span8\" value=\"";
                // line 56
                echo twig_escape_filter($this->env, set_value("url", $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "link")), "html", null, true);
                echo "\" type=\"text\">
                                ";
                // line 57
                echo form_error("url");
                echo "
                            </div>
                        </div>
                        <div class=\"control-group\">
                            <label class=\"control-label\">Label</label>
                            <div class=\"controls\">
                                <input name=\"label\" class=\"span8\" value=\"";
                // line 63
                echo twig_escape_filter($this->env, set_value("label", $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "label")), "html", null, true);
                echo "\" type=\"text\">
                            </div>
                        </div>
                        <div class=\"control-group\">
                            <div class=\"controls\">
                                <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                                <a class=\"btn btn-default\" href=\"";
                // line 69
                echo twig_escape_filter($this->env, site_url("plugins/link_terkait"), "html", null, true);
                echo "\">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            ";
            }
            // line 76
            echo "
            <table class=\"table table-striped\">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Link</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 86
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["l"]) {
                // line 87
                echo "                    <tr>
                        <td>";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
                echo ".</td>
                        <td><a target=\"_blank\" href=\"";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "link"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (((!twig_test_empty($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "label")))) ? ($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "label")) : ($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "link"))), "html", null, true);
                echo "</a></td>
                        <td>
                            <div class=\"btn-group\">
                                <a class=\"btn btn-small btn-default\" href=\"";
                // line 92
                echo twig_escape_filter($this->env, site_url(("plugins/link_terkait/index/edit/" . (isset($context["key"]) ? $context["key"] : null))), "html", null, true);
                echo "\">Edit</a>
                                <a class=\"btn btn-small btn-default\" href=\"";
                // line 93
                echo twig_escape_filter($this->env, site_url(("plugins/link_terkait/index/delete/" . (isset($context["key"]) ? $context["key"] : null))), "html", null, true);
                echo "\" onclick=\"return confirm('Anda yakin ingin menghapus?')\">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            echo "                </tbody>
            </table>

        ";
        } else {
            // line 102
            echo "
            <table class=\"table table-striped table-condensed\">
                <tbody>
                    ";
            // line 105
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["l"]) {
                // line 106
                echo "                    <tr>
                        <td width=\"5%\">";
                // line 107
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
                echo ".</td>
                        <td><a target=\"_blank\" href=\"";
                // line 108
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "link"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (((!twig_test_empty($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "label")))) ? ($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "label")) : ($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "link"))), "html", null, true);
                echo "</a></td>
                    </tr>
                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 111
            echo "                </tbody>
            </table>

        ";
        }
        // line 115
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-link-terkait.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  279 => 115,  273 => 111,  254 => 108,  250 => 107,  247 => 106,  230 => 105,  225 => 102,  219 => 98,  200 => 93,  196 => 92,  188 => 89,  184 => 88,  181 => 87,  164 => 86,  152 => 76,  142 => 69,  133 => 63,  124 => 57,  120 => 56,  113 => 52,  106 => 47,  104 => 46,  101 => 45,  86 => 33,  77 => 27,  73 => 26,  66 => 22,  59 => 17,  56 => 16,  54 => 15,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
