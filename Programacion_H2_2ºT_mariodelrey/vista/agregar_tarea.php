<?php
// Verificar la sesión activa.
session_start();
if (!isset($_SESSION['usuario'])) {
    // Usuario no autenticado, redirigimos a index.php.
    header("Location: ../index.php");
    exit();
}

// Obtener el nombre del usuario activo (copia del encabezado de tareas.php).
$userId = $_SESSION['usuario'];
require_once '../modulo/modulo.php';
$usuarioObj = new usuario();
// Consulta para obtener el nombre del usuario.
$query = "SELECT nombre FROM usuarios WHERE id_usuario = ?";
$stmt = $usuarioObj->conexion->conexion->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$nombreUsuario = $row ? $row['nombre'] : 'Desconocido';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- HEAD: Metadatos, título y enlaces a CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tarea</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Estilos para la navbar y el dropdown */
      .navbar {
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }
      .navbar-brand {
        font-weight: bold;
        color: #ffcc00 !important;
      }
      .dropdown-menu {
        border: 1px solid #ffcc00;
        background: #222;
      }
      .dropdown-item {
        color: #ffcc00;
      }
      .dropdown-item:hover {
        background-color: #ffcc00;
        color: #222;
      }
    </style>
</head>
<body>
    <!-- NAVBAR: Barra de navegación superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Tareas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <!-- Menú principal -->
         <ul class="navbar-nav mr-auto">
             <li class="nav-item">
                <a class="nav-link" href="tareas.php">Tareas</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="agregar_tarea.php">Agregar Tarea</a>
             </li>
         </ul>
         <!-- Información del usuario y botón para cerrar sesión -->
         <span class="navbar-text mr-3">
            <?php echo htmlspecialchars($nombreUsuario); ?>
         </span>
         <a href="../controladores/Controladores.php?action=cerrar_sesion" class="btn btn-danger">Cerrar Sesión</a>
      </div>
    </nav>
    
    <!-- MAIN CONTENT: Sección principal para agregar una tarea -->
    <div class="container mt-4">
        <!-- Título de la sección -->
        <h1 class="mt-3">Agregar Tarea</h1>
        <!-- FORMULARIO: Permite introducir los datos de la tarea -->
        <form action="../controladores/Controladores.php?action=agregar_tarea" method="post" class="mt-3">
            <!-- Campo: Nombre de la tarea -->
            <div class="form-group">
                <label for="nombre">Nombre de la tarea:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <!-- Campo: Descripción de la tarea -->
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
            </div>
            <!-- Botones: Enviar el formulario o cancelar -->
            <button type="submit" class="btn btn-primary">Agregar Tarea</button>
            <a href="tareas.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
    <!-- SCRIPTS: Inclusión de dependencias JavaScript para el correcto funcionamiento de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
