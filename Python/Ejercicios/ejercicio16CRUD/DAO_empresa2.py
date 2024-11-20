import conectarBDD

def insertar():
    conexion = conectarBDD.conectaBBDD('empresa')
    #crear un cursor
    cursor = conexion.cursor()
    #pedir los datos que queremos registrar
    ('Vamos a ingresar un nuevo trabajador')
    dni = input('Dime el dni del nuevo trabajador: ')
    nombre = input('Dime el nombre del nuevo trabajador: ')
    ciudad = input('Dime la ciudad del nuevo trabajador: ')
    antigedad = input('Dime la antiguedad del nuevo trabajador: ')
    salario = input('Dime el salario del nuevo trabajador: ')
    departamento = input('Dime el departamento del nuevo trabajador: ')
    #insertar los datos en la base de datos
    insertarvalores = f"INSERT INTO trabajadores (dni, nombre, ciudad, antigedad, salario, departamento) VALUES ('{dni}', '{nombre}', '{ciudad}', '{antigedad}', '{salario}', '{departamento}')"
    cursor.execute(insertarvalores)
    #guardar los cambios en la base de datos
    conexion.commit()
    print('Trabajador ingresado correctamente')
    #cerrar la conexion
    cursor.close()
    conexion.close


def leer_trabajadores():
    conexion = conectarBDD.conectaBBDD('empresa')
    #crear un cursor
    cursor = conexion.cursor()
    #hacer la consulta que queremos
    ver_trabajadores = '''SELECT * FROM trabajadores'''
    cursor.execute(ver_trabajadores)
    #mostrar los datos
    datos = cursor.fetchall()
    for trabajadores in datos:
        print(trabajadores)
    cursor.close()
    conexion.close()

def modificar_registro():
    try:
        conexion = conectarBDD.conectaBBDD('empresa')
        #crear un cursor
        cursor = conexion.cursor()
        #pedir el dni del cliente que quieres cambiar
        dnitrabajadorcambiar = input('Dime el dni del trabajador que quieres modifcar: ')
        #solicitar al usuario los datos del trabajador que quiere modificar
        dni = input('Dime el dni del trabajador que quieres modificar: ')
        nombre = input('Dime el nuevo nombre del trabajador: ')
        ciudad = input('Dime la nueva ciudad del trabajador: ')
        antigedad = input('Dime la nueva antiguedad del trabajador: ')
        salario = input('Dime el nuevo salario del trabajador: ')
        departamento = input('Dime el nuevo departamento del trabajador: ')
        #hacer la consulta que queremos
        actualizar = f'''UPDATE departamento SET nombredep = '{nombrenuevo}' WHERE numdep = {numdep}'''
        cursor.execute(actualizar)
        conexion.commit()
        print('nombre de departamento actualizado correctamente')
    except Exception as e:
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