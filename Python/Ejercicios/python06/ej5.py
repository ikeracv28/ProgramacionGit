'''
Ejercicio 5: Filtrar tareas urgentes
Tienes una lista de tareas de un gestor de proyectos, y algunas de ellas están marcadas como urgentes. Utiliza filter() para obtener una lista de tareas urgentes y luego imprímelas.
'''

#creamos la lista
lista_tareas = [
{"proyecto": "hito", "categoria": "urgente"},
{"proyecto": "tareas calse", "categoria": " no urgente"},
{"proyecto": "examen", "categoria": "urgente"},
{"proyecto": "ejercicio estrella", "categoria": "no urgente"},
]

#creamos la funcion 
def proyectos_urgentes(proyecto):
    return proyecto["categoria"] == "urgente"

#Ahora usamos la funcion filter para sacar solo los urgentes
solo_urgentes = list(filter(proyectos_urgentes, lista_tareas))
print(solo_urgentes)