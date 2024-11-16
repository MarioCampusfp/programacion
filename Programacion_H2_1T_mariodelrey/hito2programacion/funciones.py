#funciones

import numpy as np  # Importamos NumPy para usar arrays (son como listas pero más pros)
import os  # Importamos os para trabajar con archivos en nuestra compu

# Inicializamos arrays para guardar los nombres de clientes y números de pedidos
clientes_ids = np.array([])  # Aquí vamos a guardar los nombres de los clientes registrados
pedidos_ids = np.array([])  # Aquí guardamos los números de pedidos

# Listas para guardar la info detallada de clientes y pedidos
clientes = []  # Aquí metemos toda la info de cada cliente (nombre y contraseña)
pedidos = []  # Aquí guardamos cada pedido que se hace

# Lista con los productos que se pueden comprar
productos_disponibles = ["Producto A", "Producto B", "Producto C"]
archivo_clientes = "clientes.txt"  # Archivo donde vamos a guardar los clientes registrados


def guardar_cliente(cliente):
    """Guarda la info de un cliente en un archivo txt"""
    # Abrimos el archivo en modo 'a' (append) para añadir info sin borrar lo que ya está
    with open(archivo_clientes, 'a') as f:
        # Guardamos el nombre y la contraseña separados por una coma
        f.write(f"{cliente['Nombre']},{cliente['Contraseña']}\n")


def cargar_clientes():
    """Carga los clientes desde el archivo txt si existe"""
    global clientes_ids  # Usamos la variable global para poder modificarla
    # Si el archivo de clientes existe, leemos su contenido
    if os.path.exists(archivo_clientes):
        with open(archivo_clientes, 'r') as f:
            # Leemos línea por línea
            for linea in f:
                if linea.strip():  # Si la línea no está vacía
                    nombre, contraseña = linea.strip().split(',')
                    # Añadimos el cliente a la lista y al array de IDs
                    clientes.append({'Nombre': nombre, 'Contraseña': contraseña})
                    clientes_ids = np.append(clientes_ids, nombre)


def crear_cliente():
    """Crea un cliente nuevo solo con nombre y contraseña"""
    global clientes_ids  # Usamos la variable global para modificar el array de IDs
    print("\n--- Registro de Cliente ---")
    nombre = input("Ingrese su nombre: ")
    
    # Comprobamos si ya existe un cliente con ese nombre en nuestro array
    if nombre in clientes_ids:
        print("Error: Este nombre ya está registrado.")  # Ups, ese nombre ya está usado
        return

    # Si el nombre es único, pedimos la contraseña
    contraseña = input("Ingrese su contraseña: ")

    # Creamos un nuevo cliente con un diccionario (clave-valor)
    nuevo_cliente = {'Nombre': nombre, 'Contraseña': contraseña}
    clientes.append(nuevo_cliente)  # Lo añadimos a la lista de clientes
    clientes_ids = np.append(clientes_ids, nombre)  # Añadimos el nombre al array de IDs
    guardar_cliente(nuevo_cliente)  # Guardamos el cliente en el archivo txt
    print("Cliente registrado con éxito.")  # Avisamos que todo salió bien


def iniciar_sesion():
    """Permite al usuario iniciar sesión con su nombre y contraseña"""
    while True:
        # Si no hay clientes registrados, pedimos que creen uno primero
        if clientes_ids.size == 0:
            print("No hay clientes registrados. Debe crear un cliente primero.")
            crear_cliente()
        else:
            print("\n--- Iniciar Sesión ---")
            nombre = input("Ingrese su nombre: ")
            contraseña = input("Ingrese su contraseña: ")

            # Buscamos si el cliente existe y si la contraseña es correcta
            for cliente in clientes:
                if cliente['Nombre'] == nombre and cliente['Contraseña'] == contraseña:
                    print(f"Bienvenido, {cliente['Nombre']}!")
                    return cliente  # Si todo va bien, retornamos el cliente logueado

            print("Nombre o contraseña incorrectos. Intente de nuevo.")  # Si fallan, intentan de nuevo


def mostrar_clientes():
    """Muestra todos los clientes registrados"""
    print("\n--- Lista de Clientes ---")
    if len(clientes) == 0:
        print("No hay clientes registrados.")  # Avisamos si no hay nadie registrado
    else:
        # Mostramos el nombre de cada cliente registrado
        for cliente in clientes:
            print(f"Nombre: {cliente['Nombre']}")


def realizar_compra(cliente):
    """Permite a un cliente hacer una compra"""
    global pedidos_ids  # Usamos la variable global para añadir nuevos pedidos
    carrito = []  # Creamos un carrito vacío para los productos

    print(f"\nHola {cliente['Nombre']}, elige productos para tu compra:")

    while True:
        # Mostramos los productos disponibles
        print("\nProductos disponibles:")
        for i, producto in enumerate(productos_disponibles):
            print(f"{i + 1}. {producto}")
        
        # Pedimos al cliente que elija un producto por número
        seleccion = input("Seleccione un producto por número (o '0' para finalizar): ")

        if seleccion == '0':
            break  # Si elige '0', terminamos la selección
        elif seleccion.isdigit() and 1 <= int(seleccion) <= len(productos_disponibles):
            carrito.append(productos_disponibles[int(seleccion) - 1])  # Añadimos al carrito
            print("Producto añadido al carrito.")
        else:
            print("Selección no válida. Intente de nuevo.")  # Si escribe algo raro

    if len(carrito) == 0:
        print("No se añadió ningún producto.")  # Avisamos si no compró nada
        return

    # Creamos un nuevo pedido con un número único
    numero_pedido = len(pedidos) + 1
    nuevo_pedido = {'NumeroPedido': numero_pedido, 'Cliente': cliente, 'Productos': carrito}
    pedidos.append(nuevo_pedido)  # Añadimos el pedido a la lista de pedidos
    pedidos_ids = np.append(pedidos_ids, numero_pedido)  # Guardamos el ID del pedido
    print(f"Compra realizada con éxito. Número de Pedido: {numero_pedido}")


def seguimiento_pedido():
    """Permite al cliente hacer seguimiento de su pedido"""
    if len(pedidos) == 0:
        print("No hay pedidos registrados.")  # Avisamos si no hay pedidos
        return

    numero_pedido = input("Ingrese el número de pedido: ")

    # Verificamos si el número de pedido es válido y está en nuestro array
    if numero_pedido.isdigit() and int(numero_pedido) in pedidos_ids:
        for pedido in pedidos:
            if pedido['NumeroPedido'] == int(numero_pedido):
                print(f"Pedido Número: {pedido['NumeroPedido']}")
                print(f"Cliente: {pedido['Cliente']['Nombre']}")
                print("Productos comprados:")
                for producto in pedido['Productos']:
                    print(f"- {producto}")
                return
    print("Pedido no encontrado.")  # Si el número no está registrado