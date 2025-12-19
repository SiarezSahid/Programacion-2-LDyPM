<?php
session_start();
include('conexion.php');

if ($_POST) {
    $nombrePeli = $_POST["nombrePeli"];
    $descriPeli = $_POST["descriPeli"];
    $precioPeli = $_POST["precioPeli"];
    $emocionPeli = $_POST["emocionPeli"];

    //subir imagen a DB
    //contenido binario de la imagen
    $imgPeli = addslashes(file_get_contents($_FILES["imgPeli"]["tmp_name"]));

    $sql = "INSERT INTO peliculas(nombre_pelicula, descripcion_pelicula, precio, id_categoria, imagen_pelicula) 
        VALUES ('$nombrePeli', '$descriPeli', $precioPeli, $emocionPeli, '$imgPeli')";

    $result = mysqli_query($conexion, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineMagia Carga</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/styleLoginRegistro.css">
    <link rel="stylesheet" href="css/carga.css">
    <!--iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!--Fuentes-->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!--Autores-->
    <meta name="author" content="Siarez Esteban Sahid">
</head>

<body>
    <!--Encabezado-->
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="Logo de CineMagia"></a>
        </div>
        <nav class="nav">
            <?php
            if (isset($_SESSION["usuario"])) { ?>
                <ul class="nav__lista">
                    <li><a href="index.php #servicios">Emociones</a></li>
                    <li><a href="editar.php">Editar Peliculas</a></li>
                    <li><a href="cerrar.php">Cerrar Sesión</a></li>
                </ul>
            <?php } else { ?>
                <ul class="nav__lista">
                    <li><a href="index.php #servicios">Emociones</a></li>
                    <li><a href="editar.php">Editar Peliculas</a></li>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                </ul>
            <?php } ?>
        </nav>
    </header>

    <div class="flex-container">
        <div class="fondo">
            <?php
            if ($result) { ?>
                <h2>Carga exitosa, <a href="carga.php">Cargar otra pelicula</a> </h2>
                <?php
            } else {
                ?>
                <br>
                <h2>Error al cargar, <a href="carga.php">Cargar de nuevo</a> </h2>
            <?php }
            ?>
        </div>
    </div>

    <!--Pie de pagina-->
    <footer>
        <p>CineMagia@gmail.com</p>
        <p>© 2025 CineMagia Direct, ARG. Todos los derechos reservados.</p>
        <div class="ubicacion">
            <a href="https://maps.app.goo.gl/S29p35PRxKCo9YWJA" target="_blank"><i class="fas fa-map-marker-alt"></i>
                Abel Bazán y Bustos 750, F5300 La Rioja</a>
        </div>
        <div class="redesSociales">
            <a href="#" target="_blank"><i class="fab fa-x-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-tiktok"></i></a>
            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
    </footer>
</body>

</html>