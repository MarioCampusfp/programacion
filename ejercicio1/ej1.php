<?php
$numero1=readline("intoduce un numero: ");
$numero2=readline("introduce un numero: ");
$operacion=readline("ingrese la operacion que quieres hacer(suma, resta, multiplicacion, division): ");
if( $operacion== "suma")
    echo"el resultado de la operacion es ", $numero1+$numero2;
else if( $operacion== "resta")
    echo "el resultado de la operacion es ", $numero1-$numero2;
else if( $operacion== "multiplicacion")
    echo "el resultado de la operacion es ", $numero1*$numero2;
else if( $operacion== "division")
    echo "el resultado de la operacion es ", $numero1/$numero2;
?>