<?php

class Enfermero extends Persona
{
    private $year_titulo;
    public function __construct($nombre, $direccion, $year_titulo)
    {
        parent::__construct($nombre, $direccion);
        $this->year_titulo=$year_titulo;
    }
public function __toString()
{
    $msg= "Año de titulo: $this->year_titulo";
    return "Enfermero: ".parent::__toString().$msg;
}
}