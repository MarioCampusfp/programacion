<?php
ob_start(); // Activa el almacenamiento en búfer de salida
require_once '../modulo/modulo.php';

// Función auxiliar para asegurar que la sesión esté activa.
function ensureSession() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_set_cookie_params(0, '/');
        session_start();
    }
}

class UsuarioControlador {
    private $usuario;

    public function __construct() {
        $this->usuario = new usuario();
    }

    // Función registrar: Registra un nuevo usuario y crea la sesión
    public function registrar() {
        ensureSession();
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];

        // Verificar si el correo ya está registrado
        if ($this->usuario->correo_existe($correo)) {
            header("Location: ../vista/register.php?error=correo_existe");
            exit();
        }
        
        $passHashed = password_hash($pass, PASSWORD_BCRYPT);
        
        if ($this->usuario->agregar_usuario($nombre, $correo, $passHashed)) {
            // Almacena el ID del nuevo usuario en la sesión
            $_SESSION['usuario'] = $this->usuario->conexion->conexion->insert_id;
            header("Location: ../vista/tareas.php");
            exit();
        } else {
            header("Location: ../vista/register.php?error=registrar");
            exit();
        }
    }

    // Función iniciar_sesion: Valida las credenciales del usuario e inicia la sesión
    public function iniciar_sesion() {
        ensureSession();
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];

        $result = $this->usuario->obtener_usuario($correo);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($pass, $user['pass'])) {
                // Regenera el ID de sesión por seguridad y establece la sesión con el ID del usuario
                session_regenerate_id(true);
                $_SESSION['usuario'] = $user['id_usuario'];
                header("Location: ../vista/tareas.php");
                exit();
            } else {
                header("Location: ../vista/login.php?error=contraseña");
                exit();
            }
        } else {
            header("Location: ../vista/login.php?error=usuario");
            exit();
        }
    }

    // Función cerrar_sesion: Finaliza la sesión activa y redirige al inicio
    public function cerrar_sesion() {
        ensureSession();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}

class TareaControlador {
    private $tarea;

    public function __construct() {
        $this->tarea = new tarea();
    }

    // Función agregar_tarea: Agrega una nueva tarea para el usuario autenticado
    public function agregar_tarea() {
        $this->requireLogin();
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $estado = 'pendiente';
        $usuario_id = $_SESSION['usuario'];
        if ($this->tarea->agregar_tarea($nombre, $descripcion, $estado, $usuario_id)) {
            header("Location: ../vista/tareas.php");
            exit();
        } else {
            header("Location: ../vista/tareas.php?error=agregar_tarea");
            exit();
        }
    }

    // Función listar_tareas: Retorna las tareas pendientes del usuario autenticado
    public function listar_tareas() {
        $this->requireLogin();
        $usuario_id = $_SESSION['usuario'];
        return $this->tarea->listar_tareas($usuario_id);
    }

    // Función eliminar_tarea: Elimina una tarea específica
    public function eliminar_tarea() {
        if ($this->tarea->eliminar_tarea($_POST['tarea_id'])) {
            header("Location: ../vista/tareas.php");
            exit();
        } else {
            header("Location: ../vista/tareas.php?error=eliminar_tarea");
            exit();
        }
    }

    // Función modificar_tarea: Modifica los datos de una tarea existente
    public function modificar_tarea() {
        if ($this->tarea->modificar_tarea($_POST['tarea_id'], $_POST['nombre'], $_POST['descripcion'], $_POST['estado'])) {
            header("Location: ../vista/tareas.php");
            exit();
        } else {
            header("Location: ../vista/tareas.php?error=modificar_tarea");
            exit();
        }
    }

    // Función completar_tarea: Marca una tarea como completada
    public function completar_tarea() {
        $this->requireLogin();
        $tarea_id = $_POST['tarea_id'];
        if ($this->tarea->completar_tarea($tarea_id)) {
            header("Location: ../vista/tareas.php");
            exit();
        } else {
            header("Location: ../vista/tareas.php?error=completar_tarea");
            exit();
        }
    }

    // Función requireLogin: Garantiza que el usuario esté autenticado antes de continuar
    private function requireLogin() {
        ensureSession();
        if (!isset($_SESSION['usuario'])) {
            header("Location: ../index.php");
            exit();
        }
    }
}

// Enrutador: Gestiona las solicitudes en función del parámetro "action"
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if (in_array($action, ['registrar', 'iniciar_sesion', 'cerrar_sesion'])) {
        $controller = new UsuarioControlador();
        switch ($action) {
            case 'registrar':      $controller->registrar();       break;
            case 'iniciar_sesion': $controller->iniciar_sesion();   break;
            case 'cerrar_sesion':  $controller->cerrar_sesion();    break;
        }
    } elseif (in_array($action, ['agregar_tarea', 'listar_tareas', 'eliminar_tarea', 'modificar_tarea', 'completar_tarea'])) {
        $controller = new TareaControlador();
        switch ($action) {
            case 'agregar_tarea':   $controller->agregar_tarea();   break;
            case 'listar_tareas':   $controller->listar_tareas();   break;
            case 'eliminar_tarea':  $controller->eliminar_tarea();  break;
            case 'modificar_tarea': $controller->modificar_tarea(); break;
            case 'completar_tarea': $controller->completar_tarea(); break;
        }
    }
}
?>
