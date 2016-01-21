<?php

/* sidebar-menu.html */
class __TwigTemplate_87c2f930554727392ebc8ce03dcffbd8dd38ed13abfdaaa4a873949435e12a5e extends Twig_Template
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
        if (is_admin()) {
            // line 2
            echo "<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 3
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
    <li><a href=\"";
            // line 4
            echo twig_escape_filter($this->env, site_url("pengumuman"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-bullhorn\"></i>Pengumuman</a></li>
    <li><a href=\"";
            // line 5
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
</ul>

<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 9
            echo twig_escape_filter($this->env, site_url("siswa"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-group\"></i>Siswa </a></li>
    <li><a href=\"";
            // line 10
            echo twig_escape_filter($this->env, site_url("pengajar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Pengajar </a></li>
</ul>

<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 14
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
    <li><a href=\"";
            // line 15
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
    <li><a href=\"";
            // line 16
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>
</ul>

<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 20
            echo twig_escape_filter($this->env, site_url("kelas/mapel_kelas"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-paste\"></i>Matapelajaran Kelas </a></li>
    <li><a href=\"";
            // line 21
            echo twig_escape_filter($this->env, site_url("kelas"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Manajemen Kelas </a></li>
    <li><a href=\"";
            // line 22
            echo twig_escape_filter($this->env, site_url("mapel"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Manajemen Matapelajaran </a></li>
</ul>

<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 26
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-wrench\"></i>Pengaturan</a></li>
    <li><a href=\"";
            // line 27
            echo twig_escape_filter($this->env, site_url("email"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-envelope\"></i>Email Template</a></li>
</ul>
";
        }
        // line 30
        echo "
";
        // line 31
        if (is_pengajar()) {
            // line 32
            echo "<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 33
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
    <li><a href=\"";
            // line 34
            echo twig_escape_filter($this->env, site_url("pengumuman"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-bullhorn\"></i>Pengumuman</a></li>
    <li><a href=\"";
            // line 35
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
    <li><a href=\"";
            // line 36
            echo twig_escape_filter($this->env, site_url("login/pp"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Profilku</a></li>
    <li><a href=\"";
            // line 37
            echo twig_escape_filter($this->env, site_url("pengajar/jadwal"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Jadwal Mengajar </a></li>
</ul>

<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 41
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
    <li><a href=\"";
            // line 42
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
    <li><a href=\"";
            // line 43
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>
</ul>

<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 47
            echo twig_escape_filter($this->env, site_url("pengajar/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Pengajar </a></li>
    <li><a href=\"";
            // line 48
            echo twig_escape_filter($this->env, site_url("siswa/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Siswa </a></li>
</ul>
";
        }
        // line 51
        echo "
";
        // line 52
        if (is_siswa()) {
            // line 53
            echo "<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 54
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
    <li><a href=\"";
            // line 55
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
    <li><a href=\"";
            // line 56
            echo twig_escape_filter($this->env, site_url("login/pp"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Profilku</a></li>
    <li><a href=\"";
            // line 57
            echo twig_escape_filter($this->env, site_url("siswa/jadwal_mapel"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Jadwal Matapelajaran</a></li>
</ul>

<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 61
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
    <li><a href=\"";
            // line 62
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
    <li><a href=\"";
            // line 63
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>
</ul>

<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
            // line 67
            echo twig_escape_filter($this->env, site_url("pengajar/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Pengajar </a></li>
    <li><a href=\"";
            // line 68
            echo twig_escape_filter($this->env, site_url("siswa/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Siswa </a></li>
</ul>
";
        }
        // line 71
        echo "
<!--/.widget-nav-->
<ul class=\"widget widget-menu unstyled\">
    <li><a href=\"";
        // line 74
        echo twig_escape_filter($this->env, site_url("login/logout"), "html", null, true);
        echo "\"><i class=\"menu-icon icon-signout\"></i>Logout </a></li>
</ul>";
    }

    public function getTemplateName()
    {
        return "sidebar-menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 74,  198 => 71,  192 => 68,  188 => 67,  177 => 62,  173 => 61,  166 => 57,  162 => 56,  154 => 54,  151 => 53,  149 => 52,  146 => 51,  140 => 48,  129 => 43,  125 => 42,  114 => 37,  110 => 36,  106 => 35,  98 => 33,  95 => 32,  93 => 31,  84 => 27,  80 => 26,  73 => 22,  69 => 21,  65 => 20,  58 => 16,  43 => 10,  39 => 9,  32 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,  305 => 117,  300 => 88,  295 => 14,  289 => 6,  274 => 118,  272 => 117,  268 => 116,  264 => 115,  260 => 114,  256 => 113,  252 => 112,  248 => 111,  244 => 110,  240 => 109,  235 => 107,  231 => 106,  221 => 101,  217 => 100,  204 => 89,  202 => 88,  199 => 87,  193 => 85,  191 => 84,  183 => 78,  181 => 63,  161 => 60,  158 => 55,  152 => 57,  150 => 56,  147 => 55,  141 => 53,  139 => 52,  136 => 47,  130 => 49,  128 => 48,  121 => 41,  115 => 41,  112 => 40,  107 => 38,  102 => 34,  100 => 36,  90 => 30,  82 => 26,  78 => 25,  66 => 16,  61 => 15,  59 => 14,  54 => 15,  50 => 14,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  23 => 1,);
    }
}
