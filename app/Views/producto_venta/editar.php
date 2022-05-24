<div class="modal" tabindex="-1" role="dialog" id="editarProductoVenta">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Producto a la Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="formularioEditarProductoVenta">

                    <div class="form-group">
                        <label for="editarProductoVentaNombre" class="label">Producto:</label>
                        <input type="hidden" name="id" id="editarProductoVentaId" class="form-control">
                        <input type="text" disabled name="nombre" id="editarProductoVentaNombre" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="editarProductoVentaCantidad" class="label">Cantidad:</label>
                        <input type="number" name="cantidad" id="editarProductoVentaCantidad" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="editarProductoVentaPrecio" class="label">Precio:</label>
                        <input type="number" disabled name="precio" id="editarProductoVentaPrecio" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning bi bi-arrow-repeat"> Actualizar</button>
                <button type="button" class="btn btn-secondary bi bi-x-circle" data-bs-dismiss="modal"> Cerrar</button>
            </div>
            </form>
        </div>
    </div>
</div>