<?php
$mi_array = [];
$mi_array = array();
$mi_array[] = 'Hola';
$mi_array[] = 'Mundo';
$mi_array[] = '!';
$mi_array[0] = 'Hola';
$mi_array[1] = 'Mundo';
$mi_array[2] = '!';
$mi_array[] = 50;
$capitales = [
    'España' => 'Madrid',
    'Francia' => 'París',
    'Italia' => 'Roma',
];
$capitales += [
    'Portugal' => 'Lisboa',
    'Rumanía' => 'Bucarest',
    'Alemania' => 'Berlín',
];

for ($i = 0; $i < 11; $i++) {
    $notas[] = rand(0, 10);
}
for ($i = 0; $i < 11; $i++) {
    echo "La nota es $notas[$i]<br>";
}
$suma = 0;
foreach ($notas as $nota) {
    $suma += $nota;
}
echo "La media es " . $suma / count($notas) . "<br>";

echo min($notas) . "<br>";
echo max($notas) . "<br>";
echo max($notas) . "<br>";
