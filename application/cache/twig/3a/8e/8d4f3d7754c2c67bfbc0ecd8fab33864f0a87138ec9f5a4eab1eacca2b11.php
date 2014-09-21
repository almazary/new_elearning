<?php

/* default/admin_pengajar/filter.html */
class __TwigTemplate_3a8e8d4f3d7754c2c67bfbc0ecd8fab33864f0a87138ec9f5a4eab1eacca2b11 extends Twig_Template
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
        echo "<div class=\"row-fluid\">
<div class=\"span8\">
    <a href=\"";
        // line 3
        echo twig_escape_filter($this->env, site_url("admin/pengajar/add/1"), "html", null, true);
        echo "\" class=\"btn btn-primary\">Tambah Siswa</a>
</div>

<div class=\"span4\">
    <div class=\"btn-group\">
        ";
        // line 8
        echo anchor("admin/pengajar/list/1", "Aktif", array("class" => "btn"));
        echo "
        ";
        // line 9
        echo anchor("admin/pengajar/list/0", "Pending", array("class" => "btn"));
        echo "
        ";
        // line 10
        echo anchor("admin/pengajar/list/2", "Blocking", array("class" => "btn"));
        echo "
        ";
        // line 11
        echo anchor("admin/pengajar/filter", "<i class=\"icon-search\" style=\"line-height: 0px;\"></i> Filter", array("class" => "btn btn-info"));
        echo "
    </div>
</div>
</div>

<br>

