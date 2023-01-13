<?php
function carga($clase){
    require "$clase.php";
}
spl_autoload_register('carga');

echo '<br>';
$medico1 = new Medico("Maria","Casa de Maria", "Cirujano");
echo '<br>';
$conserje1 = new Conserje("Pepe","Casa de Pepe", 633333333);
echo '<br>';
$enfermero1 = new Enfermero("Paco", "Casa de Paco", 2022);
echo '<br>';
echo $medico1;
echo '<br>';
echo $medico1->fichar();
echo '<br>';
sleep(1);
echo $conserje1;
echo '<br>';
echo $conserje1->fichar();
echo '<br>';
sleep(1);
echo $enfermero1;
echo '<br>';
echo  $enfermero1->fichar();
echo '<br>';

$medico1->pasar_consulta("Paciente con fiebre y catarro");
 $medico1->pasar_consulta("Paciente con COVID");
 $medico1->pasar_consulta("Paciente solicitando baja");
//$conserje1->dar_aviso($medico1, "urgente atender una visita")
 echo '<h1>Listado de consultas del medico '. $medico1;
 echo $medico1->visualizar_consultas();


