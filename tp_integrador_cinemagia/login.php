<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineMagia Login</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/styleLoginRegistro.css">
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
                    <li><a href="carga.php">Cargar Nuevas Peliculas</a></li>
                    <li><a href="editar.php">Editar Peliculas</a></li>
                    <li><a class="cambiar" href="html/registro.html">Registrarse</a></li>
                    <li><a href="cerrar.php">Cerrar Sesión</a></li>
                </ul>
            <?php } else { ?>
                <ul class="nav__lista">
                    <li><a href="index.php #servicios">Emociones</a></li>
                    <li><a href="carga.php">Cargar Nuevas Peliculas</a></li>
                    <li><a href="editar.php">Editar Peliculas</a></li>
                    <li><a href="cerrar.php">Cerrar Sesión</a></li>
                </ul>
            <?php } ?>
        </nav>
    </header>

    <?php if (isset($_SESSION["usuario"])) { ?>
        <div class="flex-container">
            <div class="fondo">
                <h2>Ya Inicio Sesi&oacute;n</h2>
            </div>
        </div>
    <?php } else { ?>
        <div class="flex-container">
            <div class="fondo">
                <h2>INICIAR SESI&Oacute;N</h2>
                <form action="procesarlogin.php" method="GET">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" required>
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" id="pass" required>
                    <div class="recordar">
                        <input type="checkbox" name="chekrecordar" id="checkrecordar">
                        <label for="checkrecordar">Recordarme</label>
                    </div>
                    <input class="boton" type="submit" value="INICIAR SESION">
                </form>
                <p>¿No tienes una cuenta? <a class="cambiar" href="html/registro.html">REGISTRATE</a></p>
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