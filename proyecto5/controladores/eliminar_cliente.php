<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Eliminar Cliente</h1>
    <form action="" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="id" class="form-label">ID del Cliente</label>
            <input type="text" class="form-control" id="id" name="id" placeholder="Introduce el ID del cliente" required>
        </div>
        <button type="submit" class="btn btn-danger">Eliminar Cliente</button>
    </form>
    <div class="mt-3">
        <a href="../index.php" class="btn btn-secondary">Volver al listado</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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

function escribirClientes($archivo, $clientes) {
    if (($handle = fopen($archivo, "w")) !== false) {
        foreach ($clientes as $cliente) {
            fputcsv($handle, $cliente);
        }
        fclose($handle);
    }
}

$archivo = "../datos/clientes.csv";
$id = $_POST["id"] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id !== null) {
    $clientes = leerClientes($archivo);
    $clientesActualizados = array_filter($clientes, function($cliente) use ($id) {
        return $cliente[0] != $id;
    });
    escribirClientes($archivo, $clientesActualizados);
    echo "<div class='container mt-5'>";
    echo "<h2 class='text-success'>Cliente eliminado con éxito</h2>";
    echo "<a href='listar_clientes.php' class='btn btn-primary mt-3'>Volver al listado</a>";
    echo "</div>";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<div class='container mt-5'>";
    echo "<h2 class='text-danger'>Error: No se recibió un ID válido.</h2>";
    echo "</div>";
}
?>