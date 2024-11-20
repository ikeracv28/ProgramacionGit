'''
Ejercicio 4: Redondear una Lista de Números Decimales
Enunciado: Tienes una lista de números decimales y quieres redondear cada uno de ellos. Utiliza la función map() y la función predefinida round().
Qué debes practicar:
Uso de la función map().
Aplicar funciones predefinidas de Python (round()).
Trabajar con números decimales y redondeo.
'''

#creamos la lista
lista = (2.7, 5.2, 7.4, 8.6, 10.9, 12.5)

#creamos la funcion para que nos redondee los numeros
def numeros_redondeados (numeros):
    return round(numeros)

#aplicamos la funcion map() para que redondee los numeros
resultado = list(map(numeros_redondeados, lista))
print(resultado)