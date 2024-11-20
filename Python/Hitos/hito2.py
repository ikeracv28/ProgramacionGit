# aqui importamos la libreria random
import random

# aqui definimos las listas
# diccionario que almacena los clientes, donde la clave es el DNI y el valor es el nombre
listaregistro = {}
# lista que almacena los productos seleccionados por el cliente              
listacarrito = []   
# lista de productos de deportes disponibles en la tienda            
listaproductosdeporte = [           
    {"producto": "balon", "precio": 20},
    {"producto": "raqueta", "precio": 80},
    {"producto": "pesas", "precio": 15},
    {"producto": "patines", "precio": 45},
    {"producto": "bicicleta", "precio": 300},
    {"producto": "comba", "precio": 10},
    {"producto": "saco de boxeo", "precio": 60},
    {"producto": "guantes de boxeo", "precio": 30},
    {"producto": "esquis", "precio": 35},
    {"producto": "canasta", "precio": 40},
    {"producto": "frisby", "precio": 20}
]

# diccionario que almacena los pedidos, donde la clave es el número de pedido y el valor es un diccionario con los detalles
listapedidos = {}                

# ahora hacemos una funcion para registrar e iniciar sesion de los clientes
def registroclientes(lista):
    while True:
        # Pedimos el DNI del cliente para iniciar sesión
        DNIcliente = input('Dime tu DNI de usuario para iniciar sesion: ')
        if DNIcliente in lista:
            # si el DNI ya existe, el cliente está registrado y termina la función
            lista[DNIcliente]
            return True
        else:
            # si no está registrado, solicitamos el registro
            print('Este DNI no esta registrado como cliente, tienes que registrarte')
            clienteregistro = input('Escribe tu DNI para realizar el registro: ')
            nombrecliente = input('Dime tu nombre: ')
            # añadimos el cliente al diccionario de registro
            lista[clienteregistro] = nombrecliente
            for clienteregisto, nombrecliente in lista.items():
                print(f'{clienteregisto}: {nombrecliente}')


# función para ver todos los clientes registrados
def verclientes(lista_clientes):
    # convertir el diccionario en una lista de strings de forma "DNI: Nombre"
    lista_buena = ", ".join([f"{dni}: {nombre}" for dni, nombre in lista_clientes.items()])
    # mostramos la lista de clientes
    print(f'Esta es su lista actual de clientes:\n{lista_buena}')


# función para buscar un cliente por su DNI
def buscarclientes(lista_clientes):
    while True:
        # solicitamos el DNI a buscar
        busqueda = input('¿Qué DNI quiere buscar? si introduces un fin se finaliza la busqueda: ')
        if busqueda.lower() == 'fin':
            # si el usuario escribe "fin", terminamos la búsqueda
            print('Has puesto fin, dejamos de buscar')
            # salimos del bucle
            break 
        elif busqueda in lista_clientes:
            # si el DNI se encuentra, mostramos el nombre
            print(f'Cliente encontrado: {lista_clientes[busqueda]}')
        else:
            #si no está registrado, avisamos al usuario
            print('DNI no encontrado en la lista de clientes.')

# hacemos una funcion para que muestre nuestra lista de productos
def mostrarproductosdeporte():
    print('Estos son nuestros productos disponibles:')
    for item in listaproductosdeporte:
        print(f"{item['producto']} - Precio: {item['precio']}€")

# función para añadir productos al carrito
def añadirproductoacarrito():
    mostrarproductosdeporte() 
    while True:
        # solicitamos el nombre del producto a añadir
        añadirproductoacarro = input('Selecciona qué quieres añadir al carrito (escribe "fin" para salir): ')
        if añadirproductoacarro.lower() == 'fin':
            # si el usuario escribe "fin", terminamos el bucle de compra
            print("Saliendo de la compra.")
            break

        # buscar el producto seleccionado
        for item in listaproductosdeporte:
            if item['producto'].lower() == añadirproductoacarro.lower():
                # añadir el producto al carrito
                listacarrito.append(item)
                print(f"{item['producto']} se  añadió al carrito.")
                break
        else:
            # si no se encuentra el producto, informamos al usuario
            print(f"El producto '{añadirproductoacarro}' no se ha encontrado. Inténtalo nuevamente.")

