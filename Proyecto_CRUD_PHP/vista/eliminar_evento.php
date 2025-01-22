<?php
require_once '../controlador/eventoscontroller.php';
$evento= new EventoController;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_evento=$_POST["id_evento"];

    $alta= $evento->eliminarEvento($id_evento);
}
?>
<head>
    <meta charset="UTF-8">
    <title>Eliminar Socios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="text-align: center;">
    <div class="container mt-4">
        <h1>eliminar un evento</h1>
        <div>
            <form action="alta_socio.php" method="post">
                <div class="mb-3">
                    <label for="id_evento" class="form-label">escriba su id para eliminar</label><br>
                    <input type="text"  class="form-control" id="id_evento" name="id_evento" required>
                </div>
                <button type="submit" class="btn btn-primary">eliminar</button>
            </form><br>
        </div>
    </div>
</body>
</html>