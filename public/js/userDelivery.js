$(document).ready(function() {
    $.getJSON( "/clothe/search", function( response ) {
        $.each(response, function(key, value) {
            $('#clothe')
                .append('<option value="'+value.id+'">'+value.clothe+'</option>');
        });
        $('#deliveryForm').submit(function (e) {
           e.preventDefault();
           var url = $(this).attr('action');
           $.post(url, $('#deliveryForm').serialize()).done(function (response) {
              alert(response);
           });
        });
    });
});