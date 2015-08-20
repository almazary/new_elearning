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
                <div class=\"row-fluid\">
                    <div class=\"span4\">
                        <b>Kelas</b>
                        <hr style=\"margin-top: 5px; margin-bottom: 5px;\">
                        ";
        // line 20
        if (((isset($context["jenjang"]) ? $context["jenjang"] : null) == "SMA")) {
            // line 21
            echo "                        <ul class=\"unstyled\">
                            <li>
                                KELAS X
                                <ul>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS X - A
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS X - B
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS X - C
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS X - D
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS X - E
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS X - F
                                        </label>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                KELAS XI
                                <ul>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XI - A
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XI - B
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XI - C
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XI - D
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XI - E
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XI - F
                                        </label>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                KELAS XII
                                <ul>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XII - A
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XII - B
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XII - C
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XII - D
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XII - E
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type=\"checkbox\" style=\"margin-top: -5px;\"> KELAS XII - F
                                        </label>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        ";
        }
        // line 129
        echo "                    </div>
                    <div class=\"span8\">
                        <b>Matapelajaran</b>
                        <hr style=\"margin-top: 5px; margin-bottom: 5px;\">
                        <ul class=\"unstyled\">
                            <li>
                                <label>
                                    <input type=\"checkbox\" style=\"margin-top: -5px;\"> Bahasa Indonesia
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type=\"checkbox\" style=\"margin-top: -5px;\"> Bahasa Inggris
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type=\"checkbox\" style=\"margin-top: -5px;\"> Matematika
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
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
        return array (  168 => 129,  58 => 21,  56 => 20,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
