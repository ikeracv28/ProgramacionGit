<?php
require_once '../modelo/class_usuario.php';
require_once '../modelo/class_plan.php';
require_once '../modelo/class_paquete.php';

class UsuariosController
{
    private $usuario;
    private $plan;
    private $paquete;

    public bool $correcto;
    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->plan = new Plan();
        $this->paquete = new Paquete();
    }

    public function eliminarPlan($id_usuario){
        return $this->usuario->eliminarPlan($id_usuario);
    }

    public function agregarUsuario($nombre, $apellido, $correo_electronico, $contraseña, $edad)
    {
        // Verificar si el correo ya está registrado
        if ($this->usuario->correoExistente($correo_electronico)) {
            header("Location: login.php?error=correo_ya_registrado");
            exit();
        }

        // Validar que si el usuario es menor de edad, solo pueda contratar el plan infantil
        if ($edad < 18) {
            // Aquí puedes establecer el plan infantil como el único disponible
            // Por ejemplo, podrías redirigir a una página específica o establecer un valor predeterminado
            // header("Location: seleccionar_plan.php?error=solo_plan_infantil");
            // exit();
        }
        
        // Si el correo no está registrado, se agrega el usuario
        $correcto = $this->usuario->agregarUsuarioC($nombre, $apellido, $correo_electronico, $contraseña, $edad);
        $id = $this->usuario->obtenerUsuarioPorCorreo($correo_electronico);
        
        
            header("Location: añadir_plan.php?id=" . $id);
            exit();
        
    }

    public function seleccionarPlan()
    {
        return $this->usuario->agregarUsuarioPlan();
    }

    public function obtenerUsuarioCompleto()
    {
        return $this->usuario->obtenerUsuarioCompleto();
    }

    public function obtenerUsuarioPorId($id_usuario)
    {
        return $this->usuario->obtenerUsuarioPorId($id_usuario);
    }

    public function actualizarUsuario($nombre, $apellido, $correo_electronico, $contraseña, $edad)
    {
        $this->usuario->actualizarUsuario($nombre, $apellido, $correo_electronico, $contraseña, $edad);
    }

    public function eliminarUsuario($id_usuario)
    {
        $this->usuario->eliminarUsuario($id_usuario);
    }

    public function iniciarSesion($correo, $contraseña)
    {
        return $this->usuario->iniciarSesion($correo, $contraseña);
    }

    public function listarUsuariosSinPlan() {
        // Usamos el método de la clase Socio que recupera todos los usuarios de la base de datos
        return $this->usuario->obtenerUsuarioSinPlan();
    }

    public function añadirPlanUSuario($id_usuario, $id_plan/*, $nombre_plan, $dispositivos, $precio, $duracion_suscripcion*/) {
        // Usamos el método de la clase Socio que recupera todos los usuarios de la base de datos
        return $this->plan->agregarPlanUsuario($id_usuario, $id_plan);
    }

    public function obtenerPlanPorUsuario($id_usuario) {
        require_once '../modelo/class_usuario.php';
        return $this->usuario->obtenerPlanPorUsuario($id_usuario);
    }
    public function añadirPaqueteUsuario($id_usuario, $id_paquete1, $id_paquete2, $id_paquete3) {
        require_once '../modelo/class_usuario.php';
        return $this->usuario->insertarPaqueteUsuario($id_usuario, $id_paquete1, $id_paquete2, $id_paquete3);
    }
    public function insertarPaquete($id_usuario, $id_plan, $id_paquete1, $id_paquete2, $id_paquete3){
       return $this->usuario->insertarPaquete($id_usuario, $id_plan, $id_paquete1, $id_paquete2, $id_paquete3);
    }
    public function obtenerPlanPorId($id_usuario){
        return $this->usuario->obtenerPlanPorId($id_usuario);
    }
    public function obtenerUsuarioCompletoIndividual($usuario){
        return $this->usuario->obtenerUsuarioCompletoIndividual($usuario);
    }

    public function obtenerPaquetes(){
        return $this->usuario->obtenerPaquetes();
    }

}
