#ejercicio1
#lista={"Manzana" : True, "Sal":False, "Tomate":True, "Vinagre":False}
#def perecedero(alimento):
#    return lista[alimento]
#print(list(filter(perecedero, lista)))

#Ejercicio2
#lista={"coche1": True, "coche2": False, "coche3":True, "coche4":False}
#def pasado(coche):
#    return lista[coche]
#print("los sigientes veiculos an pasado la itv")
#print(list(filter(pasado, lista)))

#Ejercicio3
#lista={}
#while True:
#    nombre=input("Introduce el nombre del empleado: ")
#    estado=int(input("el trabajador esta activo ponga 1 el trabajador esta inactivo ponga 2 y 3 para salir: "))
#    if estado ==1:
#        lista[nombre]=True
#    elif estado ==2:
#        lista[nombre]=False
#    elif estado==3:
#        break
#    else:
#        print("estado del trabajador no correcto")
#def activo(trabajador):
#    return lista[trabajador]
#print("los sigientes trabajadores estan activos")
#print(list(filter(activo, lista)))

#ejercicio4
lista={}
fin="fin"
while True:
    titulo=input("Introduce el nombre del libro para parar pon fin: ")
    if titulo == fin:
        break
    categoria=int(input("pon a que genero pertenece tu libro 1:novela, 2:diccionario, 3:poemas, 4:ensayo: "))
    if categoria ==1:
        lista[titulo]=True
    elif categoria ==2:
        lista[titulo]=False
    elif categoria ==3:
        lista[titulo]=False
    elif categoria ==4:
        lista[titulo]==5
    else:
        print("genero incorrecto")
def novela(libro):
    return lista[libro]
print("los sigientes libros son novelas")
print(list(filter(novela, lista)))