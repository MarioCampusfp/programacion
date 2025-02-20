<?php
// Incluir el controlador para gestionar la lógica de recetas e IA.
require_once "../controladores/controladores.php";

$mensaje = "";
$preview = false;
$nombre = "";
$ingredientes = "";
$elaboracion = "";
$descripcion = "";

// Procesar el formulario cuando se pulsa el botón "Generar"
if(isset($_POST['generar'])) {
    $nombre = trim($_POST['nombre']);
    if($nombre != "") {
        // Usar el controlador de la IA para enviar peticiones basadas en el nombre del plato.
        $iaControlador = new ia_controladores();
        $ingredientes = $iaControlador->enviar_peticion("Genera únicamente la lista de ingredientes para el plato \"$nombre\". Responde solo con los ingredientes separados por comas.");
        $elaboracion = $iaControlador->enviar_peticion("Genera la elaboración completa para el plato \"$nombre\". Responde únicamente con las instrucciones de preparación.");
        $descripcion = $iaControlador->enviar_peticion("Genera una breve descripción para el plato \"$nombre\". Responde únicamente con la descripción.");
        $preview = true;
    } else {
        $mensaje = "Debes ingresar el nombre del plato.";
    }
}

// Procesar formulario cuando se confirme la adición de la receta.
if(isset($_POST['confirmar'])) {
    $nombre = $_POST['nombre'];
    $ingredientes = $_POST['ingredientes'];
    $elaboracion = $_POST['elaboracion'];
    $descripcion = $_POST['descripcion'];
    // Instanciar la lógica de receta para agregarla a la base de datos.
    $controlador = new receta();
    $controlador->agregar_receta($nombre, $ingredientes, $elaboracion, $descripcion);
    $mensaje = "Receta agregada exitosamente.";
    $preview = false;
}

// Procesar la cancelación.
if(isset($_POST['eliminar'])) {
    $mensaje = "Operación cancelada. La receta no fue agregada.";
    $preview = false;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Receta</title>
    <!-- Enlazar el fichero de estilos centralizado -->
    <link href="vista/estilo.css" rel="stylesheet">
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar con enlaces de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Recetas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menú de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light me-2" href="../index.php">Listar recetas</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light me-2" href="agregar_receta.php">Agregar recetas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Contenedor principal -->
    <div class="container mt-4">
        <h1>Agregar Receta</h1>
        <!-- Mostrar mensaje si está definido -->
        <?php if($mensaje): ?>
            <div class="alert alert-info"><?= $mensaje ?></div>
        <?php endif; ?>
        
        <!-- Si no se ha generado previo, mostrar el formulario inicial -->
        <?php if(!$preview): ?>
            <form action="agregar_receta.php" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Plato</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="submit" name="generar" class="btn btn-primary">Generar Datos</button>
                </div>
            </form>
        <?php else: ?>
            <!-- Si se ha generado la previsualización, mostrarse en un card -->
            <form action="agregar_receta.php" method="post">
                <!-- Campos ocultos para enviar datos previamente generados -->
                <input type="hidden" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
                <input type="hidden" name="ingredientes" value="<?= htmlspecialchars($ingredientes) ?>">
                <input type="hidden" name="elaboracion" value="<?= htmlspecialchars($elaboracion) ?>">
                <input type="hidden" name="descripcion" value="<?= htmlspecialchars($descripcion) ?>">
                <div class="card shadow-sm mb-3">
                    <div class="card-header bg-primary text-white">Datos Previsualización</div>
                    <div class="card-body">
                        <!-- Tabla que muestra los datos generados -->
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Nombre del Plato</th>
                                    <td><?= htmlspecialchars($nombre) ?></td>
                                </tr>
                                <tr>
                                    <th>Ingredientes</th>
                                    <td><?= htmlspecialchars($ingredientes) ?></td>
                                </tr>
                                <tr>
                                    <th>Elaboración</th>
                                    <td><?= htmlspecialchars($elaboracion) ?></td>
                                </tr>
                                <tr>
                                    <th>Descripción</th>
                                    <td><?= htmlspecialchars($descripcion) ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Botones de confirmación y cancelación -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="confirmar" class="btn btn-success me-2">Añadir Receta</button>
                            <button type="submit" name="eliminar" class="btn btn-danger">Eliminar Receta</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
