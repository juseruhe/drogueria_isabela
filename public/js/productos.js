$(document).ready(function () {

    // Datatable
    var table = $('#tabla').DataTable({

        ajax: {
            "url": "productos/mostrar",
            "dataSrc": "",
            "method": "GET",
            "destroy": true
        },

        columns: [
            { "data": "nombre" },
            { "data": "codigo_barras" },
            { "data": "precio" },
            {
                "data": "id",
                "bSortable": false,
                "mRender": function (data, type, value) {
                    return '<button id="botonEditarProducto"  class="btn btn-warning bi bi-pencil-square form-control botonEditarProducto" value="' + value.id + ' "> Editar</button> <button id="botonEliminarProducto" class="my-2 btn btn-danger form-control bi bi-eraser" value="' + value.id + '"> Eliminar</button>';
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
    })

    // Insertar 
    $('#botonCrearProducto').click(function (e) {
        e.preventDefault();

        $('#crearProducto').modal('show')

    });

    $('#formularioCrearProducto').submit(function (e) {
        e.preventDefault();

        var codigo_barras = $('#codigo_barras').val()
        var precio = $('#precio').val()

        if (codigo_barras.length < 4 || codigo_barras.length > 13) {
            $('#mensaje').html("<div class='alert alert-danger'> <i class='bi bi-x-circle-fill'></i> El Código de barras debe contener entre 4-13 números <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>")
        } else if (precio < 50) {

            $('#mensaje').html("<div class='alert alert-danger'> <i class='bi bi-x-circle-fill'></i> El Precio del producto no puede ser menor a 50 pesos  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>")
        } else {

            $.ajax({
                type: "post",
                url: "/productos",
                data: $('#formularioCrearProducto').serialize(),
                success: function (response) {
                    $('#crearProducto').modal('hide')

                    swal({
                        title: "Se inserto un nuevo Producto ",
                        text: "Por Favor verifique los datos insertados",
                        icon: "success"
                    })

                    $('#nombre').val("")
                    $('#codigo_barras').val("")
                    $('#precio').val("")

                    table.ajax.reload()

                }, error: function (response) {
                    $('#crearProducto').modal('hide')

                    swal({
                        title: "¡Hay un error ! " + response.status,
                        text: "Por Favor verifique los datos insertados ",
                        icon: "error"
                    })
                }
            });
        }
    });

    // Borrar Datos Cuando cierre modal de crear
    /* $('#crearProducto').on('hidden.bs.modal', function (e) {
         e.preventDefault()
 
         $('#nombre').val("")
         $('#codigo_barras').val("")
         $('#precio').val("")
 
     });*/

    // Eventos click de editar 
    $(document).on("click", "#botonEditarProducto", function (e) {
        e.preventDefault()

        fila = $(this).closest("tr")

        var id = e.target.value
        var nombre = fila.find('td:eq(0)').text()
        var codigo_barras = fila.find('td:eq(1)').text()
        var precio = fila.find('td:eq(2)').text()

        $('#editarId').val(id)
        $('#editarNombre').val(nombre)
        $('#editarCodigoBarras').val(codigo_barras)
        $('#editarPrecio').val(precio)

        $('#editarProducto').modal('show')

    });

    // Actualizar

    $("#formularioEditarProducto").submit(function (e) {
        e.preventDefault();

        var id = $('#editarId').val()
        var nombre = $('#editarNombre').val()
        var codigo_barras = $('#editarCodigoBarras').val()
        var precio = $('#editarPrecio').val()

        if (codigo_barras.length < 4 || codigo_barras.length > 13) {
            $('#mensajeEditarProducto').html("<div class='alert alert-danger'> <i class='bi bi-x-circle-fill'></i> El Código de barras debe contener entre 4-13 números <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>")
        }
        else if (precio < 50) {
            $('#mensajeEditarProducto').html("<div class='alert alert-danger'> <i class='bi bi-x-circle-fill'></i> El Precio del producto no puede ser menor a 50 pesos <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>")
        }
        else {
            $.ajax({
                type: "put",
                url: "/productos/" + id,
                data: $("#formularioEditarProducto").serialize(),
                success: function (response) {
                    $("#editarProducto").modal('hide')

                    swal({
                        title: "Se actualizo un Producto ",
                        text: "Por Favor verifique los datos actualizados",
                        icon: "success"
                    })

                    console.log(response)

                    table.ajax.reload()
                }, error: function (error) {
                    swal({
                        title: "! Hubo un error: " + error.status + " !",
                        text: "Por Favor verifique los datos insertados",
                        icon: "error"
                    })
                }
            });
        }
    });

    // Eliminar
    $(document).on("click", "#botonEliminarProducto", function (e) {
        e.preventDefault()

        fila = $(this).closest("tr")

        var id = e.target.value
        var nombre = fila.find('td:eq(0)').text()

        $('#id').val(id)
        $('#productoEliminar').html(nombre)

        $('#eliminarProducto').modal('show')

    });

    $('#formularioEliminarProducto').submit(function (e) {
        e.preventDefault();

        var id = $('#id').val()

        $.ajax({
            type: "delete",
            url: "/productos/" + id,
            success: function (response) {
                $('#eliminarProducto').modal('hide')

                swal({
                    title: "¡Producto eliminado exitosamente!",
                    text: "Por Favor verifique el producto eliminado",
                    icon: "success"
                })

                table.ajax.reload()
            },
            error: function (error) {
                swal({
                    title: "¡Error al eliminar producto!",
                    text: "Error: " + error.status,
                    icon: "error"
                })
            }
        });

    });




});