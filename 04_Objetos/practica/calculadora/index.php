<?php
spl_autoload_register(fn($clase) => require "$clase.php");
$operacion = $_POST['operacion'];
//Tipo de operacion
$tipo = Operacion::tipo_operacion($operacion);
switch ($tipo) {
    case Operacion::REAL :
        $resultado = "Operación Real";
        $op = new OperacionReal($operacion);
        break;
    case Operacion::RACIONAL :
        $resultado = "Operación racional";
        $op = new OperacionRacional($operacion);
        break;
    case Operacion::ERROR :
        $resultado = "Operación no valida";
        break;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora</title>
    <link rel='stylesheet' href='https://unpkg.com/@picocss/pico@latest/css/pico.min.css'>
</head>
<body>
<h1>Calculadora</h1>
<h2>Reglas:</h2>
<ul>
    <li>La calculadora se utiliza escribiendo la operacion.</li>
    <li>La operación sera Operando1 Operacion Operando2</li>
    <li>Cada operando puede ser real o racional</li>
    <li>Real ej: 5 o 5.12.</li>
    <li>Racional ej: 6/3 o 7/1</li>
    <li>Operadores permitidos son +-*/</li>
    <li>Operadores racionales permitidos son +-*:</li>
    <li>Si un operando es real y el otro racional, se considerará operacion racional:</li>
    <ul>
        <li>Ej: 5.1 + 4</li>
        <li>Ej: 5/1:2</li>
        <li>Error: 5.2+5/1</li>
        <li>Error: 52214</li>

    </ul>
</ul>

Establece la operacion:
<form action="index.php" method="post">
    <label for="operacion">Operacion</label>
    <input type="text" name="operacion" id="operacion">
    <button type="submit">Calcular</button>
</form>
<div class="resultado">
    <?= $op ?>
    <br>
    <?= $resultado ?>
</div>
</body>
</html>
