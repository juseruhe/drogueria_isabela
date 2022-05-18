<div class="modal" tabindex="-1" id="crearProducto" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insertar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      <form id="formularioCrearProducto">

      <div class="form-group">
        <label for="nombre" class="label">Nombre de Producto: </label>
        <input type="text" required name="nombre" id="nombre" class="form-control" placeholder="Escriba nombre de Producto:">
      </div>

      <div class="form-group my-4">
          <label for="codigo_barras" class="label" >Código de Barras: </label>
          <input type="number" required name="codigo_barras" id="codigo_barras" class="form-control" placeholder="Escriba código de barras">
      </div>

      <div class="form-group my-4">
          <label for="precio" class="label">Precio:</label>
          <input type="number" required name="precio" id="precio" class="form-control" placeholder="Escriba el precio del producto">
      </div>

      <div id="mensaje"></div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i>  Insertar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>  Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>