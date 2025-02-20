<?php
// Incluir el controlador que maneja las recetas.
require_once "../controladores/controladores.php";

$mensaje = "";
$controlador = new receta_controlador();

// Si se recibe el ID de la receta por GET se buscan sus datos base.
if(isset($_GET['id_receta'])) {
    $id_receta = $_GET['id_receta'];
    // Obtener todas las recetas usando el método listar_recetas().
    $recetas = $controlador->listar_recetas();
    // Recorrer el array para encontrar la receta con el id correspondiente.
    foreach($recetas as $rec) {
        if($rec['id_receta'] == $id_receta) {
            $nombre = $rec['nombre'];
            $ingredientes = $rec['ingredientes'];
            $elaboracion = $rec['elaboracion'];
            $descripcion = $rec['descripcion'];
            break;
        }
    }
} else {
    // Si no se recibe ID, inicializar variables en vacío.
    $id_receta = "";
    $nombre = "";
    $ingredientes = "";
    $elaboracion = "";
    $descripcion = "";
}

// Si se envía el formulario para modificar la receta.
if(isset($_POST['modificar'])) {
    $id_receta   = $_POST['id_receta'];
    $nombre      = $_POST['nombre'];
    $ingredientes = $_POST['ingredientes'];
    $elaboracion = $_POST['elaboracion'];
    $descripcion = $_POST['descripcion'];
    
    // Llamar al método del controlador para modificar la receta.
    $controlador->modificar_receta($id_receta, $nombre, $ingredientes, $elaboracion, $descripcion);
    $mensaje = "Receta modificada correctamente.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Receta</title>
    <!-- Enlazar fichero de estilos centralizado -->
    <link href="vista/estilo.css" rel="stylesheet">
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar básico -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Recetas</a>
      </div>
    </nav>
    <div class="container">
      <h1>Modificar Receta</h1>
      <!-- Mostrar mensaje de éxito si está definido -->
      <?php if($mensaje): ?>
         <div class="alert alert-success"><?= $mensaje ?></div>
      <?php endif; ?>
      <!-- Formulario para modificar la receta -->
      <form action="modificar_receta.php" method="post">
         <!-- Campo readonly para el ID, ya que no se debe modificar -->
         <div class="mb-3">
           <label for="id_receta" class="form-label">ID de la Receta</label>
           <input type="number" class="form-control" id="id_receta" name="id_receta" value="<?= htmlspecialchars($id_receta) ?>" readonly>
         </div>
         <!-- Campo para el nombre -->
         <div class="mb-3">
           <label for="nombre" class="form-label">Nombre</label>
           <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required>
         </div>
         <!-- Campo para ingredientes -->
         <div class="mb-3">
           <label for="ingredientes" class="form-label">Ingredientes</label>
           <textarea class="form-control" id="ingredientes" name="ingredientes" rows="3" required><?= htmlspecialchars($ingredientes) ?></textarea>
         </div>
         <!-- Campo para elaboración -->
         <div class="mb-3">
           <label for="elaboracion" class="form-label">Elaboración</label>
           <textarea class="form-control" id="elaboracion" name="elaboracion" rows="5" required><?= htmlspecialchars($elaboracion) ?></textarea>
         </div>
         <!-- Campo para descripción -->
         <div class="mb-3">
           <label for="descripcion" class="form-label">Descripción</label>
           <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= htmlspecialchars($descripcion) ?></textarea>
         </div>
         <!-- Botón de enviar para modificar la receta -->
         <button type="submit" name="modificar" class="btn btn-primary">Modificar Receta</button>
      </form>
    </div>
</body>
</html>