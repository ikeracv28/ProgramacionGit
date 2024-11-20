
import Python.Teoria.teoriacrud.conectarBDD as conectarBDD

"""def listar_departamentos():
    conexion = conectarBDD.conectaBBDD('empresa')

    # Crear un cursor
    cursor = conexion.cursor()


    # Escribir la consulta SQL
    consulta = """
    #"""SELECT nombredep
    #FROM departamento"""

    # Ejecutar la consulta
    #"""cursor.execute(consulta)

    # Obtener y mostrar los resultados
    #resultados = cursor.fetchall()  # Obtiene todos los resultados de la consulta
    #for nombredep in resultados:
        #print(f"Departamento: {nombredep}")


    # Cerrar el cursor y la conexión
    #cursor.close()
    #conexion.close()
    

########################################################################
def insertar_clientes():
        conexion = conectarBDD.conectaBBDD('ejercicios_crud')
        #crear un cursor
        cursor = conexion.cursor()
        #definir los datos del nuevo cliente
        #id, nombre, email, edad
        nuevo_cliente = (1, 'Rafa', 'Rafagustarnegros@gmail.com', 25 )

        #consulta SQL para insertar un nuevo cliente
        consulta = "INSERT INTO clientes (id, nombre, email, edad) VALUES (%s, %s, %s, %s,)"
        cursor.execute(consulta, nuevo_cliente)

        #confirmar los cambios en la base de datos
        conexion.commit()
        print("nuevo cliente insertado correctamente")

        cursor.close()
        conexion.close()



