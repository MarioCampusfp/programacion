<?php
require_once '../configuracion/conexion.php';

// Clase para gestionar operaciones sobre la tabla "usuarios"
class usuario {
    public $conexion;
    
    public function __construct() {
        $this->conexion = new Conexion();
    }

    // Función para crear un usuario: retorna true si se crea correctamente
    public function agregar_usuario($nombre, $correo, $pass) {
        $query = "INSERT INTO usuarios(nombre, correo, pass) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $nombre, $correo, $pass);
        return $stmt->execute();
    }

    // Nuevo método para verificar si un correo ya existe
    public function correo_existe($correo) {
        $query = "SELECT id_usuario FROM usuarios WHERE correo = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    // Función para obtener un usuario (para el login) utilizando el correo
    public function obtener_usuario($correo) {
        $query = "SELECT * FROM usuarios WHERE correo = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        return $stmt->get_result();
    }
}

// Clase para gestionar operaciones sobre la tabla "tareas"
class tarea {
    public $conexion;
    
    public function __construct() {
        $this->conexion = new Conexion();
    }

    // Función para crear una tarea: retorna true si se crea correctamente
    public function agregar_tarea($nombre, $descripcion, $estado, $usuario) {
        $query = "INSERT INTO tareas(nombre, descripcion, estado, id_usuario) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $nombre, $descripcion, $estado, $usuario);
        return $stmt->execute();
    }

    // Función para listar tareas pendientes de un usuario
    public function listar_tareas($usuario_id) {
        // Se añade restricción para que solo muestre tareas "pendiente"
        $query = "SELECT * FROM tareas WHERE id_usuario = ? AND estado = 'pendiente'";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Función para eliminar una tarea: retorna true si se elimina correctamente
    public function eliminar_tarea($tarea_id) {
        $query = "DELETE FROM tareas WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $tarea_id);
        return $stmt->execute();
    }

    // Función para modificar una tarea: retorna true si se modifica correctamente
    public function modificar_tarea($tarea_id, $nombre, $descripcion, $estado) {
        $query = "UPDATE tareas SET nombre = ?, descripcion = ?, estado = ? WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $nombre, $descripcion, $estado, $tarea_id);
        return $stmt->execute();
    }

    // Nueva función para marcar una tarea como completada
    public function completar_tarea($tarea_id) {
        // Actualiza la consulta para utilizar el campo correcto: id_tarea
        $query = "UPDATE tareas SET estado = 'completada' WHERE id_tarea = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $tarea_id);
        return $stmt->execute();
    }
}
?>