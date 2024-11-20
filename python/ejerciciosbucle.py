#Ejercicio1
for i in range(1, 11):
    print (i)

#Ejercicio2
numeros= [1,2,3,4,5]
suma=0
for numero in numeros:
    suma += numero
print("la suma es", suma)

#Ejercicio3
for numero in range(1, 100):
    if numero % 7 == 0:
        print("el primer numero divisible de 7 es", numero)
        break

#Ejercicio4
c=0
n=0
while c < 5:
    if n % 2 ==0:
        print(n)
        c += 1
    n += 1
print("la cantidad de numeros pares es: ", c)