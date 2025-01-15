<?php
class producto{
    public $nombre;
    public $precio;

    public function mostrarDetalles(){
        echo"el nombre del producto es ",$this->nombre, " el precio del producto es ", $this->precio,"\n";
    }
}

class electrodomestico extends producto{
    public $consumo;
    
    public function mostrarDetalles(){
        echo"el nombre del electrodomestico es ",$this->nombre, " el precio del electrodomestico es ", $this->precio," tiene un consumo de ",$this->consumo,"\n";
    }
}

$producto= new producto;
$producto->nombre="martillo";
$producto->precio="15.00€";
$producto->mostrarDetalles();
$electrodomestico= new electrodomestico;
$electrodomestico->nombre="labadora";
$electrodomestico->precio="200.60€";
$electrodomestico->consumo="200W";
$electrodomestico->mostrarDetalles();