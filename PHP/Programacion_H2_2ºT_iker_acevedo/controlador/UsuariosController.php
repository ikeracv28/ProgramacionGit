<?php
require_once '../modelo/class_usuario.php'; // incluimos la clase Usuario para poder trabajar con ella

class UsuariosController {
    private $usuario; // aquí guardamos la instancia de la clase Usuario

    // constructor de la clase, donde creamos un objeto Usuario
    public function __construct() {
        $this->usuario = new Usuario(); // creamos el objeto Usuario
    }

    // método para agregar un nuevo usuario, recibe nombre, apellido, correo y contraseña
    public function agregarUsuario($nombre, $apellido, $correo, $contraseña) {
        return $this->usuario->agregarUsuario($nombre, $apellido, $correo, $contraseña); // llamamos el método de la clase Usuario que se encarga de agregarlo
    }

    // método para iniciar sesión, recibe el correo y la contraseña del usuario
    public function iniciarSesion($correo, $contraseña) {
        return $this->usuario->iniciarSesion($correo, $contraseña); // verificamos si el usuario existe y puede iniciar sesión
    }

    // método para obtener los datos de un usuario por su id
    public function obtenerUsuarioPorId($id_usuario) {
        return $this->usuario->obtenerUsuarioPorId($id_usuario); // devolvemos la info del usuario usando su id
    }

    // método para editar la información de un usuario
    public function editarUsuario($id_usuario, $nombre, $apellido, $correo) {
        return $this->usuario->editarUsuario($id_usuario, $nombre, $apellido, $correo); // actualizamos la info del usuario con los nuevos datos
    }

    // método para agregar tareas a un usuario, recibe el id del usuario y la descripción de la tarea
    public function agregarTareas($id_usuario, $descripcion) {
        return $this->usuario->agregarTareas($id_usuario, $descripcion); // agregamos la tarea al usuario
    }

    // método para obtener las tareas de un usuario
    public function obtenerTareas($id_usuario) {
        return $this->usuario->obtenerTareas($id_usuario); // devolvemos las tareas del usuario
    }

    // método para añadir una nueva tarea
    public function añadirTarea($id_usuario, $descripcion) {
        return $this->usuario->añadirTarea($id_usuario, $descripcion); // añadimos una nueva tarea
    }

    // método para eliminar una tarea, recibimos el id de la tarea
    public function eliminarTarea($id_tarea) {
        return $this->usuario->eliminarTarea($id_tarea); // eliminamos la tarea con el id indicado
    }

    // método para marcar una tarea como completada
    public function completarTarea($id_tarea) {
        return $this->usuario->completarTarea($id_tarea); // cambiamos el estado de la tarea a completada
    }
}
?>

