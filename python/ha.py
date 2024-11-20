import random

mostruos = {"vampiro": 3, "momia": 2, "bruja": 4, "esqueleto": 1, "fantasma": 5}
objetos = ["estaca", "pocion magica", "hechizo"]

def mostruo_ramdom():
    mostruo = random.choice(list(mostruos.keys()))
    dificultad = mostruos[mostruo]
    return mostruo, dificultad

def probabilidad(dificultad, objeto):
    probabilidad_base = 0
    if objeto == "estaca":
        probabilidad_base = 5 - dificultad
    elif objeto == "pocion magica":
        probabilidad_base = 3 - dificultad
    elif objeto == "hechizo":
        probabilidad_base = 7 - dificultad
    return max(0, probabilidad_base)

def captura(mostruo, dificultad):
    for intento in range(4):
        objeto = input("Indica de estos tres objetos cuál quieres usar (estaca, pocion magica, hechizo): ")
        if objeto not in objetos:
            print("Objeto no válido")
            continue
        probable = probabilidad(dificultad, objeto)
        resultado = random.randint(1, 7)
        print(f"Intento {intento + 1}: Probabilidad de captura es {probable}/6. Resultado: {resultado}")
        if resultado <= probable:
            print(f"El monstruo {mostruo} ha sido capturado")
            return True
    print(f"El monstruo {mostruo} ha escapado")
    return False

print("Bienvenido al juego de capturar monstruos hecho por Mario del Rey")
while True:
    mostruo, dificultad = mostruo_ramdom()
    print(f"El monstruo {mostruo} ha aparecido con una dificultad de {dificultad}")
    if captura(mostruo, dificultad):
        print(f"¡Enhorabuena, has capturado un {mostruo}!")
    else:
        print(f"El {mostruo} ha escapado")
