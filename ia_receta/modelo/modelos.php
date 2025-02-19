<?php
require_once 'config/conexion.php';

class receta{

    private $conexion;

    //funcion para conectar a la base de datos
    public function __construct(){
        $this->conexion = new conexion();
    }

    //funcion para listar las recetas
    public function listar_recetas(){
        $query="SELECT * FROM recetas";
    }

    //funcion para agregar una receta
    public function agregar_receta($nombre, $ingredientes, $elaboracion, $descripcion){
        $query="INSERT INTO recetas (nombre, ingredientes, elaboracion, descripcion) VALUES (?,?,?,?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssss",$nombre,$ingredientes,$elaboracion,$descripcion);

        //comprobacion de que la receta se a creado corectamente
        if ($stmt->execute()){
            echo "receta añadida correcta mente";
        } else {
            echo "error al agregar la receta: ". $stmt->error;
        }

        $stmt->close();
    }

}