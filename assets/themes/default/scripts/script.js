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
});
