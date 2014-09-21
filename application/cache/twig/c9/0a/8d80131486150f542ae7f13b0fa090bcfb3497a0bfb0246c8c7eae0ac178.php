<?php

/* default/admin_menu.html */
class __TwigTemplate_c90a8d80131486150f542ae7f13b0fa090bcfb3497a0bfb0246c8c7eae0ac178 extends Twig_Template
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
        echo "<div class=\"sidebar\">
    <ul class=\"widget widget-menu unstyled\">
        <li class=\"active\"><a href=\"index.html\"><i class=\"menu-icon icon-dashboard\"></i>Dashboard
        </a></li>
        <li><a href=\"activity.html\"><i class=\"menu-icon icon-bullhorn\"></i>News Feed </a>
        </li>
        <li><a href=\"message.html\"><i class=\"menu-icon icon-inbox\"></i>Inbox <b class=\"label green pull-right\">
            11</b> </a></li>
        <li><a href=\"task.html\"><i class=\"menu-icon icon-inbox\"></i>Outbox <b class=\"label orange pull-right\">
            19</b> </a></li>
    </ul>
    <!--/.widget-nav-->

    <ul class=\"widget widget-menu unstyled\">
        <li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, site_url("admin/kelas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Tugas </a></li>
        <li><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, site_url("admin/mapel"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i> Materi </a></li>
    </ul>

    <ul class=\"widget widget-menu unstyled\">
        <li><a href=\"";
        // line 20
        echo twig_escape_filter($this->env, site_url("admin/siswa"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Siswa </a></li>
        <li><a href=\"";
        // line 21
        echo twig_escape_filter($this->env, site_url("admin/pengajar"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i> Pengajar </a></li>
    </ul>

    <ul class=\"widget widget-menu unstyled\">
        <li><a href=\"";
        // line 25
        echo twig_escape_filter($this->env, site_url("admin/kelas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-tasks\"></i> Manajemen Kelas </a></li>
        <li><a href=\"";
        // line 26
        echo twig_escape_filter($this->env, site_url("admin/mapel"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-book\"></i>Manajemen Matapelajaran </a></li>
        <li><a href=\"";
        // line 27
        echo twig_escape_filter($this->env, site_url("admin/mapel_kelas"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-paste\"></i>Matapelajaran Kelas </a></li>
    </ul>

    <!--/.widget-nav-->
    <ul class=\"widget widget-menu unstyled\">
        <li><a href=\"";
        // line 32
        echo twig_escape_filter($this->env, site_url("admin/logout"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-signout\"></i>Logout </a></li>
    </ul>
</div>
<!--/.sidebar-->
";
    }

    public function getTemplateName()
    {
        return "default/admin_menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 32,  65 => 27,  61 => 26,  57 => 25,  50 => 21,  46 => 20,  39 => 16,  35 => 15,  19 => 1,);
    }
}
