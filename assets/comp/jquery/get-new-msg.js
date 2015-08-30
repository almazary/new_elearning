$(function() {
    function get_new_msg()
    {
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

    setInterval(function() {
        get_new_msg();
    }, 5000);
});
