'''
Ejercicio 2: Promedio de números hasta que se introduce un cero
Descripción: Crea un programa que solicite al usuario números enteros
de manera repetida. El programa debe calcular el promedio de los
números introducidos y terminar cuando el usuario ingrese un cero.
Instrucciones:
Usa un bucle while para seguir solicitando números.
Si el número ingresado es cero, termina el bucle.
Lleva un registro de la suma total y del conteo de números
introducidos.
Al finalizar, calcula y imprime el promedio de los números ingresados.
Ejemplo de entrada:
Entrada: 4
Entrada: 8
Entrada: 6
Entrada: 0

Salida esperada:
El promedio de los números introducidos es 6.0.
'''
#Aqui le damos valor a las variables
contador = 0
suma = 0

#Hacemos un bucle while true

while True:
    numero = int(input("Dime un numero "))
#Hacemos una condicion para que si el numero es 0 salga del bucle
    if numero == 0:
        break
    contador += 1
    suma = suma + numero
    promedio = suma / contador

#mostramos el promedio de los números
print(f"El promedio de los numeros es: es {promedio}")