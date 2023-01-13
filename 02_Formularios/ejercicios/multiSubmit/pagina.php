<?php
switch ($_POST['submit']) {
    case 'Enviar':
        $msg = 'Has pulsado el botón Enviar';
        break;
    case 'Borrar':
        $msg = 'Has pulsado el botón Borrar';
        break;
    case 'Cancelar':
        $msg = 'Has pulsado el botón Cancelar';
        break;
    case 'Editar':
        $msg = 'Has pulsado el botón Editar';
        break;
    default:
        $msg = 'No has pulsado ningún botón';
        break;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MultiSubmit</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>

<body>
    <form action="pagina.php" method="post">
        <div style="text-align: center;"> Elige una opción:
        </div> <button type="submit" name="submit" value="Enviar">Enviar</button>
        <button type="submit" name="submit" value="Borrar">Borrar</button>
        <button type="submit" name="submit" value="Cancelar">Cancelar</button>
        <button type="submit" name="submit" value="Editar">Editar</button>

    </form>
    <div class="" style="text-align: center;"> <?= $msg ?>
    </div>
</body>


</html>