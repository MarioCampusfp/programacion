<?php
class conversorMoneda{
    public function convertirDolaresenEuros($dolares){
        $euro=$dolares*0.92;
        echo $dolares, " dolares son ",$euro," euros\n";
    }
    public function convertirEurosenDolares($euros){
        $dolar=$euros/0.92;
        echo $euros," euros son ",$dolar,"dolares\n";
    }
}
$conversion= new conversorMoneda;
$conversion->convertirDolaresenEuros(40);
$conversion->convertirEurosenDolares(30);