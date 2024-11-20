'''
Juego de piedra papel o tijera (2,5 puntos). El usuario introduce un valor (1- Piedra|2- Papel|3- Tijera), si no es correcto se volver a pedir de nuevo hasta que se correcta.
La “maquina” generará un valor aleatorio (de 1 a 3) para elegir piedra, papel o tijera. Al finalizar, mostrará la opción del usuario y de la máquina e indicará si hemos ganado, perdido o
empatado.
'''


#Para utilizar la función ramdom en python, es necesario importar la
#libreria que contiene esa función.
#Para importar librerías utilizaremos la palabra reservada import
import random
#Primero damos valor a las variables
valor = 0
contador_usuario = 0
contador_maquina = 0

#Esta variable, que es un diccionario, se crea para que a la hora de mostrar la elección del usuario y de la máquina,
#Muestre el nombre especificado ( piedra, papel o tijera ), en vez de el numero elegido, simplemente para que quede más claro
opciones_juego = {
    1: "Piedra",
    2: "Papel",
    3: "Tijera"
}


#Hacemos un bucle while true para que siempre muestre el menu despues de cada ronda
while True:
    eleccion_usuario = int(input("Elige 1- Piedra | 2- Papel | 3- Tijera:  "))
    #Aqui le damos un valor random a la máquina del 1 al 3 para que en cada ronda elija un número distinto
    numero_random = random.randint(1,3)
    print(f"El juador ha elegido {opciones_juego[eleccion_usuario]}")
    print(f"La máquina ha elegido {opciones_juego[numero_random]}")

    #Empezaremos a hacer condiciones para que según lo que elija el usuario muestre un mensaje o otro, habrá que hacer tantas condiciones como opciones posibles haya
    if eleccion_usuario == numero_random:
        print(f"Empate, ¡prueba otra vez!")
    elif eleccion_usuario == 1 and numero_random == 2:
        print(f"Has perdido!! :( ")

        #He creado una variable contador para que cuente cuantas partidas lleva ganadas el usuario y cuantas la máquina, depende de quien haya ganado la ronda
        contador_maquina +=1        #Este es el contador de las partidas ganadas que lleva la máquina ya que en esta ronda ha ganado ella
        print(f"La máquina lleva {contador_maquina} partidas ganadas")  #Este print lo he creado para que cada ronda vaya mostrando cuantas partidas ganadas
        print(f"El usuario lleva {contador_usuario} partidas ganadas")  #Lleva el usuario y cuantas la máquina, para que al usuario no le pille por sorpresa
    elif eleccion_usuario == 1 and numero_random == 3:
        print(f"Has ganado!! :) ")
        contador_usuario +=1        #Este es el contador de las partidas ganadas que lleva el usuario ya que en esta ronda ha ganado él
        print(f"La máquina lleva {contador_maquina} partidas ganadas")
        print(f"El usuario lleva {contador_usuario} partidas ganadas")
    elif eleccion_usuario == 2 and numero_random == 1:
        print(f"Has ganado!! :) ")
        contador_usuario +=1
        print(f"La máquina lleva {contador_maquina} partidas ganadas")
        print(f"El usuario lleva {contador_usuario} partidas ganadas")
    elif eleccion_usuario == 2 and numero_random == 3:
        print(f"Has perdido!! :( ")
        contador_maquina +=1
        print(f"La máquina lleva {contador_maquina} partidas ganadas")
        print(f"El usuario lleva {contador_usuario} partidas ganadas")
    elif eleccion_usuario == 3 and numero_random == 1:
        print(f"Has perdido!! :( ")
        contador_maquina +=1
        print(f"La máquina lleva {contador_maquina} partidas ganadas")
        print(f"El usuario lleva {contador_usuario} partidas ganadas")
    elif eleccion_usuario == 3 and numero_random == 2:
        print(f"Has ganado!! :) ")
        contador_usuario +=1
        print(f"La máquina lleva {contador_maquina} partidas ganadas")
        print(f"El usuario lleva {contador_usuario} partidas ganadas")
    
    #Estas dos condiciones las he creado para que cuando la máquina o el usuario llegue a 3 partidas ganadas se acabe el bucle y acabe el juego
    if contador_maquina == 3:
        print(f"¡¡La máquina ha ganado el juego tras ganar 3 partidas!!")

        break  #El break es para que salga del bucle cuando se cumpla la condición citada     

    elif contador_usuario ==3:
        print(f"¡¡El usuario ha ganado el juego tras ganar 3 partidas!!")
        break