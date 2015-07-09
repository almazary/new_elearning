$(function() {
    $('ol#kelas').nestedSortable({
        forcePlaceholderSize: true,
        handle: 'div',
        helper: 'clone',
        items: 'li',
        // opacity: .6,
        placeholder: 'placeholder',
        // revert: 250,
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
            url : site_url + "/ajax/post_data/hirarki_kelas",
            data : $('ol.sortable').nestedSortable('serialize'),
            success : function(data){
                $('#response_update').html('<span class="text-success pull-right"><i class="icon icon-ok"></i> Update hirarki kelas berhasil</span>');
                setTimeout(function(){
                    $('#response_update').html('');
                },3000);
            }
        });
    });
});