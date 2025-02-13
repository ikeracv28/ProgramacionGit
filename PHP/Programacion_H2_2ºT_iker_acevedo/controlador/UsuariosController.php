<?php
require_once '../modelo/class_usuario.php';


class UsuariosController{
    private $usuario;

    public function __construct()
        {
            $this->usuario = new Usuario();

        }

        public function agregarUsuario($nombre, $apellido, $correo, $contraseña){
            return $this->usuario->agregarUsuario($nombre, $apellido, $correo, $contraseña);
    }

    public function iniciarSesion($correo, $contraseña){
        return $this->usuario->iniciarSesion($correo, $contraseña);
    }

    public function obtenerUsuarioPorId($id_usuario){
        return $this->usuario->obtenerUsuarioPorId($id_usuario);
    }

    public function editarUsuario($id_usuario, $nombre, $apellido, $correo){
        return $this->usuario->editarUsuario($id_usuario, $nombre, $apellido, $correo);
    }

    public function agregarTareas($id_usuario, $descripcion){
        return $this->usuario->agregarTareas($id_usuario, $descripcion);
    }

    public function obtenerTareas($id_usuario){
        return $this->usuario->obtenerTareas($id_usuario);
    }

    public function añadirTarea($id_usuario, $descripcion){
        return $this->usuario->añadirTarea($id_usuario, $descripcion);
    }
}