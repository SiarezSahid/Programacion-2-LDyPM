<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar sesion</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <?php
        session_start();
        session_destroy();
        ?>
        <h2><?php echo "Has cerrado la sesión."; ?></h2>
    </div>

</body>

</html>