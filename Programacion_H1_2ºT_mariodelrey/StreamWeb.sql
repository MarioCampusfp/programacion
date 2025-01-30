CREATE DATABASE StreamWeb;
USE StreamWeb;

CREATE TABLE stream_plan(
    id_plan INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio_mensual DECIMAL(10,2),
    precio_anual DECIMAL(10,2)
);

CREATE TABLE stream_pack(
    id_pack INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio_mensual DECIMAL(10,2),
    precio_anual DECIMAL(10,2)
);

CREATE TABLE usuarios(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    edad INT,
    id_plan INT,
    duracion ENUM("mensual","anual") NOT NULL,
    FOREIGN KEY (id_plan) REFERENCES stream_plan(id_plan)
);

CREATE TABLE usuario_pack(
    id_usuario INT,
    id_pack INT,
    PRIMARY KEY (id_usuario, id_pack),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_pack) REFERENCES stream_pack(id_pack) ON DELETE CASCADE
);

INSERT INTO stream_plan (nombre, precio_mensual, precio_anual) VALUES
("plan basico(1 dispositivo)", 9.99, 119.88),
("plan entandar(2 dispositivos)", 13.99, 167.88),
("plan premiun(4 dispositivos)", 17.99, 215.88);

INSERT INTO stream_pack (nombre, precio_mensual, precio_anual) VALUES
("deporte", 6.99, 83.88),
("cine", 7.99, 95.88),
("infantil", 4.99, 59.88);

INSERT INTO usuarios (nombre, correo, edad, id_plan, duracion) 
VALUES 
("Juan Pérez", "juan.perez@mail.com", 16, 1, 'mensual'),  -- Juan Pérez con plan básico
("Ana Gómez", "ana.gomez@mail.com", 25, 2, 'anual'),      -- Ana Gómez con plan estándar
("Carlos Ramírez", "carlos.ramirez@mail.com", 30, 3, 'mensual');  -- Carlos Ramírez con plan premium

INSERT INTO usuario_pack (id_usuario, id_pack) VALUES 
(1, 3),   -- Juan Pérez con pack infantil
(2, 1),    -- Ana Gómez con pack deporte
(2, 2),    -- Ana Gómez con pack cine
(3, 2),    -- Carlos Ramírez con pack cine
(3, 1);    -- Carlos Ramírez con pack deporte