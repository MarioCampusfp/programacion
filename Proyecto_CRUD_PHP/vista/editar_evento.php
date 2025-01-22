<?php
require_once '../controlador/eventoscontroller.php';
$evento= new EventoController;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_evento=$_POST["id_evento"];
    $nombre=$_POST["nombre"];
    $fecha=$_POST["fecha"];
    $lugar=$_POST["lugar"];

    $alta= $evento->actualizarEvento($id_evento, $nombre, $fecha, $lugar);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>alta de socios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="text-align: center;">
    <div class="container mt-4">
        <h1>Actualizar un evento</h1>
        <div>
            <form action="alta_socio.php" method="post">
                <div class="mb-3">
                    <label for="id_evento" class="form-label">escriba su id para eliminar</label><br>
                    <input type="text"  class="form-control" id="id_evento" name="id_evento" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">escriba el nombre del evento</label><br>
                    <input type="text"  class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="fecha"class="form-label">escriba la fecha del evento</label><br>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="mb-3">
                    <label for="lugar" class="form-label">escriba su email</label><br>
                    <input type="text" class="form-control" id="lugar" name="lugar" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form><br>
        </div>
    </div>
</body>
</html>