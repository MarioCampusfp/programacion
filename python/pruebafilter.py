#ejercicio1
numeros=[4, 9, 16, 25, 1, 7, 12]
def mayor_a_10(numero):
    return numero > 10
menores= filter(mayor_a_10, numeros)
print(list(menores))

#ejercicio2
altura_metros=[1.60, 1.75, 1.80, 1.50]
def metros_a_centimetros(numero):
    return numero*100
centimetros=list(map(metros_a_centimetros, altura_metros))
print(centimetros)