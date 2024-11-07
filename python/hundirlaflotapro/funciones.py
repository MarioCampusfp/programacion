import random

def barcos(tablero):
    for i in range(3):
        fila_barco=random.randint(0,20)
        columna_barco=random.randint(0,20)
        barco=tablero[fila_barco, columna_barco]=3
        return barco
    print(barco)

def menu():# menu de guardado
    print("opciones del menu 1.-guardar, 2.-salir")
    opcion=input("introduca la opcion del menu: ")
    if opcion==1:
        return True
    elif opcion==2:
        return False
    else:
        print("opcion no valida")

def guardar(array):# funcion de guardado
    with open("guardado.txt", "w") as archivo:
        for row in array:
            archivo.write("," .join(map(str, row)) + "\n")
    archivo.close

def ver_tablero(tablero, barco=False):# mostras el tablero
    display_tablero=tablero.copy()
    if not barco:
        display_tablero[display_tablero == 1] = 0
    print(display_tablero)