<?php
function conectar(){
    $host="localhost";
    $user="root";
    $pass="mysql123";

    $bd="registro_asistencias";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>