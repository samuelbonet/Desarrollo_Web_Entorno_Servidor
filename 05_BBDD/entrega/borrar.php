<?php

require "helpers.php";

$db = new Database();
$tabla = $_GET['tabla'] ?? null;
$datos = $_GET;
unset($datos['tabla']);
if (is_null($tabla)) {
    header("Location: index.php");
    exit();
}
if($db->borrar_registro($tabla, $datos)){
    header("Location: index.php");
    exit();
}
else{
    echo "No se ha podido borrar el registro, vuelva a intentarlo, si el problema persiste contacte con el administrador del sistema";
    echo "<br><a href='index.php'>Volver al inicio</a>";
}


