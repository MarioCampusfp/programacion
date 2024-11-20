#Ejercicio1
#palabra=input("escribe una palabra: ")
#inversion=""
#for letra in palabra:
#    inversion= letra + inversion
#print("la palabra invertida es: ", inversion)

#Ejercicio2
#while True:
#    numero=input("introduce un numero: ")
#    numero=int(numero)
#    calculo=0
#    contador=0
#    if numero > 0 :
#        calculo= numero + calculo
#        contador= contador + 1
#    elif numero < 0 :
#        print("el numero es negativo no es valido")
#    else:
#        break
#    resultado=calculo / contador
#print("el promedio de loa numeros introducido es ", resultado)

#Ejercicio3
#lista= []
#while True:
#    nombre=input("introduce un nombre: ")
#    fin="fin"
#    if nombre == fin :
#        break
#    else:
#        lista.append(nombre)
#print("los nombres ingresados son: ", lista)

#Ejercicio4
#contraseña="123"
#while True:
#    clave=input("introduce tu contraseña: ")
#    if clave == contraseña:
#        print("contraseña correcta Acceso permitido")
#        break
#    else:
#        print("contraseña incorecta, vuelve a introducirla")

#Ejercicio5
mayor=0
while True:
    numero=input("introduce un numero: ")
    hecho="hecho"
    if numero == hecho:
        break
    else:
        numero=int(numero)
        if mayor < numero:
            mayor = numero
        else:
            print("numero mas pequño")
print("El numero mayor ingresado es ", mayor)