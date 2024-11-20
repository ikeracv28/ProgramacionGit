'''
Ejercicio 4: Filtrar libros por categoría
En una librería online, tienes una lista de libros con diferentes categorías (novela, ensayo, poesía, etc.). Usa filter() para filtrar solo los libros de la categoría "novela" y muestra los resultados.
'''

#creamos la lista que nos piden
lista_libros = [
{"libro": "donde estara el patin de richi", "categoria": "detectives"},
{"libro": "marcos y su maletin", "categoria": "novela"},
{"libro": "iker y sus compinches", "categoria": "novela"},
{"libro": "rafa no sabe programar", "categoria": "terror"},
{"libro": "alejandro y sus toros", "categoria": "aventuras"},
]

#creamos la funcion
def libros_novelas(libros):
    return libros["categoria"] == "novela"

#usamos la funcion filter() para que nos saque solo los que son novelas
son_novelas = list(filter(libros_novelas, lista_libros))
print(son_novelas)

