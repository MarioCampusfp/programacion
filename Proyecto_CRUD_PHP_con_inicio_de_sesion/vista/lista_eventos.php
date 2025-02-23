<?php 
require_once '../controlador/Controlador.php';
session_start();
$controller = new Controlador();
$eventos = $controller->listarEventos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Eventos</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
             <a class="nav-link active" aria-current="page" href="lista_eventos.php">Eventos</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="lista_socios.php">Socios</a>
         </li>
         <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] === 'admin'): ?>
         <li class="nav-item">
             <a class="nav-link" href="listar_usuarios.php">Usuarios</a>
         </li>
         <?php endif; ?>
      </ul>
      <span class="navbar-text">
         Bienvenido, <?= $_SESSION['usuario']['usuario'] ?>
      </span>
    </div>
  </div>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <h1>Eventos Registrados</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Lugar</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($eventos as $evento): ?>
            <tr>
                <td><?= $evento['id_evento'] ?></td>
                <td><?= $evento['nombre_evento'] ?></td>
                <td><?= $evento['fecha'] ?></td>
                <td><?= $evento['lugar'] ?></td>
                <td>
                    <a href="editar_evento.php?id=<?= $evento['id_evento'] ?>">Editar</a>
                    <form action="../controlador/Controlador.php" method="post" style="display:inline;">
                        <input type="hidden" name="id_evento" value="<?= $evento['id_evento'] ?>">
                        <input type="hidden" name="accion" value="eliminarEvento">
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="alta_evento.php">Agregar un nuevo evento</a>
</body>
</html>