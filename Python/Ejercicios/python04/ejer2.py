'''
Ejercicio 2: Encontrar el máximo en una lista
Crea una función llamada encontrar_maximo que reciba una lista de números y devuelva el número más alto de la lista. No puedes usar la función max() de Python.
def encontrar_maximo(numeros):
# Tu código aquí

Ejemplo de uso:
print(encontrar_maximo([3, 5, 2, 9, 1]))  # Debería imprimir 9
'''

#creamos la variable que vamos a utilizar
lista = list(range[10])


#creamos la función
def encontrar_maximo(listanumeros):
    numeros2= 0
    for numeros in (listanumeros):
        if numeros > numeros2:
            numeros2  = numeros
    return numeros2


mayor_numero = encontrar_maximo(lista)

print(mayor_numero)
        












