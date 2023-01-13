<?php
$valores = $_POST['nombre'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formOutput</title>
</head>

<body>
    <h1>Formulario</h1>
    <p>Los valores introducidos son:</p>
    <ul>
        <?php
        foreach ($valores as $valor) {
            echo "<li>$valor</li>";
        }
        ?>
    </ul>
</body>

</html>