<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
</head>

<body>
<script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-12"></div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <h1 class="h1  my-4 "><?= $titulo ?> </h1>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
                <button id="cerrarSesion" class="btn btn-secondary form-control mt-4 border border-dark"><i class="bi bi-person-circle"></i> Cerrar Sesión</button>
            </div>
        </div>
    </div>

    <nav class="row navbar navbar-light bg-light border border-dark">
        <div class="col-lg-4 col-md-4 col-sm-12 ">
            <a class="navbar-brand btn btn-secondary text-white my-1 form-control" href="#">
                <i class="bi bi-bar-chart-fill"></i> ESCRITORIO
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <a class="navbar-brand btn btn-secondary text-white my-1 form-control" href="/productos_ventas">
                <i class="bi bi-cash-coin"></i> VENDER
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <a class="navbar-brand btn btn-secondary text-white my-1 form-control" href="/productos">
                <i class="bi bi-gift-fill"></i> PRODUCTOS
            </a>
        </div>
    </nav>