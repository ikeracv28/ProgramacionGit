#damos valor a las variables
opcion_1 = "saludar"
opcion_2 = "despedirse"
opcion_3 = "preguntar como esta"
numero = 0

#mostramos el menu
print(f"1-saludar")
print(f"2-despedirse")
print(f"3-Preguntar como esta")
#le pedimos al usuario que nos diga un numero
numero = int(input("Dime un número "))

#hacemos una condición para depende el número que nos diga le muestre una opción
if numero == 1 :
    print(f"Hola, encantado de conocerte")
elif numero == 2 :
    print(f"Adios, ha sido un placer")
elif numero == 3 :
    print(f"¿Que tal estas?")
else :
    print(f"Opcion invalida, pon del 1 al 3")