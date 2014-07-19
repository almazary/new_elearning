
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>{module_title}</h3>
        </div>
        <div class="module-body">
            <?php echo $this->session->flashdata('kelas'); ?>
            <div class="well well-small">
                <?php include $sub_content_file; ?>
            </div>
            
            {kelas_hirarki}

            <script type="text/javascript">
                $(document).ready(function(){

                    $('ol.sortable').nestedSortable({
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
                        maxLevels: 5,
                        isTree: true,
                        expandOnHover: 700,
                        startCollapsed: true
                    });

                });
                
                $('#update').click(function(){
                    $.ajax({
                        type : "POST",
                        url : "<?php echo site_url('madmin/index.php?module=templates&action=ajaxRequest&section=menu'); ?>",
                        data : $('ol.sortable').nestedSortable('serialize'),
                        success : function(data){   
                            $('#response_update').html('<span class="text-success"><i class="glyphicon glyphicon-ok"></i> Update berhasil</span>');
                            setTimeout(function(){
                                $('#response_update').html('');
                            },3000);
                        }
                    });
                });
                
            </script>

        </div>
    </div>
</div>