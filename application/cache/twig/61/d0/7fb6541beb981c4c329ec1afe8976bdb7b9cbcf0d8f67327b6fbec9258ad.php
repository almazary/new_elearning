<?php

/* detail-jawaban-upload.html */
class __TwigTemplate_61d07fb6541beb981c4c329ec1afe8976bdb7b9cbcf0d8f67327b6fbec9258ad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-iframe.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-iframe.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        if (((isset($context["sudah_dikoreksi"]) ? $context["sudah_dikoreksi"] : null) == false)) {
            // line 5
            echo "    <h4>Koreksi Jawaban</h4>
";
        } else {
            // line 7
            echo "    <h4>Detail Jawaban</h4>
";
        }
        // line 9
        echo "
<table class=\"table table-condensed table-striped\">
    <thead>
        <tr>
            <th>Tgl Mengerjakan</th>
            ";
        // line 14
        if (((isset($context["sudah_dikoreksi"]) ? $context["sudah_dikoreksi"] : null) == true)) {
            // line 15
            echo "            <th>Nilai</th>
            ";
        }
        // line 17
        echo "        </tr>
    </thead>
    <tbody>
        <tr>
            <td>";
        // line 21
        echo twig_escape_filter($this->env, tgl_jam_indo($this->getAttribute((isset($context["history"]) ? $context["history"] : null), "mulai")), "html", null, true);
        echo "</td>
            ";
        // line 22
        if (((isset($context["sudah_dikoreksi"]) ? $context["sudah_dikoreksi"] : null) == true)) {
            // line 23
            echo "            <th>";
            echo twig_escape_filter($this->env, round($this->getAttribute((isset($context["nilai"]) ? $context["nilai"] : null), "nilai"), 2), "html", null, true);
            echo "</th>
            ";
        }
        // line 25
        echo "        </tr>
    </tbody>
</table>
<br>

";
        // line 30
        echo form_open(((("tugas/detail_jawaban/" . $this->getAttribute((isset($context["siswa"]) ? $context["siswa"] : null), "id")) . "/") . $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "id")));
        echo "
<b>File upload</b>
<table class=\"table table-condensed table-striped\">
    <tbody>
        <tr>
            <th>Name</th>
            <td><a href=\"";
        // line 36
        echo twig_escape_filter($this->env, base_url(("userfiles/files/" . $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "name"))), "html", null, true);
        echo "\" target=\"_tab\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "name"), "html", null, true);
        echo "</a></td>
        </tr>
        <tr>
            <th>Server Path</th>
            <td>";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "server_path"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Size</th>
            <td>";
        // line 44
        echo twig_escape_filter($this->env, byte_format($this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "size")), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Modified</th>
            <td>";
        // line 48
        echo twig_escape_filter($this->env, mdate("%d %F %Y %H:%i", $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "date")), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Mime</th>
            <td>";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file_info"]) ? $context["file_info"] : null), "mime"), "html", null, true);
        echo "</td>
        </tr>
    </tbody>
</table>
<br>
<b>Nilai :</b>
<br>
<input type=\"text\" name=\"nilai\" style=\"width:50px;\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["nilai"]) ? $context["nilai"] : null), "nilai"), "html", null, true);
        echo "\">

<hr style=\"margin-top: 5px;\">
";
        // line 62
        if (((isset($context["sudah_dikoreksi"]) ? $context["sudah_dikoreksi"] : null) == false)) {
            // line 63
            echo "<button class=\"btn btn-primary\" type=\"submit\">Simpan Nilai</button>
";
        } else {
            // line 65
            echo "<button class=\"btn btn-primary\" type=\"submit\">Update Nilai</button>
";
        }
        // line 67
        echo "</form>

";
    }

    public function getTemplateName()
    {
        return "detail-jawaban-upload.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 67,  140 => 65,  136 => 63,  134 => 62,  128 => 59,  118 => 52,  111 => 48,  104 => 44,  97 => 40,  88 => 36,  79 => 30,  72 => 25,  66 => 23,  64 => 22,  60 => 21,  54 => 17,  50 => 15,  48 => 14,  41 => 9,  37 => 7,  33 => 5,  31 => 4,  28 => 3,);
    }
}
