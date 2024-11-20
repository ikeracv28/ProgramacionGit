'''
Ejercicio 2: Agenda de contactos
Recordatorio:
Diccionario: Una colección desordenada, modificable e indexada de
elementos. Se define usando llaves {} y se compone de pares
clave-valor.
Descripción:
Crea un programa que simule una agenda de contactos donde puedas
almacenar nombres y números de teléfono.
Instrucciones:
Permite al usuario agregar contactos ingresando el nombre y el número
de teléfono.
Almacena los contactos en un diccionario, donde el nombre es la clave y
el número de teléfono es el valor.

El usuario puede escribir "fin" como nombre para terminar la
introducción de contactos.
Al finalizar, muestra todos los contactos almacenados.
Permite al usuario buscar un contacto por nombre y muestra su número de
teléfono.
'''

#le damos valor a las variables
agenda_contactos = {}
contacto = ""
numero_tlf = 0
contacto_elegido = ""
#Ahora hacemos un bucle while para que vaya metiendo contactos y acabe cuando ponga fin
while contacto or numero_tlf != "fin":
    contacto = input("Ingresa el nombre del contacto (o fin para terminar) ")
    if contacto == "fin":
        break
    numero_tlf = int(input(f"Ingresa el número de telefono de {contacto}: "))
    agenda_contactos[contacto] = numero_tlf

#AHora mostramos la lista de contactos
print(f"Esta es tu lista de contactos; {agenda_contactos}")

#Ahora recorremos la lista de contactos
for contacto, numero_tlf in agenda_contactos.items():
    print(f"El telefono de {contacto} es: {agenda_contactos[contacto]}")

#Ahora queremos mostrar solo el contacto que nos pida
contacto_elegido = input("Dime el contacto que deseas buscar: ")
print(f"El telefono de {contacto_elegido} es {agenda_contactos[contacto_elegido]}")