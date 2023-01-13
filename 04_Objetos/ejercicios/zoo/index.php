<?php
spl_autoload_register(fn($clase)=>require "$clase.php");
$p1 = new Perro(4,"Bueno");
$g1 = new Gato(3);

echo "<h1>El perro dice ".$p1->onomatopeya()."</h1>";
echo "<h1>El gato dice ".$g1->onomatopeya()."</h1>";