<div class=\"bs-callout bs-callout-info\">
    <b><a id=\"button\" href=\"javascript:void(0)\">PARAMETER PENCARIAN</a></b>
    <script type=\"text/javascript\">
    \$(function() {
        function view_form_search() {
            \$( \"#form-search\" ).toggle();
        }
        ";
        // line 25
        if (array_key_exists("filter", $context)) {
            // line 26
            echo "        view_form_search();
        ";
        }
        // line 28
        echo "        \$( \"#button\" ).click(function() {
        view_form_search();
        });
    });
    </script>
    ";
        // line 33
        echo form_open("admin/pengajar/filter");
        echo "
    <table class=\"table table-condensed\" id=\"form-search\">
        <tr>
            <th width=\"20%\">NIS</th>
            <td>
                <input type=\"text\" name=\"nip\" class=\"span2\" style=\"margin-bottom:0px;\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, set_value("nip", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nip", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nip")) : (""))), "html", null, true);
        echo "\">
            </td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>
                <input type=\"text\" name=\"nama\" class=\"span4\" style=\"margin-bottom:0px;\" value=\"";
        // line 44
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
        // line 52
        echo twig_escape_filter($this->env, set_checkbox("jenis_kelamin[]", "Laki-laki", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin", array(), "any", true, true) && twig_in_filter("Laki-laki", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin")))) ? (true) : (false))), "html", null, true);
        echo "> Laki-laki
                </label>
                <label class=\"checkbox inline\">
                    <input type=\"checkbox\" name=\"jenis_kelamin[]\" value=\"Perempuan\" ";
        // line 55
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
        // line 63
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
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 72
            echo "                        <option value=\"";
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
        // line 74
        echo "                </select>
                <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                    <option value=\"\">Bulan</option>
                    ";
        // line 77
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 78
            echo "                        <option value=\"";
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
        // line 80
        echo "                </select>
                <input type=\"text\" name=\"thn_lahir\" class=\"span1\" maxlength=\"4\" value=\"";
        // line 81
        echo twig_escape_filter($this->env, set_value("thn_lahir", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "thn_lahir", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "thn_lahir")) : (""))), "html", null, true);
        echo "\" placeholder=\"Tahun\">
            </td>
        <tr>
        <tr>
            <th>Alamat</th>
            <td>
                <input type=\"text\" name=\"alamat\" class=\"span4\" style=\"margin-bottom:0px;\" value=\"";
        // line 87
        echo twig_escape_filter($this->env, set_value("alamat", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "alamat", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "alamat")) : (""))), "html", null, true);
        echo "\">
            </td>
        <tr>
        <tr>
            <th>Status</th>
            <td>
                <p style=\"margin-top:0px; margin-bottom:5px;\">
                    <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"status_id[]\" value=\"0\" ";
        // line 94
        echo twig_escape_filter($this->env, set_checkbox("status_id[]", "0", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id", array(), "any", true, true) && twig_in_filter(0, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) ? (true) : (false))), "html", null, true);
        echo "> Pending</label>
                    <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"status_id[]\" value=\"1\" ";
        // line 95
        echo twig_escape_filter($this->env, set_checkbox("status_id[]", "1", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id", array(), "any", true, true) && twig_in_filter(1, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) ? (true) : (false))), "html", null, true);
        echo "> Aktif</label>
                    <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"status_id[]\" value=\"2\" ";
        // line 96
        echo twig_escape_filter($this->env, set_checkbox("status_id[]", "2", ((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id", array(), "any", true, true) && twig_in_filter(2, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) ? (true) : (false))), "html", null, true);
        echo "> Blocking</label>
                </p>
            </td>
        <tr>
        <tr>
            <th>Username</th>
            <td>
                <input type=\"text\" name=\"username\" class=\"span3\" style=\"margin-bottom:0px;\" value=\"";
        // line 103
        echo twig_escape_filter($this->env, set_value("username", (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "username", array(), "any", true, true)) ? ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "username")) : (""))), "html", null, true);
        echo "\">
            </td>
        </tr>
        <tr>
            <th>Opsi</th>
            <td>
                <label><input type=\"checkbox\" name=\"is_admin\" value=\"1\" style=\"margin-top:-2px;\" ";
        // line 109
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
        // line 119
        echo form_close();
        echo "
</div>

<br>

<script>
function ch_uch_checkbox(source){
    checkboxes = document.getElementsByName('pengajar_id[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
}
</script>

";
        // line 133
        echo form_open("admin/pengajar/filter_action");
        echo "
<table class=\"table table-striped\">
    <thead>
        <tr>
            <th width=\"7%\">
                ";
        // line 138
        if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
            // line 139
            echo "                    <input type=\"checkbox\" style=\"margin-top:-2px;\" onclick=\"ch_uch_checkbox(this)\">
                ";
        }
        // line 141
        echo "                No
            </th>
            <th colspan=\"2\">Nip</th>
            <th>Nama</th>
            <th>Status</th>
            <th width=\"22%\"></th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 150
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pengajars"]) ? $context["pengajars"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 151
            echo "        <tr>
            <td>
                ";
            // line 153
            if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
                // line 154
                echo "                    <input type=\"checkbox\" name=\"pengajar_id[]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\" style=\"margin-top:-2px;\">
                ";
            }
            // line 156
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".
            </td>
            <td width=\"5%\">
                <img style=\"height:30px;width:27px;\" class=\"img-polaroid\" src=\"";
            // line 159
            echo twig_escape_filter($this->env, get_url_image_pengajar($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "foto"), "small", $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin")), "html", null, true);
            echo "\">
            </td>
            <td>
                ";
            // line 162
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nip"), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 165
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo "
                ";
            // line 166
            $context["is_admin"] = get_row_data("login_model", "retrieve", array(0 => null, 1 => null, 2 => null, 3 => null, 4 => $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "is_admin");
            // line 167
            echo "                ";
            if (((isset($context["is_admin"]) ? $context["is_admin"] : null) == 1)) {
                // line 168
                echo "                    <br><span class=\"label label-warning\">Admin</span>
                ";
            }
            // line 170
            echo "            </td>
            <td>
                ";
            // line 172
            if (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id") == 0)) {
                // line 173
                echo "                    Pending
                ";
            } elseif (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id") == 1)) {
                // line 175
                echo "                    Aktif
                ";
            } elseif (($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id") == 2)) {
                // line 177
                echo "                    Blocking
                ";
            }
            // line 179
            echo "            </td>
            <td>
                <ul class=\"nav nav-pills\" style=\"margin-bottom:0px;\">
                    <li><a class=\"btn btn-small\" href=\"";
            // line 182
            echo twig_escape_filter($this->env, site_url(((("admin/pengajar/detail/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                    <li class=\"dropdown\">
                        <a class=\"btn btn-small\" href=\"#\" id=\"act-";
            // line 184
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-edit\"></i> Edit <b class=\"caret\" style=\"margin-top:5px;\"></b></a>
                        <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"act-";
            // line 185
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "\">
                            <li>";
            // line 186
            echo anchor(((("admin/pengajar/edit_profile/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Profil", array("class" => "iframe-4", "title" => "Edit Profil Pengajar"));
            echo "</li>
                            <li>";
            // line 187
            echo anchor(((("admin/pengajar/edit_picture/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Foto", array("class" => "iframe-5", "title" => "Edit Foto Pengajar"));
            echo "</li>
                            <li>";
            // line 188
            echo anchor(((("admin/pengajar/edit_username/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Username", array("class" => "iframe-2", "title" => "Edit Username Pengajar"));
            echo "</li>
                            <li>";
            // line 189
            echo anchor(((("admin/pengajar/edit_password/" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "status_id")) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Password", array("class" => "iframe-3", "title" => "Edit Password Pengajar"));
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
        // line 196
        echo "    </tbody>
</table>

";
        // line 199
        if ((!twig_test_empty((isset($context["pengajars"]) ? $context["pengajars"] : null)))) {
            // line 200
            echo "<br>
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
                    <button type=\"submit\" class=\"btn\">Update</button>
                </td>
            </tr>
        </table>
    </div>
</div>
";
        }
        // line 221
        echo "
";
        // line 222
        echo form_close();
        echo "

<br>
";
        // line 225
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/admin_pengajar/filter.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  420 => 225,  414 => 222,  411 => 221,  388 => 200,  386 => 199,  381 => 196,  368 => 189,  364 => 188,  360 => 187,  356 => 186,  352 => 185,  348 => 184,  343 => 182,  338 => 179,  334 => 177,  330 => 175,  326 => 173,  324 => 172,  320 => 170,  316 => 168,  313 => 167,  311 => 166,  307 => 165,  301 => 162,  295 => 159,  288 => 156,  282 => 154,  280 => 153,  276 => 151,  272 => 150,  261 => 141,  257 => 139,  255 => 138,  247 => 133,  230 => 119,  217 => 109,  208 => 103,  198 => 96,  194 => 95,  190 => 94,  180 => 87,  171 => 81,  168 => 80,  155 => 78,  151 => 77,  146 => 74,  133 => 72,  129 => 71,  118 => 63,  107 => 55,  101 => 52,  90 => 44,  81 => 38,  73 => 33,  66 => 28,  62 => 26,  60 => 25,  43 => 11,  39 => 10,  35 => 9,  31 => 8,  23 => 3,  19 => 1,);
    }
}
