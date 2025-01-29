<?php
require_once '../config/conexion.php';

class usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarusuario($nombre, $correo, $edad, $plan, $pack, $duracion) {
        $query = "INSERT INTO usuarios (nombre, correo, edad, id_plan, duracion) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssiss", $nombre, $correo, $edad, $plan, $duracion);

        if ($stmt->execute()) {
            echo "usuario agregado con éxito.";

            $id_usuario = $this->conexion->conexion->insert_id;

            $query2="INSERT INTO usuario_pack(id_usuario,id_pack) VALUES (?,?)";
            $stmt2 = $this->conexion->conexion->prepare($query2);
            $stmt2->bind_param("ii", $id_usuario, $pack);
            if ($stmt2->execute()) {
                echo "Usuario relacionado con el pack con éxito.";
            } else {
                echo "Error al relacionar usuario con el pack: " . $stmt2->error;
            }
    
            $stmt2->close();
        } else {
            echo "Error al agregar usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    public function obtenerusuario() {
        $query1 = "SELECT * FROM usuarios";
        //$query2= "SELECT id_plack FROM usuario_pack";
        $resultado1 = $this->conexion->conexion->query($query1);
        //$resultado2= $this->conexion->conexion->query($query2);
        $usuario = [];
        while ($fila = $resultado1->fetch_assoc()) {
            $usuario[] = $fila;
        }
        return $usuario;
    }

    public function obtenerusuarioPorId($id_usuario) {
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizarusuario($id_usuario,$nombre, $correo, $edad, $plan, $pack, $duracion) {
        $query = "UPDATE usuarios SET nombre = ?, correo = ?,edad = ?, plan = ?, duracion = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssssi", $nombre, $correo, $edad, $plan, $pack, $duracion, $id_usuario);

        if ($stmt->execute()) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar Usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    public function eliminarusuario($id_usuario) {
        $query = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar Usuario: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>