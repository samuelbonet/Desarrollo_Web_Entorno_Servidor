<?php
require 'fecha.php';

spl_autoload_register(function ($clase) {
    require "$clase.php";
});
$f1 = new Fecha();
$f2 = new Fecha(10);
$f3 = new Fecha(10, 10);
$f4 = new Fecha(10, 10, 2025);
$f5 = new Fecha(40, 10, 2025); // Si fecha incorrecta, fecha actual
$f5 = new Fecha("1/12/2022"); // Si fecha incorrecta, fecha actual

echo $f1;
echo '<br>';
echo $f2;
echo '<br>';
echo $f3;
echo '<br>';
echo $f4;
echo '<br>';
echo $f5;
