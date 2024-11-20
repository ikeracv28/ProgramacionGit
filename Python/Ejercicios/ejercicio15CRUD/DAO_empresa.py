import conectarBDD

def crear():
    conexion = conectarBDD.conectaBBDD('empresa')
    #crear un cursor
    cursor = conexion.cursor()
    #pedir los datos que queremos registrar
    nombredep = input('Dime el nombre del departamento que quieres crear: ')

    #ahora ingresamos los datos a la base de datos
    insertarvalores =(f'''INSERT INTO departamento (nombredep) VALUES ('{nombredep}'); ''')
    #confirmar los cambios en la base de datos
    cursor.execute(insertarvalores)
    conexion.commit()
    print("nuevo departamento creado correctamente")

    cursor.close()
    conexion.close()

def leer_departamentos():
    conexion = conectarBDD.conectaBBDD('empresa')
    #crear un cursor
    cursor = conexion.cursor()
    #hacer la consulta que queremos
    ver_departamentos = '''SELECT * FROM departamento'''
    cursor.execute(ver_departamentos)
    #mostrar los datos
    datos = cursor.fetchall()
    for departamento in datos:
        print(departamento)
    cursor.close()
    conexion.close()

def modificar_registro():
    conexion = conectarBDD.conectaBBDD('empresa')
    #crear un cursor
    cursor = conexion.cursor()
    #solicitar al usuario el numdep del registro que quiere modificar
    numdep = input('Dime el numero de departamento que desea modificar: ')
    nombrenuevo = input('Dime el nombre que le quieres poner: ')
    # Consulta SQL para actualizar la cantidad
    actualizar = f'''UPDATE departamento SET nombredep = '{nombrenuevo}' WHERE numdep = {numdep}'''
    cursor.execute(actualizar)
    conexion.commit()
    print('nombre de departamento actualizado correctamente')
    cursor.close()
    conexion.close()

def eliminar_registro():
    conexion = conectarBDD.conectaBBDD('empresa')
    #crear un cursor
    cursor = conexion.cursor()
    #solicitar al usuario el numdep del registro que quiere eliminar
    numdep = input('Dime el numero de departamento que quieres eliminar: ')
    # Consulta SQL para eliminar la cantidad
    eliminar =f'''DELETE FROM DEPARTAMENTO WHERE numdep = {numdep} '''
    cursor.execute(eliminar)
    conexion.commit()
    print('departamento eliminado correctamente')
    cursor.close()
    conexion.close()

#creamos la funcion menu 
def menu():
    while True:
        print('1. crear nuevo departamento')
        print('2. leer departamentos existentes')
        print('3. actualizar un departamento')
        print('4. eliminar un departamento')
        print('5. salir')

        eleccion = input('Dime una opcion del 1 al 5: ')

#hacemos condiciones para segun la opcion que elija se haga una funcion o otra
        if eleccion == '1':
            crear()
        elif eleccion == '2':
            leer_departamentos()
        elif eleccion == '3':
            modificar_registro()
        elif eleccion == '4':
            eliminar_registro()
        elif eleccion == '5':
            print('Gracias por usar nuestra aplicacion, adios')
            break
        else :
            print('Opcion no valida')












