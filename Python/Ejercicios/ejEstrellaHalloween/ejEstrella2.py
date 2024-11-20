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
monstruo = {
    1: "momia",
    2: "zombie",
    3: "vampiro",
    4: "hombre lobo",
    5: "bruja", 
    6: "gargola",
    7: "frankestein",
}

objetos = ("estaca", "hechizo", "pocion magica", "ballesta", "hacha", "varita", "espada", "escopeta", "coctel molotov" )

#hacemos un contador de los intentos de captura
intentos = 3

#ahora haceos un booleano para el resultado del juego
resultado = False

#Funcion para capturar al monstruo
def seleccionar_monstruo(monstruo):
    probabilidad = random.randint(1,8)
    if monstruo == 1:
        if probabilidad == 1 or probabilidad == 2 or probabilidad == 3 or probabilidad == 4 or probabilidad == 5 or probabilidad == 6 or probabilidad == 7:
            return True
        else:
            return False
    elif monstruo == 2:
        if probabilidad == 1 or probabilidad == 2 or probabilidad == 3 or probabilidad == 4 or probabilidad == 5 or probabilidad == 6:
            return True
        else:
            return False
    elif monstruo == 3:
        if probabilidad == 1 or probabilidad == 2 or probabilidad == 3 or probabilidad == 4 or probabilidad == 5:
            return True
        else:
            return False
    elif monstruo == 4:
        if probabilidad == 1 or probabilidad == 2 or probabilidad == 3 or probabilidad == 4:
            return True
        else:
            return False
    elif monstruo == 5:
        if probabilidad == 1 or probabilidad == 2 or probabilidad == 3:
            return True
        else:
            return False
    elif monstruo == 6:
        if probabilidad == 1 or probabilidad == 2:
            return True
        else:
            return False
    elif monstruo == 7:
        if probabilidad == 1:
            return True
        else:
            return False


#Funcion de probabilidad de objeto
def objeto_probabilidad(objetos):
    objeto_prob = random.randint(1,4)
    if objetos == 3:
        if objeto_prob == 1 or objeto_prob == 2 or objeto_prob ==3:
            return True
        else:
            return False
    elif objetos == 2:
        if objeto_prob == 1 or objeto_prob == 2:
            return True
        else:
            return False
    elif objetos == 3:
        if objeto_prob == 1:
            return True
        else:
            return False


#################################################################################################################
print("¡Bienvenido a la caza de mostruos de Halloween!")
while intentos !=0:  #Un monstruo es seleccionado aleatoriamente y su dificultad y la del objeto se asignan.
    monstruo_random = random.randint(1,5)
    dificultad_random = random.randint(1,5)
    objetos_dificultad = random.randint(1,3)
    while intentos !=0: #Dentro del ciclo, el usuario elige un objeto y el programa evalúa si el monstruo fue capturado
        print(f"Tienes {intentos} intentos restantes ")
        print(f"Te has econtrado con un {monstruo[monstruo_random]} con un nivel de {dificultad_random}")
        print(f"Elige un objeto para intentar capturar al {monstruo[monstruo_random]}:  {', '.join(objetos)}")
        objeto_elegido = input("Escribe el nombre del objeto: ")
        print(f"Has seleccionado un {objeto_elegido} con un nivel {objetos_dificultad}")
        captura = seleccionar_monstruo(dificultad_random)
        objeto_captura = objeto_probabilidad(objetos_dificultad) 

        if objeto_elegido in objetos:
            if captura == True and objeto_captura == True:  # Si ambas condiciones se cumplen, se captura el monstruo y termina el juego.
                print(f"Has capturado al {monstruo[monstruo_random]} con {objeto_elegido}")
                resultado_juego = True
                intentos = 0
            elif captura == False:  #Si alguna de las condiciones falla, se reduce el número de intentos y se muestra un mensaje indicando el fallo.
                print(f"Fallaste al intentar capturar a {monstruo[monstruo_random]} con {objeto_elegido}")
                print("El monstruo era muy fuerte")
                intentos = intentos - 1
            elif objeto_captura == False:
                print(f"Fallaste al intentar capturar a {monstruo[monstruo_random]} con {objeto_elegido}")
                print ("EL objeto que has seleccionado era muy debil")
                intentos = intentos - 1
            elif objeto_captura == False and captura == False:
                print(f"Fallaste al intentar capturar a {monstruo[monstruo_random]} con {objeto_elegido}")
                print ("Selecciona algo correcto")
                intentos = intentos - 1
        else:
            print("Selecciona un objeto correcto")
<<<<<<< HEAD
if resultado_juego == True:
    print("Has ganado ")
elif resultado_juego == False:
=======
if resultado == True:
    print("Has ganado ")
elif resultado == False:
>>>>>>> c9b82aba953927e30daf3772c514caa52d26ca56
    print(f"Has perdido tu {monstruo[monstruo_random]} de nivel {dificultad_random} se ha escapado")