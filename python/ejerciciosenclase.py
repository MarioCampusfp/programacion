#Ejercicio1
#def calcular_area_triangulo(radio):
#    area= 3.14 * radio ** 2
#    return area
#radio=input("introduce el radio del circulo: ")
#radio=int(radio)
#area=calcular_area_triangulo(radio)
#print(f"el area del circulo es {area}")

#Ejercicio2
def contar_vocales(frase, contador):
    vocales="aeiouAEIOU"
    for vocal in frase:
        if vocal in vocales:
            contador +=1
    return contador
frase=input("introduce una frase: ")
contador=0
contador=contar_vocales(frase, contador)
print(f"hay un total de {contador} vocales en tu frase")