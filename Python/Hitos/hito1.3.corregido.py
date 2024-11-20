'''
CUESTION 3: Simular el funcionamiento de una cuenta bancaria (2.5 puntos): al iniciar el programa, pediremos el saldo inicial de la cuenta (puede ser un número decimal), si el saldo es menor que 0 se volverá a pedir hasta que sea correcto.
Posteriormente mostraremos un menú con las opciones, 1-ingresar dinero, 2-retirar dinero y 3- mostrar saldo y 4-salir, si la opción no es correcta se volver a pedir de nuevo hasta que sea correcta. No se pueden ingresar cantidades negativas y no podemos retirar dinero si nos quedamos en números rojos.
Máxima puntuación (3 puntos): incluir una opción más en el menú, estadísticas, que nos muestre cuantos ingresos y retiradas se han efectuado
'''


#Primero le damos los valores a las variables
eleccion = 0
#A la variable saldo le damos un valor negativo de primeras para que no salte el primer bucle while directamente
saldo = -5
contador_ingreso = 0
contador_retirada = 0







#Hacemos un bucle while para que pida el saldo inicial hasta que lo meta mayor que 0
while saldo < 0:
    saldo = float(input("Dime el saldo inicial de la cuenta: "))    #Aqui se le pide que nos ingrese su saldo para poder iniciar en la cuenta
    #Aqui hacemos una condición para que si el saldo es menor que 0, le de error y vuelva a intentarlo 
    if saldo < 0 :
        print(f"No es correcto, vuelve a intentarlo")

#Usamos un bucle while true para que muestre el menu todo el rato hasta que le definamos cuando queremos que salga con una condición dentro de este
while True: 
    print(f"Menu del banco" '\n'         #Esto se utiliza para hacer un salto de linea, para hacerlo mas bonito :)
            "1- Ingresar dinero" '\n'
            "2- Retirar dinero" '\n'
            "3- Mostrar saldo" '\n'
            "4- Mostrar movimientos" '\n'
            "5- Salir" '\n'
            )
    eleccion = int(input("Elige una opción: ")) #Aqui se guarda la elección del usuario  
    
    if eleccion > 5 or eleccion< 1:  #Hacemos esta condición para que si no elige ninguna de las opciones le salte el siguiente mensaje
            print(f"La opción no es correcta, vuelve a elegir una opción")

    #Aqui empezamos con las condiciones de segun lo que elija haremos una cosa o otra
    elif eleccion == 1 :
            dinero_ingreso = int(input("Indica el dinero que deseas ingresar: "))
            if dinero_ingreso < 0:
                print(f"Error, solo puedes ingresar valores positivos")
            else:
                saldo = saldo + dinero_ingreso      
                print(f"Ahora tienes en la cuenta {saldo} euros")
                contador_ingreso += 1   #Haremos un contador que vaya registrando los ingresos que va haciendo para mostrarlos más tarde en otra opción


    elif eleccion == 2 :
            dinero_retirado = int(input("Indica el dinero que deseas retirar: "))
            if dinero_retirado > saldo :
                print(f"Error, no puedes retirar más dinero del que dispones")
            else:
                saldo = saldo - dinero_retirado
                print(f"Ahora tienes en la cuenta {saldo} euros")
                contador_retirada += 1      #Haremos un contador que vaya registrando las retiradas que va haciendo para mostrarlos más tarde en otra opción


    elif eleccion == 3 :
            print(f"Dispones de {saldo} euros ")


    elif eleccion == 4 :       #Aqui mostraremos los contadores que hemos creado antes para mostrar los movimientos que hemos realizado
            print(f"Has ingresado {contador_ingreso} veces")
            print(f"Has retirado {contador_retirada} veces")


    elif eleccion == 5 :
            print(f"Adios, gracias por usar Ikerbank ")
            break