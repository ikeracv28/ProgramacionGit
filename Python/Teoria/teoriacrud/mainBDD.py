#programa principal para probar conexionj a BBDD
import Python.Teoria.teoriacrud.conectarBDD as conectarBDD

conexion = conectarBDD.conectaBBDD('ejercicios_crud')

#verificar si lña conexion es exitosa
#if conexion.is_connected():
    #print("Conexión exitosa a la base de datos")

###################################################################################
# Crear un cursor
cursor = conexion.cursor()


# Crear una tabla llamada 'usuarios'
cursor.execute("""
    CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(255),
        email VARCHAR(255),
        edad INT
    )
""")


print("Tabla 'ususarios' creada con éxito")


# Cerrar el cursor y la conexión
cursor.close()
conexion.close()

