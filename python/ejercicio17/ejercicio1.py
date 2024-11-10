#ejercicio1

import funciones

conexion= funciones.conectar("SUPERMERCADO")

while True:
    funciones.menu_principal()
    opcion=int(input("introduce una de las opciones del menu: "))
    if opcion==1:
        funciones.menu_operaciones()
        elecion=int(input("introduce la operacion que quieres hacer: "))
        if opcion == 5:
            print("Saliendo de la gestión de categorías. ¡Hasta pronto!")
            continue
        elif elecion==1:
            funciones.crear_categoria(conexion)
        elif elecion==2:
            funciones.leer_categoria(conexion)
        elif elecion==3:
            funciones.actualizar_categoria(conexion)
        elif elecion==4:
            funciones.eliminar_categoria(conexion)
        else:
            print("opcion no valida")
    elif opcion==2:
        funciones.menu_operaciones()
        elecion=int(input("introduce la operacion que quieres hacer: "))
        if elecion==5:
            print("Saliendo de la gestión de clientes. ¡Hasta pronto!")
            continue
        elif elecion==1:
            funciones.crear_cliente(conexion)
        elif elecion==2:
            funciones.leer_cliente(conexion)
        elif elecion==3:
            funciones.actualizar_cliente(conexion)
        elif elecion==4:
            funciones.eliminar_cliente(conexion)
        else:
            print("opcion no valida")
    elif opcion==3:
        conexion.close()
        break