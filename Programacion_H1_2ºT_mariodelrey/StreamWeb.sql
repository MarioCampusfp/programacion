CREATE DATABASE StreamWeb;
USE StreamWeb;

-- Crear la tabla de planes
CREATE TABLE plan(
    id_plan INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio_mensual FLOAT(10,2),
    precio_anual FLOAT(10,2)
);

-- Crear la tabla de packs
CREATE TABLE pack(
    id_pack INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio_mensual FLOAT(10,2),
    precio_anual FLOAT(10,2)
);

-- Crear la tabla de usuarios, usando id_plan como clave foránea
CREATE TABLE usuarios(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    edad INT,
    id_plan INT,
    duracion ENUM('mensual', 'anual') NOT NULL,
    FOREIGN KEY (id_plan) REFERENCES plan(id_plan)
);

-- Crear la tabla intermedia para la relación muchos a muchos entre usuarios y packs
CREATE TABLE usuario_pack(
    id_usuario INT,
    pack_nombre VARCHAR(100),
    PRIMARY KEY (id_usuario, pack_nombre),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (pack_nombre) REFERENCES pack(nombre) ON DELETE CASCADE
);

-- Insertar planes
INSERT INTO plan (nombre, precio_mensual, precio_anual) VALUES
("plan basico(1 dispositivo)", 9.99, 119.88),
("plan estandar(2 dispositivos)", 13.99, 167.88),
("plan premium(4 dispositivos)", 17.99, 215.88);

-- Insertar packs
INSERT INTO pack (nombre, precio_mensual, precio_anual) VALUES
("deporte", 6.99, 83.88),
("cine", 7.99, 95.88),
("infantil", 4.99, 59.88);

-- Insertar usuarios, usando id_plan en lugar de plan_nombre
INSERT INTO usuarios (nombre, correo, edad, id_plan, duracion) 
VALUES 
("Juan Pérez", "juan.perez@mail.com", 16, 1, 'mensual'),  
("Ana Gómez", "ana.gomez@mail.com", 25, 2, 'anual'),  
("Carlos Ramírez", "carlos.ramirez@mail.com", 30, 3, 'mensual');

-- Asignar packs a los usuarios en la tabla intermedia
INSERT INTO usuario_pack (id_usuario, pack_nombre) VALUES 
(1, "infantil"),   -- Juan Pérez con pack infantil
(2, "deporte"),    -- Ana Gómez con pack deporte
(2, "cine"),       -- Ana Gómez con pack cine
(3, "cine"),       -- Carlos Ramírez con pack cine
(3, "deporte");    -- Carlos Ramírez con pack deporte
