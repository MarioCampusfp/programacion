<?php
// Iniciamos la sesión y comprobamos si el usuario ha iniciado sesión. Si no, se redirige a la página de inicio.
session_start();
if (!isset($_SESSION['usuario'])) {
    // Usuario no autenticado, se redirige a index.php.
    header("Location: ../index.php");
    exit();
}

// Obtenemos el ID del usuario autenticado.
$userId = $_SESSION['usuario'];
// Se incluye la clase usuario para utilizar sus métodos (por ejemplo, obtener el nombre).
require_once '../modulo/modulo.php';
$usuarioObj = new usuario();

// Preparamos la consulta para obtener el nombre del usuario basado en su ID.
// Esto es importante para mostrar un saludo personalizado en la barra de navegación.
$query = "SELECT nombre FROM usuarios WHERE id_usuario = ?";
$stmt = $usuarioObj->conexion->conexion->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$nombreUsuario = $row ? $row['nombre'] : 'Desconocido';

// Se incluye el controlador de tareas para gestionar las operaciones (listar, agregar, etc.).
require_once '../controladores/Controladores.php';

$tareaControlador = new TareaControlador();
// Se obtiene la lista de tareas pendientes asociadas al usuario actual.
$tareas = $tareaControlador->listar_tareas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- HEAD: Define la configuración básica, título y enlaces de estilos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tareas</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* CSS: Estilos personalizados para la página */
      body {
          background: #f7f7f7;
      }
      .navbar {
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }
      .navbar-brand {
          font-weight: bold;
          color: #ffcc00 !important;
      }
      .container {
          margin-top: 30px;
      }
      h1 {
          color: #2c3e50;
          text-align: center;
          margin-bottom: 20px;
      }
      table {
          background: #fff;
          border-radius: 5px;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }
      th {
          background: #27ae60;
          color: #fff;
      }
      td, th {
          vertical-align: middle;
      }
      .btn-danger {
          background-color: #e74c3c;
          border: none;
      }
      .btn-danger:hover {
          background-color: #c0392b;
      }
      .btn-success {
          background-color: #27ae60;
          border: none;
      }
      .btn-success:hover {
          background-color: #2ecc71;
      }
    </style>
</head>
<body>
    <!-- NAVBAR: Barra de navegación superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <!-- Marca de la navbar -->
      <a class="navbar-brand" href="#">Tareas</a>
      <!-- Botón de menú para dispositivos móviles -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Menú principal y opciones de sesión -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <!-- Lista de enlaces de navegación -->
         <ul class="navbar-nav mr-auto">
             <li class="nav-item">
                <a class="nav-link" href="tareas.php">Tareas</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="agregar_tarea.php">Agregar Tarea</a>
             </li>
         </ul>
         <!-- Saludo personalizado y botón para cerrar sesión -->
         <span class="navbar-text mr-3">
            <?php echo htmlspecialchars($nombreUsuario); ?>
         </span>
         <a href="../controladores/Controladores.php?action=cerrar_sesion" class="btn btn-danger">Cerrar Sesión</a>
      </div>
    </nav>
    
    <!-- MAIN CONTENT: Sección donde se muestran y gestionan las tareas -->
    <div class="container mt-4">
        <!-- Encabezado de la sección -->
        <h1 class="mt-3">Mis Tareas</h1>
        <!-- TABLA: Lista de tareas pendientes -->
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <!-- Encabezados de la tabla -->
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Iteramos sobre cada tarea obtenida y mostramos sus detalles en una fila de la tabla.
                while ($row = $tareas->fetch_assoc()): ?>
                <tr>
                    <!-- Datos de la tarea -->
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['estado']; ?></td>
                    <td>
                        <?php if ($row['estado'] !== 'completada'): ?>
                        <!-- FORM: Botón para marcar la tarea como completada -->
                        <form method="post" action="../controladores/Controladores.php?action=completar_tarea" style="display:inline;">
                            <input type="hidden" name="tarea_id" value="<?php echo $row['id_tarea']; ?>">
                            <button type="submit" class="btn btn-success btn-sm">Completar</button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <!-- Enlace: Botón para agregar una nueva tarea -->
        <a href="agregar_tarea.php" class="btn btn-primary mt-3">Agregar Tarea</a>
    </div>
    <!-- SCRIPT: Inclusión de librerías JavaScript para Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
