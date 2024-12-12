<?php

$numero=readline("ingresa un numero: ");
if ($numero<=1){
    echo "el numero", $numero, "no es primo";
}
else{
    $primo=true;
    for ($i= 2; $i < $numero; $i++) {
        if($numero % $i == 0){
            $primo=false;
            break;
        }
    }
    echo $primo ? "el numero $numero es primo.": "el numero $numero no es primo.";
}

?>
