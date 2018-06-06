$(document).ready(function() {

    serverRequest('/user/search');

    $("#search_by_name").keyup(function() {
        console.log($(this).val());
        if($(this).val() === '') {
            serverRequest('/user/search');
            return false;
        }
        serverRequest('/user/search/name/'+$(this).val());
    });

    $("#search_by_code_employee").keyup(function() {
        console.log($(this).val());
        if($(this).val() === '') {
            serverRequest('/user/search');
            return false;
        }
        serverRequest('/user/search/employeecode/'+$(this).val());
    });

    $("#search_by_departament").keyup(function() {
        console.log($(this).val());
        if($(this).val() === '') {
            serverRequest('/user/search');
            return false;
        }
        serverRequest('/user/search/department/'+$(this).val());
    });

    $("#search_by_subDepartment").keyup(function() {
        console.log($(this).val());
        if($(this).val() === '') {
            serverRequest('/user/search');
            return false;
        }
        serverRequest('/user/search/subDepartment/'+$(this).val());
    });

    $('select[name=totalPerPage]').change( function (e) {
        console.log($(this).find(":selected").val());
    });

    $(document).on('click', '.btn.btn-danger',  function (e) {
        e.preventDefault();
        var boton = $(this);
        var id = $(this).attr('data-id');
        $.get('/delete/delivery/'+id, function (response) {
            $(boton).closest('tr').remove();
            alert(response);
        });
        console.log( $(this).closest('tr'));
    });

    function serverRequest(url, option=null)
    {
        $.getJSON( url, function( response ) {
            if (option === null) {
                DrawTable(response);
            }else{
                drawTableDeliveryUser(response);
            }
        });
    }

    function DrawTable(data,option=null)
    {
        $('#tableUsers tbody tr').remove();
        $.each(data, function (i, item) {

            $('#tableUsers tbody').append(
                '<tr data-id="'+item.id+'">' +
                    '<td>'+item.id+'</td>' +
                    '<td>'+item.image+'</td>' +
                    '<td>'+item.nif+'</td>' +
                    '<td>'+item.name+'</td>' +
                    '<td>'+item.employeeCode+'</td>' +
                    '<td>'+item.socialSecurity+'</td>' +
                    '<td>'+item.dateFirstCTT+'</td>' +
                    '<td>'+item.dateOld+'</td>' +
                    '<td>'+item.dateExpirationCTT+'</td>' +
                    '<td>'+item.datePossibleRenovation+'</td>' +
                    '<td>'+item.department+'</td>' +
                    '<td>'+item.subDepartment+'</td>' +
                    '<td>'+item.availableHolidays+'</td>' +
                    '<td>'+item.daysDebtsRequest+'</td>' +
                    '<td>'+item.phoneNumber+'</td>' +
                '</tr>');
        });
    }

    function drawTableDeliveryUser(response)
    {
        $('#tableClothe tbody tr').remove();
            $.each(response, function (i, item) {
                $('#tableClothe tbody').append(
                    '<tr>' +
                        '<td>'+item.date_delivery+'</td>' +
                        '<td>'+item.clothe+'</td>' +
                        '<td>'+item.quantity+'</td>' +
                        '<td>' +
                        '<a class="btn btn-danger" href="#" data-id="'+item.id+'">eliminar</a><br><a href="#">Ver pdf</a></td>' +
                    '</tr>');
            });
    }

    $('#tableUsers').on('click', 'tbody tr', function(event) {
        $(this).addClass('highlight').siblings().removeClass('highlight');
        console.log($(this).attr('data-id'));
        $('#history').css('display', 'inline-block');
        serverRequest('/user/delivery/'+$(this).attr('data-id'),true);
    });

} );