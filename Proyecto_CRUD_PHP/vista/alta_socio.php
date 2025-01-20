<?php
require_once '../controlador/SociosController.php';
$socio= new SociosController;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $email=$_POST["email"];
    $telefono=$_POST["telefono"];
    $fecha_nacimiento=$_POST["fecha_nacimiento"];

    $alta= $socio->agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento);
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
                    <label for="apellido"class="form-label">escriba su apellido</label><br>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">escriba su email</label><br>
                    <input type="email" class="form-control" id="email" name="email" required>
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
