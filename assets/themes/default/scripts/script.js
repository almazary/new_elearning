$(function() {
    // $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){{
    //     $(".alert-success").alert('close');
    // }});

    // $(".alert-warning").fadeTo(2000, 500).slideUp(500, function(){{
    //     $(".alert-warning").alert('close');
    // }});

    $("#popover").popover();

    // popover demo
    $("a[data-toggle=popover]")
      .popover()
      .click(function(e) {
        e.preventDefault()
    });

    $('[data-toggle="tooltip"]').tooltip({html:true});

    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });

    // cek session
    $(document).ajaxComplete(function( event, xhr, settings ) {
        if (xhr.responseText == "403 Forbidden.") {
            window.document.location = site_url;
        }
    });

    // cek count new message
    function check_new_msg()
    {
        $.ajax({
            method: "GET",
            url: site_url + '/ajax/get_data/new_msg',
            success: function (data) {
                if (data > 0) {
                    $("#count-new-msg").html("");
                    $("#count-new-msg").html('<b class="label orange pull-right">' + data + '</b>');
                } else {
                    $("#count-new-msg").html("");
                }
            }
        });
    }

    check_new_msg();

    // get new message
    function get_new_msg()
    {
        if ($("#active_msg_id").length > 0) {
            var active_msg_id = $("#active_msg_id").val();

            $.ajax({
                method: 'POST',
                url: site_url + '/ajax/post_data/new_msg',
                data: 'active_msg_id=' + active_msg_id,
                success: function(data) {
                    if (data != '') {
                        $('#list-msg tr:last').after(data);
                    }
                }
            });
        }
    }

    // count update versi
    function count_new_update()
    {
        if ($("#count-new-update").length > 0) {
            $.ajax({
                method: "GET",
                url: site_url + '/ajax/get_data/count_new_update',
                success: function (data) {
                    if (data > 0) {
                        $("#count-new-update").html("");
                        $("#count-new-update").html('<b class="label orange pull-right">' + data + '</b>');
                    } else {
                        $("#count-new-update").html("");
                    }
                }
            });
        }
    }

    count_new_update();

    setInterval(function() {
        check_new_msg();

        get_new_msg();
    }, 10000);
});
