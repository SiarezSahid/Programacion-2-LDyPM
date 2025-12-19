<?php
session_start();
include('conexion.php');

$sql = "SELECT * FROM peliculas ";
$resultado = mysqli_query($conexion, $sql);

$datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

if (!$datos) {
    echo "Error en la consulta" . mysqli_error($conexion);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineMagia</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.principal.css">
    <link rel="stylesheet" href="css/slider.css">
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

    <div class="flex-container">
        <main>
            <!--Nuevos estrenos-->
            <section class="section-estrenos">
                <div class="subtitulo">
                    <h2>Nuevos Estrenos</h2>
                </div>
                <figure class="flex-containerFigure">
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

                            <!-- DUPLICADO PARA ANIMACIÓN INFINITA -->
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

            <!--Emociones-->
            <section class="section-servicio" id="servicios">
                <div class="subtitulo">
                    <h2>Buscar por Emociones</h2>
                </div>

                <div class="emotions">
                    <ul class="item">
                        <li><a class="content alegria" href="alegria.php">Alegr&iacute;a</a></li>
                        <li><a class="content ira" href="ira.php">Ira</a></li>
                        <li><a class="content calma" href="calma.php">Calma</a></li>
                        <li><a class="content amor" href="amor.php">Amor</a></li>
                    </ul>
                    <ul class="item">
                        <li><a class="content miedo" href="miedo.php">Miedo</a></li>
                        <li><a class="content tristeza" href="tristeza.php">Tristeza</a></li>
                        <li><a class="content asco" href="asco.php">Asco</a></li>
                        <li><a class="content sorpresa" href="sorpresa.php">Sorpresa</a></li>
                    </ul>
                </div>
            </section>
        </main>

        <!--Publicidad-->
        <aside class="publicidad">
            <article class="publicidad__items pochoclos">
                <img src="img/principal/pochoclos.jpg" alt="pochoclos">
                <h3>30% OFF en toda tu compra !!</h3>
                <p>(valido desde 01/12 hasta el 31/12)</p>
            </article>
            <article class="publicidad__items starlink">
                <img src="img/principal/starlink.png" alt="">
            </article>
            <article class="publicidad__items telecom">
                <img src="img/principal/telecom.gif" alt="doritos">
            </article>
            <article class="publicidad__items">
                <img src="img/principal/personalFlow.gif" alt="doritos">
            </article>
        </aside>
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