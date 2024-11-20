palabra_secreta = "python"

# HAcemos un bucle infinito
while True:
# Le pedimos al usuario que nos diga una palabra
    intento = input("Dime palabras hasta adivinar la palabra secreta ")

# Verificar si la palabra ingresada es correcta
    if intento.lower() == palabra_secreta:
        print("¡Felicidades! Has adivinado la palabra secreta.")
        break # Salir del bucle si adivina correctamente
    else:
        print("Palabra incorrecta. Prueba otra vez.")