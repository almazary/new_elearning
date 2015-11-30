<?php

/* list-tugas.html */
class __TwigTemplate_8ac215a290914e04874404a546e9c3097768976d6925efc804ad62a129b0e746 extends Twig_Template
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
        echo "Tugas - ";
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
        <h3>Tugas</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("tugas");
        echo "

        <div class=\"bs-callout bs-callout-info\">
            ";
        // line 16
        if ((is_siswa() == false)) {
            // line 17
            echo "            <div class=\"btn-group pull-right\" style=\"margin-top:-5px;\">
                ";
            // line 18
            echo anchor("tugas/add/3", "Tambah Tugas Ganda", array("class" => "btn btn-primary"));
            echo "
                ";
            // line 19
            echo anchor("tugas/add/2", "Tambah Tugas Essay", array("class" => "btn btn-primary"));
            echo "
                ";
            // line 20
            echo anchor("tugas/add/1", "Tambah Tugas Upload", array("class" => "btn btn-primary"));
            echo "
                ";
            // line 21
            echo anchor("tugas/bank_soal", "Bank Soal", array("class" => "btn btn-success"));
            echo "
            </div>
            ";
        }
        // line 24
        echo "            <b><a class=\"as-link\" data-toggle=\"collapse\" data-target=\"#form-filter\"><i class=\"icon-search\" style=\"line-height: 0px;\"></i> PARAMETER PENCARIAN</a></b>

            <div id=\"form-filter\" class=\"collapse\" style=\"margin-top: 5px;\">
                ";
        // line 27
        echo form_open("tugas");
        echo "
                    <table class=\"table table-condensed\">
                        <tr>
                            <th  style=\"border-top: none;\">Mapel</th>
                            <td  style=\"border-top: none;\">
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mapel"]) ? $context["mapel"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 34
            echo "                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"mapel_id[]\" value=\"";
            // line 36
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
        // line 40
        echo "                                </ul>
                            </td>
                        </tr>
                        ";
        // line 43
        if ((is_siswa() == false)) {
            // line 44
            echo "                        <tr>
                            <th>Kelas</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    ";
            // line 48
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                // line 49
                echo "                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"kelas_id[]\" value=\"";
                // line 51
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
            // line 55
            echo "                                </ul>
                            </td>
                        </tr>
                        ";
        }
        // line 59
        echo "                        <tr>
                            <th>Tipe</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"3\" ";
        // line 65
        echo twig_escape_filter($this->env, set_checkbox("type[]", "3", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("3", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> Ganda
                                        </label>
                                    </li>
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"2\" ";
        // line 70
        echo twig_escape_filter($this->env, set_checkbox("type[]", "2", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("2", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> Essay
                                        </label>
                                    </li>
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"type[]\" value=\"1\" ";
        // line 75
        echo twig_escape_filter($this->env, set_checkbox("type[]", "1", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type"))) && in_array("1", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "type")))) ? (true) : (""))), "html", null, true);
        echo "> Upload
                                        </label>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th width=\"15%\">Judul</th>
                            <td>
                                <input type=\"text\" name=\"judul\" class=\"span4\" value=\"";
        // line 84
        echo twig_escape_filter($this->env, set_value("judul", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "judul")), "html", null, true);
        echo "\">
                            </td>
                        </tr>
                        <tr>
                            <th>Info</th>
                            <td>
                                <input type=\"text\" name=\"info\" class=\"span5\" value=\"";
        // line 90
        echo twig_escape_filter($this->env, set_value("info", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "info")), "html", null, true);
        echo "\">
                            </td>
                        </tr>
                        ";
        // line 93
        if ((is_pengajar() == false)) {
            // line 94
            echo "                        <tr>
                            <th>Pembuat</th>
                            <td>
                                <input type=\"text\" name=\"pembuat\" class=\"span4\" value=\"";
            // line 97
            echo twig_escape_filter($this->env, set_value("pembuat", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "pembuat")), "html", null, true);
            echo "\">
                            </td>
                        </tr>
                        ";
        }
        // line 101
        echo "                        <tr>
                            <th>Status</th>
                            <td>
                                <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"status[]\" value=\"1\" ";
        // line 107
        echo twig_escape_filter($this->env, set_checkbox("status[]", "1", ((((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status"))) && in_array("1", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status")))) ? (true) : (""))), "html", null, true);
        echo "> Terbit
                                        </label>
                                    </li>
                                    <li>
                                        <label class=\"checkbox inline\">
                                            <input type=\"checkbox\" name=\"status[]\" value=\"0\" ";
        // line 112
        echo twig_escape_filter($this->env, set_checkbox("status[]", "0", (((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status") != "") && in_array("0", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status")))) ? (true) : (""))), "html", null, true);
        echo "> Tutup
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
                    <th width=\"7%\">ID</th>
                    <th>Informasi Tugas</th>
                    <th width=\"15%\">Tipe Tugas</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 142
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tugas"]) ? $context["tugas"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["m"]) {
            // line 143
            echo "                <tr ";
            echo ((((is_siswa() && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") == 1)) && (sudah_ngerjakan($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), get_sess_data("user", "id")) == false))) ? ("class=\"success\"") : (""));
            echo ">
                    <td><b>";
            // line 144
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), "html", null, true);
            echo "</b></td>
                    <td>
                        <strong class=\"text-warning\">";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "judul"), "html", null, true);
            echo "</strong>
                        <br><small><b>";
            // line 147
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "mapel"), "nama"), "html", null, true);
            echo "</b>

                        ";
            // line 149
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "tugas_kelas"));
            foreach ($context['_seq'] as $context["_key"] => $context["mk"]) {
                // line 150
                echo "                            , ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mk"]) ? $context["mk"] : null), "nama"), "html", null, true);
                echo "
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mk'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            echo "
                        ";
            // line 153
            if ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Ganda") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Essay"))) {
                // line 154
                echo "                            , ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "durasi"), "html", null, true);
                echo " Menit
                        ";
            }
            // line 156
            echo "
                        </small>
                        <br><small><b>Pembuat : </b> <a href=\"";
            // line 158
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pembuat"), "link_profil"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "pembuat"), "nama"), "html", null, true);
            echo "</a>, ";
            echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "tgl_buat")), "html", null, true);
            echo "</small>
                        ";
            // line 159
            if ((is_siswa() && ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "info") != ""))) {
                // line 160
                echo "                            <hr style=\"margin-top: 5px;margin-bottom: 5px;border:none;border-bottom: 1px dashed black;\">
                            ";
                // line 161
                echo $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "info");
                echo "
                        ";
            }
            // line 163
            echo "                    </td>
                    <td>
                        ";
            // line 165
            if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Ganda")) {
                // line 166
                echo "                            <span class=\"label label-success\">Ganda</span>
                        ";
            } elseif (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Essay")) {
                // line 168
                echo "                            <span class=\"label label-info\">Essay</span>
                        ";
            } elseif (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Upload")) {
                // line 170
                echo "                            <span class=\"label label-warning\">Upload</span>
                        ";
            }
            // line 172
            echo "                    </td>
                    <td>
                        <div class=\"btn-group\">
                        ";
            // line 175
            if ((is_siswa() == false)) {
                // line 176
                echo "                            ";
                if ((($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Ganda") || ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_label") == "Essay"))) {
                    // line 177
                    echo "                                ";
                    echo anchor(("tugas/manajemen_soal/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon icon-tasks\"></i> Soal", array("class" => "btn btn-primary btn-small"));
                    echo "
                            ";
                }
                // line 179
                echo "                            ";
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") == 0)) {
                    // line 180
                    echo "                                ";
                    echo anchor(((("tugas/terbitkan/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-ok\"></i> Terbitkan", array("class" => "btn btn-success btn-small"));
                    echo "
                            ";
                } elseif (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") == 1)) {
                    // line 182
                    echo "                                ";
                    echo anchor(((("tugas/tutup/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-minus\"></i> Tutup", array("class" => "btn btn-danger btn-small"));
                    echo "
                            ";
                }
                // line 184
                echo "
                            ";
                // line 185
                echo anchor(((("tugas/edit/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")) . "/") . enurl_redirect(current_url())), "<i class=\"icon-edit\"></i> Edit", array("class" => "btn btn-default btn-small"));
                echo "
                            ";
                // line 186
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "type_id") == 3)) {
                    // line 187
                    echo "                                ";
                    echo anchor(("tugas/nilai/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-eye-open\"></i> Lihat Nilai", array("class" => "btn btn-info btn-small"));
                    echo "
                            ";
                } else {
                    // line 189
                    echo "                                ";
                    echo anchor(("tugas/koreksi/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-check\"></i> Koreksi", array("class" => "btn btn-info btn-small"));
                    echo "
                            ";
                }
                // line 191
                echo "                        ";
            } elseif ((is_siswa() == true)) {
                // line 192
                echo "                            ";
                if (($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "aktif") == 1)) {
                    // line 193
                    echo "                                ";
                    if ((sudah_ngerjakan($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id"), get_sess_data("user", "id")) == false)) {
                        // line 194
                        echo "                                    ";
                        echo anchor(("tugas/kerjakan/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-ok-sign\"></i> Mulai Kerjakan", array("class" => "btn btn-success btn-small", "onclick" => "return confirm('Anda yakin ingin memulai mengerjakan tugas ini?')"));
                        echo "
                                ";
                    }
                    // line 196
                    echo "                            ";
                } else {
                    // line 197
                    echo "                                ";
                    echo anchor(("tugas/nilai/" . $this->getAttribute((isset($context["m"]) ? $context["m"] : null), "id")), "<i class=\"icon-flag\"></i> Lihat Nilai", array("class" => "btn btn-info btn-small iframe-lihat-nilai"));
                    echo "
                            ";
                }
                // line 199
                echo "                        ";
            }
            // line 200
            echo "                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 204
        echo "            </tbody>
        </table>
        <br>
        ";
        // line 207
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-tugas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  449 => 207,  444 => 204,  435 => 200,  432 => 199,  426 => 197,  423 => 196,  417 => 194,  414 => 193,  411 => 192,  408 => 191,  402 => 189,  396 => 187,  394 => 186,  390 => 185,  387 => 184,  381 => 182,  375 => 180,  372 => 179,  366 => 177,  363 => 176,  361 => 175,  356 => 172,  352 => 170,  348 => 168,  344 => 166,  342 => 165,  338 => 163,  333 => 161,  330 => 160,  328 => 159,  320 => 158,  316 => 156,  310 => 154,  308 => 153,  305 => 152,  296 => 150,  292 => 149,  287 => 147,  283 => 146,  278 => 144,  273 => 143,  269 => 142,  236 => 112,  228 => 107,  220 => 101,  213 => 97,  208 => 94,  206 => 93,  200 => 90,  191 => 84,  179 => 75,  171 => 70,  163 => 65,  155 => 59,  149 => 55,  135 => 51,  131 => 49,  127 => 48,  121 => 44,  119 => 43,  114 => 40,  100 => 36,  96 => 34,  92 => 33,  83 => 27,  78 => 24,  72 => 21,  68 => 20,  64 => 19,  60 => 18,  57 => 17,  55 => 16,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
