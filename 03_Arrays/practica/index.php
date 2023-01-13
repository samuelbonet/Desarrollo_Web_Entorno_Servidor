<?php
// +-----------+-----------+--------+----------+-------------------------------------+
// |   NUM     |   CASOS   | NOMBRE | TELEFONO |               ACCION                |
// +-----------+-----------+--------+----------+-------------------------------------+
// | 1         | No_EXISTE | OK     | OK       | AÑADIR AGENDA                       |
// | 2         | EXISTE    | OK     | OK       | MODIFICAR REGISTRO                  |
// | 3         | EXISTE    | OK     | NO       | BORRAR                              |
// | 4         | -         | NO     | OK       | E1, NO AÑADIR SIN NOMBRE            |
// | 5         | -         | NO     | NO       | E2 NO AÑADIR SIN NOMBRE NI TELEFONO |
// +-----------+-----------+--------+----------+-------------------------------------+
//Nombre no puede ser vacío
// Si telefono no es correcto, no se actualiza
//================================================================================================
// Data recovery
//================================================================================================
//Recover name
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'] ?? "";
}
//Recover phone
if (isset($_POST['telefono'])) {
    $telefono = $_POST['telefono'] ?? "";
}
//Recover agenda
if (isset($_POST['agenda'])) {
    //Decode json string to array
    // JSON example
    // {"Pepe":{"nombre":"Pepe","telefono":"123456789"},"Juan":{"nombre":"Juan","telefono":"987654321"},"Maria":{"nombre":"Maria","telefono":"123987456"},"Luis":{"nombre":"Luis","telefono":"456789123"},"Ana":{"nombre":"Ana","telefono":"789123456"}}
    $agenda = json_decode($_POST['agenda'], true);
} else {
    //New array agenda
    $agenda = array();
}
if (isset($_POST['nombre']) && isset($_POST['agenda'])) {
    accion($nombre, $telefono, $agenda);
    $agendasend = $agenda;
}
// var_dump($nombre);
// var_dump($telefono);
// var_dump($agenda);
//================================================================================================
// Inicializacion de variables
//================================================================================================

function checkName($name)
{
    if (empty($name)) {
        return false;
    }
    return true;
}
function checkPhone($phone)
{
    if (empty($phone)) {
        return false;
    }
    if (!preg_match("/^[0-9]{9}$/", $phone)) {
        return false;
    }
    return true;
}
function accion($nombre, $telefono, $agenda)
{
    if (checkName($nombre) != true && checkPhone($telefono) != true) {
        return "Error, No se puede añadir a un contacto sin nombre ni telefono";
    } else if (checkName($nombre) != true) {
        return "Error, No se puede añadir a un contacto sin nombre";
    } else {
        //If the name doesn't exist and phone is set, add it to the agenda (CASE 1)
        if (!array_key_exists($nombre, $agenda) && (!empty($telefono))) {
            $agenda[] = array(
                "nombre" => $nombre,
                "telefono" => $telefono
            );
            return $agenda;
        }
        //If the name exists, modify the phone (CASE 2)
        if (array_key_exists($nombre, $agenda)) {
            $agenda[$nombre] = $telefono;
            return "El teléfono de $nombre ha sido modificado";
        }
        //If the name exists but the phone is empty, delete the name (CASE 3)
        if (array_key_exists($nombre, $agenda) && empty($telefono)) {
            unset($agenda[$nombre]);
            return "El teléfono de $nombre ha sido borrado";
        }
    }
}
//Array to json string
function arraytoTable($array)
{
    $json = "";
    foreach ($array as $key => $value) {
        $json .= "<tr>";
        $json .= "<td>" . $key . "</td>";
        $json .= "<td>" . $value['nombre'] . "</td>";
        $json .= "<td>" . $value['telefono'] . "</td>";
        $json .= "</tr>";
    }
    return $json;
}

var_dump($agenda);
var_dump($nombre);
var_dump($telefono);

//================================================================================================
// Main
//================================================================================================
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Practica T3</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <div class="container mx-auto">
        <header class="">
            <h1 class="title text-accentColor">Agenda de Contactos</h1>
            <h2>Actualmente tienes <?= count($agenda) ?> contactos</h2>
        </header>
        <div class="content">
            <h3>Contactos en la agenda</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <?= arraytoTable($agenda) ?>
                </tbody>
            </table>
            <hr>
            <br>
            <hr>
            <h3>Añadir contacto</h3>
            <form action="index.php" method="post">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono">
                <input type="hidden" name="agenda" value='<?= json_encode($agendasend) ?>'>
                <input type="submit" value="Añadir">
        </div>
        </form>
        <?php

        ?>
    </div>


    <footer>
        <a href="index.php">Volver</a>
    </footer>
    </div>
</body>
<!-- <script src="./tailwind.config.js"></script> -->
<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>

</html>