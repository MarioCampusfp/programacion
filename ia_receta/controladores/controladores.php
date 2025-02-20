<?php 
require_once __DIR__ . '/../modelo/modelos.php';

class receta_controlador{
    private $receta;

    //contructo para iniciar en la clase receta
    public function __construct() {
        $this->receta= new receta();
    }

    //metodo para listar una receta
    public function listar_recetas(){
        return $this->receta->listar_recetas();
    }

    //metodo para agregar una nueva receta
    public function agregar_receta($nombre, $ingredientes, $elaboreacion, $descripcion){
        $this->receta ->agregar_receta ($nombre, $ingredientes, $elaboreacion , $descripcion);
    }

    //metodo para eliminar una receta
    public function eliminar_receta($id_receta){
        $this->receta->eliminar_receta($id_receta);
    }

    //metodo para modificar una receta
    public function modificar_receta($id_receta, $nombre, $ingredientes, $elaboracion, $descripcion){
        $this->receta->modificar_receta($id_receta, $nombre, $ingredientes, $elaboracion, $descripcion);
    }
}

class ia_controladores{
    private $ia;

    public function __construct(){
        $this->ia = new ia();
    }
    
    // Método para enviar un prompt a la IA y retornar la respuesta
    public function enviar_peticion($prompt, $model = "llama-3.2-1b-instruct", $temperature = 0.7, $max_tokens = -1, $stream = false){
        return $this->ia->enviar_peticion($prompt, $model, $temperature, $max_tokens, $stream);
    }
}