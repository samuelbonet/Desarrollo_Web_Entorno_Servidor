<?php
$n = rand(1, 100);
// echo "<h1>Antes de invocar \$num vale $num</h1> ";
$nombre = "pepito";
echo "<h1>Antes de invocar el valor de \$nombre -$nombre-";
echo "Cuadrado de par de $n es " . calcula_cuadrado_par($n);
echo "<hr>";
// echo "<h1>Despues de invocar la funcion \$num vale $num </h1>";
echo "<h1>Despues de invocar la funcion \$nombre vale -$nombre- </h1>";

function calcula_cuadrado_par(int $num): int
{
    $num++;


    return $num;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>

<body>
</body>

</html>