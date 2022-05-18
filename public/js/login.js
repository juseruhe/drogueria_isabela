$(document).ready(function () {

    $('#login').submit(function (e) {
       e.preventDefault()

        var usuario;

        $.ajax({
            type: "POST",
            url: "/",
            data: $('#login').serialize(),
            success: function (response) {
                usuario = response

                if (usuario.numero_documento != null) {
                    localStorage.setItem('numero_documento', usuario.numero_documento)
                    window.location.href = "/main";
                }else{
                    $('.mensaje').html("<div class='alert alert-danger'><i class='bi bi-x-circle-fill'> </i> Número de Documento o Contraseña Incorrecta       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                }

            }, error: function (error) {
                console.log("Error: ", error)
            }
        });
    })

})
