<?php

/* list-pengajar.html */
class __TwigTemplate_1da7980c10c5b7b27622e8b3961e0f0e2a6f8a4151a7611cc45b7071bbec8d7b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
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
        echo "Data Pengajar - ";
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
        <h3>Data Pengajar</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("pengajar");
        echo "

        ";
        // line 15
        if ((is_admin() == true)) {
            // line 16
            echo "        <div class=\"row-fluid\">
            <div class=\"span8\">
                <a href=\"";
            // line 18
            echo twig_escape_filter($this->env, site_url(("pengajar/add/" . (isset($context["status_id"]) ? $context["status_id"] : null))), "html", null, true);
            echo "\" class=\"btn btn-primary\">Tambah Pengajar</a>
            </div>

            <div class=\"span4\">
                <div class=\"btn-group\">
                    ";
            // line 23
            echo anchor("pengajar/index/1", "Aktif", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 1)) ? ("btn btn-info") : ("btn btn-default"))));
            echo "
                    ";
            // line 24
            echo anchor("pengajar/index/0", "Pending", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0)) ? ("btn btn-info") : ("btn btn-default"))));
            echo "
                    ";
            // line 25
            echo anchor("pengajar/index/2", "Blocking", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 2)) ? ("btn btn-info") : ("btn btn-default"))));
            echo "
                    ";
            // line 26
            echo anchor("pengajar/filter", "<i class=\"icon-search\" style=\"line-height: 0px;\"></i> Filter", array("class" => "btn btn-default"));
            echo "
                </div>
            </div>
        </div>
        ";
        } elseif ((is_pengajar() == true)) {
            // line 31
            echo "        <div class=\"bs-callout bs-callout-info\">
            <b><a class=\"as-link\" data-toggle=\"collapse\" data-target=\"#form-filter\"><i class=\"icon-search\" style=\"line-height: 0px;\"></i> Filter</a></b>
            <div id=\"form-filter\" class=\"collapse\" style=\"margin-top: 5px;\">
                ";
            // line 34
            echo form_open("pengajar/filter");
            echo "
                <table class=\"table table-condensed\" id=\"form-search\">
                    <tr>
                        <th width=\"20%\" style=\"border-top:none;\">NIP</th>
                        <td style=\"border-top:none;\">
                            <input type=\"text\" name=\"nip\" class=\"span2\" style=\"margin-bottom:0px;\" value=\"";
            // line 39
            echo twig_escape_filter($this->env, set_value("nip", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nip", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nip")) : (""))), "html", null, true);
            echo "\">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>
                            <input type=\"text\" name=\"nama\" class=\"span4\" style=\"margin-bottom:0px;\" value=\"";
            // line 45
            echo twig_escape_filter($this->env, set_value("nama", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nama", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nama")) : (""))), "html", null, true);
            echo "\">
                        </td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            <p style=\"margin-top:0px; margin-bottom:5px;\">
                            <label class=\"checkbox inline\">
                                <input type=\"checkbox\" name=\"jenis_kelamin[]\" value=\"Laki-laki\" ";
            // line 53
            echo twig_escape_filter($this->env, set_checkbox("jenis_kelamin[]", "Laki-laki", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin", array(), "any", true, true) && twig_in_filter("Laki-laki", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin")))) ? (true) : (false))), "html", null, true);
            echo "> Laki-laki
                            </label>
                            <label class=\"checkbox inline\">
                                <input type=\"checkbox\" name=\"jenis_kelamin[]\" value=\"Perempuan\" ";
            // line 56
            echo twig_escape_filter($this->env, set_checkbox("jenis_kelamin[]", "Perempuan", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin", array(), "any", true, true) && twig_in_filter("Perempuan", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin")))) ? (true) : (false))), "html", null, true);
            echo "> Perempuan
                            </label>
                            </p>
                        </td>
                    <tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>
                            <input type=\"text\" name=\"tempat_lahir\" class=\"span3\" style=\"margin-bottom:0px;\" value=\"";
            // line 64
            echo twig_escape_filter($this->env, set_value("tempat_lahir", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tempat_lahir", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tempat_lahir")) : (""))), "html", null, true);
            echo "\">
                        </td>
                    <tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>
                            <select class=\"span2\" style=\"width: 10%;\" name=\"tgl_lahir\">
                                <option value=\"\">Tgl</option>
                                ";
            // line 72
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 31));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 73
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\" ";
                echo twig_escape_filter($this->env, set_select("tgl_lahir", (isset($context["i"]) ? $context["i"] : null), ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tgl_lahir", array(), "any", true, true) && ((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tgl_lahir")))) ? (true) : (false))), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "                            </select>
                            <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                                <option value=\"\">Bulan</option>
                                ";
            // line 78
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 12));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 79
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\" ";
                echo twig_escape_filter($this->env, set_select("bln_lahir", (isset($context["i"]) ? $context["i"] : null), ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "bln_lahir", array(), "any", true, true) && ((isset($context["i"]) ? $context["i"] : null) == $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "bln_lahir")))) ? (true) : (false))), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, get_indo_bulan((isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 81
            echo "                            </select>
                            <input type=\"text\" name=\"thn_lahir\" class=\"span1\" maxlength=\"4\" value=\"";
            // line 82
            echo twig_escape_filter($this->env, set_value("thn_lahir", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "thn_lahir", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "thn_lahir")) : (""))), "html", null, true);
            echo "\" placeholder=\"Tahun\">
                        </td>
                    <tr>
                    <tr>
                        <th>Alamat</th>
                        <td>
                            <input type=\"text\" name=\"alamat\" class=\"span4\" style=\"margin-bottom:0px;\" value=\"";
            // line 88
            echo twig_escape_filter($this->env, set_value("alamat", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "alamat", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "alamat")) : (""))), "html", null, true);
            echo "\">
                        </td>
                    <tr>
                    <tr>
                        <th>Opsi</th>
                        <td>
                            <label><input type=\"checkbox\" name=\"is_admin\" value=\"1\" style=\"margin-top:-2px;\" ";
            // line 94
            echo twig_escape_filter($this->env, set_checkbox("is_admin", "1", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "is_admin", array(), "any", true, true) && ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "is_admin") == 1))) ? (true) : (false))), "html", null, true);
            echo "> Administrator</label>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type=\"submit\" class=\"btn btn-primary\">Filter</button>
                        </td>
                    </tr>
                </table>
                ";
            // line 104
            echo form_close();
            echo "
            </div>
        </div>
        ";
        }
        // line 108
        echo "        <br>

        ";
        // line 110
        echo form_open(("pengajar/index/" . (isset($context["status_id"]) ? $context["status_id"] : null)));
        echo "
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"7%\">
                        ";
        // line 115
        if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
            // line 116
            echo "                            <input type=\"checkbox\" style=\"margin-top:-2px;\" onclick=\"ch_uch_checkbox(this)\">
                        ";
        }
        // line 118
        echo "                        ID
                    </th>
                    <th>Informasi Pengajar</th>
                    <th width=\"22%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 125
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pengajar"]) ? $context["pengajar"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 126
            echo "                <tr>
                    <td>
                        ";
            // line 128
            if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
                // line 129
                echo "                            <input type=\"checkbox\" name=\"pengajar_id[]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\" style=\"margin-top:-2px;\">
                        ";
            }
            // line 131
            echo "                        <b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "</b>
                    </td>
                    <td>
                        <img style=\"height:40px;width:40px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
            // line 134
            echo twig_escape_filter($this->env, get_url_image_pengajar($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "foto"), "medium", $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin")), "html", null, true);
            echo "\">
                        <b>";
            // line 135
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo " ";
            echo (((!twig_test_empty($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nip")))) ? ((("<span class=\"text-muted\">(" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nip")) . ")</span>")) : (""));
            echo "</b>
                        ";
            // line 136
            $context["is_admin"] = get_row_data("login_model", "retrieve", array(0 => null, 1 => null, 2 => null, 3 => null, 4 => $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "is_admin");
            // line 137
            echo "                        ";
            if (((isset($context["is_admin"]) ? $context["is_admin"] : null) == 1)) {
                // line 138
                echo "                            <span class=\"label label-warning\">Administrator</span>
                        ";
            }
            // line 140
            echo "                        <br><b>Alamat :</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "alamat"), "html", null, true);
            echo "
                    </td>
                    <td>
                        <ul class=\"nav nav-pills\" style=\"margin-bottom:0px;\">
                            ";
            // line 144
            if ((is_admin() == true)) {
                // line 145
                echo "                            <li><a class=\"btn btn-default btn-small\" href=\"";
                echo twig_escape_filter($this->env, site_url(((("pengajar/detail/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
                echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                            <li class=\"dropdown\">
                                <a class=\"btn btn-default btn-small\" href=\"#\" id=\"act-";
                // line 147
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-edit\"></i> Edit <b class=\"caret\" style=\"margin-top:5px;\"></b></a>
                                <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"act-";
                // line 148
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\">
                                    <li>";
                // line 149
                echo anchor(((("pengajar/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Profil", array("class" => "iframe-4", "title" => "Edit Profil Pengajar"));
                echo "</li>
                                    <li>";
                // line 150
                echo anchor(((("pengajar/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Foto", array("class" => "iframe-5", "title" => "Edit Foto Pengajar"));
                echo "</li>
                                    <li>";
                // line 151
                echo anchor(((("pengajar/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Username", array("class" => "iframe-2", "title" => "Edit Username Pengajar"));
                echo "</li>
                                    <li>";
                // line 152
                echo anchor(((("pengajar/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Password", array("class" => "iframe-3", "title" => "Edit Password Pengajar"));
                echo "</li>
                                </ul>
                            </li>
                            ";
            } elseif ((is_pengajar() == true)) {
                // line 156
                echo "                            <li><a class=\"btn btn-default btn-small\" href=\"";
                echo twig_escape_filter($this->env, site_url(("pengajar/detail/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
                echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                            ";
            }
            // line 158
            echo "                        </ul>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 162
        echo "            </tbody>
        </table>

        ";
        // line 165
        if (((!twig_test_empty((isset($context["pengajar"]) ? $context["pengajar"] : null))) && (((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2)))) {
            // line 166
            echo "        <br>
        <div class=\"row-fluid\">
            <div class=\"span7\">
                <table cellpadding=\"5\">
                    <tr>
                        <th valign=\"top\">Update Status Terpilih</th>
                        <td valign=\"top\">
                            <select name=\"status_id\" style=\"width:100%;\">
                                <option>--Pilih Status--</option>
                                <option value=\"1\">Aktif</option>
                                ";
            // line 176
            if (((isset($context["status_id"]) ? $context["status_id"] : null) == 0)) {
                // line 177
                echo "                                <option value=\"2\">Blocking</option>
                                ";
            }
            // line 179
            echo "                            </select>
                        </td>
                        <td valign=\"top\">
                            <button type=\"submit\" class=\"btn\">Update</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        ";
        }
        // line 189
        echo "
        ";
        // line 190
        echo form_close();
        echo "

        <br>
        ";
        // line 193
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    // line 199
    public function block_js($context, array $blocks = array())
    {
        // line 200
        echo "<script type=\"text/javascript\">
function ch_uch_checkbox(source){
    checkboxes = document.getElementsByName('pengajar_id[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
}
</script>
";
    }

    public function getTemplateName()
    {
        return "list-pengajar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  415 => 200,  412 => 199,  403 => 193,  397 => 190,  394 => 189,  382 => 179,  378 => 177,  376 => 176,  364 => 166,  362 => 165,  357 => 162,  348 => 158,  342 => 156,  335 => 152,  331 => 151,  327 => 150,  323 => 149,  319 => 148,  315 => 147,  309 => 145,  307 => 144,  299 => 140,  295 => 138,  292 => 137,  290 => 136,  284 => 135,  280 => 134,  273 => 131,  267 => 129,  265 => 128,  261 => 126,  257 => 125,  248 => 118,  244 => 116,  242 => 115,  234 => 110,  230 => 108,  223 => 104,  210 => 94,  201 => 88,  192 => 82,  189 => 81,  176 => 79,  172 => 78,  167 => 75,  154 => 73,  150 => 72,  139 => 64,  128 => 56,  122 => 53,  111 => 45,  102 => 39,  94 => 34,  89 => 31,  81 => 26,  77 => 25,  73 => 24,  69 => 23,  61 => 18,  57 => 16,  55 => 15,  50 => 13,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
