<?php
session_start();
include('conexion.php');

$sql2 = "SELECT * FROM categorias";
$datos2 = mysqli_query($conexion, $sql2);

$categorias = [];
foreach ($datos2 as $categoria) {
    $categorias[$categoria['id_categoria']] = $categoria['nombre_categoria'];
}

$sql = "SELECT * FROM peliculas";
$resultado = mysqli_query($conexion, $sql);

$datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineMagia Editar</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/styleLoginRegistro.css">
    <link rel="stylesheet" href="css/editar.css">
    <!--iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!--Fuentes-->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!--Autores-->
    <meta name="author" content="Siarez Esteban Sahid">
</head>

<body>
    <!-- MODAL -->
    <div class="modal-bg" id="modal">
        <div class="modal">
            <span class="cerrar-modal" onclick="cerrarModal()">✖</span>

            <h2>Modificar producto</h2>

            <form action="procesaredit.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="modal-id">
                <label>Nombre:</label>
                <input type="text" name="nombre" id="modal-nombre" required>
                <label>Descripción:</label>
                <textarea name="descripcion" id="modal-descripcion"></textarea>
                <label>Precio:</label>
                <input type="number" name="precio" id="modal-precio">
                <label>Emoción:</label>
                <select name="emocion" id="modal-emocion">
                    <option value="1">Alegría</option>
                    <option value="2">Miedo</option>
                    <option value="3">Ira</option>
                    <option value="4">Asco</option>
                    <option value="5">Calma</option>
                    <option value="6">Amor</option>
                    <option value="7">Tristeza</option>
                    <option value="8">Sorpresa</option>
                </select>
                <label>Imagen actual:</label>
                <img id="modal-img-preview" src="" width="120"
                    style="display:block; margin-bottom:10px; border-radius:6px;">
                <label>Cambiar imagen:</label>
                <input type="file" name="nueva_imagen" accept="image/*">
                <button type="submit">Guardar cambios</button>
            </form>
        </div>
    </div>

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
                    <li><a href="cerrar.php">Cerrar Sesión</a></li>
                </ul>

            <?php } else { ?>
                <ul class="nav__lista">
                    <li><a href="index.php #servicios">Emociones</a></li>
                    <li><a href="carga.php">Cargar Nuevas Peliculas</a></li>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                </ul>
            <?php } ?>
        </nav>
    </header>

    <?php if (isset($_SESSION["usuario"])) { ?>
        <div class="flex-container edit">
            <form action="procesaredit.php" method="POST">
                <table border="2">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Emoción</th>
                            <th>Imagen</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($datos as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['nombre_pelicula']; ?></td>
                                <td><?php echo $dato['descripcion_pelicula']; ?></td>
                                <td>$<?php echo $dato['precio']; ?></td>

                                <td>
                                    <?php
                                    echo $categorias[$dato['id_categoria']] ?? "Sin categoría";
                                    ?>
                                </td>

                                <td>
                                    <img class="imgDB"
                                        src="data:image/jpg;base64,<?= base64_encode($dato['imagen_pelicula']) ?>"
                                        width="200px" />
                                </td>

                                <td>
                                    <button type="button" class="btn-modificar" data-id="<?php echo $dato['id_pelicula']; ?>"
                                        data-nombre="<?php echo htmlspecialchars($dato['nombre_pelicula']); ?>"
                                        data-descripcion="<?php echo htmlspecialchars($dato['descripcion_pelicula']); ?>"
                                        data-precio="<?php echo $dato['precio']; ?>"
                                        data-emocion="<?php echo $dato['id_categoria']; ?>"
                                        data-imagen="data:image/jpg;base64,<?php echo base64_encode($dato['imagen_pelicula']); ?>"
                                        onclick="abrirModalDesdeBoton(this)">
                                        Modificar
                                    </button
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    <?php } else { ?>
        <div class="flex-container">
            <div class="fondo">
                <h1>
                    <a href="login.php">Iniciar Sesion</a> para poder editar peliculas.
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

    <script>
        function abrirModal(id, nombre, descripcion, precio, emocion, imagenURL) {

            document.getElementById("modal-id").value = id;
            document.getElementById("modal-nombre").value = nombre;
            document.getElementById("modal-descripcion").value = descripcion;
            document.getElementById("modal-precio").value = precio;

            // Seleccionar emoción en el select
            document.getElementById("modal-emocion").value = emocion;

            // Vista previa de la imagen
            document.getElementById("modal-img-preview").src = imagenURL;

            document.getElementById("modal").style.display = "flex";
        }

        function cerrarModal() {
            document.getElementById("modal").style.display = "none";
        }
    </script>

    <script>
        function abrirModalDesdeBoton(btn) {

            document.getElementById("modal-id").value = btn.dataset.id;
            document.getElementById("modal-nombre").value = btn.dataset.nombre;
            document.getElementById("modal-descripcion").value = btn.dataset.descripcion;
            document.getElementById("modal-precio").value = btn.dataset.precio;
            document.getElementById("modal-emocion").value = btn.dataset.emocion;

            // imagen
            document.getElementById("modal-img-preview").src = btn.dataset.imagen;

            document.getElementById("modal").style.display = "flex";
        }
    </script>

</body>

</html>