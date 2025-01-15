<?php
class animal{
    public $especie;

    public function emitirSonido(){
        if ($this->especie =="perro"){
            echo"guau-guau";
        }else{
            echo"no es una mascota con un sonido definido";
        }
    }
}
class perro extends animal{
    public $raza;
}

$perro= new perro;
$perro->especie="perro";
$perro->raza="mestizo";
$perro->emitirSonido();