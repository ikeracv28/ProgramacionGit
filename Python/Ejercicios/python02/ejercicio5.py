'''
Ejercicio 5: Encontrar el número mayor en una lista
Descripción: Escribe un programa que solicite al usuario ingresar números uno por uno. El usuario puede terminar de ingresar números escribiendo "hecho". Luego, usa un bucle para encontrar y mostrar el número mayor de los ingresados.
Instrucciones:
Usa un bucle while para solicitar al usuario que ingrese números.
Si el usuario ingresa "hecho", termina el bucle.
Convierte las entradas en números y almacénalos en una lista.
Usa un bucle for para recorrer la lista y encontrar el número mayor.
Imprime el número mayor encontrado.
Ejemplo de interacción:
Entrada: 3
Entrada: 7
Entrada: 2
Entrada: 9
Entrada: hecho

Salida esperada:
El número mayor ingresado es 9.
'''

#Primero inicializamos las variables
valor = 0
intentos = 3
numeroslist= []

def encontrar_mayor():
    while True:
        numeros = (input('Dime numeros, para cabar escribe hecho: '))
        if numeros == 'hecho':
            numeroslist.append(numeros)
            break
        
def mostrar():
    for numero in numeroslist:
        if numero > numeroslist:
            numeromayor= numero
            print('El número mayor ingresado es:', numeromayor)

encontrar_mayor()
mostrar()
