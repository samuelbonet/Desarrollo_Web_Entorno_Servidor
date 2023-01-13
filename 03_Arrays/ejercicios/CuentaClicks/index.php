<?php
if (isset($_POST['submit'])) {

    $nombre = $_POST['name'];
    $arrayNombres = $_POST['arrayNombres'];
    $arrayNombres[$nombre]++;
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CuentaClick</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>

<body>

    <h1>Click de usuarios</h1>
    <form action="index.php" method="POST">
        <label for="name">Nombre</label>
        <input type="text" name="name">
        <br>
        <input type="submit" value="Click" name="submit">
        <?php
        foreach ($arrayNombres as $nombre => $clicks) {
            echo "<input type=hidden name='arrayNombres[$nombre]' value ='$clicks'>";
            echo "<h3>$nombre ha hecho $clicks clicks</h3>";
        }
        ?>

    </form>






</body>

</html>