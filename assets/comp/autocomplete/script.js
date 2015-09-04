$(document).ready(function() {
    $('#penerima').autocomplete({
        serviceUrl: site_url + '/ajax/get_data/penerima',
    });
});
