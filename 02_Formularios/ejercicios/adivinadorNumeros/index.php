<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Adivinador de Numeros</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>

</head>

<body>
    <h1>Juego Adivina Numero</h1>
    <p> Selecciona la dificultad </p>
    <form action="jugar.php" method="POST">

        <input type="radio" name="dificultad" id="facil" value="facil">
        <label for="dificultad">
            Dificultad Facil, números entre el 1 y el 1024. 10 intentos.
        </label>
        <br>
        <input type="radio" name="dificultad" id="facil" value="media">
        <label for="dificultad">
            Dificultad Media, números entre el 1 y el 65536. 16 intentos.
        </label>
        <br>
        <input type="radio" name="dificultad" id="facil" value="dificil">
        <label for="dificultad">
            Dificultad Dificil, números entre el 1 y el 1048576. 20 intentos.
        </label>
        <br>
        <input type="submit" name="nuevaPartida" value="Enviar">
        
    </form>
    <p>Piensa en un numero del intervalo seleccionado</p>
    <p>La aplicación lo va a acertar en el numero de intentos establecido</p>
    <p>Cuando la aplicación te pregunte le debes indicar si:</p>
    <ul>
        <li>El numero que has pensado es mayor</li>
        <li>El numero que has pensado es menorº</li>
        <li>La aplicación ha acertado</li>
    </ul>
</body>

</html>