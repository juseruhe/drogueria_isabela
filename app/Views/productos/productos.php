<?= $head ?>
<div class="container my-4">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12"></div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2 class="h1 my-2">Muestra de Productos</h2>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <button class="btn btn-success form-control my-2" id="botonCrearProducto">
                Crear <i class="bi bi-plus-circle"></i>
            </button>
        </div>
    </div>
</div>

<div class=" table-responsive">
    <table class="table table-striped table-light " id="tabla">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Código de Barras</th>
                <th>Precio de Venta</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>

<?= $crearProducto ?>

<?= $editarProducto ?>

<?= $eliminarProducto ?>

<?= $footer ?>