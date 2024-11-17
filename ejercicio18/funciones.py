#finciones

import mysql.connector
# Esta función sirve para conectarnos a la base de datos.
def conectar(basedatos):
    try:
        # Aquí se establece la conexión a la base de datos con los parámetros: host, usuario, contraseña y base de datos.
        conexion = mysql.connector.connect(
            host="localhost",  # Dirección del servidor donde está la base de datos (en este caso está en la misma computadora)
            user="root",       # Nombre de usuario para conectarse a la base de datos
            password="curso",  # Contraseña del usuario para conectarse
            database=basedatos,  # El nombre de la base de datos a la que nos queremos conectar
        )
        # Si la conexión es exitosa, imprime un mensaje de confirmación
        if conexion.is_connected():
            print(f"Conexión a {basedatos} exitosa")
        return conexion
    except mysql.connector.Error as err:
        # Si ocurre un error, se captura y se imprime el mensaje de error
        print(f"Error al conectar con {basedatos}: {err}")
        return None  # Si no se pudo conectar, la función devuelve None

# Esta función muestra el menú principal donde el usuario puede elegir con qué tabla trabajar.
def menu_principal():
    print("Menú Tablas:")  # Imprime un mensaje indicando que estamos en el menú de tablas.
    print("1. Categorías")  # Opción 1: Gestión de categorías
    print("2. Detalle")  # Opción 2: Gestión de detalles de pedidos
    print("3. Pedidos")  # Opción 3: Gestión de pedidos
    print("4. Clientes")  # Opción 4: Gestión de clientes
    print("5. Producto")  # Opción 5: Gestión de productos
    print("6. Salir")  # Opción 6: Para salir del programa

# Esta función muestra el menú de operaciones que podemos hacer con las tablas, como crear, listar, actualizar o borrar.
def menu_operacion():
    print("Menú de Operaciones:")  # Indica que estamos en el menú de operaciones.
    print("1. Crear")  # Opción para crear un nuevo registro (por ejemplo, una nueva categoría o cliente)
    print("2. Listar")  # Opción para listar todos los registros de una tabla
    print("3. Actualizar")  # Opción para modificar un registro existente
    print("4. Borrar")  # Opción para eliminar un registro
    print("5. Salir")  # Opción para salir de este menú de operaciones

    
# Esta función se usa para crear una nueva categoría en la base de datos
def crear_categoria(conexion):
    try:
        # Crea un cursor para ejecutar la consulta SQL
        cursor = conexion.cursor()
        
        # Pide al usuario que ingrese el ID y el nombre de la nueva categoría
        id = int(input("Introduce el ID de la nueva categoría: "))  # Convierte la entrada a un número entero
        nombre = input("Introduce el nombre de la nueva categoría: ")  # El nombre es una cadena de texto
        
        # Prepara la consulta SQL para insertar los datos en la tabla 'categoria'
        consulta = """INSERT INTO categoria VALUES(%s,%s)"""
        cursor.execute(consulta, (id, nombre))  # Ejecuta la consulta, insertando los valores proporcionados
        
        # Realiza los cambios en la base de datos
        conexion.commit()
        
        # Muestra un mensaje si todo fue bien
        print(f"La categoría {nombre} se ha creado correctamente")
        
        # Cierra el cursor después de la operación
        cursor.close()
    except mysql.connector.Error as err:
        # Si ocurre un error, lo muestra
        print(f"Error al crear categoría: {err}")

# Esta función se usa para leer (listar) todas las categorías de la base de datos
def leer_categoria(conexion):
    cursor = conexion.cursor()
    
    # Prepara y ejecuta la consulta SQL para seleccionar todas las categorías
    consulta = """SELECT * FROM categoria;"""
    cursor.execute(consulta)
    
    # Obtiene todos los resultados de la consulta
    resultados = cursor.fetchall()
    
    # Muestra los resultados de las categorías
    print("\n--- Categorías ---")
    for fila in resultados:
        # Imprime el ID y el nombre de cada categoría
        print(f"ID: {fila[0]}, Nombre: {fila[1]}")
    
    # Cierra el cursor después de mostrar los resultados
    cursor.close()

