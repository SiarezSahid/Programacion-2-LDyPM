<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tpfinal";

$conexion = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_error()) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>