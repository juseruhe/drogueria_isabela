<?= $head ?>

<div class="container">
    <div class="row">
        <div class="col-md-3 my-4 col-sm-12 col-lg-3"></div>

        <div class="col-md-6 col-sm-12 col-lg-6">

            <div class="card my-4 mx-4">
                <img class="card-img-top my-2 mx-1 px-1" src="http://assets.stickpng.com/images/585e4beacb11b227491c3399.png" alt="Iniciar Sesión">
                <div class="card-body">
                    <h5 class="card-title">Inicio Sesión</h5>

                    <form id="login">
                        <div class="form-group my-4">
                            <label for="numero_documento" required class="label" placeholder="Escribe Número Documento">
                                Número Documento :
                            </label>
                            <input type="number" required name="numero_documento" id="numero_documento" class="form-control">
                        </div>

                        <div class="form-group my-4">
                            <label for="contrasena" class="label">Contraseña :</label>
                            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Escriba su contraseña ***">
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg my-4 form-control">
                            <i class="bi bi-check-circle text-white"></i> Iniciar Sesión
                        </button>
                    </form>

                    <div class="mensaje"></div>

                </div>
            </div>


        </div>

        <div class="col-md-3 my-4 col-sm-12 col-lg-3"></div>
    </div>
</div>


<?= $footer ?>