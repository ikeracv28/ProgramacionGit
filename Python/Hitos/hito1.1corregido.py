'''
1: Mostrar figuras por pantalla (2,5 puntos): a través de un menú solicitaremos al
usuario que tipo de figura quiere mostrar (1-Cuadrado|2-Rectángulo), si la opción no es
correcta, se mostrará mensaje de error y se volverá a solicitar hasta que se correcta.
▪ Si ha seleccionada un cuadrado, pediremos su lado y mostraremos la figura, su área y
perímetro
▪ Si ha seleccionada un rectángulo, pediremos base y altura y mostraremos la figura, su área y
perímetro.
Ejemplos de ejecución:
Máxima puntuación (3 puntos): incluir una tercera opción en el menú, 3  Salir, se volverá
mostrar el menú hasta que el usuario seleccione 3.
'''


#Primero damos valor a las variables
opcion = 0
area_cuadrado = 0
perimetro_cuadrado = 0
area_rectangulo = 0
perimetro_rectangulo = 0




#Lo siguiente que tenemos que hacer es un bucle while true para que muestre el menu todo el rato hasta que de a la opción 3 y salga del bucle
while True:
    print(f"1-Cuadrado | 2-Rectangulo | 3-Salir ")
    #Ahora le pediremos que nos elija una de las tres opciones
    opcion = int(input("Elige una de las tres opciones: "))
    #Ahora haremos condiciones para que segun la opción que me elija, haga lo que pide el ejercicio
    if opcion == 1:
        #Pedimos el lado para para poder calcular el área y el perímetro
        lado_cuadrado = int(input("Dime un lado del cudrado: "))
        area_cuadrado = lado_cuadrado * lado_cuadrado
        perimetro_cuadrado = lado_cuadrado * 4
        #Mostramos el área y el perímetro del cuadrado
        print(f"El área del cuadrado es {area_cuadrado}")
        print(f"El perimetro del cuadrado es {perimetro_cuadrado}")
        #Hacemos un bucle for para que dibuje el cuadrado con asteriscos y lo mostramos
        for i in range (lado_cuadrado):
            print("*" * lado_cuadrado)

    #Haremos otra condición por si elige la opción 2 
    elif opcion == 2:
        #Pedimos la base y la altura para poder calcular el área y el perímetro
        base_rectangulo = int(input("Dime la base del rectángulo: "))
        altura_rectangulo = int(input("Dime la altura del rectángulo: "))
        area_rectangulo = base_rectangulo * altura_rectangulo
        perimetro_rectangulo = (base_rectangulo*2) + (altura_rectangulo*2)
        #Mostramos el área y el perímetro del rectángulo
        print(f"El área del rectangulo es: {area_rectangulo}")
        print(f"El perimetro del rectangulo es: {perimetro_rectangulo}")
        for i in range (altura_rectangulo):
            print(f"*"*base_rectangulo)

    #Haremos otra condición por si elige la opción 3
    elif opcion == 3:
        print(f"Adios, programa cerrado")
        break

    #Haremos otra condición por si elige otra opcion distintas a todas las anteriores
    else:
        print(f"Opción no valida, introduzca un número del 1 al 3 ")