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
                    ";
        // line 23
        echo anchor("admin/tugas/filter", "<i class=\"icon-search\"></i> Filter", array("class" => "btn"));
        echo "
                </div>
            </div>
        </div>

        <br>
        ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tugas"]) ? $context["tugas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 30
            echo "        <div class=\"well well-small\" style=\"box-shadow: none;border-radius: 0px;\">
            <div class=\"btn-group pull-right\" style=\"margin-bottom: 0px;\">
                ";
            // line 32
            echo anchor(((((("admin/tugas/edit/" . $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel_ajar_id")) . "/") . $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-edit\"></i> Edit", array("class" => "btn btn-default"));
            echo "

                ";
            // line 34
            if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "type_id") != 1)) {
                // line 35
                echo "                <a class=\"btn btn-default\" href=\"";
                echo twig_escape_filter($this->env, site_url(((("admin/tugas/soal/" . $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel_ajar"), "id")) . "/") . $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"))), "html", null, true);
                echo "\" data-toggle=\"tooltip\" title=\"Manajemen Soal\"><i class=\"icon-align-justify\"></i> Soal</a>
                ";
            }
            // line 37
            echo "
                ";
            // line 38
            if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "aktif") == 0)) {
                // line 39
                echo "                    ";
                echo anchor(((("admin/tugas/tampilkan/" . $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-ok\"></i> Tampilkan</a>", array("class" => "btn btn-default", "data-toggle" => "tooltip", "title" => "Tampilkan agar siswa dapat <br>mengerjakan tugas"));
                echo "
                ";
            } else {
                // line 41
                echo "                    ";
                echo anchor(((("admin/tugas/sembunyikan/" . $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-ok\"></i> Sembunyikan</a>", array("class" => "btn btn-success", "data-toggle" => "tooltip", "title" => "Sembunyikan agar siswa sudah <br>tidak dapat mengerjakan tugas"));
                echo "
                ";
            }
            // line 43
            echo "
                ";
            // line 44
            echo anchor(("admin/tugas/koreksi/" . $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id")), "<i class=\"icon-eye-open\"></i> Koreksi", array("class" => "btn btn-default", "data-toggle" => "tooltip", "title" => "Koreksi Jawaban"));
            echo "
            </div>
            <h3 style=\"line-height: 25px;\">";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "judul"), "html", null, true);
            echo "</h3>
            <ul class=\"unstyled inline\" style=\"margin-bottom: 5px;margin-top: 5px;\">
                <li class=\"label label-success\">";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "type"), "html", null, true);
            echo "</li>
                ";
            // line 49
            if ((($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "type_id") == 2) || ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "type_id") == 3))) {
                // line 50
                echo "                <li class=\"label label-success\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "durasi"), "html", null, true);
                echo " menit</li>
                ";
            }
            // line 52
            echo "                <li class=\"label label-info\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel"), "nama"), "html", null, true);
            echo "</li>
                <li class=\"label label-info\">";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "kelas"), "nama"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "kelas"), "jumlah_siswa"), "html", null, true);
            echo " siswa)</li>
                <li class=\"label label-info\">";
            // line 54
            echo twig_escape_filter($this->env, get_indo_hari($this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel_ajar"), "hari_id")), "html", null, true);
            echo "</li>
                <li class=\"label label-info\">";
            // line 55
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel_ajar"), "jam_mulai"), "H:i"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "mapel_ajar"), "jam_selesai"), "H:i"), "html", null, true);
            echo "</li>
            </ul>
            
            <div class=\"row-fluid\">
                <div class=\"span8\">
                    ";
            // line 60
            echo $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "info");
            echo "
                </div>
                <div class=\"span4\">
                    <span class=\"text-muted pull-right\">
                        <a href=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "pengajar"), "link_profil"), "html", null, true);
            echo "\" data-toggle=\"tooltip\" title=\"Pembuat\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "pengajar"), "nama"), "html", null, true);
            echo "</a> ";
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "tgl_buat")), "html", null, true);
            echo "
                    </span>
                </div>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "
        <br>
        ";
        // line 72
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
        return array (  197 => 72,  193 => 70,  177 => 64,  170 => 60,  160 => 55,  156 => 54,  150 => 53,  145 => 52,  139 => 50,  137 => 49,  133 => 48,  128 => 46,  123 => 44,  120 => 43,  114 => 41,  108 => 39,  106 => 38,  103 => 37,  97 => 35,  95 => 34,  90 => 32,  86 => 30,  82 => 29,  73 => 23,  69 => 22,  65 => 21,  61 => 20,  57 => 19,  49 => 14,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
