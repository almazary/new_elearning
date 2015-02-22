<?php

/* admin_materi/detail.html */
class __TwigTemplate_1346a11eb48e96b832e9ede5c2e8148879922051982e674bbb95494e8d976640 extends Twig_Template
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
        echo get_flashdata("materi");
        echo "

        <div class=\"bs-callout bs-callout-info\">
            <div class=\"btn-group pull-right\" style=\"margin-top:-5px;\">
                ";
        // line 13
        echo anchor(("admin/materi/add/tertulis/" . (isset($context["ref_param"]) ? $context["ref_param"] : null)), "Tambah Materi Tertulis", array("class" => "btn btn-primary"));
        echo "
                ";
        // line 14
        echo anchor(("admin/materi/add/file/" . (isset($context["ref_param"]) ? $context["ref_param"] : null)), "Tambah Materi File", array("class" => "btn btn-primary"));
        echo "
            </div>
            <b>Matapelajaran :</b> ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mapel"]) ? $context["mapel"] : null), "nama"), "html", null, true);
        echo " <b>Kelas : </b>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama"), "html", null, true);
        echo "
        </div>

        <br>

        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"7%\">No</th>
                    <th>Judul</th>
                    <th width=\"15%\">Type</th>
                    <th width=\"10%\">View</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["materis"]) ? $context["materis"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["m"]) {
            // line 33
            echo "                ";
            if ((!(null === $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pengajar_id")))) {
                // line 34
                echo "                    ";
                $context["p"] = get_row_data("pengajar_model", "retrieve", array(0 => $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pengajar_id")));
                // line 35
                echo "                    ";
                $context["link"] = ((("admin/pengajar/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"));
                // line 36
                echo "                ";
            } elseif ((!(null === $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "siswa_id")))) {
                // line 37
                echo "                    ";
                $context["p"] = get_row_data("siswa_model", "retrieve", array(0 => $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "siswa_id")));
                // line 38
                echo "                    ";
                $context["link"] = ((("admin/siswa/detail/" . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"));
                // line 39
                echo "                ";
            }
            // line 40
            echo "                <tr>
                    <td>";
            // line 41
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
                    <td>
                        ";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
            echo "
                        <br><small><b>Pembuat : </b> ";
            // line 44
            echo anchor((isset($context["link"]) ? $context["link"] : null), $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "nama"));
            echo ", ";
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "tgl_posting")), "html", null, true);
            echo "</small>
                    </td>
                    <td>
                        ";
            // line 47
            echo (((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) ? ("<span class=\"label label-info\">File</span>") : ("<span class=\"label label-success\">Tertulis</span>"));
            echo "
                    </td>
                    <td>";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "views"), "html", null, true);
            echo "</td>
                    <td>
                        <div class=\"btn-group\">
                            ";
            // line 52
            if ((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) {
                // line 53
                echo "                                ";
                $context["url_type"] = "file";
                // line 54
                echo "                                ";
                echo anchor(((((("admin/materi/info/" . (isset($context["url_type"]) ? $context["url_type"] : null)) . "/") . (isset($context["ref_param"]) ? $context["ref_param"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-zoom-in\"></i> Detail", array("class" => "btn btn-small"));
                echo "
                            ";
            } else {
                // line 56
                echo "                                ";
                $context["url_type"] = "tertulis";
                // line 57
                echo "                                ";
                echo anchor(((((("admin/materi/info/" . (isset($context["url_type"]) ? $context["url_type"] : null)) . "/") . (isset($context["ref_param"]) ? $context["ref_param"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-zoom-in\"></i> Detail", array("class" => "btn btn-small"));
                echo "
                            ";
            }
            // line 59
            echo "                            ";
            echo anchor(((((("admin/materi/edit/" . (isset($context["url_type"]) ? $context["url_type"] : null)) . "/") . (isset($context["ref_param"]) ? $context["ref_param"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-edit\"></i> Edit", array("class" => "btn btn-small"));
            echo "
                            ";
            // line 60
            echo anchor(((("admin/materi/delete/" . (isset($context["ref_param"]) ? $context["ref_param"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-trash\"></i> Hapus", array("class" => "btn btn-small", "onclick" => "return confirm('Anda yakin ingin menghapus?')"));
            echo "
                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "            </tbody>
        </table>
        <br>
        ";
        // line 68
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_materi/detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 68,  170 => 65,  159 => 60,  154 => 59,  148 => 57,  145 => 56,  139 => 54,  136 => 53,  134 => 52,  128 => 49,  123 => 47,  115 => 44,  111 => 43,  106 => 41,  103 => 40,  100 => 39,  97 => 38,  94 => 37,  91 => 36,  88 => 35,  85 => 34,  82 => 33,  78 => 32,  57 => 16,  52 => 14,  48 => 13,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
