<?php

/* export-excel-filter-siswa.html */
class __TwigTemplate_5eafd8fa07b170d5d77bd5593ba1210312500f86f4562da55113a22d42a7e86a extends Twig_Template
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
        echo "<p><b>";
        echo twig_escape_filter($this->env, get_pengaturan("nama-sekolah", "value"), "html", null, true);
        echo "</b></p>

<p>Parameter export : </p>
<table border=\"1\">
    ";
        // line 5
        if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nis")))) {
            // line 6
            echo "    <tr>
        <td>NIS</td>
        <td>
            ";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nis"), "html", null, true);
            echo "
        </td>
    </tr>
    ";
        }
        // line 13
        echo "    ";
        if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nama")))) {
            // line 14
            echo "    <tr>
        <td>Nama</td>
        <td>
            ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "nama"), "html", null, true);
            echo "
        </td>
    </tr>
    ";
        }
        // line 21
        echo "    ";
        if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin")))) {
            // line 22
            echo "    <tr>
        <td>Jenis Kelamin</td>
        <td>
            ";
            // line 25
            if (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin", array(), "any", true, true) && twig_in_filter("Laki-laki", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin")))) {
                // line 26
                echo "            Laki-laki &nbsp;
            ";
            }
            // line 28
            echo "
            ";
            // line 29
            if (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin", array(), "any", true, true) && twig_in_filter("Perempuan", $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "jenis_kelamin")))) {
                // line 30
                echo "            Perempuan
            ";
            }
            // line 32
            echo "        </td>
    <tr>
    ";
        }
        // line 35
        echo "    ";
        if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tahun_masuk")))) {
            // line 36
            echo "    <tr>
        <td>Tahun Masuk</td>
        <td>
            ";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tahun_masuk"), "html", null, true);
            echo "
        </td>
    <tr>
    ";
        }
        // line 43
        echo "    ";
        if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tempat_lahir")))) {
            // line 44
            echo "    <tr>
        <td>Tempat Lahir</td>
        <td>
            ";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tempat_lahir"), "html", null, true);
            echo "
        </td>
    <tr>
    ";
        }
        // line 51
        echo "    ";
        if (((($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tgl_lahir") != 0) || ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "bln_lahir") != 0)) || (!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tdn_lahir"))))) {
            // line 52
            echo "    <tr>
        <td>Tanggal Lahir</td>
        <td>
            ";
            // line 55
            if (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tgl_lahir") != 0)) {
                // line 56
                echo "                ";
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tgl_lahir") . " "), "html", null, true);
                echo "
            ";
            }
            // line 58
            echo "
            ";
            // line 59
            if (($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "bln_lahir") != 0)) {
                // line 60
                echo "                ";
                echo twig_escape_filter($this->env, (get_indo_bulan($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "bln_lahir")) . " "), "html", null, true);
                echo "
            ";
            }
            // line 62
            echo "
            ";
            // line 63
            if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tdn_lahir")))) {
                // line 64
                echo "                ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "tdn_lahir"), "html", null, true);
                echo "
            ";
            }
            // line 66
            echo "        </td>
    <tr>
    ";
        }
        // line 69
        echo "    ";
        if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "alamat")))) {
            // line 70
            echo "    <tr>
        <td>Alamat</td>
        <td>
            ";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "alamat"), "html", null, true);
            echo "
        </td>
    <tr>
    ";
        }
        // line 77
        echo "    ";
        if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama")))) {
            // line 78
            echo "    <tr>
        <td>Agama</td>
        <td>
            ";
            // line 81
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "agama"));
            foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
                // line 82
                echo "                ";
                echo twig_escape_filter($this->env, ((isset($context["a"]) ? $context["a"] : null) . " "), "html", null, true);
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "        </td>
    <tr>
    ";
        }
        // line 87
        echo "    ";
        if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "kelas_id")))) {
            // line 88
            echo "    <tr>
        <td>Kelas</td>
        <td>
            ";
            // line 91
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["kelas_all"]) ? $context["kelas_all"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                // line 92
                echo "                ";
                if (twig_in_filter($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "id"), $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "kelas_id"))) {
                    // line 93
                    echo "                ";
                    echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["k"]) ? $context["k"] : null), "nama") . " "), "html", null, true);
                    echo "
                ";
                }
                // line 95
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 96
            echo "        </td>
    <tr>
    ";
        }
        // line 99
        echo "    ";
        if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id")))) {
            // line 100
            echo "    <tr>
        <td>Status</td>
        <td>
            ";
            // line 103
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "status_id"));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 104
                echo "                ";
                if (((isset($context["s"]) ? $context["s"] : null) == 0)) {
                    // line 105
                    echo "                    Pending &nbsp;
                ";
                }
                // line 107
                echo "                ";
                if (((isset($context["s"]) ? $context["s"] : null) == 1)) {
                    // line 108
                    echo "                    Aktif &nbsp;
                ";
                }
                // line 110
                echo "                ";
                if (((isset($context["s"]) ? $context["s"] : null) == 2)) {
                    // line 111
                    echo "                    Blocking &nbsp;
                ";
                }
                // line 113
                echo "                ";
                if (((isset($context["s"]) ? $context["s"] : null) == 2)) {
                    // line 114
                    echo "                    Alumni
                ";
                }
                // line 116
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 117
            echo "        </td>
    <tr>
    ";
        }
        // line 120
        echo "    ";
        if ((!twig_test_empty($this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "username")))) {
            // line 121
            echo "    <tr>
        <td>Username</td>
        <td>
            ";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["filter"]) ? $context["filter"] : null), "username"), "html", null, true);
            echo "
        </td>
    </tr>
    ";
        }
        // line 128
        echo "</table>
