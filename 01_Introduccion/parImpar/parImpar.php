<?php
$numero = rand(1, 100);
echo "El número aleatorio es: " . $numero;
echo "<br>";
if ($numero % 2 == 0) {
    echo "El número es par";
} else {
    echo "El número es impar";
}
