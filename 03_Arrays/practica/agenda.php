<?php
if (isset($_POST['nombre'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
}
if (isset($_POST['telefono'])) {
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);
}
if (isset($_POST['agenda'])) {
    $agenda = $_POST['agenda'];
}
if (isset($_POST['opcion'])) {
    $opcion = $_POST['opcion'];
}
$error = "";
isset($_POST['agenda']) ? $agenda = $_POST['agenda'] : $agenda = array();
switch ($opcion) {
    case 'Añadir':
        if (!is_numeric($telefono)) {
            $error .= "<p>Error 4: El telefono debe ser numerico</p><br>";
        }
        if ($telefono == preg_match('^[0-9]\d{8}$^', $telefono)) {
            $agenda[$nombre] = $telefono;
        }
        if (isset($agenda[$nombre]) && $telefono == '') {
            unset($agenda[$nombre]);
        }
        break;
    case 'Borrar':
        $agenda = array();

        break;

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
            <?php foreach ($agenda as $nombre => $telefono) { ?>
                <tr>
                    <td><?= $nombre ?></td>
                    <td><?= $telefono ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <h3>Añadir contacto</h3>
        <form action="agendapractica.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" id="telefono">
            <?php
            foreach ($agenda as $nombre => $telefono) {
                echo "<input type='hidden' name='agenda[$nombre]' value='$telefono'>";
            }
            ?>
            <input type="hidden" name="submited" value="true">
            <input type="submit" name="opcion" value="Añadir">
            <input type="reset" name="opcion" value="Borrar">
        </form>
    </div>

</div>


</body>
<!--TODO 1.BUG cargando pagina por primera vez-->
<!--TODO 2.BUG al borrar contactos solo borra parte de contenido quedando de la siguiente manera
{"2":{"id":3,"nombre":"Carslo","telefono":"24"},"3":{"id":2,"nombre":"Carlos243","telefono":"24243"}}-->

</html>