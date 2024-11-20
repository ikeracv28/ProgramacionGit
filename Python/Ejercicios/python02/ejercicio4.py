'''
Ejercicio 4: Verificación de contraseña
Descripción: Crea un programa que establezca una contraseña predefinida
y luego solicite al usuario que ingrese la contraseña. El programa debe
continuar solicitando la contraseña hasta que el usuario la ingrese
correctamente.
Instrucciones:
Define una variable con la contraseña (por ejemplo, "python123").
Usa un bucle while para solicitar al usuario que ingrese la contraseña.
Si la contraseña ingresada es incorrecta, muestra el mensaje
"Contraseña incorrecta, intenta de nuevo.".

Si la contraseña es correcta, imprime "¡Acceso concedido!" y termina el
bucle.
Ejemplo de interacción:
Contraseña establecida: "python123"

Entrada: "hola"
Salida: Contraseña incorrecta, intenta de nuevo.

Entrada: "python123"
Salida: ¡Acceso concedido!
'''

#Aqui le damos valor a las variables
contraseña_correcta = "python123"

#Hacemos un bucle while true
while True:
    contraseña_introducida = input("Escribe tu contraseña: ")
    if(contraseña_introducida == contraseña_correcta):
        print("Contraseña correcta. Bienvenido!")
        break
    else:
        print("Contraseña incorrecta, intentalo de nuevo")