import numpy as np

# Suma de Arrays
# Crear dos arrays de tamaño 5
array1 = np.array([1, 2, 3, 4, 5])
array2 = np.array([10, 20, 30, 40, 50])

# Sumar los arrays elemento a elemento
suma = array1 + array2

print("Suma de los arrays:", suma)
#####################
# Multiplicación de Arrays

# Crear un array de tamaño 6
array = np.array([2, 4, 6, 8, 10, 12])

# Multiplicar cada elemento por 3
resultado = array * 3

print("Array multiplicado por 3:", resultado)
##################
# Promedio del Array
import numpy as np

# Crear un array con 10 números
array = np.array([10, 20, 30, 40, 50, 60, 70, 80, 90, 100])

# Calcular el promedio
promedio = np.mean(array)

print("Promedio del array:", promedio)
####################
# Filtro de elementos mayores a 5
import numpy as np

# Crear un array de tamaño 8
array = np.array([3, 5, 7, 9, 2, 4, 8, 10])

# Filtrar los elementos mayores a 5
filtro = array[array > 5]

print("Elementos mayores a 5:", filtro)
##################
# Elementos al cuadrado 
import numpy as np

# Crear un array de tamaño 5
array = np.array([1, 2, 3, 4, 5])

# Elevar al cuadrado cada elemento
cuadrados = array ** 2

print("Elementos al cuadrado:", cuadrados)
