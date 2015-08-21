$(document).ready(function(){
    $(".confim-delete").colorbox({
        iframe:true,
        width:"200",
        height:"200",
        fixed:true,
        onClosed : function() {
            location.reload();
        }
    });
});
