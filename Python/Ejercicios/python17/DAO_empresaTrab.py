import conectarBDD

def insertar_trabajador2():
    conexion = conectarBDD.conectaBBDD("empresa")
    cursor = conexion.cursor()

    nuevo_dni2 = input("Escribe el dni: ")
    nuevo_nombre2 = input("Escribe el nombre: ")
    ciudad = input("Escribe tu ciudad: ")
    antiguedad = input("Escribe tu antiguedad: ")
    salario = input("Escribe tu salario: ")
    departamento = input("Escribe tu departamento: ")

    # Consulta SQL para insertar un nuevo trabajador
    consulta_trabajador = """
    INSERT INTO trabajadores (dni, nombre, ciudad, antiguedad, salario, departamento) 
    VALUES (%s, %s, %s, %s, %s, %s)
    """
    cursor.execute(consulta_trabajador, (nuevo_dni2, nuevo_nombre2, ciudad, antiguedad, salario, departamento))
    conexion.commit()
    print("Nuevo trabajador insertado")

    cursor.close()
    conexion.close()

def leer_datos2():
    conexion = conectarBDD.conectaBBDD("empresa")
    cursor = conexion.cursor()
    consulta_dato = "SELECT * FROM trabajadores"
    
    # Ejecutar la consulta
    cursor.execute(consulta_dato)
    
    # Obtener y mostrar los resultados
    resultados = cursor.fetchall()  # Obtiene todos los resultados de la consulta
    print("\nLista de trabajador:")
    for registro in resultados:
        print(registro)
    
    # Cerrar el cursor y la conexión
    cursor.close()
    conexion.close()

def modificar_trabajador2():
    conexion = conectarBDD.conectaBBDD("empresa")
    cursor = conexion.cursor()
    
    dni_existente = input("Introduce el DNI del trabajador a modificar: ")
    nuevo_dni = input("Introduce el nuevo DNI: ")
    nuevo_nombre = input("Escribe el nuevo nombre: ")
    nueva_ciudad = input("Escribe la nueva ciudad: ")
    nueva_antiguedad = int(input("Escribe la nueva antigüedad (en años): "))
    nuevo_salario = float(input("Escribe el nuevo salario: "))
    nuevo_departamento = input("Escribe el nuevo departamento: ")

    # Consulta SQL para actualizar el trabajador
    consulta_modificar = """
    UPDATE trabajadores
    SET dni = %s, nombre = %s, ciudad = %s, antiguedad = %s,
    salario = %s, departamento = %s
    WHERE dni = %s
    """
    cursor.execute(consulta_modificar, (nuevo_dni, nuevo_nombre, nueva_ciudad, nueva_antiguedad, nuevo_salario, nuevo_departamento, dni_existente))
    
    # Confirmar los cambios en la base de datos
    conexion.commit()
    print("Dato actualizado")
    
    cursor.close()
    conexion.close()

def eliminar_registro2():
    conexion = conectarBDD.conectaBBDD("empresa")
    cursor = conexion.cursor()
    
    dni_eliminar = input("Escribe el dni que deseas eliminar: ")
    
    # Consulta SQL para eliminar el trabajador
    consulta_eliminar = "DELETE FROM trabajadores WHERE dni = (%s)"
    cursor.execute(consulta_eliminar, (dni_eliminar,))
    
    # Confirmar los cambios en la base de datos
    conexion.commit()
    print("trabajador eliminado correctamente")
    
    cursor.close()
    conexion.close()

def menuTrabajadores():
    while True:
        print("\n--- Menú: Tabla trabajadores ---")
        print("1. Crear trabajador")
        print("2. Leer trabajadores")
        print("3. Actualizar trabajador")
        print("4. Eliminar trabajador")
        print("5. Salir")

        opcion = input("Escribe tu opción: ")
        if opcion == "1":
            insertar_trabajador2()
        elif opcion == "2":
            leer_datos2()
        elif opcion == "3":
            modificar_trabajador2()
        elif opcion == "4":
            eliminar_registro2()
        elif opcion == "5":
            print("Hasta luego")
            break
        else:
            print("Opción no válida")