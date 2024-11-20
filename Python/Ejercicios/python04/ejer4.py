'''
Ejercicio 4: Sumar números hasta el límite
Crea una función llamada suma_hasta_limite que reciba un número entero
positivo limite. La función debe devolver la suma de todos los números
enteros desde 1 hasta el limite.
def suma_hasta_limite(limite):
# Tu código aquí
Ejemplo de uso:
print(suma_hasta_limite(5)) # Debería imprimir 15 (1 + 2 + 3 + 4 + 5)

'''

#primero creamos la función
def suma_hasta_limite(num_limite):
    suma = 0
    for num in range(1, limite ): #hacemos un bucle para que vaya sumando

        suma = suma + num
    return suma


limite = int(input("Dime un número "))
resultado = suma_hasta_limite(limite)
print(resultado) #Por último mostramos el resultado