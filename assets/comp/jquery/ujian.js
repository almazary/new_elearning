/**
 * Javascript untuk ujian ganda dan essay
 */

$(".countdown").jCounter({
    animation: "slide",
    format: "dd:hh:mm:ss",
    twoDigits: 'on',
    customDuration: $("#sisa_menit").val(),
    callback: function() {
        $("#process-submit").val("1");
        if ($("#form-essay").length) {
            $("#form-essay").submit();
        } else {
            location.href = $("#finish_url").val();
        }
    }
});

function update_ganda(tugas_id, pertanyaan_id, pilihan_id) {
    $.ajax({
        type : "POST",
        url  : site_url + "/ajax/post_data/update_jawaban_ganda",
        data : "tugas_id=" + tugas_id + "&pertanyaan_id=" + pertanyaan_id + "&pilihan_id=" + pilihan_id,
        async: false
    });
}

$("#btn-submit").on('click', function(e) {
    if (confirm('Anda yakin ingin mengahiri pengerjaan tugas ini?')) {
        $("#process-submit").val("1");
        if ($("#form-essay").length) {
            $("#form-essay").submit();
        } else {
            location.href = $(this).attr("href");
        }
    } else {
        e.preventDefault();
        if ($("#form-essay").length) {
            simpanJawaban($("#tugas_id").val());
        }

        location.reload();
    }

    return false;
});

function hide_countdown() {
    $(".countdown").hide();
    $(".box-show-hide-countdown").html('<a href="javascript:void(0)" onclick="show_countdown()"><i class="icon icon-eye-open"></i> TAMPILKAN TIMER</a>');
    $.ajax({
        method: "POST",
        url: site_url + '/ajax/post_data/hide_show_countdown',
        data: {"tugas_id" : $("#tugas_id").val(), "hide" : "1"},
        async: false
    });
}

function show_countdown() {
    $(".countdown").show();
    $(".box-show-hide-countdown").html('<a href="javascript:void(0)" onclick="hide_countdown()"><i class="icon icon-eye-close"></i> SEMBUNYIKAN TIMER</a>');
    $.ajax({
        method: "POST",
        url: site_url + '/ajax/post_data/hide_show_countdown',
        data: {"tugas_id" : $("#tugas_id").val(), "hide" : "0"},
        async: false
    });
}

function simpanJawaban(tugas_id) {
    var arr_pertanyaan_id = $("#str_id").val();
    var arr_pertanyaan_id = arr_pertanyaan_id.split(',');

    for (var i = 0; i < arr_pertanyaan_id.length; i++) {
        var tiny_obj = tinyMCE.get('jawaban-' + arr_pertanyaan_id[i]);
        var jawaban  = tiny_obj.getContent();

        $.ajax({
            type : "POST",
            url  : site_url + "/ajax/post_data/update_jawaban_essay",
            data : {"tugas_id" : tugas_id, "pertanyaan_id" : arr_pertanyaan_id[i], "jawaban" : jawaban},
            async: false
        });
    }
}

// cek status reset saat ujian & simpan jawaban jika essay
setInterval(function() {
    $.ajax({
        method: "POST",
        url: site_url + '/ajax/post_data/check_reset_status',
        data: {"siswa_id" : $("#siswa_id").val(), "tugas_id" : $("#tugas_id").val()},
        success: function(data) {
            if (data == 'ok_reset') {
                var proccess_submit = $("#process-submit").val();
                if (proccess_submit == 0) {
                    location.reload();
                }
            }
        },
        async: false
    });

    var tugas_type_id = $("#type_id").val();
    if (tugas_type_id == 2) {
        simpanJawaban($("#tugas_id").val());
    }

}, 15000);
