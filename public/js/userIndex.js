$(document).ready(function() {
    var table = $('#tableUsers').DataTable( {
        select: true,
        "sAjaxSource": '/user/search',
        "sAjaxDataProp": "",
        "aoColumns": [
            { "mDataProp": "id" },
            { "mDataProp": "image" },
            { "mDataProp": "nif" },
            {"mDataProp": "name"},
            {"mDataProp": "employeeCode"},
            {"mDataProp": "socialSecurity"},
            {"mDataProp": "dateFirstCTT"},
            {"mDataProp": "dateOld"},
            {"mDataProp": "dateExpirationCTT"},
            {"mDataProp": "datePossibleRenovation"},
            {"mDataProp": "department"},
            {"mDataProp": "subDepartment"},
            {"mDataProp": "availableHolidays"},
            {"mDataProp": "daysDebtsRequest"},
            {"mDataProp": "phoneNumber"},
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ por pagina",
            "zeroRecords": "No se encontraron resultados.",
            "info": "Mostrando pagina _PAGE_ of _PAGES_ ",
            "infoEmpty": "Datos no disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "paginate": {
                "previous": "Retroceder",
                "next": "Siguiente"
            },
            select: {
                rows: "%d fila seleccionada"
            }
        }
    });
    $("label").last().remove();
    table.on( 'select', function ( e, dt, type, indexes ) {
        if ( type === 'row' ) {
            var data = table.rows(indexes).data().pluck('id');
            $('#history').css('display', 'inline-block');
        }
        $.getJSON('/user/delivery/'+data[0], function (response) {
            $('#tableClothe tbody tr').remove();
            $.each(response, function (i, item) {
                $('#tableClothe tbody').append(
                    '<tr>' +
                    '<td>'+item.date_delivery+'</td>' +
                    '<td>'+item.clothe+'</td>' +
                    '<td>'+item.quantity+'</td>' +
                    '<td>' +
                    '        <a class="btn btn-danger" href="#" data-id="'+item.id+'">eliminar</a><br><a href="#">Ver pdf</a></td>' +
                    '</tr>');
            });
        });
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

    $("#search_by_name").on('keyup click', function() {
        table.column(3).search($(this).val()).draw();
    });
    $("#search_by_code_employee").on('keyup click', function() {
        table.column(4).search($(this).val()).draw();
    });
    $("#search_by_departament").on('keyup click', function() {
        table.column(10).search($(this).val()).draw();
    });
    $("#search_by_subDepartment").on('keyup click', function() {
        table.column(11).search($(this).val()).draw();
    });
} );