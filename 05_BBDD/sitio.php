<?php
session_start();
require "inicializa.php";


$usuario = $_SESSION['usuario'] ?? null;

if (is_null($usuario)) {
    header("Location:index.php");
    exit();
}
$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Ver familia":
        $db = new DB();
        $familia = $db->obtener_tabla("familia");
        break;
    case "Ver tienda":
        $db = new DB();
        $tienda = $db->obtener_tabla("tienda");
        break;
    case "Ver producto":
        $db = new DB();
        $producto = $db->obtener_tabla("producto");
        break;
}




?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Logueado</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>

<body>
    Hola, bienvenido <?php echo $_GET['usuario'] ?>
    <form action="sitio.php" method="post">
        <input type="submit" value="Ver familia" name="submit">
        <input type="submit" value="Ver tienda" name="submit">
        <input type="submit" value="Ver producto" name="submit">
    </form>
    <fieldset>
        <?php
        if (isset($familia)) {
            echo interfaz::genera_tabla($familia, "Familia");
        }
        if (isset($tienda)) {
            echo interfaz::genera_tabla($tienda, "Tienda");
        }
        if (isset($producto)) {
            echo interfaz::genera_tabla($producto, "Producto");
        }
        ?>
    </fieldset>
</body>

</html>