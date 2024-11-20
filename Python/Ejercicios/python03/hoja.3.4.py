'''
Ejercicio 4: Registro de calificaciones
Recordatorio:
Lista y Diccionario: Combina listas y diccionarios para almacenar datos
más complejos.
Descripción:
Crea un programa que registre las calificaciones de diferentes
asignaturas.
Instrucciones:
Solicita al usuario que ingrese el nombre de las asignaturas y sus
calificaciones. El usuario puede escribir "fin" como asignatura para
terminar.
Almacena los datos en un diccionario donde la clave es la asignatura y
el valor es la calificación.
Al finalizar, muestra un resumen de las asignaturas y calificaciones.
Calcula y muestra la calificación media.
'''

#le damos valor a las variables
diccionario_asignaturas = {}
suma = 0
#Lo siguiente que tenemos que hacer es un bucle while true que solicite
#asignaturas y dentro haremos condiciones
while True:
    asignaturas = input("Ingresa el nombre de la asignatura (o 'fin' para terminar): ")
#dentro hacemos una condicion para que pare cuando sea fin
    if asignaturas == "fin":
    
#Mostramos el resumen de las calificaciones con un bucle for para que recorra el diccionario y nos enseñe
#la asignatura con su correspondiente nota
        print(f"Resumen de calificaciones: " )
        for asignaturas, calificacion in diccionario_asignaturas.items():
            print(f" {asignaturas} : {diccionario_asignaturas[asignaturas]}")
            #luegocalculamos la media de las notas que nos ha dado y se lo mostramos
            suma += diccionario_asignaturas[asignaturas]

            media = suma / len(diccionario_asignaturas)
            print(f"Calificación media: {media}")

            break
#Esto es que si la asignatura no es fin ingrese la calificacion y la añade al diccionario
    else:
        calificacion = int(input("Ingresa la calificación de " + asignaturas + " " ))
        diccionario_asignaturas[asignaturas] = calificacion