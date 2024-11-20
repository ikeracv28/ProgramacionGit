# Lista de precios
precios = [100, 200, 300, 400]


# Usando map() para aumentar el 10% a cada precio
def aumentar_10_por_ciento(precio):
    return precio * 1.10


# Aplicar map() a la lista de precios
precios_aumentados = list(map(aumentar_10_por_ciento, precios))
print(precios_aumentados)


#############################
'''
Otro ejemplo
Ejemplo Cotidiano: Convertir Temperaturas
Imaginemos que tenemos una lista de temperaturas en grados Celsius y queremos convertirlas a Fahrenheit. Para ello, podemos usar map() junto con una función que realice la conversión.
La fórmula para convertir de Celsius a Fahrenheit es:
Fahrenheit = Celsius * 9/5 + 32
'''

# Lista de temperaturas en Celsius
temperaturas_celsius = [0, 20, 30, 40]


# Función para convertir a Fahrenheit
def celsius_a_fahrenheit(celsius):
    return celsius * 9/5 + 32


# Aplicar map() para convertir todas las temperaturas
temperaturas_fahrenheit = list(map(celsius_a_fahrenheit, temperaturas_celsius))
print(temperaturas_fahrenheit)


####################################

'''
Ejemplo 1: Elevar al Cuadrado Cada Elemento de una Lista
Supongamos que queremos elevar al cuadrado cada elemento de una lista de números:

'''

# Lista de números
numeros = [1, 2, 3, 4, 5]


# Función para elevar al cuadrado cada número
def elevar_al_cuadrado(numero):
    return numero * 2


# Aplicar map() para elevar al cuadrado todos los números
numeros_cuadrados = list(map(elevar_al_cuadrado, numeros))
print(numeros_cuadrados)

##############################


'''
Ejemplo 2: Convertir una Lista de Nombres a Mayúsculas
Imagina que tienes una lista de nombres y quieres convertir todos los nombres a mayúsculas:

'''

# Lista de nombres
nombres = ['ana', 'juan', 'maria', 'pedro']


# Función para convertir a mayúsculas
def convertir_a_mayusculas(nombre):
    return nombre.upper()


# Aplicar map() para convertir todos los nombres a mayúsculas
nombres_mayusculas = list(map(convertir_a_mayusculas, nombres))
print(nombres_mayusculas)
