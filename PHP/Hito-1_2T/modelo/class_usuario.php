<?php
require_once '../config/class_conexion.php';

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function agregarUsuario($nombre, $apellido, $correo_electronico, $contraseña, $edad)
    {
        $query = "INSERT INTO usuarios (nombre, apellido, correo_electronico, contraseña, edad) VALUES (?, ?, ?, SHA2(?, 256), ?)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ssssi", $nombre, $apellido, $correo_electronico, $contraseña, $edad);

        if ($sentencia->execute()) {
            echo "Usuario agregado con éxito.";
        } else {
            echo "Error al agregar usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }

    public function correoExistente($correo)
    {
        $query = "SELECT COUNT(*) as total FROM usuarios WHERE correo_electronico = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        return $fila['total'] > 0; // Devuelve true si el correo ya está registrado
    }

    public function obtenerUsuario()
    {
        $query = "SELECT * FROM usuarios";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function obtenerUsuarioPorId($id_usuario)
    {
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizarUsuario($id_usuario, $nombre, $apellido, $correo_electronico, $contraseña, $edad)
    {
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, correo_electronico = ?, contraseña = ?, edad = ? WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("sssii", $nombre, $apellido, $correo_electronico, $contraseña, $edad, $id_usuario);

        if ($sentencia->execute()) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar Usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }

    public function eliminarUsuario($id_usuario)
    {
        $query = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar Usuario: " . $stmt->error;
        }

        $stmt->close();
    }
}
