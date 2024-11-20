'''
Ejercicio 2: Convertir una Lista de Frases a Títulos
Enunciado: Tienes una lista de frases y quieres que cada palabra empiece con mayúscula (convertir cada frase a título). Aplica la función title() a cada frase usando map().
Qué debes practicar:
Uso de la función map().
Aplicar métodos predefinidos de Python (.title()).
'''

#Lista de palabras
lista_frases = ("vinicius", "merecer", "balon")

#Funcion para que ponga mayuscula a cada palabra
def poner_mayuscula(palabra):
    return palabra.title()

#Aplicar map() para poner mayusculas en cada palabra
palabra_en_mayuscula = list(map(poner_mayuscula, lista_frases))
print(palabra_en_mayuscula)


