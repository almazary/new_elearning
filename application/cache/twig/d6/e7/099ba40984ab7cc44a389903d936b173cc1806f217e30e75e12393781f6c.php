<?php

/* filter-pengajar.html */
class __TwigTemplate_d6e7099ba40984ab7cc44a389903d936b173cc1806f217e30e75e12393781f6c extends Twig_Template
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
        echo "Filter Pengajar - ";
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
        <h3>Filter Pengajar</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("pengajar");
        echo "

        <div class=\"row-fluid\">
        <div class=\"span8\">
            <a href=\"";
        // line 17
        echo twig_escape_filter($this->env, site_url("pengajar/add/1"), "html", null, true);
        echo "\" class=\"btn btn-primary\">Tambah Pengajar</a>
        </div>

        <div class=\"span4\">
            <div class=\"btn-group\">
                ";
        // line 22
        echo anchor("pengajar/index/1", "Aktif", array("class" => "btn btn-default"));
        echo "
                ";
        // line 23
        echo anchor("pengajar/index/0", "Pending", array("class" => "btn btn-default"));
        echo "
                ";
        // line 24
        echo anchor("pengajar/index/2", "Blocking", array("class" => "btn btn-default"));
        echo "
                ";
        // line 25
        echo anchor("pengajar/filter", "<i class=\"icon-search\" style=\"line-height: 0px;\"></i> Filter", array("class" => "btn btn-info"));
        echo "
            </div>
        </div>
        </div>

        <br>

        <div class=\"bs-callout bs-callout-info\">
            <b><a id=\"button\" href=\"javascript:void(0)\">PARAMETER PENCARIAN</a></b>
            ";
        // line 34
        echo form_open("pengajar/filter");
        echo "
            <table class=\"table table-condensed\" id=\"form-search\">
                <tr>
                    <th width=\"20%\">NIS</th>
                    <td>
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
        // line 75
        echo "                        </select>
                        <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                            <option value=\"\">Bulan</option>
                            ";
        // line 78
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 79
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
        // line 81
        echo "                        </select>
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
                    <th>Status</th>
                    <td>
                        <p style=\"margin-top:0px; margin-bottom:5px;\">
                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"status_id[]\" value=\"0\" ";
        // line 95
        echo twig_escape_filter($this->env, set_checkbox("status_id[]", "0", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id", array(), "any", true, true) && twig_in_filter(0, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) ? (true) : (false))), "html", null, true);
        echo "> Pending</label>
                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"status_id[]\" value=\"1\" ";
        // line 96
        echo twig_escape_filter($this->env, set_checkbox("status_id[]", "1", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id", array(), "any", true, true) && twig_in_filter(1, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) ? (true) : (false))), "html", null, true);
        echo "> Aktif</label>
                            <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"status_id[]\" value=\"2\" ";
        // line 97
        echo twig_escape_filter($this->env, set_checkbox("status_id[]", "2", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id", array(), "any", true, true) && twig_in_filter(2, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) ? (true) : (false))), "html", null, true);
        echo "> Blocking</label>
                        </p>
                    </td>
                <tr>
                <tr>
                    <th>Username</th>
                    <td>
                        <input type=\"text\" name=\"username\" class=\"span3\" style=\"margin-bottom:0px;\" value=\"";
        // line 104
        echo twig_escape_filter($this->env, set_value("username", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "username", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "username")) : (""))), "html", null, true);
        echo "\">
                    </td>
                </tr>
                <tr>
                    <th>Opsi</th>
                    <td>
                        <label><input type=\"checkbox\" name=\"is_admin\" value=\"1\" style=\"margin-top:-2px;\" ";
        // line 110
        echo twig_escape_filter($this->env, set_checkbox("is_admin", "1", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "is_admin", array(), "any", true, true) && ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "is_admin") == 1))) ? (true) : (false))), "html", null, true);
        echo "> Admin</label>
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
        // line 120
        echo form_close();
        echo "
        </div>

        <br>

        ";
        // line 125
        echo form_open("pengajar/filter_action");
        echo "
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"7%\">
                        ";
        // line 130
        if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
            // line 131
            echo "                            <input type=\"checkbox\" style=\"margin-top:-2px;\" onclick=\"ch_uch_checkbox(this)\">
                        ";
        }
        // line 133
        echo "                        ID
                    </th>
                    <th>Informasi Pengajar</th>
                    <th width=\"22%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 140
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pengajars"]) ? $context["pengajars"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 141
            echo "                <tr>
                    <td>
                        ";
            // line 143
            if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
                // line 144
                echo "                            <input type=\"checkbox\" name=\"pengajar_id[]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\" style=\"margin-top:-2px;\">
                        ";
            }
            // line 146
            echo "                        <b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "</b>
                    </td>
                    <td>
                        <img style=\"height:40px;width:40px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
            // line 149
            echo twig_escape_filter($this->env, get_url_image_pengajar($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "foto"), "medium", $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin")), "html", null, true);
            echo "\">
                        <b>";
            // line 150
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo " ";
            echo (((!twig_test_empty($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nip")))) ? ((("<span class=\"text-muted\">(" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nip")) . ")</span>")) : (""));
            echo "</b>
                        ";
            // line 151
            $context["is_admin"] = get_row_data("login_model", "retrieve", array(0 => null, 1 => null, 2 => null, 3 => null, 4 => $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "is_admin");
            // line 152
            echo "                        ";
            if (((isset($context["is_admin"]) ? $context["is_admin"] : null) == 1)) {
                // line 153
                echo "                            <span class=\"label label-warning\">Admin</span>
                        ";
            }
            // line 155
            echo "                        <br><b>Alamat :</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "alamat"), "html", null, true);
            echo "
                    </td>
                    <td>
                        <ul class=\"nav nav-pills\" style=\"margin-bottom:0px;\">
                            <li><a class=\"btn btn-default btn-small\" href=\"";
            // line 159
            echo twig_escape_filter($this->env, site_url(((("pengajar/detail/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                            <li class=\"dropdown\">
                                <a class=\"btn btn-default btn-small\" href=\"#\" id=\"act-";
            // line 161
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-edit\"></i> Edit <b class=\"caret\" style=\"margin-top:5px;\"></b></a>
                                <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"act-";
            // line 162
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "\">
                                    <li>";
            // line 163
            echo anchor(((("pengajar/edit_profile/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Profil", array("class" => "iframe-4", "title" => "Edit Profil Pengajar"));
            echo "</li>
                                    <li>";
            // line 164
            echo anchor(((("pengajar/edit_picture/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Foto", array("class" => "iframe-5", "title" => "Edit Foto Pengajar"));
            echo "</li>
                                    <li>";
            // line 165
            echo anchor(((("pengajar/edit_username/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Username", array("class" => "iframe-2", "title" => "Edit Username Pengajar"));
            echo "</li>
                                    <li>";
            // line 166
            echo anchor(((("pengajar/edit_password/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Password", array("class" => "iframe-3", "title" => "Edit Password Pengajar"));
            echo "</li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['no'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 173
        echo "            </tbody>
        </table>

        ";
        // line 176
        if ((!twig_test_empty((isset($context["pengajars"]) ? $context["pengajars"] : null)))) {
            // line 177
            echo "        <br>
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
                            </select>
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
        // line 198
        echo "
        ";
        // line 199
        echo form_close();
        echo "

        <br>
        ";
        // line 202
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    // line 208
    public function block_js($context, array $blocks = array())
    {
        // line 209
        echo "<script type=\"text/javascript\">
function ch_uch_checkbox(source){
    checkboxes = document.getElementsByName('pengajar_id[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
}

\$(function() {
    function view_form_search() {
        \$( \"#form-search\" ).toggle();
    }
    ";
        // line 221
        if ((!twig_test_empty((isset($context["filter"]) ? $context["filter"] : null)))) {
            // line 222
            echo "    view_form_search();
    ";
        }
        // line 224
        echo "    \$( \"#button\" ).click(function() {
    view_form_search();
    });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "filter-pengajar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  436 => 224,  432 => 222,  430 => 221,  416 => 209,  413 => 208,  404 => 202,  398 => 199,  395 => 198,  372 => 177,  370 => 176,  365 => 173,  352 => 166,  348 => 165,  344 => 164,  340 => 163,  336 => 162,  332 => 161,  327 => 159,  319 => 155,  315 => 153,  312 => 152,  310 => 151,  304 => 150,  300 => 149,  293 => 146,  287 => 144,  285 => 143,  281 => 141,  277 => 140,  268 => 133,  264 => 131,  262 => 130,  254 => 125,  246 => 120,  233 => 110,  224 => 104,  214 => 97,  210 => 96,  206 => 95,  196 => 88,  187 => 82,  184 => 81,  171 => 79,  167 => 78,  162 => 75,  149 => 73,  145 => 72,  134 => 64,  123 => 56,  117 => 53,  106 => 45,  97 => 39,  89 => 34,  77 => 25,  73 => 24,  69 => 23,  65 => 22,  57 => 17,  50 => 13,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
