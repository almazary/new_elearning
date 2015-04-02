<?php

/* admin_siswa/list.html */
class __TwigTemplate_48db95a090a0d73f645b1ed695b7669fd08705bd3f45aa14781fcdafacf659ac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
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
        echo get_flashdata("siswa");
        echo "

        <div class=\"row-fluid\">
            <div class=\"span7\">
                <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, site_url(("admin/siswa/add/" . (isset($context["status_id"]) ? $context["status_id"] : null))), "html", null, true);
        echo "\" class=\"btn btn-primary\">Tambah Siswa</a>
            </div>

            <div class=\"span5\">
                <div class=\"btn-group\">
                    ";
        // line 18
        echo anchor("admin/siswa/list/1", "Aktif", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 1)) ? ("btn btn-info") : ("btn btn-default"))));
        echo "
                    ";
        // line 19
        echo anchor("admin/siswa/list/0", "Pending", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0)) ? ("btn btn-info") : ("btn btn-default"))));
        echo "
                    ";
        // line 20
        echo anchor("admin/siswa/list/2", "Blocking", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 2)) ? ("btn btn-info") : ("btn btn-default"))));
        echo "
                    ";
        // line 21
        echo anchor("admin/siswa/list/3", "Alumni", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 3)) ? ("btn btn-info") : ("btn btn-default"))));
        echo "
                    ";
        // line 22
        echo anchor("admin/siswa/filter", "<i class=\"icon-search\" style=\"line-height: 0px;\"></i> Filter", array("class" => "btn btn-default"));
        echo "
                </div>
            </div>
        </div>
        <br>
        ";
        // line 27
        if (((isset($context["status_id"]) ? $context["status_id"] : null) == 1)) {
            // line 28
            echo "        <p><b>Note: </b> Siswa tidak dapat dihapus namun dapat di ubah menjadi blocking.</p>
        ";
        }
        // line 30
        echo "
        ";
        // line 31
        echo form_open(("admin/siswa/list" . (isset($context["status_id"]) ? $context["status_id"] : null)));
        echo "
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"7%\">
                        ";
        // line 36
        if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
            // line 37
            echo "                            <input type=\"checkbox\" style=\"margin-top:-2px;\" onclick=\"ch_uch_checkbox(this)\">
                        ";
        }
        // line 39
        echo "                        No
                    </th>
                    <th colspan=\"2\">Nis</th>
                    <th>Nama</th>
                    <th width=\"15%\">Kelas</th>
                    <th width=\"22%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["siswas"]) ? $context["siswas"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 49
            echo "                <tr>
                    <td>
                        ";
            // line 51
            if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
                // line 52
                echo "                            <input type=\"checkbox\" name=\"siswa_id[]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\" style=\"margin-top:-2px;\">
                        ";
            }
            // line 54
            echo "                        ";
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".
                    </td>
                    <td width=\"5%\">
                        <img style=\"height:30px;width:27px;\" class=\"img-polaroid\" src=\"";
            // line 57
            echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "foto"), "small", $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin")), "html", null, true);
            echo "\">
                    </td>
                    <td>
                        ";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nis"), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo "
                    </td>
                    <td>
                        ";
            // line 66
            $context["kelas_aktif"] = get_row_data("kelas_model", "retrieve_siswa", array(0 => null, 1 => array("siswa_id" => $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "aktif" => "1")));
            // line 67
            echo "                        ";
            echo twig_escape_filter($this->env, get_row_data("kelas_model", "retrieve", array(0 => $this->getAttribute((isset($context["kelas_aktif"]) ? $context["kelas_aktif"] : null), "kelas_id"), 1 => true), "nama"), "html", null, true);
            echo "
                    </td>
                    <td>
                        <ul class=\"nav nav-pills\" style=\"margin-bottom:0px;\">
                            <li><a class=\"btn btn-default btn-small\" href=\"";
            // line 71
            echo twig_escape_filter($this->env, site_url(((("admin/siswa/detail/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                            <li class=\"dropdown\">
                                <a class=\"btn btn-default btn-small\" href=\"#\" id=\"act-";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-edit\"></i> Edit <b class=\"caret\" style=\"margin-top:5px;\"></b></a>
                                <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"act-";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "\">
                                    <li>";
            // line 75
            echo anchor(((("admin/siswa/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Profil", array("class" => "iframe-4", "title" => "Edit Profil Siswa"));
            echo "</li>
                                    <li>";
            // line 76
            echo anchor(((("admin/siswa/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Foto", array("class" => "iframe-5", "title" => "Edit Foto Siswa"));
            echo "</li>
                                    ";
            // line 77
            if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
                // line 78
                echo "                                    <li>";
                echo anchor(((("admin/siswa/moved_class/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Kelas Aktif", array("class" => "iframe", "title" => "Edit Kelas Aktif"));
                echo "</li>
                                    ";
            }
            // line 80
            echo "                                    <li>";
            echo anchor(((("admin/siswa/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Username", array("class" => "iframe-2", "title" => "Edit Username Siswa"));
            echo "</li>
                                    <li>";
            // line 81
            echo anchor(((("admin/siswa/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Password", array("class" => "iframe-3", "title" => "Edit Password Siswa"));
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
        // line 88
        echo "            </tbody>
        </table>

        ";
        // line 91
        if (((!twig_test_empty((isset($context["siswas"]) ? $context["siswas"] : null))) && (((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2)))) {
            // line 92
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
            // line 102
            if (((isset($context["status_id"]) ? $context["status_id"] : null) == 0)) {
                // line 103
                echo "                                <option value=\"2\">Blocking</option>
                                ";
            } elseif (((isset($context["status_id"]) ? $context["status_id"] : null) == 2)) {
                // line 105
                echo "                                <option value=\"3\">Alumni</option>
                                ";
            }
            // line 107
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
        // line 117
        echo "
        ";
        // line 118
        echo form_close();
        echo "

        <br>
        ";
        // line 121
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    // line 127
    public function block_js($context, array $blocks = array())
    {
        // line 128
        $this->displayParentBlock("js", $context, $blocks);
        echo "
<script type=\"text/javascript\">
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
        return "admin_siswa/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  275 => 128,  272 => 127,  263 => 121,  257 => 118,  254 => 117,  242 => 107,  238 => 105,  234 => 103,  232 => 102,  220 => 92,  218 => 91,  213 => 88,  200 => 81,  195 => 80,  189 => 78,  187 => 77,  183 => 76,  179 => 75,  175 => 74,  171 => 73,  166 => 71,  158 => 67,  156 => 66,  150 => 63,  144 => 60,  138 => 57,  131 => 54,  125 => 52,  123 => 51,  119 => 49,  115 => 48,  104 => 39,  100 => 37,  98 => 36,  90 => 31,  87 => 30,  83 => 28,  81 => 27,  73 => 22,  69 => 21,  65 => 20,  61 => 19,  57 => 18,  49 => 13,  42 => 9,  36 => 6,  32 => 4,  29 => 3,);
    }
}
