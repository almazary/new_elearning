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
        height:"550",
        fixed:true,
        onClosed : function() {
            location.reload();
        }
    });

    $(".iframe-lihat-nilai").colorbox({
        iframe:true,
        width:"400",
        height:"200",
        fixed:true,
    });
});
