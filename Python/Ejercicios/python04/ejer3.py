'''
Ejercicio 3: Comprobar si un número es primo
Escribe una función llamada es_primo que reciba un número entero y
devuelva True si el número es primo, y False si no lo es. Un número
primo es aquel que solo tiene dos divisores: 1 y él mismo.
def es_primo(numero):
# Tu código aquí
'''

num = int(input("Dime un número ")) #Aqui le pedimos el número al usuario
def es_primo(numero): #creamos la función

    for n in range(2,numero): #Hacemos un bucle que recorra el rango

        if numero % n == 0:
            return False
    return True
resultado = es_primo(num)
print(resultado) #Por ultimo mostramos el resultado
