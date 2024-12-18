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

$archivo = "../datos/clientes.csv"; // Ruta actualizada a la carpeta 'datos'

$id = $_POST["id"] ?? null;
$nombre = $_POST["nombre"] ?? null;
$correo = $_POST["correo"] ?? null;

if ($id !== null && $nombre !== null && $correo !== null) {
    $clientes = leerClientes($archivo);
    $clienteEncontrado = false;

    // Modificar el cliente correspondiente
    foreach ($clientes as $index => $cliente) {
        if ($index > 0 && $cliente[0] == $id) { // Saltar la cabecera
            $clientes[$index] = [$id, $nombre, $correo]; // Actualizar los datos
            $clienteEncontrado = true;
            break;
        }
    }

    if ($clienteEncontrado) {
        escribirClientes($archivo, $clientes);
        echo "<h1>Cliente actualizado con éxito</h1>";
        echo "<a href='../index.php'>Volver al listado</a>";
    } else {
        echo "<h1>Error: Cliente no encontrado</h1>";
        echo "<a href='../index.php'>Volver al listado</a>";
    }
} else {
    echo "<h1>Error: Datos incompletos</h1>";
    echo "<a href='../index.php'>Volver al listado</a>";
}
?>
