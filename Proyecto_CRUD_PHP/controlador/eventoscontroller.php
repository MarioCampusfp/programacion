<?php
require_once '../modelo/class_eventos.php';

class EventoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new evento();
    }

    public function agregarevento($nombre, $fecha, $lugar) {
        $this->modelo->agregarevento($nombre, $fecha, $lugar);
    }

    public function listarEvento() {
        return $this->modelo->obtenerEvento();
    }

    public function obtenerEventoPorId($id_evento) {
        return $this->modelo->obtenerEventoPorId($id_evento);
    }

    public function actualizarEvento($id_evento,$nombre, $fecha, $lugar) {
        $this->modelo->actualizarEvento($id_evento,$nombre, $fecha, $lugar);
    }

    public function eliminarEvento($id_evento) {
        $this->modelo->eliminarEvento($id_evento);
    }
}
?>