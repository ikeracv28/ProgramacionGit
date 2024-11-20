import numpy as np



mi_lista = [1,2,3,4]
mi_array = np.array(mi_lista)

print(mi_array)

#########################

#NumPy también permite crear arrays multidimensionales (por ejemplo, matrices). Para crear una matriz de 2x3, puedes pasar una lista de listas:

mi_matriz = np.array( [ [ 1, 2, 3 ], [ 4, 5, 6 ] ] )
print(mi_matriz)

# Salida:
# [[1 2 3]    #El valor 2 sería el elemento (0,1) de mi array - fila 0 columna 1
#  [4 5 6]]   #El valor 6 sería el elemento (1,2) de mi array - fila 1 columna2

#IMPORTANTE, SIEMPRE SE EMPIEZA EN 0

########################################

#NumPy incluye funciones para crear arrays especiales de manera sencilla. Algunas de las más comunes son:

np.zeros()     #Crea un array de ceros
ceros = np.zeros((3, 4))
print(ceros)
# Salida: una matriz de 3x4 con todos los valores en 0



np.ones() #Crea un array de unos.
unos = np.ones((2, 2))
print(unos)
# Salida: una matriz de 2x2 con todos los valores en 1


np.arange() #Similar a range() en Python, crea un array con una secuencia de valores.
secuencia = np.arange(0, 10, 2)
print(secuencia)  # Salida: [0 2 4 6 8]


np.linspace() #Crea un array de valores espaciados uniformemente entre dos números.
valores = np.linspace(0, 1, 5)
print(valores)  # Salida: [0.   0.25 0.5  0.75   1.  ]


#Puedes sumar, restar, multiplicar y dividir arrays de forma directa.

array1 = np.array([1, 2, 3, 4])
array2 = np.array([10, 20, 30, 40])


suma = array1 + array2
print(suma)  # Salida: [11 22 33 44]


producto = array1 * array2
print(producto)  # Salida: [10 40 90 160]



