<?php
// Requiere el controlador de usuario
require_once '../controlador/usuarioController.php';
// Crea una instancia del controlador de usuario
$controller = new usuarioController;
// Llama al método listarusuario para obtener la lista de usuarios
$usuarios = $controller->listarusuario();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Coste Total Desglosado</title>
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
        <h1>Coste Total Desglosado de Usuarios</h1>
        <!-- Tabla de usuarios con el coste total desglosado -->
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Plan</th>
                    <th>Pack</th>
                    <th>Coste Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre la lista de usuarios y muestra cada uno en una fila de la tabla -->
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= $usuario['correo'] ?></td>
                        <td><?= $usuario['plan_nombre'] ?></td>
                        <td><?= $usuario['pack_nombre'] ?></td>
                        <td>
                            <?php
                            // Calcular el coste total basado en la duración de la suscripción
                            $coste_total = 0;
                            if ($usuario['duracion'] == 'mensual') {
                                $coste_total += $usuario['plan_precio_mensual'];
                                $coste_total += $usuario['pack_precio_mensual'];
                            } else {
                                $coste_total += $usuario['plan_precio_anual'];
                                $coste_total += $usuario['pack_precio_anual'];
                            }
                            echo number_format($coste_total, 2) . ' €';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Enlace para volver a la lista de usuarios -->
        <a href="lista_usuarios.php" class="btn btn-primary mt-3">Volver a la lista de usuarios</a>
    </div>
</body>
</html>
