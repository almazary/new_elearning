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
                <span class=\"pull-right\"><b>Step 3 : </b>Pengaturan admin</span>
                <h3>Install e-learning</h3>
            </div>

            <div class=\"module-body\">
                <div class=\"well well-small\" style=\"box-shadow: none;\">
                    Buat pengajar yang bertindak sebagai administrator.
                </div>

            </div>
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
        return array (  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
