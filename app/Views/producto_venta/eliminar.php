<div class="modal" tabindex="-1" role="dialog" id="eliminarProductoVenta">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Eliminar Producto a la Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="formularioEliminarProductoVenta">
            <input type="hidden" name="id" id="eliminarProductoVentaId" class="form-control">
             <h3 class="text-center">¿Desea eliminar producto a la venta <span id="productoVentaEliminar"></span> ?</h3>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger bi bi-trash"> Eliminar</button>
                <button type="button" class="btn btn-secondary bi bi-x-circle" data-bs-dismiss="modal"> Cerrar</button>
            </div>
            </form>
        </div>
    </div>
</div>