<?php
$numero = htmlspecialchars($_POST['numero']);
$numero_probado;
$intentos = htmlspecialchars($_POST['intentos']);
var_dump($_POST);
switch ($numero) {
    case $numero_probado > $numero:
        $posicion = "MAYOR";
        break;
    case $numero_probado < $numero:
        $posicion = "MAYOR";
        break;

    default:
        # code...
        break;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugando...</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>

<body>
    El numero es <?php echo $posicion; ?> que el numero buscado.
    Llevas <?php echo $intentos; ?> intentos, te quedan <?php echo 10 - $intentos; ?> intentos.
</body>

</html>