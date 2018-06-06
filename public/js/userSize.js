$(document).ready(function() {

    var userId = $('#userId').val();
    $.getJSON( "/user/size/"+userId, function( response ) {
        $('#box').append('<div class="col-md-6">');
        var countInput = 0;
        $.each(response, function(key, value) {
            countInput ++;

            if(countInput <= 5) {
                $('#box1')
                    .append('<div class="form-group col-md-7">' +
                        '   <label>'+value.clothe_name+'</label>' +
                        '   <input type="text" class="item form-control" id="'+value.clothe_id+'" value="'+value.user_size+'" name="ropa[]">' +
                        ' </div>');
            } else {
                $('#box2')
                    .append('<div class="form-group col-md-7">' +
                        '   <label>'+value.clothe_name+'</label>' +
                        '   <input type="text" class="item form-control" id="'+value.clothe_id+'" value="'+value.user_size+'" name="ropa[]">' +
                        ' </div>');
            }
        });

    }); $('#box').append('</div>');

    $('#sizeForm').submit(function (e) {
        e.preventDefault();

        var url = $(this).attr('action');

        var values = $("input.item");

        var userId = $('#userId').val();

        var myArray = $.map(values, function(element) {
            return {clothes_id: element.id, user_size: element.value};
        });

        $.post(url, {userSize: myArray, userId:userId}).done(function (response) {
            alert(response);
        });
    });
});