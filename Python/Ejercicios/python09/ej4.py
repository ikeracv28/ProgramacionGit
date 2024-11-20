'''
Ejercicio 4: Filtrar elementos mayores a un valor dado
Enunciado: Crea un array de Numpy con 8 números enteros. Luego, crea un nuevo array que solo contenga los elementos mayores a 5 y muéstralo.
Motivo para usar arrays: Con Numpy, puedes aplicar filtros de manera muy rápida usando operaciones de comparación en una sola línea. Filtrar listas de esta forma requeriría escribir bucles y condicionales adicionales.
'''

#Importamos la libreria numpy
import numpy as np

#creamos el array
array1 = np.array([1,2,3,4,5,6,7,8])

#tenemos que sacar los elemntos mayores a 5 
array2= array1[array1 > 5]

#mostramos el resultado
print(array2)
