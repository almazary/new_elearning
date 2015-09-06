<?php

/* list-pengumuman.html */
class __TwigTemplate_30429a3744f4ed7f9acb832a33a6df7779c86def5db86bc969edf839cbd4cbea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Pengumuman - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Pengumuman</h3>
    </div>
    <div class=\"module-body\">
        ";
        // line 13
        echo get_flashdata("pengumuman");
        echo "

        <div class=\"btn-group pull-right\">
            <form class=\"form-search\" method=\"get\" action=\"";
        // line 16
        echo twig_escape_filter($this->env, site_url((("pengumuman/index/" . (isset($context["page_no"]) ? $context["page_no"] : null)) . "/")), "html", null, true);
        echo "\">
                <div class=\"input-append\">
                    <input type=\"text\" class=\"span3 search-query\" placeholder=\"cari pengumuman...\" name=\"q\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["keyword"]) ? $context["keyword"] : null), "html", null, true);
        echo "\">
                    <button type=\"submit\" class=\"btn btn-primary\"><i class=\"icon-search\"></i></button>
                </div>
            </form>
        </div>
        ";
        // line 23
        echo anchor("pengumuman/add/tertulis", "Buat Pengumuman", array("class" => "btn btn-primary"));
        echo "
        <br><br>

        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th width=\"7%\">ID</th>
                    <th>Judul</th>
                    <th width=\"15%\">Tgl. Tampil</th>
                    <th width=\"15%\">Tgl. Tutup</th>
                    <th width=\"15%\"></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <br>
        ";
        // line 41
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-pengumuman.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 41,  68 => 23,  60 => 18,  55 => 16,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
