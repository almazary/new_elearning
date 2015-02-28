// $(function() {
    // $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){{
    //     $(".alert-success").alert('close');
    // }});
    
    // $(".alert-warning").fadeTo(2000, 500).slideUp(500, function(){{
    //     $(".alert-warning").alert('close');
    // }});

    $("#popover").popover();

    function load_tinymce() {
        tinymce.execCommand('mceAddControl');
    }

    /* tugas */
    function load_option_form() {
        $.ajax({
            type : "GET",
            url : site_url + "/admin/ajax_post/question_option_form",
            success : function(data){
                $('.option-form').html(data);
            }
        });
    }

    function option_remove(key) {
        var conf = confirm("Anda yakin ingin menghapus?");
        if (conf) {
            $.ajax({
                type : "POST",
                url : site_url + "/admin/ajax_post/question_remove_option_form",
                data : 'key=' + key,
                success : function(data){
                    $('#option-' + key).remove();
                }
            });
        } else {
            return (false);
        }
    }

    load_option_form();

    $('.add-option').bind('click', function(e) {
        e.preventDefault();
        $.ajax({
            type : "GET",
            url : site_url + "/admin/ajax_post/question_add_option_form",
            success : function(data) {
                setTimeout(function(){
                    $('.option-form').append(data);
                    e.unbind('click');
                },1500);
            }
        });
    });
// });