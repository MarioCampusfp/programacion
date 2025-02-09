<?php
// Iniciamos la sesión para verificar si el usuario ya está autenticado
session_start();
// Si el usuario ya tiene sesión iniciada, lo redirigimos a tareas.php
if (isset($_SESSION['usuario'])) {
    header("Location: tareas.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Configuración de la cabecera: codificación, viewport y título de la página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <!-- Enlace a Bootstrap para estilos -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Estilos básicos para la página de registro */
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
    <script>
        // Función para validar que se han aceptado los términos
        function validarFormulario() {
            var aceptarTerminos = document.getElementById('aceptar_terminos');
            if (!aceptarTerminos.checked) {
                alert('Debe aceptar los términos y condiciones para registrarse.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <!-- Contenedor para el formulario de registro -->
        <div class="form-container">
            <!-- Título principal del formulario de registro -->
            <h1>Registrarse</h1>
            <?php 
            // Se muestra un mensaje de error si el correo ya existe
            if (isset($_GET['error']) && $_GET['error'] === 'correo_existe'):
            ?>
            <div class="alert alert-danger">
                El correo ya está registrado. Por favor, utiliza otro correo.
            </div>
            <?php 
            endif;
            ?>
            <!-- Formulario para que el usuario ingrese su nombre, correo y contraseña -->
            <form action="../controladores/Controladores.php?action=registrar" method="post" class="mt-3" onsubmit="return validarFormulario()">
                <div class="form-group">
                    <!-- Campo para el nombre del usuario -->
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <!-- Campo para el correo electrónico -->
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" class="form-control" required>
                </div>
                <div class="form-group">
                    <!-- Campo para la contraseña -->
                    <label for="pass">Contraseña:</label>
                    <input type="password" id="pass" name="pass" class="form-control" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="aceptar_terminos" name="aceptar_terminos" required>
                    <label class="form-check-label" for="aceptar_terminos">Acepto los <a href="terminos.php">términos y condiciones</a></label>
                </div>
                <!-- Botón para enviar el formulario y registrar al nuevo usuario -->
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>
            <!-- Enlace para redirigir al formulario de inicio de sesión en caso de que el usuario ya tenga una cuenta -->
            <p class="mt-3 text-center">¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></p>
        </div>
    </div>
    <!-- Inclusión de dependencias JavaScript para Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
