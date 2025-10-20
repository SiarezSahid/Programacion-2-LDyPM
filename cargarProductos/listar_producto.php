<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <nav class="container nav_container">
            <a class="nav_items" href="carga_producto.php">Carga Producto</a>
            <a class="nav_items" href="#">Lista Productos</a>
            <a class="nav_items" href="destruir_sesion.php">Destruir sesion</a>
        </nav>
        <h2>Lista de productos: </h2>
        <?php
        session_start();
        $total = 0;
        if (isset($_SESSION['lista'])) {
            $productos = $_SESSION['lista'];
            ?>
            <ul>
                <?php
                foreach ($productos as $producto) {
                    $total = $total + $producto["precio"];
                    ?>
                    <li><?php echo "Nombre: " . $producto['nombre']; ?></li>
                    <li><?php echo "Precio: " . $producto['precio']; ?></li>
                <?php } ?>
            </ul>

            <?php
            echo "<p>El total acumulado de precios es: $total</p>";
            ?>

            <?php
        } else {
            echo "<p>Lista Vacia, ingrese productos</p>";
        }
        ?>

    </div>

</body>

</html>