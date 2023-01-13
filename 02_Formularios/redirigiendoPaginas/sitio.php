<?php
if (isset($_COOKIE['nombre'])) {
    $nombre = htmlspecialchars($_COOKIE['nombre']);
} else {
    header("Location: formInput.php?error=true?msg=Usuario no logueado");
    exit();
}
// $nombre = htmlspecialchars($_GET['nombre']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El sitio</title>
</head>

<body>
    <?php echo "Bienvenido a mi sitio $nombre"; ?>
</body>

</html>