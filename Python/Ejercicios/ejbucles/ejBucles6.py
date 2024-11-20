'''
Ejercicio 6: Bucle while con contador
Descripción:
Crea un programa que cuente cuántas veces el usuario ingresa un número
negativo antes de ingresar un número positivo.
Instrucciones:

Inicializa un contador en 0.
Utiliza un bucle while que continúe hasta que el usuario ingrese un
número positivo.
En cada iteración, solicita al usuario que ingrese un número.
Si el número es negativo, incrementa el contador.
Cuando el usuario ingrese un número positivo, imprime cuántos números
negativos ingresó.
'''

#Ahora le damos un valor a las variables
contador_negativos = 0
numero = 0

#Utilizamos un bucle while
while (1 > 0) :
    numero = int(input("Dime un número "))
    if (numero < 0) :
        contador_negativos = contador_negativos + 1
    elif (numero > 0) :
        break

#Ahora mostramos el contador
print(f"Has introducido {contador_negativos} numeros negativos")