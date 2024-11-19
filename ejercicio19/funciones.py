#funciones

import mysql.connector

def conectar(basedatos):# Funcion para conectar a la base de datos
    try:# try para la localizacion de errores
        conexion=mysql.connector.connect( # datos necesarios para acceder a la vase de datos
            host="localhost", # Host al que conectarse
            user="root", # Usuario que usaremos para acceder a la base de datos 
            password="curso", # Contraseña para acceder a la base de datos
            database=basedatos, # base de datos a la que acederemos
        )
        if conexion.is_connected():# If para que salga un mensaje si la conexion con la base de datos a sido exitora
            print(f"conexion a {basedatos} exitosa")
        return conexion # Retorno para que vuelvan al invocar la funcion los datos necesarios para conectarse a la base de datos
    except mysql.connector.Error as err:
        print(f"error al conectar con {basedatos}: {err}") # Mensage en el que te dice el error que ocurre
        return None

def menu_principal(): # Funcion para que apareca un menu en el que te aparecan que tablas puedes gestionar
    print("Menu Principal")
    print("1. Gestión de Clientes")
    print("2. Gestión de Entrenadores")
    print("3. Gestión de Actividad")
    print("4. Gestión de Inscripciones")
    print("5. Salir")
    
def menu_operaciones(): # Funciones para que operaciones se haran en la tabla seleccionada 
    print("Menu Operaciones")
    print("1. Registrar")
    print("2. Ver")
    print("3. Eliminar")
    print("4. Volver")
    
def registrar_cliente(conexion):# Creamos la funcion registrar cliente que nos servira para poder logear a un cliente
    try:# ponemos un try para la localizacion de errores
        cursor=conexion.cursor() # cursor para conectarse a la base de datos
        id=int(input("introduce el id del nuevo cliente: "))
        nombre=input("introduce el nombre del nuevo cliente: ")
        edad=int(input("introduce la edad del nuevo cliente: "))
        membresia=int(input("introduce el tipo de menbresia del nuevo cliente"))
        consulta="""INSERT INTO clientes VALUES(%s,%s,%s,%s)""" # Comando que se ejecutara en la base de datos para la creacion del cliente
        cursor.execute(consulta,(id, nombre, edad, membresia)) # Datos que llevara el comando al ejecutarse
        conexion.commit()
        print(f"el cliente {nombre} se a creado correctamente") # Print de que el cliente se a creado correctamente
        cursor.close()
    except mysql.connector.Error as err:
        print(f"Error al crear cliente: {err}") # Mensage en el que te dice el error que ocurre

def listar_clientes(conexion): # Creamos la funcion para listar clientes
    cursor=conexion.cursor()# Cursor para conectarse a la base de datos
    consulta="""SELECT * FROM cliente;""" # Comando que ejecutaremos para listar los clientes
    cursor.execute(consulta) # Ejecutamos el comando que hemos puesto en consulta
    resultados = cursor.fetchall()
    print("\n--- Clientes ---")
    for fila in resultados:
       print(f"ID: {fila[0]}, Nombre: {fila[1]}")
    cursor.close()

def eliminar_clientes(conexion): # Creamos la funcion para eliminar al los clientes de la tabla
    try:# ponemos un try para la localizacion de errores
        cursor=conexion.cursor() # Cursor para conectar a la base de datos
        id=int(input("Pon el id del cliente que quieres eliminar: "))
        consulta="""DELETE FROM clientes WHERE idcliente = %s"""
        cursor.execute(consulta(id,))
        conexion.commit()
        if cursor.rowcount > 0:
            print(f"El cliente con ID {id} ha sido eliminada.")
        else:
            print(f"No se encontró ningun cliente con ID {id}.")
        cursor.close()
    except mysql.connector.Error as err:
        print(f"Error al eliminar al cliente: {err}")# Mensage en el que te dice el error que ocurre
        
def registrar_entrenador(conexion): # Creamos la funcion para registrar entrenadores
    try: # Ponemos un try para la localizacion de errores
        cursor=conexion.cursor() # cursor para conectar a la base de datos
        id=int(input("Introduce la id de la nueva entrenador: "))
        nombre=input("Escribe el nombre del nuevo entrenador")
        especialidad=input("Introduce la especialidad del nuevo entrenador")
        consulta="""INSERT INTO entrenadores VALUES(%s,%s,%s)""" # Comando que usaremos para que se registre un entrenador en la tabla entrenador
        cursor.execute(consulta(id,nombre,especialidad,)) # Ejecucion de consulta con los datos asignaados
        conexion.comit()
        print(f"el entrenador {nombre} se a registrado correctamente") # Print de que el entrenador se a registrado correctamente
    except mysql.connector.Error as err:
        print(f"Error al registrar el entrenador: {err}") # Mensage en el que te dice el error que ocurre

def listar_entrenadores(conexion): # Creamos la funcion para listar a los entrenadores
    cursor=conexion.cursor()
    consulta="""SELECT * FROM entrenadores""" # Comando que usaremos para listar la tabla entrenadores
    cursor.execute(consulta) # Ejecucion del comando
    resultados= cursor.fetchall()
    print("\n--- Entrenadores ---")
    for fila in resultados:
        print(f"ID: {fila[0]}, Nombre: {fila[1]}, Especialida: {fila[2]}")
    cursor.close()

def eliminar_entrenador(conexion): # Creamos la funcion par eliminar entrenadores 
    try: # Ponemos un try para la localizacion de errores
        cursor=conexion.cursor()# cursor para conectar a la base de datos
        id=int(input("Pon la id del entrenador que desees eliminar: "))
        consulta="""DELETE FROM entrenadores WHERE identrenador = %s""" # Ponemos el comando que ejecutaremos para eliminar al entrenador 
        cursor.execute(consulta,(id,)) # Ejecutamos el comando y sus datos ya establecidos
        if cursor.rowcount > 0:
            print(f"El entrenador con ID {id} ha sido eliminada.")
        else:
            print(f"No se encontró ningun entrenador con ID {id}.")
        cursor.close()
    except mysql.connector.Error as err:
        print(f"Error al eliminar al entrenador: {err}")# Mensage en el que te dice el error que ocurre
        
def crear_actividades(conexion): # Creamos la funcion para crear actividades
    try: # Ponemos un try para localizar errores
        cursor=conexion.cursor() # cursor para conectar a la base de datos
        id=int(input("Introduce el id de la actividad: "))
        nombre=input("introduce es nombre de la actividad: ")
        horario=input("introduce el horario del la actividad: ")
        duracion=input("introduce la duracion de la actividad: ")
        identrenador=int(input("introduce la ip de in entrenador: "))
        cursor.execute("SELECT COUNT(*) FROM pedido WHERE identrenador = %s", (identrenador,)) # Ejecutamos el sigliente comando para comprobar que exixiste algun entrenador con el id puesto
        if cursor.fetchone()[0] == 0:  # Si no hay un entrenador con ese ID, muestra un error
            print(f"No existe un entrenador con ID {identrenador}.")
            return
    except mysql.connector.Error as err:
        print(f"Error al crear la actividad: {err}") # Mensage en el que te dice el error que ocurre