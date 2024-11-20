import mysql.connector

def conectaBBDD(base_datos):

    # Establecer conexión con la base de datos
    conexion = mysql.connector.connect(
        host="localhost",       # Dirección del servidor (localhost para base de datos local)
        user="root",         # Usuario de la base de datos
        password="1234",  # Contraseña del usuario
        database=base_datos    # Nombre de la base de datos
    )

    return conexion

    # Verificar si la conexión es exitosa
    #if conexion.is_connected():
        #print("Conexión exitosa a la base de datos")



