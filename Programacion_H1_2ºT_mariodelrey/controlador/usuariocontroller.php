<?php 
require_once '../modelo/class_usuario.php';

class usuarioController {
    private $usuario;

    // Constructor para inicializar la clase usuario
    public function __construct() {
        $this->usuario = new usuario();
    }

    // Método para agregar un nuevo usuario
    public function agregarusuario ($nombre, $correo, $edad, $plan, $pack, $duracion) {
        $this->usuario ->agregarusuario ($nombre, $correo, $edad, $plan, $pack, $duracion);
    }

    // Método para listar todos los usuarios
    public function listarusuario () {
        return $this->usuario ->obtenerusuario ();
    }

    // Método para obtener un usuario por su ID
    public function obtenerusuarioPorId($id_usuario ) {
        return $this->usuario ->obtenerusuarioPorId($id_usuario );
    }

    // Método para actualizar un usuario existente
    public function actualizarusuario ($id_usuario , $nombre, $correo, $edad, $plan, $pack, $duracion) {
        $this->usuario->actualizarusuario ($id_usuario , $nombre, $correo, $edad, $plan, $pack, $duracion);
    }

    // Método para eliminar un usuario
    public function eliminarusuario($id_usuario ) {
        $this->usuario->eliminarusuario($id_usuario);
        header("Location: ../vista/lista_usuarios.php");
        exit();
    }

    // Método para listar todos los planes
    public function listarPlanes() {
        return $this->usuario->obtenerPlanes();
    }

    // Método para listar todos los packs
    public function listarPacks() {
        return $this->usuario->obtenerPacks();
    }
}

// Manejar la solicitud de eliminación de usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
    $controller = new usuarioController();
    $controller->eliminarusuario($_POST['id']);
}
?>