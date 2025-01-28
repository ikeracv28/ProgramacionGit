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
            // Redirigir al inicio de sesión con un mensaje de error
            header("Location: login.php?error=correo_ya_registrado");
            exit();
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

    public function actualizarUsuario($id_usuario, $nombre, $apellido, $correo_electronico, $contraseña, $edad)
    {
        $this->usuario->actualizarUsuario($id_usuario, $nombre, $apellido, $correo_electronico, $contraseña, $edad);
    }

    public function eliminarUsuario($id_usuario)
    {
        $this->usuario->eliminarUsuario($id_usuario);
    }
}
