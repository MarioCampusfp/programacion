<?php
$nombreArchivo = "usuario.txt";

// Crear o escribir en el archivo
file_put_contents($nombreArchivo, "Este es un archivo creado por PHP.\n");
echo "Archivo creado con éxito.\n";

// Leer el contenido
echo "Contenido inicial del archivo:\n";
echo file_get_contents($nombreArchivo);

// Añadir texto
file_put_contents($nombreArchivo, "Nueva línea de texto.\n", FILE_APPEND);
echo "Texto añadido con éxito.\n";

// Leer el contenido actualizado
echo "Contenido actualizado del archivo:\n";
echo file_get_contents($nombreArchivo);
?>