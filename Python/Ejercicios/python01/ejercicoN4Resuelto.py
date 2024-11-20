'''
Ejercicio 4: Contador de Vocales
Crea un programa que pida al usuario una cadena de texto y cuente cuántas vocales hay en la cadena. El programa debe considerar las vocales a, e, i, o, u en mayúsculas y minúsculas.
'''
#inicializams las variables

contador = 0

#solicitamos datos necesarios
texto = input('dame una cadena de texto: ').lower()

#realizamos el conteo de las vocales
#al ser el tipo string un tipo iterable, podemos recorrer una cadena de texto caracter a caracter
#utilizremos un bucle for para recorrer la cadena

for caracter in texto:
    #if caracter == "a" or caracter == "e" or caracter == "i" or caracter == "o" or caracter == "u" :
        #contador = contador + 1
    if caracter in "aeiou":
        contador = contador + 1

#mostramos cuantas vocales tiene la cadena de texto
print(f"la cadena de texto tiene {contador} vocales")

