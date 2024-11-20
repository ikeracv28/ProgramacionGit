'''
Ejercicio 2: Multiplicar cada elemento de un array por un número
Enunciado: Crea un array de Numpy de tamaño 6 con valores enteros de tu elección. Luego, multiplica cada elemento del array por 3 y muestra el resultado.
Motivo para usar arrays: La multiplicación escalar con arrays es mucho más eficiente en Numpy, ya que la operación se aplica directamente a cada elemento sin necesidad de un bucle.
'''
#Importamos la libreria numpy
import numpy as np

#creamos el array
array = np.array([1,3,7,9,11,15])

#ahora multiplicamos cada elemento por 3
multiplicacion = array *3

#Ahora mostamos el resultado
print(multiplicacion)


