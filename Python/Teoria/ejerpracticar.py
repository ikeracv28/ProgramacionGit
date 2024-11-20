'''
Ejercicio 1: Usar filter() para eliminar los números menores a 10
Dada la siguiente lista de números:
'''

# Lista de numeros
numeros = [4, 9, 16, 25, 1, 7, 12]

#definir la funcion que devuelva los números pares
def mayor_a_10(numero):
    return numero > 10

# usar filtro para obtener solo los numeros mayores a 10
numero_mayor_10 = filter (mayor_a_10, numeros)
print(list(numero_mayor_10))


'''
Ejercicio 2: Usar map() para convertir metros a centímetros
Dada la siguiente lista de alturas en metros:

'''

# Lista de alturas
alturas_metros = [1.60, 1.75, 1.80, 1.50]

# Función para convertir de metros a centimetros
def metros_a_centimetros(altura):
    return altura * 100


# Aplicar map() para convertir de metros a centimetros
conversion = list(map(metros_a_centimetros, alturas_metros))
print(conversion)