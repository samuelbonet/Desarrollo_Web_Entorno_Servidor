<?php
$entero = 5;
$decimal = 5.5;
$binario = 0b1100101;
$octal = 0733353;
$hexadecimal = 0xFAfF4;
$notacion_cientifica = 54e34;
$notacion_cientifica_negativa = 43e-10;
echo "<hr>";
echo ("Convertir a binario: " . decbin($entero) . "<br>");
echo ("Convertir a octal: " . decoct($entero) . "<br>");
echo ("Convertir a hexadecimal: " . dechex($entero) . "<br>");
echo ("Convertir a notación científica: " . exp($entero) . "<br>");
echo ("<hr>");
echo ("Convertir a entero de binario: " . bindec($binario) . "<br>");
echo ("Convertir a entero de octal: " . octdec($octal) . "<br>");
echo ("Convertir a entero de hexadecimal: " . hexdec($hexadecimal) . "<br>");
echo ("Convertir a entero de notación científica: " . intval($notacion_cientifica) . "<br>");
?>
