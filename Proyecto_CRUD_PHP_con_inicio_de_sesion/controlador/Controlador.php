<?php 
// Se incluye el modelo para usar sus métodos
require_once '../modelo/Modelo.php';

class Controlador {
    // Propiedad que contiene la instancia del Modelo
    private $modelo;

    // Constructor: crea una instancia de Modelo
    public function __construct() {
        $this->modelo = new Modelo();
    }

    // ------------------------------
    // Métodos para Socios
    // ------------------------------

    // Agrega un socio
    public function agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $this->modelo->agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    // Devuelve todos los socios
    public function listarSocios() {
        return $this->modelo->obtenerSocios();
    }

    // Obtiene un socio por su ID
    public function obtenerSocioPorId($id_socio) {
        return $this->modelo->obtenerSocioPorId($id_socio);
    }

    // Actualiza un socio
    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $this->modelo->actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    // Elimina un socio
    public function eliminarSocio($id_socio) {
        $this->modelo->eliminarSocio($id_socio);
    }

    // ------------------------------
    // Métodos para Eventos
    // ------------------------------

    // Agrega un evento
    public function agregarEvento($nombre, $fecha, $lugar) {
        $this->modelo->agregarEvento($nombre, $fecha, $lugar);
    }

    // Devuelve todos los eventos
    public function listarEventos() {
        return $this->modelo->obtenerEventos();
    }

    // Obtiene un evento por su ID
    public function obtenerEventoPorId($id_evento) {
        return $this->modelo->obtenerEventoPorId($id_evento);
    }

    // Actualiza un evento
    public function actualizarEvento($id_evento, $nombre, $fecha, $lugar) {
        $this->modelo->actualizarEvento($id_evento, $nombre, $fecha, $lugar);
    }

    // Elimina un evento
    public function eliminarEvento($id_evento) {
        $this->modelo->eliminarEvento($id_evento);
    }

    // ------------------------------
    // Métodos para Usuarios
    // ------------------------------

    // Registra un nuevo usuario y retorna el mensaje resultante
    public function registrarUsuario($usuario, $contrasena, $rol) {
        return $this->modelo->agregarUsuario($usuario, $contrasena, $rol);
    }

    // Devuelve todos los usuarios
    public function listarUsuarios() {
        return $this->modelo->obtenerUsuarios();
    }

    // Obtiene un usuario por su ID
    public function obtenerUsuarioPorId($id_usuario) {
        return $this->modelo->obtenerUsuarioPorId($id_usuario);
    }

    // Actualiza un usuario y retorna el mensaje resultante
    public function actualizarUsuario($id_usuario, $usuario, $contrasena, $rol) {
        return $this->modelo->actualizarUsuario($id_usuario, $usuario, $contrasena, $rol);
    }
}

// ------------------------------
// Manejo de solicitudes POST para eliminación
// ------------------------------

// Se comprueba si la solicitud es POST para eliminar socios o eventos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador = new Controlador();
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] === 'eliminarSocio' && isset($_POST['id_socio'])) {
            $controlador->eliminarSocio($_POST['id_socio']);
        } elseif ($_POST['accion'] === 'eliminarEvento' && isset($_POST['id_evento'])) {
            $controlador->eliminarEvento($_POST['id_evento']);
        }
    }
    // Redirige a la página anterior
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
