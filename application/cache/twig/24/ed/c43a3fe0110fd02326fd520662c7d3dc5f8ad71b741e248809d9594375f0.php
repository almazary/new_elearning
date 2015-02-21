<?php

/* admin_kelas/edit.html */
class __TwigTemplate_24edc43a3fe0110fd02326fd520662c7d3dc5f8ad71b741e248809d9594375f0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
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
        echo get_flashdata("kelas");
        echo "

        <div class=\"panel panel-info\">
            <div class=\"panel-heading\">
                Edit Kelas
            </div>
            <div class=\"panel-body\">
                ";
        // line 16
        echo form_open(("admin/kelas/edit/" . $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "id")), array("class" => "form-horizontal row-fluid"));
        echo "
                    <div class=\"control-group\">
                        <label class=\"control-label\">Nama Kelas <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"nama\" class=\"span5\" placeholder=\"Nama Kelas\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, set_value("nama", $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "nama")), "html", null, true);
        echo "\">
                            ";
        // line 21
        echo form_error("nama");
        echo "
                        </div>
                    </div>
                    ";
        // line 24
        if ((!(null === $this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "parent_id")))) {
            // line 25
            echo "                    <div class=\"control-group\">
                        <label class=\"control-label\">Status</label>
                        <div class=\"controls\">
                            <label class=\"checkbox inline\">
                                <input type=\"checkbox\" value=\"1\" name=\"status\" ";
            // line 29
            echo twig_escape_filter($this->env, set_checkbox("status", "1", ((($this->getAttribute((isset($context["kelas"]) ? $context["kelas"] : null), "aktif") == 1)) ? (true) : (false))), "html", null, true);
            echo ">
                                Aktif
                            </label>
                        </div>
                    </div>
                    ";
        }
        // line 35
        echo "                    <div class=\"control-group\">
                        <div class=\"controls\">
                            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                            <a href=\"";
        // line 38
        echo twig_escape_filter($this->env, site_url("admin/kelas"), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
                        </div>
                    </div>
                ";
        // line 41
        echo form_close();
        echo "
            </div>
        </div>

        <p class=\"text-warning\"><b>NB:</b> Kelas tidak dapat di hapus namun dapat di ubah menjadi tidak aktif.</p>

        ";
        // line 47
        echo (isset($context["kelas_hirarki"]) ? $context["kelas_hirarki"] : null);
        echo "

        <br>
        <div id=\"response_update\"></div>
        <button class=\"btn btn-primary\" id=\"update-hirarki\">Update Hirarki</button>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin_kelas/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 47,  96 => 41,  90 => 38,  85 => 35,  76 => 29,  70 => 25,  68 => 24,  62 => 21,  58 => 20,  51 => 16,  41 => 9,  35 => 6,  31 => 4,  28 => 3,);
    }
}
