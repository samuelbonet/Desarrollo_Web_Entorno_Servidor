<?php
//Declaro las variables
$msj = null;
//Creo la sesión
session_start();

//Si el usuario ya esta logueado, lo redirijo a la página principal
if ($_SESSION['usuario'] != null) {
    header("Location: ./index.php");
    exit;
}
//Si el usuario no esta logueado, compruebo si se ha enviado el formulario
if (isset($_POST['usuario'])) {
    //Si se ha enviado el formulario, empiezo a validar datos
    require "credentials.php";

    function carga($clase)
    {
        require "$clase.php";
    }
    spl_autoload_register("carga");

    //Recupero los datos del formulario de login y los sanitizo
    $usuario = htmlspecialchars($_POST['usuario']);
    $password = htmlspecialchars($_POST['password']);

    $db = new Database();
     if ($db->validate_user($usuario, $password)) {
         echo "Usuario correcto";
         session_start();
         $_SESSION['usuario'] = $usuario;
         header("Location: ./index.php");
         exit;
     } else {
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
    <title>Login Page</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="assets/style.css">

    
</head>
<body>
    <h1>Formulario de Login</h1>
    <?= $msj != null ? "<h2>$msj</h2>" : '' ?>
    <form action="login.php" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>