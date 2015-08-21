$(function() {
    $('#parent-kelas').on('change', function() {
        $.ajax({
            type : "POST",
            url  : site_url + "/ajax/post_data/get_subkelas",
            data : "parent_kelas_id=" + this.value,
            success : function(data){
                $('#sub-kelas').html(data);
            }
        });
    });

    $('#kelas_id').change(function(){
        $.ajax({
            type : "POST",
            url  : site_url + "/ajax/post_data/mapel_kelas",
            data : "kelas_id=" + this.value,
            success : function(data){
                $('#mapel_kelas_id').html(data);
            }
        });
    });
});
