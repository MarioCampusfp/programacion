import python.ejercicio15.funciones_bdd as bdd

#conexion = bdd.conectar("animales")
#cursor = conexion.cursor()

#consulta="""select animal.animal, familia.familia from animal join familia on animal.idfamilia=FAMILIA.IDFAMILIA;"""
#cursor.execute(consulta)
#resultados=cursor.fetchall()
#for animal, familia in resultados:
#    print(f"animal:{animal}, familia:{familia}")
#cursor.close()
#conexion.close()

#ejemplo2

#conexion= bdd.conectar("animales")

#cursor = conexion.cursor()

#consulta="""
#select familia.familia, count(animal.animal) as cuantos
#from animal
#join familia on animal.idfamilia=familia.idfamilia
#group by familia.familia;
#"""
#cursor.execute(consulta)
#resultados=cursor.fetchall()
#for familia, cuantos in resultados:
#    print(f"familia: {familia}, cuantos animales: {cuantos}")
#cursor.close()
#conexion.close()

#ejemplo3

#conexion= bdd.conectar("animales")

#cursor=conexion.cursor()
#nuevo_animal=(10,2,"tigre",2)
#consulta="insert into animal(idanimal, idfamilia, animal, cuantos) values(%s, %s, %s, %s)"
#cursor.execute(consulta, nuevo_animal)
#conexion.commit()
#print("nuevo animal insertado correctamente")
#cursor.close()
#conexion.close()

#ejemplo4
#conexion= bdd.conectar("animales")

#cursor=conexion.cursor()
#nueva_cantidad=5
#animal_id=1
#consulta="update animal set cuantos= %s where idanimal= %s"
#cursor.execute(consulta, (nueva_cantidad, animal_id))
#conexion.commit()
#print("cantidad actualizada correctamente")
#cursor.close()
#conexion.close()

#ejemplo5
conexion= bdd.conectar("animales")

cursor=conexion.cursor()
animal_id=10
consulta="delete from animal where idanimal=%s"
cursor.execute(consulta,(animal_id))
conexion.commit()
print("Animal eliminado correctamente")

cursor.close()
conexion.close()
