<?php 
// Clase para gestionar la conexión a la base de datos
class Conexion { 
    // Datos de conexión
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $password = 'curso';
    private $base_datos = 'club_deportivo';
    // Propiedad pública para la conexión
    public $conexion;

    // Constructor: crea la conexión a la base de datos
    public function __construct() {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);
        // Si ocurre un error de conexión se detiene la ejecución
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // Método para cerrar la conexión
    public function cerrar() {
        $this->conexion->close();
    }
}
?>
