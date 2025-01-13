<?php
class circulo{
    public $radio;

    public function calculararea(){
        echo"el area del circulo es ", 3.14*$this->radio;
    }
}

$radiocirculo=new circulo;
$radiocirculo->radio=5;
$radiocirculo->calculararea();