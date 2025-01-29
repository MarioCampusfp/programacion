<?php
require_once '../controlador/usuarioController.php';
$controller = new usuarioController();
$usuarios = $controller->listarusuario();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Socios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">StreamWeb</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="lista_socios.php">Socios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lista_eventos.php">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inscripciones</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <h1>Usuarios Registrados</h1>
    <table border="1">
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
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['id_usuario'] ?></td>
                <td><?= $usuario['nombre'] ?></td>
                <td><?= $usuario['correo'] ?></td>
                <td><?= $usuario['edad']?></td>
                <td><?= $usuario['id_plan'] ?></td>
                <td><?= $usuario['id_pack'] ?></td>
                <td><?= $usuario['duracion'] ?></td>
                <td>
                    <a href="actualizar_usuario.php?id=<?= $usuario['id_usuario'] ?>">Editar</a>
                    <form action="../controlador/usuariocontroller.php/eliminarusuario" method="get">
                        <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">
                        <button type="submit">Eliminar</button>
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="alta_usuarios.php">Agregar un nuevo usuario</a>
    <a href="actualizar_usuario.php">Editar un usuario</a>
</body>
</html>
