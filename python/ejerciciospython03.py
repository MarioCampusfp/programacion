#Ejercicio1
#canciones=[]
#while True:
#    cancion=input("introduce una lista de canciones y pon fin para acabar: ")
#    fin="fin"
#    if cancion == fin:
#        break
#    else:
#        canciones.append(cancion)
#print("su lista de canciones es ", canciones)
#numero=input("selecione el numero de la cancion de su lista: ")
#numero=int(numero)
#print( canciones[numero])
#Ejercicio2
#contactos={}
#while True:
#    nombre=input("introduce el nombre de un cotacto: ")
#    fin="fin"
#    if nombre == fin:
#        break
#    else:
#        numero=input("introduce su numero: ")
#        contactos[nombre]=   numero
#for contacto in contactos:
#    print(contacto)
#contacto=input("introduce el nombre del contacto del que buscar el numero: ")
#print("el numero de ", contacto, "es", numero)

#Ejercicio3
#ciudades=("madrid", "barcelona", "valencia", "sevilla")
#n=1
#for ciudad in ciudades:
#    print(n,".",ciudad)
#    n=n+1
#visita=input("ingresa el numero de la ciudad que vas a visitar: ")
#visita=int(visita)
#print("La ciudad que has selecionado es", ciudades[visita])

#Ejercicio4
notas=[]
suma=0
contador=0
while True:
    dicionario={}
    contador=float(contador)
    asignatura=input("ingrese el nombre de la asignatura: ").lower()
    fin="fin"
    if asignatura == fin:
        break
    else:
        calificacion=input(f"incresa la calificaion de {asignatura}: ")
        calificacion=float(calificacion)
        dicionario[asignatura]= calificacion
        notas.append(dicionario)
        suma=suma+calificacion
        contador= contador + 1
for nota in notas:
    print(nota)
media= suma / contador
print("la calificacion media es: ", media)
#Ejercicio5