<?php
require_once "controladores/controladores.php";

$controlador = new receta();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>listar recetas</title>
</head>
<body>
    <!--barra de navegacion-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class=" navbar-breand" href="#">Recetas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav_item" href="index.php">Listar recetas </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav_item" href="index.php">Agregar recetas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container mt-4">
        <h1>Recetas Registradas</h1>
        <!-- Tabla de recetas -->
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ingredientes</th>
                    <th>Elaboracion</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <!--itera sobre listar las recetas y muestra cada una en una fila de la tabla -->
                <?php foreach($recetas as $receta): ?>
                    <tr>
                        <td><?=$receta["id_receta"] ?></td>
                        <td><?=$receta["nombre"] ?></td>
                        <td><?=$receta["ingredientes"] ?></td>
                        <td><?=$receta["elaboracion"] ?></td>
                        <td><?=$receta["descripcion"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>