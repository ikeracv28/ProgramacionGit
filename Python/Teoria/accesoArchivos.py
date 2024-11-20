'hay 4 formas de abrir un archivo de texto'

'r' 'Modo lectura, abre el archivo solo para leer. El archivo debe existir. Si no se encuentra el archivo, Python genera un error.'

'w'  'Modo de escritura. Crea un archivo nuevo o sobrescribe uno existente. Si el archivo ya tiene datos, estos se eliminarán.'

'a' 'Modo de anexar. Lo mismo que el w pero no sobrescribe, añade, si no existe lo crea'

'r+' 'Modo de lectura y escritura.' 'Permite leer y escribir pero el archivo debe existir o genera error'

'a''w' 'solo crean , el' 'r' 'lee y el' 'r+' 'lee y escribe'

def ejercicio():
    archivo = open('mi_archivo.txt', 'r')
    contenido = archivo.read()
    print(contenido)
    archivo.close()
    #el close hay que ponerlo SIEMPRE que se abran de esta manera

def main():
    ejercicio()

main()

#############################################################################

#2.1 Leer Todo el Contenido


def ejercicioconwith():
    with open('mi_archivo.txt', 'r') as archivo:
        contenido = archivo.read()
        print(contenido)


#################################################################



#2.2 Leer Líneas Individuales
#Si el archivo tiene varias líneas, podemos leerlas una a una con readline(). Este método lee la siguiente línea cada vez que se llama y nos permite procesar el archivo de manera incremental:

def leerlineasindividuales():
    with open('mi_archivo.txt', 'r') as archivo:
        linea = archivo.readline()
        while linea:
            print(linea.strip())
            #print('voy a leer otra linea')
            linea = archivo.readline()




#############################################################################

#strip elimina espacios innecesarios 

def leertodaslineascomolista():
    with open('mi_archivo.txt', 'r') as archivo:
        lineas = archivo.readlines()
        for linea in lineas:
            print(linea.strip())


###########################################################################


def main():
    #ejercicio()
    #ejercicioconwith()
    #leerlineasindividuales
    leertodaslineascomolista()


#############################################################################
def abrirlecturacontrolerrores():
    try:
        with open('archivo_inexistente.txt', 'r') as archivo:
            contenido = archivo.read()
    except FileNotFoundError:
        print('El archivo no fue encontrado.')

##########################################################################

def ejercicio():
    archivo = open('mi_archivo.txt', 'r')
    contenido = archivo.read()
    print(contenido)
    archivo.close()
#el close hay que ponerlo SIEMPRE que se abran de esta manera

####################################################################

#2.1 Leer Todo el Contenido

def ejercicioconwith():
    with open('mi_archivo.txt', 'r') as archivo:
        contenido = archivo.read()
        print(contenido)

def leerlineasindividuales():
    with open('mi_archivo.txt', 'r') as archivo:
        linea = archivo.readline()
        while linea:
            print(linea.strip())
            print('Voy a leer otra línea ')
            linea = archivo.readline()

def listacontodaslaslineas():
    with open('mi_archivo.txt', 'r') as archivo:
        lineas = archivo.readlines()
        print(lineas)
        for linea in lineas:
            print(linea.strip())

def escribirenarchivo():
    with open('mi_archivo2.txt', 'w') as archivo:
        archivo.write('Hola, este es un archivo de ejemplo.\n')
        archivo.write('Podemos escribir varias líneas así.')

def leerarchivo2():
    with open('mi_archivo2.txt', 'r') as archivo:
        lineas = archivo.readlines()
        print(lineas)

def appendenarchivo2():
    with open('mi_archivo2.txt', 'a') as archivo:
        archivo.write('\nLinea con apertura en append')

def contarlascosasdelarchivo():
    with open('mi_archivo.txt', 'r') as archivo:
        lineas = archivo.readlines()
        num_lineas = len(lineas)
        num_palabras = sum(len(linea.split()) for linea in lineas)
        num_caracteres = sum(len(linea) for linea in lineas)

    print(f'Líneas: {num_lineas}, Palabras: {num_palabras}, Caracteres: {num_caracteres}')

def abrirlecturacontrolerrores():
    try:
        with open('archivo_inexistente.txt', 'r') as archivo:
            contenido = archivo.read()
    except FileNotFoundError:
        print('El archivo no fue encontrado.')


def main():
    #ejercicio()
    #ejercicioconwith()
    #leerlineasindividuales()
    listacontodaslaslineas()
    escribirenarchivo()
    leerarchivo2()
    appendenarchivo2()
    leerarchivo2()
    contarlascosasdelarchivo()
    abrirlecturacontrolerrores()


main()