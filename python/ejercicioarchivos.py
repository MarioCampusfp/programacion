#ejercicio1
#with open("saludo.txt", "w") as archivo:
#    archivo.write("¡Hola, bienvenidos al curso de Python!\n")
#    archivo.close()

#ejercicio2
#with open("frase.txt", "r") as archivo:
#    contenido=archivo.read()
#    print(contenido)
#    archivo.close()

#ejercicio3
#with open("texto.txt", "w") as archivo:
#    for i in range(1, 4):
#        contenido=input("escribe una frase: ")
#        archivo.write(f"{contenido}\n")
        
#ejercicio4
#with open("alumnos.txt","r") as archivo:
#    for i in range(1,6):
#        linea=archivo.readline()
#        print(linea)
#    archivo.close()

#ejercicio5
with open("diario.txt", "a") as archivo:
    añadir=input("escribe una entrada al diario: ")
    archivo.write(f"\n {añadir}")
with open("diario.txt", "r") as archivo:
    contenido=archivo.read()
    print(contenido)
archivo.close()