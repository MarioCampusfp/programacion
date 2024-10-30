#archivo=open("mi_srchivo.txt", "r")
#contenido = archivo.read()
#print(contenido)
#archivo.close()

#with open('mi_srchivo.txt', 'r') as archivo:
#    contenido=archivo.read()
#    print(contenido)
#    archivo.close()
    
with open('mi_archivo.txt', 'w') as archivo:
    archivo.write('Hola, este es un archivo de ejemplo.\n')
    archivo.write('Podemos escribir varias líneas así.\n')
    archivo.close()

with open('mi_archivo.txt', 'a') as archivo:
    archivo.write('Esta es una línea adicional.')
    archivo.close()
