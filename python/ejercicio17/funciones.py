import mysql.connector

def conectar(basedatos):
    try:
        conexion = mysql.connector.connect(
        host="localhost",       # Dirección del servidor (localhost para base de datos local)
        user="root",         # Usuario de la base de datos
        password="curso",  # Contraseña del usuario
        database=basedatos,  # Nombre de la base de datos
        )
        if conexion.is_connected():
            print(f"conexion a {basedatos} exitosa")
        return conexion
    except mysql.connector.Error as err:
        print(f"error al conectar con {basedatos}: {err}")
        return None

def menu_principal():
    print("menu tablas")
    print("1.categoria")
    print("2.clientes")
    print("3.salir")
    

def menu_operaciones():
    print("menu de opciones:")
    print("1. crear")
    print("2 leer")
    print("3 actualizar tabla")
    print("4 eliminar")
    print("5 atras")
    
def crear_categoria(conexion):
    try:
        cursor=conexion.cursor()
        id=int(input("introduce el id de la nueva categoria: "))
        nombre=input("introduce el nombre de la nueva categoria: ")
        consulta="""INSERT INTO categoria VALUES(%s,%s);"""
        cursor.execute(consulta,(id, nombre))
        conexion.commit()
        print(f"la categoria {nombre} se a creado correctamente")
        cursor.close()
    except mysql.connector.Error as err:
        print(f"Error al crear categoría: {err}")

def leer_categoria(conexion):
    cursor=conexion.cursor()
    consulta="""SELECT * FROM categoria;"""
    cursor.execute(consulta)
    resultados = cursor.fetchall()
    print("\n--- Categorías ---")
    for fila in resultados:
        print(f"ID: {fila[0]}, Nombre: {fila[1]}")
    cursor.close()
    
def actualizar_categoria(conexion):
    try:
        cursor = conexion.cursor()
        idcategoria = input("Introduce el ID de la categoría a actualizar: ")
        nombre = input("Introduce el nuevo nombre de la categoría: ")
        idcategoria = int(idcategoria)
        consulta = """UPDATE categoria SET categoria = %s WHERE idcategoria = %s"""
        cursor.execute(consulta, (nombre, idcategoria))
        conexion.commit()
        print(f"La categoría con ID {idcategoria} ha sido actualizada a {nombre}.")
        cursor.close()
    except mysql.connector.Error as err:
        print(f"Error al actualizar categoría: {err}")
    except ValueError:
        print("El ID debe ser un número entero.")


def eliminar_categoria(conexion):
    try:
        cursor = conexion.cursor()
        idcategoria = input("Introduce el ID de la categoría a eliminar: ")
        idcategoria = int(idcategoria)
        consulta = """DELETE FROM categoria WHERE idcategoria = %s"""
        cursor.execute(consulta, (idcategoria,))
        conexion.commit()
        if cursor.rowcount > 0:
            print(f"La categoría con ID {idcategoria} ha sido eliminada.")
        else:
            print(f"No se encontró ninguna categoría con ID {idcategoria}.")
        cursor.close()
    except mysql.connector.Error as err:
        print(f"Error al eliminar categoría: {err}")
    except ValueError:
        print("El ID debe ser un número entero.")

def crear_cliente(conexion):
    cursor = conexion.cursor()
    idcliente = input("Introduce el ID del cliente (máximo 5 caracteres): ")
    cia = input("Introduce el nombre de la compañía: ")
    contacto = input("Introduce el nombre del contacto: ")
    cargo = input("Introduce el cargo del contacto: ")
    direccion = input("Introduce la dirección: ")
    ciudad = input("Introduce la ciudad: ")
    region = input("Introduce la región: ")
    cp = input("Introduce el código postal: ")
    pais = input("Introduce el país: ")
    tlf = input("Introduce el teléfono: ")
    fax = input("Introduce el fax: ")
    consulta = """INSERT INTO cliente (idcliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax)VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"""
    cursor.execute(consulta, (idcliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax))
    conexion.commit()
    print(f"Cliente '{cia}' creado con éxito.")
    cursor.close()

def leer_cliente(conexion):
    cursor = conexion.cursor()
    consulta = "SELECT * FROM cliente"
    cursor.execute(consulta)
    resultados = cursor.fetchall()
    print("\n--- Clientes ---")
    for fila in resultados:
        print(f"ID: {fila[0]}, Compañía: {fila[1]}, Contacto: {fila[2]}, Cargo: {fila[3]}")
    cursor.close()

def actualizar_cliente(conexion):
    cursor = conexion.cursor()
    idcliente = input("Introduce el ID del cliente a actualizar: ")
    nuevo_contacto = input("Introduce el nuevo nombre del contacto: ")
    nueva_cia = input("Introduce el nuevo nombre de la compañía: ")
    consulta = "UPDATE cliente SET contacto = %s, cia = %s WHERE idcliente = %s"
    cursor.execute(consulta, (nuevo_contacto, nueva_cia, idcliente))
    conexion.commit()
    print(f"Cliente con ID {idcliente} actualizado.")
    cursor.close()

def eliminar_cliente(conexion):
    cursor = conexion.cursor()
    idcliente = input("Introduce el ID del cliente a eliminar: ")
    consulta = "DELETE FROM cliente WHERE idcliente = %s"
    cursor.execute(consulta, (idcliente,))
    conexion.commit()
    print(f"Cliente con ID {idcliente} eliminado.")
    cursor.close()
