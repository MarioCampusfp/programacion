<?php 
// Se incluye la conexión a la base de datos con una ruta segura
require_once __DIR__ . '/../config/conexion.php';
 
class Modelo {
    // Propiedad que almacenará el objeto de conexión
    private $conexion;

    // Constructor: Inicializa la conexión a la base de datos
    public function __construct() {
        $this->conexion = new Conexion();
    }

    // ------------------------------
    // Métodos para Socios
    // ------------------------------

    // Agrega un nuevo socio
    public function agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $query = "INSERT INTO socios (nombre, apellido, email, telefono, fecha_nacimiento) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query); // Prepara la consulta
        $stmt->bind_param("sssss", $nombre, $apellido, $email, $telefono, $fecha_nacimiento); // Vincula parámetros
        if ($stmt->execute()) { // Ejecuta y verifica
            echo "Socio agregado con éxito.";
        } else {
            echo "Error al agregar socio: " . $stmt->error;
        }
        $stmt->close(); // Cierra la sentencia
    }

    // Obtiene todos los socios
    public function obtenerSocios() {
        $query = "SELECT * FROM socios";
        $resultado = $this->conexion->conexion->query($query);
        $socios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila; // Agrega cada registro al arreglo
        }
        return $socios;
    }

    // Obtiene un socio por su ID
    public function obtenerSocioPorId($id_socio) {
        $query = "SELECT * FROM socios WHERE id_socio = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_socio);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $socio = $resultado->fetch_assoc();
        $stmt->close();
        return $socio;
    }

    // Actualiza la información de un socio
    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $query = "UPDATE socios SET nombre = ?, apellido = ?, email = ?, telefono = ?, fecha_nacimiento = ? WHERE id_socio = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssssi", $nombre, $apellido, $email, $telefono, $fecha_nacimiento, $id_socio);
        if ($stmt->execute()) {
            echo "Socio actualizado con éxito.";
        } else {
            echo "Error al actualizar socio: " . $stmt->error;
        }
        $stmt->close();
    }

    // Elimina un socio
    public function eliminarSocio($id_socio) {
        $query = "DELETE FROM socios WHERE id_socio = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_socio);
        if ($stmt->execute()) {
            echo "Socio eliminado con éxito.";
        } else {
            echo "Error al eliminar socio: " . $stmt->error;
        }
        $stmt->close();
    }

    // ------------------------------
    // Métodos para Eventos
    // ------------------------------

    // Agrega un nuevo evento
    public function agregarEvento($nombre, $fecha, $lugar) {
        $query = "INSERT INTO eventos (nombre_evento, fecha, lugar) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $nombre, $fecha, $lugar);
        if ($stmt->execute()) {
            echo "Evento agregado con éxito.";
        } else {
            echo "Error al agregar evento: " . $stmt->error;
        }
        $stmt->close();
    }

    // Obtiene todos los eventos
    public function obtenerEventos() {
        $query = "SELECT * FROM eventos";
        $resultado = $this->conexion->conexion->query($query);
        $eventos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $eventos[] = $fila;
        }
        return $eventos;
    }

    // Obtiene un evento por su ID
    public function obtenerEventoPorId($id_evento) {
        $query = "SELECT * FROM eventos WHERE id_evento = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_evento);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $evento = $resultado->fetch_assoc();
        $stmt->close();
        return $evento;
    }

    // Actualiza un evento
    public function actualizarEvento($id_evento, $nombre, $fecha, $lugar) {
        $query = "UPDATE eventos SET nombre_evento = ?, fecha = ?, lugar = ? WHERE id_evento = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $nombre, $fecha, $lugar, $id_evento);
        if ($stmt->execute()) {
            echo "Evento actualizado con éxito.";
        } else {
            echo "Error al actualizar evento: " . $stmt->error;
        }
        $stmt->close();
    }

    // Elimina un evento
    public function eliminarEvento($id_evento) {
        $query = "DELETE FROM eventos WHERE id_evento = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_evento);
        if ($stmt->execute()) {
            echo "Evento eliminado con éxito.";
        } else {
            echo "Error al eliminar evento: " . $stmt->error;
        }
        $stmt->close();
    }

    // ------------------------------
    // Métodos para Usuarios
    // ------------------------------

    // Registra un nuevo usuario (usa la columna "contrasena")
    public function agregarUsuario($usuario, $contrasena, $rol) {
        $query = "INSERT INTO usuarios (usuario, contrasena, rol) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        if(!$stmt){
            return "Error en prepare(): " . $this->conexion->conexion->error;
        }
        $stmt->bind_param("sss", $usuario, $contrasena, $rol);
        if ($stmt->execute()) {
            $mensaje = "Usuario registrado con éxito.";
        } else {
            $mensaje = "Error al registrar usuario: " . $stmt->error;
        }
        $stmt->close();
        return $mensaje;
    }
    
    // Devuelve todos los usuarios
    public function obtenerUsuarios() {
        $query = "SELECT * FROM usuarios";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while($fila = $resultado->fetch_assoc()){
            $usuarios[] = $fila;
        }
        return $usuarios;
    }
    
    // Obtiene un usuario por su ID
    public function obtenerUsuarioPorId($id_usuario) {
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $user = $resultado->fetch_assoc();
        $stmt->close();
        return $user;
    }
    
    // Actualiza la información de un usuario
    public function actualizarUsuario($id_usuario, $usuario, $contrasena, $rol) {
        $query = "UPDATE usuarios SET usuario = ?, contrasena = ?, rol = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        if(!$stmt){
            return "Error en prepare(): " . $this->conexion->conexion->error;
        }
        $stmt->bind_param("sssi", $usuario, $contrasena, $rol, $id_usuario);
        if ($stmt->execute()) {
            $mensaje = "Usuario actualizado con éxito.";
        } else {
            $mensaje = "Error al actualizar usuario: " . $stmt->error;
        }
        $stmt->close();
        return $mensaje;
    }
    
    // ------------------------------
    // Método para Cerrar Sesión
    // ------------------------------

    // Método estático para cerrar la sesión y redirigir a index.php
    public static function cerrarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>
