<?php

/* install-step-3.html */
class __TwigTemplate_1c85de4e94797c65affdd3c71e6c0a732b2abe2d2edd690feeff6cee93acf0c8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Install - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
    <div class=\"module span8 offset2\">
            <div class=\"module-head\">
                <span class=\"pull-right\"><b>Step 3 : </b>Pengaturan data</span>
                <h3>Install e-learning</h3>
            </div>

            <div class=\"module-body\">
                <div class=\"well well-small\" style=\"box-shadow: none;\">
                    Atur Kelas dan Matapelajaran yang ada di sekolah. Kelas dan Matapelajaran masih dapat diubah.
                </div>
                <form method=\"post\" action=\"";
        // line 19
        echo twig_escape_filter($this->env, site_url("setup/index/3"), "html", null, true);
        echo "\">
                    <div class=\"row-fluid\">
                        <div class=\"span4\">
                            <b>Kelas</b>
                            <hr style=\"margin-top: 5px; margin-bottom: 5px;\">
                            ";
        // line 24
        if (((isset($context["jenjang"]) ? $context["jenjang"] : null) == "SMP")) {
            // line 25
            echo "                            <ul class=\"unstyled\">
                                <li>
                                    KELAS VII
                                    <ul class=\"unstyled\" style=\"margin-left: 20px;\">
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[VII][]\" ";
            // line 31
            echo twig_escape_filter($this->env, set_checkbox("kelas[VII][]", "A", true), "html", null, true);
            echo " value=\"A\" style=\"margin-top: -5px;\"> KELAS VII - A
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[VII][]\" ";
            // line 36
            echo twig_escape_filter($this->env, set_checkbox("kelas[VII][]", "B", true), "html", null, true);
            echo " value=\"B\" style=\"margin-top: -5px;\"> KELAS VII - B
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[VII][]\" ";
            // line 41
            echo twig_escape_filter($this->env, set_checkbox("kelas[VII][]", "C", true), "html", null, true);
            echo " value=\"C\" style=\"margin-top: -5px;\"> KELAS VII - C
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[VII][]\" ";
            // line 46
            echo twig_escape_filter($this->env, set_checkbox("kelas[VII][]", "D", true), "html", null, true);
            echo " value=\"D\" style=\"margin-top: -5px;\"> KELAS VII - D
                                            </label>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    KELAS VIII
                                    <ul class=\"unstyled\" style=\"margin-left: 20px;\">
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[VIII][]\" ";
            // line 56
            echo twig_escape_filter($this->env, set_checkbox("kelas[VIII][]", "A", true), "html", null, true);
            echo " value=\"A\" style=\"margin-top: -5px;\"> KELAS VIII - A
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[VIII][]\" ";
            // line 61
            echo twig_escape_filter($this->env, set_checkbox("kelas[VIII][]", "B", true), "html", null, true);
            echo " value=\"B\" style=\"margin-top: -5px;\"> KELAS VIII - B
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[VIII][]\" ";
            // line 66
            echo twig_escape_filter($this->env, set_checkbox("kelas[VIII][]", "C", true), "html", null, true);
            echo " value=\"C\" style=\"margin-top: -5px;\"> KELAS VIII - C
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[VIII][]\" ";
            // line 71
            echo twig_escape_filter($this->env, set_checkbox("kelas[VIII][]", "D", true), "html", null, true);
            echo " value=\"D\" style=\"margin-top: -5px;\"> KELAS VIII - D
                                            </label>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    KELAS IX
                                    <ul class=\"unstyled\" style=\"margin-left: 20px;\">
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[IX][]\" ";
            // line 81
            echo twig_escape_filter($this->env, set_checkbox("kelas[IX][]", "A", true), "html", null, true);
            echo " value=\"A\" style=\"margin-top: -5px;\"> KELAS IX - A
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[IX][]\" ";
            // line 86
            echo twig_escape_filter($this->env, set_checkbox("kelas[IX][]", "B", true), "html", null, true);
            echo " value=\"B\" style=\"margin-top: -5px;\"> KELAS IX - B
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[IX][]\" ";
            // line 91
            echo twig_escape_filter($this->env, set_checkbox("kelas[IX][]", "C", true), "html", null, true);
            echo " value=\"C\" style=\"margin-top: -5px;\"> KELAS IX - C
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[IX][]\" ";
            // line 96
            echo twig_escape_filter($this->env, set_checkbox("kelas[IX][]", "D", true), "html", null, true);
            echo " value=\"D\" style=\"margin-top: -5px;\"> KELAS IX - D
                                            </label>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            ";
        }
        // line 103
        echo "
                            ";
        // line 104
        if (((isset($context["jenjang"]) ? $context["jenjang"] : null) == "SMA")) {
            // line 105
            echo "                            <ul class=\"unstyled\">
                                <li>
                                    KELAS X
                                    <ul class=\"unstyled\" style=\"margin-left: 20px;\">
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[X][]\" ";
            // line 111
            echo twig_escape_filter($this->env, set_checkbox("kelas[X][]", "A", true), "html", null, true);
            echo " value=\"A\" style=\"margin-top: -5px;\"> KELAS X - A
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[X][]\" ";
            // line 116
            echo twig_escape_filter($this->env, set_checkbox("kelas[X][]", "B", true), "html", null, true);
            echo " value=\"B\" style=\"margin-top: -5px;\"> KELAS X - B
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[X][]\" ";
            // line 121
            echo twig_escape_filter($this->env, set_checkbox("kelas[X][]", "C", true), "html", null, true);
            echo " value=\"C\" style=\"margin-top: -5px;\"> KELAS X - C
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[X][]\" ";
            // line 126
            echo twig_escape_filter($this->env, set_checkbox("kelas[X][]", "D", true), "html", null, true);
            echo " value=\"D\" style=\"margin-top: -5px;\"> KELAS X - D
                                            </label>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    KELAS XI
                                    <ul class=\"unstyled\" style=\"margin-left: 20px;\">
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[XI][]\" ";
            // line 136
            echo twig_escape_filter($this->env, set_checkbox("kelas[XI][]", "A", true), "html", null, true);
            echo " value=\"A\" style=\"margin-top: -5px;\"> KELAS XI - A
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[XI][]\" ";
            // line 141
            echo twig_escape_filter($this->env, set_checkbox("kelas[XI][]", "B", true), "html", null, true);
            echo " value=\"B\" style=\"margin-top: -5px;\"> KELAS XI - B
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[XI][]\" ";
            // line 146
            echo twig_escape_filter($this->env, set_checkbox("kelas[XI][]", "C", true), "html", null, true);
            echo " value=\"C\" style=\"margin-top: -5px;\"> KELAS XI - C
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[XI][]\" ";
            // line 151
            echo twig_escape_filter($this->env, set_checkbox("kelas[XI][]", "D", true), "html", null, true);
            echo " value=\"D\" style=\"margin-top: -5px;\"> KELAS XI - D
                                            </label>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    KELAS XII
                                    <ul class=\"unstyled\" style=\"margin-left: 20px;\">
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[XII][]\" ";
            // line 161
            echo twig_escape_filter($this->env, set_checkbox("kelas[XII][]", "A", true), "html", null, true);
            echo " value=\"A\" style=\"margin-top: -5px;\"> KELAS XII - A
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[XII][]\" ";
            // line 166
            echo twig_escape_filter($this->env, set_checkbox("kelas[XII][]", "B", true), "html", null, true);
            echo " value=\"B\" style=\"margin-top: -5px;\"> KELAS XII - B
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[XII][]\" ";
            // line 171
            echo twig_escape_filter($this->env, set_checkbox("kelas[XII][]", "C", true), "html", null, true);
            echo " value=\"C\" style=\"margin-top: -5px;\"> KELAS XII - C
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type=\"checkbox\" name=\"kelas[XII][]\" ";
            // line 176
            echo twig_escape_filter($this->env, set_checkbox("kelas[XII][]", "D", true), "html", null, true);
            echo " value=\"D\" style=\"margin-top: -5px;\"> KELAS XII - D
                                            </label>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            ";
        }
        // line 183
        echo "                        </div>
                        <div class=\"span8\">
                            <b>Matapelajaran</b>
                            <hr style=\"margin-top: 5px; margin-bottom: 5px;\">
                            <ul class=\"unstyled\">
                                <li>
                                    <label>
                                        <input type=\"checkbox\" ";
        // line 190
        echo twig_escape_filter($this->env, set_checkbox("mapel[]", "Bahasa Indonesia", true), "html", null, true);
        echo " name=\"mapel[]\" value=\"Bahasa Indonesia\" style=\"margin-top: -5px;\"> Bahasa Indonesia
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type=\"checkbox\" ";
        // line 195
        echo twig_escape_filter($this->env, set_checkbox("mapel[]", "Bahasa Inggris", true), "html", null, true);
        echo " name=\"mapel[]\" value=\"Bahasa Inggris\" style=\"margin-top: -5px;\"> Bahasa Inggris
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type=\"checkbox\" ";
        // line 200
        echo twig_escape_filter($this->env, set_checkbox("mapel[]", "Matematika", true), "html", null, true);
        echo " name=\"mapel[]\" value=\"Matematika\" style=\"margin-top: -5px;\"> Matematika
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type=\"checkbox\" ";
        // line 205
        echo twig_escape_filter($this->env, set_checkbox("mapel[]", "Ekonomi", true), "html", null, true);
        echo " name=\"mapel[]\" value=\"Ekonomi\" style=\"margin-top: -5px;\"> Ekonomi
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type=\"checkbox\" ";
        // line 210
        echo twig_escape_filter($this->env, set_checkbox("mapel[]", "Geografi", true), "html", null, true);
        echo " name=\"mapel[]\" value=\"Geografi\" style=\"margin-top: -5px;\"> Geografi
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type=\"checkbox\" ";
        // line 215
        echo twig_escape_filter($this->env, set_checkbox("mapel[]", "Biologi", true), "html", null, true);
        echo " name=\"mapel[]\" value=\"Biologi\" style=\"margin-top: -5px;\"> Biologi
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type=\"checkbox\" ";
        // line 220
        echo twig_escape_filter($this->env, set_checkbox("mapel[]", "Penjas", true), "html", null, true);
        echo " name=\"mapel[]\" value=\"Penjas\" style=\"margin-top: -5px;\"> Penjas
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type=\"checkbox\" ";
        // line 225
        echo twig_escape_filter($this->env, set_checkbox("mapel[]", "Agama", true), "html", null, true);
        echo " name=\"mapel[]\" value=\"Agama\" style=\"margin-top: -5px;\"> Agama
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type=\"checkbox\" ";
        // line 230
        echo twig_escape_filter($this->env, set_checkbox("mapel[]", "Fisika", true), "html", null, true);
        echo " name=\"mapel[]\" value=\"Fisika\" style=\"margin-top: -5px;\"> Fisika
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type=\"checkbox\" ";
        // line 235
        echo twig_escape_filter($this->env, set_checkbox("mapel[]", "Kimia", true), "html", null, true);
        echo " name=\"mapel[]\" value=\"Kimia\" style=\"margin-top: -5px;\"> Kimia
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <button class=\"btn btn-primary\" type=\"submit\">Simpan</button>
                </form>
            </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "install-step-3.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  383 => 235,  375 => 230,  367 => 225,  359 => 220,  351 => 215,  343 => 210,  335 => 205,  327 => 200,  319 => 195,  311 => 190,  302 => 183,  292 => 176,  284 => 171,  276 => 166,  268 => 161,  255 => 151,  247 => 146,  239 => 141,  231 => 136,  218 => 126,  210 => 121,  202 => 116,  194 => 111,  186 => 105,  184 => 104,  181 => 103,  171 => 96,  163 => 91,  155 => 86,  147 => 81,  134 => 71,  126 => 66,  118 => 61,  110 => 56,  97 => 46,  89 => 41,  81 => 36,  73 => 31,  65 => 25,  63 => 24,  55 => 19,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
