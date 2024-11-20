'''
Ejercicio 4: Leer un Archivo Línea por Línea
Enunciado: Crea un archivo de texto llamado alumnos.txt con una lista de nombres de alumnos (puedes crear este archivo manualmente con al menos 5 nombres, cada uno en una línea). Escribe un programa que abra el archivo y muestre cada nombre en pantalla, uno por línea.
'''

def creararchivo():
    with open('alumnos.txt', 'w') as archivo:
        lineas = archivo.readlines()
        print(lineas)
        for linea in lineas:
            print(linea.strip())
        archivo.close()


def mostrararchivoconnombrenecadalinea():
    archivo = open('alumnos.txt', 'r')
    contenido = archivo.read()
    print(contenido)
    archivo.close()



def main():
    mostrararchivoconnombrenecadalinea()

main()
