<?php
require_once '../modelo/Modelo.php';

class Controlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Modelo();
    }

    // Métodos para Socios
    public function agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $this->modelo->agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    public function listarSocios() {
        return $this->modelo->obtenerSocios();
    }

    public function obtenerSocioPorId($id_socio) {
        return $this->modelo->obtenerSocioPorId($id_socio);
    }

    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $this->modelo->actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    public function eliminarSocio($id_socio) {
        $this->modelo->eliminarSocio($id_socio);
    }

    // Métodos para Eventos
    public function agregarEvento($nombre, $fecha, $lugar) {
        $this->modelo->agregarEvento($nombre, $fecha, $lugar);
    }

    public function listarEventos() {
        return $this->modelo->obtenerEventos();
    }

    public function obtenerEventoPorId($id_evento) {
        return $this->modelo->obtenerEventoPorId($id_evento);
    }

    public function actualizarEvento($id_evento, $nombre, $fecha, $lugar) {
        $this->modelo->actualizarEvento($id_evento, $nombre, $fecha, $lugar);
    }

    public function eliminarEvento($id_evento) {
        $this->modelo->eliminarEvento($id_evento);
    }
}

// Manejar solicitudes POST para eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador = new Controlador();
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] === 'eliminarSocio' && isset($_POST['id_socio'])) {
            $controlador->eliminarSocio($_POST['id_socio']);
        } elseif ($_POST['accion'] === 'eliminarEvento' && isset($_POST['id_evento'])) {
            $controlador->eliminarEvento($_POST['id_evento']);
        }
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
