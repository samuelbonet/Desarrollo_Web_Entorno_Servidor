<?php
if (isset($_POST['usuario'])) {
    require "credenciales.php";
    function carga($clase)
    {
        require "$clase.php";
    }
    var_dump($_POST);
    spl_autoload_register('carga');
    $db = new DB();
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    if ($db->valida_usuario($usuario, $password)) {
        var_dump($_POST);

        echo "Usuario correcto";
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: ./sitio.php?usuario=$usuario");
        exit;
    } else {
        var_dump($_POST);
        $msj = "Datos de conexión incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - BBDD</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>

<body>
    <h1>Formulario de Login</h1>
    <h2><?= $msj ?? '' ?></h2>
    <form action="index.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="submit">
    </form>
</body>

</html>