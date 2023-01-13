<?php

abstract class Operacion
{
    const REAL = 1;
    const RACIONAL = 2;
    const ERROR = 0;
    protected $operando1;
    protected $operando2;


    public static function tipo_operacion($operacion = null): int
    {
        $numEntero = "[1-9][0-9]*";
        $numReal = "[0-9](\.[0-9]+)?";
        $numRacional = "$numEntero\/$numEntero";
        $opReal = "[\+|\-|\/|\*]";
        $opRacional = "[\+|\-|:|\*]";

        $operacionReal = "#^$numReal$opReal$numReal$#";
        $operacionRacional1 = "#^$numEntero$opRacional$numRacional$#";
        $operacionRacional2 = "#^$numRacional$opRacional$numEntero$#";
        $operacionRacional3 = "#^$numRacional$opRacional$numRacional$#";


        if (preg_match($operacionReal, $operacion)) {
            return self::REAL;
        }
        if (preg_match($operacionRacional1, $operacion)) {
            return self::RACIONAL;
        }
        if (preg_match($operacionRacional2, $operacion)) {
            return self::RACIONAL;
        }
        if (preg_match($operacionRacional3, $operacion)) {
            return self::RACIONAL;
        }
        return self::ERROR;
    }
    public function __construct(String $operacion)
    {
        /* It's getting the operator from the string. */
        $this->operador = $this->obtener_operador($operacion);
        /* It's getting the operands from the string. */
        $posicion_operador = strpos($operacion, $this->operador);
        $this->operando1 = substr($operacion, 0, $posicion_operador);
        $this->operando2 = substr($operacion, $posicion_operador + 1);
    }

    public function operar()
    {
    }

    private function obtener_operador(string $operacion): ?string
    {
        /* It's an array of operators. */
        $operadores = ['+', '-', '*', ':'];
        /* It's an array of operators. */
        foreach ($operadores as $operador) {
            /* It's checking if the operator is in the string. */
            if (strpos($operacion, $operador) !== false) {
                /* It's returning the operator. */
                return $operador;
            }
            return null;
        }
    }
    public function __toString(): string
    {
        /* It's returning the string. */
        $salida = "<hr />";
        $salida .= "Operando 1 = $this->operando1 <br />";
        $salida .= "Operador = $this->operador <br />";
        $salida .= "Operando 2 = $this->operando2 <br />";
        return $salida;
    }
}

//TODO:
// - Arreglar REAL