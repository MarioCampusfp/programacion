DROP DATABASE IF EXISTS CENTRO_DEPORTIVO;
create DATABASE CENTRO_DEPORTIVO;
use CENTRO_DEPORTIVO;


create table cliente(
	id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    edad INT,
    tipo_membresia VARCHAR(20)
);
create table entrenadores(
	id_entrenador INT AUTO_INCREMENT PRIMARY KEY,
    nombre_entrenador VARCHAR(50),
    especialidad VARCHAR(50)
);

drop table if exists actividates;
create table actividades(
	id_actividad INT AUTO_INCREMENT PRIMARY KEY,
    nombre_actividad VARCHAR(50),
    horario VARCHAR(50),
    duracion INT,
    id_entrenador INT,
	FOREIGN KEY (id_entrenador) REFERENCES entrenadores(id_entrenador)
);
drop table if exists inscripciones;
create table inscripciones(
	id_inscripcion INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    id_actividad INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),
    FOREIGN KEY (id_actividad) REFERENCES actividades(id_actividad)
);