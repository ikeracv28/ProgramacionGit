'''
Ejercicio 2: Filtrar vehículos con revisión pasada
Tienes una lista de vehículos con su estado de revisión técnica (aprobada o pendiente). Usa filter() para crear una lista con los vehículos que ya han pasado la revisión y luego muestra los resultados.
'''

#creamos la lista que vamos a utilizar
lista_vehiculos = [
{"coche": "audi", "revisión": "aprobada"},
{"coche": "mercedes", "revisión": "aprobada"},
{"coche": "toyota", "revisión": "pendiente"},
{"coche": "fiat", "revisión": "pendiente"},
{"coche": "renault", "revisión": "aprobada"},
]

#definimos la función que devuelve true si ya ha pasado la revision
def revision_aprobada (vehiculo):
    return vehiculo["revisión"] == "aprobada"

#usar filter() para que solo muestre los de revision aprobada

resultado = list(filter(revision_aprobada, lista_vehiculos))
print(resultado)