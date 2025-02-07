<?php
require_once '../controlador/Controlador.php';
$controller = new Controlador();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_socio = $_POST["id_socio"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];

    $controller->actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    header("Location: lista_socios.php");
    exit();
} else {
    $id_socio = $_GET["id"];
    $socio = $controller->obtenerSocioPorId($id_socio);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Socio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="text-align: center;">
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
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container mt-4">
        <h1>Actualizar un socio</h1>
        <div>
            <form action="editar_socio.php" method="post">
                <input type="hidden" name="id_socio" value="<?= $socio['id_socio'] ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label><br>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $socio['nombre'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label><br>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $socio['apellido'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label><br>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $socio['email'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label><br>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $socio['telefono'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label><br>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= $socio['fecha_nacimiento'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form><br>
        </div>
    </div>
</body>
</html>