import mysql.connector

def conexion(database):
    conexion = mysql.connector.connect(
    host="localhost",       # Dirección del servidor (localhost para base de datos local)
    user="root",         # Usuario de la base de datos
    password="curso",  # Contraseña del usuario
    database=database
    )
    return conexion
    
def menu_principal(): # creamos la funcion menu princimal 
    print("1.comprar")
    print("2.seguimiento de compra")
    print("3.visualizacion de cliente")
    print("4.salir")
    opcion=int(input("introduce la opcion del nenu: "))

def menu_visilizacion_usuarios(): # creamos la funcion de menu para visualizar los usuarios
    print("1.buscar cliente")
    print("2.listar clientes")

def cracion_cuenta(conexion): # funcion para la creacion de usuarios
    cursor=conexion.cursor()
    nombre=input("introduce el nombre de tu cuenta: ")
    contraseña=input(f"introduce la contrraseña para {nombre}: ")
    edad=input("introduce tu edad: ")
    consulta="""insert into usuarios values(%s,%s,%s);"""
    cursor.execute(consulta(nombre, contraseña,edad))
    conexion.comit()
    print(f"creacion del usuario {nombre} completada correctamente")
    cursor.close()

def compra(conexion): # creamos la funcion para todo lo de compra
    cursor=conexion.cursor()
    