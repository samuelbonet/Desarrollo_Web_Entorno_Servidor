<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS</title>
</head>

<body>
    <form action="formOutput.php" method="POST">
        Nombre:
        <input type="text" name="nombre" id="nombre">
        <br>
        Password:
        <input type="password" name="password" id="password">
        <button type="submit">Enviar</button>

    </form>
</body>

</html>