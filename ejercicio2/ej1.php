<?php
error_reporting(E_ALL);
$palabra=readline("introduce una palabra: ");
$contador=0;
for($i=0; $i < strlen($palabra); $i++){
    if ($palabras[$i] == " "){
        $contador= $contador+1;
    }
}
echo "hay ",$contador," espacios";
?>