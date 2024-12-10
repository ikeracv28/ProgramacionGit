#persona = {"nombre": "Juan", "edad": 30, "ciudad": "Madrid"}

#for clave in persona:
 #   print(persona[clave])


#contactos = {"Pedro":"44444444", "Juan":"33333333", "Nuria":"9999999"}

#for clave in contactos:
 #   print(f"El teléfono de {clave} es {contactos[clave]}") 


#Métodos útiles de los diccionarios:
#keys(): Devuelve una vista de todas las claves.
#values(): Devuelve una vista de todos los valores.
#items(): Devuelve una vista de todos los pares clave-valor.

stock_fruteria = {"manzana": 3, "banana": 2, "naranja": 1}
for cantidad in stock_fruteria.values():
    print(f"Tengo {cantidad}(s)")