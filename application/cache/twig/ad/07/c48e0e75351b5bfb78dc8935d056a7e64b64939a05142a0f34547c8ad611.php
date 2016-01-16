<?php

/* print-nilai.html */
class __TwigTemplate_ad07c48e0e75351b5bfb78dc8935d056a7e64b64939a05142a0f34547c8ad611 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'css' => array($this, 'block_css'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title>Print Nilai</title>
    <link type=\"text/css\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link type=\"text/css\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "bootstrap/css/bootstrap-responsive.min.css\" rel=\"stylesheet\">
    <link type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "images/icons/css/font-awesome.css\" rel=\"stylesheet\">
    ";
        // line 8
        $this->displayBlock('css', $context, $blocks);
        // line 9
        echo "    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
</head>
<body onload=\"window.print()\">
<div class=\"container\">
    <center>
        <h3 style=\"margin-bottom: 0px;line-height: 30px;\">";
        // line 14
        echo twig_escape_filter($this->env, get_pengaturan("nama-sekolah", "value"), "html", null, true);
        echo "</h3>
        ";
        // line 15
        echo twig_escape_filter($this->env, get_pengaturan("alamat", "value"), "html", null, true);
        echo "
    </center>
    <hr style=\"border: none;border-bottom: 2px solid #333;margin-bottom: 10px;margin-top: 10px;\">

    <p><b>Nilai ";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "judul"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "mapel"), "nama"), "html", null, true);
        echo "</b></p>

    ";
        // line 21
        if (($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 3)) {
            // line 22
            echo "    <table class=\"table table-bordered table-striped\">
        <thead>
            <tr>
                <th width=\"5%\">No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Benar</th>
                <th>Salah</th>
                <th>Kosong</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            ";
            // line 36
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["data_nilai"]) ? $context["data_nilai"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
                // line 37
                echo "            <tr>
                <td>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
                echo ".</td>
                <td>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "siswa"), "nis"), "html", null, true);
                echo "</td>
                <td>";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "siswa"), "nama"), "html", null, true);
                echo "</td>
                <td>";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "siswa"), "kelas_aktif"), "nama"), "html", null, true);
                echo "</td>
                <td>";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_benar"), "html", null, true);
                echo "</td>
                <td>";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_salah"), "html", null, true);
                echo "</td>
                <td>";
                // line 44
                echo twig_escape_filter($this->env, (((count($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "pertanyaan")) != ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_benar") + $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_salah")))) ? (abs((count($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "pertanyaan")) - ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_benar") + $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "history"), "value"), "jml_salah"))))) : (0)), "html", null, true);
                echo "</td>
                <td>";
                // line 45
                echo twig_escape_filter($this->env, round($this->getAttribute((isset($context["n"]) ? $context["n"] : null), "nilai"), 2), "html", null, true);
                echo "</td>
            </tr>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "        </tbody>
    </table>
    ";
        }
        // line 51
        echo "
    ";
        // line 52
        if ((($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 2) || ($this->getAttribute((isset($context["tugas"]) ? $context["tugas"] : null), "type_id") == 1))) {
            // line 53
            echo "    <table class=\"table table-bordered table-striped\">
        <thead>
            <tr>
                <th width=\"5%\">No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            ";
            // line 64
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["data_siswa"]) ? $context["data_siswa"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 65
                echo "            <tr>
                <td>";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
                echo ".</td>
                <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nis"), "html", null, true);
                echo "</td>
                <td>";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nama"), "html", null, true);
                echo "</td>
                <td>";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "kelas_aktif"), "nama"), "html", null, true);
                echo "</td>
                <td>";
                // line 70
                echo twig_escape_filter($this->env, round($this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nilai"), "nilai"), 2), "html", null, true);
                echo "</td>
            </tr>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 73
            echo "        </tbody>
    </table>
    ";
        }
        // line 76
        echo "</div>
</body>
</html>";
    }

    // line 8
    public function block_css($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "print-nilai.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  237 => 8,  231 => 76,  226 => 73,  209 => 70,  205 => 69,  201 => 68,  197 => 67,  193 => 66,  190 => 65,  173 => 64,  160 => 53,  158 => 52,  155 => 51,  150 => 48,  133 => 45,  129 => 44,  125 => 43,  121 => 42,  117 => 41,  113 => 40,  109 => 39,  105 => 38,  102 => 37,  85 => 36,  69 => 22,  67 => 21,  60 => 19,  53 => 15,  49 => 14,  40 => 9,  38 => 8,  34 => 7,  30 => 6,  26 => 5,  20 => 1,);
    }
}
