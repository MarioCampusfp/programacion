#inicio

import funciones # Importamos funciones.py

conexion=funciones.conectar("SUPERMERCADO")# Hacemos que se conecte a la base de datos supermercado 

while True:# Creamos un while true para el usuario elija la opciones que quiera y selecione que hacer para cada tabla
    funciones.menu_principal()# Pone el menu de tablas que hay en la base de datos
    opcion=int(input("introduce la tabla: "))# Introduce la tabla que vamos a modificar
    if opcion==1:# Tabla categoria
        funciones.menu_operacion()# Menu Operaciones
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:# opcion de crear
            funciones.crear_categoria(conexion)
        elif elecion==2:# opcion de listar
            funciones.leer_categoria(conexion)
        elif elecion==3:# opcion de actualizar
            funciones.actualizar_categoria(conexion)
        elif elecion==4:# opcion de eliminar
            funciones.eliminar_categoria(conexion)
        elif elecion==5:# Salir
            print("Saliendo de la gestion de categorias. Hasta pronto")
            break
    elif opcion==2:# Tabla detalle
        funciones.menu_operacion()# Menu Operaciones
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:# opcion de crear
            funciones.crear_detalle(conexion)
        elif elecion==2:# opcion de listar
            funciones.leer_detalle(conexion)
        elif elecion==3:# opcion de actualizar
            funciones.actualizar_detalle(conexion)
        elif elecion==4:# opcion de eliminar
            funciones.eliminar_detalles(conexion)
        elif elecion==5:# Salir
            print("Saliendo de la gestion de detalle. Hasta pronto")
            break
    elif opcion==3:# Table pedido
        funciones.menu_operacion()# Menu Operaciones
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:# opcion de crear
            funciones.crear_pedidos(conexion)
        elif elecion==2:# opcion de listar
            funciones.leer_pedidos(conexion)
        elif elecion==3:# opcion de actualizar
            funciones.actualizar_pedido(conexion)
        elif elecion==4:# opcion de eliminar
            funciones.eliminar_pedido(conexion)
        elif elecion==5:# Salir
            print("Saliendo de la gestion de pedido. Hasta pronto")
            break
    elif opcion==4:# Tabla cliente
        funciones.menu_operacion()# Menu Operaciones
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:# opcion de crear
            funciones.crear_cliente(conexion)
        elif elecion==2:# opcion de listar
            funciones.leer_cliente(conexion)
        elif elecion==3:# opcion de actualizar
            funciones.actualizar_cliente(conexion)
        elif elecion==4:# opcion de eliminar
            funciones.eliminar_cliente(conexion)
        elif elecion==5:# Salir
            print("Saliendo de la gestion de cliente. Hasta pronto")
            break
    elif opcion==5:# Tabla Producto
        funciones.menu_operacion()# Menu Operaciones
        elecion=int(input("introduce la operacion que quierres haces"))
        if elecion==1:# opcion de crear
            funciones.crear_producto(conexion)
        elif elecion==2:# opcion de listar
            funciones.leer_producto(conexion)
        elif elecion==3:# opcion de actualizar
            funciones.actualizar_producto(conexion)
        elif elecion==4:# opcion de eliminar
            funciones.eliminar_producto(conexion)
        elif elecion==5:# Salir
            print("Saliendo de la gestion de producto. Hasta pronto")
            break
    elif opcion==6:
        conexion.close
        break