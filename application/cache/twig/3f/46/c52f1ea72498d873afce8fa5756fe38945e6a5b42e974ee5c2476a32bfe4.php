<?php

/* install-step-1.html */
class __TwigTemplate_3f46c52f1ea72498d873afce8fa5756fe38945e6a5b42e974ee5c2476a32bfe4 extends Twig_Template
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
                <span class=\"pull-right\"><b>Step 1 : </b>Konfigurasi database</span>
                <h3>Install e-learning</h3>
            </div>

            <div class=\"module-body\">
                ";
        // line 16
        echo (isset($context["error"]) ? $context["error"] : null);
        echo "

";
        // line 18
        if ((!twig_test_empty((isset($context["error"]) ? $context["error"] : null)))) {
            // line 19
            echo "Atur koneksi database pada file <b>application/config/database.php</b>, isi bagian - bagian berikut :<br>
<pre>
\$db['default']['hostname'] = '';
\$db['default']['username'] = '';
\$db['default']['password'] = '';
\$db['default']['database'] = '';
\$db['default']['dbprefix'] = 'el_';
</pre>
";
        }
        // line 28
        echo "
Buka file <b>application/config/config.php</b>, atur base_url dan encryption_key menjadi seperti berikut : <br>
<pre>
\$config['base_url'] = '";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["set_base_url"]) ? $context["set_base_url"] : null), "html", null, true);
        echo "';
\$config['encryption_key'] = '";
        // line 32
        echo twig_escape_filter($this->env, md5(uniqid()), "html", null, true);
        echo "';
</pre>

Jika sudah diatur, refresh kembali halaman ini.
            </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "install-step-1.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 32,  75 => 31,  70 => 28,  59 => 19,  57 => 18,  52 => 16,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
