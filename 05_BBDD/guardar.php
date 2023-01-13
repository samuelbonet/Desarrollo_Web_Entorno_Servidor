<?php
require "inicializa.php";
$db = new DB();
$tabla = $_POST['tabla'];
$raw_Data = $_POST;
unset($raw_Data['tabla']);

$consulta = $db->update_fila($tabla, $raw_Data);

if ($consulta) {
    header("Location:sitio.php?mensaje=Entrada actualizada correctamente");
    exit();
} else {
    echo "Error al actualizar la entrada";
}
