#Ejercicio1
#numero1=input("escribe el primer numero del calculo: ")
#numero2=input("escribe el segundo numero del calculo: ")
#numero1=int(numero1)
#numero2=int(numero2)
#suma= numero1 + numero2
#print("la suma es ", suma)
#resta= numero1 - numero2
#print("la resta es ", resta)
#multiplicacion= numero1 * numero2
#print("la multiplicacion es ", multiplicacion)
#division= numero1 / numero2
#print("la division es", division)

#Ejercicio2
#numero=input("escribe un numero: ")
#numero=int(numero)
#if numero % 2 == 0:
#    print("el numero es par")
#else:
#    print("el numero no es par")

#Ejercicio3
#numero=input("escribe un numero positivo: ")
#numero=int(numero)
#suma=0
#for sumatorio in range(1, numero + 1):
#    suma += sumatorio
#print("el resultado es ", suma)

#Ejercicio4
#letras=input("ingresa una cadena de textos: ")
#vocales="aeiouAEIOU"
#contador=0
#for letra in letras:
#    if letra in vocales:
#        contador +=1
#print("en la cadena hay ", contador,"vocales")

#Ejercicio5
import random
randon= random.randint(1, 100)
while True:
    numero=input("introduce un numero: ")
    numero=int(numero)
    if numero < randon:
        print("numero demasiado pequeño vuelve a intentarlo")
    elif numero > randon:
        print("numero demasiado grande intentelo de nuevo")
    else:
        print("correcto el numero era", randon)
        break