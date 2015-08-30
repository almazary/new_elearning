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
    .table tr td.user {
        width: 250px;
    }
    .table tr td.flag-new {
        border-left:3px solid #1793D2!important;
    }
    .table tr td.msg-content {
        background-color: #f5f5f5;
    }
    .table tr td.msg-content img, .table tr td.msg-content iframe {
        max-width: 520px;
    }
    img.img-user {
        height:30px;width:30px; margin-right: 10px;
    }
</style>
";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
        // line 35
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 37
        echo anchor("message", "Pesan");
        echo " / Detail Percakapan</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 40
        echo get_flashdata("msg");
        echo "

        <table class=\"table table-hover\" id=\"list-msg\">
            ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["old_related_msg"]) ? $context["old_related_msg"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 44
            echo "            <tr id=\"msg-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id"), "html", null, true);
            echo "\">
                <td class=\"user\">
                    <img class=\"img-user img-polaroid img-circle pull-left\" src=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "link_image"), "html", null, true);
            echo "\">
                    <a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, character_limiter($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "profil"), "nama"), 23, "..."), "html", null, true);
            echo "</a>
                    <br><small>";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "date"), "html", null, true);
            echo "</small>
                </td>
                <td class=\"msg-content\">
                    <a class=\"pull-right\" style=\"margin-left:10px;\" href=\"";
            // line 51
            echo twig_escape_filter($this->env, site_url(((("message/del/" . $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id")) . "/") . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin ingin menghapus?')\"><i class=\"icon-trash\"></i></a>
                    ";
            // line 52
            echo html_entity_decode($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "content"));
            echo "
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "
            <tr id=\"msg-";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"), "html", null, true);
        echo "\">
                <td class=\"user\">
                    <img class=\"img-user img-polaroid img-circle pull-left\" src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "profil"), "link_image"), "html", null, true);
        echo "\">
                    <a href=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "profil"), "link_profil"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, character_limiter($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "profil"), "nama"), 23, "..."), "html", null, true);
        echo "</a>
                    <br><small>";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "date"), "html", null, true);
        echo "</small>
                </td>
                <td class=\"msg-content\">
                    <a class=\"pull-right\" style=\"margin-left:10px;\" href=\"";
        // line 64
        echo twig_escape_filter($this->env, site_url(((("message/del/" . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id")) . "/") . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"))), "html", null, true);
        echo "\" onclick=\"return confirm('Anda yakin ingin menghapus?')\"><i class=\"icon-trash\"></i></a>
                    ";
        // line 65
        echo html_entity_decode($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "content"));
        echo "
                </td>
            </tr>

            ";
        // line 69
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["new_related_msg"]) ? $context["new_related_msg"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 70
            echo "            <tr id=\"msg-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id"), "html", null, true);
            echo "\">
                <td class=\"user\">
                    <img class=\"img-user img-polaroid img-circle pull-left\" src=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "profil"), "link_image"), "html", null, true);
            echo "\">
                    <a href=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "profil"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, character_limiter($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "profil"), "nama"), 23, "..."), "html", null, true);
            echo "</a>
                    <br><small>";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "date"), "html", null, true);
            echo "</small>
                </td>
                <td class=\"msg-content\">
                    <a class=\"pull-right\" style=\"margin-left:10px;\" href=\"";
            // line 77
            echo twig_escape_filter($this->env, site_url(((("message/del/" . $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id")) . "/") . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"))), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin ingin menghapus?')\"><i class=\"icon-trash\"></i></a>
                    ";
            // line 78
            echo html_entity_decode($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "content"));
            echo "
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "        </table>

        <br>
        ";
        // line 85
        if (((isset($context["confirm_del_all"]) ? $context["confirm_del_all"] : null) == false)) {
            // line 86
            echo "        <div class=\"msg-active\">
            <b><i class=\"icon-reply\"></i> Balas Pesan</b>
            <hr class=\"hr-msg\">
            ";
            // line 89
            echo form_open_multipart(("message/create/" . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender_receiver_id")), array("class" => "form-horizontal row-fluid"));
            echo "
                <input type=\"hidden\" name=\"penerima\" value=\"";
            // line 90
            echo twig_escape_filter($this->env, (isset($context["receiver_name"]) ? $context["receiver_name"] : null), "html", null, true);
            echo "\">
                <textarea name=\"content\" id=\"content\" style=\"height:300px;width:100%;\">";
            // line 91
            echo set_value("content");
            echo "</textarea>
                ";
            // line 92
            echo form_error("content");
            echo "
                <br>
                <p><button class=\"btn btn-primary\">Kirim</button></p>
            ";
            // line 95
            echo form_close();
            echo "
        </div>
        ";
        }
        // line 98
        echo "
        ";
        // line 99
        if (((isset($context["confirm_del_all"]) ? $context["confirm_del_all"] : null) == true)) {
            // line 100
            echo "        <hr class=\"hr-msg\">
        <div id=\"confirm\" class=\"alert alert-block\">
            <div class=\"pull-right btn-group\" style=\"margin-top: -5px;\">
                <a class=\"btn btn-danger\" href=\"";
            // line 103
            echo twig_escape_filter($this->env, site_url(("message/del_all/" . $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"))), "html", null, true);
            echo "\">Ya hapus</a>
                <a class=\"btn btn-primary\" href=\"";
            // line 104
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\">Batal</a>
            </div>
            <b>Anda yakin ingin menghapus percakapan ini?</b>
        </div>
        ";
        }
        // line 109
        echo "
        <input type=\"hidden\" id=\"active_msg_id\" value=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"), "html", null, true);
        echo "\">

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
        return array (  266 => 110,  263 => 109,  255 => 104,  251 => 103,  246 => 100,  244 => 99,  241 => 98,  235 => 95,  229 => 92,  225 => 91,  221 => 90,  217 => 89,  212 => 86,  210 => 85,  205 => 82,  195 => 78,  191 => 77,  185 => 74,  179 => 73,  175 => 72,  169 => 70,  165 => 69,  158 => 65,  154 => 64,  148 => 61,  142 => 60,  138 => 59,  133 => 57,  130 => 56,  120 => 52,  116 => 51,  110 => 48,  104 => 47,  100 => 46,  94 => 44,  90 => 43,  84 => 40,  78 => 37,  74 => 35,  71 => 34,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
