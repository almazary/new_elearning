<?php

/* default/admin_pengajar/list.html */
class __TwigTemplate_746efa121f3c85817f23bd29b2a0c6d026fab6525a3a6fc83167bdb4818f5edc extends Twig_Template
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
        echo "
<div class=\"row-fluid\">
<div class=\"span8\">
    <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, site_url(("admin/pengajar/add/" . (isset($context["status_id"]) ? $context["status_id"] : null))), "html", null, true);
        echo "\" class=\"btn btn-primary\">Tambah Pengajar</a>
</div>

<div class=\"span4\">
    <div class=\"btn-group\">
        ";
        // line 9
        echo anchor("admin/pengajar/list/1", "Aktif", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 1)) ? ("btn btn-info") : ("btn"))));
        echo "
        ";
        // line 10
        echo anchor("admin/pengajar/list/0", "Pending", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0)) ? ("btn btn-info") : ("btn"))));
        echo "
        ";
        // line 11
        echo anchor("admin/pengajar/list/2", "Blocking", array("class" => ((((isset($context["status_id"]) ? $context["status_id"] : null) == 2)) ? ("btn btn-info") : ("btn"))));
        echo "
        ";
        // line 12
        echo anchor("admin/pengajar/filter", "<i class=\"icon-search\" style=\"line-height: 0px;\"></i> Filter", array("class" => "btn"));
        echo "
    </div>
</div>

<br><br>
";
        // line 17
        if (((isset($context["status_id"]) ? $context["status_id"] : null) == 1)) {
            // line 18
            echo "<p class=\"text-warning\"><b>NB: </b> Pengajar tidak dapat dihapus namun dapat di ubah menjadi blocking.</p>
";
        }
        // line 20
        echo "
<script>
function ch_uch_checkbox(source){
    checkboxes = document.getElementsByName('pengajar_id[]');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
    }
}
</script>

";
        // line 30
        echo form_open(("admin/pengajar/list" . (isset($context["status_id"]) ? $context["status_id"] : null)));
        echo "
<table class=\"table table-striped\">
    <thead>
        <tr>
            <th width=\"7%\">
                ";
        // line 35
        if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
            // line 36
            echo "                    <input type=\"checkbox\" style=\"margin-top:-2px;\" onclick=\"ch_uch_checkbox(this)\">
                ";
        }
        // line 38
        echo "                No
            </th>
            <th colspan=\"2\">Nip</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th width=\"22%\"></th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 47
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pengajar"]) ? $context["pengajar"] : null));
        foreach ($context['_seq'] as $context["no"] => $context["v"]) {
            // line 48
            echo "        <tr>
            <td>
                ";
            // line 50
            if ((((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2))) {
                // line 51
                echo "                    <input type=\"checkbox\" name=\"pengajar_id[]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
                echo "\" style=\"margin-top:-2px;\">
                ";
            }
            // line 53
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["no"]) ? $context["no"] : null), "html", null, true);
            echo ".
            </td>
            <td width=\"5%\">
                <img style=\"height:30px;width:27px;\" class=\"img-polaroid\" src=\"";
            // line 56
            echo twig_escape_filter($this->env, get_url_image_pengajar($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "foto"), "small", $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin")), "html", null, true);
            echo "\">
            </td>
            <td>
                ";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nip"), "html", null, true);
            echo "
            </td>
            <td>
                ";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "nama"), "html", null, true);
            echo "
                ";
            // line 63
            $context["is_admin"] = get_row_data("login_model", "retrieve", array(0 => null, 1 => null, 2 => null, 3 => null, 4 => $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "is_admin");
            // line 64
            echo "                ";
            if (((isset($context["is_admin"]) ? $context["is_admin"] : null) == 1)) {
                // line 65
                echo "                    <br><span class=\"label label-warning\">Admin</span>
                ";
            }
            // line 67
            echo "            </td>
            <td>
                ";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "jenis_kelamin"), "html", null, true);
            echo "
            </td>
            <td>
                <ul class=\"nav nav-pills\" style=\"margin-bottom:0px;\">
                    <li><a class=\"btn btn-small\" href=\"";
            // line 73
            echo twig_escape_filter($this->env, site_url(((("admin/pengajar/detail/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"))), "html", null, true);
            echo "\"><i class=\"icon-zoom-in\"></i> Detail</a></li>
                    <li class=\"dropdown\">
                        <a class=\"btn btn-small\" href=\"#\" id=\"act-";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-edit\"></i> Edit <b class=\"caret\" style=\"margin-top:5px;\"></b></a>
                        <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"act-";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id"), "html", null, true);
            echo "\">
                            <li>";
            // line 77
            echo anchor(((("admin/pengajar/edit_profile/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Profil", array("class" => "iframe-4", "title" => "Edit Profil Pengajar"));
            echo "</li>
                            <li>";
            // line 78
            echo anchor(((("admin/pengajar/edit_picture/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Foto", array("class" => "iframe-5", "title" => "Edit Foto Pengajar"));
            echo "</li>
                            <li>";
            // line 79
            echo anchor(((("admin/pengajar/moved_class/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Mapel Ajar", array("class" => "iframe", "title" => "Edit Mapel Ajar"));
            echo "</li>
                            <li>";
            // line 80
            echo anchor(((("admin/pengajar/edit_username/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Username", array("class" => "iframe-2", "title" => "Edit Username Pengajar"));
            echo "</li>
                            <li>";
            // line 81
            echo anchor(((("admin/pengajar/edit_password/" . (isset($context["status_id"]) ? $context["status_id"] : null)) . "/") . $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "id")), "Edit Password", array("class" => "iframe-3", "title" => "Edit Password Pengajar"));
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
        echo "    </tbody>
</table>

";
        // line 91
        if (((!twig_test_empty((isset($context["pengajar"]) ? $context["pengajar"] : null))) && (((isset($context["status_id"]) ? $context["status_id"] : null) == 0) || ((isset($context["status_id"]) ? $context["status_id"] : null) == 2)))) {
            // line 92
            echo "<br>
<div class=\"row-fluid\">
    <div class=\"span7\">
        <table cellpadding=\"5\">
            <tr>
                <th valign=\"top\">Update Status Terpilih</th>
                <td valign=\"top\">
                    <select name=\"status_id\" style=\"width:100%;\">
                        <option>--Pilih Status--</option>
                        <option value=\"1\">Aktif</option>
                        <?php if (\$status_id == 0): ?>
                        <option value=\"2\">Blocking</option>
                        <?php endif; ?>
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
        // line 115
        echo "
";
        // line 116
        echo form_close();
        echo "

<br>
";
        // line 119
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

</div>

";
    }

    public function getTemplateName()
    {
        return "default/admin_pengajar/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  237 => 119,  231 => 116,  228 => 115,  203 => 92,  201 => 91,  196 => 88,  183 => 81,  179 => 80,  175 => 79,  171 => 78,  167 => 77,  163 => 76,  159 => 75,  154 => 73,  147 => 69,  143 => 67,  139 => 65,  136 => 64,  134 => 63,  130 => 62,  124 => 59,  118 => 56,  111 => 53,  105 => 51,  103 => 50,  99 => 48,  95 => 47,  84 => 38,  80 => 36,  78 => 35,  70 => 30,  58 => 20,  54 => 18,  52 => 17,  44 => 12,  40 => 11,  36 => 10,  32 => 9,  24 => 4,  19 => 1,);
    }
}
