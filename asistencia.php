<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "registro";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$carrera = $_POST['carrera'];
$grado = $_POST['grado'];
$duracion = $_POST['duracion'];
$fecha = $_POST['fecha'];
$motivo = $_POST['motivo'];

// Preparar y ejecutar la consulta SQL para insertar los datos en la base de datos
$sql = "INSERT INTO asistencias (nombre, carrera, grado, duracion, fecha, motivo) VALUES ('$nombre', '$carrera','$grado','$duracion', '$fecha', '$motivo')";

if ($conn->query($sql) === TRUE) {
    echo "Registro de asistencia exitoso";
} else {
    echo "Error al registrar la asistencia: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
