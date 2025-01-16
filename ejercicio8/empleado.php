<?php
class empleado{
    public $nombre;
    public $sueldo;
    public $aniosExperiencia;

    public function calcularBonus(){
        $porcentaje=$this->aniosExperiencia/2*5;
        $bonus=$this->sueldo%$porcentaje;
        echo"el trabajador tiene un bonus de ",$bonus,"\n";
    }
    public function mostrasDetalles(){
        echo"el nombre del empleado es ",$this->nombre," tiene un sueldo base de ",$this->sueldo," y lleba en nuestra emplresa",$this->aniosExperiencia,"años\n";
    }
}

class consultor extends empleado{
    public $horasPorProyecto;

    public function calcularBonus(){
        $porcentaje1=$this->aniosExperiencia/2*5;
        $bonus1=$this->sueldo%$porcentaje1;
        $porcentaje2=$this->horasPorProyecto/100*5;
        $bonus2=$this->sueldo%$porcentaje2;
        echo"el trabajador tiene un primer bonus de ",$bonus1," y un segundo bonus de ",$bonus2,"\n";  
    }
}

$empleado=new empleado;
$empleado->nombre="martin";
$empleado->sueldo=2150;
$empleado->aniosExperiencia=4;
$empleado->calcularBonus();
$empleado->mostrasDetalles();
$consultor=new consultor;
$consultor->nombre="mario";
$consultor->sueldo=4368;
$consultor->aniosExperiencia=8;
$consultor->horasPorProyecto=300;
$consultor->calcularBonus();
$consultor->mostrasDetalles();