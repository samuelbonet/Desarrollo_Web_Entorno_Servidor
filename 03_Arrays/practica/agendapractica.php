<?php
// +-----------+--------+----------+-------------------------------------+
// |   CASOS   | NOMBRE | TELEFONO |               ACCION                |
// +-----------+--------+----------+-------------------------------------+
// | No_EXISTE | OK     | OK       | AÑADIR AGENDA                       |
// | EXISTE    | OK     | OK       | MODIFICAR REGISTRO                  |
// | EXISTE    | OK     | NO       | BORRAR                              |
// | -         | NO     | OK       | E1, NO AÑADIR SIN NOMBRE            |
// | -         | NO     | NO       | E2 NO AÑADIR SIN NOMBRE NI TELEFONO |
// +-----------+--------+----------+-------------------------------------+
//Nombre no puede ser vacío
// Si telefono no es correcto, no se actualiza



// Check empty
// Get the data from the form
isset($_POST['nombre']) ? $nombre = htmlspecialchars($_POST['nombre']) : $nombre = '';
isset($_POST['telefono']) ? $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT) : $telefono = '';
isset($_POST['agenda']) ? $agenda = json_decode($_POST['agenda'], true) : $agenda = array();
// Si se ha enviado el formulario y el nombre no está vacío
switch ($_POST['submited']) {
    // Caso 4 (Nombre NO y telefono OK)
    case ($nombre === '' && $telefono !== ''):
        echo "<p>Error 1: No se puede añadir un contacto sin nombre</p><br>";
        break;
    // Caso 5 (Nombre NO y telefono NO)
    case ($nombre === '' && $telefono === ''):
        // Si se ha enviado desde un post
        $error .= "<p>Error 2 : No se puede añadir un contacto sin nombre ni telefono</p><br>";
        break;
    // Caso 1 (No existe y nombre y telefono OK)
    case (!in_array($nombre, array_column($agenda, 'nombre')) && $telefono !== ''):
        $agenda[] = array("nombre" => $nombre, "telefono" => $telefono);
        break;

    // Caso 2 (Existe y nombre y telefono OK)
    case (in_array($nombre, array_column($agenda, 'nombre')) && $telefono !== ''):
        $id = array_search($nombre, array_column($agenda, 'nombre'));
        $agenda[$id]['telefono'] = $telefono;
        break;
    // Caso 3 (Existe y nombre OK y telefono NO)
    case (in_array($nombre, array_column($agenda, 'nombre')) && $telefono === ''):
        $id = array_search($nombre, array_column($agenda, 'nombre'));
        unset($agenda[$id]);
        break;
}
function agendatoTable($agenda): string
{
    $table = "";
    foreach ($agenda as $contacto) {
        $table .= "<tr>";
        $table .= "<td>" . $contacto['nombre'] . "</td>";
        $table .= "<td>" . $contacto['telefono'] . "</td>";
        $table .= "</tr>";
    }
    return $table;
}

?>
<!doctype html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda de Contactos</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container mx-auto">
    <?php if ($error !== "") {
        echo "<div class='alert alert-danger'>$error</div>";
    } ?>
    <header>
        <h1>Agenda de Contactos</h1>
        <h2>Actualmente tienes <?= count($agenda) ?> contactos</h2>
    </header>
    <div class="content">
        <h3>Contactos en la agenda</h3>
        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
            </tr>
            </thead>
            <tbody>
            <?= agendatoTable($agenda) ?>
            </tbody>
        </table>

        <h3>Añadir contacto</h3>
        <form action="agendapractica.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" id="telefono">
            <input type="hidden" name="agenda" value='<?= json_encode($agenda) ?>'>
            <input type="hidden" name="submited" value="true">
            <input type="submit" value="Añadir">
        </form>
    </div>

</div>


<footer>
    <a href="agendapractica.php">Vaciar</a>
</footer>
</body>
<!--TODO 1.BUG cargando pagina por primera vez-->
<!--TODO 2.BUG al borrar contactos solo borra parte de contenido quedando de la siguiente manera
{"2":{"id":3,"nombre":"Carslo","telefono":"24"},"3":{"id":2,"nombre":"Carlos243","telefono":"24243"}}-->

</html>

