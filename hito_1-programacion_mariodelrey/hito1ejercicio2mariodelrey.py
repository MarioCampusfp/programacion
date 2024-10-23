#ejecicio2
import random
def elecion():#creamos una funcion para la selecion de piedra papel o tigeras
    print("elige piedra papel o tigeras")#le postramos las opciones
    print("1-papel")
    print("2-tigeras")
    print("3-piedra")
    selecion=int(input("elecion: "))
    return selecion
def iarandom():#creamos la funcion para un numero random
    return random.randint(1,3)#nos dara un numero random entre el 1 y el 3
contadorIA=0#creamos un contador para la ia
contadorPlayer=0#creamos un contador para el jugador
while True:#creamos un bucle para que el juego no acabe asta que uno tenga 3 puntos
    player=elecion()#invocamos la funcion elecion
    ia=iarandom()#invocamos la funcion ia random
    if contadorIA == 3:#ponemos un if para que el contador de ia o jugador llege a 3 salga del bucle
        print("la ia gana")
        break
    elif contadorPlayer == 3:
        print("el jugador gana")
        break
    else:#en caso de que ninguno llege a 3 sige el juego
        if ia == player:# ambos tiene el mismo resultado empate
            print("empate")
        elif ia == 1 and player == 2:#tigeras gana a papel
            print("punto para el jugador")
            contadorPlayer +=1
        elif ia == 1 and player == 3:#papel gana a piedra
            print("punto para la ia")
            contadorIA +=1
        elif ia == 2 and player == 1:#tigeras gana a papel
            print("punto para la ia")
            contadorIA +=1
        elif ia == 2 and player == 3:#piedra gana a tigeras
            print("punto para el jugador")
            contadorPlayer +=1
        elif ia == 3 and player == 1:#papel gana a piedra
            print("punto para el jugador")
            contadorPlayer +=1
        elif ia == 3 and player == 2:#piedra gana a tigeras
            print("punto para la ia")
            contadorIA +=1
        else:#a puesto uan opcion no valida
            print("opcion no valida")