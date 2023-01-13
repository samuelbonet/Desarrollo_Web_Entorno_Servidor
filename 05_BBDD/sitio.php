<?php
session_start();
require "inicializa.php";


$usuario = $_SESSION['usuario'] ?? null;
$message = $_GET['mensaje'] ?? null;

$db = new DB();

$tablas = $db->get_tablas();
$tableList = [];
// add the tables to the array
foreach ($tablas as $tabla) {
    $tableList[] = $tabla['Tables_in_' . DB_NAME];
}


if (is_null($usuario)) {
    header("Location:index.php");
    exit();
}
$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Ver familia":
        $familia = $db->obtener_tabla("familia");
        break;
    case "Ver producto":
        $producto = $db->obtener_tabla("producto");
        break;
    case "Ver stock":
        $stock = $db->obtener_tabla("stock");
        break;
    case "Ver tienda":
        $db = new DB();
        $tienda = $db->obtener_tabla("tienda");
        break;

    case "Cerrar sesión":
        session_destroy();
        header("Location:index.php");
        exit();
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
    <?php
    if (!is_null($message)) {
        echo "<div id='message'>$message</div>";
    }
    ?>
    <div id="user" style="position: absolute;right:1em">
        <p>Usuario: <?= $usuario ?></p>
    </div>
    <h1>Bienvenido</h1>
    <form action="sitio.php" method="post">
        <input type="submit" value="Ver familia" name="submit">
        <input type="submit" value="Ver producto" name="submit">
        <input type="submit" value="Ver stock" name="submit">
        <input type="submit" value="Ver tienda" name="submit">
        <input type="submit" value="Cerrar sesión" name="submit">
    </form>
    <fieldset>
        <?php
        if (isset($familia)) {
            echo Utils::genera_tabla($familia, "familia");
        }
        if (isset($producto)) {
            echo Utils::genera_tabla($producto, "producto");
        }
        if (isset($stock)) {
            echo Utils::genera_tabla($producto, "stock");
        }
        if (isset($tienda)) {
            echo Utils::genera_tabla($tienda, "tienda");
        }
        ?>
    </fieldset>
</body>

</html>