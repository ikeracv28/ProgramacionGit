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
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $fila = $resultado->fetch_assoc();
        return $fila['total'] > 0; // Devuelve true si el correo ya está registrado
    }

    public function obtenerUsuarioPorCorreo($correo)
    {
        $query = "SELECT * FROM usuarios WHERE correo_electronico = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc(); // Devuelve los datos del usuario
    }

    public function verificarCredenciales($correo, $contraseña)
    {
        $query = "SELECT * FROM usuarios WHERE correo_electronico = ? AND contraseña = SHA2(?, 256)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ss", $correo, $contraseña);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc(); // Devuelve los datos del usuario si las credenciales son válidas
    }

    public function actualizarPlanUsuario($correo, $id_plan)
    {
        $query = "UPDATE plan SET id_plan = ? WHERE correo_electronico = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("is", $id_plan, $correo);
        if ($sentencia->execute()) {
            return true; // Devuelve verdadero si la actualización fue exitosa
        } else {
            return false; // Devuelve falso si hubo un error
        }
    }

    public function obtenerPlanPorCorreo($correo)
    {
        $query = "SELECT p.* FROM plan p JOIN usuarios u ON p.id_plan = u.id_plan WHERE u.correo_electronico = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc(); // Devuelve el plan del usuario
    }

    public function obtenerPaquetePorId($id_paquete)
    {
        $query = "SELECT * FROM paquetes WHERE id_paquete = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_paquete);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc(); // Devuelve el paquete
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

    public function actualizarUsuario($id_usuario, $nombre, $apellido, $correo_electronico, $edad)
    {
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, correo_electronico = ?, edad = ? WHERE id_usuario = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ssssi", $nombre, $apellido, $correo_electronico, $edad, $id_usuario);

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
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_usuario);

        if ($sentencia->execute()) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar Usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }
}
