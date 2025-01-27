<?php
require_once '../controlador/usuarioController.php';
$socio= new usuarioController;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre=$_POST["nombre"];
    $correo=$_POST["correo"];
    $edad=$_POST["edad"];
    $plan=$_POST["plan"];
    $pack=$_POST["pack"];
    $duracion=$_POST["duracion"];

    $alta= $socio->agregarusuario($nombre, $correo, $edad, $plan, $pack, $duracion);
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
        <h1>Agregar un nuevo socio</h1>
        <div>
            <form action="alta_socio.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">escriba su nombre</label><br>
                    <input type="text"  class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="correo"class="form-label">escriba su correo</label><br>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">escriba su edad</label><br>
                    <input type="email" class="form-control" id="edad" name="edad" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">escriba su telefono</label><br>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">escriba su fecha de nacimiento</label><br>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form><br>
        </div>
    </div>
</body>
</html>
