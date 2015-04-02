<?php

/* admin_materi/list.html */
class __TwigTemplate_062a1a7d35c457bc26bf25eed85567bb62d32e43efcfe0d524dbec8d46428fcd extends Twig_Template
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
        echo anchor("admin/materi/add/tertulis", "Tambah Materi Tertulis", array("class" => "btn btn-primary"));
        echo "
                ";
        // line 14
        echo anchor("admin/materi/add/file", "Tambah Materi File", array("class" => "btn btn-primary"));
        echo "
            </div>
            <a class=\"as-link\" data-toggle=\"collapse\" data-target=\"#form-filter\"><i class=\"icon-search\" style=\"line-height: 0px;\"></i> Filter</a>

            <div id=\"form-filter\" class=\"collapse\" style=\"margin-top: 3px;\">
                ";
        // line 19
        echo form_open("admin/materi");
        echo "
                    <table class=\"table table-condensed\">
                        <tr>
                            <th style=\"border-top: none;\" width=\"15%\">Judul</th>
                            <td style=\"border-top: none;\">
                                <input type=\"text\" name=\"judul\" class=\"span4\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, set_value("judul", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "judul")), "html", null, true);
        echo "\">
                            </td>
                        </tr>
                        <tr>
                            <th>Konten</th>
                            <td>
                                <input type=\"text\" name=\"konten\" class=\"span5\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, set_value("konten", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "konten")), "html", null, true);
        echo "\">
                            </td>
                        </tr>
                        <tr>
                            <th>Pengajar</th>
                            <td>
                                <input type=\"text\" name=\"pengajar\" class=\"span4\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, set_value("pengajar", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "pengajar")), "html", null, true);
        echo "\">
                            </td>
                        </tr>
                        <tr>
                            <th>Siswa</th>
                            <td>
                                <input type=\"text\" name=\"siswa\" class=\"span4\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, set_value("siswa", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "siswa")), "html", null, true);
        echo "\">
                            </td>
                        </tr>
                        <tr>
                            <th>Mapel</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 50
            echo "                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"mapel_id[]\" value=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_checkbox("mapel_id[]", $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "mapel_id"))) && in_array($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "mapel_id")))) ? (true) : (""))), "html", null, true);
            echo "> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "nama"), "html", null, true);
            echo "
                                        </label>
                                    </li>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    ";
        // line 63
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 64
            echo "                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"kelas_id[]\" value=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_checkbox("kelas_id[]", $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "kelas_id"))) && in_array($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "kelas_id")))) ? (true) : (""))), "html", null, true);
            echo "> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "
                                        </label>
                                    </li>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Tipe</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"tertulis\" ";
        // line 79
        echo twig_escape_filter($this->env, set_checkbox("type[]", "tertulis", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("tertulis", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> Tertulis
                                        </label>
                                    </li>
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"file\" ";
        // line 84
        echo twig_escape_filter($this->env, set_checkbox("type[]", "file", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("file", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> File
                                        </label>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type=\"submit\" class=\"btn btn-primary\">Filter</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>

        <br>

        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"7%\">No</th>
                    <th>Materi</th>
                    <th width=\"15%\">Tipe</th>
                    <th width=\"10%\">View</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 115
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["materi"]) ? $context["materi"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["m"]) {
            // line 116
            echo "                <tr>
                    <td>";
            // line 117
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".</td>
                    <td>
                        <span class=\"text-warning\">";
            // line 119
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
            echo "</span>
                        <br><small><b>";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "mapel"), "nama"), "html", null, true);
            echo "</b>, 
                        
                        ";
            // line 122
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "materi_kelas"));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 123
                echo "                            ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "nama"), "html", null, true);
                echo "&nbsp;
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 125
            echo "
                        </small>
                        <br><small><b>Pembuat : </b> <a href=\"";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pembuat"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pembuat"), "nama"), "html", null, true);
            echo "</a>, ";
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "tgl_posting")), "html", null, true);
            echo "</small>
                    </td>
                    <td>
                        ";
            // line 130
            echo (((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) ? ("<span class=\"label label-info\">File</span>") : ("<span class=\"label label-success\">Tertulis</span>"));
            echo "
                    </td>
                    <td>";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "views"), "html", null, true);
            echo "</td>
                    <td>
                        <div class=\"btn-group\">
                            ";
            // line 135
            if ((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) {
                // line 136
                echo "                                ";
                $context["url_type"] = "file";
                // line 137
                echo "                            ";
            } else {
                // line 138
                echo "                                ";
                $context["url_type"] = "tertulis";
                // line 139
                echo "                            ";
            }
            // line 140
            echo "                            ";
            echo anchor(("admin/materi/detail/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-zoom-in\"></i> Detail", array("class" => "btn btn-default btn-small", "target" => "_blank"));
            echo "
                            ";
            // line 141
            echo anchor(((((("admin/materi/edit/" . (isset($context["url_type"]) ? $context["url_type"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-edit\"></i> Edit", array("class" => "btn btn-default btn-small"));
            echo "
                            ";
            // line 142
            echo anchor(((("admin/materi/delete/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-trash\"></i> Hapus", array("class" => "btn btn-default btn-small", "onclick" => "return confirm('Anda yakin ingin menghapus?')"));
            echo "
                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 147
        echo "            </tbody>
        </table>
        <br>
        ";
        // line 150
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_materi/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  309 => 150,  304 => 147,  293 => 142,  289 => 141,  284 => 140,  281 => 139,  278 => 138,  275 => 137,  272 => 136,  270 => 135,  264 => 132,  259 => 130,  249 => 127,  245 => 125,  236 => 123,  232 => 122,  227 => 120,  223 => 119,  218 => 117,  215 => 116,  211 => 115,  177 => 84,  169 => 79,  158 => 70,  144 => 66,  140 => 64,  136 => 63,  127 => 56,  113 => 52,  109 => 50,  105 => 49,  95 => 42,  86 => 36,  77 => 30,  68 => 24,  60 => 19,  52 => 14,  48 => 13,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