# Esta función se usa para actualizar el nombre de una categoría existente
def actualizar_categoria(conexion):
    try:
        cursor = conexion.cursor()
        
        # Pide al usuario el ID de la categoría a actualizar
        idcategoria = input("Introduce el ID de la categoría a actualizar: ")
        # Pide al usuario el nuevo nombre para la categoría
        nombre = input("Introduce el nuevo nombre de la categoría: ")
        
        idcategoria = int(idcategoria)  # Convierte el ID a un número entero
        
        # Prepara la consulta SQL para actualizar el nombre de la categoría en la base de datos
        consulta = """UPDATE categoria SET categoria = %s WHERE idcategoria = %s"""
        cursor.execute(consulta, (nombre, idcategoria))  # Ejecuta la consulta con los nuevos valores
        
        # Realiza los cambios en la base de datos
        conexion.commit()
        
        # Muestra un mensaje indicando que la categoría fue actualizada
        print(f"La categoría con ID {idcategoria} ha sido actualizada a {nombre}.")
        
        # Cierra el cursor después de la operación
        cursor.close()
    except mysql.connector.Error as err:
        # Si ocurre un error en la base de datos, lo muestra
        print(f"Error al actualizar categoría: {err}")
    except ValueError:
        # Si el ID no es un número entero, muestra un mensaje de error
        print("El ID debe ser un número entero.")

# Esta función se usa para eliminar una categoría de la base de datos
def eliminar_categoria(conexion):
    try:
        cursor = conexion.cursor()
        
        # Pide al usuario el ID de la categoría a eliminar
        idcategoria = input("Introduce el ID de la categoría a eliminar:")
        idcategoria = int(idcategoria)  # Convierte el ID a un número entero
        
        # Prepara la consulta SQL para eliminar la categoría con el ID proporcionado
        consulta = """DELETE FROM categoria WHERE idcategoria = %s"""
        cursor.execute(consulta, (idcategoria,))
        
        # Realiza los cambios en la base de datos
        conexion.commit()
        
        # Verifica si la categoría fue eliminada y muestra el mensaje adecuado
        if cursor.rowcount > 0:
            print(f"La categoría con ID {idcategoria} ha sido eliminada.")
        else:
            print(f"No se encontró ninguna categoría con ID {idcategoria}.")
        
        # Cierra el cursor después de la operación
        cursor.close()
    except mysql.connector.Error as err:
        # Si ocurre un error, lo muestra
        print(f"Error al eliminar categoría: {err}")
    except ValueError:
        # Si el ID no es un número entero, muestra un mensaje de error
        print("El ID debe ser un número entero.")

# Esta función se usa para crear un nuevo detalle de pedido en la base de datos
def crear_detalle(conexion):
    try:
        # Se obtiene un cursor para ejecutar la consulta SQL
        cursor = conexion.cursor()
        
        # El usuario ingresa datos para crear el detalle
        idpedido = int(input("Introduce la id del pedido: "))  # Convierte la id del pedido a un entero
        idproducto = int(input("Introduce la id del producto: "))  # Convierte la id del producto a un entero
        precio = float(input("Introduce el precio: "))  # Convierte el precio a un número decimal
        unidades = int(input("Introduce el número de unidades: "))  # Convierte las unidades a un entero
        descuento = float(input("Introduce el descuento: "))  # Convierte el descuento a un número decimal
        
        # Verifica si el pedido con ese ID existe en la base de datos
        cursor.execute("SELECT COUNT(*) FROM pedido WHERE idpedido = %s", (idpedido,))
        if cursor.fetchone()[0] == 0:  # Si no hay un pedido con ese ID, muestra un error
            print(f"No existe un pedido con ID {idpedido}.")
            return
        
        # Verifica si el producto con ese ID existe en la base de datos
        cursor.execute("SELECT COUNT(*) FROM producto WHERE idproducto = %s", (idproducto,))
        if cursor.fetchone()[0] == 0:  # Si no hay un producto con ese ID, muestra un error
            print(f"No existe un producto con ID {idproducto}.")
            return
        
        # Si los IDs son correctos, se prepara la consulta SQL para insertar el detalle del pedido
        consulta = """INSERT INTO detalle VALUES(%s,%s,%s,%s,%s)"""
        cursor.execute(consulta, (idpedido, idproducto, precio, unidades, descuento))  # Ejecuta la consulta
        
        # Realiza los cambios en la base de datos
        conexion.commit()
        
        # Muestra un mensaje confirmando que el detalle fue creado correctamente
        print(f"Los detalles de {idpedido} y {idproducto} se han creado correctamente")
        
        # Cierra el cursor después de la operación
        cursor.close()
    except mysql.connector.Error as err:
        # Si ocurre un error con la base de datos, muestra el mensaje de error
        print(f"Error al crear detalle: {err}")

