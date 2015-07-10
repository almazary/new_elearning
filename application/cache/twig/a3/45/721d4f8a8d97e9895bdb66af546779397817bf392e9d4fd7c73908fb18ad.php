<?php

/* list-siswa.html */
class __TwigTemplate_a345721d4f8a8d97e9895bdb66af546779397817bf392e9d4fd7c73908fb18ad extends Twig_Template
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
        echo "Data Siswa - ";
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
        <h3>Data Siswa</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("siswa");
        echo "

        <div class=\"row-fluid\">
            <div class=\"span7\">
                <a href=\"";
        // line 17
        echo twig_escape_filter($this->env, site_url(("siswa/add/" . (isset($context["status_id"]) ? $context["status_id"] : null))), "html", null, true);
        echo "\" class=\"btn btn-primary\">Tambah Siswa</a>
            </div>

            <div class=\"span5\">
                <div class=\"btn-group\">
                    ";
        // line 22
        echo anchor("siswa/index/1", "Aktif", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 1)) ? ("btn btn-info") : ("btn btn-default"))));
        echo "
                    ";
        // line 23
        echo anchor("siswa/index/0", "Pending", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0)) ? ("btn btn-info") : ("btn btn-default"))));
        echo "
                    ";
        // line 24
        echo anchor("siswa/index/2", "Blocking", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 2)) ? ("btn btn-info") : ("btn btn-default"))));
        echo "
                    ";
        // line 25
        echo anchor("siswa/index/3", "Alumni", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 3)) ? ("btn btn-info") : ("btn btn-default"))));
        echo "
                    ";
        // line 26
        echo anchor("siswa/filter", "<i class=\"icon-search\" style=\"line-height: 0px;\"></i> Filter", array("class" => "btn btn-default"));
        echo "
                </div>
            </div>
        </div>
        <br>

        ";
        // line 32
        echo form_open(("siswa/index" . (isset($context["status_id"]) ? $context["status_id"] : null)));
        echo "
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"7%\">
                        ";
        // line 37
        if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
            // line 38
            echo "                            <input type=\"checkbox\" style=\"margin-top:-2px;\" onclick=\"ch_uch_checkbox(this)\">
                        ";
        }
        // line 40
        echo "                        ID
                    </th>
                    <th>Informasi Siswa</th>
                    <th width=\"22%\"></th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 47
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["siswas"]) ? $context["siswas"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 48
            echo "                <tr>
                    <td>
                        ";
            // line 50
            if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
                // line 51
                echo "                            <input type=\"checkbox\" name=\"siswa_id[]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\" style=\"margin-top:-2px;\">
                        ";
            }
            // line 53
            echo "                        <b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "</b>
                    </td>
                    <td>
                        <img style=\"height:40px;width:40px; margin-right: 10px;\" class=\"img-polaroid img-circle pull-left\" src=\"";
            // line 56
            echo twig_escape_filter($this->env, get_url_image_siswa($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "foto"), "medium", $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin")), "html", null, true);
            echo "\">
                        <b>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo " ";
            echo (((!twig_test_empty($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nis")))) ? ((("<span class=\"text-muted\">(" . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nis")) . ")</span>")) : (""));
            echo "</b>
                        <br>";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "kelas_aktif"), "nama"), "html", null, true);
            echo " , ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin"), "html", null, true);
            echo " , ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "agama"), "html", null, true);
            echo "
                    </td>
                    <td>
                        <ul class=\"nav nav-pills\" style=\"margin-bottom:0px;\">
                            <li><a class=\"btn btn-default btn-small\" href=\"";
            // line 62
            echo twig_escape_filter($this->env, site_url(((("siswa/detail/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                            <li class=\"dropdown\">
                                <a class=\"btn btn-default btn-small\" href=\"#\" id=\"act-";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-edit\"></i> Edit <b class=\"caret\" style=\"margin-top:5px;\"></b></a>
                                <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"act-";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "\">
                                    <li>";
            // line 66
            echo anchor(((("siswa/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Profil", array("class" => "iframe-4", "title" => "Edit Profil Siswa"));
            echo "</li>
                                    <li>";
            // line 67
            echo anchor(((("siswa/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Foto", array("class" => "iframe-5", "title" => "Edit Foto Siswa"));
            echo "</li>
                                    ";
            // line 68
            if (((isset($context["status_id"]) ? $context["status_id"] : null) != 3)) {
                // line 69
                echo "                                    <li>";
                echo anchor(((("siswa/moved_class/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Kelas Aktif", array("class" => "iframe", "title" => "Edit Kelas Aktif"));
                echo "</li>
                                    ";
            }
            // line 71
            echo "                                    <li>";
            echo anchor(((("siswa/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Username", array("class" => "iframe-2", "title" => "Edit Username Siswa"));
            echo "</li>
                                    <li>";
            // line 72
            echo anchor(((("siswa/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Password", array("class" => "iframe-3", "title" => "Edit Password Siswa"));
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
        // line 79
        echo "            </tbody>
        </table>

        ";
        // line 82
        if (((!twig_test_empty((isset($context["siswas"]) ? $context["siswas"] : null))) && (((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2)))) {
            // line 83
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
            // line 93
            if (((isset($context["status_id"]) ? $context["status_id"] : null) == 0)) {
                // line 94
                echo "                                <option value=\"2\">Blocking</option>
                                ";
            } elseif (((isset($context["status_id"]) ? $context["status_id"] : null) == 2)) {
                // line 96
                echo "                                <option value=\"3\">Alumni</option>
                                ";
            }
            // line 98
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
        // line 108
        echo "
        ";
        // line 109
        echo form_close();
        echo "

        <br>
        ";
        // line 112
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    // line 118
    public function block_js($context, array $blocks = array())
    {
        // line 119
        echo "<script type=\"text/javascript\">
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
        return "list-siswa.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  266 => 119,  263 => 118,  254 => 112,  248 => 109,  245 => 108,  233 => 98,  229 => 96,  225 => 94,  223 => 93,  211 => 83,  209 => 82,  204 => 79,  191 => 72,  186 => 71,  180 => 69,  178 => 68,  174 => 67,  170 => 66,  166 => 65,  162 => 64,  157 => 62,  146 => 58,  140 => 57,  136 => 56,  129 => 53,  123 => 51,  121 => 50,  117 => 48,  113 => 47,  104 => 40,  100 => 38,  98 => 37,  90 => 32,  81 => 26,  77 => 25,  73 => 24,  69 => 23,  65 => 22,  57 => 17,  50 => 13,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
