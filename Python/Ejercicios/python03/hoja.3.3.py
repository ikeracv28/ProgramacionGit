'''
Ejercicio 3: Planificación de un viaje
Recordatorio:
Tupla: Una colección ordenada e inmutable de elementos. Se define
usando paréntesis ().
Descripción:
Estás planificando un viaje y tienes una lista de ciudades que quieres
visitar en orden. Como el itinerario no va a cambiar, utiliza una tupla
para almacenarlas.
Instrucciones:
Define una tupla con las ciudades que planeas visitar.
Muestra el itinerario completo al usuario.
Permite al usuario ingresar una posición para saber qué ciudad visitará
en ese orden.
'''

#damos valor a las variables
itinerario = ("Praga", "Berlín", "Japon", "Tailandia", "Mykonos")
#Este print lo usaremos para enseñarle el itinerario igual que el ejemplo ciudad a ciudad
print(f"Itinerario de viaje" '\n'
f"1. {itinerario[0]}" '\n'
f"2. {itinerario[1]}" '\n'
f"3. {itinerario[2]}" '\n'
f"4. {itinerario[3]}" '\n'
f"5. {itinerario[4]}" '\n'
)
#Ahora vamos a pedirle que ingrese la posición de que dia vamos a ver esa ciudad y se la mostraremos
posicion = int(input("Ingresa la posición para saber qué ciudad visitarás: "))
print(f"En la posición {posicion} visitarás {itinerario[posicion -1]}")
