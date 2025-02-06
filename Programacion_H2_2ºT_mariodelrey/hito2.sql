create database hito2;
use hito2;

create table usuarios(
	id_usuario int AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(100) NOT NULL,
    correo varchar(100) NOT NULL,
    pass varchar (100) NOT NULL
);

create table tareas(
	id_tarea int auto_increment primary key,
    nombre varchar(100),
    descripcion varchar(1000),
    estado enum("completada","pendiente"),
    id_usuario int,
    foreign key(id_usuario) references usuarios(id_usuario)
);
