<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios2</title>
</head>

<body>
    <form action="formOutput.php" method="POST">
        <input type="text" name="nombre[]" id="a" value="a">
        <input type="text" name="nombre[]" id="b" value="b">
        <input type="text" name="nombre[]" id="c" value="c">
        <input type="text" name="nombre[]" id="d" value="d">
        <input type="text" name="nombre[]" id="e" value="e">
        <input type="text" name="nombre[]" id="f" value="f">
        <input type="text" name="nombre[]" id="g" value="g">
        <input type="text" name="nombre[]" id="h" value="h">
        <button type="submit">Enviar</button>

    </form>
</body>

</html>