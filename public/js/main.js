// Verificar Inicio de Sesión
if(!localStorage.getItem('numero_documento')){
    window.location.href = '/'
}else{
    $('#numero_documento').html("<h2 class='h1 text-center my-4 '> Bienvenido "+localStorage.getItem('numero_documento')+"</h2> ")
}

$(document).ready(function () {

    
    $('#cerrarSesion').click(function(e){
        e.preventDefault()
        localStorage.removeItem('numero_documento')
        window.location.href= '/'
    })
});