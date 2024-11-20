'''
Ejercicio 1: Filtrar productos perecederos
Tienes una lista de productos en un almacén y algunos de ellos son perecederos (frutas, vegetales, etc.) mientras que otros no (enlatados, productos secos). Crea un programa que utilice filter() para obtener solo los productos perecederos y luego imprímelos.
'''

#primero creamos la lista
lista_almacen = ("frutas", "vegetales", "preparados", "embutidos")
perecederos = ("frutas", "vegetales")

#creamos la funcion que devuelve true si los productos son perecederos
def productos_perecederos (productos):
    return productos in perecederos

# Usar filter() para obtener solo los perecederos

caducan = list(filter(productos_perecederos, lista_almacen))
print(caducan)

