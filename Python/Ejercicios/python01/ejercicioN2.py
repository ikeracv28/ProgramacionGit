'''
Ejercicio 2: Número Par o Impar
Escribe un programa que pida al usuario un número y determine si es par o impar. El programa debe imprimir un mensaje indicando si el número es par o impar.
'''

#creamos las variables que necesitamos
numero = 0

#solicitamos los datos necesarios
numero = int(input("Dame el numero"))

#ahora hacemos la condicion para saber si el numero es par o impar
if numero %2 == 0 :
    print (f"El numero {numero} es par")
else:
    print (f"El numero {numero} es impar")
