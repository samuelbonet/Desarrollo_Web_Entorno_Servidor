<?php
class Racional
{
    //atributos
    private $numerador;
    private $denominador;
    //constructor
    /*
     * Racional () => 1/1
     * Racional (6) => 6/1
     * Racional (6,7) => 6/7
     * Racional ("5,8") => 5/8
     */
    public function __construct(int|string $num = null, int|string $den = null)
    {
        if (is_string($num)) {
            //Rompe la cadena de caracteres en un array
            $numero = explode("/", $num);
            //Asigna el valor del array a los atributos
            $num = $numero[0];
            $den = $numero[1];
        }
        //Llama a la variabel privada y le asigna el valor del numero
        $this->numerador = $num;
        $this->denominador = $den;
    }
    //metodos hecho por el copilot
    public function sumar(Racional $r1)
    {
        $den = $this->denominador * $r1->denominador;
        $num = $this->numerador * $r1->denominador + $r1->numerador * $this->denominador;
        return new Racional($num, $den);
    }
    public function restar(Racional $r1)
    {
        $den = $this->denominador * $r1->denominador;
        $num = $this->numerador * $r1->denominador - $r1->numerador * $this->denominador;
        return new Racional($num, $den);
    }
    public function multiplicacion(Racional $r1)
    {
        $den = $this->denominador * $r1->denominador;
        $num = $this->numerador * $r1->numerador;
        return new Racional($num, $den);
    }
    public function division(Racional $r1)
    {
        $den = $this->denominador * $r1->numerador;
        $num = $this->numerador * $r1->denominador;
        return new Racional($num, $den);
    }
    public function __toString()
    {
        return "$this->numerador/$this->denominador";
    }
    public function simplificada(): Racional
    {
        $mcd = $this->mcd($this->numerador, $this->denominador);
        $num = $this->numerador / $mcd;
        $den = $this->denominador / $mcd;
        return new Racional($num, $den);
    }
    private function mcd(int $a, int $b): int
    {
        if ($b == 0) {
            return $a;
        } else {
            return $this->mcd($b, $a % $b);
        }
    }

    static public function sumar_estatico(Racional $r1, Racional $r2): Racional
    {
        $num = $r1->numerador * $r2->denominador + $r2->numerador * $r1->denominador;
        $den = $r1->denominador * $r2->denominador;
        return new Racional($num, $den);
    }
}