<br>
<table border=\"1\">
    <thead>
        <tr>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tgl lahir</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>Tahun masuk</th>
            <th>Password (MD5)</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 146
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["siswas"]) ? $context["siswas"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 147
            echo "        <tr>
            <td>";
            // line 148
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nis"), "html", null, true);
            echo "</td>
            <td>";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "nama"), "html", null, true);
            echo "</td>
            <td>";
            // line 150
            echo ((($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "jenis_kelamin") == "Laki-laki")) ? ("L") : ("P"));
            echo "</td>
            <td>";
            // line 151
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "tempat_lahir"), "html", null, true);
            echo "</td>
            <td>";
            // line 152
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "tgl_lahir"), "d/m/Y"), "html", null, true);
            echo "</td>
            <td>";
            // line 153
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "alamat"), "html", null, true);
            echo "</td>
            <td>";
            // line 154
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "agama"), "html", null, true);
            echo "</td>
            <td>";
            // line 155
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : null), "tahun_masuk"), "html", null, true);
            echo "</td>
            <td>";
            // line 156
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "login"), "password"), "html", null, true);
            echo "</td>
            <td>";
            // line 157
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : null), "kelas_aktif"), "nama"), "html", null, true);
            echo "</td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 160
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "export-excel-filter-siswa.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  368 => 160,  359 => 157,  355 => 156,  351 => 155,  347 => 154,  343 => 153,  339 => 152,  335 => 151,  331 => 150,  327 => 149,  323 => 148,  320 => 147,  316 => 146,  296 => 128,  289 => 124,  284 => 121,  281 => 120,  276 => 117,  270 => 116,  266 => 114,  263 => 113,  259 => 111,  256 => 110,  252 => 108,  249 => 107,  245 => 105,  242 => 104,  238 => 103,  233 => 100,  230 => 99,  225 => 96,  219 => 95,  213 => 93,  210 => 92,  206 => 91,  201 => 88,  198 => 87,  193 => 84,  184 => 82,  180 => 81,  175 => 78,  172 => 77,  165 => 73,  160 => 70,  157 => 69,  152 => 66,  146 => 64,  144 => 63,  141 => 62,  135 => 60,  133 => 59,  130 => 58,  124 => 56,  122 => 55,  117 => 52,  114 => 51,  107 => 47,  102 => 44,  99 => 43,  92 => 39,  87 => 36,  84 => 35,  79 => 32,  75 => 30,  73 => 29,  70 => 28,  66 => 26,  64 => 25,  59 => 22,  56 => 21,  49 => 17,  44 => 14,  41 => 13,  34 => 9,  29 => 6,  27 => 5,  19 => 1,);
    }
}
