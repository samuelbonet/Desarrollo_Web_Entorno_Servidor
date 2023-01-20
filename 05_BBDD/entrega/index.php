<?php
$msj = null;
$tabla = null;
$tablaGenerada = null;
session_start();
require "helpers.php";

$opcion = $_POST['submit'] ?? null;
switch ($opcion) {
    case "Ver familia":
        $tablaGenerada = Generar::tabla("familia");
        break;
    case "Ver producto":
        $tablaGenerada = Generar::tabla("producto");
        break;
    case "Ver stock":
        $tablaGenerada = Generar::tabla("stock");
        break;
    case "Ver tienda":
        $tablaGenerada = Generar::tabla("tienda");
        break;
    case "Log-out":
        session_destroy();
        header("Location:login.php");
        break;
}
$db = new Database();
$tablasRaw = $db->get_all_tables();
$tablas = [];
foreach ($tablasRaw as $tabla) {
    $tablas[] = $tabla['Tables_in_' . DB_NAME];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="assets/style.css">


</head>
<body>
<form action="index.php" method="post">
    <?php
    foreach ($tablas as $tabla) {
        echo "<input type='submit' name='submit' value='Ver $tabla'>";
    }

    ?>
    <input type="submit" name="submit" value="Log-out">
</form>
<?php
if (!is_null($tablaGenerada)) {
    echo $tablaGenerada;
}
?>
</body>
</html>