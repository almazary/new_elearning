$(function() {
    $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){{
        $(".alert-success").alert('close');
    }});
    
    $(".alert-warning").fadeTo(2000, 500).slideUp(500, function(){{
        $(".alert-warning").alert('close');
    }});

    $("#popover").popover();

    // kelas
    try {
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
            maxLevels: 2,
            isTree: true,
            expandOnHover: 700,
            startCollapsed: true
        });
    
        $('#update-hirarki').click(function(){
            $.ajax({
                type : "POST",
                url : site_url + "/admin/ajax_post/hirarki_kelas",
                data : $('ol.sortable').nestedSortable('serialize'),
                success : function(data){
                    $('#response_update').html('<span class="text-success pull-right"><i class="icon icon-ok"></i> Update hirarki kelas berhasil</span>');
                    setTimeout(function(){
                        $('#response_update').html('');
                    },3000);
                }
            });
        });
    } catch(err) {
        
    }

    
});