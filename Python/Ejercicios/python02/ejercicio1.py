'''
Ejercicio 1: Invertir una palabra
Descripción: Crea un programa que solicite al usuario una palabra y use
un bucle para invertirla.
Instrucciones:
Solicita una palabra al usuario.
Usa un bucle for para recorrer la palabra de forma inversa.
Construye una nueva cadena con las letras en orden inverso.
Imprime la palabra invertida.
Ejemplo de entrada:
palabra = "Python"
Salida esperada:
La palabra invertida es: nohtyP
'''

#Primero creamos las variables
palabra = ""
palabra_reves = ""

#Ahora le tenemos que pedir al usuario una palabra
palabra = input("Dime una palabra ")

#Ahora utilizamos un bucle for para recorrer la palabra
for letra in reversed(palabra):
    palabra_reves += letra

#Mostramos la palbra del reves
print("esta es la palabra del reves: " + palabra_reves)