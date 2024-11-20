'''
Ejercicio 5: Bucle for con if
Descripción:
Escribe un programa que imprima las letras de una palabra ingresada por
el usuario, pero solo las vocales.
Instrucciones:
Solicita al usuario que ingrese una palabra.
Utiliza un bucle for para recorrer cada letra de la palabra.
Utiliza una estructura if para verificar si la letra es una vocal (a,
e, i, o, u).
Si la letra es una vocal, imprímela.
'''
#Primero damos valor a las variables
frase = ""

#Ahora definimos cuales son las vocales
vocales = "aeiou"

#Ahora le pedimos al usuario que nos diga una frase
frase = input("Dime la frase que mas te guste ").lower()

#Ahora utilizamos un bucle for para recorrer cada letra de la frase
for letra in frase :
    if letra in vocales:
        print(f"las vocales son {letra}")