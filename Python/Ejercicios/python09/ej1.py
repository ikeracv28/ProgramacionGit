'''
Ejercicio 1: Sumar dos arrays elemento por elemento
Enunciado: Crea dos arrays de Numpy de tamaño 5, llenos de números enteros. Luego, calcula la suma de ambos arrays elemento por elemento y muestra el resultado.
Motivo para usar arrays: Con Numpy, podemos sumar directamente dos arrays usando la operación +, sin necesidad de recorrer cada elemento manualmente como tendríamos que hacer con listas.
'''

#Importamos la libreria numpy
import numpy as np

#Aqui creamos nuestros arrays
array1 = np.array([2,3,5,7,11])
array2 = np.array([12,18,25,30,33])

#Una vez creados, ahora los sumamos
suma = array1 + array2

#Mostramos la suma
print(suma)
