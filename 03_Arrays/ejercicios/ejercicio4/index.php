<?php

$notas1 = array_fill(0, 15, 0);
$notas1 = array_map(function () {
    return rand(5, 10);
}, $notas1);

$notas2 = array_fill(0, 15, 0);
$notas2 = array_map(function () {
    return rand(0, 5);
}, $notas2);

$notas = array_merge($notas1, $notas2);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>


<body>

    <?php
    var_dump($notas1);
    print("<br>");
    print("La nota maxima es : " . max($notas1) . "<br>");
    print("La nota minima es : " . min($notas1) . '<br>');
    print("La media es : " . (array_sum($notas1) / count($notas1)));
    var_dump($notas);
    print("<br>");
    print("La nota maxima es : " . max($notas) . "<br>");
    print("La nota minima es : " . min($notas) . '<br>');
    print("La media es : " . (array_sum($notas) / count($notas)) . "<br>");

    
    ?>
</body>

</html>