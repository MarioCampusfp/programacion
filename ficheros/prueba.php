<?php
// Ruta al archivo de texto
$nombreArchivo = "archivo.txt";

// Verificar si el archivo existe
if (file_exists($nombreArchivo)) {
    // Abrir el archivo en modo de solo lectura
    $archivo = fopen($nombreArchivo, "r");

    // Inicializar el contador de líneas
    $contadorLineas = 0;

    // Leer el archivo línea por línea
    while (!feof($archivo)) {
        // Leer cada línea del archivo
        fgets($archivo);
        // Incrementar el contador de líneas
        $contadorLineas++;
    }

    // Cerrar el archivo después de leerlo
    fclose($archivo);

    // Mostrar el número de líneas
    echo "El archivo '$nombreArchivo' tiene $contadorLineas líneas.";
} else {
    echo "El archivo '$nombreArchivo' no existe.";
}
?>
