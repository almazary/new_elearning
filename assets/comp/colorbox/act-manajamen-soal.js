$(document).ready(function(){
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
});
