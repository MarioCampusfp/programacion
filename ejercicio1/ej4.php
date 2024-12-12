<?php

$ramdon=rand(1,100);
$numero=0;
echo $ramdon;
do {
    $numero=readline("introduce el numero: ");
    if($numero == $ramdon) {
        echo"correpto lo as adivinado";
        break;
    } else {
        echo "vuelvelo a intentar";
    }
} while ($ramdon != $numero);
?>
