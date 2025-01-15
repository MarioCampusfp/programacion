<?php
class rectangulo{
    public $base;
    public $altura;

    public function calcularArea(){
        $area=$this->base*$this->altura;
        echo"el area del rectanculo es ", $area,"\n";
    }
}
$rectangulo= new rectangulo;
$rectangulo->base=10;
$rectangulo->altura=5;
$rectangulo->calcularArea();