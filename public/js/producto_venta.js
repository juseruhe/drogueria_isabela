$(document).ready(function () {

    $('#buscar').submit(function (e) {
        e.preventDefault();

        busqueda = $('#busqueda').val(),

        $('#productosEncontrados').modal('show')

        var tablaProductosEncontrados = $('#tablaProductosEncontrados').DataTable({
         
            ajax: {
                method: 'get',
                url: '/productos/buscar/' + busqueda,
                dataSrc: '',
                destroy: 'true'
            },

            columns:[
                {data: "nombre"},
                {
                    "data": "id",
                    "bSortable": false,
                    "mRender": function (data, type, value) {
                        return "<button id='botonVender' type='button' data-id='"+value.id+"' data-codigo_barras='"+value.codigo_barras+"' data-nombre='"+value.nombre+"' data-precio='"+value.precio+"' class='btn btn-success botonVender'>VENDER </button>";
                    }
                },
            ],

            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, 'All']
            ],

            stateSave: true,
            "bDestroy": true
        });

    });

    // Pasando Valores al formulario
    $(document).on("click",'#botonVender', function (e) {
        e.preventDefault()

        var id = $(this).data('id')
        var nombre = $(this).data('nombre')
        var codigo_barras = $(this).data('codigo_barras')
        var cantidad = 0;
        var precio = $(this).data('precio')

        $('#productoVentaId').val(id)
        $('#productoVentaCodigoBarras').val(codigo_barras)
        $('#productoVentaNombre').val(nombre)
        $('#productoVentaCantidad').val(cantidad)
        $('#productoVentaPrecio').val(precio)
        
        $('#productoVentaCantidad').prop('disabled',false)
     
        $('#productosEncontrados').modal('hide')

    });

    // Crear la tabla de Productos a vender
    var tablaProductosVentas = $('#tablaProductosVentas').DataTable({

        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'All']
        ],

        stateSave: true,
        "bDestroy": true
    })

    // Pasar datos a productos a vender

    $('#formularioProductoVenta').submit(function (e) { 
        e.preventDefault();

        alert($('#productoVentaPrecio').val())
        
        console.log($('#formularioProductoVenta').serialize())
    });

});