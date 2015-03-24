$(function() {
    $('#parent-kelas').change(function(){
        $.ajax({
            type : "POST",
            url  : site_url + "/admin/ajax_post/get_subkelas",
            data : "parent_kelas_id=" + this.value,
            success : function(data){
                $('#sub-kelas').html(data);
            }
        });
    });
});