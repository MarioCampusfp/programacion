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
    print("menu principal")
    print("1. categorias")
    print("2. productos")
    print("3. salir")
    
def menu_operaciones():
    print("menu de opciones:")
    print("1. crear")
    print("2. leer")
    print("3. actualizar")
    print("4. eliminar")
    print("5. volver al menu principal")
    
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

def crear_producto(conexion):
    cursor = conexion.cursor()
    idproducto = int(input("Introduce el ID del nuevo producto: "))
    nombre = input("Introduce el nombre del nuevo producto: ")
    precio = float(input("Introduce el precio del producto: "))
    idcategoria = int(input("Introduce el ID de la categoría del producto: "))
    consulta = """INSERT INTO producto (idproducto, nombre, precio, idcategoria) VALUES (%s, %s, %s, %s)"""
    cursor.execute(consulta, (idproducto, nombre, precio, idcategoria))
    conexion.commit()
    print(f"Producto {nombre} creado con éxito.")
    cursor.close()

def leer_producto(conexion):
    cursor = conexion.cursor()
    consulta = """SELECT * FROM producto"""
    cursor.execute(consulta)
    resultados = cursor.fetchall()
    print("\n--- Productos ---")
    for fila in resultados:
        print(f"ID: {fila[0]}, Nombre: {fila[1]}, Precio: {fila[2]}, Categoría ID: {fila[3]}")
    cursor.close()

def actualizar_producto(conexion):
    cursor = conexion.cursor()
    idproducto = int(input("Introduce el ID del producto a actualizar: "))
    nuevo_nombre = input("Introduce el nuevo nombre del producto: ")
    nuevo_precio = float(input("Introduce el nuevo precio del producto: "))
    consulta = """UPDATE producto SET nombre = %s, precio = %s WHERE idproducto = %s"""
    cursor.execute(consulta, (nuevo_nombre, nuevo_precio, idproducto))
    conexion.commit()
    print(f"Producto con ID {idproducto} actualizado.")
    cursor.close()

def eliminar_producto(conexion):
    cursor = conexion.cursor()
    idproducto = int(input("Introduce el ID del producto a eliminar: "))
    consulta = """DELETE FROM producto WHERE idproducto = %s"""
    cursor.execute(consulta, (idproducto,))
    conexion.commit()
    print(f"Producto con ID {idproducto} eliminado.")
    cursor.close()