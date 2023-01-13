<?php
//Ejercicio Edad
//HAcer un programa que genere una edad aleatoria entre 0 y 110 años, 
//Informamos de la edad y del nivel de madurez con el siguiente criterio
// 0 años => Recien Nacido
// 1-3 => Bebe
//3-10 => Niño
//11-17=> Adolescente
//18-26=> Joven
//27-59=> Adulto
//60-80 => Experimentado
// > 80 => Disfruta a tope


$edad = rand(0, 110);
$nivel = null;

switch (true):
    case ($edad == 0):
        $nivel = "Recien nacido";
        break;
    case ($edad >= 1 && $edad < 3):
        $nivel = "Bebe";
        break;
    case ($edad >= 3 && $edad < 10):
        $nivel = "Niño";
        break;
    case ($edad >= 11 && $edad < 17):
        $nivel = "Adolescente";
        break;
    case ($edad >= 18 && $edad < 26):
        $nivel = "Joven";
        break;
    case ($edad >= 27 && $edad < 59):
        $nivel = "Adulto";
        break;
    case ($edad >= 60 && $edad < 80):
        $nivel = "Experimentado";
        break;
    case ($edad > 80):
        $nivel = "Disfruta la vida";
        break;
endswitch;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edad</title>
</head>

<body>
    <h1>La edad es <?php echo $edad ?> y el nivel de madurez es : <?php echo $nivel ?></h1>
</body>

</html>