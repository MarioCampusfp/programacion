#inicio

import funciones # Importamos funciones.py

conexion=funciones.conectar("centro_deportivo") # Nos conetamos a la base de datos centro_deportivo

while True: # Creamos un while true para la gestion de la base de datos
    funciones.menu_principal() # Invocamos la funcion menu_principal
    opcion=int(input("Selecione la opcion que quieras hacer: "))
    if opcion==1: # Elegimos la tabla cliente
        funciones.menu_operaciones() # Invocamos la funcion menu_operaciones
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:
            funciones.registrar_cliente(conexion) # Invocamos la funcion registrar_cliente
        elif elecion==2:
            funciones.listar_clientes(conexion) # Invocamos la funcion listar_clientes
        elif elecion==3:
            funciones.eliminar_clientes(conexion) # Invocamos la funcion eliminar_clientes
        elif elecion==4:
            break
    elif opcion==2: # Elegimos la tabla entrenadores
        funciones.menu_operaciones() # Invocamos la funcion menu_operaciones
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:
            funciones.registrar_entrenador(conexion) # Invocamos la funcion registrar_entrenador
        elif elecion==2:
            funciones.listar_entrenadores(conexion) # Invocamos la funcion listar_entrenadores
        elif elecion==3:
            funciones.eliminar_entrenador(conexion) # Invocamos la funcion eliminar_entrenador
        elif elecion==4:
            break
    elif opcion==3: # Elegimos la tabla actividades
        funciones.menu_operaciones() # Invocamos la funcion menu_operaciones
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:
            funciones.registrar_actividades(conexion) # Invocamos la funcion registrar_actividades
        elif elecion==2:
            funciones.listar_actividades(conexion) # Invocamos la funcion listar_actividades
        elif elecion==3:
            funciones.eliminar_actividades(conexion) # Invocamos la funcion eliminar_actividades
        elif elecion==4:
            break
    elif opcion==4: # Elegimos la tabla inscripcion
        funciones.menu_operaciones() # Invocamos la funcion menu_operaciones
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:
            funciones.registrar_inscripciones(conexion)
        elif elecion==2:
            funciones.listar_inscripcion(conexion)
        elif elecion==3:
            funciones.eliminar_inscripcion(conexion)
        elif elecion==4:
            break
    elif opcion==5: # Elegimos salir de la base de datos
        conexion.close
        break
    else:
        print("opcion no valida")