# Esta función se usa para leer (listar) todos los detalles de pedidos de la base de datos
def leer_detalle(conexion):
    cursor = conexion.cursor()
    
    # Prepara y ejecuta la consulta SQL para obtener todos los detalles de la tabla 'detalle'
    consulta = """SELECT * FROM detalle;"""
    cursor.execute(consulta)
    
    # Obtiene todos los resultados de la consulta
    resultados = cursor.fetchall()
    
    # Muestra los resultados de los detalles
    print("\n--- Detalles ---")
    for fila in resultados:
        # Muestra el detalle de cada pedido con su ID de pedido, ID de producto, precio, unidades y descuento
        print(f"idpedido: {fila[0]}, idproducto: {fila[1]}, precio: {fila[2]}, unidades: {fila[3]}, descuento: {fila[4]}")
    
    # Cierra el cursor después de mostrar los resultados
    cursor.close()

# Esta función se usa para actualizar los detalles de un pedido en la base de datos
def actualizar_detalle(conexion):
    try:
        cursor = conexion.cursor()
        
        # El usuario ingresa los datos del detalle a actualizar
        idpedido = int(input("Introduce la id del pedido: "))  # Convierte la id del pedido a un entero
        idproducto = int(input("Introduce la id del producto: "))  # Convierte la id del producto a un entero
        precio = float(input("Introduce el precio: "))  # Convierte el precio a un número decimal
        unidades = int(input("Introduce el número de unidades: "))  # Convierte las unidades a un entero
        descuento = float(input("Introduce el descuento: "))  # Convierte el descuento a un número decimal
        
        # Verifica si el pedido con ese ID existe en la base de datos
        cursor.execute("SELECT COUNT(*) FROM pedido WHERE idpedido = %s", (idpedido,))
        if cursor.fetchone()[0] == 0:  # Si no existe el pedido, muestra un error
            print(f"No existe un pedido con ID {idpedido}.")
            return
        
        # Verifica si el producto con ese ID existe en la base de datos
        cursor.execute("SELECT COUNT(*) FROM producto WHERE idproducto = %s", (idproducto,))
        if cursor.fetchone()[0] == 0:  # Si no existe el producto, muestra un error
            print(f"No existe un producto con ID {idproducto}.")
            return
        
        # Prepara la consulta SQL para actualizar los detalles del pedido
        consulta = """UPDATE detalle SET precio = %s, unidades = %s, descuento = %s WHERE idpedido = %s AND idproducto = %s"""
        cursor.execute(consulta, (precio, unidades, descuento, idpedido, idproducto))  # Ejecuta la consulta
        
        # Realiza los cambios en la base de datos
        conexion.commit()
        
        # Muestra un mensaje confirmando que el detalle fue actualizado
        print(f"El detalle con ID Pedido {idpedido} y Producto {idproducto} ha sido actualizado.")
        
        # Cierra el cursor después de la operación
        cursor.close()
    except mysql.connector.Error as err:
        # Si ocurre un error con la base de datos, muestra el mensaje de error
        print(f"Error al actualizar detalle: {err}")
    except ValueError:
        # Si el ID no es un número entero, muestra un mensaje de error
        print("El ID debe ser un número entero.")

# Esta función se usa para eliminar un detalle de pedido de la base de datos
def eliminar_detalles(conexion):
    try:
        cursor = conexion.cursor()
        
        # El usuario ingresa los datos del detalle que quiere eliminar
        idpedido = int(input("Introduce la id del pedido: "))  # Convierte la id del pedido a un entero
        idproducto = int(input("Introduce la id del producto: "))  # Convierte la id del producto a un entero
        
        # Verifica si el pedido con ese ID existe en la base de datos
        cursor.execute("SELECT COUNT(*) FROM pedido WHERE idpedido = %s", (idpedido,))
        if cursor.fetchone()[0] == 0:  # Si no existe el pedido, muestra un error
            print(f"No existe un pedido con ID {idpedido}.")
            return
        
        # Verifica si el producto con ese ID existe en la base de datos
        cursor.execute("SELECT COUNT(*) FROM producto WHERE idproducto = %s", (idproducto,))
        if cursor.fetchone()[0] == 0:  # Si no existe el producto, muestra un error
            print(f"No existe un producto con ID {idproducto}.")
            return
        
        # Prepara la consulta SQL para eliminar el detalle de la tabla 'detalle'
        consulta = """DELETE FROM detalle WHERE idpedido = %s and idproducto = %s"""
        cursor.execute(consulta, (idpedido, idproducto))  # Ejecuta la consulta
        
        # Realiza los cambios en la base de datos
        conexion.commit()
        
        # Muestra un mensaje confirmando que el detalle fue eliminado
        print(f"El detalle con idpedido {idpedido} y idproducto {idproducto} ha sido eliminado.")
        
        # Cierra el cursor después de la operación
        cursor.close()
    except mysql.connector.Error as err:
        # Si ocurre un error con la base de datos, muestra el mensaje de error
        print(f"Error al eliminar detalle: {err}")
    except ValueError:
        # Si el ID no es un número entero, muestra un mensaje de error
        print("El ID debe ser un número entero.")
        
