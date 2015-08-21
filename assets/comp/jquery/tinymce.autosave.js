
function simpanJawaban(tugas_id)
{
    var arr_pertanyaan_id = $("#str_id").val();
    var arr_pertanyaan_id = arr_pertanyaan_id.split(',');

    for (var i = 0; i < arr_pertanyaan_id.length; i++) {
        var tiny_obj = tinyMCE.get('jawaban-' + arr_pertanyaan_id[i]);
        var jawaban  = tiny_obj.getContent();

        $.ajax({
            type : "POST",
            url  : site_url + "/ajax/post_data/update_jawaban_essay",
            data : "tugas_id=" + tugas_id + "&pertanyaan_id=" + arr_pertanyaan_id[i] + "&jawaban=" + jawaban
        });
    }
}

/* save jawaban setiap 15 detik */
setInterval(function(){
    simpanJawaban($("#tugas_id").val());
}, 15000);

