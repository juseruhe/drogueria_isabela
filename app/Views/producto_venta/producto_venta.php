<?= $head ?>

<form id="buscar">
    <div class="container my-4">
        <div class="row">

            <label for="" class="label col-lg-4 col-md-4 col-sm-12">BUSCAR POR CÓDIGO DE BARRAS O NOMBRE DEL PRODUCTO:</label>
            <div class="col-lg-8 col-md-8 col-sm-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <input type="search" required name="" id="busqueda" class="form-control col-lg-4 ">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <button type="submit" class="btn btn-success bi bi-search form-control"></button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12"></div>
        </div>
    </div>
</form>

<form id="formularioProductoVenta">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
            <input type="hidden" name="producto_id" disabled id="productoVentaId" class="form-control">
                <label for="codigo_barras" class="label">Código de Barras:</label>
                <input type="number" disabled required name="codigo_barras" id="productoVentaCodigoBarras" class="form-control">
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
                <label for="codigo_barras" class="label">Nombre del Producto:</label>
                <input type="text" disabled required name="nombre" id="productoVentaNombre" class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-12">
            <div class="form-group">
                <label for="codigo_barras" class="label">Cantidad:</label>
                <input type="number" disabled required name="cantidad" id="productoVentaCantidad" class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-12">
            <div class="form-group">
                <label for="codigo_barras" class="label">Valor:</label>
                <input type="number" disabled required name="precio" id="productoVentaPrecio" class="form-control">
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-12 ">
             <div class="my-4"></div>
            <button type="submit" id="productoVentaBoton" disabled class="btn btn-secondary bi bi-plus-circle form-control"></button>
        </div>
        
    </div>
</div>
</form>

<div class="table-responsive my-3">
    <table class="table table-light" id="tablaProductosVentas">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>

<?= $productos_encontrados ?>

<?= $editarProductoVenta ?>

<?= $eliminarProductoVenta ?>

<?= $footer ?>