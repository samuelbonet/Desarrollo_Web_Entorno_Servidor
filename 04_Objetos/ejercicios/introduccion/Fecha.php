<?php
class Fecha
{
    //Atributos
    private $dia;
    private $mes;
    private $anio;

    //Metodos
    public function __construct(int|string $p1 = null, $p2 = null, $p3 = null)
    {

        // +--------------------+-------------------------+
        // | DATOS INTRODUCIDOS |        RESULTADO        |
        // +--------------------+-------------------------+
        // | ""                 | FECHA ACTUAL            |
        // | 1                  | 1/MES_ACTUAL/AÑO_ACTUAL |
        // | 1,1                | 1/1/AÑO_ACTUAL          |
        // | 1,1,1              | 1/1/1                   |
        // | 32,1,1             | FECHA_ACTUAL            |
        // | "1/2/23"           | 1/2/2023                |
        // +--------------------+-------------------------+

        switch (func_num_args()) {
            case 0:
                $this->dia = date("d");
                $this->mes = date("m");
                $this->anio = date("Y");
                break;
            case 1:
                if (is_string($p1)) {
                    $fecha = explode("/", $p1);
                    $this->dia = $fecha[0];
                    $this->mes = $fecha[1];
                    $this->anio = $fecha[2];
                } else {
                    $this->dia = $p1;
                    $this->mes = date("m");
                    $this->anio = date("Y");
                }
                break;
            case 2:
                $this->dia = $p1;
                $this->mes = $p2;
                $this->anio = date("Y");
                break;
            case 3:
                $this->dia = $p1;
                $this->mes = $p2;
                $this->anio = $p3;
                break;
            default:
                $this->dia = date("d");
                $this->mes = date("m");
                $this->anio = date("Y");
                break;
        }
        if ($this->dia > 31 || $this->dia < 1) {
            $this->dia = date("d");
        }
        if ($this->mes > 12 || $this->mes < 1) {
            $this->mes = date("m");
        }
        if ($this->anio < 1) {
            $this->anio = date("Y");
        }
        return $this->dia . "/" . $this->mes . "/" . $this->anio;
    }
    public function Fecha(int $d, int $m, int $y)
    {
        $this->dia = $d;
        $this->mes = $m;
        $this->anio = $y;
    }
    public function __toString(): string
    {
        return "$this->dia/$this->mes/$this->anio";
    }
}
