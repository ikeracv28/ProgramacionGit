'''
Ejercicio 3: Escribir Múltiples Líneas en un Archivo
Enunciado: Escribe un programa que cree un archivo de texto llamado notas.txt. El programa debe solicitar al usuario ingresar tres notas (como texto) y escribir cada una en una nueva línea del archivo. Luego, cierra el archivo.
'''

def creararchivotexto():
    archivo = open('notas.txt', 'w')
    nota1 = input(f'Escribeme una nota: ')
    nota2 = input(f'Escribeme la segunda nota:  ')
    nota3 = input(f'Escribeme la tercera nota:  ')
    archivo.write(f'{nota1} \n ' + f'{nota2} \n' + f'{nota3} ')
    archivo.close()

def main():
    creararchivotexto()

main()

#####################################################

#otra manera de hacerlo

def creararchivotexto():
    archivo = open('notas.txt', 'w')
    nota1 = input(f'Escribeme una nota: ')
    archivo.write(f'{nota1} \n')
    nota2 = input(f'Escribeme la segunda nota:  ')
    archivo.write(f'{nota2} \n')
    nota3 = input(f'Escribeme la tercera nota:  ')
    archivo.write(f'{nota3} \n')
    archivo.close()

def main():
    creararchivotexto()

main()