<?php
class empleado{
    public $nombre;
    public $sueldo;

    public function mostrardetalles(){
        echo"el nombre del empleado ",$this->nombre, "y su sueldo es ",$this->sueldo,"\n";
    }
}

class gerente extends empleado{
    public $departamento;

    public function mostrardetalles(){
        echo"el nombre del empleado ",$this->nombre, ", su sueldo es ",$this->sueldo," y pertenece al departamento",$this->departamento,"\n";
    }
}

$empleado= new empleado;
$empleado->nombre="paco";
$empleado->sueldo="1650€";
$empleado->mostrardetalles();
$gerente= new gerente;
$gerente->nombre="jose";
$gerente->sueldo="3465€";
$gerente->departamento="financias";
$gerente->mostrardetalles();