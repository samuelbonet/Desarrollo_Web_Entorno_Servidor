<?php
$intentos; // Numero de intentos que lleva la aplicación
$numero; // Numero que ha pensado la aplicación
$max; // Numero maximo del intervalo
$min; // Numero minimo del intervalo
$respuesta; // Respuesta del usuario
$dificultad; // Dificultad seleccionada por el usuario


// Si no se ha seleccionado dificultad, se muestra el formulario
if (!isset($_POST['dificultad'])) {
    include 'index.php';
    exit;
} else {
    $dificultad = $_POST['dificultad'];
}
if (isset($dificultad)) {
    if (!isset($_POST['lastNum'])) {
        switch (true) {
            case $dificultad == "facil":
                $max = 1024;
                $min = 1;
                $intentos = 10;
                break;
            case $dificultad == "media":
                $max = 65536;
                $min = 1;
                $intentos = 16;
                break;
            case $dificultad == "dificil":
                $max = 1048576;
                $min = 1;
                $intentos = 20;
                break;
        }
    } else {
        $intentos = $_POST['intentos'];
        $dificultad = $_POST['dificultad'];
        $respuestaAnterior = $_POST['respuesta'];
        $min = $_POST['min'];
        $max = $_POST['max'];
        $lastNum = $_POST['lastNum'];
        switch (true) {
            case $respuestaAnterior == "mayor":
                $min = $lastNum;
                break;
            case $respuestaAnterior == "menor":
                $max = $lastNum;
                break;
            case $respuestaAnterior == "acertado":
                include 'fin.php';
                exit;
                break;
        }
    }
    $numero = round(($min + $max) / 2, 0);
    $intentos--;
}
echo $numero;
echo "<br>";
echo $dificultad;
echo "<br>";
echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';
?>
<form action="jugar.php" method="post">
    <input type="radio" name="respuesta" id="mayor" value="mayor">
    <label for="mayor">El numero que has pensado es mayor</label>
    <br>
    <input type="radio" name="respuesta" id="menor" value="menor">
    <label for="menor">El numero que has pensado es menor</label>
    <br>
    <input type="radio" name="respuesta" id="acertado" value="acertado">
    <label for="acertado">La aplicación ha acertado</label>
    <br>
    <input type="hidden" name="dificultad" value="<?php echo $dificultad ?>">
    <input type="hidden" name="intentos" value="<?php echo $intentos ?>">
    <input type="hidden" name="min" value="<?php echo $min ?>">
    <input type="hidden" name="max" value="<?php echo $max ?>">
    <input type="hidden" name="lastNum" value="<?php echo $numero ?>">
    <button type="submit">Enviar</button>
</form>