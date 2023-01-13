<?php
$day = rand(1, 33);
$month = rand(1, 13);
$year = rand(1000, 2100);

$fecha = "$day / $month / $year";
$error = false;
function bisiesto(int $year): bool
{
    $bisiesto = false;
    if (($year % 400 == 0) || ($year % 4 == 0) && ($year % 100 != 0)) {
        $bisiesto = true;
    }
    return $bisiesto;
}
$nombremes = "";

switch ($month) {
    case 1:
        $nombremes = $nombremes == null ? "Enero" : "";

    case 3:
        $nombremes = $nombremes == null ? "Marzo" : "";

    case 5:
        $nombremes = $nombremes == null ? "Mayo" : "";

    case 7:
        $nombremes = $nombremes == null ? "Julio" : "";

    case 8:
        $nombremes = $nombremes == null ? "Agosto" : "";

    case 10:
        $nombremes = $nombremes == null ? "Octubre" : "";

    case 12:
        $nombremes = $nombremes == null ? "Diciembre" : "";

        if ($day > 31)
            $error = "El mes $nombremes($month) solo tiene 31 días, no $day";
        break;
    case 4:
        $nombremes = $nombremes == null ? "Abril" : "";

    case 6:
        $nombremes = $nombremes == null ? "Junio" : "";

    case 9:
        $nombremes = $nombremes == null ? "Septiembre" : "";

    case 11:
        $nombremes = $nombremes == null ? "Noviembre" : "";

        if ($day > 30) {
            $error = "El mes $nombremes($month) solo tiene 30 días, no $day";
        }
        break;
    case 2:
        $nombremes = $nombremes == null ? "Febrero" : "";

        if (bisiesto($year) == true) {
            if ($day > 29) {
                $error = "El mes $nombremes($month) no tiene $day, solo hasta 29 ($year es bisiesto)";
            } else if ($day > 28) {
                $error = "El mes $nombremes($month) no tiene $day, solo hasta 28 ($year no es bisiesto)";
            }
        }
        break;
    default:
        $error = "Error, un año solo tiene 12 meses";
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de Fechas</title>
</head>

<body>
    <?php if ($error == false) {
        echo "La fecha $fecha es correcta";
    } else {
        echo "<h1> La fecha $fecha no es correcta </h1>";
        echo "<h1> Error encontrado $error </h1>";
    } ?>

</body>

</html>