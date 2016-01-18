var AsiaJk  = moment.tz($("#final_date").val(), "Asia/Jakarta");
var tzid    = tzdetect.matches()[0];
var localtz = AsiaJk.clone().tz(tzid);

$('#clock').countdown(localtz.toDate())
.on('update.countdown', function(event) {
    var totalHours = event.offset.totalDays * 24 + event.offset.hours;
    $(this).html(event.strftime(totalHours + ' <span class="clock-info">jam</span> %M <span class="clock-info">menit</span> %S <span class="clock-info">detik</span>'));
})
.on('finish.countdown', function(event) {
    window.location.replace($("#finish_url").val());
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
