<?php
require_once '../controlador/usuarioController.php';
$usuario= new usuarioController;

$planes = $usuario->listarPlanes();
$packs = $usuario->listarPacks();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre=$_POST["nombre"];
    $correo=$_POST["correo"];
    $edad=$_POST["edad"];
    $plan=$_POST["plan"];
    $pack=$_POST["pack"];
    $duracion=$_POST["duracion"]; 

    $alta= $usuario->agregarusuario($nombre, $correo, $edad, $plan, $pack, $duracion);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Socios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        // Función para validar el formulario antes de enviarlo
        function validateForm() {
            const edad = document.getElementById('edad').value;
            const plan = document.getElementById('plan').value;
            const duracion = document.getElementById('duracion').value;
            const pack = document.getElementById('pack').value;

            // Validar que los usuarios menores de 18 años solo puedan contratar el Pack Infantil
            if (edad < 18 && pack != 3) {
                alert('Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.');
                return false;
            }

            // Validar que los usuarios del Plan Básico solo puedan seleccionar un paquete adicional
            if (plan == 1 && document.querySelectorAll('#pack option:checked').length > 1) {
                alert('Los usuarios del Plan Básico solo pueden seleccionar un paquete adicional.');
                return false;
            }

            // Validar que el Pack Deporte solo pueda ser contratado si la duración de la suscripción es de 1 año
            if (pack == 1 && duracion != 'anual') {
                alert('El Pack Deporte solo puede ser contratado si la duración de la suscripción es de 1 año.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body style="text-align: center;">
    <div class="container mt-4">
        <h1>Agregar un nuevo usuario</h1>
        <div>
            <form action="alta_usuarios.php" method="post" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="name" class="form-label">Escriba su nombre</label><br>
                    <input type="text"  class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="correo"class="form-label">Escriba su correo</label><br>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Escriba su edad</label><br>
                    <input type="int" class="form-control" id="edad" name="edad" required>
                </div>
                <div class="mb-3">
                    <label for="duracion" class="form-label">Elige la duración</label><br>
                    <select class="form-control" id="duracion" name="duracion" required>
                        <option value="mensual">Mensual</option>
                        <option value="anual">Anual</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="plan" class="form-label">Elige su plan</label><br>
                    <select class="form-control" id="plan" name="plan" required>
                        <?php foreach ($planes as $plan): ?>
                            <option value="<?= $plan['id_plan'] ?>"><?= $plan['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pack" class="form-label">Elige su pack</label><br>
                    <select class="form-control" id="pack" name="pack" required>
                        <?php foreach ($packs as $pack): ?>
                            <option value="<?= $pack['id_pack'] ?>"><?= $pack['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form><br>
            <a href="lista_usuarios.php" class="btn btn-secondary">Volver a la lista de usuarios</a>
        </div>
    </div>
</body>
</html>
