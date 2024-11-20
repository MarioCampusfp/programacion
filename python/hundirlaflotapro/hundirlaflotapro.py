#hundir la flota pro
import numpy as np
import random
import funciones

#with open("guardar.txt","r") as archivo:#abrimos el archivo guardado si hay
#    posiciones=archivo.readlines()
#    array=np.array([int(posicion.strip())for posicion in posiciones])
#    archivo.close
tablero=np.zeros((20,20))# creacion de tablero
        
intentos=0
hundido=False

while not hundido:
    funciones.ver_tablero(tablero)
    funciones.barcos(tablero)
    try:
        fila_ataque=int(input("introduce la fila (0-20): "))
        columna_ataque=int(input("introduce la columna (0-20): "))
    except ValueError:
        print("cordenadas no existentes introduce cordenadas validas")
        continue
