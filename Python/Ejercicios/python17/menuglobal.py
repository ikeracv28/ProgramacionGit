import DAO_empresaDepart as DAOdep
import DAO_empresaClientes as DAOclientes
import DAO_empresaTrab as DAOtrab  

def menuglobal():
    while True:
        print("\n--- Menú Global ---")
        print('1. Ir al menu de departamentos')
        print('2. Ir al menu de clientes')
        print('3. Ir al menu de trabajadores')
        print('4. Salir')
        eleccion = input('Ingrese la opcion que desee: ')
        
        if eleccion == '1':
            DAOdep.menuDepart()
        elif eleccion == '2':
            DAOclientes.menuCLientes()
        elif eleccion == '3':
            DAOtrab.menuTrabajadores()
        elif eleccion == '4':
            print('Gracias por utilizar el sistema')
            break
        else:
            print('Opcion invalida, por favor ingrese una opcion valida')