# Esta función permite crear un nuevo pedido en la base de datos.
def crear_pedidos(conexion):
    try:
        # Se obtiene un cursor para ejecutar la consulta SQL
        cursor = conexion.cursor()
        
        # El usuario ingresa los datos del nuevo pedido
        id = int(input("Introduce el id del nuevo pedido: "))  # Convierte el ID del pedido a entero
        idcliente = input("Introduce el id del cliente: ")  # El ID del cliente
        fechapedido = input("Introduce la fecha de inicio del pedido: ")  # La fecha en que se hace el pedido
        fechaentrega = input("Introduce la fecha de entrega del pedido: ")  # La fecha de entrega
        
        # Verifica si el cliente con ese ID existe en la base de datos
        cursor.execute("SELECT COUNT(*) FROM cliente WHERE idcliente = %s", (idcliente,))
        if cursor.fetchone()[0] == 0:  # Si no existe el cliente, muestra un error
            print(f"No existe un cliente con ID {idcliente}.")
            return
        
        # Si el cliente existe, se inserta el nuevo pedido en la base de datos
        consulta = """INSERT INTO pedido (idpedido, idcliente, fechapedido, fechaentrega) VALUES (%s, %s, %s, %s)"""
        cursor.execute(consulta, (id, idcliente, fechapedido, fechaentrega))  # Ejecuta la consulta
        
        # Realiza los cambios en la base de datos
        conexion.commit()
        
        # Muestra un mensaje de confirmación
        print(f"El pedido con id {id} se ha creado correctamente")
        
        # Cierra el cursor después de la operación
        cursor.close()
    except mysql.connector.Error as err:
        # Si ocurre un error al interactuar con la base de datos, muestra el error
        print(f"Error al crear pedido: {err}")

# Esta función permite leer (listar) todos los pedidos de la base de datos
def leer_pedidos(conexion):
    cursor = conexion.cursor()
    
    # Prepara y ejecuta la consulta SQL para obtener todos los pedidos
    consulta = """SELECT * FROM pedido;"""
    cursor.execute(consulta)
    
    # Obtiene todos los resultados de la consulta
    resultados = cursor.fetchall()
    
    # Muestra los resultados de los pedidos
    print("\n--- Pedidos ---")
    for fila in resultados:
        # Muestra la información de cada pedido
        print(f"ID: {fila[0]}, idcliente: {fila[1]}, fechapedido: {fila[2]}, fechaentrega: {fila[3]}")
    
    # Cierra el cursor después de mostrar los resultados
    cursor.close()

# Esta función permite actualizar la fecha de entrega de un pedido
def actualizar_pedido(conexion):
    try:
        cursor = conexion.cursor()
        
        # El usuario ingresa el ID del pedido a actualizar
        id = int(input("Introduce el ID del pedido a actualizar: "))  # Convierte el ID del pedido a un entero
        fechaentrega = input("Introduce la nueva fecha de entrega: ")  # La nueva fecha de entrega
        
        # Prepara y ejecuta la consulta SQL para actualizar la fecha de entrega
        consulta = """UPDATE pedido SET fechaentrega = %s WHERE idpedido = %s"""
        cursor.execute(consulta, (fechaentrega, id))  # Ejecuta la consulta
        
        # Realiza los cambios en la base de datos
        conexion.commit()
        
        # Muestra un mensaje confirmando que el pedido fue actualizado
        print(f"El pedido con ID {id} ha actualizado su fecha de entrega a {fechaentrega}.")
        
        # Cierra el cursor después de la operación
        cursor.close()
    except mysql.connector.Error as err:
        # Si ocurre un error con la base de datos, muestra el mensaje de error
        print(f"Error al actualizar pedido: {err}")
    except ValueError:
        # Si el ID no es un número entero, muestra un mensaje de error
        print("El ID debe ser un número entero.")

