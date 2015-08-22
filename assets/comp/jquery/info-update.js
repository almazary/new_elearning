$(function() {

    url = $("#info-update-link").val();
    $.ajax({
        type: "GET",
        url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=1000&callback=?&q=' + encodeURIComponent(url),
        dataType: 'json',
        error: function(){
            alert('Unable to load feed, Incorrect path or invalid feed');
        },
        success: function(xml){
            values = xml.responseData.feed.entries;
            var l = 1;
            $.each( values, function( i, val ) {
                if (l <= 15) {
                    $("#info-update").append("<tr><td><a href='"+val.link+"' target='_blank'>"+val.title+"</a></td></tr>");
                }
                l++;
            });
        }
    });

});
