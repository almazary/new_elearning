<?php

/* default/admin_kelas/index.html */
class __TwigTemplate_9f7b48db8b915713eb3063f6014c2f882cabc9647401ad37cc7443b8f854b216 extends Twig_Template
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
        echo "
<div class=\"content\">
    <div class=\"module\">
        <div class=\"module-head\">
            <h3>";
        // line 5
        echo (isset($context["module_title"]) ? $context["module_title"] : null);
        echo "</h3>
        </div>
        <div class=\"module-body\">
            ";
        // line 8
        echo get_flashdata("kelas");
        echo "

            ";
        // line 10
        $template = $this->env->resolveTemplate((isset($context["sub_content_file"]) ? $context["sub_content_file"] : null));
        $template->display($context);
        // line 11
        echo "
            <p class=\"text-warning\"><b>NB:</b> Kelas tidak dapat di hapus namun dapat di ubah menjadi tidak aktif.</p>

            ";
        // line 14
        echo (isset($context["kelas_hirarki"]) ? $context["kelas_hirarki"] : null);
        echo "

            <br>
            <div id=\"response_update\"></div>
            <button class=\"btn btn-primary\" id=\"update\">Update Hirarki</button>

            <script type=\"text/javascript\">
                \$(document).ready(function(){

                    \$('ol.sortable').nestedSortable({
                        forcePlaceholderSize: true,
                        handle: 'div',
                        helper: 'clone',
                        items: 'li',
                        opacity: .6,
                        placeholder: 'placeholder',
                        revert: 250,
                        tabSize: 25,
                        tolerance: 'pointer',
                        toleranceElement: '> div',
                        maxLevels: 2,
                        isTree: true,
                        expandOnHover: 700,
                        startCollapsed: true
                    });

                });

                \$('#update').click(function(){
                    \$.ajax({
                        type : \"POST\",
                        url : \"";
        // line 45
        echo twig_escape_filter($this->env, site_url("admin/ajax_post/hirarki_kelas"), "html", null, true);
        echo "\",
                        data : \$('ol.sortable').nestedSortable('serialize'),
                        success : function(data){
                            \$('#response_update').html('<span class=\"text-success pull-right\"><i class=\"icon icon-ok\"></i> Update hirarki kelas berhasil</span>');
                            setTimeout(function(){
                                \$('#response_update').html('');
                            },3000);
                        }
                    });
                });

            </script>

        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "default/admin_kelas/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 45,  44 => 14,  39 => 11,  36 => 10,  31 => 8,  25 => 5,  19 => 1,);
    }
}
