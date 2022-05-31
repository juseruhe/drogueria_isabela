$(document).ready(function () {

    // ventas al día
    var dia;

    function ventas_dia() {

        $.ajax({
            type: "get",
            url: "/ventas/dia",
            success: function (response) {
                $('#dia').addClass('alert alert-warning my-4');

                dia = response

                if (dia.ventas_dia == null || dia.ventas_dia == 0 || dia.ventas_dia == "null" ||
                    dia.ventas_dia < 0) {
                    $('#dia').html('<h2 class="h2 text-left" role="alert"> $' + 0 + '</h2> VENTAS DEL DÍA');
                } else {
                    $('#dia').html('<h2 class="h2 text-left" role="alert"> $' + dia.ventas_dia + '</h2> VENTAS DEL DÍA');
                }

            }, error: function (response) {
                console.log(response)
                $('#dia').addClass('alert alert-danger my-4');
                $('#dia').html('<h2 class="h2 text-left" role="alert"> Hay un error ' + response.status + "</h2>");
            }
        });

    }

    ventas_dia();

    // Ventas mes

    var mes;

    function venta_mes() {

        $.ajax({
            type: "get",
            url: "/ventas/mes",
            success: function (response) {
                $('#mes').addClass('alert alert-primary my-4');
                mes = response

                if (mes.ventas_mes == null || mes.ventas_mes == 0 || mes.ventas_mes == "null" ||
                    mes.ventas_mes < 0) {
                    $('#mes').html('<h2 class="h2 text-left" role="alert"> $' + 0 + '</h2> VENTAS DEL MES');
                } else {
                    $('#mes').html('<h2 class="h2 text-left" role="alert"> $' + mes.ventas_mes + '</h2> VENTAS DEL MES');
                }

            }, error: function (error) {
                $('#mes').addClass('alert alert-danger my-4');
                $('#mes').html('h2 class="h2 text-left" role="alert"> Hay un error ' + error.status + '</h2>')
            }
        });

    }

    venta_mes()

    // ventas del año
    var anio;

    $.ajax({
        type: "get",
        url: "/ventas/anio",
        success: function (response) {
            $('#anio').addClass('alert alert-success my-4');
            anio = response

            if (anio.ventas_anio == null || anio.ventas_anio == 0 || anio.ventas_anio == "null"
                || anio.ventas_anio < 0) {
                $('#anio').html('<h2 class="h2 text-left" role="alert"> $' + 0 + '</h2> VENTAS DEL AÑO');
            } else {
                $('#anio').html('<h2 class="h2 text-left" role="alert"> $' + anio.ventas_anio + '</h2> VENTAS DEL AÑO');
            }


        }, error: function (error) {
            $('#anio').addClass('alert alert-danger my-4');
            $('#anio').html('h2 class="h2 text-left" role="alert"> Hay un error ' + error.status + '</h2>')
        }
    });


});