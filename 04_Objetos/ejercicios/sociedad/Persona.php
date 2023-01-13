<?php
class Persona
{
    protected $nombre;
    protected $direccion;

    public function __construct($nombre, $direccion)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }
    public function fichar(){
        return "Hora de entrada ".date('H:i:s');
    }
    public function __toString(){
        return("$this->nombre, que vive en $this->direccion.");
    }
}
