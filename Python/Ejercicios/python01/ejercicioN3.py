'''
Ejercicio 3: Suma de los N Primeros Números
Diseña un programa que solicite al usuario un número entero positivo NNN y calcule la suma de todos los números desde 1 hasta NNN. El programa debe mostrar el resultado de la suma.
'''

#creamos las variables que necesitamos
nnn = 0
suma = 0

#solicitamos los datos necesarios
nnn = int(input("Dame el numero"))

#utilizaremos un bucle for para recorrer los numeros desde 1 hasta nnn
if nnn >0:
    for i in range (1,nnn) :
        suma= suma + i

#le decimos al programa que muestre la suma de los numeros del rango
print(f"La suma de los numeros que hay en el rango es {suma}")