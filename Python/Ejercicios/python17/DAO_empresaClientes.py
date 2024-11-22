import conectarBDD

def insertar_cliente2():
    conexion = conectarBDD.conectaBBDD("empresa")
    cursor = conexion.cursor()

    nuevo_nombre2 = input("Escribe el nombre: ")
    email = input("Escribe tu email: ")
    edad = input("Escribe tu edad: ")
    
    # Consulta SQL para insertar un nuevo cliente
    consulta_cliente = """
    INSERT INTO clientes (nombre, email, edad) 
    VALUES (%s, %s, %s);
    """
    cursor.execute(consulta_cliente, (nuevo_nombre2,  email, edad))
    conexion.commit()
    print("Nuevo cliente insertado")

    cursor.close()
    conexion.close()

def leer_datos2():
    conexion = conectarBDD.conectaBBDD("empresa")
    cursor = conexion.cursor()
    consulta_dato = "SELECT * FROM clientes;"
    
    # Ejecutar la consulta
    cursor.execute(consulta_dato)
    
    # Obtener y mostrar los resultados
    resultados = cursor.fetchall()  # Obtiene todos los resultados de la consulta
    print("\nLista de clientes:")
    for registro in resultados:
        print(registro)
    
    # Cerrar el cursor y la conexión
    cursor.close()
    conexion.close()

def modificar_cliente2():
    conexion = conectarBDD.conectaBBDD("empresa")
    cursor = conexion.cursor()
    
    id_existente = input("Introduce el ID del cliente a modificar: ")
    nuevo_nombre = input("Escribe el nuevo nombre: ")
    nuevo_email = input("Escribe el nuevo email: ")
    nueva_edad = int(input("Escribe la nueva edad: "))

    # Consulta SQL para actualizar el cliente
    consulta_modificar = f"""
    UPDATE clientes
    SET nombre = '{nuevo_nombre}',  email = '{nuevo_email}', edad = {nueva_edad} WHERE id = {id_existente};"""
    cursor.execute(consulta_modificar)
    
    # Confirmar los cambios en la base de datos
    conexion.commit()
    print("Dato actualizado")
    
    cursor.close()
    conexion.close()

def eliminar_registro2():
    conexion = conectarBDD.conectaBBDD("empresa")
    cursor = conexion.cursor()
    
    id_eliminar = input("Escribe el id que deseas eliminar: ")
    
    # Consulta SQL para eliminar el cliente
    consulta_eliminar = "DELETE FROM clientes WHERE id = (%s);"
    cursor.execute(consulta_eliminar, (id_eliminar))
    
    # Confirmar los cambios en la base de datos
    conexion.commit()
    print("Cliente eliminado correctamente")
    
    cursor.close()
    conexion.close()

def menuCLientes():
    while True:
        print("\n--- Menú: Tabla Clientes ---")
        print("1. Crear cliente")
        print("2. Leer clientes")
        print("3. Actualizar cliente")
        print("4. Eliminar cliente")
        print("5. Salir")

        opcion = input("Escribe tu opción: ")
        if opcion == "1":
            insertar_cliente2()
        elif opcion == "2":
            leer_datos2()
        elif opcion == "3":
            modificar_cliente2()
        elif opcion == "4":
            eliminar_registro2()
        elif opcion == "5":
            print("Hasta luego")
            break
        else:
            print("Opción no válida")