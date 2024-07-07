$(document).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault();

        // Obtener datos del formulario
        var usuario = $('input[name="usuario"]').val();
        var contrasena = $('input[name="password"]').val();

        // Realizar la solicitud al servidor
        $.ajax({
            type: 'GET',
            url: 'login.php',
            data: { usuario: usuario, password: contrasena },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    // Redirigir a la página de inicio
                    window.location.href = 'asistencia.html';
                } else {
                    alert(response.message);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});