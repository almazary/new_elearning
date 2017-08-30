 // "use strict";

// $(document).ready(function() {

    // codesnipet plugins ckeditor
    hljs.initHighlightingOnLoad();

    var is_user_logged_in = 0;
    var sedang_ujian = 0;

    // cek sudah login belum
    $.ajax({
        method: 'GET',
        url: site_url + '/login/data_onload',
        success: function(data) {
            var result = $.parseJSON(data);
            is_user_logged_in = result.is_user_logged_in;
            sedang_ujian      = result.sedang_ujian;
        },
        async: false
    });

    // tooltip
    $('[data-toggle="tooltip"]').tooltip({html:true});

    // nivoslider login
    if ($("#slider-login").length) {
        $('#slider-login').nivoSlider();
    }

    // timeago
    $.timeago.settings.strings.suffixAgo = "yang lalu";
    $.timeago.settings.strings.seconds   = "kurang dari semenit";
    $.timeago.settings.strings.minute    = "sekitar semenit";
    $.timeago.settings.strings.minutes   = "%d menit";
    $.timeago.settings.strings.hour      = "sekitar sejam";
    $.timeago.settings.strings.hours     = "sekitar %d jam";
    $.timeago.settings.strings.day       = "satu hari";
    $.timeago.settings.strings.days      = "%d hari";
    $("time.timeago").timeago();

    // fungsi yang dipanggil saat ajax success
    function on_ajax_success(xhr)
    {
        // logout kalo session expired
        if (xhr.responseText == "403 Forbidden.") {
            location.href = site_url + '/login/sess_expired';
        }

        //timeago
        try {
            $("time.timeago").timeago();
        } catch(e) {}
    }

    // panggil fungsi setelah ajax success
    $(document).ajaxComplete(function( event, xhr, settings ) {
        on_ajax_success(xhr);
    });

    // jika sudah login
    if (is_user_logged_in == 1) {

        function load_texteditor() {
            // jika ada class texteditor atau texteditor-simple
            if ($("textarea.texteditor").length || $("textarea.texteditor-simple").length) {
                try {
                    $('textarea.texteditor').ckeditor({
                        toolbarGroups : [
                            { name: 'clipboard', groups: [ 'clipboard', 'undo'] },
                            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                            { name: 'forms', groups: [ 'forms' ] },
                            { name: 'links', groups: [ 'links' ] },
                            { name: 'insert', groups: [ 'insert' ] },
                            { name: 'others', groups: [ 'others' ] },
                            '/',
                            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                            { name: 'colors', groups: [ 'colors' ] },
                            '/',
                            { name: 'styles', groups: [ 'styles' ] },
                            { name: 'about', groups: [ 'about' ] },
                            { name: 'document', groups: [ 'document', 'doctools', 'mode' ] },
                            { name: 'tools', groups: [ 'tools' ] }
                        ],
                        removeButtons : 'Save,NewPage,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Find,Replace,SelectAll,RemoveFormat,CopyFormatting,Language,CreateDiv,HorizontalRule,PageBreak,Iframe,About,Scayt,Flash,ckeditor_wiris_CAS',
                        extraPlugins : 'lineutils,widget,codesnippet,ckeditor_wiris,youtube,html5audio,video',
                        codeSnippet_theme : 'monokai',
                        allowedContent : true,
                        skin : 'office2013',
                    });

                    CKEDITOR.on('dialogDefinition', function (event)
                    {
                        var editor = event.editor;
                        var dialogDefinition = event.data.definition;
                        var dialogName = event.data.name;

                        var cleanUpFuncRef = CKEDITOR.tools.addFunction(function ()
                        {
                            // Do the clean-up of filemanager here (called when an image was selected or cancel was clicked)
                            $('#filemanager_iframe').remove();
                            $("body").css("overflow-y", "scroll");
                        });

                        var tabCount = dialogDefinition.contents.length;
                        for (var i = 0; i < tabCount; i++) {
                            var browseButton = dialogDefinition.contents[i].get('browse');

                            if (browseButton !== null) {
                                browseButton.hidden = false;
                                browseButton.onClick = function (dialog, i)
                                {
                                    editor._.filebrowserSe = this;
                                    var iframe = $("<iframe id='filemanager_iframe' class='fm-modal'/>").attr({
                                        src: base_url + 'assets/comp/RichFilemanager/index.html' + // Change it to wherever  Filemanager is stored.
                                            '?CKEditorFuncNum=' + CKEDITOR.instances[event.editor.name]._.filebrowserFn +
                                            '&CKEditorCleanUpFuncNum=' + cleanUpFuncRef +
                                            '&langCode=en' +
                                            '&CKEditor=' + event.editor.name
                                    });

                                    $("body").append(iframe);
                                    $("body").css("overflow-y", "hidden");  // Get rid of possible scrollbars in containing document
                                }
                            }
                        }
                    }); // dialogDefinition

                } catch(e) {}
            }
        }

        load_texteditor();
    }

    // area yang harus login dan tidak sedang ujian
    if (is_user_logged_in == 1 && sedang_ujian == 0) {

        // home
        if ($("#info-update-link").length) {
            // popup new version
            setTimeout(function() {
                $.ajax({
                    type: "GET",
                    url: site_url + '/ajax/get_data/elearning-dokumenary-feed',
                    success: function(data){
                        var values = $.parseJSON(data);
                        $.each(values.feed, function(i, val) {
                            $("#info-update").append("<tr><td><a href='"+val.link+"' target='_blank'>"+val.title+"</a></td></tr>");
                        });

                        if (values.urgent_info) {
                            $("#show-urgent-info").html(values.urgent_info);
                        }
                    }
                });
            }, 1000);
        }

        // count new data
        function count_new_data()
        {
            $.ajax({
                method: "GET",
                url: site_url + '/ajax/get_data/count_new_data',
                success: function (data) {
                    var result = $.parseJSON(data);

                    // new msg
                    if (result.new_msg > 0) {
                        $(".menu-count-new-msg").html("");
                        $(".menu-count-new-msg").html('<b class="label orange pull-right">' + result.new_msg + '</b>');
                    } else {
                        $(".menu-count-new-msg").html("");
                    }

                    // new update
                    if (result.new_update > 0) {
                        $(".menu-count-new-update").html("");
                        $(".menu-count-new-update").html('<b class="label orange pull-right">' + result.new_update + '</b>');
                    } else {
                        $(".menu-count-new-update").html("");
                    }

                    // pending siswa
                    if (result.pending_siswa > 0) {
                        $(".menu-count-pending-siswa").html("");
                        $(".menu-count-pending-siswa").html('<b class="label orange pull-right">' + result.pending_siswa + '</b>');
                    } else {
                        $(".menu-count-pending-siswa").html("");
                    }

                    // pending pengajar
                    if (result.pending_pengajar > 0) {
                        $(".menu-count-pending-pengajar").html("");
                        $(".menu-count-pending-pengajar").html('<b class="label orange pull-right">' + result.pending_pengajar + '</b>');
                    } else {
                        $(".menu-count-pending-pengajar").html("");
                    }

                    // pending laporan
                    if (result.unread_laporan > 0) {
                        $(".menu-count-unread-laporan").html("");
                        $(".menu-count-unread-laporan").html('<b class="label orange pull-right">' + result.unread_laporan + '</b>');
                    } else {
                        $(".menu-count-unread-laporan").html("");
                    }

                    // last login
                    if (result.last_login_list) {
                        if ($("#show-last-login-list").length) {
                            $("#show-last-login-list").html(result.last_login_list);
                        }
                    }

                },
                async: false
            });
        }

        // panggil count new data
        count_new_data();

        // get new message di percakapan
        function get_new_msg()
        {
            if ($("#active_msg_id").length) {
                var active_msg_id = $("#active_msg_id").val();

                $.ajax({
                    method: 'POST',
                    url: site_url + '/ajax/post_data/new_msg',
                    data: 'active_msg_id=' + active_msg_id,
                    success: function(data) {
                        if (data != '') {
                            $('#list-msg > tbody:last-child').append(data);
                        }
                    },
                    async: false
                });
            }
        }

        setInterval(function() {
            count_new_data();

            get_new_msg();
        }, 10000);

        // jika ada class datatable
        if ($(".datatable").length) {
            $('.datatable').dataTable({
                "language": {
                    "url": base_url + "assets/comp/datatables/lang.id.json"
                },
                "aaSorting" : [],
                "bAutoWidth": false,
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 0 ] }
                ],
                "stateSave": true
                // "fnDrawCallback" : function( oSettings ) {

                // }
            });
        }

        // nestedSortable kelas
        if ($("ol#kelas").length) {
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
                    },
                    async: false
                });
            });
        }

        $('#kelas-mapel-kelas-parent-kelas').on('change', function() {
            $.ajax({
                type : "POST",
                url  : site_url + "/ajax/post_data/get_subkelas",
                data : "parent_kelas_id=" + this.value,
                success : function(data){
                    $('#kelas-mapel-kelas-sub-kelas').html(data);
                },
                async: false
            });
        });

        $('#kelas_id').change(function(){
            $.ajax({
                type : "POST",
                url  : site_url + "/ajax/post_data/mapel_kelas",
                data : "kelas_id=" + this.value,
                success : function(data){
                    $('#mapel_kelas_id').html(data);
                },
                async: false
            });
        });

        // cekall mapel
        $(".checkAll").change(function () {
            $(".checkbox-mapel").prop('checked', $(this).prop("checked"));
        });

        // colorbox pengajar
        if ($(".pengajar-iframe").length) {
            $(".pengajar-iframe").colorbox({
                iframe:true,
                width:"430",
                height:"405",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".pengajar-iframe-2").length) {
            $(".pengajar-iframe-2").colorbox({
                iframe:true,
                width:"400",
                height:"205",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".pengajar-iframe-3").length) {
            $(".pengajar-iframe-3").colorbox({
                iframe:true,
                width:"500",
                height:"305",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".pengajar-iframe-4").length) {
            $(".pengajar-iframe-4").colorbox({
                iframe:true,
                width:"600",
                height:"605",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".pengajar-iframe-5").length) {
            $(".pengajar-iframe-5").colorbox({
                iframe:true,
                width:"450",
                height:"340",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".pengajar-iframe-6").length) {
            $(".pengajar-iframe-6").colorbox({
                iframe:true,
                width:"430",
                height:"450",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".pengajar-iframe-7").length) {
            $(".pengajar-iframe-7").colorbox({
                iframe:true,
                width:"600",
                height:"500",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        // colorbox siswa
        if ($(".siswa-iframe").length) {
            $(".siswa-iframe").colorbox({
                iframe:true,
                width:"400",
                height:"200",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".siswa-iframe-kelas-aktif").length) {
            $(".siswa-iframe-kelas-aktif").colorbox({
                iframe:true,
                width:"400",
                height:"200",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".siswa-iframe-2").length) {
            $(".siswa-iframe-2").colorbox({
                iframe:true,
                width:"400",
                height:"205",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".siswa-iframe-3").length) {
            $(".siswa-iframe-3").colorbox({
                iframe:true,
                width:"500",
                height:"305",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".siswa-iframe-4").length) {
            $(".siswa-iframe-4").colorbox({
                iframe:true,
                width:"600",
                height:"605",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".siswa-iframe-5").length) {
            $(".siswa-iframe-5").colorbox({
                iframe:true,
                width:"450",
                height:"340",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($("#siswa-edit-password").length) {
            $.colorbox({
                iframe:true,
                width:"500",
                height:"305",
                fixed:true,
                onClosed : function() {
                    location.href = site_url + '/login/pp';
                },
                href: $(".siswa-iframe-3").attr('href'),
                transition: "none"
            });
        }

        // materi
        if ($(".iframe-laporkan").length) {
            $(".iframe-laporkan").colorbox({
                iframe:true,
                width:"400",
                height:"300",
                fixed:true,
                overlayClose: true
            });
        }

        // pesan
        if ($('#msg-penerima').length) {
            $('#msg-penerima').tagsinput({
                allowDuplicates: false,
                typeahead: {
                    source: function(query) {
                        var results = [];
                        $.ajax({
                            method: "GET",
                            url: site_url + '/ajax/get_data/penerima?query=' + query,
                            success: function (data) {
                                results = $.parseJSON(data);
                            },
                            async: false
                        });

                        return results;
                    }
                },
                freeInput: false
            });
        }

        // filter pengajar
        function filter_pengajar_ch_uch_checkbox(source){
            checkboxes = document.getElementsByName('pengajar_id[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
              checkboxes[i].checked = source.checked;
            }
        }

        // pengumuman
        if ($("#pengumuman-tgl-tampil").length) {
            $('#pengumuman-tgl-tampil').dateRangePicker({
                language: 'id'
            });
        }

        // tambah siswa
        function username_default() {
            if (document.getElementById("default_username").checked) {
                var nis = $("#nis").val();
                if (nis == '') {
                    nis = new Date().getTime();
                }
                $("#username").val(nis + '@example.sch.id');
            } else {
                $("#username").val('');
            }
        }

        function username_default_pengajar() {
            if (document.getElementById("default_username").checked) {
                var nip = $("#nip").val();
                if (nip == '') {
                    nip = new Date().getTime();
                }
                $("#username").val(nip + '@example.sch.id');
            } else {
                $("#username").val('');
            }
        }

        // filter siswa
        function filter_siswa_ch_uch_checkbox(source){
            checkboxes = document.getElementsByName('siswa_id[]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
              checkboxes[i].checked = source.checked;
            }
        }

        if ($(".iframe-lihat-nilai").length) {
            $(".iframe-lihat-nilai").colorbox({
                iframe:true,
                width:"400",
                height:"200",
                fixed:true,
            });
        }

        if ($(".iframe-pertanyaan, .iframe-pilihan").length) {
            $(".iframe-pertanyaan, .iframe-pilihan").colorbox({
                iframe:true,
                width:"800",
                height:"600",
                fixed:true,
                overlayClose: false,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".iframe-copy-pertanyaan").length) {
            $(".iframe-copy-pertanyaan").colorbox({
                iframe:true,
                width:"900",
                height:"600",
                fixed:true,
                overlayClose: false,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".iframe-koreksi-jawaban").length) {
            $(".iframe-koreksi-jawaban").colorbox({
                iframe:true,
                width:"700",
                height:"550",
                fixed:true,
                onClosed : function() {
                    location.reload();
                }
            });
        }

        if ($(".iframe-detail-jawaban").length) {
            $(".iframe-detail-jawaban").colorbox({
                iframe:true,
                width:"700",
                height:"600",
                fixed:true,
            });
        }

        if ($(".iframe-jawaban-sementara").length) {
            $(".iframe-jawaban-sementara").colorbox({
                iframe:true,
                width:"700",
                height:"600",
                fixed:true,
            });
        }

    }

// });
