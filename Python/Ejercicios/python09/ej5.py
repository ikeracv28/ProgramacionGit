'''
Ejercicio 5: Elevar al cuadrado cada elemento de un array
Enunciado: Crea un array de Numpy con 5 elementos enteros. Calcula el cuadrado de cada elemento y muestra el resultado.
Motivo para usar arrays: Numpy permite aplicar operaciones matemáticas, como la potenciación, a cada elemento de un array en una sola operación. Esto es mucho más eficiente que hacer un bucle para elevar cada elemento al cuadrado en una lista.
'''

#Importamos la libreria numpy
import numpy as np

#creamos el array
array = np.array ([2,4,6,8,10])

#Aqui elevamos al cuadrado cada número de nuestro array
elevado_cuadrado = array **2

#mostramos el resultado
print(elevado_cuadrado)