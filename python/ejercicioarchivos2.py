#ejercico1
#import numpy as np

#numeros_aleatorios = np.random.randint(1, 101, size=10)
#with open("numeros.txt", "w") as archivo:
#    for numero in numeros_aleatorios:
#        archivo.write(f"{numero}\n")
#    archivo.close()
    
#with open("numeros.txt", "r") as archivo:
#    numeros=archivo.readlines()
#    aray_numeros=np.array([int(numero.strip()) for numero in numeros])
#    archivo.close()
#print(aray_numeros)

#ejercicio2
#import numpy as np

#with open("temperaturas.txt", "r") as archivo:
#    grados=archivo.readlines()
#    array=np.array([float(grado.strip()) for grado in grados])
#    archivo.close()

#media=np.mean(array)
#print(f"la media es{media}")
#maxima=np.max(array)
#print(f"la maxima es {maxima}")
#minima=np.min(array)
#print(f"el minimo es {minima}")

#ejercicio3

import numpy as np

calificaciones = []

with open("notas_estudiantes.txt", "r") as archivo:
    notas=archivo.readlines()
    array=np.array([int(nota.strip()) for nota in notas])
    archivo.close()

