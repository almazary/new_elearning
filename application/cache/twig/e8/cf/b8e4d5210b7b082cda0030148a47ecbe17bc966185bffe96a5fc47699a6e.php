<?php

/* top-mobile-menu.html */
class __TwigTemplate_e8cfb8e4d5210b7b082cda0030148a47ecbe17bc966185bffe96a5fc47699a6e extends Twig_Template
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
            echo "
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 3
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 4
            echo twig_escape_filter($this->env, site_url("pengumuman"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-bullhorn\"></i>Pengumuman</a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 5
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>

<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 7
            echo twig_escape_filter($this->env, site_url("siswa"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-group\"></i>Siswa </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 8
            echo twig_escape_filter($this->env, site_url("pengajar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Pengajar </a></li>

<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 10
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 11
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 12
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>

<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 14
            echo twig_escape_filter($this->env, site_url("kelas/mapel_kelas"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-paste\"></i>Matapelajaran Kelas </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 15
            echo twig_escape_filter($this->env, site_url("kelas"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Manajemen Kelas </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 16
            echo twig_escape_filter($this->env, site_url("mapel"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Manajemen Matapelajaran </a></li>

<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 18
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-wrench\"></i>Pengaturan</a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 19
            echo twig_escape_filter($this->env, site_url("email"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-envelope\"></i>Email Template</a></li>

";
        }
        // line 22
        echo "
";
        // line 23
        if (is_pengajar()) {
            // line 24
            echo "
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 25
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 26
            echo twig_escape_filter($this->env, site_url("pengumuman"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-bullhorn\"></i>Pengumuman</a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 27
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 28
            echo twig_escape_filter($this->env, site_url("login/pp"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Profilku</a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 29
            echo twig_escape_filter($this->env, site_url("pengajar/jadwal"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Jadwal Mengajar </a></li>

<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 31
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 32
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 33
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>

<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 35
            echo twig_escape_filter($this->env, site_url("pengajar/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Pengajar </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 36
            echo twig_escape_filter($this->env, site_url("siswa/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Siswa </a></li>

";
        }
        // line 39
        echo "
";
        // line 40
        if (is_siswa()) {
            // line 41
            echo "
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 42
            echo twig_escape_filter($this->env, site_url(), "html", null, true);
            echo "\"><i class=\"menu-icon icon-home\"></i>Beranda</a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 43
            echo twig_escape_filter($this->env, site_url("message"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Pesan <span id=\"count-new-msg\"></span></a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 44
            echo twig_escape_filter($this->env, site_url("login/pp"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-user\"></i>Profilku</a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 45
            echo twig_escape_filter($this->env, site_url("siswa/jadwal_mapel"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Jadwal Matapelajaran</a></li>

<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 47
            echo twig_escape_filter($this->env, site_url("tugas?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-tasks\"></i>Tugas </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 48
            echo twig_escape_filter($this->env, site_url("materi?clear_filter=true"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-book\"></i>Materi </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 49
            echo twig_escape_filter($this->env, site_url("materi/komentar"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-comments\"></i>Komentar Materi </a></li>

<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 51
            echo twig_escape_filter($this->env, site_url("pengajar/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Pengajar </a></li>
<li class=\"visible-phone visible-tablet\"><a href=\"";
            // line 52
            echo twig_escape_filter($this->env, site_url("siswa/filter"), "html", null, true);
            echo "\"><i class=\"menu-icon icon-search\"></i>Filter Siswa </a></li>

";
        }
    }

    public function getTemplateName()
    {
        return "top-mobile-menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 52,  172 => 51,  167 => 49,  159 => 47,  154 => 45,  150 => 44,  142 => 42,  139 => 41,  137 => 40,  134 => 39,  128 => 36,  124 => 35,  119 => 33,  115 => 32,  111 => 31,  106 => 29,  98 => 27,  94 => 26,  87 => 24,  85 => 23,  76 => 19,  72 => 18,  67 => 16,  63 => 15,  41 => 8,  37 => 7,  32 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,  310 => 119,  305 => 90,  300 => 14,  294 => 6,  279 => 120,  277 => 119,  273 => 118,  269 => 117,  265 => 116,  261 => 115,  257 => 114,  253 => 113,  249 => 112,  245 => 111,  240 => 109,  236 => 108,  226 => 103,  222 => 102,  209 => 91,  207 => 90,  204 => 89,  198 => 87,  196 => 86,  188 => 80,  186 => 79,  166 => 62,  163 => 48,  157 => 59,  155 => 58,  152 => 57,  146 => 43,  144 => 54,  141 => 53,  135 => 51,  133 => 50,  126 => 46,  120 => 43,  117 => 42,  112 => 40,  107 => 39,  105 => 38,  102 => 28,  100 => 36,  90 => 25,  82 => 22,  78 => 25,  66 => 16,  61 => 15,  59 => 14,  54 => 12,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  23 => 1,);
    }
}
