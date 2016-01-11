<?php

/* filter-siswa.html */
class __TwigTemplate_1f344d78cf1016bb32fdc915d43b0cfb780c8101177a582a8189daee14695f58 extends Twig_Template
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
        echo "Filter Siswa - ";
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
        <h3>Filter Siswa</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("siswa");
        echo "

        ";
        // line 15
        if ((is_admin() == true)) {
            // line 16
            echo "        <div class=\"row-fluid\">
            <div class=\"span7\">
                <a href=\"";
            // line 18
            echo twig_escape_filter($this->env, site_url("siswa/add/1"), "html", null, true);
            echo "\" class=\"btn btn-primary\">Tambah Siswa</a>
                <a href=\"";
            // line 19
            echo twig_escape_filter($this->env, site_url("plugins/import_export_siswa/import_excel"), "html", null, true);
            echo "\" class=\"btn btn-default\">Import Excel</a>
            </div>

            <div class=\"span5\">
                <div class=\"btn-group\">
                    ";
            // line 24
            echo anchor("siswa/index/1", "Aktif", array("class" => "btn btn-default"));
            echo "
                    ";
            // line 25
            echo anchor("siswa/index/0", "Pending", array("class" => "btn btn-default"));
            echo "
                    ";
            // line 26
            echo anchor("siswa/index/2", "Blocking", array("class" => "btn btn-default"));
            echo "
                    ";
            // line 27
            echo anchor("siswa/index/3", "Alumni", array("class" => "btn btn-default"));
            echo "
                    ";
            // line 28
            echo anchor("siswa/filter", "<i class=\"icon-search\" style=\"line-height: 0px;\"></i> Filter", array("class" => "btn btn-info"));
            echo "
                </div>
            </div>
        </div>
        <br>
        ";
        }
        // line 34
        echo "
        <div class=\"bs-callout bs-callout-info\">
            <b><a id=\"button\" href=\"javascript:void(0)\">PARAMETER PENCARIAN</a></b>
            ";
        // line 37
        echo form_open("siswa/filter");
        echo "
            <table class=\"table table-condensed\" id=\"form-search\">
                <tr>
                    <th width=\"20%\">NIS</th>
                    <td>
                        <input type=\"text\" name=\"nis\" class=\"span2\" style=\"margin-bottom:0px;\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, set_value("nis", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nis", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nis")) : (""))), "html", null, true);
        echo "\">
                    </td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>
                        <input type=\"text\" name=\"nama\" class=\"span4\" style=\"margin-bottom:0px;\" value=\"";
        // line 48
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
        // line 56
        echo twig_escape_filter($this->env, set_checkbox("jenis_kelamin[]", "Laki-laki", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin", array(), "any", true, true) && twig_in_filter("Laki-laki", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin")))) ? (true) : (false))), "html", null, true);
        echo "> Laki-laki
                        </label>
                        <label class=\"checkbox inline\">
                            <input type=\"checkbox\" name=\"jenis_kelamin[]\" value=\"Perempuan\" ";
        // line 59
        echo twig_escape_filter($this->env, set_checkbox("jenis_kelamin[]", "Perempuan", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin", array(), "any", true, true) && twig_in_filter("Perempuan", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin")))) ? (true) : (false))), "html", null, true);
        echo "> Perempuan
                        </label>
                        </p>
                    </td>
                <tr>
                <tr>
                    <th>Tahun Masuk</th>
                    <td>
                        <input type=\"text\" name=\"tahun_masuk\" maxlength=\"4\" style=\"width:15%;margin-bottom:0px;\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, set_value("tahun_masuk", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tahun_masuk", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tahun_masuk")) : (""))), "html", null, true);
        echo "\">
                    </td>
                <tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>
                        <input type=\"text\" name=\"tempat_lahir\" class=\"span3\" style=\"margin-bottom:0px;\" value=\"";
        // line 73
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
        // line 81
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 82
            echo "                                <option value=\"";
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
        // line 84
        echo "                        </select>
                        <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                            <option value=\"\">Bulan</option>
                            ";
        // line 87
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 88
            echo "                                <option value=\"";
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
        // line 90
        echo "                        </select>
                        <input type=\"text\" name=\"thn_lahir\" class=\"span1\" maxlength=\"4\" value=\"";
        // line 91
        echo twig_escape_filter($this->env, set_value("thn_lahir", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "thn_lahir", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "thn_lahir")) : (""))), "html", null, true);
        echo "\" placeholder=\"Tahun\">
                    </td>
                <tr>
                <tr>
                    <th>Alamat</th>
                    <td>
                        <input type=\"text\" name=\"alamat\" class=\"span4\" style=\"margin-bottom:0px;\" value=\"";
        // line 97
        echo twig_escape_filter($this->env, set_value("alamat", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "alamat", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "alamat")) : (""))), "html", null, true);
        echo "\">
                    </td>
                <tr>
                <tr>
                    <th>Agama</th>
                    <td>
                        <p style=\"margin-top:0px; margin-bottom:5px;\">
                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"agama[]\" value=\"ISLAM\" ";
        // line 104
        echo twig_escape_filter($this->env, set_checkbox("agama[]", "ISLAM", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama", array(), "any", true, true) && twig_in_filter("ISLAM", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama")))) ? (true) : (false))), "html", null, true);
        echo ">ISLAM</label>
                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"agama[]\" value=\"KRISTEN\" ";
        // line 105
        echo twig_escape_filter($this->env, set_checkbox("agama[]", "KRISTEN", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama", array(), "any", true, true) && twig_in_filter("KRISTEN", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama")))) ? (true) : (false))), "html", null, true);
        echo ">KRISTEN</label>
                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"agama[]\" value=\"KATOLIK\" ";
        // line 106
        echo twig_escape_filter($this->env, set_checkbox("agama[]", "KATOLIK", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama", array(), "any", true, true) && twig_in_filter("KATOLIK", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama")))) ? (true) : (false))), "html", null, true);
        echo ">KATOLIK</label>
                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"agama[]\" value=\"HINDU\" ";
        // line 107
        echo twig_escape_filter($this->env, set_checkbox("agama[]", "HINDU", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama", array(), "any", true, true) && twig_in_filter("HINDU", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama")))) ? (true) : (false))), "html", null, true);
        echo ">HINDU</label>
                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"agama[]\" value=\"BUDHA\" ";
        // line 108
        echo twig_escape_filter($this->env, set_checkbox("agama[]", "BUDHA", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama", array(), "any", true, true) && twig_in_filter("BUDHA", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama")))) ? (true) : (false))), "html", null, true);
        echo ">BUDHA</label>
                        </p>
                    </td>
                <tr>
                <tr>
                    <th>Kelas</th>
                    <td>
                        <ul class=\"unstyled inline\" style=\"margin-left: -5px;\">
                            ";
        // line 116
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["kelas_all"]) ? $context["kelas_all"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
            // line 117
            echo "                                <li><label class=\"checkbox inline\"><input type=\"checkbox\" name=\"kelas_id[]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, set_checkbox("kelas_id[]", $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "kelas_id", array(), "any", true, true) && twig_in_filter($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "kelas_id")))) ? (true) : (false))), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
            echo "</label></li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 119
        echo "                        </ul>
                    </td>
                <tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <p style=\"margin-top:0px; margin-bottom:5px;\">
                            ";
        // line 126
        if (is_admin()) {
            // line 127
            echo "                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"status_id[]\" value=\"0\" ";
            echo twig_escape_filter($this->env, set_checkbox("status_id[]", "0", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id", array(), "any", true, true) && twig_in_filter(0, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) ? (true) : (false))), "html", null, true);
            echo "> Pending</label>
                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"status_id[]\" value=\"1\" ";
            // line 128
            echo twig_escape_filter($this->env, set_checkbox("status_id[]", "1", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id", array(), "any", true, true) && twig_in_filter(1, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) ? (true) : (false))), "html", null, true);
            echo "> Aktif</label>
                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"status_id[]\" value=\"2\" ";
            // line 129
            echo twig_escape_filter($this->env, set_checkbox("status_id[]", "2", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id", array(), "any", true, true) && twig_in_filter(2, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) ? (true) : (false))), "html", null, true);
            echo "> Blocking</label>
                            ";
        }
        // line 131
        echo "                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"status_id[]\" value=\"3\" ";
        echo twig_escape_filter($this->env, set_checkbox("status_id[]", "3", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id", array(), "any", true, true) && twig_in_filter(3, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) ? (true) : (false))), "html", null, true);
        echo "> Alumni</label>
                        </p>
                    </td>
                <tr>
                ";
        // line 135
        if (is_admin()) {
            // line 136
            echo "                <tr>
                    <th>Username</th>
                    <td>
                        <input type=\"text\" name=\"username\" class=\"span3\" style=\"margin-bottom:0px;\" value=\"";
            // line 139
            echo twig_escape_filter($this->env, set_value("username", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "username", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "username")) : (""))), "html", null, true);
            echo "\">
                    </td>
                </tr>
                ";
        }
        // line 143
        echo "                <tr>
                    <td></td>
                    <td>
                        <button type=\"submit\" class=\"btn btn-primary\">Filter</button>
                    </td>
                </tr>
            </table>
            ";
        // line 150
        echo form_close();
        echo "
        </div>

        <br>

        ";
        // line 155
        echo form_open("siswa/filter_action");
        echo "
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"7%\">
                        ";
        // line 160
        if ((is_admin() && (((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2)))) {
            // line 161
            echo "                            <input type=\"checkbox\" style=\"margin-top:-2px;\" onclick=\"ch_uch_checkbox(this)\">
                        ";
        }
        // line 163
        echo "                        ID
                    </th>
                    <th>Informasi Siswa</th>
                    <th width=\"22%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 170
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["siswas"]) ? $context["siswas"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 171
            echo "                <tr>
                    <td>
                        ";
            // line 173
            if (is_admin()) {
                // line 174
                echo "                        <input type=\"checkbox\" name=\"siswa_id[]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\" style=\"margin-top:-2px;\" ";
                echo ((($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id") == 3)) ? ("disabled") : (""));
                echo ">
                        ";
            }
            // line 176
            echo "                        <b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "</b>
                    </td>
                    <td>
                        <img style=\"height:40px;width:40px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
            // line 179
            echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "foto"), "medium", $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin")), "html", null, true);
            echo "\">
                        <b>";
            // line 180
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo " ";
            echo (((!twig_test_empty($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nis")))) ? ((("<span class=\"text-muted\">(" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nis")) . ")</span>")) : (""));
            echo "</b>
                        <br>";
            // line 181
            echo ((($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id") != 3)) ? ($this->getAttribute($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "kelas_aktif"), "nama")) : ("<b class=\"text-success\">Alumni</b>"));
            echo " , ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin"), "html", null, true);
            echo " , ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "agama"), "html", null, true);
            echo "
                    </td>
                    <td>
                        <ul class=\"nav nav-pills\" style=\"margin-bottom:0px;\">
                            ";
            // line 185
            if (is_admin()) {
                // line 186
                echo "                            <li><a class=\"btn btn-default btn-small\" href=\"";
                echo twig_escape_filter($this->env, site_url(((("siswa/detail/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
                echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                            <li class=\"dropdown\">
                                <a class=\"btn btn-default btn-small\" href=\"#\" id=\"act-";
                // line 188
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-edit\"></i> Edit <b class=\"caret\" style=\"margin-top:5px;\"></b></a>
                                <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"act-";
                // line 189
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\">
                                    <li>";
                // line 190
                echo anchor(((("siswa/edit_profile/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Profil", array("class" => "iframe-4", "title" => "Edit Profil Siswa"));
                echo "</li>
                                    <li>";
                // line 191
                echo anchor(((("siswa/edit_picture/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Foto", array("class" => "iframe-5", "title" => "Edit Foto Siswa"));
                echo "</li>
                                    ";
                // line 192
                if (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id") != 3)) {
                    // line 193
                    echo "                                    <li>";
                    echo anchor(((("siswa/moved_class/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Kelas Aktif", array("class" => "iframe", "title" => "Edit Kelas Aktif"));
                    echo "</li>
                                    ";
                }
                // line 195
                echo "                                    <li>";
                echo anchor(((("siswa/edit_username/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Username", array("class" => "iframe-2", "title" => "Edit Username Siswa"));
                echo "</li>
                                    <li>";
                // line 196
                echo anchor(((("siswa/edit_password/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Password", array("class" => "iframe-3", "title" => "Edit Password Siswa"));
                echo "</li>
                                </ul>
                            </li>
                            ";
            } else {
                // line 200
                echo "                            <li><a class=\"btn btn-default btn-small\" href=\"";
                echo twig_escape_filter($this->env, site_url(("siswa/detail/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
                echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                            ";
            }
            // line 202
            echo "                        </ul>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 206
        echo "            </tbody>
        </table>

        ";
        // line 209
        if ((is_admin() && (!twig_test_empty((isset($context["siswas"]) ? $context["siswas"] : null))))) {
            // line 210
            echo "        <br>
        <a class=\"pull-right btn btn-default\" href=\"";
            // line 211
            echo twig_escape_filter($this->env, site_url("plugins/import_export_siswa/export_excel"), "html", null, true);
            echo "\" target=\"_blank\">Export excel</a>
        <div class=\"row-fluid\">
            <div class=\"span8\">
                <table cellpadding=\"5\">
                    <tr>
                        <th valign=\"top\">Aksi Terpilih</th>
                        <td valign=\"top\">
                            <select name=\"status_id\" style=\"width:auto;\">
                                <option value=\"\">--Update Status--</option>
                                <option value=\"1\">Aktif</option>
                                <option value=\"2\">Blocking</option>
                                <option value=\"3\">Alumni</option>
                            </select>
                        </td>
                        <td valign=\"top\">
                            <select name=\"kelas_id\" style=\"width:auto;\">
                                <option value=\"\">--Pindah Kelas--</option>
                                ";
            // line 228
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["kelas"]) ? $context["kelas"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                // line 229
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama"), "html", null, true);
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 231
            echo "                            </select>
                        </td>
                        <td valign=\"top\">
                            <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        ";
        }
        // line 241
        echo "
        ";
        // line 242
        echo form_close();
        echo "

        <br>
        ";
        // line 245
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    // line 251
    public function block_js($context, array $blocks = array())
    {
        // line 252
        echo "<script type=\"text/javascript\">
\$(function() {
    function view_form_search() {
        \$(\"#form-search\").toggle();
    }
    ";
        // line 257
        if ((!twig_test_empty((isset($context["filter"]) ? $context["filter"] : null)))) {
            // line 258
            echo "    view_form_search();
    ";
        }
        // line 260
        echo "    \$( \"#button\" ).click(function() {
    view_form_search();
    });
});

function ch_uch_checkbox(source){
    checkboxes = document.getElementsByName('siswa_id[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
}
</script>
";
    }

    public function getTemplateName()
    {
        return "filter-siswa.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  556 => 260,  552 => 258,  550 => 257,  543 => 252,  540 => 251,  531 => 245,  525 => 242,  522 => 241,  510 => 231,  499 => 229,  495 => 228,  475 => 211,  472 => 210,  470 => 209,  465 => 206,  456 => 202,  450 => 200,  443 => 196,  438 => 195,  432 => 193,  430 => 192,  426 => 191,  422 => 190,  418 => 189,  414 => 188,  408 => 186,  406 => 185,  395 => 181,  389 => 180,  385 => 179,  378 => 176,  370 => 174,  368 => 173,  364 => 171,  360 => 170,  351 => 163,  347 => 161,  345 => 160,  337 => 155,  329 => 150,  320 => 143,  313 => 139,  308 => 136,  306 => 135,  298 => 131,  293 => 129,  289 => 128,  284 => 127,  282 => 126,  273 => 119,  260 => 117,  256 => 116,  245 => 108,  241 => 107,  237 => 106,  233 => 105,  229 => 104,  219 => 97,  210 => 91,  207 => 90,  194 => 88,  190 => 87,  185 => 84,  172 => 82,  168 => 81,  157 => 73,  148 => 67,  137 => 59,  131 => 56,  120 => 48,  111 => 42,  103 => 37,  98 => 34,  89 => 28,  85 => 27,  81 => 26,  77 => 25,  73 => 24,  65 => 19,  61 => 18,  57 => 16,  55 => 15,  50 => 13,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
