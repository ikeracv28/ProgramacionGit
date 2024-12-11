contactos = {"Ana": "555-1234", "Carlos": "555-5678"}
print(contactos["Ana"])  # Devuelve "555-1234"
print("_______________________________")
contactos["Laura"] = "555-4321"  # Añadir nuevo contacto
contactos["Ana"] = "555-0000"  # Modificar número de "Ana"
print(contactos)
del contactos["Carlos"]
print("_______________________________")
for nombre, telefono in contactos.items():
    print(nombre, ":", telefono)
print("_______________________________")
print("###############################################")
# Diccionario de contactos
contactos = {"Ana": "555-1234", "Carlos": "555-5678", "Laura": "555-4321"}

# Crear listas vacías para nombres y teléfonos
nombres = []
telefonos = []

# Recorrer el diccionario y agregar las claves y valores a las listas
for nombre, telefono in contactos.items():
    nombres.append(nombre)
    telefonos.append(telefono)

print("Nombres:", nombres)
print("Teléfonos:", telefonos)
print("###############################################")
# Diccionario de contactos original
contactos = {"Ana": "555-1234", "Carlos": "555-5678", "Laura": "555-4321"}

# Convertir claves y valores en listas independientes
nombres = list(contactos.keys())     # Lista de nombres
telefonos = list(contactos.values()) # Lista de teléfonos

# Imprimir el primer elemento de nombres
print("Primer elemento de nombres:", nombres[0])

# Imprimir el segundo elemento de teléfonos
print("Segundo elemento de teléfonos:", telefonos[1])

# Volver a unir los nombres y teléfonos en un diccionario
contactos_reconstruidos = dict(zip(nombres, telefonos))

# Imprimir el diccionario reconstruido
print("Diccionario reconstruido:", contactos_reconstruidos)
print("__________________")
# Convertir las claves y valores a listas para una mejor impresión
print("Llaves:", list(contactos.keys()))
print("Valores:", list(contactos.values()))

# Ejercicio 

contactos = {
    "Luis": "555-4321",
    "Ana": "555-6789",
    "Carlos": "555-1122",
    "Marta": "555-3344",
    "Raúl": "555-5566"
}

# 1. Imprimir el número de teléfono de Carlos
print(contactos["Carlos"])

# 2. Imprimir el número de teléfono de Marta
print(contactos["Marta"])

# 3. Imprimir todos los nombres (claves) en el diccionario
for nombres in contactos.keys():
    print(nombres)

# 4. Imprimir todos los números de teléfono (valores) en el diccionario
for numeros in contactos.values():
    print(numeros)

# 5. Convertir las claves y los valores en listas
nombres = list(contactos.keys())
print(nombres)

numeros = list(contactos.values())
print(numeros)

# 6. Reconstruir el diccionario utilizando las listas de nombres y números
reconstruido = dict(zip(nombres, numeros))

# 7. Imprimir el diccionario reconstruido
print(reconstruido)
