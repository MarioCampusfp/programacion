<?php
// Se activan todos los reportes de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// Se incluye el controlador para gestionar la operación
require_once '../controlador/Controlador.php';

// Inicialización de variables de mensaje
$error   = '';
$success = '';
$debug   = '';

// Se comprueba si la solicitud es POST (envío del formulario)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se obtienen los datos del formulario
    $usuario    = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';
    $rol        = $_POST['rol'] ?? '';

    // Se crea una instancia del controlador
    $controlador = new Controlador();
    // Se registra el usuario y se captura el mensaje retornado
    $mensaje = $controlador->registrarUsuario($usuario, $contrasena, $rol);
    // Se guarda para depuración
    $debug = "Mensaje recibido: " . $mensaje;
    
    // Se analiza el mensaje para determinar éxito o error
    if (strpos($mensaje, 'éxito') !== false) {
        $success = $mensaje;
    } else {
        $error = "No se pudo crear el usuario: " . $mensaje;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Usuario</title>
    <!-- Se incluye Bootstrap para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5" style="max-width: 400px;">
        <h2 class="text-center mb-4">Alta de Usuario</h2>
        <!-- Se muestran mensajes de depuración, error o éxito -->
        <?php if ($debug): ?>
            <div class="alert alert-info" role="alert">
                <?= $debug; ?>
            </div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error; ?>
            </div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success" role="alert">
                <?= $success; ?>
            </div>
        <?php endif; ?>
        <!-- Formulario para crear un usuario -->
        <form method="post" action="alta_usuarios.php">
            <div class="form-group mb-3">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control" required placeholder="Nombre de usuario">
            </div>
            <div class="form-group mb-3">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control" required placeholder="Contraseña">
            </div>
            <div class="form-group mb-3">
                <label for="rol">Rol</label>
                <select name="rol" id="rol" class="form-control" required>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">Crear Usuario</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
