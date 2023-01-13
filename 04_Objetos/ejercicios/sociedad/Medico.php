<?php

class Medico extends Persona
{
    private $especialidad;
    private $consultas;
    public function __construct($nombre, $direccion, $especialidad)
    {
        parent::__construct($nombre, $direccion);
        $this->especialidad=$especialidad;
        $this->consultas =[];
    }
    public function __toString(){
        $msg= "La especialidad del medico es $this->especialidad";
        return "Medico: ".parent::__toString().$msg;
    }
    public function pasar_consulta($descripcion){
        $key = sizeof($this->consultas);
        $this->consultas[]['fecha']=time();
        $this->consultas[$key]['accion']=$descripcion;

    }
    public function visualizar_consultas(){
        $msg = "<h3>Consultas del medico $this->nombre de $this->especialidad</h3>";
        foreach ($this->consultas as $index=>$consulta){
            $hora = date("H:i:s", $consulta['fecha']);
            $msg.="<h4>Consulta $index. Hora $hora, descripcion {$consulta['accion']}</h4>";
        }
    }

}