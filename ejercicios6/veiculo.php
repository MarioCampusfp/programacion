<?php
class vehiculo{
    public $marca;

    public function encender(){
        echo "El coche está arrancando...\n";
    }
}

class coche extends vehiculo{
    public $modelo;
}

$coche=new coche;
$coche->marca="renault";
$coche->modelo="austral";
echo "el coche es del modelo ", $coche->marca," y es el modelo ",$coche->modelo,"\n";
$coche->encender();