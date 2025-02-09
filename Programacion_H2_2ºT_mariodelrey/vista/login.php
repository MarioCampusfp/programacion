<?php
// Iniciamos la sesión para gestionar la autenticación del usuario.
session_start();
// Si ya hay un usuario autenticado, lo enviamos directamente a la página de tareas.
if (isset($_SESSION['usuario'])) {
    header("Location: tareas.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- HEAD: Contiene metadatos, título y enlaces a estilos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Estilos para el formulario de inicio */
      .form-container {
          background: #fefefe;
          max-width: 400px;
          margin: 70px auto;
          padding: 40px;
          border-radius: 10px;
          border: 1px solid #e0e0e0;
          box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      }
      .form-container h1 {
          text-align: center;
          margin-bottom: 25px;
          color: #2c3e50;
      }
      .form-group label {
          color: #333;
      }
      .btn-primary {
          width: 100%;
          background-color: #27ae60;
          border: none;
      }
      .btn-primary:hover {
          background-color: #2ecc71;
      }
    </style>
</head>
<body>
    <!-- BODY: Contenedor principal del documento -->
    <div class="container">
        <!-- Sección: Contenedor del formulario de inicio de sesión -->
        <div class="form-container">
            <!-- Título principal del formulario -->
            <h1 class="mt-5">Iniciar Sesión</h1>
            <?php 
            // Si se pasó un error en la URL, mostramos mensajes específicos.
            if (isset($_GET['error'])):
                if ($_GET['error'] === 'usuario'):
                    // Error: usuario no encontrado.
            ?>
            <div class="alert alert-danger">El usuario no existe.</div>
            <?php 
                elseif ($_GET['error'] === 'contraseña'):
                    // Error: contraseña incorrecta.
            ?>
            <div class="alert alert-danger">Contraseña incorrecta.</div>
            <?php 
                endif;
            endif;
            ?>
            <!-- Formulario de inicio de sesión -->
            <form action="../controladores/Controladores.php?action=iniciar_sesion" method="post" class="mt-3">
                <!-- Campo para el correo electrónico -->
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" class="form-control" required>
                </div>
                <!-- Campo para la contraseña -->
                <div class="form-group">
                    <label for="pass">Contraseña:</label>
                    <input type="password" id="pass" name="pass" class="form-control" required>
                </div>
                <!-- Botón para enviar el formulario -->
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
            <!-- Enlace para redirigir al registro -->
            <p class="mt-3 text-center">¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
        </div>
        <!-- Fin del contenedor del formulario -->
    </div>
    <!-- Sección: Inclusión de scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
