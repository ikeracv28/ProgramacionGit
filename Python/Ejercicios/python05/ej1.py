'''
Ejercicio 1: Sumar 5 a Cada Número de una Lista
Enunciado: Tienes una lista de números y quieres sumar 5 a cada número. Usa la función map() junto con una función definida por el usuario que realice la suma.
Qué debes practicar:
Uso de la función map().
Definir una función que realice una operación específica (en este caso, sumar 5).
'''

#Lista de numeros
lista = (1,3,6,8,12,4,15)

#Funcion para que sume 5 a cada numeros
def sumar_5 (numeros):
    return numeros + 5

#Aplicar map() para sumar 5 a cada numero
numero_mas_5 = list(map(sumar_5, lista))
print (numero_mas_5)


