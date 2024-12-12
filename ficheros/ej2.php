<?php
error_reporting(0);

$archivo=fopen("archivo.txt","r");
$palabra="hola";
$contador=0;

if($archivo){
    while(!feof($archivo)){
        $linea = fgets($archivo); 
        $contador+= substr_count(strtolower($linea), strtolower($palabra));
    }
    fclose($archivo);

}
echo $contador

?>