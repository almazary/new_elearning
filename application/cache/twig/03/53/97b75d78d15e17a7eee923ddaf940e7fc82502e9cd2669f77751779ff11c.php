<?php

/* list-komentar-laporan.html */
class __TwigTemplate_035397b75d78d15e17a7eee923ddaf940e7fc82502e9cd2669f77751779ff11c extends Twig_Template
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
        echo "Laporan Komentar Materi - ";
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
        <h3>Laporan Komentar Materi</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 26
        echo get_flashdata("komentar");
        echo "

        <div class=\"btn-group\">
            <a href=\"";
        // line 29
        echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
        echo "\" class=\"btn btn-sm btn-default\">Semua</a>
            <a href=\"";
        // line 30
        echo twig_escape_filter($this->env, site_url("materi/komentar/laporan"), "html", null, true);
        echo "\" class=\"btn btn-sm btn-primary\">Laporan (";
        echo twig_escape_filter($this->env, count((isset($context["laporan"]) ? $context["laporan"] : null)), "html", null, true);
        echo ")</a>
        </div>
        <br><br>

        <table class=\"table table-striped datatable\">
            <thead>
                <tr>
                    <th>Komentar</th>
                    <th width=\"30%\">Laporan</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["laporan"]) ? $context["laporan"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 43
            echo "                <tr>
                    <td>
                        <div class=\"media\">
                            <div class=\"pull-left\">
                                <img src=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "komentar"), "login"), "link_image"), "html", null, true);
            echo "\" style=\"height:25px;width:25px;\" class=\"img-circle img-polaroid\">
                            </div>
                            <div class=\"media-body\">
                                <p><a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "komentar"), "login"), "link_profil"), "html", null, true);
            echo "\"><b>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "komentar"), "login"), "nama"), "html", null, true);
            echo "</b></a>, <small>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "komentar"), "tgl_posting"), "d F Y"), "html", null, true);
            echo "</small> | <b><a href=\"";
            echo twig_escape_filter($this->env, site_url(("materi/detail/" . $this->getAttribute($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "materi"), "id"))), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "materi"), "judul"), "html", null, true);
            echo "</a></b></p>
                                ";
            // line 51
            echo call_user_func_array($this->env->getFilter('raw_media')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "komentar"), "konten")));
            echo "
                            </div>
                        </div>
                    </td>
                    <td>
                        ";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "alasan"), "html", null, true);
            echo "
                        <br>
                        <b>Pelapor : </b> <a href=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "login"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "login"), "nama"), "html", null, true);
            echo "</a>
                        <br>
                        <b>Tgl. Lapor : </b> ";
            // line 60
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "tgl_lapor"), "d F Y"), "html", null, true);
            echo "
                        <p>
                        <div class=\"btn-group\">
                            <a class=\"btn btn-success\" href=\"";
            // line 63
            echo twig_escape_filter($this->env, site_url(("materi/komentar/laporan/?act=1&id=" . $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin akan menghapus komentar & laporan?')\">Hapus Komentar</a>
                            <a class=\"btn btn-success\" href=\"";
            // line 64
            echo twig_escape_filter($this->env, site_url(("materi/komentar/laporan/?act=2&id=" . $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin hanya menghapus laporan?')\">Hapus Laporan</a>
                        </div>
                        </p>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "            </tbody>
        </table>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-komentar-laporan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 70,  152 => 64,  148 => 63,  142 => 60,  135 => 58,  130 => 56,  122 => 51,  110 => 50,  104 => 47,  98 => 43,  94 => 42,  77 => 30,  73 => 29,  67 => 26,  60 => 21,  57 => 20,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
