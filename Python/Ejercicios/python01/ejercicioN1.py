'''Ejercicio 1
Crea un programa que solicite al usuario dos números y una operación
matemática a realizar entre ellos: suma, resta, multiplicación o
división. El programa debe mostrar el resultado de la operación
seleccionada. Si el usuario elige división y el segundo número es cero,
debe mostrarse un mensaje de error.
'''

#inicializamos variables
numero1 = 0
numero2 = 0
operacion = ''

#solicitamos los datos necesarios
numero1 = int(input('Dame el primer numero '))
numero2 = int(input('Dame el segundo numero '))
operacion = input('dame operacion (suma, resta, multiplicacion,division): ').lower() #todo minusculas

#realizamos la operacion seleccionada
if operacion == 'suma':
    calculo = numero1 + numero2
    print(f"El resultado de la suma de {numero1} y {numero2} es {calculo}")
elif operacion == 'resta':
    calculo = numero1 - numero2
    print(f"El resultado de la resta de {numero1} y {numero2} es {calculo}")
elif operacion == 'multiplicacion':
    calculo = numero1 * numero2
    print(f"El resultado de la multiplicacion de {numero1} y {numero2} es {calculo}")
elif operacion == 'division':
    if numero2 == 0:
        print('No se puede dividir por cero')
    else:
        calculo = numero1 / numero2
        print(f"El resultado de la division de {numero1} y {numero2} es {calculo}")