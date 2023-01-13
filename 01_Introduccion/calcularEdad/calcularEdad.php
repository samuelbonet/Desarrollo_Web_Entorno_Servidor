<?php
$nombre = "Carlos";

$fecha_Nacimiento = "2003-01-31";

$fecha_Actual = "2022-10-28";

$edad = (substr($fecha_Actual, 0, 4)) - (substr($fecha_Nacimiento, 0, 4));

switch (true) {
    case ((substr($fecha_Actual, 5, 2)) < (substr($fecha_Nacimiento, 5, 2))):
        $edad--;
        break;
    case ((substr($fecha_Actual, 5, 2)) == (substr($fecha_Nacimiento, 5, 2))):
        if ((substr($fecha_Actual, 8, 2)) < (substr($fecha_Nacimiento, 8, 2))) {
            $edad--;
        }
        break;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de edad</title>
</head>

<body>
    <h1>Hola <?= $nombre ?></h1>
    <h2>Hoy es <?= $fecha_Actual ?></h2>
    <h2>Y teniendo en cuenta que tu fecha de nacimiento es <?= $fecha_Nacimiento ?></h2>
    <h3>A dia de hoy tienes <?php
                            // $resultado = $edad < 1 ? echo("Tienes menos de 1 año") : echo($edad) ;
                            if ($edad < 1) {
                                echo ("Tienes menos de 1 año");
                            } else {

                                echo ($edad);
                            } ?></h3>
</body>

</html>