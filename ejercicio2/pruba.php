<?php
error_reporting(0);

// Solicitar al usuario que ingrese una contraseña
$contraseña = readline("Introduce una contraseña que tenga al menos 8 caracteres, una mayúscula, una minúscula y un número: ");

// Expresiones regulares para verificar los criterios
$longitud = '/^.{8,}$/';        // Al menos 8 caracteres
$mayuscula = '/[A-Z]/';         // Al menos una letra mayúscula
$minuscula = '/[a-z]/';         // Al menos una letra minúscula
$numero = '/[0-9]/';            // Al menos un número

// Validar la contraseña
if (preg_match($longitud, $contraseña) && 
    preg_match($mayuscula, $contraseña) && 
    preg_match($minuscula, $contraseña) && 
    preg_match($numero, $contraseña)) {
    echo "Contraseña válida. ¡Bienvenido!\n";
} else {
    echo "La contraseña no es válida. Debe cumplir con los siguientes criterios:\n";
    echo "- Al menos 8 caracteres.\n";
    echo "- Contener al menos una letra mayúscula.\n";
    echo "- Contener al menos una letra minúscula.\n";
    echo "- Contener al menos un número.\n";
}
?>
