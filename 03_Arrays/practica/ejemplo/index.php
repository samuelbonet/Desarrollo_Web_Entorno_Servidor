<?php

// +-----------+--------+----------+-------------------------------------+
// |   CASOS   | NOMBRE | TELEFONO |               ACCION                |
// +-----------+--------+----------+-------------------------------------+
// | No_EXISTE | OK     | OK       | AÑADIR AGENDA                       |
// | EXISTE    | OK     | OK       | MODIFICAR REGISTRO                  |
// | EXISTE    | OK     | NO       | BORRAR                              |
// | -         | NO     | OK       | E1, NO AÑADIR SIN NOMBRE            |
// | -         | NO     | NO       | E2 NO AÑADIR SIN NOMBRE NI TELEFONO |
// | -         | NO     |          | E3 NO AÑADIR SIN NOMBRE NI TELEFONO |
// +-----------+--------+----------+-------------------------------------+
//Nombre no puede ser vacío
// Si telefono no es correcto, no se actualiza
$opcion = $_POST['submit'] ?? null;
$error = null;
$agenda = [];
function validaErrores($n, $t, &$a)
{
    $error = null;

    return $error;
}
function actualizar_contacto($n, $t, &$a)
{
}
function add_contacto($n, $t, &$a)
{
}
function borrar_contacto($n, $t, &$a)
{
}
switch ($opcion) {

    case "Actualizar":
        $nombre = $_POST['nombre'] ?? null;
        $telefono = $_POST['telefono'] ?? null;
        $error = validaErrores($nombre, $telefono, $agenda);
        if (!$error) {
            if (array_key_exists($nombre, $agenda)) {
                actualizar_contacto($nombre, $telefono, $agenda);
            } else {
                add_contacto($nombre, $telefono, $agenda);
            }
        }

        break;
    case "Vaciar":

        break;
    default:
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./estilo.css" type="text/css">
    <script src='https://unpkg.com/vue'></script>
    <title> Agenda de contactos</title>
</head>
<header>
    Agenda de contactos: sin contactos actualmente</header>

<body>

    <div class="listado_contactos">
        <div class="center">LISTADO DE CONTACTOS</div>
        <hr>
        <div class="center">
            Agenda sin contactos </div>
    </div>
    <!-- Creamos el formulario para insertr los nuevos datos-->
    <fieldset>
        <legend>Nuevo Contacto</legend>
        <form action=/dwes/practicas/agenda/index.php method="post">
            <br>
            <label for="nombre">Nombre</label><input type="text" name="nombre" size="15" /><br />
            <label for="telefono">Teléfono </label><input type="number" name="telefono" size="15" /><br />
            <input type="submit" value="Actualizar" name="enviar">
            <input type="submit" value="Vaciar" name="enviar" disabled>

            <!-- Metemos los contactos existentes  ocultos en el formulario-->
        </form>
    </fieldset>
    <div style="clear:both ">
        <hr />
    </div>

</body>

</html>