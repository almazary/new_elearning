$(document).ready(function(){
    $(".iframe-pertanyaan").colorbox({
        iframe:true,
        width:"800",
        height:"600",
        fixed:true,
        overlayClose: false,
        onClosed : function() {
            location.reload();
        }
    });
});
