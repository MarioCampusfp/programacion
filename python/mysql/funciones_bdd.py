import mysql.connector

def conectar(basedatos):
    conexion = mysql.connector.connect(
    host="localhost",       # Dirección del servidor (localhost para base de datos local)
    user="root",         # Usuario de la base de datos
    password="curso",  # Contraseña del usuario
    database=basedatos    # Nombre de la base de datos
)   
    return conexion