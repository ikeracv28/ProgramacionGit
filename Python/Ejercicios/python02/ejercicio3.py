'''
Ejercicio 3: Recolección de nombres
Descripción: Escribe un programa que permita al usuario ingresar
nombres uno por uno. El usuario puede terminar de ingresar nombres
escribiendo "fin". Al final, el programa debe mostrar la lista completa
de nombres ingresados y luego mostrarlos uno por uno.
Instrucciones:
Usa un bucle while para solicitar nombres al usuario.
Si el usuario ingresa "fin", termina el bucle.
Almacena cada nombre ingresado en una lista.

Al finalizar, imprime la lista completa de nombres.
Usa un bucle for para imprimir cada nombre individualmente.
Ejemplo de interacción:
Entrada: Ana
Entrada: Luis
Entrada: Marta
Entrada: fin

Salida esperada:
Los nombres ingresados son: ['Ana', 'Luis', 'Marta']

Lista de nombres:
- Ana
- Luis
- Marta
'''
#Aqui le damos valor a las variables
nombreslist = []

#Hacemos un bucle while true
while True:
    nombre = input("Dime un nombre: ")
#Hacemos una condicion para que si la palabra es fin salga del bucle
    if nombre == "fin":
        break

#Aqui ponemos el nomre.append para que añada el nombre a la lista
    nombreslist.append(nombre)

#Mostramos los nombres de la lista todos juntos
print("Estos son los nombres de la lista ", nombreslist)

#Hacemos un bucle for para que nos muestre los nombres de la lista 1 a1
for nombre in nombreslist:
#Mostramos los nombres 1 a 1
    print(f"- {nombre}")