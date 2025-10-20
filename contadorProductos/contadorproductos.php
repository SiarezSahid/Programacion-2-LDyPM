<?php
//Contador de productos seleccionados (PHP+Arrays)

/*
Un alumno de la catedra, tiene un tío quiosquero, está desarrollando 
un sistema para ayudarlo a contar cuántos productos seleccionados tiene el negocio.

El objetivo es recorrer el vector de productos seleccionados y contar cuántos productos hay en total.

Pistas:
$productos = ["ticktack", "kinder", "mogul", "coca", "aquarius", "opera", "mentitas", "galletitas", "fanta", "sprite", "pringles", "bonobon", "milka", "jugo cepita", "alfajor", "caramelos", "agua mineral"]

recorre con foreach
cuenta y muestra el total.

*/



$contador = 0;
$productos = ["ticktack", "kinder", "mogul", "coca", "aquarius", "opera", "mentitas", "galletitas", "fanta", "sprite", "pringles", "bonobon", "milka", "jugo cepita", "alfajor", "caramelos", "agua mineral"];

$contador = count($productos);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kiosko</title>
</head>

<body>
    <h1>Contador de producos</h1>
    <p>La cantidad de productos seleccionados es:
        <strong><?php echo $contador; ?></strong>
    </p>

    <table border="1">
        <tr>
            <th>Productos</th>
        </tr>
        <?php
        foreach ($productos as $producto) { ?>
            <tr>
                <td>
                    <?php echo $producto; ?>
                </td>
            <?php }
        ?>
        </tr>
    </table>
</body>

</html>