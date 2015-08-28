<?php

/* detail-pesan.html */
class __TwigTemplate_4409d83e7bf14b54192c22f7dbfcdca4c07e33344cb30d5e515e720c695ac3be extends Twig_Template
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
        echo "Detail Percakapan - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<style type=\"text/css\">
    .msg-active {
        border:1px solid #DDD; padding: 5px 10px;border-radius: 2px; background-color: #fbfbfb;
        margin-bottom: 10px;
    }
    .hr-msg {
        margin-top: 5px;margin-bottom: 5px;border:none;
    }
</style>
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 22
        echo anchor("message", "Pesan");
        echo " / Detail Percakapan</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 25
        echo get_flashdata("msg");
        echo "

        <table class=\"table table-hover\">
            ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["old_related_msg"]) ? $context["old_related_msg"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 29
            echo "            <tr id=\"msg-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id"), "html", null, true);
            echo "\">
                <td style=\"width: 250px;\">
                    <img style=\"height:30px;width:30px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
            // line 31
            echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "foto"), "medium", $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "jenis_kelamin")), "html", null, true);
            echo "\">
                    <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, character_limiter($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "nama"), 23, "..."), "html", null, true);
            echo "</a>
                    <br><small>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "date"), "html", null, true);
            echo "</small>
                </td>
                <td bgcolor=\"#f5f5f5\">
                    <a class=\"pull-right\" style=\"margin-left:10px;\" href=\"";
            // line 36
            echo twig_escape_filter($this->env, site_url(((("message/del/" . $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id")) . "/") . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin ingin menghapus?')\"><i class=\"icon-trash\"></i></a>
                    ";
            // line 37
            echo $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "content");
            echo "
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "
            <tr id=\"msg-";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"), "html", null, true);
        echo "\">
                <td style=\"width: 250px;\">
                    <img style=\"height:30px;width:30px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
        // line 44
        echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "profil"), "foto"), "medium", $this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "profil"), "jenis_kelamin")), "html", null, true);
        echo "\">
                    <a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "profil"), "link_profil"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, character_limiter($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "profil"), "nama"), 23, "..."), "html", null, true);
        echo "</a>
                    <br><small>";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "date"), "html", null, true);
        echo "</small>
                </td>
                <td bgcolor=\"#f5f5f5\">
                    <a class=\"pull-right\" style=\"margin-left:10px;\" href=\"";
        // line 49
        echo twig_escape_filter($this->env, site_url(((("message/del/" . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id")) . "/") . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"))), "html", null, true);
        echo "\" onclick=\"return confirm('Anda yakin ingin menghapus?')\"><i class=\"icon-trash\"></i></a>
                    ";
        // line 50
        echo $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "content");
        echo "
                </td>
            </tr>

            ";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["new_related_msg"]) ? $context["new_related_msg"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 55
            echo "            <tr id=\"msg-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id"), "html", null, true);
            echo "\">
                <td style=\"width: 250px;\">
                    <img style=\"height:30px;width:30px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
            // line 57
            echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "profil"), "foto"), "medium", $this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "profil"), "jenis_kelamin")), "html", null, true);
            echo "\">
                    <a href=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "profil"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, character_limiter($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "profil"), "nama"), 23, "..."), "html", null, true);
            echo "</a>
                    <br><small>";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "date"), "html", null, true);
            echo "</small>
                </td>
                <td bgcolor=\"#f5f5f5\">
                    <a class=\"pull-right\" style=\"margin-left:10px;\" href=\"";
            // line 62
            echo twig_escape_filter($this->env, site_url(((("message/del/" . $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id")) . "/") . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin ingin menghapus?')\"><i class=\"icon-trash\"></i></a>
                    ";
            // line 63
            echo $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "content");
            echo "
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "        </table>

        <br>
        ";
        // line 70
        if (((isset($context["confirm_del_all"]) ? $context["confirm_del_all"] : null) == false)) {
            // line 71
            echo "        <div class=\"msg-active\">
            <b><i class=\"icon-reply\"></i> Balas Pesan</b>
            <hr class=\"hr-msg\">
            ";
            // line 74
            echo form_open_multipart(("message/create/" . $this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "login"), "id")), array("class" => "form-horizontal row-fluid"));
            echo "
                <input type=\"hidden\" name=\"penerima\" value=\"";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "login"), "profil"), "nama"), "html", null, true);
            echo " <";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "login"), "username"), "html", null, true);
            echo ">\">
                <textarea name=\"content\" id=\"content\" style=\"height:300px;width:100%;\">";
            // line 76
            echo set_value("content");
            echo "</textarea>
                ";
            // line 77
            echo form_error("content");
            echo "
                <br>
                <p><button class=\"btn btn-primary\">Kirim</button></p>
            ";
            // line 80
            echo form_close();
            echo "
        </div>
        ";
        }
        // line 83
        echo "
        ";
        // line 84
        if (((isset($context["confirm_del_all"]) ? $context["confirm_del_all"] : null) == true)) {
            // line 85
            echo "        <hr class=\"hr-msg\">
        <div id=\"confirm\" class=\"alert alert-block\">
            <div class=\"pull-right btn-group\" style=\"margin-top: -5px;\">
                <a class=\"btn btn-danger\" href=\"";
            // line 88
            echo twig_escape_filter($this->env, site_url(("message/del_all/" . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"))), "html", null, true);
            echo "\">Ya hapus</a>
                <a class=\"btn btn-primary\" href=\"";
            // line 89
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\">Batal</a>
            </div>
            <b>Anda yakin ingin menghapus percakapan ini?</b>
        </div>
        ";
        }
        // line 94
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "detail-pesan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  250 => 94,  242 => 89,  238 => 88,  233 => 85,  231 => 84,  228 => 83,  222 => 80,  216 => 77,  212 => 76,  206 => 75,  202 => 74,  197 => 71,  195 => 70,  190 => 67,  180 => 63,  176 => 62,  170 => 59,  164 => 58,  160 => 57,  154 => 55,  150 => 54,  143 => 50,  139 => 49,  133 => 46,  127 => 45,  123 => 44,  118 => 42,  115 => 41,  105 => 37,  101 => 36,  95 => 33,  89 => 32,  85 => 31,  79 => 29,  75 => 28,  69 => 25,  63 => 22,  59 => 20,  56 => 19,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
