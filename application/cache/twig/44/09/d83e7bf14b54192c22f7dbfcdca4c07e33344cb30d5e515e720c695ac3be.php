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
        echo "Detail pesan - ";
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
    .msg {
        padding: 5px 10px;border-radius: 2px;
        border-top: 1px dashed #DDD;
    }
    .hr-msg {
        margin-top: 5px;margin-bottom: 5px;border:none;
    }
</style>
";
    }

    // line 23
    public function block_content($context, array $blocks = array())
    {
        // line 24
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 26
        echo anchor("message", "Pesan");
        echo " / Detail</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 29
        echo get_flashdata("msg");
        echo "

        ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["old_related_msg"]) ? $context["old_related_msg"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["o"]) {
            // line 32
            echo "        <div class=\"msg\" id=\"msg-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "id"), "html", null, true);
            echo "\">
            ";
            // line 33
            if ((!twig_test_empty($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "sender")))) {
                // line 34
                echo "            <i class=\"icon-user\"></i> <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender"), "profil"), "link_profil"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "sender"), "profil"), "nama"), "html", null, true);
                echo "</a> <";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "sender"), "login"), "username"), "html", null, true);
                echo ">, <i class=\"icon-time\"></i> ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "date"), "html", null, true);
                echo "
            ";
            }
            // line 36
            echo "            <hr class=\"hr-msg\">
            ";
            // line 37
            echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "content");
            echo "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['o'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "
        ";
        // line 41
        if ((!twig_test_empty($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender")))) {
            // line 42
            echo "        <div class=\"msg-active\" id=\"msg-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "id"), "html", null, true);
            echo "\">
            ";
            // line 43
            if ((!twig_test_empty($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender")))) {
                // line 44
                echo "            <i class=\"icon-user\"></i> <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender"), "profil"), "link_profil"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender"), "profil"), "nama"), "html", null, true);
                echo "</a> <";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender"), "login"), "username"), "html", null, true);
                echo ">, <i class=\"icon-time\"></i> ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "date"), "html", null, true);
                echo "
            ";
            }
            // line 46
            echo "            <hr class=\"hr-msg\">
            ";
            // line 47
            echo $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "content");
            echo "
        </div>
        ";
        }
        // line 50
        echo "
        ";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["new_related_msg"]) ? $context["new_related_msg"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["o"]) {
            // line 52
            echo "        <div class=\"msg\" id=\"msg-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "id"), "html", null, true);
            echo "\">
            ";
            // line 53
            if ((!twig_test_empty($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "sender")))) {
                // line 54
                echo "            <i class=\"icon-user\"></i> <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender"), "profil"), "link_profil"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "sender"), "profil"), "nama"), "html", null, true);
                echo "</a> <";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "sender"), "login"), "username"), "html", null, true);
                echo ">, <i class=\"icon-time\"></i> ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "date"), "html", null, true);
                echo "
            ";
            }
            // line 56
            echo "            <hr class=\"hr-msg\">
            ";
            // line 57
            echo $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "content");
            echo "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['o'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "
        ";
        // line 61
        if ((!twig_test_empty($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender")))) {
            // line 62
            echo "        <div class=\"msg-active\">
            <b><i class=\"icon-reply\"></i> Balas Pesan</b>
            <hr class=\"hr-msg\">
            ";
            // line 65
            echo form_open_multipart(("message/create/" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender"), "login"), "id")), array("class" => "form-horizontal row-fluid"));
            echo "
                <input type=\"hidden\" name=\"penerima\" value=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender"), "login"), "profil"), "nama"), "html", null, true);
            echo " <";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "sender"), "login"), "username"), "html", null, true);
            echo ">\">
                <textarea name=\"content\" id=\"content\" style=\"height:300px;width:100%;\">";
            // line 67
            echo set_value("content");
            echo "</textarea>
                ";
            // line 68
            echo form_error("content");
            echo "
                <br>
                <p><button class=\"btn btn-primary\">Kirim</button></p>
            ";
            // line 71
            echo form_close();
            echo "
        </div>
        ";
        }
        // line 74
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
        return array (  220 => 74,  214 => 71,  208 => 68,  204 => 67,  198 => 66,  194 => 65,  189 => 62,  187 => 61,  184 => 60,  175 => 57,  172 => 56,  160 => 54,  158 => 53,  153 => 52,  149 => 51,  146 => 50,  140 => 47,  137 => 46,  125 => 44,  123 => 43,  118 => 42,  116 => 41,  113 => 40,  104 => 37,  101 => 36,  89 => 34,  87 => 33,  82 => 32,  78 => 31,  73 => 29,  67 => 26,  63 => 24,  60 => 23,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
