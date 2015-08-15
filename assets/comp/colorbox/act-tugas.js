$(document).ready(function(){
    $(".iframe-detail-jawaban").colorbox({
        iframe:true,
        width:"700",
        height:"600",
        fixed:true,
    });

    $(".iframe-koreksi-jawaban").colorbox({
        iframe:true,
        width:"700",
        height:"600",
        fixed:true,
        onClosed : function() {
            location.reload();
        }
    });
});
