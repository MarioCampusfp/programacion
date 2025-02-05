<?php
require_once '../controlador/Controlador.php';
$controller = new Controlador();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_evento = $_POST["id_evento"];
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $lugar = $_POST["lugar"];

    $controller->actualizarEvento($id_evento, $nombre, $fecha, $lugar);
    header("Location: lista_eventos.php");
    exit();
} else {
    $id_evento = $_GET["id"];
    $evento = $controller->obtenerEventoPorId($id_evento);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Evento</title>
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
        <h1>Actualizar un evento</h1>
        <div>
            <form action="editar_evento.php" method="post">
                <input type="hidden" name="id_evento" value="<?= $evento['id_evento'] ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del evento</label><br>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $evento['nombre_evento'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha del evento</label><br>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?= $evento['fecha'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="lugar" class="form-label">Lugar del evento</label><br>
                    <input type="text" class="form-control" id="lugar" name="lugar" value="<?= $evento['lugar'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form><br>
        </div>
    </div>
</body>
</html>