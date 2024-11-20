import funciones

conexion=funciones.conectar("SUPERMERCADO")

while True:
    funciones.menu_principal()
    opcion=int(input("introduce la tabla: "))
    if opcion==1:
        funciones.menu_operacion()
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:
            funciones.crear_categoria(conexion)
        elif elecion==2:
            funciones.leer_categoria(conexion)
        elif elecion==3:
            funciones.actualizar_categoria(conexion)
        elif elecion==4:
            funciones.eliminar_categoria(conexion)
        elif elecion==5:
            print("Saliendo de la gestion de categorias. Hasta pronto")
            break
    elif opcion==2:
        funciones.menu_operacion()
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:
            funciones.crear_detalle(conexion)
        elif elecion==2:
            funciones.leer_detalle(conexion)
        elif elecion==3:
            funciones.actualizar_detalle(conexion)
        elif elecion==4:
            funciones.eliminar_detalles(conexion)
        elif elecion==5:
            print("Saliendo de la gestion de detalle. Hasta pronto")
            break
    elif opcion==3:
        funciones.menu_operacion()
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:
            funciones.crear_pedidos(conexion)
        elif elecion==2:
            funciones.leer_pedidos(conexion)
        elif elecion==3:
            funciones.actualizar_pedido(conexion)
        elif elecion==4:
            funciones.eliminar_pedido(conexion)
        elif elecion==5:
            print("Saliendo de la gestion de pedido. Hasta pronto")
            break
    elif opcion==4:
        funciones.menu_operacion()
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:
            funciones.crear_cliente(conexion)
        elif elecion==2:
            funciones.leer_cliente(conexion)
        elif elecion==3:
            funciones.actualizar_cliente(conexion)
        elif elecion==4:
            funciones.eliminar_cliente(conexion)
        elif elecion==5:
            print("Saliendo de la gestion de cliente. Hasta pronto")
            break
    elif opcion==5:
        funciones.menu_operacion()
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:
            funciones.crear_producto(conexion)
        elif elecion==2:
            funciones.leer_producto(conexion)
        elif elecion==3:
            funciones.actualizar_producto(conexion)
        elif elecion==4:
            funciones.eliminar_producto(conexion)
        elif elecion==5:
            print("Saliendo de la gestion de producto. Hasta pronto")
            break
    elif opcion==6:
        conexion.close
        break