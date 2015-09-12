<?php

/* copy-pertanyaan.html */
class __TwigTemplate_8ba0453f8b8dd0525f3ee85dd9ca0d848d889bd5aeb176b2ac7e30bd8d580b59 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-iframe.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-iframe.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<h4>Copy Pertanyaan</h4>
<hr style=\"margin-top: 5px; margin-bottom: 10px;\">
";
        // line 6
        echo get_flashdata("copy");
        echo "

<table class=\"table table-striped datatable\">
    <thead>
        <tr>
            <th width=\"8%\">ID</th>
            <th>Pertanyaan</th>
            <th width=\"10%\"></th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 18
            echo "        <tr>
            <td><b>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "</b></td>
            <td>
                ";
            // line 21
            echo html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan"));
            echo "

                ";
            // line 23
            if ((!twig_test_empty($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan")))) {
                // line 24
                echo "                <table class=\"table table-condensed table-striped\">
                    <tbody>
                        ";
                // line 26
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                    // line 27
                    echo "                        <tr ";
                    echo ((($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 1)) ? ("class=\"success\"") : (""));
                    echo ">
                            <td width=\"3%\"><b>(";
                    // line 28
                    echo twig_escape_filter($this->env, get_abjad($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan")), "html", null, true);
                    echo ")</b></td>
                            <td>
                                ";
                    // line 30
                    echo html_entity_decode($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten"));
                    echo "

                                ";
                    // line 32
                    if (($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "kunci") == 1)) {
                        // line 33
                        echo "                                <b class=\"text-warning\"><i class=\"icon-star\"></i> Kunci Jawaban</b>
                                ";
                    }
                    // line 35
                    echo "                            </td>
                        </tr>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pil'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "                    </tbody>
                </table>
                ";
            }
            // line 41
            echo "
                <div style=\"padding: 5px 5px; border:1px dashed #DDD; background-color: white;\">
                    <ul class=\"unstyled inline\" style=\"margin-bottom: 3px;margin-top: 0px;\">
                        <li>Dibuat oleh : <a href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "info_pembuat"), "link_profil"), "html", null, true);
            echo "\" id=\"profil-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "info_pembuat"), "id"), "html", null, true);
            echo "\" target=\"_tab\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "info_pembuat"), "nama"), "html", null, true);
            echo "</a></li>
                        <li>Pada : ";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "info_tugas"), "judul"), "html", null, true);
            echo "</li>
                    </ul>
                </div>
            </td>
            <td>
                <a class=\"btn btn-sm btn-primary\" href=\"";
            // line 50
            echo twig_escape_filter($this->env, site_url(((("tugas/copy_soal/" . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")) . "/?copy=") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
            echo "\">Copy</a>
            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "copy-pertanyaan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 54,  131 => 50,  123 => 45,  115 => 44,  110 => 41,  105 => 38,  97 => 35,  93 => 33,  91 => 32,  86 => 30,  81 => 28,  76 => 27,  72 => 26,  68 => 24,  66 => 23,  61 => 21,  56 => 19,  53 => 18,  49 => 17,  35 => 6,  31 => 4,  28 => 3,);
    }
}
