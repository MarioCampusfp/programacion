create database recetas;
use recetas;

create table recetas (
	 id_receta INT AUTO_INCREMENT PRIMARY KEY,
     nombre varchar(100),
     ingredientes varchar(1000),
     elaboracion varchar(10000),
     descripcion varchar(1000)
);