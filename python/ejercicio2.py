#Ejercicio1
edad = input("introduce su edad: ")
edad=int(edad)
if edad <= 5:
    print ("su entrada es gratuita")
elif edad <=12:
    print ("su entrada cuesta 5 euros")
elif edad <= 17:
    print ("su entrada cuesta 7 euros")
else:
    print ("su entrada cuesta 10 euros")

#Ejercicio2
print("este ejercicio no se puede hacer con un match-case por que requiere rangos por lo que vamos a usar if")
nota = input("introduca su nota: ")
nota=int(nota)
if nota >= 90:
    print ("tu calificacion es un A")
elif nota >= 80:
    print ("tu valificacion es B")
elif nota >= 70:
    print ("tu calificacion es C")
elif nota >= 60:
    print ("tu calificacion es de D")
else:
    print ("tu calificacion es F")

#Eercicio3
dia = input("dime el numero del dia de la semana del 1 al 7: ")
dia=int(dia)
match dia:
    case 1:
        print("lunes")
    case 2:
        print("martes")
    case 3:
        print("miercoles")
    case 4:
        print("jueves")
    case 5:
        print("viernes")
    case 6:
        print("sabado")
    case 7:
        print("domingo")
    case _:
        print("numero no valido")

#Ejercicio4
edad =input("dime su edad: ")
edad=int(edad)
if edad <=12:
    print("es un niño")
elif edad <=17:
    print("es un adolescente")
elif edad <=59:
    print("es un adulto")
else:
    print("es una persona de la tercera edad")

idioma= input("escriba su idioma: ")
match idioma:
    case "español":
        print("Has seleccionado el idioma español.")
    case "ingles":
        print("Your selected language is English.")
    case "frances":
        print:("Votre langue sélectionnée est le français")
    case _:
        print("Idioma no soportado")

#Ejercicio5
veiculo=input("introducta el tipo de su veiculo: ")
if veiculo == "coche":
    print("su veiculo es un coche")
elif veiculo == "moto":
    print("su veiculo es una moto")
elif veiculo == "bicicleta":
    print("su veiculo es una bicicleta")
else:
    print("Tipo de vehículo no reconocido")

color=input("introduca su color favorito: ")
match color:
    case "rojo":
        print("su color favorito es el rojo")
    case "azul":
        print("su color favorito es el azul")
    case "verde":
        print("su color favorito es el verde")
    case "amarillo":
        print("su color favorito es el amarillo")
    case _:
        print ("su color no esta disponible")