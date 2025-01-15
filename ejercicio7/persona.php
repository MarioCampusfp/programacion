<?php
class persona{
    public $nombre;
    public $edad;
    public $genero;

    public function presentar(){
        echo"el nombre de la persona es ", $this->nombre," su edad es ", $this->edad, " y su genero es ", $this->genero,"\n";
    }
}

$persona= new persona;
$persona->nombre="dani";
$persona->edad=20;
$persona->genero="masculino";
$persona->presentar();