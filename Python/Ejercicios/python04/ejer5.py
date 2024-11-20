'''
Ejercicio 5: Contar vocales en una cadena
Escribe una función llamada contar_vocales que reciba una cadena de
texto y devuelva el número de vocales (a, e, i, o, u) que contiene.

def contar_vocales(cadena):
# Tu código aquí
Ejemplo de uso:
print(contar_vocales("Hola Mundo")) # Debería imprimir 4
'''

cadena_texto = input("Dime una frase: ") #Aqui le pedimos la frase al usuario
def contar_vocales(cadena): #creamos la función
    contador = 0 #creamos un contador
    vocales = "aeiou"
    for letra in cadena: #Hacemos un bucle que recorra la palabra

        if letra in vocales.lower():
            contador += 1
    return contador
    
resultado = contar_vocales(cadena_texto)
print(resultado) #Por ultimo mostramos el resultado