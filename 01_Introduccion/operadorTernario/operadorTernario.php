<?php
$numero = rand(1, 100);
$resultado = ($numero % 2 == 0) ? "El numero $numero es par" : "El numero $numero es impar";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par impar</title>
</head>

<body>
    <?php echo $resultado ?>
</body>

</html>