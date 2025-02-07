<?php
require_once '../controlador/Controlador.php';
$controller = new Controlador();
$socios = $controller->listarSocios();
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
            <a class="navbar-brand" href="#">Club deportivo</a>
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
    <h1>Socios Registrados</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($socios as $socio): ?>
            <tr>
                <td><?= $socio['id_socio'] ?></td>
                <td><?= $socio['nombre'] ?></td>
                <td><?= $socio['apellido'] ?></td>
                <td><?= $socio['email'] ?></td>
                <td><?= $socio['telefono'] ?></td>
                <td><?= $socio['fecha_nacimiento'] ?></td>
                <td>
                    <a href="editar_socio.php?id=<?= $socio['id_socio'] ?>">Editar</a>
                    <form action="../controlador/Controlador.php" method="post" style="display:inline;">
                        <input type="hidden" name="id_socio" value="<?= $socio['id_socio'] ?>">
                        <input type="hidden" name="accion" value="eliminarSocio">
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="alta_socio.php">Agregar un nuevo socio</a>
</body>
</html>
