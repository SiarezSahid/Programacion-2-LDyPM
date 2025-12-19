<?php
include("conexion.php");
session_start();

if (!isset($_GET["id"])) {
    echo "<h2>Error: No se encontró la noticia.</h2>";
    exit;
}

$id = $_GET["id"];

$sql2 = "SELECT * FROM categorias";
$datos2 = mysqli_query($conexion, $sql2);

$categorias = [];
foreach ($datos2 as $categoria) {
    $categorias[$categoria['id_categoria']] = $categoria['nombre_categoria'];
}

$sql = "SELECT * FROM peliculas WHERE id_pelicula = $id";
$resultado = mysqli_query($conexion, $sql);

$pelicula = mysqli_fetch_assoc($resultado);

if (!$pelicula) {
    echo "<h2>Error: La película no existe.</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineMagia Mas Info</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.principal.css">
    <link rel="stylesheet" href="css/buscar.css">
    <link rel="stylesheet" href="css/masinfo.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <meta name="author" content="Siarez Esteban Sahid">
</head>

<body>

    <!-- Encabezado -->
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="Logo de CineMagia"></a>
        </div>

        <nav class="nav">
            <?php if (isset($_SESSION["usuario"])) { ?>
                <ul class="nav__lista">
                    <li><a href="index.php#servicios">Emociones</a></li>
                    <li><a href="carga.php">Cargar Nuevas Peliculas</a></li>
                    <li><a href="editar.php">Editar Peliculas</a></li>
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
                    <li><a href="index.php#servicios">Emociones</a></li>
                    <li><a href="carga.php">Cargar Nuevas Peliculas</a></li>
                    <li><a href="editar.php">Editar Peliculas</a></li>
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
            <div class="pelicula-contenedor">
                <img src="data:image/jpg;base64,<?= base64_encode($pelicula['imagen_pelicula']) ?>" alt="Poster">
                <div class="pelicula-datos">
                    <h2><?= $pelicula['nombre_pelicula']; ?></h2>
                    <p class="pelicula-descripcion">
                        <?= $pelicula['descripcion_pelicula']; ?>
                    </p>
                    <div class="pelicula-extra">
                        <span>$<?= $pelicula['precio']; ?></span>
                        <span><?= $categorias[$pelicula['id_categoria']] ?? "Sin categoría"; ?></span>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Pie de página -->
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