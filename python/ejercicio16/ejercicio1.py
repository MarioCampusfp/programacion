#ejercicio1

import funciones

conexion= funciones.conectar("SUPERMERCADO")

while True:
    funciones.menu_principal()
    try:
        opcion_tabla=int(input("selecione una de las opciones: "))
        if opcion_tabla==1:
            while True:
                funciones.menu_operaciones()
                opcion_operacion=int(input("selecione una opcion"))
                if opcion_operacion == 5:
                    print("Saliendo de la gestión de categorías. ¡Hasta pronto!")
                    break
                elif opcion_operacion ==1:
                    funciones.crear_categoria(conexion)
                elif opcion_operacion==2:
                    funciones.leer_categoria(conexion)
                elif opcion_operacion==3:
                    funciones.actualizar_categoria(conexion)
                elif opcion_operacion==4:
                    funciones.eliminar_categoria(conexion)
        elif opcion_tabla==2:
            while True:
                funciones.menu_operaciones()
                opcion_operacion=int(input("selecione una opcion"))
                if opcion_operacion == 5:
                    print("Saliendo de la gestión de categorías. ¡Hasta pronto!")
                    break
                elif opcion_operacion ==1:
                    funciones.crear_producto(conexion)
                elif opcion_operacion==2:
                    funciones.leer_producto(conexion)
                elif opcion_operacion==3:
                    funciones.actualizar_producto(conexion)
                elif opcion_operacion==4:
                    funciones.eliminar_producto(conexion)
        elif opcion_tabla==3:
            print("salienta hasta mañana")
            break
    except ValueError:
        print("Por favor, ingrese un número válido.")
    conexion.close()