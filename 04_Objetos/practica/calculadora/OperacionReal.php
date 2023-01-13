<?php

class OperacionReal extends Operacion
{
public function __construct(string $operacion)
{
    parent::__construct($operacion);
}
public function operar()
{
    switch ($this->operador)
    {
        case '+':
            return $this->operando1 + $this->operando2;
        case '-':
            return $this->operando1 - $this->operando2;
        case '*':
            return $this->operando1 * $this->operando2;
        case ':':
            return $this->operando1 / $this->operando2;
    }
}
}