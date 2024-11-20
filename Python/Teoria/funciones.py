def saludar():
    print("¡Hola!")


def despedir():
    print("¡Hasta otra!")

#teoria
    #def nombre_de_la_funcion(parametro1, parametro2):
    # Código que usa los parámetros

#ejemplo

def saludovip(nombrevip, apellidovip):
    print(f"¡Hola {nombrevip} {apellidovip}!")

def pinta(numero):
    print('*'*numero)

def suma(numero1, numero2):
    resultado = numero1 + numero2
    return resultado                #cuando queramos devolver el valor hay que poner return y la variable que sea
    #return numero1 +numero2        #Tambien se podria hacer asi, pero mejor hacerlo de la otra
######################################################

nombre = "Iker"
apellido = "Acevedo"

#saludovip(nombre, apellido)

#repeticiones = int(input('Cuantos asteriscos quieres pintar: '))           #todo esto lo comentamos para que no nos lo muestre todo el rato

#pinta(repeticiones)

num1 = int(input("primer numero: "))
num2 = int(input("segundo numero: "))

print(suma(num1,num2))

#print(suma(18,35))


#multiplicar por 5 el resultado de la suma

#calculo = suma(18,35)  #lo comento para poder hacer otros ejemplos

calculo = suma(num1,num2)

print(calculo* 5)

