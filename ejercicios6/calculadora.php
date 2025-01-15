<?php
class calculadora{
    public function suma($x,$y){
        $suma=$x+$y;
        echo"la numa entre el numero ", $x, " y el mumero ", $y, " es ",$suma,"\n";
    }
    public function resta($x,$y){
        $resta=$x-$y;
        echo"la resta entre el numero ", $x, " y el numero ",$y," es ",$resta,"\n";
    }
    public function multiplicacion($x,$y){
        $multiplicacion=$x*$y;
        echo"la multiplicacion entre el numero ",$x," y el numero ",$y," es ",$multiplicacion,"\n";
    }
    public function division($x,$y){
        if($x==0){
            echo"no se puede dividir por cero\n";
        }elseif($y==0){
            echo"no se puede dividir por cero\n";
        }else{
            $division=$x/$y;
            echo"la division entre ",$x," y ",$y," es ",$division,"\n";
        }
    }
}
$calguladora= new calculadora;
$calguladora->suma(46,76);
$calguladora->resta(85,37);
$calguladora->multiplicacion(33,9);
$calguladora->division(0,5);
$calguladora->division(563,8);