import numpy as np

# Leer el archivo
calificaciones = []

with open('notas_estudiantes.txt', 'r') as file:
    for line in file:
        # Convertir cada línea en una lista de enteros y agregar a calificaciones
        calificaciones.append(list(map(int, line.strip().split(','))))

# Convertir a un array de Numpy
calificaciones_array = np.array(calificaciones)

# Calcular el promedio de calificaciones de cada estudiante
promedios_estudiantes = np.mean(calificaciones_array, axis=1)

# Calcular el promedio general de la clase
promedio_general = np.mean(calificaciones_array)

# Mostrar los resultados
print("Promedios de cada estudiante:", promedios_estudiantes)
print("Promedio general de la clase:", promedio_general)