# Esta función permite eliminar un pedido de la base de datos
def eliminar_pedido(conexion):
    try:
        cursor = conexion.cursor()
        
        # El usuario ingresa el ID del pedido a eliminar
        id = int(input("Introduce el ID del pedido a eliminar: "))  # Convierte el ID a un entero
        
        # Prepara y ejecuta la consulta SQL para eliminar el pedido con ese ID
        consulta = """DELETE FROM pedido WHERE idpedido = %s"""
        cursor.execute(consulta, (id,))  # Ejecuta la consulta
        
        # Realiza los cambios en la base de datos
        conexion.commit()
        
        # Si el número de filas afectadas es mayor que cero, significa que el pedido fue eliminado
        if cursor.rowcount > 0:
            print(f"El pedido con ID {id} ha sido eliminado.")
        else:
            # Si no se encuentra ningún pedido con ese ID, muestra un mensaje
            print(f"No se encontró ningún pedido con ID {id}.")
        
        # Cierra el cursor después de la operación
        cursor.close()
    except mysql.connector.Error as err:
        # Si ocurre un error con la base de datos, muestra el mensaje de error
        print(f"Error al eliminar pedido: {err}")
    except ValueError:
        # Si el ID no es un número entero, muestra un mensaje de error
        print("El ID debe ser un número entero.")

# Función para crear un nuevo cliente en la base de datos
def crear_cliente(conexion):
    cursor = conexion.cursor()
    
    # Solicita al usuario los detalles del cliente
    idcliente = input("Introduce el ID del cliente (máximo 5 caracteres):")  # ID del cliente
    cia = input("Introduce el nombre de la compañía: ")  # Nombre de la compañía
    contacto = input("Introduce el nombre del contacto: ")  # Nombre del contacto
    cargo = input("Introduce el cargo del contacto: ")  # Cargo del contacto
    direccion = input("Introduce la dirección: ")  # Dirección del cliente
    ciudad = input("Introduce la ciudad: ")  # Ciudad
    region = input("Introduce la región: ")  # Región
    cp = input("Introduce el código postal: ")  # Código postal
    pais = input("Introduce el país: ")  # País
    tlf = input("Introduce el teléfono: ")  # Teléfono
    fax = input("Introduce el fax: ")  # Fax
    
    # Consulta SQL para insertar un nuevo cliente en la tabla cliente
    consulta = """INSERT INTO cliente (idcliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax) 
                  VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"""
    
    # Ejecuta la consulta con los valores proporcionados
    cursor.execute(consulta, (idcliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax))
    
    # Guarda los cambios en la base de datos
    conexion.commit()
    
    # Muestra un mensaje de éxito
    print(f"Cliente '{cia}' creado con éxito.")
    
    # Cierra el cursor después de la operación
    cursor.close()

# Función para leer (listar) todos los clientes de la base de datos
def leer_cliente(conexion):
    cursor = conexion.cursor()
    
    # Consulta SQL para obtener todos los clientes
    consulta = "SELECT * FROM cliente"
    
    # Ejecuta la consulta
    cursor.execute(consulta)
    
    # Obtiene todos los resultados de la consulta
    resultados = cursor.fetchall()
    
    # Muestra la información de los clientes
    print("\n--- Clientes ---")
    for fila in resultados:
        # Muestra cada cliente en la consola
        print(f"ID: {fila[0]}, Compañía: {fila[1]}, Contacto: {fila[2]}, Cargo: {fila[3]}")
    
    # Cierra el cursor después de la operación
    cursor.close()

# Función para actualizar la información de un cliente
def actualizar_cliente(conexion):
    cursor = conexion.cursor()
    
    # Solicita al usuario el ID del cliente que desea actualizar
    idcliente = input("Introduce el ID del cliente a actualizar: ")
    nuevo_contacto = input("Introduce el nuevo nombre del contacto: ")
    nueva_cia = input("Introduce el nuevo nombre de la compañía: ")
    
    # Consulta SQL para actualizar el nombre del contacto y el nombre de la compañía
    consulta = "UPDATE cliente SET contacto = %s, cia = %s WHERE idcliente = %s"
    
    # Ejecuta la consulta con los nuevos valores
    cursor.execute(consulta, (nuevo_contacto, nueva_cia, idcliente))
    
    # Guarda los cambios en la base de datos
    conexion.commit()
    
    # Muestra un mensaje de éxito
    print(f"Cliente con ID {idcliente} actualizado.")
    
    # Cierra el cursor después de la operación
    cursor.close()

