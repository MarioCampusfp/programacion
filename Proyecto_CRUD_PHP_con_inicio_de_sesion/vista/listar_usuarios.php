<?php
session_start();
// Se incluye el controlador para obtener la información de los usuarios
require_once '../controlador/Controlador.php';
$controller = new Controlador();
// Se obtiene un arreglo con todos los usuarios
$usuarios = $controller->listarUsuarios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <!-- Inclusión de Bootstrap para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Club deportivo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
         <li class="nav-item">
             <a class="nav-link" href="lista_socios.php">Socios</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="lista_eventos.php">Eventos</a>
         </li>
         <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="listar_usuarios.php">Usuarios</a>
         </li>
      </ul>
      <span class="navbar-text">
          <!-- Se muestra el usuario logueado -->
         Bienvenido, <?= $_SESSION['usuario']['usuario'] ?>
      </span>
    </div>
  </div>
</nav>
<div class="container mt-5">
    <h1>Usuarios Registrados</h1>
    <!-- Tabla con los datos de los usuarios -->
    <table class="table table-striped">
        <thead>
           <tr>
             <th>ID</th>
             <th>Usuario</th>
             <th>Contraseña</th>
             <th>Rol</th>
           </tr>
        </thead>
        <tbody>
        <?php foreach($usuarios as $usuario): ?>
           <tr>
              <td><?= $usuario['id_usuario'] ?></td>
              <td><?= $usuario['usuario'] ?></td>
              <td><?= $usuario['contrasena'] ?></td>
              <td><?= $usuario['rol'] ?></td>
           </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <!-- Enlace para crear un nuevo usuario -->
    <a href="alta_usuarios.php" class="btn btn-success">Crear Nuevo Usuario</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
