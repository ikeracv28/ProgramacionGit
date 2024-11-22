import DAO_empresaDepart as DAOdep
import DAO_empresa21 as DAOtrabajadores

def menuglobal():
    while True:
        print('1. Ir al menu de departamentos')
        print('2. Ir al menu de trabajadores')
        print('3. Salir')
        eleccion = input('Ingrese la opcion que desee: ')
        
        if eleccion == '1':
            DAOdep.menu()
        elif eleccion == '2':
            DAOtrabajadores.menu21()
        elif eleccion == '3':
            print('Gracias por utilizar el sistema')
            break
        else:
            print('Opcion invalida, por favor ingrese una opcion valida')