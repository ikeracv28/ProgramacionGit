'''
Ejercicio 3: Bucle while con condición
Descripción:
Escribe un programa que solicite al usuario un número y luego imprima
todos los números desde ese número hasta cero.
Instrucciones:
Solicita al usuario que ingrese un número entero positivo.
Utiliza un bucle while que continúe mientras el número sea mayor o
igual a cero.
En cada iteración, imprime el número actual y luego decrementa su valor
en 1.
'''

#Primero le damos un valor a las variables
numero = 0

#Ahora le tenemos que pedir un numero al usuario
numero = int(input("Dime un número positivo "))

#Ahora tenemos que hacer una condición para que si el número es
#positivo ya empezar a hacer el bucle

while numero >= 0:
    print(numero)
    numero -= 1