#ejercicio1

import funciones

conexion= funciones.conectar("supermercado", "categorias")

cursor=conexion.cursor()

while True:
    funciones.menu()
    opcion=input("introduce una de las opciones del menu: ")
    if opcion == 5:
        break
    elif opcion ==1:
        funciones.crear_categoria(conexion)
    elif opcion==2:
        funciones.leer_categoria(conexion)