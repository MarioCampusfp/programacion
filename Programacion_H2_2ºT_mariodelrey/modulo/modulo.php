<?php
require_once '../configuracicon/conexion.php';

// class para las interaciones de la tabla usuario
class usuario {
    private $conexion;

    // Funcion para inicializar la conexión a la base de datos
    public function __construct() {
        $this->conexion = new Conexion();
    }

    //funcion creacion de usuario
    public function agregar_usuario($nombre, $correo, $pass){
        $query =" INSERT INTO usuarios(nombre, correo, pass) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $nombre, $correo, $pass);

        //comprobacion de creacion de usuario exitosa
        if($stmt->execute()){
            echo "creacion del usuario completada";
        } else{
            echo "error al crear el usuario" . $stmt->error;
        }
    }

    //funcion para logearte con un usuario
    public function inicio_usuario($nombre, $correo, $pass){
        $query ="SELECT * from usuarios where nombre = 'nombre' and correo ='correo' and pass ='pass'";
        $stmt = $this->conexion->conexion->prepare($query);
    
        //comprobacion de que el logeo a sigo correcto
        if($stmt->execute()){
            echo"inicio de usuario correcto";
        }
    }
}

// class para las interaciones con la tabla tareas
class tarea {
    private $conexion;

    // Funcion para inicializar la conexión a la base de datos
    public function __construct() {
        $this->conexion = new Conexion();
    }

    //funcion para la creacion de tareas
    public function agregar_tarea($nombre, $descripcion, $estado, $usuario){
        $query="INSERT INTO tareas(nombre, descripcion, estado, id_usuario) VALUE (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $nombre, $descripcion, $estado, $usuario);
        
        //comprobacion de que la tarea se a creada correctamente
        if($stmt->execute()){
            echo"creacion de la tarea completada";
        } else{
            echo "error al crear la tarea" . $stmt->error;
        }
    }

    //funcion para listar tarea de un usuario

    //funcion para eliminar tarea

    //funcion para modificar tarea
}