<div class="modal" tabindex="-1" id="editarProducto" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="formularioEditarProducto">

                    <input type="hidden" name="id" id="editarId" class="form-control">

                    <div class="form-group">
                        <label for="editarNombre" class="label">Nombre de Producto: </label>
                        <input type="text" required name="nombre" id="editarNombre" class="form-control" placeholder="Escriba nombre de Producto:">
                    </div>

                    <div class="form-group my-4">
                        <label for="editarCodigoBarras" class="label">Código de Barras: </label>
                        <input type="number" required name="codigo_barras" id="editarCodigoBarras" class="form-control" placeholder="Escriba código de barras">
                    </div>

                    <div class="form-group my-4">
                        <label for="editarPrecio" class="label">Precio:</label>
                        <input type="number" required name="precio" id="editarPrecio" class="form-control" placeholder="Escriba el precio del producto">
                    </div>

    
                    <div id="mensajeEditarProducto"></div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning"><i class="bi bi-arrow-repeat"></i> Actualizar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>