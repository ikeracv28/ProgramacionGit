'''
Ejercicio 1: Lista de reproducción musical
Recordatorio:
Lista: Una colección ordenada y modificable de elementos. Se define
usando corchetes [].
Descripción:
Crea un programa que permita al usuario crear una lista de reproducción
musical. El usuario puede agregar canciones a la lista y, al final,
mostrar la lista completa de canciones.
Instrucciones:
Solicita al usuario que ingrese los nombres de las canciones que quiere
agregar a su lista de reproducción. El usuario puede escribir "fin"
para terminar.
Almacena las canciones en una lista.
Al finalizar, muestra la lista completa de canciones.
Luego, permite al usuario seleccionar una canción por su índice para
"reproducirla" (simulado mediante un mensaje).
'''

#creamos las variables
lista_de_musica = []
canciones = ""
numero_cancion = 0

#creamos que un bucle while que se corte caundo escriba fin
while canciones != "fin" :
    canciones = input("Escribeme el nombre de una canción que te guste ( o fin para terminar): ")
    if canciones != "fin":
        lista_de_musica.append(canciones)

#Mostramos las lista de canciones que me ha ingresado
print(f"Esta es tu lista de musica {lista_de_musica}")
#Hacer un bucle que recorra la lista
for i, canciones in enumerate(lista_de_musica,1):
    print(f"{i}. {canciones}")
#Aqui mostramos la canción que el quiere reproducir
numero_cancion = int(input("Dime el número de la canción que quieres reproducir: "))
print(f"Reproduciendo la canción {lista_de_musica[numero_cancion - 1]}...")