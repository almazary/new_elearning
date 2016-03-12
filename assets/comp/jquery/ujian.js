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

// cek status reset saat ujian
setInterval(function() {
    $.ajax({
        method: "POST",
        url: site_url + '/ajax/post_data/check_reset_status',
        data: "siswa_id=" + $("#siswa_id").val() + "&tugas_id=" + $("#tugas_id").val(),
        success: function(data) {
            if (data == 'ok_reset') {
                location.reload();
            }
        }
    });
}, 5000);