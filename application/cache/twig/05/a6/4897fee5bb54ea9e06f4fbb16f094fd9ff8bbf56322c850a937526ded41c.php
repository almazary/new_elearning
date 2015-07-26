<?php

/* ujian-online.html */
class __TwigTemplate_05a64897fee5bb54ea9e06f4fbb16f094fd9ff8bbf56322c850a937526ded41c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-detail-materi.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-detail-materi.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo " - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "<style type=\"text/css\">
    #clock {
        font-size: 25px;
        margin-top: 5px;
        font-weight: bold;
    }
    .clock-info {
        font-weight: normal;
    }
</style>
";
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
        // line 21
        echo "<div id=\"wrap\">
    <div class=\"container\">
        <h1 class=\"title\">";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "judul"), "html", null, true);
        echo "</h1>
        <hr class=\"hr-top\">
        <div class=\"wrap-content\">
            <div class=\"content\">
                <div class=\"row-fluid\">
                    <div class=\"span8\">
                        <b>Informasi : </b><br>
                        ";
        // line 30
        echo $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "tugas"), "info");
        echo "
                    </div>
                    <div class=\"span4\">
                        <b>Siswa waktu : </b><br>
                        <div id=\"clock\"></div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
";
    }

    // line 46
    public function block_js($context, array $blocks = array())
    {
        // line 47
        echo "<script type=\"text/javascript\">
    \$('#clock').countdown(\"2015-07-26 23:43:29\", function(event) {
        var totalHours = event.offset.totalDays * 24 + event.offset.hours;
        \$(this).html(event.strftime(totalHours + ' <span class=\"clock-info\">jam</span> %M <span class=\"clock-info\">menit</span> %S <span class=\"clock-info\">detik</span>'));
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "ujian-online.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 47,  95 => 46,  76 => 30,  66 => 23,  62 => 21,  59 => 20,  45 => 8,  42 => 7,  34 => 4,  31 => 3,);
    }
}
