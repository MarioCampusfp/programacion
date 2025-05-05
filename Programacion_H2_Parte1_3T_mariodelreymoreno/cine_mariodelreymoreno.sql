create database cine_mariodelreymoreno;
USE cine_mariodelreymoreno;

CREATE TABLE categoria(
	id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nombre_categoria varchar(50)
);
create table peliculas(
	id_peliculas INT PRIMARY KEY,
    nombre_peliculas varchar(100),
    edad_recomentada int,
    sala int,
    duracion varchar(50),
    id_categoria int,
    foreign key (id_categoria) references categoria(id_categoria)
);
select* From categoria
INSERT INTO categoria (nombre_categoria) 
VALUES 
('Accion'),
('Comedia'),
('Drama'),
('Terror'),
('Ciencia Ficcion');

INSERT INTO peliculas (id_peliculas, nombre_peliculas, edad_recomentada, sala, duracion, id_categoria) 
VALUES 
(16, 'Thunderbolts', 13, 1, '2h 30m', 5),
(17, 'El Casoplón', 7, 2, '1h 45m', 2),
(18, 'Tierra de Nadie', 18, 3, '2h 10m', 1),
(19, 'Los Tres Mosqueteros: D\'Artagnan', 12, 4, '2h 20m', 1),
(20, 'Daniela Forever', 16, 5, '2h 5m', 5),
(21, 'Estocolmo 1520. El Rey Tirano', 18, 1, '2h 30m', 1),
(22, 'Lo Que Queda de Ti', 13, 2, '1h 45m', 3),
(23, 'La Buena Letra', 15, 3, '2h 0m', 3),
(24, 'Blancanieves (2025)', 7, 4, '1h 40m', 2),
(25, 'Novocaine', 16, 5, '1h 50m', 4),
(26, 'The Alto Knights', 13, 1, '2h 20m', 5),
(27, 'Los Aitas', 7, 2, '1h 50m', 2),
(28, 'Misericordia', 18, 3, '2h 10m', 4),
(29, '8', 15, 4, '2h 15m', 3),
(30, 'La Chica de la Aguja', 16, 5, '1h 45m', 4),
(31, 'Wilding, El Regreso de la Naturaleza', 7, 1, '1h 40m', 2),
(32, 'Un Año y Un Día', 12, 2, '1h 50m', 3);