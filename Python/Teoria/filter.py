#La diferencia con map es que filter solo filtra y map opera

'''
Filtrar números pares
Supongamos que queremos quedarnos solo con los números pares de una lista de números.

'''

# Lista de números
numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

# Definir una función que devuelve True si el número es par
def es_par(n):
	return n % 2 == 0  #← Devolverá True o False

# Usar filter() para obtener solo los números pares
numeros_pares = filter(es_par, numeros)

# Convertir el resultado en una lista y mostrarlo
print(list(numeros_pares))


frase = "me gustan los sabados"
vocales = "aeiou"

def son_vocales(letras):
	for caracter in frase:
		if caracter in vocales:
			return caracter
		

print ({caracter})
