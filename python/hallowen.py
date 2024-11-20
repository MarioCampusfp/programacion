#ejercicioHalloween
import random
mostruos={"vampiro" : 3, "momia" : 2, "bruja" : 4, "esqueleto" : 1, "fantasma" : 5}
objetos=["estaca", "pocion magica", "hechizo"]

def mostruo_ramdom():
    mostruo=random.choice(list(mostruos.keys()))
    dificultad= mostruos[mostruo]
    return mostruo, dificultad
def probabilidad( dificultad, objeto):
    probabilidad_base=1
    if objeto == "estaca":
        probabilidad_base= 5 - dificultad
    elif objeto == "pocion magica":
        probabilidad_base= 3 - dificultad
    elif objeto == "hechizo":
        probabilidad_base = 7 - dificultad
    return probabilidad_base
def captura(mostruo, dificultad):
    for intento in range(3):
        objeto = input("indrodude de estos tres objetos quieres usar estaca, pocion magica y hechizo: ")
        if objeto not in objetos:
            print("objeto no valido")
            continue
        probable = probabilidad(dificultad, mostruo)
        resultado= random.randint(1,7)
        print(f"Intento {intento + 1}: Probabilidad de captura es {probable}/6. Resultado: {resultado}")
        if resultado <= probable:
            print(f"el mostruo {mostruo} a sido cacturado")
            return True
    print(f"el mostruo {mostruo} a escapado")
    return False
print("bienvenido al juego de capturar mostruos hecho por mario del rey")
while True:
    mostruo, dificultad = mostruo_ramdom()
    print(f"el mostruo {mostruo} a aparecido con una dificultad de {dificultad}")
    if captura(mostruo , dificultad):
        print(f"enorabuena as capturado un {mostruo}")
        break
    else:
        print(f"el {mostruo} a escapado")
        break
        
