<?php
$array = array(
    0 => 0,
    1 => "uno",
    2 => 2,
    3 => 3,
    4 => "cuatro",
    5 => [1, 2, 3, 4, 5],
);
var_dump($array);

// Adding values to the array
$array[14] = "Val en pos 15";
$array[29] = "Val en pos 30";

var_dump($array);
