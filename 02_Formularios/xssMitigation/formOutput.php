<?php
if (isset($_POST['nombre'])) {
    $nombre = filter_input(INPUT_POST, 'nombre');
    $nombre = htmlspecialchars($nombre);
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formOutput</title>
</head>

<body>
    <h1>Formulario</h1>
    <p>Los valores introducidos son:</p>
    <ul>
        <?php
        if (isset($nombre) && ($nombre != "")) {
            echo "<li>Nombre: $nombre</li>";
        } else {
            echo "<li>Nombre: No se ha introducido</li>";
        }
        if (isset($password) && ($password != "")) {
            echo "<li>Password: $password</li>";
        } else {
            echo "<li>Password: No se ha introducido</li>";
        }
        ?>
    </ul>
</body>


</html>