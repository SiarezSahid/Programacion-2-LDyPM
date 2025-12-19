<?php
session_start();
include('conexion.php');

if ($_POST) {
    $id = $_POST["id"];
    $nombrePeli = $_POST["nombre"];
    $descriPeli = $_POST["descripcion"];
    $precioPeli = $_POST["precio"];
    $emocionPeli = $_POST["emocion"];

    $imgPeli = addslashes(file_get_contents($_FILES["nueva_imagen"]["tmp_name"]));

    $sql = "UPDATE peliculas SET 
                    nombre_pelicula = '$nombrePeli',
                    descripcion_pelicula = '$descriPeli',
                    precio = '$precioPeli',
                    id_categoria = '$emocionPeli',
                    imagen_pelicula = '$imgPeli'
            WHERE id_pelicula = $id";

    $result = mysqli_query($conexion, $sql);

    if ($result) {
        echo "<h2> Modificacion realizada</h2>";
        header("Location: editar.php");
        exit();
    } else {
        echo "Error al modificar película"; ?>
        <a href="editar.php">Volver a modificar</a>
        <?php
    }
}
?>