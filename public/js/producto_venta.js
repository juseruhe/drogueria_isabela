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

            columns: [
                { data: "nombre" },
                {
                    "data": "id",
                    "bSortable": false,
                    "mRender": function (data, type, value) {
                        return "<button id='botonVender' type='button' data-id='" + value.id + "' data-codigo_barras='" + value.codigo_barras + "' data-nombre='" + value.nombre + "' data-precio='" + value.precio + "' class='btn btn-success botonVender'>VENDER </button>";
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
    $(document).on("click", '#botonVender', function (e) {
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

        $('#productoVentaId').prop('disabled', false)
        $('#productoVentaCantidad').prop('disabled', false)
        $('#productoVentaBoton').prop('disabled', false)

        $('#productosEncontrados').modal('hide')

    });

    // Crear la tabla de Productos a vender
    var tablaProductosVentas = $('#tablaProductosVentas').DataTable({

        ajax: {
            method: "get",
            url: "/productos_ventas/mostrarProductosVentas",
            dataSrc: "",
            destroy: "true"
        },

        columns: [
            { data: "nombre" },
            { data: "cantidad" },
            { data: "precio" },
            { data: "total" },
            {
                "data": "id",
                "bSortable": false,
                "mRender": function (data, type, value) {
                    return "<button id='botonEditarProductoVenta' class='btn btn-warning bi bi-pencil-square form-control' data-id='" + value.id + "'> Editar </button> <button id='botonEliminarProductoVenta' class='btn btn-danger my-2 form-control bi bi-eraser' data-id='" + value.id + "'> Eliminar </button>";
                }
            }

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
    })

    // Pasar datos a productos a vender

    $('#formularioProductoVenta').submit(function (e) {
        e.preventDefault();

        var producto_id = $('#productoVentaId').val()
        var cantidad = $('#productoVentaCantidad').val()

        if (cantidad < 0) {
            cantidad = 0
        }

        var datos = {
            "producto_id": producto_id,
            "cantidad": cantidad
        }

        console.log(datos)

        $.ajax({
            type: "post",
            url: "/productos_ventas",
            data: datos,
            success: function (response) {

                swal({
                    title: "Producto agregado a la venta",
                    text: "Por Favor Verifique los datos",
                    icon: "success"
                })

                $('#productoVentaId').val("")
                $('#productoVentaCodigoBarras').val("")
                $('#productoVentaNombre').val("")
                $('#productoVentaCantidad').val("")
                $('#productoVentaPrecio').val("")

                $('#productoVentaId').prop('disabled', true)
                $('#productoVentaCantidad').prop('disabled', true)
                $('#productoVentaBoton').prop('disabled', true)

                $('#busqueda').val('')

                total()
                tablaProductosVentas.ajax.reload()

            }, error: function (error) {
                swal({
                    title: "Error al agregar un producto a la venta: " + error.status,
                    text: "Por Favor Verifique los datos",
                    icon: "error"
                })
            }
        });
    });

    // Editar Productos-Ventas
    $(document).on('click', '#botonEditarProductoVenta', function (e) {
        e.preventDefault()

        fila = $(this).closest('tr')

        $('#editarProductoVentaId').val($(this).data('id'))
        $('#editarProductoVentaNombre').val(fila.find('td:eq(0)').text())
        $('#editarProductoVentaCantidad').val(fila.find('td:eq(1)').text())
        $('#editarProductoVentaPrecio').val(fila.find('td:eq(2)').text())

        $('#editarProductoVenta').modal('show')
    });

    //Actualizar Productos-Ventas
    $('#formularioEditarProductoVenta').submit(function (e) {
        e.preventDefault();

        var id = $('#editarProductoVentaId').val()
        var cantidad = $('#editarProductoVentaCantidad').val()

        if (cantidad < 0) {
            cantidad = 0
        }

        var datos = {
            "cantidad": cantidad
        }

        $.ajax({
            type: "put",
            url: "/productos_ventas/" + id,
            data: datos,
            success: function (response) {
                $('#editarProductoVenta').modal('hide')

                swal({
                    title: "Producto a la Venta actualizado",
                    text: "Por Favor Verifique los datos",
                    icon: "success"
                })

                total()
                tablaProductosVentas.ajax.reload()

            }, error: function (error) {

                swal({
                    title: "Error al actualizar Producto a la venta: " + error.status,
                    text: "Por Favor Verifique los datos",
                    icon: "error"
                })
            }
        });

    });

    // Llamar si quiere eliminar producto-venta
    $(document).on("click", "#botonEliminarProductoVenta", function (e) {
        e.preventDefault()

        fila = $(this).closest('tr')

        var id = $(this).data('id')
        var nombre = fila.find('td:eq(0)').text()

        $('#eliminarProductoVentaId').val(id)
        $('#productoVentaEliminar').html(nombre)

        $('#eliminarProductoVenta').modal('show')
    });

    // Eliminar producto-Venta
    $("#formularioEliminarProductoVenta").submit(function (e) {
        e.preventDefault();

        var id = $('#eliminarProductoVentaId').val()

        $.ajax({
            type: "delete",
            url: "/productos_ventas/" + id,
            success: function (response) {
                $('#eliminarProductoVenta').modal('hide')

                swal({
                    title: "Producto a la venta eliminado",
                    text: "Por Favor verifique los datos",
                    icon: "success"
                })

                total()
                tablaProductosVentas.ajax.reload()
            }, error: function (error) {

                swal({
                    title: "Error al Eliminar producto a la venta: " + error.status,
                    text: "Por Favor verifique los datos",
                    icon: "error"
                })
            }
        });
    });

    // Petición para el total de los productos-ventas
    var total_valor;

    function total() {
    
        $.ajax({
            type: "get",
            url: "/productos_ventas/total",
            data: "data",
            success: function (response) {
    
                $('#total').addClass('alert alert-success');
    
                response.forEach(element => {
    
                    total_valor = element.total_productos_ventas
                });
    
                $('#total').html('Total: $' + total_valor)
    
            }, error: function (error) {
                $('#total').addClass('alert alert-danger');
                $('#total').html('Hay un error ' + error.status);
            }

    })

}

total()


});