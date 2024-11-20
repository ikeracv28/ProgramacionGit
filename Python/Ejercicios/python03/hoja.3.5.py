'''
Ejercicio 5: Menú de cafetería
Recordatorio:
Diccionario y Tupla: Utiliza un diccionario donde cada clave es un
elemento del menú y el valor es una tupla con el precio y las calorías.
Descripción:
Crea un programa que muestre el menú de una cafetería y permita al
usuario hacer un pedido.
Instrucciones:

Define un diccionario con elementos del menú como claves y una tupla
(precio, calorías) como valor.
Muestra el menú al usuario.
Permite al usuario seleccionar productos para agregarlos a su pedido
escribiendo el nombre del producto. El usuario puede escribir "fin"
para terminar.
Al finalizar, muestra el total a pagar y las calorías totales del
pedido.
'''

#Este es el menú
menu = {
"Café": (1.5, 50),
"Té": (1.0, 0),
"Bocadillo": (3.0, 300),
"Ensalada": (2.5, 150)
}

while True:
    print(f"Menú "  '/n'
          f"- Cafe: (1.5, 50)" '/n'
          f"- Té: (1.5, 50)" '/n'
          f"- Bocadillo: (1.5, 50)" '/n'
          f"- Ensalada: (1.5, 50)" '/n'
          )
