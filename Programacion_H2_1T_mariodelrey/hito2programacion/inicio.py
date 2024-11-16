#inicio

import funciones  # Importamos todo el archivo funciones.py donde están todas las funciones que hicimos

# Cargamos los clientes que ya están guardados en un archivo (si es que hay alguno)
funciones.cargar_clientes()

# Verificamos si hay clientes registrados
# Si la lista está vacía, obligamos al usuario a crear un cliente antes de continuar
if len(funciones.clientes_ids) == 0:
    print("No hay clientes registrados, debe crear uno para empezar.")
    while len(funciones.clientes_ids) == 0:  # Seguimos pidiendo hasta que se registre al menos un cliente
        funciones.crear_cliente()

# Inicializamos la variable para saber quién está conectado
cliente_actual = None

# Menú principal del programa que se repite hasta que el usuario decida salir
while True:
    # Mostramos las opciones que tiene el usuario
    print("\n--- Menú Principal ---")
    print("1. Iniciar Sesión")
    print("2. Registro de Cliente")
    print("3. Mostrar Clientes")
    print("4. Realizar Compra")
    print("5. Seguimiento de Pedido")
    print("6. Salir")

    # Le pedimos al usuario que elija una opción del menú
    opcion = input("Seleccione una opción: ")

    # Si elige '1', intentamos iniciar sesión
    if opcion == '1':
        cliente_actual = funciones.iniciar_sesion()
    
    # Si elige '2', le permitimos registrar un nuevo cliente
    elif opcion == '2':
        funciones.crear_cliente()
    
    # Si elige '3', mostramos todos los clientes registrados
    elif opcion == '3':
        funciones.mostrar_clientes()
    
    # Si elige '4', hacemos una compra, pero solo si alguien está logueado
    elif opcion == '4':
        if cliente_actual:  # Si hay un cliente que ya inició sesión
            funciones.realizar_compra(cliente_actual)
        else:
            print("Por favor, inicie sesión primero.")  # No puedes comprar sin iniciar sesión
    
    # Si elige '5', le mostramos el seguimiento de su pedido
    elif opcion == '5':
        funciones.seguimiento_pedido()
    
    # Si elige '6', salimos del programa
    elif opcion == '6':
        print("Saliendo del sistema... ¡Hasta luego!")  # Mensaje de despedida
        break  # Rompemos el bucle para terminar el programa
    
    # Si elige cualquier otra cosa, le decimos que la opción no es válida
    else:
        print("Opción no válida. Intente de nuevo.")