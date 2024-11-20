'''
Ejercicio 5: Adivina el Número
Escribe un programa donde el usuario intente adivinar un número secreto entre 1 y 100. El programa debe indicar si el número ingresado es demasiado alto, demasiado bajo o correcto. El juego continúa hasta que el usuario adivine el número correctamente.

'''

#Para utilizar la función ramdom en python, es necesario importar la libreria que contiene esa función.
#Para importar librerías utilizaremos la palabra reservada import
import random

#creamos las variables que necesitamos 
numero_secreto = random.randint(1,100)
numero = 0

#hacemos un bucle while para que el bucle siga mientras el número no sea correcto y una condición para que le indique si es demasiado alto, demasiado bajo o correcto
#solicitamos los datos que necesitamos
while True :
    numero = int(input("Dime un número: "))
    if numero > numero_secreto :
        print("El número ingresado es es muy alto, prueba otra vez")
    elif numero < numero_secreto : 
        print( "El número ingresado es muy bajo, prueba otra vez")
    if numero == numero_secreto :
        break
print("¡Enhorabuena, el número es correcto!")

