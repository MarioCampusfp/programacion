<?php
// Requiere el controlador de usuario
require_once '../controlador/usuarioController.php';
// Crea una instancia del controlador de usuario
$controller = new usuarioController();
// Llama al método listarusuario para obtener la lista de usuarios
$usuarios = $controller->listarusuario();

// Función para obtener la IP real del usuario
function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        return $_SERVER['REMOTE_ADDR'];
    } else {
        return 'UNKNOWN';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8">
    <title>Listado de Socios</title>
    <!-- Incluye el CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">StreamWeb</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="lista_usuarios.php">Lista de Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu_grosario_usuario.php">Menú Grosario Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alta_usuarios.php">Alta de Usuarios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Incluye el JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container mt-4">
        <h1>Usuarios Registrados</h1>
        <!-- Tabla de usuarios -->
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Edad</th>
                    <th>Plan</th>
                    <th>Pack</th>
                    <th>Duracion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre la lista de usuarios y muestra cada uno en una fila de la tabla -->
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id_usuario'] ?></td>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= $usuario['correo'] ?></td>
                        <td><?= $usuario['edad']?></td>
                        <td><?= $usuario['plan_nombre'] ?></td>
                        <td><?= $usuario['pack_nombre'] ?></td>
                        <td><?= $usuario['duracion'] ?></td>
                        <td>
                            <!-- Enlace para editar el usuario -->
                            <form action="actualizar_usuario.php" method="get" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">
                                <input type="hidden" name="ip" value="<?= getRealIpAddr() ?>">
                                <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                            </form>
                            <!-- Formulario para eliminar el usuario -->
                            <form action="../controlador/usuariocontroller.php" method="post" style="display:inline;">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Enlace para agregar un nuevo usuario -->
        <a href="alta_usuarios.php" class="btn btn-primary">Agregar un nuevo usuario</a>
        <!-- Enlace para el menú grosario usuario -->
        <a href="menu_grosario_usuario.php" class="btn btn-secondary">Menú Grosario Usuario</a>
    </div>
</body>
</html>
