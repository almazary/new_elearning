$('#clock').countdown($("#final_date").val())
.on('update.countdown', function(event) {
    var totalHours = event.offset.totalDays * 24 + event.offset.hours;
    $(this).html(event.strftime(totalHours + ' <span class="clock-info">jam</span> %M <span class="clock-info">menit</span> %S <span class="clock-info">detik</span>'));
})
.on('finish.countdown', function(event) {
    window.location.replace($("#finish_url"));
});

// $('#clock').countdown($("#final_date").val(), function(event) {
//     var totalHours = event.offset.totalDays * 24 + event.offset.hours;
//     $(this).html(event.strftime(totalHours + ' <span class="clock-info">jam</span> %M <span class="clock-info">menit</span> %S <span class="clock-info">detik</span>'));
// });

function update_ganda(tugas_id, pertanyaan_id, pilihan_id) {
    $.ajax({
        type : "POST",
        url  : site_url + "/ajax/post_data/update_jawaban_ganda",
        data : "tugas_id=" + tugas_id + "&pertanyaan_id=" + pertanyaan_id + "&pilihan_id=" + pilihan_id
    });
}
