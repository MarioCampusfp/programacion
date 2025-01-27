create database StreamWeb;
use StreamWeb; 

create table plan(
	id_plan INT AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(100) not null,
	precio_mensual float(10,2),
    precio_anual float(10,2)
);
create table pack(
	id_pack INT AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(100) not null,
    precio_mensual float(10,2),
    precio_anual float(10,2)
);
create table usuarios(
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    edad int,
    plan int,
    pack int,
    duracion enum("mensual","anual") not null,
    FOREIGN KEY (plan) REFERENCES plan(id_plan),
    FOREIGN KEY (pack) REFERENCES pack(id_pack)
);

INSERT INTO plan (nombre, precio_mensual, precio_anual) VALUES
("plan basico(1 dispositivo)", "9.99","119.88"),
("plan entandar(2 dispositivos)","13.99","167.88"),
("plan premiun(4 dispositivos)","17.99","215.88");

insert into pack (nombre, precio_mensual, precio_anual) values
("deporte", "6.99", "83.88"),
("cine", "7.99","95.88"),
("infantil","4.99","59.88");

INSERT INTO usuarios (nombre, correo, edad, plan, pack, duracion) 
VALUES 
("Juan Pérez", "juan.perez@mail.com", 16, 1, 3, 'mensual');  -- El pack infantil para menores de 18

INSERT INTO usuarios (nombre, correo, edad, plan, pack, duracion) 
VALUES 
("Ana Gómez", "ana.gomez@mail.com", 25, 2, 1, 'anual');  -- Pack Deporte con suscripción anual

INSERT INTO usuarios (nombre, correo, edad, plan, pack, duracion) 
VALUES 
("Carlos Ramírez", "carlos.ramirez@mail.com", 30, 3, 2, 'mensual');  -- Pack Cine con suscripción mensual
