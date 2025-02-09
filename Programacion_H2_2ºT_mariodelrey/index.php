<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
          background: linear-gradient(to right, #f8f9fa, #e9ecef);
          font-family: Arial, sans-serif;
      }
      .container {
          margin-top: 100px;
          text-align: center;
      }
      h1 {
          color: #343a40;
          margin-bottom: 30px;
      }
      .nav-pills .nav-link {
          background-color: #343a40;
          color: #fff;
          margin: 0 5px;
      }
      .nav-pills .nav-link.active {
          background-color: #ffcc00;
          color: #343a40;
      }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Bienvenido</h1>
        <!-- Menú de navegación principal -->
        <nav class="mt-3">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="vista/login.php">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vista/register.php">Registrarse</a>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>
