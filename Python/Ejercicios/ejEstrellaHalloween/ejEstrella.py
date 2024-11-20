'''
"Caza de Monstruos de Halloween"
Descripción:
En este ejercicio, se pide desarrollar un programa para capturar monstruos de Halloween como vampiros, momias y brujas. Cada monstruo tiene un nivel de dificultad para ser capturado, y el jugador debe usar objetos (como estacas, pociones o hechizos) para intentar capturarlos. 
Deberán utilizarse listas para los monstruos y objetos, diccionarios para asignarles atributos y poder interactuar con ellos, y también deberán usar bucles, condicionales, funciones, y importación de librerías.
Instrucciones:
El programa debe importar la librería random para seleccionar monstruos y calcular probabilidades de captura.
Los monstruos deben estar almacenados en una lista, y cada monstruo debe tener un nivel de dificultad de captura (por ejemplo, entre 1 y 5). Los datos de los monstruos se deben almacenar en un diccionario.
El jugador puede elegir entre diferentes objetos para intentar capturar al monstruo (estaca, poción mágica, hechizo).
Cada intento de captura tiene una probabilidad de éxito basada en el nivel de dificultad del monstruo y el objeto elegido. Esta probabilidad debe ser generada con la librería random.
El jugador tiene tres intentos por cada monstruo antes de que el monstruo escape.
El programa debe terminar cuando el jugador capture un monstruo o se quede sin intentos.
Conceptos que practican:
Bucles: Para iterar sobre los intentos del jugador y la lista de monstruos.
Condicionales: Para determinar si el monstruo ha sido capturado o no.
Funciones: Para organizar el código en bloques como la selección de monstruos, el cálculo de probabilidad de captura, etc.
Listas y diccionarios: Para almacenar monstruos, objetos y sus atributos.
Importación de librerías: Para usar la librería random.
Listas de monstruos y objetos
# Lista de monstruos y sus niveles de dificultad 
monstruos = { 'vampiro': 3, 'momia': 2, 'bruja': 4, 'esqueleto': 1, 'fantasma': 5 } 
# Lista de objetos para capturar
'''
#importamos el diccionario random
import random

#creamos las listas que vamos a utilizar

monstruos = [
{"nombre": "momia"},
{"nombre": "zombie", "dificultad": 5},
{"nombre": "vampiro", "dificultad": 4},
{"nombre": "hombre lobo", "dificultad": 3},
{"nombre": "bruja", "dificultad": 1},
{"nombre": "gargola", "dificultad": 3},
{"nombre": "frankestein", "dificultad": 4},
]

objetos = ("estaca", "hechizo", "pocion magica", "ballesta", "hacha", "varita", "espada", "escopeta", "coctel molotov" )

# Probabilidades de captura según nivel de dificultad
probabilidad_captura = [
{"nivel": 1, "probabilidad": '90%'},
{"nivel": 2, "probabilidad": '75%'},
{"nivel": 3, "probabilidad": '50%'},
{"nivel": 4, "probabilidad": '35%'},
{"nivel": 5, "probabilidad": '20%'},
]
intentos = 3

#############################################################################################

#Esta funncion es para seleccionar un monstruo aleatorio
def monstruo_aleatorio():
    return random.choice(monstruos)

#Esta es la funcion del juego
def capturar_monstruo():
    intentos = 3
    monstruos = monstruo_aleatorio()
    nombre_monstruo = monstruos["nombre"]
    dificultad_monstruo = monstruos["dificultad"]
    return print(f"Un {nombre_monstruo} ha aparecido con nivel {dificultad_monstruo}")
        

#Esta es la funcion de la probabilidad de captura
def intentar_captura(dificultad):
    probabilidad = probabilidad_captura[dificultad]
    return random.randint(1, 100) <= probabilidad



##########################################


print("¡¡Bienvenido a la caza de monstruos de Halloween!! ")

while True:
    monstruo_juego = capturar_monstruo()
    print(f"Tienes {intentos} intentos restantes")
    print(f"Elige un objeto para intentar capturar al {monstruos[monstruo_juego]}: estaca, hechizo, pocion magica, ballesta, hacha, varita, espada, escopeta, coctel molotov")
    objeto_elegido = input("Escribe el nombre del objeto elegido: ")
    if objeto_elegido != objetos.items():
        print(f"Objeto no valido, elige un objeto de la lista")
        objeto_elegido = input("Escribe el nombre del objeto elegido: ")
    else:
        continue
    capturar = intentar_captura()


