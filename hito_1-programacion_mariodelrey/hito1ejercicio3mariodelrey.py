#ejercicio3
def saldo():#creamos la funcion que le pida que meta un saldo
    while True:
        dinero=float(input("ingrese su saldo: "))#ingresa el saldo
        if dinero < 0:# acemos un if para que lo que ingrese si o si sea positivo o si no no le permite sejir
            print("saldo incorecto no puede ser menor a 0")
        else:
            break
    return dinero
def menu():#funcion para mostrar menu
    print("1-ingresar dinero")
    print("2-retirar dinero")
    print("3- mostrar")
    print("4-salir")
    selecion=int(input("introduce la opcion que quieres: "))
    return selecion
def ingreso(dinero):#funcion para ingresar un suma a su cuenta
    while True:
        ingre=float(input("ingres se la suma: "))
        if ingre < 0:#si el nume que ingresa es negativo no es valido
            print("el numero es incorecto")
        else:
            resultado=dinero+ingre
            break
    return resultado
def retiras(dinero):#funcion para retirar dinero
    while True:
        reti=float(input("ingrese lo que quiere sacar: "))
        if reti < 0:#si el nume que ingresa es negativo no es valido
            print("el numero es incorecto")
        else:
            resultado=dinero-reti#impedimos que retire mas de lo que tiene
            if resultado < 0:
                print("no se puede retirar una cantidad mayor al saldo")
            else:
                break
    return resultado


dinero=saldo()#invocamos saldo
while True:#creamos un bucle para que solo se pueda salir con la selecion 4
    selecion=menu()#invocamos menu
    if selecion ==1:#invocamos ingerso
        dinero=ingreso(dinero)
    elif selecion ==2:#invocamos retiras
        dinero=retiras(dinero)
    elif selecion ==3:#mostramos el dinero que tiene
        print(f"tienes {dinero}€ en tu cuenta")
    elif selecion ==4:#salimos
        break
    else:#opcion para que si no pone una de la opciones no sea valido
        print("opcion no valida")
    