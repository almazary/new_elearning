<?php

/* default/admin_top_menu.html */
class __TwigTemplate_11ce4e505f93e7580ca918527f8cadcb3691244c91af7aa832c66e0fbeba7f1c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<ul class=\"nav pull-right\">
    <li class=\"nav-user dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
        ";
        // line 4
        echo twig_escape_filter($this->env, get_sess_data("admin", "pengajar", "nama"), "html", null, true);
        echo "
            <img src=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "images/user.png\" class=\"nav-avatar\" />
        <b class=\"caret\"></b></a>
        <ul class=\"dropdown-menu\">
            <li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, site_url("admin/ch_profil"), "html", null, true);
        echo "\">Profil</a></li>
            <li><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, site_url("admin/ch_pass"), "html", null, true);
        echo "\">Ubah Password</a></li>
            <li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, site_url("admin/logout"), "html", null, true);
        echo "\">Logout</a></li>
        </ul>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "default/admin_top_menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 10,  38 => 9,  34 => 8,  28 => 5,  24 => 4,  19 => 1,);
    }
}
