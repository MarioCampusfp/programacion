import mysql.connector

def conectar(basedatos, tabla):
    conexion = mysql.connector.connect(
    host="localhost",       # Dirección del servidor (localhost para base de datos local)
    user="root",         # Usuario de la base de datos
    password="curso",  # Contraseña del usuario
    database=basedatos,  # Nombre de la base de datos
    table=tabla
)   
    return conexion

def menu():
    print("menu de opciones:")
    print("1. crear nueva categorias")
    print("2 leer categoria")
    print("3 actualizar tabla")
    print("4 eliminar una categoria")
    print("5 salir")
    
def crear_categoria(conexion):
    cursor=conexion.cursor()
    id=input("introduce el id de la nueva categoria: ")
    nombre=input("introduce el nombre de la nueva categoria: ")
    consulta="""INSERT INTO categorias VALUES(%s,%s);"""
    cursor.execute(consulta,(id, nombre))
    conexion.commit()
    print(f"la categoria {nombre} se a creado correctamente")
    cursor.close()
    conexion.close()

def leer_categoria(conexion):
    cursor=conexion.cursor()
    consulta="""SELECT * FROM supermercado.categoria;"""
    cursor.execute(consulta)
    conexion.commit()
    print()
    cursor.close()
    conexion.close()
    
    