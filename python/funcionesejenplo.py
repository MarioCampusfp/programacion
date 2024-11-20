def suma():
    suma= 2+3
    print(f"la suma es {suma}")
def resta():
    resta= 2-3
    print(f"la resta es {resta}")
def multiplicacion():
    multiplicacion=2*3
    print(f"la multiplicaion es {multiplicacion}")
def division():
    division=2/3
    print(f"la division es {division}")
    
suma()
division()

def sumapro(numero1 , numero2):
    suma=numero1+numero2
    print(f"la suma de {numero1} y {numero2} es {suma}")
    
def restapro(numero1, numero2):
    resta= numero1 - numero2
    print(f"la resta de {numero1} y {numero2} es {resta}")
    
def multiplicacionpro(numero1 , numero2):
    multiplicacion=numero1*numero2
    print(f"la multiplicacion de {numero1} y {numero2} es {multiplicacion}")

def divisionpro(numero1 , numero2):
    division=numero1/numero2
    print(f"la division de {numero1} y {numero2} es {division}")
    
num1= int(input("dame un numero: "))
num2= int(input("dame un numero: "))

sumapro(num1, num2)
restapro(num1, num2)
multiplicacionpro(num1, num2)
divisionpro(num1, num2)

###########################################
###########################################


def sumapro2(numero1, numero2):
    suma= numero1 + numero2
    return suma

def espar(numero):
    if numero % 2 ==0:
        valor = True
    else:
        valor = False
    return valor

num1=int(input("dame un numero: "))
num2=int(input("dame un numero: "))

resultadosuma = sumapro2(num1, num2)
print(f"el resultado de la suma es {resultadosuma}")

if espar(num1) == True:
    print(f"el numero{num1} es par")
else:
    print(f"el numero {num1} es impar")