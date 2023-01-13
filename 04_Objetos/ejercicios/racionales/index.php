<?php
spl_autoload_register(fn ($clase) => require "$clase.php");
if (isset($_POST['submit'])) {
    $r1 = new Relacional($_POST['num1']);
    $r2 = new Relacional($_POST['num2']);
    $opcion = $_POST['calculo'];
    switch ($opcion) {
        case 'suma':
            $suma = $r1->sumar($r2);
            $mensaje = "$suma";
            break;
        case 'resta':
            $resta = $r1->restar($r2);
            $mensaje = "$resta";
            break;
        case 'multiplicacion':
            $multiplicacion = $r1->multiplicacion($r2);
            $mensaje = "$multiplicacion";
            break;
        case 'division':
            $division = $r1->division($r2);
            $mensaje = "$division";
            break;
    }
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>


</head>

<body>
    <fieldset>
        <legend>Calculadora relacional</legend>
        <form action="index.php" method="POST">
            <input type="text" name="num1" id="">
            <!--Menu para seleccionar -->
            <select name="calculo" id="calculo">
                <option value="suma">+</option>
                <option value="resta">-</option>
                <option value="multiplicacion">*</option>
                <option value="division">/</option>
            </select>
            <input type="text" name="num2" id="">
            <label>=</label>
            <input type="text" name="resultado" value="<?= $mensaje ?>" disabled>
            <br>
            <input type="submit" value="Enviar" name="submit">
        </form>
    </fieldset>
    <h1><?= "$mensaje" ?></h1>
</body>

</html>