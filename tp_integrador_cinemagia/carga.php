<?php
session_start();
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

    <?php
    if (isset($_SESSION["usuario"])) { ?>
        <div class="flex-container">
            <div class="fondo">
                <div class="formu">
                    <form action="prosesarcarga.php" method="POST" enctype="multipart/form-data">
                        <div class="title">
                            <h2>Cargar Peliculas Nuevas:</h2>
                        </div>
                        <label for="nombrePeli">Nombre de la pelicula:</label>
                        <input type="text" name="nombrePeli" id="nombrePeli"><br>
                        <label for="descriPeli">Descripcion de la pelicula:</label>
                        <input type="text" name="descriPeli" id="descriPeli"><br>
                        <label for="precioPeli">Precio:</label>
                        <input type="number" name="precioPeli" id="precioPeli"><br>
                        <label for="emocionPeli">Emocion que genera:</label>
                        <select name="emocionPeli" id="emocionPeli">
                            <option value="1">Alegria</option>
                            <option value="2">Miedo</option>
                            <option value="3">Ira</option>
                            <option value="4">Asco</option>
                            <option value="5">Calma</option>
                            <option value="6">Amor</option>
                            <option value="7">Tristeza</option>
                            <option value="8">Sorpresa</option>
                        </select>
                        <label for="imgPeli">Imagen de la pelicula:</label>
                        <div class="flex-inp">
                            <input class="archivo" type="file" name="imgPeli" id="imgPeli">
                        </div>
                        <br>
                        <input type="submit" value="Cargar Pelicula">
                    </form>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="flex-container">
            <div class="fondo">
                <h1>
                    <a href="login.php">Iniciar Sesion</a> para poder agregar nuevas peliculas.
                </h1>
            </div>
        </div>
    <?php } ?>


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