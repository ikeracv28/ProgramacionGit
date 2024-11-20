'''
Ejercicio 3: Filtrar empleados activos
Crea un programa que reciba una lista de empleados de una empresa con su estado laboral (activo o inactivo). Utiliza filter() para filtrar solo a los empleados que están actualmente activos y luego imprime sus nombres.
'''

#creamos la lista que necesitamos
lista_empleados = [
{"empleado": "iker", "estado": "activo"},
{"empleado": "marcos", "estado": "inactivo"},
{"empleado": "rafa", "estado": "activo"},
{"empleado": "richi", "estado": "inactivo"},
{"empleado": "alejandro", "estado": "inactivo"},
]

#ahora creamos la funcion
def empleados_activos(empleados):
    return empleados["estado"] == "activo"

#usamos filter para que muestre solo los empleados que estan trabajando ahora mismo

empleados_trabajan = list(filter(empleados_activos, lista_empleados))
print(empleados_trabajan)
