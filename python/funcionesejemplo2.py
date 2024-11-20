def area_triangulo(base, altura):
    return (base * altura) /2

resultado = area_triangulo(4,5)
print("el area del triangulo es", resultado)

def es_par(numero):
    if numero % 2 == 0:
        return True
    else:
        return False
    
resultado=es_par(8)
print("el numero es par", resultado)

def saludo_personalizado(nombre, hora_del_dia):
    if hora_del_dia =="mañana":
        print("buenos dias, " + nombre)
    elif hora_del_dia == "tarde":
        print("¡Buenas tardes, " + nombre + "!")
    else:
        print("¡Buenas noches, " + nombre + "!")

saludo_personalizado("Laura", "tarde")
