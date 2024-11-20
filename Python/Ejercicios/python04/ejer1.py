'''
Ejercicio 1: Contar números pares
Escribe una función llamada contar_pares que reciba una lista de números y devuelva la cantidad de números pares en la lista.

def contar_pares(numeros):
# Tu código aquí

Ejemplo de uso:
print(contar_pares([1, 2, 3, 4, 5, 6]))  # Debería imprimir 3

'''

#creamos la lista y le damos el 
lista = []


#creamos la funcion contador pares
#creamos un contador para que cuente cuantos numeros pares hay

def contar_pares(listanumeros):
    contador = 0
    contador_pares = list(range(0,10,2))
    print(f"los pares son: {contador_pares}")
    for numero in contador_pares:
        contador = contador + 1
    print(contador)


contar_pares(lista)



#manera correcta de hacerlo

lista = list(range(10)) #generamos una lista de 10 numeros
def contar_pares(listanumeros):
    contador = 0
    for numero in listanumeros:
        if (numero % 2 == 0):
            contador += 1
    return contador




numeros_pares = contar_pares(lista) 
print(f"Los pares de esa cadena son: {numeros_pares}")

