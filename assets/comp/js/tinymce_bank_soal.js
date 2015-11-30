$(".btn-tambah-pertanyaan").on('click', function() {
    $(this).attr('disabled', 'disabled');
    $(".btn-copy-pertanyaan").attr('disabled', 'disabled');
    $(".btn-tambah-pertanyaan-essay").attr('disabled', 'disabled');
    var field = '<div class="box-area-pertanyaan">';
    field += '<div class="row-fluid">';
    field += '<div class="span12"><a class="pull-right btn btn-small btn-default" href="javascript:void(0)" onclick="remove_box_pertanyaan()"><i class="icon icon-remove-sign"></i> Batal</a><b>Pertanyaan</b><textarea class="span12" name="pertanyaan" id="textarea-pertanyaan"></textarea></div>';
    field += '</div>';

    field += '<div class="row-fluid">';
    field += '<div class="span12"><div class="box-pilihan"><label class="radio inline pull-right"><input type="radio" name="kunci" value="a" checked><b>Jadikan kunci</b></label><b>Pilihan A</b><textarea class="span12" name="pilihan[a]" id="textarea-pilihan-a"></textarea></div></div>';
    field += '</div>';

    field += '<div class="row-fluid">';
    field += '<div class="span12"><div class="box-pilihan"><label class="radio inline pull-right"><input type="radio" name="kunci" value="b"><b>Jadikan kunci</b></label><b>Pilihan B</b><textarea class="span12" name="pilihan[b]" id="textarea-pilihan-b"></textarea></div></div>';
    field += '</div>';

    field += '<div class="row-fluid">';
    field += '<div class="span12"><div class="box-pilihan"><label class="radio inline pull-right"><input type="radio" name="kunci" value="c"><b>Jadikan kunci</b></label><b>Pilihan C</b><textarea class="span12" name="pilihan[c]" id="textarea-pilihan-c"></textarea></div></div>';
    field += '</div>';

    field += '<div class="row-fluid">';
    field += '<div class="span12"><div class="box-pilihan"><label class="radio inline pull-right"><input type="radio" name="kunci" value="d"><b>Jadikan kunci</b></label><b>Pilihan D</b><textarea class="span12" name="pilihan[d]" id="textarea-pilihan-d"></textarea></div></div>';
    field += '</div>';

    field += '<div class="row-fluid">';
    field += '<div class="span12"><div class="box-pilihan"><label class="radio inline pull-right"><input type="radio" name="kunci" value="e"><b>Jadikan kunci</b></label><b>Pilihan E</b><textarea class="span12" name="pilihan[e]" id="textarea-pilihan-e"></textarea></div></div>';
    field += '</div>';

    field += '<div class="row-fluid">';
    field += '<div class="span12"><br><a class="pull-right btn btn-small btn-default" href="javascript:void(0)" onclick="remove_box_pertanyaan()"><i class="icon icon-remove-sign"></i> Batal</a><button class="btn btn-primary">Simpan Pertanyaan</button></div>';
    field += '</div>';
    field += '</div><br><br>';

    $(".box-new-soal").append(field);

    use_tinymce('textarea-pertanyaan, textarea#textarea-pilihan-a, textarea#textarea-pilihan-b, textarea#textarea-pilihan-c, textarea#textarea-pilihan-d, textarea#textarea-pilihan-e');
});

$(".btn-tambah-pertanyaan-essay").on('click', function() {
    $(this).attr('disabled', 'disabled');
    $(".btn-copy-pertanyaan").attr('disabled', 'disabled');
    $(".btn-tambah-pertanyaan").attr('disabled', 'disabled');
    var field = '<div class="box-area-pertanyaan">';
    field += '<div class="row-fluid">';
    field += '<div class="span12"><a class="pull-right btn btn-small btn-default" href="javascript:void(0)" onclick="remove_box_pertanyaan()"><i class="icon icon-remove-sign"></i> Batal</a><b>Pertanyaan</b><textarea class="span12" name="pertanyaan" id="textarea-pertanyaan"></textarea></div>';
    field += '</div>';

    field += '<div class="row-fluid">';
    field += '<div class="span12"><br><button class="btn btn-primary">Simpan Pertanyaan</button></div>';
    field += '</div>';
    field += '</div><br><br>';

    $(".box-new-soal").append(field);

    use_tinymce('textarea-pertanyaan');
});

$("#form-tambah-pertanyaan").submit(function(event) {
    var content = tinyMCE.get('textarea-pertanyaan').getContent();
    if (content == '') {
        event.preventDefault();
        alert("Pertanyaan tidak boleh kosong!");
        tinymce.execCommand('mceFocus',false,'textarea-pertanyaan');
    } else {
        $(".btn-tambah-pertanyaan").removeAttr('disabled');
        $(".btn-tambah-pertanyaan-essay").removeAttr('disabled');
        $(".btn-copy-pertanyaan").removeAttr('disabled');
    }
});

function remove_box_pertanyaan() {
    conf = confirm("Anda yakin ingin membatalkan?");
    if (conf) {
        $(".btn-tambah-pertanyaan").removeAttr("disabled");
        $(".btn-tambah-pertanyaan-essay").removeAttr("disabled");
        $(".btn-copy-pertanyaan").removeAttr("disabled");
        $(".box-new-soal").html("");
    }
}

function use_tinymce(element_id) {
    tinyMCE.init({
        selector: "textarea#" + element_id,
        theme : "advanced",
        plugins : "autosave,emotions,syntaxhl,wordcount,pagebreak,layer,table,save,advhr,advimage,advlink,insertdatetime,preview,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,print,media,youtubeIframe,syntaxhl,tiny_mce_wiris",theme_advanced_buttons1 : "undo,redo,bold,italic,underline,strikethrough,bullist,numlist,justifyleft,justifycenter,justifyright,justifyfull,blockquote,link,unlink,sub,sup,charmap,tiny_mce_wiris_formulaEditor,emotions,image,media,youtubeIframe,syntaxhl,code",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        file_browser_callback : "openKCFinderBank",
        theme_advanced_resizing : true,
        theme_advanced_resize_horizontal : false,
        content_css : base_url + "assets/comp/tinymce/com/content.css",
        convert_urls: false,
        force_br_newlines : false,
        force_p_newlines : false
    });
}

function openKCFinderBank(field_name, url, type, win) {
    tinyMCE.activeEditor.windowManager.open({
        file: base_url + "assets/comp/kcfinder/browse.php?opener=tinymce&type=" + type,
        title: "KCFinder",
        width: 700,
        height: 500,
        resizable: "yes",
        inline: true,
        close_previous: "no",
        popup_css: false
    }, {
        window: win,
        input: field_name
    });
    return false;
}