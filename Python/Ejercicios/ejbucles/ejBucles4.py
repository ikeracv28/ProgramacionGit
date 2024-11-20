'''
Ejercicio 4: Uso de if-elif-else
Descripción:
Crea un programa que solicite al usuario su edad y determine en qué
etapa de la vida se encuentra.
Instrucciones:
Solicita al usuario que ingrese su edad.
Utiliza estructuras if-elif-else para determinar la etapa:
Si la edad es menor que 13, muestra "Eres un niño/a."
Si la edad está entre 13 y 17, muestra "Eres un/a adolescente."
Si la edad está entre 18 y 64, muestra "Eres un/a adulto/a."
Si la edad es 65 o mayor, muestra "Eres un/a adulto/a mayor."
'''

#primero le damos un valor a las variables
edad = 0

#Le tenemos que decir al usuario que nos diga su edad
edad = int(input("Dime tu edad "))
#Ahora hacemos una condicion para determinar en que etapa de la vida esta
if edad > 0:
    if (edad <= 13) :
        print (f"Eres un niño")
    elif (edad > 13 and edad <= 17) :
        print (f"Eres un/a adolescente")
    elif (edad >= 18 and edad <= 64) :
        print (f"Eres un/a adulto/a")
    else :
        print (f"Eres un/a adulto/a mayor")