<?php
require_once '../config/class_conexion.php';

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }


    public function agregarUsuarioC($nombre, $apellido, $correo_electronico, $contraseña, $edad)
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
        $query = "SELECT COUNT(*) as total FROM usuarios WHERE correo = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $fila = $resultado->fetch_assoc();
        return $fila['total'] > 0; // Devuelve true si el correo ya está registrado
    }


    public function obtenerUsuarioPorCorreo($correo)
    {
        $query = "SELECT id_usuario FROM usuarios WHERE correo = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $fila = $resultado->fetch_assoc();

        // Si el usuario existe, retorna solo el id_usuario
        if ($fila) {
            return $fila['id_usuario']; // Devuelve el id_usuario directamente
        } else {
            return null; // Si no encuentra el usuario, devuelve null
        }
    }

    public function verificarCredenciales($correo, $contraseña)
    {
        $query = "SELECT * FROM usuarios WHERE correo = ? AND contraseña = SHA2(?, 256)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("ss", $correo, $contraseña);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc(); // Devuelve los datos del usuario si las credenciales son válidas
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



    public function obtenerUltimoID($correo)
    {
        $query = "SELECT id_usuario FROM usuarios where correo = $correo ";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $correo);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_assoc();
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

    public function iniciarSesion($correo, $password)
    {
        $query = "SELECT * FROM Administrador WHERE correo = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $admin = $resultado->fetch_assoc();

        // Verifica la contraseña
        if ($admin && password_verify($password, $admin['contraseña'])) {
            // Inicia la sesión
            session_start(); // Asegúrate de llamar a session_start al inicio del script

            // Guarda los datos del usuario en la sesión
            $_SESSION['id_admin'] = $admin['admin'];
            $stmt->close();

            return $admin; // Inicio de sesión exitoso
        } else {
            return false; // Contraseña o correo incorrectos
        }
    }


}
