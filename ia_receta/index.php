<?php 
// Incluir el controlador para acceder a la lógica de recetas
require_once "controladores/controladores.php";

// Instanciar la clase receta para gestionar operaciones CRUD
$controlador = new receta();

// Si se envía un formulario para eliminar una receta, procesarla
if(isset($_POST['delete']) && !empty($_POST['id_receta'])) {
    $controlador->eliminar_receta($_POST['id_receta']);
    $mensajeDelete = "Receta eliminada correctamente.";
}

// Obtener el listado de recetas de la base de datos
$recetas = $controlador->listar_recetas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Meta viewport para responsividad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace al fichero de estilos centralizado -->
    <link href="vista/estilo.css" rel="stylesheet">
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Listar recetas</title>
</head>
<body>
    <!-- Inicio del navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Marca del sitio -->
            <a class="navbar-brand" href="#">Recetas</a>
            <!-- Botón para menú responsivo -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Enlaces del menú -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light me-2" href="index.php">Listar recetas</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light me-2" href="vista/agregar_receta.php">Agregar recetas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fin del navbar -->
    
    <!-- Script de Bootstrap para funcionalidades responsivas -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Mostrar mensaje de eliminación si existe -->
    <?php if(isset($mensajeDelete)): ?>
        <div class="alert alert-success"><?= $mensajeDelete ?></div>
    <?php endif; ?>
    
    <!-- Contenedor principal -->
    <div class="container mt-4">
        <h1>Recetas Registradas</h1>
        <!-- Se usa un card para envolver la tabla -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Lista de Recetas
            </div>
            <div class="card-body">
                <!-- Contenedor responsive para la tabla -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <!-- Cabeceras de la tabla -->
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Ingredientes</th>
                                <th>Elaboracion</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Recorrer el array de recetas -->
                            <?php foreach ($recetas as $receta): ?>
                                <tr>
                                    <!-- Mostrar datos de cada receta -->
                                    <td><?= $receta["id_receta"] ?></td>
                                    <td><?= $receta["nombre"] ?></td>
                                    <td><?= $receta["ingredientes"] ?></td>
                                    <td><?= $receta["elaboracion"] ?></td>
                                    <td><?= $receta["descripcion"] ?></td>
                                    <td>
                                        <!-- Formulario para eliminar receta -->
                                        <form method="post" action="index.php" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar esta receta?');">
                                            <input type="hidden" name="id_receta" value="<?= $receta['id_receta'] ?>">
                                            <button type="submit" name="delete" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                        <!-- Enlace para editar receta -->
                                        <a href="vista/modificar_receta.php?id_receta=<?= $receta['id_receta'] ?>" class="btn btn-warning btn-sm ms-2">Editar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> <!-- /.table-responsive -->
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div> <!-- /.container -->
</body>
</html>