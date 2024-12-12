<?php
error_reporting(0);

$nombres=["Mario","Dani","Martin","Ismael","Rolan"];
$apellidos=["del Rey,","Tagabuerta","Martin","Paguelo","Moreno"];

$random_nombre=rand(0, count($nombres)-1);
$random_apellido=rand(0, count($apellidos)-1);

$completo=$nombres[$random_nombre]." ".$apellidos[$random_apellido];

echo"el nombre completo es ". $completo;

?>