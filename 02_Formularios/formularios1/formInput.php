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
        <form action="formOutput.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <div id="sexo">
                <label for="sexo">Sexo:</label>
                <input type="radio" name="sexo" id="hombre" value="hombre">
                <label for="hombre">Hombre</label>
                <input type="radio" name="sexo" id="mujer" value="mujer">
                <label for="mujer">Mujer</label>
                <input type="radio" name="sexo" id="otro" value="otro">
                <label for="otro">Otro</label>
            </div>
            <select name="estudios" id="estudios">Estudios:
                <option value="sin estudios">Sin estudios</option>
                <option value="eso">ESO</option>
                <option value="bachillerato">Bachillerato</option>
                <option value="gm">FP Grado Medio</option>
                <option value="gs">FP Grado Superior</option>
                <option value="universidad">Universidad</option>
            </select>
            <div class="checkbox">
                <label for="aficiones">Aficiones</label>
                <input type="checkbox" name="aficiones" id="deporte" value="deporte">
                <label for="deporte">Deporte</label>
                <input type="checkbox" name="aficiones" id="musica" value="musica">
                <label for="musica">Música</label>
                <input type="checkbox" name="aficiones" id="cine" value="cine">
                <label for="cine">Cine</label>
                <input type="checkbox" name="aficiones" id="libros" value="libros">
                <label for="libros">Libros</label>
            </div>

            <input type="submit" value="Enviar">

        </form>
    </fieldset>

</body>

</html>