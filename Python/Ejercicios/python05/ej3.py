'''
Ejercicio 3: Calcular el Doble de Cada Número en una Lista
Enunciado: Quieres calcular el doble de cada número en una lista. Crea una función que calcule el doble y úsala junto con map().
Qué debes practicar:
Uso de la función map().
Definir funciones matemáticas básicas (en este caso, multiplicar por 2).
Transformar elementos de una lista.
'''

#aqui ponemos la lista
lista = (2, 5, 7, 9, 13, 15)

#funcion para que calcule el doble de cada número 
def doble_numero (numeros):
    return numeros *2

#aplicar map () para que haga el doble de cada numero
numero_por_dos = list(map(doble_numero, lista))

print(numero_por_dos)
