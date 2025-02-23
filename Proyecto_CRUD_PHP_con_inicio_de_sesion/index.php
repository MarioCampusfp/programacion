<?php
session_start();
// Se incluye la configuración de conexión a la base de datos
require_once 'config/conexion.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se recogen los datos del formulario de login
    $usuarioInput = $_POST['usuario'] ?? '';
    $password     = $_POST['password'] ?? '';

    $conexionObj = new Conexion();
    $conn = $conexionObj->conexion;

    // Se prepara la consulta para buscar al usuario
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuarioInput);
    $stmt->execute();
    $result = $stmt->get_result();
    // Si se encuentra exactamente un usuario
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Se verifica la contraseña o el rol (según la lógica deseada)
        if ($user['rol'] === 'admin' || $password === $user['contrasena']) {
            // Se guarda el usuario en sesión y se redirige
            $_SESSION['usuario'] = $user;
            header("Location: vista/lista_eventos.php");
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <!-- Inclusión de Bootstrap para el formulario -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5" style="max-width: 400px;">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>
        <!-- Se muestra un mensaje de error si existe -->
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error; ?>
            </div>
        <?php endif; ?>
        <!-- Formulario de login -->
        <form method="post" action="index.php">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control" required placeholder="Tu nombre de usuario">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="accion" value="login">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
