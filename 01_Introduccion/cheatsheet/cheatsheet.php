<?php
$string = 'prueba'; // Asignación de una variable
$numero = 1; // Asignación de una variable
$booleano = true; // Asignación de una variable
$float = 1.5; // Asignación de una variable
$null = null; // Asignación de una variable
$array = array(1, 2, 3, 4, 5); // Asignación de una variable
$numero2 = rand(1, 100); // Asignación de una variable con un valor aleatorio

echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>'; // Ver todas las variables y cabeceras

var_dump($string); // muestra el tipo de dato y el valor de la variable
echo "<br>";

$v = [1, 12, 2, 3, 4, 5, 6]; // Asignación de un array
print_r($v); // muestra el contenido del array
echo "<br>";
echo "57" + 2; // muestra 59
echo "<br>";

echo "57" . 2; // muestra 572
echo "<br>";
print "El tipo de VARIABLE es " . gettype($string); // muestra el tipo de dato de la variable
echo "El tipo de VARIABLE es " . gettype($numero); // muestra el tipo de dato de la variable
echo "<br>";
echo "El tipo de VARIABLE es " . gettype($numero); // muestra el tipo de dato de la variable
echo "<br>";
echo "El tipo de VARIABLE es " . gettype($booleano); // muestra el tipo de dato de la variable
echo "<br>";
echo "El tipo de VARIABLE es " . gettype($float); // muestra el tipo de dato de la variable
echo "<br>";
echo "El tipo de VARIABLE es " . gettype($null); // muestra el tipo de dato de la variable
echo "<br>";
echo "El tipo de VARIABLE es " . gettype($array); // muestra el tipo de dato de la variable
echo "<br>";

//Declaración de constantes de dos formas
const  A = 1;
define("B", "Cadena");

//Visualización de valores
echo "valor de la constante A " . A . "<br />";
echo "valor de la constante B " . B . "<br />";
echo "tipo de la constante A " . gettype(A) . "<br />";
echo "tipo de la constante B " . gettype(B) . "<br />";
echo "<br>";
