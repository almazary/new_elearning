<?php

/* list-materi.html */
class __TwigTemplate_7f857167ed078456c7dacce5699c3c84c4bbedc1d2c03ce6f2834231bba6a50b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo "Materi - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Materi</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("materi");
        echo "

        <div class=\"bs-callout bs-callout-info\">
            ";
        // line 16
        if ((is_siswa() == false)) {
            // line 17
            echo "            <div class=\"btn-group pull-right\" style=\"margin-top:-5px;\">
                ";
            // line 18
            echo anchor("materi/add/tertulis", "Tambah Materi Tertulis", array("class" => "btn btn-primary"));
            echo "
                ";
            // line 19
            echo anchor("materi/add/file", "Tambah Materi File", array("class" => "btn btn-primary"));
            echo "
            </div>
            ";
        }
        // line 22
        echo "            <b><a class=\"as-link\" data-toggle=\"collapse\" data-target=\"#form-filter\"><i class=\"icon-search\" style=\"line-height: 0px;\"></i> Filter</a></b>

            <div id=\"form-filter\" class=\"collapse\" style=\"margin-top: 5px;\">
                ";
        // line 25
        echo form_open("materi");
        echo "
                    <table class=\"table table-condensed\">
                        <tr>
                            <th  style=\"border-top: none;\">Mapel</th>
                            <td  style=\"border-top: none;\">
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 32
            echo "                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"mapel_id[]\" value=\"";
            // line 34
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
        // line 38
        echo "                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    ";
        // line 45
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 46
            echo "                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"kelas_id[]\" value=\"";
            // line 48
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
        // line 52
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
        // line 61
        echo twig_escape_filter($this->env, set_checkbox("type[]", "tertulis", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("tertulis", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> Tertulis
                                        </label>
                                    </li>
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"file\" ";
        // line 66
        echo twig_escape_filter($this->env, set_checkbox("type[]", "file", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("file", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> File
                                        </label>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th width=\"15%\">Judul</th>
                            <td>
                                <input type=\"text\" name=\"judul\" class=\"span4\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, set_value("judul", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "judul")), "html", null, true);
        echo "\">
                            </td>
                        </tr>
                        <tr>
                            <th>Konten</th>
                            <td>
                                <input type=\"text\" name=\"konten\" class=\"span5\" value=\"";
        // line 81
        echo twig_escape_filter($this->env, set_value("konten", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "konten")), "html", null, true);
        echo "\">
                            </td>
                        </tr>
                        <tr>
                            <th>Pembuat</th>
                            <td>
                                <input type=\"text\" name=\"pembuat\" class=\"span4\" value=\"";
        // line 87
        echo twig_escape_filter($this->env, set_value("pembuat", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "pembuat")), "html", null, true);
        echo "\">
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
                    <th width=\"7%\">ID</th>
                    <th>Informasi Materi</th>
                    <th width=\"15%\">Tipe Materi</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 114
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["materi"]) ? $context["materi"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["m"]) {
            // line 115
            echo "
                ";
            // line 116
            if ((is_admin() == true)) {
                // line 117
                echo "                    ";
                $context["action_edit"] = true;
                // line 118
                echo "                    ";
                $context["action_delete"] = true;
                // line 119
                echo "                ";
            } elseif ((is_pengajar() == true)) {
                // line 120
                echo "                    ";
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pengajar_id") == get_sess_data("user", "id"))) {
                    // line 121
                    echo "                        ";
                    $context["action_edit"] = true;
                    // line 122
                    echo "                        ";
                    $context["action_delete"] = true;
                    // line 123
                    echo "                    ";
                } else {
                    // line 124
                    echo "                        ";
                    $context["action_edit"] = false;
                    // line 125
                    echo "                        ";
                    $context["action_delete"] = false;
                    // line 126
                    echo "                    ";
                }
                // line 127
                echo "                ";
            } elseif ((is_siswa() == true)) {
                // line 128
                echo "                    ";
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "siswa_id") == get_sess_data("user", "id"))) {
                    // line 129
                    echo "                        ";
                    $context["action_edit"] = true;
                    // line 130
                    echo "                        ";
                    $context["action_delete"] = true;
                    // line 131
                    echo "                    ";
                } else {
                    // line 132
                    echo "                        ";
                    $context["action_edit"] = false;
                    // line 133
                    echo "                        ";
                    $context["action_delete"] = false;
                    // line 134
                    echo "                    ";
                }
                // line 135
                echo "                ";
            }
            // line 136
            echo "
                <tr>
                    <td><b>";
            // line 138
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "</b></td>
                    <td>
                        <strong class=\"text-warning\">
                            ";
            // line 141
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
            echo "
                            <span class=\"as-link caret\" data-toggle=\"collapse\" data-target=\"#toggle-";
            // line 142
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\" style=\"margin-top:10px;\"></span>
                        </strong>
                        <div class=\"collapse\" id=\"toggle-";
            // line 144
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "\">
                            <table class=\"table table-condensed table-bordered\">
                                <tr>
                                    <td width=\"20%\">Mapel</td>
                                    <td>";
            // line 148
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "mapel"), "nama"), "html", null, true);
            echo "</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>
                                        ";
            // line 153
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "materi_kelas"));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 154
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "nama"), "html", null, true);
                echo "&nbsp;
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 156
            echo "                                    </td>
                                </tr>
                                <tr>
                                    <td>Pembuat</td>
                                    <td>
                                        <a href=\"";
            // line 161
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pembuat"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pembuat"), "nama"), "html", null, true);
            echo "</a>, <small>";
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "tgl_posting")), "html", null, true);
            echo "</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td>";
            // line 165
            echo ((twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file"))) ? ("Dibaca") : ("Diunduh"));
            echo "</td>
                                    <td>";
            // line 166
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "views"), "html", null, true);
            echo "</td>
                                </tr>
                                <tr>
                                    <td>Komentar</td>
                                    <td>";
            // line 170
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "jml_komentar"), "html", null, true);
            echo "</td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        ";
            // line 176
            echo (((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) ? ("<span class=\"label label-info\">File</span>") : ("<span class=\"label label-success\">Tertulis</span>"));
            echo "
                    </td>
                    <td>
                        <div class=\"btn-group\">
                            ";
            // line 180
            if ((!twig_test_empty($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "file")))) {
                // line 181
                echo "                                ";
                $context["url_type"] = "file";
                // line 182
                echo "                            ";
            } else {
                // line 183
                echo "                                ";
                $context["url_type"] = "tertulis";
                // line 184
                echo "                            ";
            }
            // line 185
            echo "                            ";
            echo anchor(("materi/detail/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-zoom-in\"></i> Detail", array("class" => "btn btn-default btn-small", "target" => "_tab"));
            echo "

                            ";
            // line 187
            if (((isset($context["action_edit"]) ? $context["action_edit"] : null) == true)) {
                // line 188
                echo "                                ";
                echo anchor(((((("materi/edit/" . (isset($context["url_type"]) ? $context["url_type"] : null)) . "/") . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-edit\"></i> Edit", array("class" => "btn btn-default btn-small"));
                echo "
                            ";
            }
            // line 190
            echo "
                            ";
            // line 191
            if (((isset($context["action_delete"]) ? $context["action_delete"] : null) == true)) {
                // line 192
                echo "                                ";
                echo anchor(((("materi/delete/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-trash\"></i> Hapus", array("class" => "btn btn-default btn-small", "onclick" => "return confirm('Anda yakin ingin menghapus?')"));
                echo "
                            ";
            }
            // line 194
            echo "                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 198
        echo "            </tbody>
        </table>
        <br>
        ";
        // line 201
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-materi.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  427 => 201,  422 => 198,  413 => 194,  407 => 192,  405 => 191,  402 => 190,  396 => 188,  394 => 187,  388 => 185,  385 => 184,  382 => 183,  379 => 182,  376 => 181,  374 => 180,  367 => 176,  358 => 170,  351 => 166,  347 => 165,  336 => 161,  329 => 156,  320 => 154,  316 => 153,  308 => 148,  301 => 144,  296 => 142,  292 => 141,  286 => 138,  282 => 136,  279 => 135,  276 => 134,  273 => 133,  270 => 132,  267 => 131,  264 => 130,  261 => 129,  258 => 128,  255 => 127,  252 => 126,  249 => 125,  246 => 124,  243 => 123,  240 => 122,  237 => 121,  234 => 120,  231 => 119,  228 => 118,  225 => 117,  223 => 116,  220 => 115,  216 => 114,  186 => 87,  177 => 81,  168 => 75,  156 => 66,  148 => 61,  137 => 52,  123 => 48,  119 => 46,  115 => 45,  106 => 38,  92 => 34,  88 => 32,  84 => 31,  75 => 25,  70 => 22,  64 => 19,  60 => 18,  57 => 17,  55 => 16,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
