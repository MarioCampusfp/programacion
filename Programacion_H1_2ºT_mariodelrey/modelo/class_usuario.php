<?php
require_once '../config/conexion.php';

class usuario {
    private $conexion;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct() {
        $this->conexion = new Conexion();
    }

    // Agrega un nuevo usuario a la base de datos
    public function agregarusuario($nombre, $correo, $edad, $plan, $pack, $duracion) {
        $query = "INSERT INTO usuarios (nombre, correo, edad, id_plan, duracion) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssiss", $nombre, $correo, $edad, $plan, $duracion);

        if ($stmt->execute()) {
            echo "Usuario agregado con éxito.";

            // Obtener el ID del usuario recién insertado
            $id_usuario = $this->conexion->conexion->insert_id;

            // Relacionar el usuario con el pack
            $query2 = "INSERT INTO usuario_pack(id_usuario, id_pack) VALUES (?, ?)";
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

    // Obtiene todos los usuarios de la base de datos
    public function obtenerusuario() {
        $query = "SELECT u.*, sp.nombre AS plan_nombre, sp.precio_mensual AS plan_precio_mensual, sp.precio_anual AS plan_precio_anual, 
                         spk.nombre AS pack_nombre, spk.precio_mensual AS pack_precio_mensual, spk.precio_anual AS pack_precio_anual 
                  FROM usuarios u 
                  LEFT JOIN stream_plan sp ON u.id_plan = sp.id_plan
                  LEFT JOIN usuario_pack up ON u.id_usuario = up.id_usuario
                  LEFT JOIN stream_pack spk ON up.id_pack = spk.id_pack";
        $resultado = $this->conexion->conexion->query($query);
        $usuario = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuario[] = $fila;
        }
        return $usuario;
    }

    // Obtiene un usuario específico por su ID
    public function obtenerusuarioPorId($id_usuario) {
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    // Actualiza la información de un usuario existente
    public function actualizarusuario($id_usuario, $nombre, $correo, $edad, $plan, $pack, $duracion) {
        $query = "UPDATE usuarios SET nombre = ?, correo = ?, edad = ?, id_plan = ?, duracion = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssssi", $nombre, $correo, $edad, $plan, $duracion, $id_usuario);

        try {
            if ($stmt->execute()) {
                echo "Usuario actualizado con éxito.";

                // Elimina los packs existentes
                $queryDelete = "DELETE FROM usuario_pack WHERE id_usuario = ?";
                $stmtDelete = $this->conexion->conexion->prepare($queryDelete);
                $stmtDelete->bind_param("i", $id_usuario);
                $stmtDelete->execute();
                $stmtDelete->close();

                // Inserta el nuevo pack
                $query2 = "INSERT INTO usuario_pack(id_usuario, id_pack) VALUES (?, ?)";
                $stmt2 = $this->conexion->conexion->prepare($query2);
                $stmt2->bind_param("ii", $id_usuario, $pack);
                if ($stmt2->execute()) {
                    echo "Usuario relacionado con el pack con éxito.";
                } else {
                    echo "Error al relacionar usuario con el pack: " . $stmt2->error;
                }
                $stmt2->close();
            } else {
                echo "Error al actualizar Usuario: " . $stmt->error;
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                echo "Error: El correo electrónico ya está en uso.";
            } else {
                throw $e;
            }
        }

        $stmt->close();
    }

    // Elimina un usuario de la base de datos
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

    // Obtiene todos los planes disponibles
    public function obtenerPlanes() {
        $query = "SELECT * FROM stream_plan";
        $resultado = $this->conexion->conexion->query($query);
        $planes = [];
        while ($fila = $resultado->fetch_assoc()) {
            $planes[] = $fila;
        }
        return $planes;
    }

    // Obtiene todos los packs disponibles
    public function obtenerPacks() {
        $query = "SELECT * FROM stream_pack";
        $resultado = $this->conexion->conexion->query($query);
        $packs = [];
        while ($fila = $resultado->fetch_assoc()) {
            $packs[] = $fila;
        }
        return $packs;
    }
}
?>