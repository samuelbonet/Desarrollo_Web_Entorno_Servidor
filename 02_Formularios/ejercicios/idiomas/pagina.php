<?php
$IDIOMA = $_POST['idioma'] ?? 'Espanol';
switch ($IDIOMA) {
    case 'English':
        $label = "What's your name?";
        $select = "english";
        break;
    case 'Francais':
        $label = "Quel est ton nom ?";
        $select = "francais";
        break;
    case 'Espanol':
        $label = "¿Cual es tu nombre?";
        $select = "espanol";
        break;
    default:
        $label = "¿Cual es tu nombre?";
        break;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traducciones</title>
</head>

<body>
    <fieldset>
        <legend>Datos de acceso</legend>
        <form action="pagina.php" method="POST">
            <input type="radio" name="idioma" id="espanol" value="Espanol" <?php if ($select == "espanol") echo "checked"; ?>>
            <label for="espanol">Español</label>
            <input type="radio" name="idioma" id="english" value="English" <?php if ($select == "englishca") echo "checked"; ?>>
            <label for="english">English</label>
            <input type="radio" name="idioma" id="francais" value="Francais" <?php if ($select == "francais") echo "checked"; ?>>
            <label for="francais">Français</label>
            <button type="submit">Seleccionar</button>
        </form>
    </fieldset>
    <fieldset>
        <legend>Datos de acceso</legend>
        <form action="pagina.php" method="POST">
            <label for="name"><?php echo $label ?></label>
            <input type="text" name="name" id="name">
        </form>
    </fieldset>
</body>

</html>