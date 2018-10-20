(function ($) {
  window.hljs.initHighlightingOnLoad()

  // cek sudah login belum
  $.ajax({
    method: 'GET',
    url: window.siteUrl + '/login/data_onload',
    success: function (data) {
      afterInitLoad($.parseJSON(data))
    }
  })

  // tooltip
  $('[data-toggle="tooltip"]').tooltip({html: true})

    // nivoslider login
  if ($('#slider-login').length) {
    $('#slider-login').nivoSlider()
  }

  // timeago
  $.timeago.settings.strings.suffixAgo = 'yang lalu'
  $.timeago.settings.strings.seconds = 'kurang dari semenit'
  $.timeago.settings.strings.minute = 'sekitar semenit'
  $.timeago.settings.strings.minutes = '%d menit'
  $.timeago.settings.strings.hour = 'sekitar sejam'
  $.timeago.settings.strings.hours = 'sekitar %d jam'
  $.timeago.settings.strings.day = 'satu hari'
  $.timeago.settings.strings.days = '%d hari'
  $('time.timeago').timeago()

  // fungsi yang dipanggil saat ajax success
  function onAjaxSuccess (xhr) {
    // logout kalo session expired
    if (xhr.responseText === '403 Forbidden.') {
      window.location.href = window.siteUrl + '/login/sess_expired'
    }

    // timeago
    try {
      $('time.timeago').timeago()
    } catch (e) {}
  }

  // panggil fungsi setelah ajax success
  $(document).ajaxComplete(function (event, xhr, settings) {
    onAjaxSuccess(xhr)
  })

  function loadTexteditor () {
    // jika ada class texteditor atau texteditor-simple
    if ($('textarea.texteditor').length || $('textarea.texteditor-simple').length) {
      try {
        $('textarea.texteditor').ckeditor({
          toolbarGroups: [
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
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
          removeButtons: 'Save,NewPage,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Find,Replace,SelectAll,RemoveFormat,CopyFormatting,Language,CreateDiv,HorizontalRule,PageBreak,Iframe,About,Scayt,Flash,ckeditor_wiris_CAS',
          extraPlugins: 'lineutils,widget,codesnippet,ckeditor_wiris,youtube,html5audio,video',
          codeSnippet_theme: 'monokai',
          allowedContent: true,
          skin: 'office2013'
        })

        window.CKEDITOR.on('dialogDefinition', function (event) {
          var editor = event.editor
          var dialogDefinition = event.data.definition

          var cleanUpFuncRef = window.CKEDITOR.tools.addFunction(function () {
            // Do the clean-up of filemanager here (called when an image was selected or cancel was clicked)
            $('#filemanager_iframe').remove()
            $('body').css('overflow-y', 'scroll')
          })

          var tabCount = dialogDefinition.contents.length
          for (var i = 0; i < tabCount; i++) {
            var browseButton = dialogDefinition.contents[i].get('browse')

            if (browseButton !== null) {
              browseButton.hidden = false
              browseButton.onClick = function (dialog, i) {
                editor._.filebrowserSe = this
                var iframe = $("<iframe id='filemanager_iframe' class='fm-modal'/>").attr({
                  src: window.baseUrl + 'assets/comp/RichFilemanager/index.html' + // Change it to wherever  Filemanager is stored.
                  '?CKEditorFuncNum=' + window.CKEDITOR.instances[event.editor.name]._.filebrowserFn +
                  '&CKEditorCleanUpFuncNum=' + cleanUpFuncRef +
                  '&langCode=en' +
                  '&CKEditor=' + event.editor.name
                })

                $('body').append(iframe)
                $('body').css('overflow-y', 'hidden')  // Get rid of possible scrollbars in containing document
              }
            }
          }
        }) // dialogDefinition
      } catch (e) {}
    }
  }

  // count new data
  function countNewData () {
    $.ajax({
      method: 'GET',
      url: window.siteUrl + '/ajax/get_data/count_new_data',
      success: function (data) {
        var result = $.parseJSON(data)

        // new msg
        if (result.new_msg > 0) {
          $('.menu-count-new-msg').html('')
          $('.menu-count-new-msg').html('<b class="label orange pull-right">' + result.new_msg + '</b>')
        } else {
          $('.menu-count-new-msg').html('')
        }

        // new update
        if (result.new_update > 0) {
          $('.menu-count-new-update').html('')
          $('.menu-count-new-update').html('<b class="label orange pull-right">' + result.new_update + '</b>')
        } else {
          $('.menu-count-new-update').html('')
        }

        // pending siswa
        if (result.pending_siswa > 0) {
          $('.menu-count-pending-siswa').html('')
          $('.menu-count-pending-siswa').html('<b class="label orange pull-right">' + result.pending_siswa + '</b>')
        } else {
          $('.menu-count-pending-siswa').html('')
        }

        // pending pengajar
        if (result.pending_pengajar > 0) {
          $('.menu-count-pending-pengajar').html('')
          $('.menu-count-pending-pengajar').html('<b class="label orange pull-right">' + result.pending_pengajar + '</b>')
        } else {
          $('.menu-count-pending-pengajar').html('')
        }

        // pending laporan
        if (result.unread_laporan > 0) {
          $('.menu-count-unread-laporan').html('')
          $('.menu-count-unread-laporan').html('<b class="label orange pull-right">' + result.unread_laporan + '</b>')
        } else {
          $('.menu-count-unread-laporan').html('')
        }

        // last login
        if (result.last_login_list) {
          if ($('#show-last-login-list').length) {
            $('#show-last-login-list').html(result.last_login_list)
          }
        }
      }
    })
  }

  // get new message di percakapan
  function getNewMsg () {
    if ($('#active_msg_id').length) {
      var activeMsgId = $('#active_msg_id').val()

      $.ajax({
        method: 'POST',
        url: window.siteUrl + '/ajax/post_data/new_msg',
        data: 'active_msg_id=' + activeMsgId,
        success: function (data) {
          if (data !== '') {
            $('#list-msg > tbody:last-child').append(data)
          }
        }
      })
    }
  }

  // filter pengajar
  function filter_pengajar_ch_uch_checkbox (source) {
    let checkboxes = document.getElementsByName('pengajar_id[]')
    for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked
    }
  }

  // tambah siswa
  function username_default () {
    if (document.getElementById('default_username').checked) {
      var nis = $('#nis').val()
      if (nis === '') {
        nis = new Date().getTime()
      }
      $('#username').val(nis + '@example.sch.id')
    } else {
      $('#username').val('')
    }
  }

  // filter siswa
  function filter_siswa_ch_uch_checkbox (source) {
    let checkboxes = document.getElementsByName('siswa_id[]')
    for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked
    }
  }

  function username_default_pengajar () {
    if (document.getElementById('default_username').checked) {
      var nip = $('#nip').val()
      if (nip === '') {
        nip = new Date().getTime()
      }
      $('#username').val(nip + '@example.sch.id')
    } else {
      $('#username').val('')
    }
  }

  function afterInitLoad (param) {
    const isUserLoggedIn = parseInt(param.is_user_logged_in)
    const sedangUjian = parseInt(param.sedang_ujian)
    const siteLang = param.lang

    // jika sudah login
    if (isUserLoggedIn === 1) {
      loadTexteditor()
    }

    // area yang harus login dan tidak sedang ujian
    if (isUserLoggedIn === 1 && sedangUjian === 0) {
      // home
      if ($('#info-update-link').length) {
        // popup new version
        setTimeout(function () {
          $.ajax({
            type: 'GET',
            url: window.siteUrl + '/ajax/get_data/elearning-dokumenary-feed',
            success: function (data) {
              var values = $.parseJSON(data)
              $.each(values.feed, function (i, val) {
                $('#info-update').append("<tr><td><a href='" + val.link + "' target='_blank'>" + val.title + '</a></td></tr>')
              })

              if (values.urgent_info) {
                $('#show-urgent-info').html(values.urgent_info)
              }
            }
          })
        }, 1000)
      }

      // panggil count new data
      countNewData()

      setInterval(function () {
        countNewData()

        getNewMsg()
      }, 10000)

      // jika ada class datatable
      if ($('.datatable').length) {
        $('.datatable').dataTable({
          'language': {
            'url': window.baseUrl + 'assets/comp/datatables/lang.id.json'
          },
          'aaSorting': [],
          'bAutoWidth': false,
          'aoColumnDefs': [
            { 'bSortable': false, 'aTargets': [ 0 ] }
          ],
          'stateSave': true
        })
      }

      // nestedSortable kelas
      if ($('ol#kelas').length) {
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
        })

        $('#update-hirarki').click(function () {
          $.ajax({
            type: 'POST',
            url: window.siteUrl + '/ajax/post_data/hirarki_kelas',
            data: $('ol.sortable').nestedSortable('serialize'),
            success: function (data) {
              $('#response_update').html('<span class="text-success pull-right"><i class="icon icon-ok"></i> Update hirarki kelas berhasil</span>')
              setTimeout(function () {
                $('#response_update').html('')
              }, 3000)
            }
          })
        })
      }

      $('#kelas-mapel-kelas-parent-kelas').on('change', function () {
        $.ajax({
          type: 'POST',
          url: window.siteUrl + '/ajax/post_data/get_subkelas',
          data: 'parent_kelas_id=' + this.value,
          success: function (data) {
            $('#kelas-mapel-kelas-sub-kelas').html(data)
          }
        })
      })

      $('#kelas_id').change(function () {
        $.ajax({
          type: 'POST',
          url: window.siteUrl + '/ajax/post_data/mapel_kelas',
          data: 'kelas_id=' + this.value,
          success: function (data) {
            $('#mapel_kelas_id').html(data)
          }
        })
      })

      // cekall mapel
      $('.checkAll').change(function () {
        $('.checkbox-mapel').prop('checked', $(this).prop('checked'))
      })

      // colorbox pengajar
      if ($('.pengajar-iframe').length) {
        $('.pengajar-iframe').colorbox({
          iframe: true,
          width: '430',
          height: '405',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.pengajar-iframe-2').length) {
        $('.pengajar-iframe-2').colorbox({
          iframe: true,
          width: '400',
          height: '205',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.pengajar-iframe-3').length) {
        $('.pengajar-iframe-3').colorbox({
          iframe: true,
          width: '500',
          height: '305',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.pengajar-iframe-4').length) {
        $('.pengajar-iframe-4').colorbox({
          iframe: true,
          width: '600',
          height: '605',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.pengajar-iframe-5').length) {
        $('.pengajar-iframe-5').colorbox({
          iframe: true,
          width: '450',
          height: '340',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.pengajar-iframe-6').length) {
        $('.pengajar-iframe-6').colorbox({
          iframe: true,
          width: '430',
          height: '450',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.pengajar-iframe-7').length) {
        $('.pengajar-iframe-7').colorbox({
          iframe: true,
          width: '600',
          height: '500',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      // colorbox siswa
      if ($('.siswa-iframe').length) {
        $('.siswa-iframe').colorbox({
          iframe: true,
          width: '400',
          height: '200',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.siswa-iframe-kelas-aktif').length) {
        $('.siswa-iframe-kelas-aktif').colorbox({
          iframe: true,
          width: '400',
          height: '200',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.siswa-iframe-2').length) {
        $('.siswa-iframe-2').colorbox({
          iframe: true,
          width: '400',
          height: '205',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.siswa-iframe-3').length) {
        $('.siswa-iframe-3').colorbox({
          iframe: true,
          width: '500',
          height: '305',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.siswa-iframe-4').length) {
        $('.siswa-iframe-4').colorbox({
          iframe: true,
          width: '600',
          height: '605',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.siswa-iframe-5').length) {
        $('.siswa-iframe-5').colorbox({
          iframe: true,
          width: '450',
          height: '340',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('#siswa-edit-password').length) {
        $.colorbox({
          iframe: true,
          width: '500',
          height: '305',
          fixed: true,
          onClosed: function () {
            window.location.href = window.siteUrl + '/login/pp'
          },
          href: $('.siswa-iframe-3').attr('href'),
          transition: 'none'
        })
      }

      // materi
      if ($('.iframe-laporkan').length) {
        $('.iframe-laporkan').colorbox({
          iframe: true,
          width: '400',
          height: '300',
          fixed: true,
          overlayClose: true
        })
      }

      // pesan
      if ($('#msg-penerima').length) {
        $('#msg-penerima').tagsinput({
          allowDuplicates: false,
          typeahead: {
            source: function (query) {
              return $.getJSON(window.siteUrl + '/ajax/get_data/penerima?query=' + query)
            }
          },
          freeInput: false
        })
      }

      // pengumuman
      if ($('#pengumuman-tgl-tampil').length) {
        $('#pengumuman-tgl-tampil').dateRangePicker({
          language: (siteLang === 'indonesian') ? 'id' : 'default'
        })
      }

      if ($('.iframe-lihat-nilai').length) {
        $('.iframe-lihat-nilai').colorbox({
          iframe: true,
          width: '400',
          height: '200',
          fixed: true
        })
      }

      if ($('.iframe-pertanyaan, .iframe-pilihan').length) {
        $('.iframe-pertanyaan, .iframe-pilihan').colorbox({
          iframe: true,
          width: '800',
          height: '600',
          fixed: true,
          overlayClose: false,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.iframe-copy-pertanyaan').length) {
        $('.iframe-copy-pertanyaan').colorbox({
          iframe: true,
          width: '900',
          height: '600',
          fixed: true,
          overlayClose: false,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.iframe-koreksi-jawaban').length) {
        $('.iframe-koreksi-jawaban').colorbox({
          iframe: true,
          width: '700',
          height: '550',
          fixed: true,
          onClosed: function () {
            window.location.reload()
          }
        })
      }

      if ($('.iframe-detail-jawaban').length) {
        $('.iframe-detail-jawaban').colorbox({
          iframe: true,
          width: '700',
          height: '600',
          fixed: true
        })
      }

      if ($('.iframe-jawaban-sementara').length) {
        $('.iframe-jawaban-sementara').colorbox({
          iframe: true,
          width: '700',
          height: '600',
          fixed: true
        })
      }
    }
  }
})(window.jQuery)
