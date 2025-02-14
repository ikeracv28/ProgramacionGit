<?php
// se importan las clases necesarias para manejar la lógica de usuarios, planes y paquetes
require_once '../modelo/class_usuario.php';
require_once '../modelo/class_plan.php';
require_once '../modelo/class_paquete.php';

class UsuariosController
{
    // declaramos las propiedades que vamos a utilizar, instanciando las clases necesarias
    private $usuario;
    private $plan;
    private $paquete;

    // esta propiedad es un indicador de si la operación fue correcta o no
    public bool $correcto;

    public function __construct()
    {
        // inicializamos las clases dentro del constructor para tenerlas listas
        $this->usuario = new Usuario();
        $this->plan = new Plan();
        $this->paquete = new Paquete();
    }

    // método para eliminar el plan de un usuario, recibe el id del usuario
    public function eliminarPlan($id_usuario)
    {
        return $this->usuario->eliminarPlan($id_usuario);
    }

    // método para agregar un nuevo usuario, recibe varios parámetros como nombre, apellido, correo, contraseña y edad
    public function agregarUsuario($nombre, $apellido, $correo_electronico, $contraseña, $edad)
    {
        // verificamos si el correo ya está registrado en la base de datos
        if ($this->usuario->correoExistente($correo_electronico)) {
            // si el correo ya está registrado, redirigimos al login con un mensaje de error
            header("Location: login.php?error=correo_ya_registrado");
            exit();
        }

        // validamos que si el usuario es menor de edad, solo pueda contratar el plan infantil
        if ($edad < 18) {
            // en caso de ser menor de edad, podríamos redirigirlo a una página específica
            // header("Location: seleccionar_plan.php?error=solo_plan_infantil");
            // exit();
        }

        // si el correo no está registrado, agregamos el nuevo usuario a la base de datos
        $correcto = $this->usuario->agregarUsuarioC($nombre, $apellido, $correo_electronico, $contraseña, $edad);
        // obtenemos el id del usuario recién agregado para redirigirlo a la página de selección de plan
        $id = $this->usuario->obtenerUsuarioPorCorreo($correo_electronico);

        // redirigimos a la página de añadir plan
        header("Location: añadir_plan.php?id=" . $id);
        exit();
    }

    // método para seleccionar un plan, lo que podría implicar agregar un plan a un usuario
    public function seleccionarPlan()
    {
        return $this->usuario->agregarUsuarioPlan();
    }

    // obtenemos todos los usuarios completos
    public function obtenerUsuarioCompleto()
    {
        return $this->usuario->obtenerUsuarioCompleto();
    }

    // obtenemos un usuario en específico por su id
    public function obtenerUsuarioPorId($id_usuario)
    {
        return $this->usuario->obtenerUsuarioPorId($id_usuario);
    }

    // método para actualizar los datos de un usuario
    public function actualizarUsuario($nombre, $apellido, $correo_electronico, $contraseña, $edad)
    {
        $this->usuario->actualizarUsuario($nombre, $apellido, $correo_electronico, $contraseña, $edad);
    }

    // eliminamos un usuario de la base de datos usando su id
    public function eliminarUsuario($id_usuario)
    {
        $this->usuario->eliminarUsuario($id_usuario);
    }

    // método para iniciar sesión con correo y contraseña
    public function iniciarSesion($correo, $contraseña)
    {
        return $this->usuario->iniciarSesion($correo, $contraseña);
    }

    // obtenemos los usuarios que no tienen un plan asignado
    public function listarUsuariosSinPlan()
    {
        return $this->usuario->obtenerUsuarioSinPlan();
    }

    // agregamos un plan a un usuario específico
    public function añadirPlanUSuario($id_usuario, $id_plan/*, $nombre_plan, $dispositivos, $precio, $duracion_suscripcion*/)
    {
        return $this->plan->agregarPlanUsuario($id_usuario, $id_plan);
    }

    // obtenemos el plan de un usuario usando su id
    public function obtenerPlanPorUsuario($id_usuario)
    {
        require_once '../modelo/class_usuario.php';
        return $this->usuario->obtenerPlanPorUsuario($id_usuario);
    }

    // método para agregar paquetes a un usuario
    public function añadirPaqueteUsuario($id_usuario, $id_paquete1, $id_paquete2, $id_paquete3)
    {
        require_once '../modelo/class_usuario.php';
        return $this->usuario->insertarPaqueteUsuario($id_usuario, $id_paquete1, $id_paquete2, $id_paquete3);
    }

    // método para insertar un paquete a un usuario
    public function insertarPaquete($id_usuario, $id_plan, $id_paquete1, $id_paquete2, $id_paquete3)
    {
        return $this->usuario->insertarPaquete($id_usuario, $id_plan, $id_paquete1, $id_paquete2, $id_paquete3);
    }

    // obtenemos el plan de un usuario por id
    public function obtenerPlanPorId($id_usuario)
    {
        return $this->usuario->obtenerPlanPorId($id_usuario);
    }

    // obtenemos información completa de un usuario individual
    public function obtenerUsuarioCompletoIndividual($usuario)
    {
        return $this->usuario->obtenerUsuarioCompletoIndividual($usuario);
    }

    // obtenemos los paquetes disponibles
    public function obtenerPaquetes()
    {
        return $this->usuario->obtenerPaquetes();
    }
}
?>

