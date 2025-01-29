<?php
require_once '../modelo/class_usuario.php';

class usuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new usuario();
    }

    public function agregarusuario ($nombre, $correo, $edad, $plan, $pack, $duracion) {
        $this->usuario ->agregarusuario ($nombre, $correo, $edad, $plan, $pack, $duracion);
    }

    public function listarusuario () {
        return $this->usuario ->obtenerusuario ();
    }

    public function obtenerusuarioPorId($id_usuario ) {
        return $this->usuario ->obtenerusuarioPorId($id_usuario );
    }

    public function actualizarusuario ($id_usuario , $nombre, $correo, $edad, $plan, $pack, $duracion) {
        $this->usuario->actualizarusuario ($id_usuario , $nombre, $correo, $edad, $plan, $pack, $duracion);
    }

    public function eliminarusuario($id_usuario ) {
        $this->usuario->eliminarusuario($id_usuario );
    }
}
?>