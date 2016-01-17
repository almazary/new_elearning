<?php

/* copy-bank-soal.html */
class __TwigTemplate_f11fd7fe2ecbd8a82ee57303639e68c668baaad5bc64dc44a9f00efe49caca2c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-iframe.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
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
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Tugas - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<style type=\"text/css\">
    .box-area-pertanyaan {
        padding: 15px;
        background-color: #F6F6F6;
        border-radius: 3px;
    }
    .box-pilihan {
        padding: 5px 15px;
        background-color: #fafafa;
        border-radius: 3px;
    }
</style>
";
    }

    // line 22
    public function block_content($context, array $blocks = array())
    {
        // line 23
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Bank Soal</h3>
    </div>
    <div class=\"module-body\">
        <div class=\"bs-callout bs-callout-info\" style=\"padding-bottom: 0px;\">
            <form method=\"post\" action=\"";
        // line 29
        echo twig_escape_filter($this->env, site_url(("plugins/bank_soal/search/" . (isset($context["tugas_id_iframe_copy"]) ? $context["tugas_id_iframe_copy"] : null))), "html", null, true);
        echo "\">
                <select name=\"mapel_id\" class=\"form-control\">
                    <option value=\"all\">Semua Matapelajaran</option>
                    ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 33
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" ";
            echo ((((isset($context["mapel_id"]) ? $context["mapel_id"] : null) == $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"))) ? ("selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "                </select>
                <input type=\"text\" name=\"q\" placeholder=\"cari soal...\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["keyword"]) ? $context["keyword"] : null), "html", null, true);
        echo "\">
                <button type=\"submit\" class=\"btn btn-primary\" style=\"margin-top:-10px;\"><i class=\"icon-search\"></i></button>
            </form>
        </div>
        <br>
        ";
        // line 41
        echo get_flashdata("bank");
        echo "

        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"5%\">ID</th>
                    <th>Pertanyaan</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pertanyaan"]) ? $context["pertanyaan"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 53
            echo "                <tr>
                    <td><b>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "</b></td>
                    <td>
                        ";
            // line 56
            echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan")));
            echo "

                        ";
            // line 58
            if ((!twig_test_empty($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci")))) {
                // line 59
                echo "                        <table class=\"table table-condensed\" style=\"margin-bottom: 10px;margin-top:10px;\">
                            <tr>
                                <td width=\"5%\"><b>A</b></td>
                                <td>
                                    ";
                // line 63
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_a")));
                echo "
                                    ";
                // line 64
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "a")) {
                    // line 65
                    echo "                                    <div style=\"display:block;\"><span class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci jawaban</span></div>
                                    ";
                }
                // line 67
                echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>B</b></td>
                                <td>
                                    ";
                // line 72
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_b")));
                echo "
                                    ";
                // line 73
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "b")) {
                    // line 74
                    echo "                                    <div style=\"display:block;\"><span class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci jawaban</span></div>
                                    ";
                }
                // line 76
                echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>C</b></td>
                                <td>
                                    ";
                // line 81
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_c")));
                echo "
                                    ";
                // line 82
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "c")) {
                    // line 83
                    echo "                                    <div style=\"display:block;\"><span class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci jawaban</span></div>
                                    ";
                }
                // line 85
                echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>D</b></td>
                                <td>
                                    ";
                // line 90
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_d")));
                echo "
                                    ";
                // line 91
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "d")) {
                    // line 92
                    echo "                                    <div style=\"display:block;\"><span class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci jawaban</span></div>
                                    ";
                }
                // line 94
                echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>E</b></td>
                                <td>
                                    ";
                // line 99
                echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan_e")));
                echo "
                                    ";
                // line 100
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "kunci") == "e")) {
                    // line 101
                    echo "                                    <div style=\"display:block;\"><span class=\"text-warning\"><i class=\"icon icon-star\"></i> Kunci jawaban</span></div>
                                    ";
                }
                // line 103
                echo "                                </td>
                            </tr>
                        </table>
                        ";
            }
            // line 107
            echo "                        <div style=\"display:block;\"><b>Pembuat: </b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "user"), "nama"), "html", null, true);
            echo ", <b>Matapelajaran: </b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "mapel"), "nama"), "html", null, true);
            echo "</div>
                    </td>
                    <td>
                        <div class=\"btn-group\">
                            <a href=\"";
            // line 111
            echo twig_escape_filter($this->env, site_url(((("plugins/bank_soal/do_copy_soal_bank/" . (isset($context["tugas_id_iframe_copy"]) ? $context["tugas_id_iframe_copy"] : null)) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"))), "html", null, true);
            echo "\" class=\"btn btn-small btn-primary\"><i class=\"icon icon-share-alt\"></i> Copy</a>
                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo "            </tbody>
        </table>
        <br>
        ";
        // line 119
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "copy-bank-soal.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 119,  248 => 116,  237 => 111,  227 => 107,  221 => 103,  217 => 101,  215 => 100,  211 => 99,  204 => 94,  200 => 92,  198 => 91,  194 => 90,  187 => 85,  183 => 83,  181 => 82,  177 => 81,  170 => 76,  166 => 74,  164 => 73,  160 => 72,  153 => 67,  149 => 65,  147 => 64,  143 => 63,  137 => 59,  135 => 58,  130 => 56,  125 => 54,  122 => 53,  118 => 52,  104 => 41,  96 => 36,  93 => 35,  80 => 33,  76 => 32,  70 => 29,  62 => 23,  59 => 22,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
