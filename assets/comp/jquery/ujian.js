$(".countdown").jCounter({
    animation: "slide",
    format: "dd:hh:mm:ss",
    twoDigits: 'on',
    customDuration: $("#sisa_menit").val(),
    callback: function() {
        window.location.replace($("#finish_url").val());
    }
});

function update_ganda(tugas_id, pertanyaan_id, pilihan_id) {
    $.ajax({
        type : "POST",
        url  : site_url + "/ajax/post_data/update_jawaban_ganda",
        data : "tugas_id=" + tugas_id + "&pertanyaan_id=" + pertanyaan_id + "&pilihan_id=" + pilihan_id
    });
}
