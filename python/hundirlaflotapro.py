#hundir la flota pro
import numpy as np
import random

with open("guardar.txt","r") as archivo:#abrimos el archivo guardado si hay
    posiciones=archivo.readlines()
    array=np.array([int(posicion.strip())for posicion in posiciones])
    archivo.close
tablero=np.zeros((21,21))# creacion de tablero

def barco1():# barco de 2
    fila_barco=random.randint(0,20)
    columna_barco=random.randint(0,20)
    tablero[fila_barco, columna_barco]=2

def barco2():# barco de 3 
    fila_barco=random.randint(0,20)
    columna_barco=random.randint(0,20)
    tablero[fila_barco, columna_barco]=3
    
def barco3():# barco de 4
    fila_barco=random.randint(0,20)
    columna_barco=random.randint(0,20)
    tablero[fila_barco, columna_barco]=4
    
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
    
intentos=0
hundido=False

while not hundido:
    ver_tablero(tablero)
    try:
        fila_ataque=int(input("introduce la fila (0-20): "))
        columna_ataque=int(input("introduce la columna (0-20): "))
    except ValueError:
        print("cordenadas no existentes introduce cordenadas validas")
        continue