# función para mostrar el contenido del carrito y el total
def mostrarcarrito():
    if not listacarrito:
        # si el carrito está vacío, mostramos un mensaje
        print("No hay ningun producto en el carrito.")
    else:
        # mostramos cada producto y calculamos el total
        print("\nProductos en el carrito:")
        total = 0
        for item in listacarrito:
            print(f"{item['producto']} - Precio: {item['precio']}€")
            total += item['precio']
        print(f"El total de la compra es: {total}€")

# función para realizar la compra y generar un número de pedido
def comprar(DNI_cliente):
    if not listacarrito:
        # si el carrito está vacío, no se puede realizar la compra
        print("No hay productos en el carrito, no puedes realizar ninguna compra.")
        return None
    
    # generar un número de pedido aleatorio
    numero_pedido = random.randint(1,100)
    # almacenar el pedido con los detalles del cliente y los productos
    listapedidos[numero_pedido] = {
        "DNI_cliente": DNI_cliente,
        # crear una copia de la lista de productos
        "productos": listacarrito[:],  
        # calculamos el total
        "total": sum([item['precio'] for item in listacarrito])
    }
    
    # limpiar el carrito después de la compra
    listacarrito.clear()

    print(f"¡Se ha completado la compra con exito! Este es tu numero de pedido: {numero_pedido}")
    return numero_pedido

# función para el seguimiento de un pedido por su número
def seguimiento_compra(numero_pedido):
    if numero_pedido in listapedidos:
        # obtenemos el pedido y mostramos detalles
        pedido = listapedidos[numero_pedido]
        try:
            # buscamos el nombre del cliente en la lista de registro usando el DNI
            cliente = listaregistro[pedido["DNI_cliente"]]
        except KeyError:
            # si el DNI no está registrado, mostramos "cliente no registrado"
            cliente = "Cliente no registrado"  
        
        print(f"\nDetalles del pedido {numero_pedido}:")
        print(f"Cliente: {cliente}")
        print("Productos:")
        for item in pedido["productos"]:
            print(f"- {item['producto']} - {item['precio']}€")
        print(f"Total: {pedido['total']}€")
    else:
        print("Este pedido no se ha encontrado.")

# registro de cliente o inicio de sesión
DNI_cliente = registroclientes(listaregistro)

# mostrar menu de oopciones al cliente
def menu():
    while True:
        print("\nMenú de la tienda de deportes:")
        print("1. Ver clientes ")
        print("2. Buscar cliente ")
        print("3. Ver productos disponibles")
        print("4. Añadir productos al carrito")
        print("5. Ver carrito")
        print("6. Realizar compra")
        print("7. Seguimiento de compra")
        print("8. Salir")
        
        opcion = input("Selecciona una opción entre (1-8): ")

        # hacemos condiciones para que depende de la opción que elija llame a una función o a otra
        if opcion == "1":
            verclientes(listaregistro)
        elif opcion == "2":
            buscarclientes(listaregistro)
        elif opcion == "3":
            mostrarproductosdeporte()
        elif opcion == "4":
            añadirproductoacarrito()
        elif opcion == "5":
            mostrarcarrito()
        elif opcion == "6":
            numero_pedido = comprar(DNI_cliente)
            if numero_pedido:
                print(f"Compra realizada con exito. Número de pedido: {numero_pedido}")
        elif opcion == "7":
            numero_pedido = int(input("Introduce el número de pedido para el hacer seguimiento: "))
            seguimiento_compra(numero_pedido)
        elif opcion == "8":
            print("Saliendo de la aplicación.")
            break
        else:
            print("Opción no válida. Inténtalo nuevamente.")

# ejecutar el menú
menu()


