<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener datos del formulario
    $usuario = $_GET['usuario'];
    $contrasena = $_GET['password'];

    // Conectar a la base de datos (ajusta estos valores según tu configuración)
    $conexion = new mysqli('localhost', 'root', 'mysql123', 'registro');

    // Verificar la conexión
    if ($conexion->connect_error) {
        die('Error de conexión a la base de datos: ' . $conexion->connect_error);
    }

    // Consulta para verificar las credenciales
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $resultado = $conexion->query($consulta);

    // Verificar si se encontraron resultados
    if ($resultado->num_rows > 0) {
        // Credenciales válidas
        echo json_encode(['success' => true, 'message' => 'Inicio de sesión exitoso']);
    } else {
        // Credenciales incorrectas
        echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrectos']);
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>