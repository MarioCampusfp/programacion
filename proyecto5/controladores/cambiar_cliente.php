<?php

function leerClientes($archivo) {
    $clientes = [];
    if (($handle = fopen($archivo, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $clientes[] = $data;
        }
        fclose($handle);
    }
    return $clientes;
}

$archivo = "../datos/clientes.csv"; // Ruta al archivo clientes.csv
$id = $_POST["id"] ?? null; // Recibe la ID del cliente a editar desde el formulario

/* if ($id === null) {
    echo "<h1>Error: ID no especificada</h1>";
    echo "<a href='../index.php'>Volver al listado</a>";
    exit;
} */

$clientes = leerClientes($archivo);
$clienteSeleccionado = null;

// Buscar el cliente por su ID
foreach ($clientes as $index => $cliente) {
    if ($index > 0 && $cliente[0] == $id) { // Saltar la cabecera
        $clienteSeleccionado = $cliente;
        break;
    }
}

/*  if ($clienteSeleccionado === null) {
    echo "<h1>Error: Cliente no encontrado</h1>";
    echo "<a href='../index.php'>Volver al listado</a>";
    exit;
} */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Editar Cliente</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Cliente</h1>

        <form action="" method="POST" class="mt-4">
            <label for="id" class="form-label">ID del cliente:</label>
            <input type="text" name="id" id="id" required><br>
            <button type="submit" class="btn btn-danger">Buscar Cliente</button>
        </form>

        <?php if ($id !== null): ?>
            <form action="../controladores/actualizar_cliente.php" method="POST" class="mt-4">
                <input type="hidden" name="id" value="<?= htmlspecialchars($clienteSeleccionado[0]) ?>">
            
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($clienteSeleccionado[1]) ?>" required>
                <br>
            
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" name="correo" id="correo" value="<?= htmlspecialchars($clienteSeleccionado[2]) ?>" required>
                <br>
            
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        <?php endif; ?>

        <a href="../index.php" style="margin-top: 1rem;" class="btn btn-secondary">Volver al listado</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
