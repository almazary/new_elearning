<?php

/* admin_tugas/list.html */
class __TwigTemplate_cb47f6a8bbc9d4510b0e2462c45ac033b1c50e4c57a49a0d2bcb629993da2395 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 6
        echo (isset($context["module_title"]) ? $context["module_title"] : null);
        echo "</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 9
        echo get_flashdata("tugas");
        echo "

        <div class=\"row-fluid\">
            <div class=\"span8\">
                <button class=\"btn btn-primary\" id=\"popover\" data-html=\"true\" data-title=\"Cara Tambah Tugas\" data-content=\"Masuk ke detail profil <b>Pengajar</b>. Tugas dapat ditambah pada <b>Matapelajaran</b> yang diajar.<br>
                <br>";
        // line 14
        echo twig_escape_filter($this->env, anchor("admin/pengajar/filter", "Cari Pengajar", array("class" => "btn btn-small btn-primary")), "html", null, true);
        echo "\" data-toggle=\"popover\">Tambah Tugas</button>
            </div>

            <div class=\"span4\">
                <div class=\"btn-group pull-right\">
                    ";
        // line 19
        echo anchor("admin/tugas/list/0", "Semua", array("class" => ((((isset($context["type_id"]) ? $context["type_id"] : null) == 0)) ? ("btn btn-info") : ("btn"))));
        echo "
                    ";
        // line 20
        echo anchor("admin/tugas/list/1", "Upload", array("class" => ((((isset($context["type_id"]) ? $context["type_id"] : null) == 1)) ? ("btn btn-info") : ("btn"))));
        echo "
                    ";
        // line 21
        echo anchor("admin/tugas/list/2", "Essay", array("class" => ((((isset($context["type_id"]) ? $context["type_id"] : null) == 2)) ? ("btn btn-info") : ("btn"))));
        echo "
                    ";
        // line 22
        echo anchor("admin/tugas/list/3", "Ganda", array("class" => ((((isset($context["type_id"]) ? $context["type_id"] : null) == 3)) ? ("btn btn-info") : ("btn"))));
        echo "
                </div>
            </div>
        </div>

        <br>
        ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tugas"]) ? $context["tugas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 29
            echo "        <div class=\"well well-small\" style=\"box-shadow: none;border-radius: 0px;\">
            <div class=\"btn-group pull-right\" style=\"margin-bottom: 0px;\">
                ";
            // line 31
            if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "type_id") != 1)) {
                // line 32
                echo "                <a class=\"btn btn-default\" href=\"";
                echo twig_escape_filter($this->env, site_url(((("admin/tugas/soal/" . $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel_ajar"), "id")) . "/") . $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"))), "html", null, true);
                echo "\"><i class=\"icon-align-justify\"></i> Soal</a>
                ";
            }
            // line 34
            echo "                <a class=\"btn btn-default\"><i class=\"icon-ok\"></i> Terbitkan</a>
            </div>
            <h3 style=\"line-height: 25px;\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "judul"), "html", null, true);
            echo "</h3>
            <ul class=\"unstyled inline\" style=\"margin-bottom: 5px;margin-top: 5px;\">
                <li class=\"label label-success\">";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "type"), "html", null, true);
            echo "</li>
                ";
            // line 39
            if ((($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "type_id") == 2) || ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "type_id") == 3))) {
                // line 40
                echo "                <li class=\"label label-success\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "durasi"), "html", null, true);
                echo " menit</li>
                ";
            }
            // line 42
            echo "                <li class=\"label label-info\"><a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "pengajar"), "link_profil"), "html", null, true);
            echo "\" style=\"color:white;text-decoration: underline;\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "pengajar"), "nama"), "html", null, true);
            echo "</a></li>
                <li class=\"label label-info\">";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel"), "nama"), "html", null, true);
            echo "</li>
                <li class=\"label label-info\">";
            // line 44
            echo twig_escape_filter($this->env, get_indo_hari($this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel_ajar"), "hari_id")), "html", null, true);
            echo "</li>
                <li class=\"label label-info\">";
            // line 45
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel_ajar"), "jam_mulai"), "H:i"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel_ajar"), "jam_selesai"), "H:i"), "html", null, true);
            echo "</li>
                <li class=\"label label-info\">";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "kelas"), "nama"), "html", null, true);
            echo "</li>
                <li class=\"label label-info\">";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "kelas"), "jumlah_siswa"), "html", null, true);
            echo " siswa</li>
            </ul>
            ";
            // line 49
            echo $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "info");
            echo "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "
        <br>
        ";
        // line 54
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_tugas/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 54,  154 => 52,  145 => 49,  140 => 47,  136 => 46,  130 => 45,  126 => 44,  122 => 43,  115 => 42,  109 => 40,  107 => 39,  103 => 38,  98 => 36,  94 => 34,  88 => 32,  86 => 31,  82 => 29,  78 => 28,  69 => 22,  65 => 21,  61 => 20,  57 => 19,  49 => 14,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
