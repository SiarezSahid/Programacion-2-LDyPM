<?php
session_start();

include("conexion.php");

$sql = "SELECT * FROM peliculas";
$datos = mysqli_query($conexion, $sql);

if ($_GET) {
    if (isset($_GET["buscar"])) {

        $nombrePeli = $_GET["buscar"];
        $sql = "SELECT * FROM peliculas WHERE nombre_pelicula = '$nombrePeli'";
        $datos = mysqli_query($conexion, $sql);
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineMagia Buscar</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.principal.css">
    <link rel="stylesheet" href="css/buscar.css">
    <!--iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!--Fuentes-->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!--Autor-->
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
                    <li><a href="carga.php">Cargar Nuevas Peliculas</a></li>
                    <li><a href="editar.php">Editar Peliculas</a></li>
                    <!--Buscador-->
                    <li class="buscar">
                        <form action="buscar.php" method="GET">
                            <label for="buscar">
                                <i class="fas fa-search"></i>
                                <input class="buscador" type="text" id="buscar" name="buscar" placeholder="buscar">
                            </label>
                        </form>
                    </li>
                    <li><a href="cerrar.php">Cerrar Sesión</a></li>
                </ul>

            <?php } else { ?>
                <ul class="nav__lista">
                    <li><a href="index.php #servicios">Emociones</a></li>
                    <li><a href="carga.php">Cargar Nuevas Peliculas</a></li>
                    <li><a href="editar.php">Editar Peliculas</a></li>
                    <!--Buscador-->
                    <li class="buscar">
                        <form action="buscar.php" method="GET">
                            <label for="buscar">
                                <i class="fas fa-search"></i>
                                <input class="buscador" type="text" id="buscar" name="buscar" placeholder="buscar">
                            </label>
                        </form>
                    </li>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                </ul>
            <?php } ?>

        </nav>
    </header>

    <div class="fondoPrincipal">
        <section class="section-estrenos">
            <div class="subtitulo">
                <h2>
                    <?php foreach ($datos as $dat) {
                        echo $dat['nombre_pelicula'];
                    } ?>
                </h2>
            </div>
            <figure class="flex-containerFigure morado">
                <div class="slider">
                    <div class="slide_track">
                        <?php foreach ($datos as $dat) { ?>
                            <div class="slide">
                                <img src="data:image/jpg;base64,<?= base64_encode($dat['imagen_pelicula']) ?>" />
                                <div class="overlay">
                                    <a class="btn-modificar" href="masinfo.php?id=<?= $dat['id_pelicula'] ?>">Ver
                                        más</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </figure>
        </section>
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