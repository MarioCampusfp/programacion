<?php
require_once 'modelo/modelos.php';

class receta_controlador{
    private $receta;

    //contructo para iniciar en la clase receta
    public function __construct() {
        $this->receta= new receta();
    }

    //metodo para agregar una nueva receta
    public function agregar_receta($nombre, $ingredientes, $elaboreacion, $descripcion){
        $this->receta ->agregar_receta ($nombre, $ingredientes, $elaboreacion , $descripcion);
    }
}