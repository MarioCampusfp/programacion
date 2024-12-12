<?php
error_reporting(E_ALL);

$contraseña=readline("introduca una contraseña que tenga al menos 8 caracteres, una mayuscula, una minuscla y un numero: ");

$longitud='/^.{8,}$/';
$mayuscula='/[A-Z]/'; 
$minuscula='/[a-z]/';
$numero='/[0-9]/'; 

if(preg_match($longitud, $contraseña)&&preg_match($mayuscula,$contraseña)&&preg_match($minuscula,$contraseña)){
    echo"contraseña valida bienvenido";
} else{
    echo "La contraseña no es válida. Debe cumplir con los siguientes criterios:\n";
    echo "- Al menos 8 caracteres.\n";
    echo "- Contener al menos una letra mayúscula.\n";
    echo "- Contener al menos una letra minúscula.\n";
    echo "- Contener al menos un número.\n";
}

?>