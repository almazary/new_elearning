$(document).ready(function(){
    $(".add-question").colorbox({
        iframe:true, 
        width:"850", 
        height:"600", 
        fixed:true,
        onClosed : function() {
            location.reload(); 
        },
        overlayClose: false,
        closeButton: false
    });
});