<?php
session_start();
require "inicializa.php";


$usuario=$_SESSION['usuario']?? null;

if(is_null($usuario)){
    header("Location:index.php");
    exit();
}
$opcion =$_POST['submit']??null;
switch ($opcion){
    case "Ver familias":
        $db=new DB()
        $familias=$db->obtener_familias();
        break;
    }
    
    
    
    
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Logueado</title>
<link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>
<body>
    Hola, bienvenido <?php echo $_GET['usuario'] ?>
    <form action="sitio.php" method="post">
        <input type="submit" value ="Ver familias" name="submit">
</body>
</html>