# Función para eliminar un cliente de la base de datos
def eliminar_cliente(conexion):
    cursor = conexion.cursor()
    
    # Solicita al usuario el ID del cliente que desea eliminar
    idcliente = input("Introduce el ID del cliente a eliminar: ")
    
    # Consulta SQL para eliminar el cliente con ese ID
    consulta = """DELETE FROM cliente WHERE idcliente = %s"""
    
    # Ejecuta la consulta para eliminar al cliente
    cursor.execute(consulta, (idcliente,))
    
    # Guarda los cambios en la base de datos
    conexion.commit()
    
    # Muestra un mensaje de éxito
    print(f"Cliente con ID {idcliente} eliminado.")
    
    # Cierra el cursor después de la operación
    cursor.close()

# Función para crear un nuevo producto en la base de datos
def crear_producto(conexion):
    cursor = conexion.cursor()
    
    # Solicita al usuario los detalles del nuevo producto
    idproducto = int(input("Introduce el ID del nuevo producto: "))  # ID del producto
    nombre = input("Introduce el nombre del nuevo producto: ")  # Nombre del producto
    precio = float(input("Introduce el precio del producto: "))  # Precio del producto
    idcategoria = int(input("Introduce el ID de la categoría del producto: "))  # ID de la categoría
    
    # Consulta SQL para insertar un nuevo producto en la tabla producto
    consulta = """INSERT INTO producto (idproducto, nombre, precio, idcategoria) 
                  VALUES (%s, %s, %s, %s)"""
    
    # Ejecuta la consulta con los valores proporcionados
    cursor.execute(consulta, (idproducto, nombre, precio, idcategoria))
    
    # Guarda los cambios en la base de datos
    conexion.commit()
    
    # Muestra un mensaje de éxito
    print(f"Producto '{nombre}' creado con éxito.")
    
    # Cierra el cursor después de la operación
    cursor.close()

# Función para leer (listar) todos los productos de la base de datos
def leer_producto(conexion):
    cursor = conexion.cursor()
    
    # Consulta SQL para obtener todos los productos
    consulta = "SELECT * FROM producto"
    
    # Ejecuta la consulta
    cursor.execute(consulta)
    
    # Obtiene todos los resultados de la consulta
    resultados = cursor.fetchall()
    
    # Muestra la información de los productos
    print("\n--- Productos ---")
    for fila in resultados:
        # Muestra cada producto en la consola
        print(f"ID: {fila[0]}, Nombre: {fila[1]}, Precio: {fila[2]}, Categoría ID: {fila[3]}")
    
    # Cierra el cursor después de la operación
    cursor.close()

# Función para actualizar un producto en la base de datos
def actualizar_producto(conexion):
    cursor = conexion.cursor()
    
    # Solicita al usuario el ID del producto a actualizar
    idproducto = int(input("Introduce el ID del producto a actualizar: "))
    nuevo_nombre = input("Introduce el nuevo nombre del producto: ")
    nuevo_precio = float(input("Introduce el nuevo precio del producto: "))
    
    # Consulta SQL para actualizar el nombre y el precio del producto
    consulta = """UPDATE producto SET nombre = %s, precio = %s WHERE idproducto = %s"""
    
    # Ejecuta la consulta con los nuevos valores
    cursor.execute(consulta, (nuevo_nombre, nuevo_precio, idproducto))
    
    # Guarda los cambios en la base de datos
    conexion.commit()
    
    # Muestra un mensaje de éxito
    print(f"Producto con ID {idproducto} actualizado.")
    
    # Cierra el cursor después de la operación
    cursor.close()

# Función para eliminar un producto de la base de datos
def eliminar_producto(conexion):
    cursor = conexion.cursor()
    
    # Solicita al usuario el ID del producto a eliminar
    idproducto = int(input("Introduce el ID del producto a eliminar: "))
    
    # Consulta SQL para eliminar el producto con ese ID
    consulta = """DELETE FROM producto WHERE idproducto = %s"""
    
    # Ejecuta la consulta para eliminar el producto
    cursor.execute(consulta, (idproducto,))
    
    # Guarda los cambios en la base de datos
    conexion.commit()
    
    # Muestra un mensaje de éxito
    print(f"Producto con ID {idproducto} eliminado.")
    
    # Cierra el cursor después de la operación
    cursor.close()