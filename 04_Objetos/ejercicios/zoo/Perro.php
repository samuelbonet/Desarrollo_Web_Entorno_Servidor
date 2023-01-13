<?php

class Perro extends Animal
{
private $raza;

public function __construct($patas, $raza)
{
    parent::__construct($patas);
    $this->raza=$raza;
}
public function onomatopeya()
{
    return "Guau";
}
}