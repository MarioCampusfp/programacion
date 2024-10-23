#Ejercicio1 formar figuras en la pantalla
def menu():#creamos una funcion para el menu
    print("elige una figura")#sale por la pantalla un texto
    print("1-cuadrado")
    print("2-rectangulo")
def cuatrado():#creamos una funcion para el cuadrado
    lado=int(input("pon el lado del cuadrado: "))#pedimos que introducan el lado del cuadrado
    area = lado * lado#calculamos el area
    perimetro= 4 * lado#calculamos el perimetro
    print(f"el area del cuadrado es {area}, el perimedro del cuadrado es {perimetro}")#mostramos el area y el perimetro del cuatrado
    for i in range(lado):#inprimimos la forma con un for
        print("*"*lado)
def rectangulo():#cramos una funcion para el rectangulo
    base=int(input("introduce el base del rectangulo: "))#pedimos que introducan el base del rectangulo
    altura=int(input("introduca la altura del rectanculo"))#pedimos que introducan la altura del rectangulo
    area= base*altura#calculamos el area del rectangulo
    perimetro= 2*(base+altura)#calculamos el perimeto del rectangulo
    print(f"el area del rectangulo es {area}, el perimetro del rectangulo es {perimetro}")#mostramos el area y el perimetro del rectangulo
    for i in range(altura):#inprimimos la forma con un for
        print("*"*base)
    
while True:#creamos un bucle para la elecion de figura
    menu()
    elecion= input("seleciona una opcion: ")#pedimos que elijan la figura
    if elecion =="1":#elecion 1
        cuatrado()
        break
    elif elecion =="2":#elecion 2
        rectangulo()
        break
    else:
        print("elecion no valida")#en caso de que pongan otra cosa que se repita el bucle 