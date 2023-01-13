<?php

class Conserje extends Persona
{
    private $telefono;

    public function __construct($nombre, $direccion, $telefono)
    {
        parent::__construct($nombre, $direccion);
        $this->telefono=$telefono;
    }
    public function __toString()
    {
        $msg= "El telefono del conserje es $this->telefono";
        return "Conserje: ".parent::__toString().$msg;
    }
    public function dar_aviso(Medico $medico, $descripcion){
        $medico->pasar_consulta($descripcion);

    }
}