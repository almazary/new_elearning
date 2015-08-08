<?php

/* ujian-online.html */
class __TwigTemplate_05a64897fee5bb54ea9e06f4fbb16f094fd9ff8bbf56322c850a937526ded41c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-detail-materi.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo " - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<style type=\"text/css\">
    #clock {
        font-size: 25px;
        margin-top: 5px;
        font-weight: bold;
        text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.2);
    }
    .clock-info {
        font-weight: normal;
    }
    img.nav-avatar {
        width: 30px;
        height: 30px;
    }
    ul.user-info {
        margin-top: 10px;
        margin-bottom: 0px;
    }
    input.radio{
        margin-top: -3px;
    }
    .label-radio {
        font-weight: bold;
    }
    .well {
        border:2px dashed red;
    }
    .p-info {
        font-size: 18px;
    }
    .box-clock {
        background: rgb(245, 239, 230);
        border:1px dashed red;
        padding: 5px 10px 10px;
        border-radius: 5px;
    }
</style>
";
    }

    // line 47
    public function block_content($context, array $blocks = array())
    {
        // line 48
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <div class=\"row-fluid\">
            <div class=\"span9\">
                <h1 class=\"title\">";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo "</h1>
            </div>
            <div class=\"span3\">
                <ul class=\"unstyled inline pull-right user-info\">
                    <li><b>";
        // line 56
        echo twig_escape_filter($this->env, nama_panggilan(get_sess_data("user", "nama")), "html", null, true);
        echo "</b></li>
                    <li><img src=\"";
        // line 57
        echo twig_escape_filter($this->env, get_url_image_pengajar(get_sess_data("user", "foto"), "medium", get_sess_data("user", "jenis_kelamin")), "html", null, true);
        echo "\" class=\"nav-avatar img-polaroid img-circle\" /></li>
                </ul>
            </div>
        </div>
        <hr class=\"hr-top\">
        <div class=\"wrap-content\">
            <div class=\"content\">
                <div class=\"row-fluid\">
                    <div class=\"span8\">
                        <b>Informasi : </b><br>
                        ";
        // line 67
        echo $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "info");
        echo "
                    </div>
                    <div class=\"span4\">
                        <div class=\"box-clock\" data-spy=\"affix\" data-offset-top=\"60\" data-offset-bottom=\"200\">
                            <b>Siswa waktu : </b><br>
                            <div id=\"clock\"></div>
                        </div>
                    </div>
                </div>

                <table class=\"table\">
                    <thead>
                        <tr>
                            <th width=\"5%\">No</th>
                            <th>Pertanyaan ";
        // line 81
        echo ((($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) ? (" dan Pilihan") : (""));
        echo "</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 85
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "pertanyaan"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 86
            echo "                        <tr id=\"pertanyaan-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
            echo "\">
                            <td><b>";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "urutan"), "html", null, true);
            echo ".</b></td>
                            <td>
                                <div class=\"pertanyaan\">
                                    ";
            // line 90
            echo html_entity_decode($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pertanyaan"));
            echo "
                                </div>

                                ";
            // line 93
            if (($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "type_id") == 3)) {
                // line 94
                echo "                                <div id=\"pilihan-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                echo "\">
                                    <table class=\"table table-condensed table-striped\">
                                        <tbody>
                                            ";
                // line 97
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "pilihan"));
                foreach ($context['_seq'] as $context["_key"] => $context["pil"]) {
                    // line 98
                    echo "                                            <tr>
                                                <td width=\"5%\"><label class=\"label-radio\"><input ";
                    // line 99
                    echo ((is_pilih($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "jawaban"), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id"))) ? ("checked") : (""));
                    echo " type=\"radio\" name=\"pilihan-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan"), "html", null, true);
                    echo "\" onclick=\"update_ganda(";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id"), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "id"), "html", null, true);
                    echo ")\" class=\"radio\"> ";
                    echo twig_escape_filter($this->env, get_abjad($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "urutan")), "html", null, true);
                    echo "</label></td>
                                                <td>
                                                    ";
                    // line 101
                    echo html_entity_decode($this->getAttribute((isset($context["pil"]) ? $context["pil"] : null), "konten"));
                    echo "
                                                </td>
                                            </tr>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pil'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 105
                echo "                                        </tbody>
                                    </table>
                                </div>
                                ";
            }
            // line 109
            echo "
                            </td>
                        </tr>

                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "                    </tbody>
                </table>

                <div class=\"well well-sm\">
                    <a class=\"btn btn-large btn-primary pull-right\" href=\"";
        // line 118
        echo twig_escape_filter($this->env, site_url(((("tugas/finish/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id"))), "html", null, true);
        echo "\" onclick=\"return confirm('Anda yakin ingin mengahiri pengerjaan tugas ini?')\">Selesai</a>
                    <p class=\"p-info\">Mohon periksa kembali jawaban anda sebelum menekan tombol <b>selesai</b>.</p>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<input type=\"hidden\" id=\"final_date\" value=\"";
        // line 126
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "selesai"), "html", null, true);
        echo "\">
<input type=\"hidden\" id=\"finish_url\" value=\"";
        // line 127
        echo twig_escape_filter($this->env, site_url(((("tugas/finish/" . $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "id")) . "/") . $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "unix_id"))), "html", null, true);
        echo "\">
";
    }

    public function getTemplateName()
    {
        return "ujian-online.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 127,  239 => 126,  228 => 118,  222 => 114,  212 => 109,  206 => 105,  196 => 101,  179 => 99,  176 => 98,  172 => 97,  165 => 94,  163 => 93,  157 => 90,  151 => 87,  146 => 86,  142 => 85,  135 => 81,  118 => 67,  105 => 57,  101 => 56,  94 => 52,  88 => 48,  85 => 47,  44 => 8,  41 => 7,  33 => 4,  30 => 3,);
    }
}
