<?php

class OperacionRacional extends Operacion
{
    public function __construct(string $operacion)
    {
$this->operando1 = new Racional($this->operando1);
    $this->operando2 = new Racional($this->operando2);
    }
    public function operar()
    {
        switch ($this->operador)
        {
            case '+':
                return $this->operando1->sumar($this->operando2);
            case '-':
                return $this->operando1->restar($this->operando2);
            case '*':
                return $this->operando1->multiplicacion($this->operando2);
            case ':':
                return $this->operando1->division($this->operando2);
        }
    }
}