<?php
$numero = filter_input(INPUT_POST, 'numero');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar</title>

</head>

<body>
    <?php
    if (isset($numero) == false) {
        echo "<h1>Introduce un número</h1>";
        echo "<form action='form.php' method='post'>
        <label for='numero'>Introduce el numero del que desees saber la tabla:</label>
        <input type='number' name='numero' id='numero'>
        <button type='submit' value='Enviar'>Enviar</button>
    </form>";
    }
    if (is_numeric($numero) == true) {
        echo "<h1>Tabla de multiplicar del $numero</h1>";
        echo "<table border='1'>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            echo "<td>$numero</td>";
            echo "<td>x</td>";
            echo "<td>$i</td>";
            echo "<td>=</td>";
            echo "<td>" . $numero * $i . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a href='form.php'>Volver</a>";
    } else {
        $numero = 0;
    }


    ?>
</body>

</html>