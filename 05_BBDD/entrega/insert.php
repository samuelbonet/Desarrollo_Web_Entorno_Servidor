<?php
require "credentials.php";
function carga($clase)
{
    require "$clase.php";
}

spl_autoload_register("carga");

$db = new Database();
$tabla = $_GET['table'] ?? null;


if (isset($_GET['table'])) {
    $campos = $db->get_table($tabla)[0];
    $camposNombres = array_keys($campos);
    $form = "<form action='insert.php' method='post'>";
    foreach ($camposNombres as $campo) {
        $form .= "<label for='$campo'>$campo</label><input type='text' name='$campo' id='$campo'><br>";
    }
    $form .= "<input type='hidden' name='table' value='$tabla'>";
    $form .= "<input type='submit' value='Insertar'>";
    $form .= "</form>";
}
if (isset($_POST['table'])) {
    var_dump($_POST);
    $tabla = $_POST['table'];
    unset($_POST['table']);
    $datos = $_POST;
    if ($db->insert_entry($tabla, $datos)) {
        echo "Registro insertado correctamente";
    } else {
        echo "No se ha podido insertar el registro, vuelva a intentarlo, si el problema persiste contacte con el administrador del sistema";
        echo "<br><a href='index.php'>Volver al inicio</a>";
    }
} else {
    if (is_null($tabla)) {
        header("Location: index.php");
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>
    <link rel="stylesheet" href="assets/style.css">

</head>
<body>
<?= $form ?>
</body>
</html>