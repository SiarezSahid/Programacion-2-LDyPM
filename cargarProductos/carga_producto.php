<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de Producto</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <nav class="container nav_container">
            <a class="nav_items" href="#">Carga Producto</a>
            <a class="nav_items" href="listar_producto.php">Lista Productos</a>
            <a class="nav_items" href="destruir_sesion.php">Destruir sesion</a>
        </nav>
        <h2>Carga de Producto</h2>

        <form action="carga_producto.php" method="POST">
            <label for="nombre">Nombre de Producto:</label>
            <input type="text" name="nombre" id="nombre" required>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" required>

            <input type="submit" value="Carga Producto">
        </form>
        <hr>
    </div>

</body>

</html>


<?php
session_start();


if (isset($_POST["nombre"]) && isset($_POST["precio"])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $productos = array(
        'nombre' => $nombre,
        'precio' => $precio
    );

    if (!isset($_SESSION['lista'])) {
        $_SESSION['lista'] = array();
    }
    array_push($_SESSION['lista'], $productos);

}

?>