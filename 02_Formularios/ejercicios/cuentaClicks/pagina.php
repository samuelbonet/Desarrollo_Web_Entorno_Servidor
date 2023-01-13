<?php
is_numeric($_POST['click']) ? $click = $_POST['click'] : $click = 0;
$siguiente = $click + 1;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CuentaClicks</title>


</head>

<body>
    <form action="pagina.php" method="post">
        <fieldset>
            <legend>Contador de clicks</legend>
            <?php echo "<button type='submit' name='click' value='$siguiente'>Click</button>" ?>
            <br>
            <?= $click > 0 ? "<p>Has hecho $click clicks</p> <br><a href='pagina.php'>Reinciar</a>" : "" ?>
        </fieldset>
    </form>
</body>


</html>