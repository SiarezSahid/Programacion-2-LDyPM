<?php
include('conexion.php');
session_start();

$sql = "SELECT * FROM personas";
$datos = mysqli_query($conexion, $sql);

$usuario = $_GET["usuario"];
$pass = $_GET["pass"];

$loginCorrecto = false; // Variable para saber si se encontró usuario
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineMagia Login</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/styleLoginRegistro.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
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
                    <li><a href="cerrar.php">Cerrar Sesión</a></li>
                </ul>
            <?php } else { ?>
                <ul class="nav__lista">
                    <li><a href="index.php #servicios">Emociones</a></li>
                    <li><a href="carga.php">Cargar Nuevas Peliculas</a></li>
                    <li><a href="editar.php">Editar Peliculas</a></li>
                </ul>
            <?php } ?>
        </nav>
    </header>

    <div class="flex-container">
        <div class="fondo">
            <?php
            foreach ($datos as $dat) {
                if ($dat["usuario"] == $usuario && $dat["pass"] == $pass) {
                    $_SESSION["usuario"] = $dat["usuario"];
                    $loginCorrecto = true;
                    ?>
                    <h1>Sesión correcta, bienvenido <em><?php echo $_SESSION["usuario"]; ?></em></h1>
                    <?php
                    break; //salimos del foreach
                }
            }

            if ($loginCorrecto == false) { ?>
                <h1>Inicio de sesión incorrecta</h1>
                <a href="login.php">Volver</a>
                <?php
            }
            ?>
        </div>
    </div>

    <!--Pie de pagina-->
    <footer>
        <p>CineMagia@gmail.com</p>
        <p>© 2025 CineMagia Direct, ARG. Todos los derechos reservados.</p>
        <div class="ubicacion">
            <a href="https://maps.app.goo.gl/S29p35PRxKCo9YWJA" target="_blank">
                <i class="fas fa-map-marker-alt"></i> Abel Bazán y Bustos 750, F5300 La Rioja
            </a>
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