<?php

//recogemos los datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$estudios = $_POST['estudios'];
$aficiones = $_POST['aficiones'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios1</title>
</head>

<body>
    <fieldset style="width: 50%; margin: 50px; background-color: beige;">
        <legend>Datos personales</legend>
        <form>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?= $nombre ?>" disabled>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" value="<?= $apellidos ?>" disabled>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $email ?>" disabled>
            <div id="sexo">
                <label for="sexo">Sexo:</label>
                <input type="radio" name="sexo" id="hombre" value="hombre" <?php if ($sexo == 'hombre') echo 'checked' ?> disabled>
                <label for="hombre">Hombre</label>
                <input type="radio" name="sexo" id="mujer" value="mujer" <?php if ($sexo == 'mujer') echo 'checked' ?> disabled>
                <label for="mujer">Mujer</label>
                <input type="radio" name="sexo" id="otro" value="otro" <?php if ($sexo == 'otro') echo 'checked' ?> disabled>
                <label for="otro">Otro</label>
            </div>
            <select name="estudios" id="estudios" disabled>Estudios:
                <option value="sin estudios" <?php if ($estudios == 'sin estudios') echo 'selected' ?>>Sin estudios</option>
                <option value="eso" <?php if ($estudios == 'eso') echo 'selected' ?>>ESO</option>
                <option value="bachillerato" <?php if ($estudios == 'bachillerato') echo 'selected' ?>>Bachillerato</option>
                <option value="gm" <?php if ($estudios == 'gm') echo 'selected' ?>>FP Grado Medio</option>
                <option value="gs" <?php if ($estudios == 'gs') echo 'selected' ?>>FP Grado Superior</option>
                <option value="universidad" <?php if ($estudios == 'universidad') echo 'selected' ?>>Universidad</option>

            </select>
            <!--mostramos las aficiones seleccionadas usando checkbox con la casilla marcada -->
            

        </form>
    </fieldset>

</body>

</html>