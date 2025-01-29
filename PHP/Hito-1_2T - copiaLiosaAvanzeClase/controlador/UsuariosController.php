<?php
require_once '../modelo/class_usuario.php';

class UsuariosController
{
    private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
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
        $this->usuario->agregarUsuario($nombre, $apellido, $correo_electronico, $contraseña, $edad);
    }

    public function listarUsuarios()
    {
        return $this->usuario->obtenerUsuario();
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
}
