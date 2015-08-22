<?php

/* install-step-4.html */
class __TwigTemplate_28218d4534736e01651d65ab9aa34ed7edd8648c0b6e26bee53e4a5bea2a6d55 extends Twig_Template
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
                <span class=\"pull-right\"><b>Step 4 : </b>User administrator</span>
                <h3>Install e-learning</h3>
            </div>

            <div class=\"module-body\">

                ";
        // line 17
        if (((isset($context["success"]) ? $context["success"] : null) == false)) {
            // line 18
            echo "                <div class=\"well well-small\" style=\"box-shadow: none;\">
                    Buat pengajar yang bertindak sebagai administrator.
                </div>
                ";
            // line 21
            echo form_open_multipart("setup/index/4", array("class" => "form-horizontal row-fluid"));
            echo "
                    <div class=\"control-group\">
                        <label class=\"control-label\">NIP</label>
                        <div class=\"controls\">
                            <input type=\"text\" id=\"nip\" name=\"nip\" class=\"span4\" value=\"";
            // line 25
            echo twig_escape_filter($this->env, set_value("nip"), "html", null, true);
            echo "\">
                            <br>";
            // line 26
            echo form_error("nip");
            echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
            // line 32
            echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
            echo "\">
                            <br>";
            // line 33
            echo form_error("nama");
            echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Jenis Kelamin <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Laki-laki\" ";
            // line 39
            echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki"), "html", null, true);
            echo "> Laki-laki</label>
                            <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\" ";
            // line 40
            echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan"), "html", null, true);
            echo "> Perempuan</label>
                            <br>";
            // line 41
            echo form_error("jenis_kelamin");
            echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Tempat Lahir</label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"tempat_lahir\" class=\"span5\" value=\"";
            // line 47
            echo twig_escape_filter($this->env, set_value("tempat_lahir"), "html", null, true);
            echo "\">
                            <br>";
            // line 48
            echo form_error("tempat_lahir");
            echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Tanggal Lahir</label>
                        <div class=\"controls\">
                            <select class=\"span2\" style=\"width: 10%;\" name=\"tgl_lahir\">
                                <option value=\"\">Tgl</option>
                                ";
            // line 56
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 31));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 57
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\" ";
                echo twig_escape_filter($this->env, set_select("tgl_lahir", (isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "                            </select>
                            <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                                <option value=\"\">Bulan</option>
                                ";
            // line 62
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 12));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 63
                echo "                                    <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
                echo "\" ";
                echo twig_escape_filter($this->env, set_select("bln_lahir", (isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo ">";
                echo twig_escape_filter($this->env, get_indo_bulan((isset($context["i"]) ? $context["i"] : null)), "html", null, true);
                echo "</option>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "                            </select>
                            <input type=\"text\" name=\"thn_lahir\" class=\"span2\" maxlength=\"4\" value=\"";
            // line 66
            echo twig_escape_filter($this->env, set_value("thn_lahir"), "html", null, true);
            echo "\" placeholder=\"Tahun\">
                            <br>";
            // line 67
            echo form_error("thn_lahir");
            echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Alamat</label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"alamat\" class=\"span10\" value=\"";
            // line 73
            echo twig_escape_filter($this->env, set_value("alamat"), "html", null, true);
            echo "\">
                            <br>";
            // line 74
            echo form_error("alamat");
            echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Username <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" id=\"username\" name=\"username\" class=\"span5\" value=\"";
            // line 80
            echo twig_escape_filter($this->env, set_value("username"), "html", null, true);
            echo "\" placeholder=\"alamat email\">
                            <br>";
            // line 81
            echo form_error("username");
            echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Password <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"password\" name=\"password\" class=\"span5\" value=\"";
            // line 87
            echo twig_escape_filter($this->env, set_value("password"), "html", null, true);
            echo "\">
                            <br>";
            // line 88
            echo form_error("password");
            echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <label class=\"control-label\">Ulangi Password <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"password\" name=\"password2\" class=\"span5\" value=\"";
            // line 94
            echo twig_escape_filter($this->env, set_value("password2"), "html", null, true);
            echo "\">
                            <br>";
            // line 95
            echo form_error("password2");
            echo "
                        </div>
                    </div>
                    <div class=\"control-group\">
                        <div class=\"controls\">
                            <button type=\"submit\" class=\"btn btn-primary\">Register</button>
                        </div>
                    </div>
                ";
            // line 103
            echo form_close();
            echo "

                ";
        } else {
            // line 106
            echo "
                    <div class=\"well well-small\" style=\"box-shadow: none;\">
                        Instalasi e-learning berhasil, <a href=\"";
            // line 108
            echo twig_escape_filter($this->env, site_url("login"), "html", null, true);
            echo "\">login administrator</a>.
                    </div>

                ";
        }
        // line 112
        echo "            </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "install-step-4.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 112,  244 => 108,  240 => 106,  234 => 103,  223 => 95,  219 => 94,  210 => 88,  206 => 87,  197 => 81,  193 => 80,  184 => 74,  180 => 73,  171 => 67,  167 => 66,  164 => 65,  151 => 63,  147 => 62,  142 => 59,  129 => 57,  125 => 56,  114 => 48,  110 => 47,  101 => 41,  97 => 40,  93 => 39,  84 => 33,  80 => 32,  71 => 26,  67 => 25,  60 => 21,  55 => 18,  53 => 17,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
