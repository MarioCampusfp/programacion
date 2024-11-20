#ejercicio1

import funciones

conexion= funciones.conectar("SUPERMERCADO")

while True:
    funciones.menu()
    opcion=int(input("introduce una de las opciones del menu: "))
    if opcion == 5:
        print("Saliendo de la gestión de categorías. ¡Hasta pronto!")
        conexion.close()
        break
    elif opcion ==1:
        funciones.crear_categoria(conexion)
    elif opcion==2:
        funciones.leer_categoria(conexion)
    elif opcion==3:
        funciones.actualizar_categoria(conexion)
    elif opcion==4:
        funciones.eliminar_categoria(conexion)