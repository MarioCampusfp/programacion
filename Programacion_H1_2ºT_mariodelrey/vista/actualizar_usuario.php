<?php
require_once '../controlador/usuariocontroller.php';
$usuario= new usuarioController;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_usuario=$_POST["id_usuario"];
    $nombre=$_POST["nombre"];
    $correo=$_POST["correo"];
    $edad=$_POST["edad"];
    $plan=$_POST["id_plan"];
    $pack=$_POST["id_paquete"];
    $duracion=$_POST["duracion"];

    $alta= $usuario->actualizarusuario($id_usuario,$nombre, $correo, $edad, $plan, $pack, $duracion);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>actualizar usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="text-align: center;">
    <div class="container mt-4">
        <h1>Actualizar un socio</h1>
        <div>
            <form action="actualizar_usuario.php" method="post">
            <div class="mb-3">
                    <label for="id_usuario" class="form-label">escriba su id</label><br>
                    <input type="text"  class="form-control" id="id_usuario" name="id_usuario" required>
                </div>
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
                    <label for="duracion" class="form-label">selecione la duracion</label><br>
                    <input type="text" class="form-control" id="duracion" name="duracion" required>
                </div>
                <div class="mb-3">
                    <label for="id_plan" class="form-label">selecione la plan</label><br>
                    <input type="text" class="form-control" id="id_plan" name="v" required>
                </div>
                <div class="mb-3">
                    <label for="id_pack" class="form-label">selecione el paquete</label><br>
                    <input type="text" class="form-control" id="id_pack" name="id_pack" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form><br>
        </div>
    </div>
</body>
</html>