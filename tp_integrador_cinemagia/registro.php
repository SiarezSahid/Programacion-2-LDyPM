<?php
session_start();
include('conexion.php');

if ($_GET) {
    if (isset($_GET["usuario"]) && isset($_GET["pass"]) && isset($_GET["correo"]) && isset($_GET["terminos"])) {
        $usuario = $_GET["usuario"];
        $pass = $_GET["pass"];
        $correo = $_GET["correo"];
        $sql = "INSERT INTO personas(usuario,pass,correo) VALUES('$usuario','$pass','$correo')";
        $resul = mysqli_query($conexion, $sql);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineMagia Registro</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/styleLoginRegistro.css">
    <!--iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!--Fuentes-->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!--Autores-->
    <meta name="author" content="Estrada Nazarena, Siarez Esteban, Tejerina Carolina">
</head>

<body>
    <!--Encabezado-->
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="Logo de CineMagia"></a>
        </div>
        <nav class="nav">
            <ul class="nav__lista">
                <li><a href="index.php #servicios">Emociones</a></li>
                <li><a href="carga.php">Cargar Nuevas Peliculas</a></li>
                <li><a href="editar.php">Editar Peliculas</a></li>
            </ul>
        </nav>
    </header>

    <div class="flex-container">
        <div class="fondo">
            <?php
            if ($resul) { ?>
                <h2>Registro completo</h2>
                <a href="login.php">Iniciar sesi&oacute;n</a>
            <?php } else { ?>
                <h2>Error al registrar</h2>
                <a href="html/registro.html">volver/a>
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